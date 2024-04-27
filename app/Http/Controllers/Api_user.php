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
}
