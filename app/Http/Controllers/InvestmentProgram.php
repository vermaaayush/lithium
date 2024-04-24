<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use App\Models\Stock;
use App\Models\Investment;
use App\Models\Transaction;
use Carbon\Carbon; 
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
        // $plan->period = $request->input('period');
        $plan->duration = $request->input('duration');

        $plan->risk = $request->input('risk');
        $plan->compounding = $request->input('compounding');
        $plan->compound_perc = $request->input('compound_perc');
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

        
        $stock = new Stock();
        $stock->plan_id = $randomNumber;
        $stock->base_value = $request->input('base_value');
        $stock->down_limit = $request->input('down_limit');
        $stock->up_limit = $request->input('up_limit');
        $stock->status = 1;
        $stock->save();
      
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
        $planId = $p_info->plan_id;
      
        $filePath = asset('storage/' . $planId.'.csv');
        $stock = Stock::where(['plan_id'=>$planId])->first();
        $s_value= $stock->base_value;
        return view('admin.view_plan', compact('p_info', 'filePath', 's_value'));
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
        $plan->compound_perc = $request->input('compound_perc');
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

    public function invest_in(Request $request,$user_id)
    {
        $randomNumber = rand(100000, 999999); 

        $amount = $request->input('amount');
         
        $investment = new Investment();
        $investment->investment_id = $randomNumber;
        $investment->user_id = $user_id; // Assuming user_id is the ID of the user who is investing
        $investment->plan_id = $request->input('plan_id');
        $investment->amount =  $amount;
        $investment->name = $request->input('name');
       
        $investment->save();

        $plan = Plan::where('plan_id', $request->plan_id)->first();
        $plan->total_invested += $amount; 
        $plan->save();


        $user = User::where('user_id', $request->user_id)->first();
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


    public function trade_now($id)
    {
            $u_id=session('s_user')['id'];
            $user = User::find($u_id);
            $plan = Plan::find($id);
            return view('user.invest_form', compact('user'), compact('plan'));
    }

    public function trade_in(Request $request)
    {

      
        $start_date = Carbon::now()->toDateTimeString();
    
        // Extract duration (in days) from the request
        $duration = (int)$request->input('duration');
    
        // Calculate the end date by adding the duration to today's date
        $endDate = Carbon::now()->addDays($duration)->toDateTimeString();


        $randomNumber = rand(100000, 999999); 

        $amount = $request->input('amount');
        
        $investment = new Investment();
        $investment->investment_id = $randomNumber;
        $investment->user_id = $request->input('user_id');
        $investment->plan_id = $request->input('plan_id');
        $investment->amount =  $amount;
        $investment->name = $request->input('user_name');
        $investment->start_date =  $start_date;
        $investment->end_date =  $endDate;
        $investment->status =  0;

        $investment->save();

      
        $plan = Plan::where('plan_id', $request->plan_id)->first();
        $plan->total_invested += $amount; 
        $plan->no_of_users += 1; 
        $plan->save();

        
        $user = User::where('user_id', $request->user_id)->first();
        $user->funded += $amount; 
        $user->balance -= $amount; 
        
        
        $user->save();

        $trx = new Transaction();

        $trx->user_id = $request->user_id;
        $trx->subject = 'Investment';
        $trx->name =  $plan->name;
        $trx->amount = $amount;
        $trx->status = 'debit';
        $trx->save();


        //email


        $data = [
            'message' => 'Investment successful!',
            'amount' => 1000,
            'plan_name' => $plan->name,
            'user_name'=> $user->name,
            'investment_id'=>$randomNumber,

        ];

    
        
        // return view('user.invest_success',compact('data'));
        session(['invest_success_data' => $data]);
        return redirect()->route('invest.success');
        
  
    }

    // app/Http/Controllers/InvestmentController.php

public function showInvestSuccess(Request $request)
{
    // Retrieve data from session
    $data = session('invest_success_data');
    
    //return $data;


    return view('user.invest_success',compact('data'));
}

}
