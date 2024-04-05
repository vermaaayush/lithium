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
use App\Rules\Captcha;

class UserController extends Controller
{

    public function index()
    {
        
        return view('user.login');
    }

    public function signup(Request $request)
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
        $user->address = $request->input('address');
   

        
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
        $user->referral_id = $request->input('referral_id');
        $user->status = 'Disabled';
        // $user->status = $request->input('status');
        // $user->secret_question = $request->input('s_question');
        // $user->secret_answer = $request->input('s_answer');
        // $user->auto_withdraw = $request->input('auto_withraw') ? true : false;
        // $user->pay_earning_auto = $request->input('pay_earning');
        // $user->max_withdraw = $request->input('max_withdraw');
        // $user->admin_note = $request->input('admin_note');


        $user->save();

        // Redirect to a success page or return a response
        return back()->with('success', 'User created successfully');

    }

    public function login(Request $req)
    {
           
           $validator=Validator::make($req->all(),[
           
                'email' => 'required|email',
                'password' => 'required',
               
           ]);

           $user = User::where(['email'=>$req->email])->first();
         
           if (!$user || !($req->password==$user->password)) {

                 session()->flash('error','Login failed. Please check your credentials.');
                 return $this->index();

                
           }
           else
           {
            $req->session()->put('s_user',$user);

            return redirect('dashboard');
          
           }
    
        // Perform your authentication logic here
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function deposite_funds()
    {
        
    }
    
}
