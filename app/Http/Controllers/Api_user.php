<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Deposite;
use App\Models\Transfer;
use App\Models\Transaction;
use App\Models\Withrawal;
use Illuminate\Support\Facades\Session;
use App\Models\Investment;
use App\Models\Notification;
use App\Models\Plan;
use App\Models\Stock;
use Illuminate\Support\Facades\Mail;


class Api_user extends CompanyController
{
    public function api_send_otp()
    {
        $subject = 'Security Authentication Code'; // Define the subject variable
        $email = session('s_user')['email'];
        $user = session('s_user')['name'];
        $companyName= $this->companyData->name;
        $otpCode = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $data = [
            'subject' => $subject,
            'email' => $email,
            'user' => $user,
            'otpCode' => $otpCode,
            'companyName' => $companyName,
        ];
       
        try {
            Mail::send('emails.auth', $data, function ($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
        
            // Email sent successfully
            Session::put('otp_code', $otpCode);

            return response()->json(['message' => 'Email sent successfully'], 200);
        } catch (\Exception $e) {
            // Error occurred while sending email
            return response()->json(['error' => 'Error sending email: ' . $e->getMessage()], 500);
        }

    }

    public function api_portfolio()
    {
        $userId = session('s_user')['user_id'];
        $data = Investment::where('user_id', $userId)
        ->where('status', 0) 
        ->orderBy('created_at', 'desc')
        ->get();
        // return $data;

        $investments = [];
 
        foreach ($data as $investment) {
            $p_data = Plan::where('plan_id', $investment->plan_id)->first();
            $filePath = asset('storage/' . $investment->plan_id . '.csv');
            $stock = Stock::where('plan_id', $investment->plan_id)->first();
            $stock_value = $stock->base_value;
        
            $investments[] = [
                'filePath' => $filePath,
                'stock_value' => $stock_value,
                't_investment' => $investment->amount,
                'plan_name' => $p_data->name,
                'investment_id' => $investment->investment_id,
                'img'=>$p_data->image,
            ];
        }

        return response()->json(['investments' => $investments]);
       

    }

    public function api_dash()
    {
        $userId = session('s_user')['user_id'];
        $user = User::where('user_id', $userId)->first();
        $investment = Investment::where('user_id', $userId)->orderBy('created_at', 'desc')->take(5)->get();
        $transfer = Transfer::where('user_id', $userId)->orderBy('created_at', 'desc')->take(5)->get();
        $transaction = Transaction::where('user_id', $userId)->orderBy('created_at', 'desc')->take(8)->get();
        $plans = Plan::where('dlt_status', 0)->orderBy('created_at', 'desc')->take(4)->get();
       


        $data = [
            'balance' => $user->balance,
            'deposite' => $user->deposite,
            'invested' => $user->funded,
            'earning' => $user->Earning,
            'investment' => $investment,
            'transfer' => $transfer,
            'transaction' => $transaction,
            'plans' => $plans,
            
        ];

        return $data;



    }

    public function api_header_notification()
    {
        $userId = session('s_user')['user_id'];
        $data = Notification::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        return $data;
    }
}
