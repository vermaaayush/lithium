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
use App\Models\Admin;
use App\Models\User;
use App\Models\Deposite;
use App\Models\Withrawal;
use App\Models\Investment;
use App\Models\Transaction;
use App\Models\Bank;
use App\Models\Config;
use App\Models\Kyc;
use App\Models\Notification;
use App\Models\Accesscontrol;
use App\Models\Iplog;
use Illuminate\Support\Facades\Auth;

class AdminController extends CompanyController
{   
    public function index()
    {
        
        return view('admin.login');
    }
    public function login(Request $req)
    { 

        // $credentials = $request->only('email', 'password');

        // if (Auth::guard('admin')->attempt($credentials)) {
        //     // Authentication passed
        //     return redirect()->intended('/admin_dashboard');
        // } else {
        //     // Authentication failed
        //     return redirect('/admin')->withInput()->withErrors(['error' => 'Login failed.']);
        // }

        $validator=Validator::make($req->all(),[
           
            'email' => 'required',
            'password' => 'required',
           ]);
    
           if ($validator->fails()) {
                  return redirect('/admin')->withInput()->withErrors($validator);
               
           }
    
           $user = Admin::where(['email'=>$req->email])->first();
         
           if (!$user || !($req->password==$user->password)) {

                 session()->flash('error','Login failed try again !');
                 return $this->index();

                
           }
           else
           {
            $req->session()->put('admin',$user);

            return redirect('admin_dashboard');
          
           }
           
    
          

    }
    public function dashboard()
    {
        $config=$this->companyData;
        return view('admin.dashboard',compact('config'));
    }
    public function users()
    {
        $users = User::where('dlt_status', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.all_users', compact('users'));
    }

    public function add_user()
    {
        return view('admin.add_user');
    }

    public function insert_user(Request $request)
    { 
        
        if($request->input('password') !== $request->input('password_confirmation'))
        {
            return redirect()->back()->withInput()->with('error', 'Password and Confirm Password are not same!');
        }


        $randomNumber = rand(100000, 999999); 
        $referralCode = Str::random(16);
        $user = new User();

        $user->user_id = $randomNumber;
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->phone = $request->input('phone');
        $user->country = $request->input('country');
        $user->dob = $request->input('dob');

        
       

        $user->password = $request->input('password');
        $user->status = $request->input('status');
        
        $user->admin_note = $request->input('admin_note');
        $user->referral_id = $referralCode;

        $user->id_status = 2;
        $user->add_status = 2;
        $user->email_auth = 2;


        $user->save();

        //Email
        $subject = 'Your Registration Details'; // Define the subject variable
        $email = $request->input('email'); // Replace 'Password123' with the actual password
        
        Mail::send('emails.register', [
            'subject' => $subject,
            'email' => $request->input('email'),
            'username' => $request->input('name'),
            'password' => $request->input('password'),
        ], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });



        // Redirect to a success page or return a response
        return redirect('users')->with('success', 'User created successfully');

    }

    public function veiw_user($id)
    {
        $u_info = User::find($id);
        $data = Kyc::where('user_id', $u_info->user_id)->first();
        return view('admin.veiw_user', compact('u_info','data'));
    }

    public function funds($id)
    {
        $data = User::find($id);
        return view('admin.funds', compact('data'));

    }

    public function edit_user(Request $request,$id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');


        
       

        $user->password = $request->input('password');
        $user->status = $request->input('status');

        $user->country = $request->input('country');
        $user->phone = $request->input('phone');
        $user->dob = $request->input('dob');
        $user->admin_note = $request->input('admin_note');

        $user->balance = $request->input('balance');
        $user->funded = $request->input('funded');
        $user->withraw = $request->input('withraw');
        $user->deposite = $request->input('deposite');
        $user->Earning = $request->input('Earning');


        $user->update();

        // Redirect to a success page or return a response
        return back()->with('success', 'User updated successfully');
    }
    
    
    public function add_balance(Request $request, $id)
    {
        // adding balance in user table 
        
        $user = User::find($id);
        $amount = $request->input('amount');
        $user->balance += $amount;
        $user->deposite += $amount;
        $user->save();

 
        // adding balance in deposite table
        
        $u_info = User::find($id);
        $transactionId = 'TX' . time() . mt_rand(1000, 9999);

        $depo = new Deposite();

        $depo->user_id = $u_info->user_id;
        $depo->name = $u_info->name;
        $depo->amount = $request->input('amount');

        $depo->pay_mode = 'By Admin';
        $depo->transaction_id =  $transactionId;
        $depo->status = '1';
        $depo->save();

        return back()->with('success', 'Balance added successfully.');

    }

