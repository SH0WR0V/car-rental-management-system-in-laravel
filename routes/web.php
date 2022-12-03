<?php

use App\Http\Controllers\customer\car_service_customer_controller;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/login',[CustomAuthController::class,'login'])->name('login');
Route::get('registration',[CustomAuthController::class,'registration']);

Route::post('register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('dashboard_customer',[car_service_customer_controller::class,'dashboard_customer'])->middleware('customer')->name('customer dashboard');

Route::get('edit_profile',[car_service_customer_controller::class,'edit_profile'])->middleware('customer')->name('edit_profile');
Route::post('edit_profile',[car_service_customer_controller::class,'edit_profile_submit'])->name('edit_profile_submit');