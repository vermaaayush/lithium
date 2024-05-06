<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\Maildemo;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Stock;
use App\Models\Plan;
use App\Models\Investment;
use App\Models\Transfer;
use App\Models\Transaction;
use App\Models\Deposite;
use App\Models\Bank;
use App\Rules\Captcha;
use App\Models\Withrawal;
use App\Models\Kyc;
use App\Models\Iplog;
use App\Models\Accesscontrol;
use Illuminate\Support\Facades\Storage; 
use App\Models\Notification;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF; 
use Illuminate\Support\Facades\Http; 
use App\Models\Config;



class UserController extends CompanyController
{

    public function index()
    {
        
        return view('user.login');
    }

    public function signup(Request $request)
    { 

        $existingUser = User::where('email', $request->input('email'))->first();
        $parent_id='';
        $bonus=0;

        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Email is already registered!');
        }
        
        if($request->input('password') !== $request->input('password_confirmation'))
        {
            return redirect()->back()->withInput()->with('error', 'Password and Confirm Password are not same!');
        }

        if ($request->filled('reff_code')) {

            $rc = User::where('referral_id', $request->input('reff_code'))->where('dlt_status', 0)->first();
            
            if (!$rc) {
                return redirect()->back()->withInput()->with('error', 'Referral code is invalid !');
            }

            $parent_id = $rc->user_id;

            $cfg = Config::find(1);

            $bonus=$cfg->reff_code_bonus; 

            $rc->no_referral_user += 1;
            $rc->update();

        }

        $randomNumber = rand(100000, 999999); 
        $referralCode = Str::random(16);
        $user = new User();

        $user->user_id = $randomNumber;
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->country = $request->input('country');
        $user->phone = $request->input('phone');
        $user->dob = $request->input('dob');
   
        $user->password = $request->input('password');
        $user->status = 'Active';
        $user->referral_id = $referralCode;
        $user->parent_id = $parent_id;
        $user->balance += $bonus;
        $user->save();

        $trx = new Transaction();

        $trx->user_id = $randomNumber;
        $trx->subject = 'Bonus';
        $trx->name = 'Referral Code Reward';
        $trx->amount = $bonus;
        $trx->status = 'Credit';
        $trx->save();



        // Redirect to a success page or return a response
        //EMAIL
        $subject = 'Your Registration Details'; // Define the subject variable
        // $username = 'User123'; // Replace 'User123' with the actual username
        // $password = 'Password123'; // Replace 'Password123' with the actual password
        $email = $request->input('email'); // Replace 'Password123' with the actual password
        
        Mail::send('emails.register', [
            'subject' => $subject,
            'email' => $request->input('email'),
            'username' => $request->input('name'),
            'password' => $request->input('password'),
        ], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
        
            
        return redirect('/login')->with('success', 'User created successfully');

    }

    public function login(Request $req)
    {
           
           $validator=Validator::make($req->all(),[
           
                'email' => 'required|email',
                'password' => 'required',
               
           ]);

           $user = User::where(['email'=>$req->email])->where(['dlt_status'=>0])->first();
         
           if (!$user || !($req->password==$user->password)) {

                 session()->flash('error','Login failed. Please check your credentials.');
                 return $this->index();

                
           }
           else
           {
            $req->session()->put('s_user',$user);

            //EMAIL

            $subject = 'Login Alert'; // Define the subject variable
            $username = $user->name; // Replace 'User123' with the actual username
            $date = now(); // Replace 'Password123' with the actual password

            $userIp = $req->ip();

            $ip = response()->json(['ip_address' => $userIp]);

            $location = $ip->getData()->ip_address;

            $response = Http::get('http://www.geoplugin.net/php.gp?ip='.$location);
        
            if ($response->ok()) {
                $geolocation = unserialize($response->body());
                $countryName = $geolocation['geoplugin_countryName'];
                
                $kyc = new Iplog();
                $kyc->ip_address=$location;
                $kyc->country=$countryName;
                $kyc->save();
            } 


        
            $email = $user->email; // Replace 'Password123' with the actual password
            
            Mail::send('emails.login', [
                'subject' => $subject,
                'user' => $username,
                'date' => $date,
                'location' => $location,
                'email' => $email,
            ], function ($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });

            return redirect('dashboard');
          
           }
    
        // Perform your authentication logic here
    }

