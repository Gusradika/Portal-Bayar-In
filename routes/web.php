<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('view-login'));
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'viewLogin')->middleware('guest')->name('view-login');
    Route::get('/register-user', 'viewRegister')->middleware('guest')->name('view-register');
    Route::get('/register-tenant', 'viewRegisterTenant')->middleware('guest')->name('view-register-tenant');

    Route::post('/authenticate', 'authenticate')->middleware('guest')->name('authenticate');
    Route::post('/register', 'register')->middleware('guest')->name('register');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});



Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'viewDashboard')->middleware('auth')->name('view-dashboard');
    Route::get('/report-analytic', 'viewReport')->middleware('auth')->name('view-report');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user-list', 'viewUserList')->middleware('auth')->name('view-user-list');
    Route::get('/user/view-user-detail', 'viewUserDetail')->middleware('auth')->name('view-user-detail');
    Route::get('/user/udpdate/{user:id}', 'viewUpdateUser')->middleware('auth')->name('view-user-update');
    Route::post('/user/save-update', 'updateUser')->middleware('auth')->name('update-user');
    Route::post('/user/delete-user', 'deleteUser')->middleware('auth')->name('delete-user');

    Route::get('/user/top-up', 'viewTopUp')->middleware('auth')->name('view-top-up');
});

Route::controller(TenantController::class)->group(function () {
    Route::get('/tenant-list', 'viewTenantList')->middleware('auth')->name('view-tenant-list');
});

Route::controller(SeatController::class)->group(function () {
    Route::get('/seat-list', 'viewSeatList')->middleware('auth')->name('view-seat-list');
});
