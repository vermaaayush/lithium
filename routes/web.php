<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvestmentProgram;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api_admin;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\BotxController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin_Auth;
use App\Http\Middleware\User_Auth;

Route::get('/', function () {
    return view('admin.login');
});

// Admin routes

Route::get('/admin', function () { return view('admin.login'); });
Route::post('/admin_login',[AdminController::class,'login']);

// Admin auth routes
Route::middleware([Admin_Auth::class])->group(function () {
    Route::get('/admin_dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/add_user', [AdminController::class, 'add_user']);
    Route::post('/add_user', [AdminController::class, 'insert_user']);
    Route::get('/veiw_user/{id}', [AdminController::class, 'veiw_user']);
    Route::post('/edit_user/{id}', [AdminController::class, 'edit_user']);
    Route::get('/funds/{id}', [AdminController::class, 'funds']);
    Route::post('/add_balance/{id}', [AdminController::class, 'add_balance']);
    Route::get('/deposits', [AdminController::class, 'deposits']);
    Route::get('/app_depo/{id}', [AdminController::class, 'app_depo']);
    Route::get('/all_investment', [AdminController::class, 'all_investment']);
    Route::get('/system_config', [AdminController::class, 'system_config']);
    Route::get('/bank_info', [AdminController::class, 'bank_info']);
    Route::post('/update_bank', [AdminController::class, 'update_bank']);
    Route::get('/withrawals', [AdminController::class, 'withrawals']);
    Route::get('/app_withdrawal/{id}', [AdminController::class, 'app_withdrawal']);
    Route::get('/admin_logout', [AdminController::class, 'admin_logout']);
    Route::get('/add_plan', function () { return view('admin.add_plan'); });
    Route::post('/add_plan', [InvestmentProgram::class, 'add_plan']);
    Route::get('/plans', [InvestmentProgram::class, 'plans']);
    Route::get('/view_plan/{id}', [InvestmentProgram::class, 'view_plan']);
    Route::post('/edit_plan/{id}', [InvestmentProgram::class, 'edit_plan']);
    Route::get('/invest_now/{id}', [InvestmentProgram::class, 'invest_now']);
    Route::post('/invest_in/{user_id}', [InvestmentProgram::class, 'invest_in']);
    Route::get('/end_investment_plan/{plan_id}', [StockController::class, 'end_investment_plan']);
});


// User routes
Route::get('/login', function () { return view('user.login'); });
Route::get('/signup', function () { return view('user.register'); });
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);

// Admin User routes
Route::middleware([User_Auth::class])->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::get('/auth', [UserController::class, 'user_kyc']);
    Route::post('/id_verification', [UserController::class, 'id_verification']);
    Route::post('/add_verify', [UserController::class, 'add_verify']);
    Route::get('/deposite_funds', function () { return view('user.deposite_funds'); });
    Route::get('/deposite_req', function () { return view('user.deposite_req'); });
    Route::post('/deposite_funds', [UserController::class, 'deposite_funds']);
    Route::get('/all_deposite', [UserController::class, 'all_deposite']);
    Route::get('/user_logout', [UserController::class, 'user_logout']);
    Route::get('/explore_plans', [UserController::class, 'explore_plans']);
    Route::get('/trade_now/{id}', [InvestmentProgram::class, 'trade_now']);
    Route::post('/trade_in', [InvestmentProgram::class, 'trade_in']);
    Route::get('/invest/success', [InvestmentProgram::class, 'showInvestSuccess'])->name('invest.success');
    Route::get('/my_investments', [UserController::class, 'my_investments']);
    Route::get('/transfer', function () { return view('user.transfer'); });
    Route::post('/transfer', [UserController::class, 'transfer']);
    Route::post('/transfer_now', [UserController::class, 'transfer_now']);
    Route::get('/success_transfer', [UserController::class, 'success_transfer']);
    Route::get('/v_plan/{id}', [UserController::class, 'v_plan']);
    Route::get('/bank_wire', [UserController::class, 'bank_wire']);
    Route::post('/wire_deposite', [UserController::class, 'wire_deposite']);
    Route::post('/upload_bw_proof/{tx_id}', [UserController::class, 'upload_bw_proof']);
    Route::get('/history', [UserController::class, 'history']);
    Route::get('/view_mystock/{ivst_id}', [StockController::class, 'view_mystock']);
    Route::post('/close_mytrade', [StockController::class, 'close_mytrade']);
    Route::get('/withraw_funds', [UserController::class, 'withraw_funds']);
    Route::post('/add_withrawal', [UserController::class, 'add_withrawal']);
    Route::get('/all_withrawal', [UserController::class, 'all_withrawal']);
    
   
});






// side extra routes
Route::get('/test', [UserController::class, 'test']);
Route::get('/run_invest_checker', [CronJobController::class, 'index']);
Route::get('/run_botx', [BotxController::class, 'index']);
Route::get('/dummy_cronjob', function () { return view('user.dummy_cronjob'); });



?>






