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
use App\Models\Notification;
use App\Models\Accesscontrol;
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
        $users = User::orderBy('created_at', 'desc')->get();
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

        $user = new User();

        $user->user_id = $randomNumber;
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->phone = $request->input('phone');
        $user->country = $request->input('country');
        $user->dob = $request->input('dob');

        
        // if ($request->hasFile('user_pic')) {
        //     $uploadedFile = $request->file('user_pic');
        
        //     // Generate a unique file name
        //     $fileName = uniqid('user_pic_') . '.' . $uploadedFile->getClientOriginalExtension();
        
        //     // Define the storage path relative to the public directory
        //     $folderPath = 'upload/users';
        
        //     // Move the uploaded file to the storage path
        //     $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
        
        //     if ($storedFilePath) {
        //         // File moved successfully, update database or perform other operations
        //         $user->image_data = $folderPath . '/' . $fileName;
        //         // Save the $plan object or perform other operations as needed
        //     }
        // }

        $user->password = $request->input('password');
        $user->status = $request->input('status');
        
        $user->admin_note = $request->input('admin_note');
        

        $user->id_status = 2;
        $user->add_status = 2;
        $user->email_auth = 2;


        $user->save();

        // Redirect to a success page or return a response
        return redirect('users')->with('success', 'User created successfully');

    }

    public function veiw_user($id)
    {
        $u_info = User::find($id);
        return view('admin.veiw_user', compact('u_info'));
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
    
        // Update the database in a single command
        Accesscontrol::where('id', 1)->update([
            'm_email' => $mEmail,
            'm_instant_payment' => $mInstantPayment,
            'm_deposite' => $mDeposit,
            'm_transfer' => $mTransfer,
            'extra1' => $extra1,
            'extra2' => $extra2,
        ]);

    
        
        return redirect('access_control');
    }

    public function block_suspend($id)
    {
        $user = User::find($id);
        $user->status='Suspended';
        $user->save();
        return redirect('users');

    }
    
    public function blacklisted_user()
    {
        $users = User::where('status', 'Suspended')->orderBy('created_at', 'desc')->get();
        return view('admin.blacklisted_user', compact('users'));
    }

    public function newsletter()
    {
        $u_info = User::orderBy('created_at', 'desc')->get();
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
                
              
    
               //Email
            }
        }
    
        // Provide feedback to the user (e.g., redirect back with a success message)
        return redirect()->back()->with('success', 'Notifications sent successfully.');
    

    }

    
}
