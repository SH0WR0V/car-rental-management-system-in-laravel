<?php

use App\Http\Controllers\customer\api_car_service_customer_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[LoginAPIController::class,'login']); 
Route::post('/registration',[LoginAPIController::class,'registration']); 
Route::post('/logout',[LoginAPIController::class,'logout']); 
Route::get('/dashboard_customer',[api_car_service_customer_controller::class,'dashboard_customer']); 
Route::get('/view_car_list',[api_car_service_customer_controller::class,'view_car_list'])->middleware('APICustomer'); 
Route::get('/notice',[api_car_service_customer_controller::class,'notice'])->middleware('APICustomer'); 
