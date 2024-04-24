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
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        return view('admin.dashboard');
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
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->dob = $request->input('dob');

        
        if ($request->hasFile('user_pic')) {
            $uploadedFile = $request->file('user_pic');
        
            // Generate a unique file name
            $fileName = uniqid('user_pic_') . '.' . $uploadedFile->getClientOriginalExtension();
        
            // Define the storage path relative to the public directory
            $folderPath = 'upload/users';
        
            // Move the uploaded file to the storage path
            $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
        
            if ($storedFilePath) {
                // File moved successfully, update database or perform other operations
                $user->image = $folderPath . '/' . $fileName;
                // Save the $plan object or perform other operations as needed
            }
        }

        $user->password = $request->input('password');
        $user->status = $request->input('status');
        $user->secret_question = $request->input('s_question');
        $user->secret_answer = $request->input('s_answer');
        $user->auto_withdraw = $request->input('auto_withraw') ? true : false;
        $user->pay_earning_auto = $request->input('pay_earning');
        $user->max_withdraw = $request->input('max_withdraw');
        $user->admin_note = $request->input('admin_note');


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


        
        if ($request->hasFile('user_pic')) {
            $uploadedFile = $request->file('user_pic');
        
            // Generate a unique file name
            $fileName = uniqid('user_pic_') . '.' . $uploadedFile->getClientOriginalExtension();
        
            // Define the storage path relative to the public directory
            $folderPath = 'upload/users';
        
            // Move the uploaded file to the storage path
            $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
        
            if ($storedFilePath) {
                // File moved successfully, update database or perform other operations
                $user->image = $folderPath . '/' . $fileName;
                // Save the $plan object or perform other operations as needed
            }
        }

        $user->password = $request->input('password');
        $user->status = $request->input('status');
 
        $user->auto_withdraw = $request->input('auto_withraw') ? true : false;
        $user->pay_earning_auto = $request->input('pay_earning');
        $user->max_withdraw = $request->input('max_withdraw');
        $user->admin_note = $request->input('admin_note');


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
        $u->balance += $amount;
        $u->deposite += $amount;
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
        return view('admin.system_config');
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
}