    public function dashboard()
    {
        $id = session('s_user')['id'];
        $u_info = User::find($id);
        return view('user.dashboard', compact('u_info'));

    }

    public function id_verification(Request $request)
    {
        //0 for pending, 1 for admin confirmatin, 2 for approved
        $id = session('s_user')['id'];
        $user = User::find($id);

        if ($request->has('image_data')) {
            $base64Data = $request->input('image_data');
            
            // Extract the image extension from base64 data
            $imageExtension = explode('/', explode(':', substr($base64Data, 0, strpos($base64Data, ';')))[1])[1];
            
            // Generate a unique file name
            $fileName = uniqid('ID') . '.' . $imageExtension;
            
            // Define the storage path relative to the public directory
            $folderPath = 'upload/selfie';
            
            // Decode base64 data and save the image to the storage path
            // Storage::put($folderPath . '/' . $fileName, base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $base64Data)));
           
            // $user->image_data = $folderPath . '/' . $fileName;

            file_put_contents(public_path($folderPath . '/' . $fileName), base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $base64Data)));

            $user->image_data = $folderPath . '/' . $fileName;

            

        } 

        if ($request->hasFile('id_image')) {
            $uploadedFile = $request->file('id_image');
        
            // Generate a unique file name
            $fileName = uniqid('id_image') . '.' . $uploadedFile->getClientOriginalExtension();
        
            // Define the storage path relative to the public directory
            $folderPath = 'upload/id_image';
        
            // Move the uploaded file to the storage path
            $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
        
            if ($storedFilePath) {
                // File moved successfully, update database or perform other operations
                $user->id_proof = $folderPath . '/' . $fileName;
                // Save the $plan object or perform other operations as needed
            }
        }


        $user->id_status = '1';
        $user->update();

        $kyc = new Kyc();
        $kyc->user_id = session('s_user')['user_id'];
        $kyc->name = $request->fname;
        $kyc->id_type=$request->id_type;
        $kyc->nationality=$request->nationality;
        $kyc->id_no=$request->id_no;
        $kyc->save();


        return redirect('/dashboard')->with('success', 'ID proof uploaded successfully');

        
      
        
    }

    public function add_verify(Request $request)
    {
        //0 for pending, 1 for admin confirmatin, 2 for approved
        $id = session('s_user')['id'];
        $user = User::find($id);

        if ($request->hasFile('address_proof')) {
            $uploadedFile = $request->file('address_proof');
        
            // Generate a unique file name
            $fileName = uniqid('address_proof') . '.' . $uploadedFile->getClientOriginalExtension();
        
            // Define the storage path relative to the public directory
            $folderPath = 'upload/address_proof';
        
            // Move the uploaded file to the storage path
            $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
        
            if ($storedFilePath) {
                // File moved successfully, update database or perform other operations
                $user->address_proof = $folderPath . '/' . $fileName;
                // Save the $plan object or perform other operations as needed
            }
        }


        $user->add_status = '1';
        $user->update();

   
        $kyc = Kyc::where(['user_id'=>session('s_user')['user_id']])->first();
       
    
        $kyc->adrs_nationality=$request->nationality;
        $kyc->adrs_country=$request->country;
        $kyc->address=$request->address;
        $kyc->code=$request->pincode;
        $kyc->city=$request->city;
        $kyc->state=$request->state;

        $kyc->update();

        return redirect('/dashboard')->with('success', 'Address Proof uploaded successfully');

        
      
        
    }

    public function deposite_funds(Request $request)
    {
        $id = session('s_user')['id'];
        $u_info = User::find($id);

        
        $transactionId = 'AD' . time() . mt_rand(1000, 9999);

        $user = new Deposite();

        $user->user_id = $u_info->user_id;
        $user->name = $request->input('name');
        $user->amount = $request->input('amount');

        $user->pay_mode = 'By Admin';
   
        // $user->description = $request->input('description');
        $user->transaction_id =  $transactionId;
        $user->status = '0';
        $user->save();

        return redirect('all_deposite')->with('success', 'New Deposite requested has been generated');

    }
    public function all_deposite()
    {
        $userId = session('s_user')['user_id'];
        $data = Deposite::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('user.all_deposite', compact('data'));
    }

    public function user_logout()
    {
        Session::forget('s_user');
        return redirect('/login');
    }
      

    public function explore_plans()
    {
        $data = Plan::where(['dlt_status'=>0])->orderBy('created_at', 'desc')->get();
        return view('user.explore_plans', compact('data'));
    }
    

    public function my_investments()
    {
        $userId = session('s_user')['user_id'];
        $data = Investment::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        return view('user.my_investments', compact('data'));
    }

    public function transfer(Request $request)
    {
        $amount = str_replace(',', '', $request->input('amount'));
        $avl_balance = $request->input('avl_balance');
        $identifier = $request->input('receiver');

       
        if ($identifier === session('s_user')['email'] || $identifier === session('s_user')['user_id']) {
            return redirect()->back()->withInput()->with('error', 'You cannot transfer funds to yourself.');
        }

        if ($amount > $avl_balance) 
        {
            return redirect()->back()->withInput()->with('error', 'Entered amount is more then a wallet balance !');
        }
     

        // Check if the input matches an email format
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            // Input is an email address
            $user = User::where('email', $identifier)->where('dlt_status', 0)->first();
            
        } else {
            // Input is assumed to be a user ID
            $user = User::where('user_id', $identifier)->where('dlt_status', 0)->first();
        }

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'User not found. Please check the recipient details and try again.');
        }

        return view('user.receiver_details', compact('user'), compact('amount'));


    }

    public function transfer_now(Request $request)
    {
        $amount = $request->input('amount');
        $transactionId = 'TX' . time() . mt_rand(1000, 9999);
        //deposite balance to receiver wallet
        $user = User::where('user_id', $request->input('user_id'))->first();
        $user->balance += $amount;
        $user->save();


        //balance deduction from current user
        $user = User::where('user_id', session('s_user')['user_id'])->first();
        $user->balance -= $amount;
        $user->save();

        //add entry in transfer 
        $transfer = new Transfer();

        $transfer->user_id = session('s_user')['user_id'];
        $transfer->receiver_name = $request->input('name');
        $transfer->receiver_user_id = $request->input('user_id');
        $transfer->receiver_email = $request->input('email');
        $transfer->amount = $amount;
        $transfer->transaction_id =$transactionId ;
        $transfer->status = 1;
        $transfer->save();

        //add entry in transaction history 

        //for sender
        
        $trx = new Transaction();

        $trx->user_id = session('s_user')['user_id'];
        $trx->subject = 'Fund Transfer';
        $trx->name = $request->input('name');
        $trx->amount = $amount;
        $trx->status = 'Debit';
        $trx->save();
        

        //for receiver


        $trx = new Transaction();

        $trx->user_id = $request->input('user_id');
        $trx->subject = 'Fund Transfer';
        $trx->name = session('s_user')['name'];
        $trx->amount = $amount;
        $trx->status = 'credit';
        $trx->save();

        $data = [
            'amount' =>  $amount ,
            'sender' => session('s_user')['name'],
            'sender_email' => session('s_user')['email'],
            'receiver' => $request->input('name'),
            'receiver_email' => $request->input('email'),
            'transaction_id'=> $transactionId,
            
        ];

        session(['transfer_success_data' => $data]);
        // OTP
        //Email

        return redirect('success_transfer');
        // return view('user.success_transfer', compact('data'));

       

        
       

    }

    public function success_transfer()
    {
        $data = session('transfer_success_data');
        return view('user.success_transfer', compact('data')); 
    }

    public function v_plan($id)
    {
        $u_id=session('s_user')['id'];
        $user = User::find($u_id);
       
        
        $data = Plan::find($id);

       $planId = $data->plan_id;
   
       $filePath = env('APP_URL').'/storage/app/public/'.$planId.'.csv';

       $stock = Stock::where(['plan_id'=>$planId])->first();
       $s_value= $stock->base_value;
     
        return view('user.view_plan',  compact('data', 'filePath', 's_value','user'));
    }


    public function bank_wire()
    {
         
    //  $randomNumber = str_pad(mt_rand(1, 999999999999), 12, '0', STR_PAD_LEFT);
     $bank = Bank::find(1);
     return view('user.bank_wire',  compact('bank'));

        
    }

    public function wire_deposite(Request $request)
    {
        $id = session('s_user')['id'];
        $u_info = User::find($id);

        // $transactionId = 'BW' . time() . mt_rand(1000, 9999);

        $depo = new Deposite();

        $depo->user_id = $u_info->user_id;
        $depo->name = $u_info->name;
        $depo->amount = $request->input('amount');
        $depo->pay_mode = 'Bank Wire';
        $depo->notes = $request->input('notes');
   
        // $user->description = $request->input('description');
        $depo->transaction_id =  $request->input('tranx_id');
        $depo->status = '2';
        $depo->bank_name = $request->input('bank_name');
        $depo->acc_number = $request->input('acc_no');

        $uploadedFile = $request->file('depo_proof');

        $fileName = uniqid('depo_proof') . '.' . $uploadedFile->getClientOriginalExtension();
              
        $folderPath = 'upload/bank_wire';
   
        $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
    
        if ($storedFilePath) {
       
            $img_path = $folderPath . '/' . $fileName;

           
            $depo->img = $img_path;

            

            
        }


        $depo->save();

        return redirect('all_deposite')->with('success', 'New Deposite requested has been generated');

    }

    public function upload_bw_proof(Request $request, $tx_id)
    {
         

          $uploadedFile = $request->file('img');
        
          $fileName = uniqid('img') . '.' . $uploadedFile->getClientOriginalExtension();
      
         
          $folderPath = 'upload/bank_wire';
     
          $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
      
          if ($storedFilePath) {
         
              $img_path = $folderPath . '/' . $fileName;

              $data = Deposite::where('transaction_id', $tx_id)->first();
              $data->img = $img_path;
              $data->save();

              return redirect('all_deposite')->with('success', 'Payment Proof Upload successfully.');
              

              
          }
    }

    public function history()
    {
        $user_id = session('s_user')['user_id'];
        $data = Transaction::where('user_id', $user_id)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('user.history', compact('data'));
       
    }

    public function withraw_funds()
    {
        $u_id=session('s_user')['id'];
        $user = User::find($u_id);
        
        return view('user.withraw', compact('user'));

    } 

    public function add_withrawal(Request $request)
    {
        $id = session('s_user')['id'];
        $u_info = User::find($id);

        
        $transactionId = 'AD' . time() . mt_rand(1000, 9999);

        $user = new Withrawal();

        $user->user_id = $u_info->user_id;
        $user->name = $request->input('name');
        $user->amount = $request->input('amount');
   
        // $user->description = $request->input('description');
        $user->transaction_id =  $transactionId;
        $user->status = '0';
        $user->save();

        return redirect('all_withrawal')->with('success', 'New withdrawal requested has been generated');
    }

    public function all_withrawal()
    {
        $userId = session('s_user')['user_id'];
        $data = Withrawal::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('user.all_withrawal', compact('data'));
    }

    public function validate_email_otp(Request $request)
    {

        if ( session('otp_code') == $request->otp) {
           
           
            $user = User::where('user_id', session('s_user')['user_id'])->first();
          
            $user->email_auth=1;
            $user->update();
            Session::forget('otp_code');
            return redirect('/dashboard')->with('success', 'Email Verification Done');
    
        }
        else
        {
            Session::forget('otp_code');
            return redirect('/dashboard')->with('error', 'Incorrect OTP retry again!');
        }
        
    }

    public function notifications()
    {
        $userId = session('s_user')['user_id'];
        $data = Notification::where('user_id', $userId)->orderBy('created_at', 'desc')->get();


 
        return view('user.notifications', compact('data'));
    }









    public function all_transfer()
    {
        $userId = session('s_user')['user_id'];
        $data = Transfer::where('user_id', $userId)->orderBy('created_at', 'desc')->get();


 
        return view('user.all_transfer', compact('data'));
    }

    public function portfolio()
    {
        $userId = session('s_user')['user_id'];
        $data = Investment::where('user_id', $userId)
        ->where('status', 0) 
        ->orderBy('created_at', 'desc')
        ->get();


        return view('user.portfolio', compact('data'));
    }

    public function profile()
    {
        //user details
        $userId = session('s_user')['user_id'];
        $data = User::where('user_id', $userId)->first();
        //email edit control
        $access_c = Accesscontrol::where('id', 1)->first();
        $m_email=$access_c->m_email;

        $kyc = Kyc::where('user_id', $userId)->first();

        return view('user.profile', compact('data','m_email','kyc'));
    }

    public function update_profile(Request $request)
    {
        $userId = session('s_user')['user_id'];
        $user = User::where('user_id', $userId)->first();
        $user->name =  $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->dob = $request->input('dob');
        $user->country = $request->input('country');
        $user->save();

        return back()->with('success', 'Profile Updated Successfully.');
    }

    public function update_password(Request $request)
    {
        $userId = session('s_user')['user_id'];
        $user = User::where('user_id', $userId)->first();

        if ( $user->password ==  $request->input('old_pass')) 
        {
            if ( $request->input('n_pass') ==  $request->input('c_pass')) 
            {
                $user->password = $request->input('n_pass');
                $user->update();
                return back()->with('success', 'Password Updated Successfully');
                
            }
            else
            {
                return back()->with('error', 'New Password and Current Password are not same !');
            }
        }
        else
        {
            return back()->with('error', 'Incorrect Old Password !');
        }

    }

    public function export_history()
    {
        $userId = session('s_user')['user_id'];
    $data = Transaction::where('user_id', $userId)->get();

    // Load the data into a Blade view
    $pdf = PDF::loadView('pdf.transaction_history', compact('data'));

    // Generate the PDF and return a download response
    return $pdf->download('transaction_history.pdf');
       
    }


    public function my_referrals()
    {
        $userId = session('s_user')['user_id'];
        $data = User::where('user_id', $userId)->first();
        return view('user.my_referrals', compact('data'));
    }






































 
    public function test(Request $request)
    {

        
        Log::info('Payment Response:', $request->all());

        // Check if the response is empty
       
        // Handle the payment response logic here
        // For example, you can check the payment status and update your database accordingly

        // Return a success response
        return response()->json(['status' => 'success']);
       
        // $subject = 'Your subject here'; // Define the subject variable
        // $username = 'User123'; // Replace 'User123' with the actual username
        // $password = 'Password123'; // Replace 'Password123' with the actual password
        // $email = 'aayushverma200@gmail.com'; // Replace 'Password123' with the actual password
        
        // Mail::send('emails.register', [
        //     'subject' => $subject,
        //     'email' => $email,
        //     'username' => $username,
        //     'password' => $password,
        // ], function ($message) use ($email, $subject) {
        //     $message->to($email)->subject($subject);
        // });
        
        //     return 'Test email sent successfully!';  

    }


 }
