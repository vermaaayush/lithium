<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use App\Models\Investment;
class InvestmentProgram extends Controller
{
    public function add_plan(Request $request)
    {
        


        $randomNumber = rand(100000, 999999); 

        $plan = new Plan();

        $plan->plan_id = $randomNumber;
        $plan->name = $request->input('name');
        $plan->status = $request->input('status');
        $plan->roi = $request->input('roi');
        $plan->minimum_amount = $request->input('minimum_amount');
        $plan->period = $request->input('period');
        $plan->duration = $request->input('duration');

        $plan->risk = $request->input('risk');
        $plan->compounding = $request->input('compounding');
        $plan->principal_release = $request->input('principal_release');
        $plan->release_fee = $request->input('release_fee');
        $plan->description = $request->input('description');
      
        if ($request->hasFile('plan_image')) {
            $uploadedFile = $request->file('plan_image');
        
            // Generate a unique file name
            $fileName = uniqid('plan_image_') . '.' . $uploadedFile->getClientOriginalExtension();
        
            // Define the storage path relative to the public directory
            $folderPath = 'upload/plans';
        
            // Move the uploaded file to the storage path
            $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
        
            if ($storedFilePath) {
                // File moved successfully, update database or perform other operations
                $plan->image = $folderPath . '/' . $fileName;
                // Save the $plan object or perform other operations as needed
            }
        }
        
        

        $plan->save();

        // Redirect to a success page or return a response
        return redirect('plans')->with('success', 'Investment plan created successfully');

    }

    public function plans()
    {
        $plan = Plan::all();
        return view('admin.all_plans', compact('plan'));
    }

    public function view_plan($id)
    {
        $p_info = Plan::find($id);
        return view('admin.view_plan', compact('p_info'));
    }

    public function edit_plan(Request $request,$id)
    {
        $plan = Plan::find($id);
        
        $plan->name = $request->input('name');
        $plan->status = $request->input('status');
        $plan->roi = $request->input('roi');
        $plan->minimum_amount = $request->input('minimum_amount');
        $plan->period = $request->input('period');
        $plan->duration = $request->input('duration');

        $plan->risk = $request->input('risk');
        $plan->compounding = $request->input('compounding');
        $plan->principal_release = $request->input('principal_release');
        $plan->release_fee = $request->input('release_fee');
        $plan->description = $request->input('description');
      
        if ($request->hasFile('plan_image')) {
            $uploadedFile = $request->file('plan_image');
        
            // Generate a unique file name
            $fileName = uniqid('plan_image_') . '.' . $uploadedFile->getClientOriginalExtension();
        
            // Define the storage path relative to the public directory
            $folderPath = 'upload/plans';
        
            // Move the uploaded file to the storage path
            $storedFilePath = $uploadedFile->move(public_path($folderPath), $fileName);
        
            if ($storedFilePath) {
                // File moved successfully, update database or perform other operations
                $plan->image = $folderPath . '/' . $fileName;
                // Save the $plan object or perform other operations as needed
            }
        }

        $plan->update();
        return back()->with('success', 'Investment plan updated successfully');
    }


    public function invest_now($id)
    {
        $user = User::find($id);
        $plan = Plan::all();
        return view('admin.plan_investment', compact('user'), compact('plan')); 
    }

    public function invest_in(Request $request,$id)
    {
        $randomNumber = rand(100000, 999999); 

        $amount = $request->input('amount');
         
        $investment = new Investment();
        $investment->investment_id = $randomNumber;
        $investment->user_id = $id; // Assuming user_id is the ID of the user who is investing
        $investment->plan_id = $request->input('plan_id');
        $investment->amount =  $amount;
        $investment->name = $request->input('name');
       
        $investment->save();

        $plan = Plan::where('plan_id', $request->plan_id)->first();
        $plan->total_invested += $amount; 
        $plan->save();

        $user = User::find($id);
        $user->funded += $amount; 
        $user->balance -= $amount; 
        
        
        $user->save();




        //in investment, add amount + , and + user 
        // check minimum amount
        //remove funds from wallet
        //success page
        //email
        // time cron code
        return back()->with('success', 'Your amount has been invested successfully');
    }


    public function v_plan($id)
    {
            return $id;
    }
}