    public function deposits()
    {
       
        $data = Deposite::orderBy('created_at', 'desc')->get();
        return view('admin.all_deposite', compact('data'));
    }
    
    public function app_depo($id)
    {
       
        $depo = Deposite::find($id);
        $user_id= $depo->user_id;
        $amount = $depo->amount;

        $u = User::where('user_id', $user_id)->first();
        $u->balance += (int)$amount;
        $u->deposite += (int)$amount;
        $u->save();

        $depo->status = 1;
        $depo->save();

        $trx = new Transaction();

        $trx->user_id = $depo->user_id;
        $trx->subject = 'Fund Deposite';
        $trx->name = $depo->name;
        $trx->amount = $amount;
        $trx->status = 'Credit';
        $trx->save();
        
        //refrall parent 

        //user_dlt
        $ac = Accesscontrol::find(1);
        if ($ac->referral==1)
        {
            $rf= User::where('user_id', $u->parent_id)->where('dlt_status', 0)->first();
            if ($rf) {
                
                $cfg = Config::find(1);
                $percentage = $cfg->reff_depo_earning;
                $amt = number_format(($percentage / 100) * $amount, 2);

                $rf->balance +=$amt;
                $rf->update();

                $trx = new Transaction();
                $trx->user_id = $rf->user_id;
                $trx->subject = 'Commission';
                $trx->name = 'Referral Deposite Bonus';
                $trx->amount = $amt;
                $trx->status = 'Credit';
                $trx->save();


                
            }
        }

      


        //Email
        $subject = 'Deposit Confirmation: Amount Successfully Credited'; // Define the subject variable

        $email = $u->email;
        
        Mail::send('emails.deposite', [
            'subject' => $subject,
            'name' => $u->name,
            'email' => $u->email,
            'amount' => $amount,
        ], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });


        
        return redirect('deposits')->with('success', 'Deposit Approved successfully');
    }

    public function all_investment()
    {
        $data = Investment::orderBy('created_at', 'desc')->get();
        return view('admin.all_investment', compact('data'));
    }
    
    public function system_config()
    {
        $cfg = Config::find(1);
        return view('admin.system_config', compact('cfg'));
    }

    public function update_system_config(Request $request)
    {
        $cfg = Config::find(1);

        
        if ($request->hasFile('company_logo')) {
            $uploadedFile = $request->file('company_logo');
        
            // Generate a unique file name
            $fileName = uniqid('company_logo') . '.' . $uploadedFile->getClientOriginalExtension();
        
            // Define the storage path relative to the public directory
            $folderPath = 'upload/logo';
        
            // Move the uploaded file to the storage path
            $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
        
            if ($storedFilePath) {
                // File moved successfully, update database or perform other operations
                $cfg->logo = $folderPath . '/' . $fileName;
                // Save the $plan object or perform other operations as needed
            }
        }

        if ($request->hasFile('favicon')) {
            $uploadedFile = $request->file('favicon');
        
            // Generate a unique file name
            $fileName = uniqid('favicon') . '.' . $uploadedFile->getClientOriginalExtension();
        
            // Define the storage path relative to the public directory
            $folderPath = 'upload/favicon';
        
            // Move the uploaded file to the storage path
            $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
        
            if ($storedFilePath) {
                // File moved successfully, update database or perform other operations
                $cfg->favicon = $folderPath . '/' . $fileName;
                // Save the $plan object or perform other operations as needed
            }
        }

        $cfg->name = $request->input('name');
        $cfg->url = $request->input('url');
 
        $cfg->phone = $request->input('phone');
        $cfg->address = $request->input('address');
        $cfg->email = $request->input('email');
        $cfg->licence_key = $request->input('key');


        $cfg->update();

        // Redirect to a success page or return a response
        return back()->with('success', 'Information Updated Successfully');
    }

    public function bank_info()
    {
        $bank = Bank::find(1);
       
        return view('admin.bank_info',compact('bank'));
    }

    public function update_bank(Request $request)
    {
        $bank = Bank::find(1);
       
            $bank->name= $request->bank_name;
            $bank->account_number= $request->account_no;
            $bank->address= $request->bank_address;
            $bank->swift_code= $request->swift_code;
            $bank->ibank_number= $request->iban_no;
            $bank->rounting_number= $request->rounting_no;
            $bank->description= $request->description;
            $bank->save();
        
        
        return redirect('bank_info')->with('success', 'Info Updated successfully');
        

    }

    public function withrawals()
    {
        $data = Withrawal::orderBy('created_at', 'desc')->get();
        return view('admin.all_withdrawal', compact('data'));
    }

    public function app_withdrawal($id)
    {
        $depo = Withrawal::find($id);
        $user_id= $depo->user_id;
        $amount = $depo->amount;

        $u = User::where('user_id', $user_id)->first();
        
        if ($u->balance <  $amount) {
            return redirect('withrawals')->with('error', 'Issuficient balance');
        }
         
        $u->balance -= $amount;
        $u->withraw += $amount;
        $u->save();

        $depo->status = 1;
        $depo->save();

        $trx = new Transaction();

        $trx->user_id = $depo->user_id;
        $trx->subject = 'Fund Withdrawal';
        $trx->name = $u->name;
        $trx->amount = $amount;
        $trx->status = 'Debit';
        $trx->save();
        
        return redirect('withrawals')->with('success', 'Withdrawal Approved successfully');
    }

    public function admin_logout()
    {
        Session::forget('admin');
        return redirect('/admin');
    }

    public function access_control(Request $request)
    {
      
        $data = Accesscontrol::find(1);
        return view('admin.access_control', compact('data'));
    }

    public function update_access_control(Request $request)
    {
      
        $mEmail = $request->has('m_email') ? 1 : 0;
        $mInstantPayment = $request->has('m_instant_payment') ? 1 : 0;
        $mDeposit = $request->has('m_deposite') ? 1 : 0;
        $mTransfer = $request->has('m_transfer') ? 1 : 0;
        $extra1 = $request->has('extra1') ? 1 : 0;
        $extra2 = $request->has('extra2') ? 1 : 0;
        $referral = $request->has('referral') ? 1 : 0;
    
        // Update the database in a single command
        Accesscontrol::where('id', 1)->update([
            'm_email' => $mEmail,
            'm_instant_payment' => $mInstantPayment,
            'm_deposite' => $mDeposit,
            'm_transfer' => $mTransfer,
            'extra1' => $extra1,
            'extra2' => $extra2,
            'referral' => $referral,
        ]);

    
        
        return redirect('access_control');
    }

    public function block_suspend($id)
    {
        $user = User::find($id);
        $user->status='Suspended';
        $user->save();

        $subject = 'Urgent: Account Suspension Notification'; // Define the subject variable

        $email = $user->email;
        
        Mail::send('emails.suspend', [
            'subject' => $subject,
            'name' => $user->name,
            'email' => $user->email,
        ], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
        

        return redirect('users');

        

        //Email

    }

    public function activate_user($id)
    {
        $user = User::find($id);
        $user->status='Active';
        $user->save();
        return redirect('users');

        //Email
    }
    
    public function blacklisted_user()
    {
        $users = User::where('status', 'Suspended')->orderBy('created_at', 'desc')->get();
        return view('admin.blacklisted_user', compact('users'));
    }

    public function newsletter()
    {
        $u_info = User::orderBy('created_at', 'desc')->where('dlt_status', 0)->get();
        return view('admin.newsletter', compact('u_info'));

    }

    public function send_newsletter(Request $request)
    {
        $validatedData = $request->validate([
            'msg' => 'required|string',
            'checkbox.*' => 'exists:users,id', // Validate that selected users exist in the database
        ]);
    
        // Get the message content from the form
        $message = $validatedData['msg'];
    
        // Get the selected user IDs from the checkbox input
        $selectedUserIds = $request->input('checkbox');
    
        // Iterate through the selected user IDs
        foreach ($selectedUserIds as $userId) {
         
            $user = User::find($userId);
    
            if ($user) {

                $data = new Notification();
                $data->user_id=$user->user_id;
                $data->message=$message;
                $data->save();
                
              
    
                $subject = 'New Notification'; // Define the subject variable
    
                $email = $user->email;
                $msg=$message;
                
                Mail::send('emails.notification', [
                    'subject' => $subject,
                    'email' => $request->input('email'),
                    'msg' => $msg,
                ], function ($msg) use ($email, $subject) {
                    $msg->to($email)->subject($subject);
                });
            }
        }
    
        // Provide feedback to the user (e.g., redirect back with a success message)
        return redirect()->back()->with('success', 'Notifications sent successfully.');
    

    }

    public function add_bonus(Request $request)
    {
        $user_id= $request->user_id;

        $b_amount= $request->bonus;
        
        $user = User::where('user_id', $user_id)->first();

        if ($user) 
        {
            $user->balance += $b_amount; 
            $user->save();

            $trx = new Transaction();

            $trx->user_id = $user_id;
            $trx->subject = 'Investment Bonus';
            $trx->name = $user->name;
            $trx->amount = $b_amount;
            $trx->status = 'Credit';
            $trx->save();

            $noti = new Notification();
            $noti->user_id=$user_id;
            $noti->message='Congratulations! You just received an investment bonus of $'.number_format($b_amount). ', Happy investing!';
            $noti->save();

        
        $subject = 'Investment Bonus Received'; // Define the subject variable
        
        $email = $user->email;
  
        $amount =$b_amount;
      
        $user_x= $user->name;
        $date= Carbon::now();
        
      

        
        Mail::send('emails.bonus', [
            'subject' => $subject,
            'email' => $email,
            'user_x' =>$user_x,
            'total_amount' => $amount,
            'date' => $date,
            
        ], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });

        return back()->with('success', 'Bonus Addess Successfully');
           
        }
        else
        {

        return back()->with('Error', 'User Not Found !');

        }
        
       
    }


    public function add_penalty(Request $request)
    {
        $user_id= $request->user_id;

        $p_amount= $request->penalty;
        
        $user = User::where('user_id', $user_id)->first();

        if ($user) 
        {
            $user->balance -= $p_amount; 
            $user->save();

            $trx = new Transaction();

            $trx->user_id = $user_id;
            $trx->subject = 'Penalty Deducted';
            $trx->name = $user->name;
            $trx->amount = $p_amount;
            $trx->status = 'Debit';
            $trx->save();

            $noti = new Notification();
            $noti->user_id=$user_id;
            $noti->message='We regret to inform you that a penalty of $'.number_format($p_amount). ' has been deducted from your account';
            $noti->save();

        
        $subject = 'Penalty Deducted'; // Define the subject variable
        
        $email = $user->email;
  
        $amount =$p_amount;
      
        $user_x= $user->name;
        $date= Carbon::now();
        
      

        
        Mail::send('emails.penalty', [
            'subject' => $subject,
            'email' => $email,
            'user_x' =>$user_x,
            'total_amount' => $amount,
            'date' => $date,
            
        ], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });

        return back()->with('success', 'Penalty Deducted Successfully');
           
        }
        else
        {

        return back()->with('Error', 'User Not Found !');

        }
        
       
    }

    public function ip_logs()
    {
        $data = Iplog::orderBy('created_at', 'desc')->get();
        return view('admin.iplogs', compact('data'));
    }

    public function referral()
    {
        $cfg = Config::find(1);
        return view('admin.referral', compact('cfg'));
    }

    public function update_referral(Request $request)
    {
        $cfg = Config::find(1);

    
        $cfg->reff_code_bonus = $request->input('reff_code_bonus');
        $cfg->reff_depo_earning = $request->input('reff_depo_earning');
        $cfg->reff_trade_earning = $request->input('reff_trade_earning');
        $cfg->update();

        // Redirect to a success page or return a response
        return back()->with('success', 'Information Updated Successfully');
    }

    public function bw_view($id)
    {
        $data = Deposite::find($id);
       
        return view('admin.bw_view', compact('data'));
    }


    public function bw_reject($id)
    {
        $depo = Deposite::find($id);
        $user_id= $depo->user_id;
        $amount = $depo->amount;

        $u = User::where('user_id', $user_id)->first();

        $depo->status = 3;
        $depo->save();

        
        
      


        //Email
        $subject = 'Deposit Request Rejected'; // Define the subject variable

        $email = $u->email;
        
        Mail::send('emails.depo_reject', [
            'subject' => $subject,
            'name' => $u->name,
            'email' => $u->email,
            'amount' => $amount,
        ], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });


        
        return redirect('deposits');
    }


    public function delete_user($id)
    {
        
        $u = User::find($id);

        $u->dlt_status =1; 
        $u->update();
       
        return redirect()->back()->with('success', 'User deleted successfully');
    
    }


    public function id_approve($id)
    {
        
        $u = User::find($id);
        $u->id_status =2; 
        $u->update();
        return redirect()->back()->with('success', 'Approved successfully');
    
    }


    public function id_reject($id)
    {
        
        $u = User::find($id);
        $u->id_status =3; 
        $u->update();
        return redirect()->back();
    
    }

    public function address_approve($id)
    {
        
        $u = User::find($id);

        $u->add_status =2; 
        $u->update();
        return redirect()->back()->with('success', 'Approved successfully');
    
    }

    public function address_reject($id)
    {
        
        $u = User::find($id);

        $u->add_status =3; 
        $u->update();
        return redirect()->back();
    
    }

    public function c_password()
    {
        $data = Admin::find(1);
        return view('admin.change_password', compact('data'));
    }

    public function u_password(Request $request)
    {
        $admin = Admin::find(1);

        if ( $admin->password ==  $request->input('o_pass')) 
        {
            if ( $request->input('n_pass') ==  $request->input('c_pass')) 
            {
                $admin->password = $request->input('n_pass');
                $admin->email = $request->input('email');
                $admin->update();
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




       // return view('admin.change_password', compact('data'));
    }

    

    
}
