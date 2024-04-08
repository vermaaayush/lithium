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
use App\Models\Plan;
use App\Models\Deposite;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Storage; 

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

        $user->country = $request->input('country');
   
        $user->password = $request->input('password');
        $user->status = 'not_approved';
        $user->save();

        // Redirect to a success page or return a response
        //EMAIL
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

        return back()->with('success', 'ID proof uploaded successfully');

        
      
        
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

        return back()->with('success', 'Address Proof uploaded successfully');

        
      
        
    }

    public function deposite_funds(Request $request)
    {
        $id = session('s_user')['id'];
        $u_info = User::find($id);

        
        $transactionId = 'TX' . time() . mt_rand(1000, 9999);

        $user = new Deposite();

        $user->user_id = $u_info->user_id;
        $user->name = $request->input('name');
        $user->amount = $request->input('amount');

        $user->pay_mode = $request->input('pay_mode');
   
        $user->description = $request->input('description');
        $user->transaction_id =  $transactionId;
        $user->status = '0';
        $user->save();

        return redirect('all_deposite')->with('success', 'New Deposite requested has been generated');;

    }
    public function all_deposite()
    {
        $userId = session('s_user')['user_id'];
        $data = Deposite::where('user_id', $userId)->get();
        return view('user.all_deposite', compact('data'));
    }

    public function user_logout()
    {
        Session::forget('s_user');
        return redirect('/login');
    }
      

    public function explore_plans()
    {
        $data = Plan::orderBy('created_at', 'desc')->get();
        return view('admin.explore_plans', compact('data'));
    }
    
}
