<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvestmentProgram;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api_admin;

Route::get('/', function () {
    return view('admin.login');
});

// Route::get('/login', [AdminController::class, 'index'])->name('login');

Route::get('/admin', function () { return view('admin.login'); });

Route::get('/xxx',[AdminController::class,'login']);
Route::post('/admin_login',[AdminController::class,'login']);



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




Route::get('/add_plan', function () { return view('admin.add_plan'); });
Route::post('/add_plan', [InvestmentProgram::class, 'add_plan']);
Route::get('/plans', [InvestmentProgram::class, 'plans']);
Route::get('/view_plan/{id}', [InvestmentProgram::class, 'view_plan']);
Route::post('/edit_plan/{id}', [InvestmentProgram::class, 'edit_plan']);
Route::get('/invest_now/{id}', [InvestmentProgram::class, 'invest_now']);
Route::post('/invest_in/{id}', [InvestmentProgram::class, 'invest_in']);



























Route::group(['middleware' => 'admin_auth'], function () {
    
//space for middleware, for final release
  
});




















// user web routes


Route::get('/login', function () { return view('user.login'); });
Route::get('/signup', function () { return view('user.register'); });
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::get('/auth', [UserController::class, 'user_kyc']);
Route::post('/id_verification', [UserController::class, 'id_verification']);
Route::post('/add_verify', [UserController::class, 'add_verify']);
Route::get('/deposite_funds', function () { return view('user.deposite_funds'); });
Route::post('/deposite_funds', [UserController::class, 'deposite_funds']);
Route::get('/all_deposite', [UserController::class, 'all_deposite']);
Route::get('/user_logout', [UserController::class, 'user_logout']);
Route::get('/explore_plans', [UserController::class, 'explore_plans']);
Route::get('/v_plan/{id}', [InvestmentProgram::class, 'v_plan'])->name('invest-now/{id}');



















?>






