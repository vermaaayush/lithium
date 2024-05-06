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
use App\Models\Accesscontrol;
use App\Models\Config;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Storage; 


class StockController extends Controller
{
    public function view_mystock($ivst_id)
    {

       
        $data = Investment::where(['investment_id'=>$ivst_id])->first();
          
        if ($data->status==1) {
            return redirect('my_investments');
        }

        $x=$data->plan_id;
       

        $plan_info = Plan::where(['plan_id'=>$x])->first();

        
    
        $filePath = asset('storage/' . $x.'.csv');

        $Stock =  Stock::where(['plan_id'=>$x])->first();
        $stock_value = $Stock->base_value;
      
         return view('user.view_mystock',  compact('data', 'filePath', 'plan_info', 'stock_value'));
    }


    public function close_mytrade(Request $request)
    {
       

        $data = Investment::where(['investment_id'=>$request->investment_id])->first();
        $data->status=1;
        $data->end_amount=$request->current_value;
        $data->save();

        $user_info = User::where(['user_id'=>$data->user_id])->first();

        if ($data->amount < $request->current_value) {

            $user_info->balance += $request->current_value; 
            $user_info->Earning += $request->current_value - $data->amount; 
            $user_info->save();

            $trx = new Transaction();

            $trx->user_id = $data->user_id;
            $trx->subject = 'Profit In Investment';
            $trx->name =  $user_info->name;
            $trx->amount = $request->current_value - $data->amount;
            $trx->status = 'Credit';
            $trx->save();

            

            //reff
            $ac = Accesscontrol::find(1);
            if ($ac->referral==1)
            {
                $profit =$request->current_value - $data->amount;
                $rf= User::where('user_id', $user_info->parent_id)->where('dlt_status', 0)->first();
                if ($rf) {
                    
                    $cfg = Config::find(1);
                    $percentage = $cfg->reff_trade_earning;
                    $amt = number_format(($percentage / 100) * $profit, 2);
    
                    $rf->balance +=$amt;
                    $rf->update();
    
                    $trx = new Transaction();
                    $trx->user_id = $rf->user_id;
                    $trx->subject = 'Commission';
                    $trx->name = 'Trade Profit Commission';
                    $trx->amount = $amt;
                    $trx->status = 'Credit';
                    $trx->save();
    
    
                    
                }
            }



            //Email
            $plan = Plan::where(['plan_id'=>$data->plan_id])->first();
            // $subject = 'Stock Sale Confirmation'; // Define the subject variable
            // $planname = 'User123'; // Replace 'User123' with the actual username
            // $investment_id = 'Password123'; // Replace 'Password123' with the actual password
            // $email = 'aayushverma200@gmail.com'; // Replace 'Password123' with the actual password
            
            Mail::send('emails.sell', [
                'subject' => 'Stock Sale Confirmation',
                'email' => $user_info->email,
                'user' => $user_info->name,
                'invest_id' => $request->investment_id,
                'amount' => $request->current_value,
                'plan_name' => $plan->name,
            ], function ($message) use ($user_info) {
                $message->to($user_info->email)->subject('Stock Sale Confirmation');
            });
            


        }
        else
        {
            $user_info->balance += $request->current_value; 
            //$user_info->Earning += $request->current_value - $data->amount; 
            $user_info->save();

            $trx = new Transaction();

            $trx->user_id = $data->user_id;
            $trx->subject = 'Loss In Investment';
            $trx->name =  $user_info->name;
            $trx->amount =  $data->amount - $request->current_value;
            $trx->status = 'LOSS';
            $trx->save();
        }
       

        return redirect('my_investments');
    }

    public function end_investment_plan(Request $request, $plan_id)
    {
            
        $data = Stock::where(['plan_id'=>$plan_id])->first();
        $base_value= $data->base_value;
        $up_limit= $data->up_limit;


        $investments = Investment::where(['plan_id'=>$plan_id])->get();

        foreach ($investments as $investment) {
          $amount =   $investment->amount;
          $invest_id =   $investment->investment_id;
   
          $investedMoneyValue = ($amount / $base_value) * $up_limit;
          
          $data = Investment::where(['investment_id'=>$invest_id])->first();
          $data->status=1;
          $data->end_amount=$request->investedMoneyValue;
          $data->save();

          $user_info = User::where(['user_id'=>$data->user_id])->first();
           

          if ($amount < $investedMoneyValue) {

            $user_info->balance += $investedMoneyValue; 
            $user_info->Earning += $investedMoneyValue - $amount; 
            $user_info->save();

            $trx = new Transaction();

            $trx->user_id = $data->user_id;
            $trx->subject = 'Profit In Investment';
            $trx->name =  $user_info->name;
            $trx->amount = $investedMoneyValue - $amount;
            $trx->status = 'Credit';
            $trx->save();


        }
        else
        {
            $user_info->balance += $investedMoneyValue; 
            //$user_info->Earning += $request->current_value - $data->amount; 
            $user_info->save();

            $trx = new Transaction();

            $trx->user_id = $data->user_id;
            $trx->subject = 'Loss In Investment';
            $trx->name =  $user_info->name;
            $trx->amount =  $amount - $investedMoneyValue;
            $trx->status = 'LOSS';
            $trx->save();
        }
       
           

        $plan = Plan::where(['plan_id'=>$plan_id])->first();
        $plan->status = 'Inactive';
        $plan->save();
         
        }
        
        return redirect('plans');

    }
}
