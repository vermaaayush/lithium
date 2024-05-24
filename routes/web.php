<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvestmentProgram;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api_admin;
use App\Http\Controllers\Api_user;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\BotxController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin_Auth;
use App\Http\Middleware\User_Auth;


// Admin routes
Route::get('/', [AdminController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);
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
    Route::get('/bw_view/{id}', [AdminController::class, 'bw_view']);
    Route::get('/all_investment', [AdminController::class, 'all_investment']);
    Route::get('/system_config', [AdminController::class, 'system_config']);
    Route::post('/system_config', [AdminController::class, 'update_system_config']);
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
    Route::get('/access_control', [AdminController::class, 'access_control']);
    Route::post('/access_control', [AdminController::class, 'update_access_control']);
    Route::get('/block_suspend/{id}', [AdminController::class, 'block_suspend']);
    Route::get('/activate_user/{id}', [AdminController::class, 'activate_user']);
    Route::get('/blacklisted_user', [AdminController::class, 'blacklisted_user']);
    Route::get('/newsletter', [AdminController::class, 'newsletter']);
    Route::post('/send_newsletter', [AdminController::class, 'send_newsletter']);
    Route::get('/all_newsletter', [AdminController::class, 'all_newsletter']);
    Route::get('/delete_plan/{id}', [InvestmentProgram::class, 'delete_plan']);

    Route::get('/user_transfer', function () { return view('admin.user_transfer'); });
    Route::get('/api_user_transfer', [Api_admin::class, 'api_user_transfer']);

    Route::get('/trs_history', function () { return view('admin.history'); });
    Route::get('/api_history', [Api_admin::class, 'api_history']);

    Route::get('/api_dashboard', [Api_admin::class, 'api_dashboard']);
    Route::get('/api_ip_logs', [Api_admin::class, 'api_ip_logs']);
    
    Route::post('/add_bonus', [AdminController::class, 'add_bonus']);
    Route::get('/add_bonus', function () { return view('admin.add_bonus'); });

    Route::post('/add_penalty', [AdminController::class, 'add_penalty']);
    Route::get('/add_penalty', function () { return view('admin.add_penalty'); });
    
    Route::get('/ip_logs', [AdminController::class, 'ip_logs']);

    Route::get('/referral', [AdminController::class, 'referral']);
    Route::post('/update_referral', [AdminController::class, 'update_referral']);

    Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);
    Route::get('/bw_reject/{id}', [AdminController::class, 'bw_reject']);

    Route::get('/id_approve/{id}', [AdminController::class, 'id_approve']);
    Route::get('/id_reject/{id}', [AdminController::class, 'id_reject']);

    Route::get('/address_approve/{id}', [AdminController::class, 'address_approve']);
    Route::get('/address_reject/{id}', [AdminController::class, 'address_reject']);

    Route::get('/c_password', [AdminController::class, 'c_password']);
    Route::post('/c_password', [AdminController::class, 'u_password']);


   
    




    
    
    
 
    
    

    
});


// User routes
Route::get('/login', function () { return view('user.login'); });
Route::get('/signup', function () { return view('user.register'); });
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);

// User routes
Route::middleware([User_Auth::class])->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::get('/authentication', [UserController::class, 'authentication']);
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
    Route::get('/identity_form', function () { return view('user.identity_form'); });
    Route::get('/address_form', function () { return view('user.address_form'); });
    Route::get('/api_send_otp', [Api_user::class, 'api_send_otp']);
    Route::post('/validate_email_otp', [UserController::class, 'validate_email_otp']);
    Route::get('/notifications', [UserController::class, 'notifications']);
    Route::get('/all_transfer', [UserController::class, 'all_transfer']);
    Route::get('/portfolio', [UserController::class, 'portfolio']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/update_profile', [UserController::class, 'update_profile']);
    Route::post('/update_password', [UserController::class, 'update_password']);
    Route::get('/manage_password',function () { return view('user.manage_password'); });
    Route::get('/api_portfolio', [Api_user::class, 'api_portfolio']);
    Route::get('/api_port_cp', [Api_user::class, 'api_port_cp']);
    Route::get('/api_dash', [Api_user::class, 'api_dash']);
    Route::get('/api_header_notification', [Api_user::class, 'api_header_notification']);
    Route::get('/export_history', [UserController::class, 'export_history']);
    Route::get('/my_referrals', [UserController::class, 'my_referrals']);
    Route::get('/contact_us',function () { return view('user.contact_us'); });
    Route::get('/crypto_pay', function () { return view('user.crypto_pay'); });
    Route::post('/contact_Send', [UserController::class, 'contact_Send']);
    

    

    
    
    

    

    

    
    


    
    
    
   
});






// side extra routes
Route::post('/test', [UserController::class, 'test']);
Route::get('/run_invest_checker', [CronJobController::class, 'index']);
Route::get('/run_botx', [BotxController::class, 'index']);
Route::get('/dummy_cronjob', function () { return view('user.dummy_cronjob'); });

Route::get('/someMethod', [AdminController::class, 'someMethod']);


Route::get('/api_graphpoints/{plan_id}', [Api_admin::class, 'api_graphpoints']);

Route::get('/api_currentpoint/{plan_id}', [Api_admin::class, 'api_currentpoint']);
Route::get('/ipn', [UserController::class, 'logIPNData']);
?>






