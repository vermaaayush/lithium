<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use App\Models\Investment;
use Carbon\Carbon; 


class CronJobController extends Controller
{
    public function index()
    {
        $data = Investment::all();
        return $data;
    }
}
