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
use App\Models\Transfer;
use App\Models\Transaction;
use App\Models\Withrawal;
use App\Models\Investment;
use App\Models\Iplog;

    class Api_admin extends Controller
    {
        //
        public function api_user_transfer()
        {
            try {
                $transfers = Transfer::orderBy('created_at', 'desc')->get();
    
                if ($transfers->isEmpty()) {
                    return response()->json(['message' => 'No transfers found.'], Response::HTTP_NOT_FOUND);
                }
    
                return response()->json($transfers, Response::HTTP_OK);
            } catch (\Exception $e) {
                return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        public function api_history()
        {
            try {
                $transfers = Transaction::orderBy('created_at', 'desc')->limit(10)->get();
    
                if ($transfers->isEmpty()) {
                    return response()->json(['message' => 'No transfers found.'], Response::HTTP_NOT_FOUND);
                }
    
                return response()->json($transfers, Response::HTTP_OK);
            } catch (\Exception $e) {
                return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        public function api_ip_logs()
        {
            try {
                $ip_logs = Iplog::orderBy('created_at', 'desc')->limit(10)->get();
    
                if ($ip_logs->isEmpty()) {
                    return response()->json(['message' => 'No transfers found.'], Response::HTTP_NOT_FOUND);
                }
    
                return response()->json($ip_logs, Response::HTTP_OK);
            } catch (\Exception $e) {
                return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }


        public function api_dashboard()
        {
            $x = User::orderBy('created_at', 'desc')->get();
            $totalUsers = $x->count();

            $total_deposite = Deposite::sum('amount');
            
            $currentDate = Carbon::today();
            $today_deposite = Deposite::whereDate('created_at', $currentDate)->sum('amount');

            $withraw = Withrawal::sum('amount');
            
            
            $usersWithTopDeposits = User::orderByDesc('deposite')->limit(10)->get();
            //return  $usersWithTopDeposits;


         
            $top_depsoite = Deposite::orderBy('created_at', 'desc')->limit(8)->get();
            //return  $top_depsoite;

            $top_withraw = Withrawal::orderBy('created_at', 'desc')->limit(8)->get();
            //return  $top_withraw;


 
            $data = [
                'totalUsers' => $totalUsers,
                'totalDeposite' => $total_deposite,
                'todayDeposite' => $today_deposite,
                'withdrawalTotal' => $withraw,
                'usersWithTopDeposits' => $usersWithTopDeposits,
                'top_depsoite' => $top_depsoite,
                'top_withraw' => $top_withraw
            ];
            return response()->json($data, Response::HTTP_OK);
        }
    }
