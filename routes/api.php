<?php

use App\Http\Controllers\customer\api_car_service_customer_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserControlByAdminController;
use App\Http\Controllers\Admin\BlockUserController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\AdminApprovalController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\MessageController;

use App\Http\Controllers\LoginAPIController;

//Customer
use App\Http\Controllers\customer\car_service_customer_controller;

//Renter
use APP\Http\Controllers\renter\car_service_renter_controller;
use App\Http\Controllers\renter\api_car_service_renter_controller;

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

//Admin

Route::post('dashboard_admin',[AdminController::class,'dashboard_admin'])->middleware('APICustomer');

// Route::get('Users_Add_By_Admin',[AdminController::class,'users_add_by_admin']);

Route::get('custorans_List',[AdminController::class,'custorans_list']);
Route::get('Renter_List',[AdminController::class,'renter_list']);

Route::get('User_Details/{id}',[AdminController::class,'user_details']);
                                        //Block_user
Route::get('BlockUser_Details/{id}',[AdminController::class,'blockuser_details']);
Route::get('Block_Users_List',[AdminController::class,'block_users_list']);
Route::get('Block_Users_List/{id}',[BlockUserController::class,'add_block']);
Route::get('Unblock_Users/{id}',[BlockUserController::class,'delete_block']);
Route::get('Search_Blockuser_result',[BlockUserController::class,'block_users_search']);

                                        //car
Route::get('Add_Car_By_Admin',[AdminController::class,'add_car_by_admin']);
Route::post('AddCarByAdmin',[CarController::class,'add_car']);
Route::get('Delete_Car_By_Admin/{id}',[CarController::class,'delete_car']);
Route::get('Edit_Car_By_Admin_view/{id}',[CarController::class,'edit_car_view']);
Route::post('editCarByAdmin/{edit_id}',[CarController::class,'edit_car']);
Route::get('Search_cars_result',[CarController::class,'search_car']);
Route::get('single_car_details_view/{id}',[CarController::class,'single_car_details_view']);
Route::get('Cars_List',[AdminController::class,'cars_list']);

                                    //approval
Route::get('Admin_Approval',[AdminController::class,'admin_approval']);
Route::get('approv_add/{id}',[AdminApprovalController::class,'approv_add']);
Route::get('approv_delete/{id}',[AdminApprovalController::class,'approv_delete']);
Route::get('single_approvals_details/{id}',[AdminApprovalController::class,'single_approvals_details']);

                                    ///History
Route::get('Rent_History',[AdminController::class,'rent_history']);
Route::get('single_history_view/{id}',[HistoryController::class,'single_history_view']);
Route::post('history_delete',[HistoryController::class,'history_delete']);
                                    //message
Route::get('Admin_Message_List',[AdminController::class,'admin_message_list']);
Route::get('message_view/{id}',[MessageController::class,'message_view']);
Route::post('send_message',[MessageController::class,'send_message']);

Route::get('Admin_Notice',[AdminController::class,'admin_notice']);
Route::get('notice_edit_view/{id}',[NoticeController::class,'notice_edit_view']);
Route::post('notice_edit/{id}',[NoticeController::class,'notice_edit']);
Route::get('Admin_Notice_delete/{id}',[NoticeController::class,'notice_delete']);
Route::get('Admin_Notice_list',[NoticeController::class,'notice_view']);
Route::post('Notice',[NoticeController::class,'admin_add_notice']);


Route::post('Users_Add_By_Admin',[UserControlByAdminController::class,'users_add']);
Route::get('Users_Edit_By_Admin/{id}',[UserControlByAdminController::class,'users_edit']);
Route::post('Edit_By_Admin/{edit_id}',[UserControlByAdminController::class,'edit']);
Route::get('search_user_result',[UserControlByAdminController::class,'users_search']);


Route::get('Posts_Mannage',[AdminController::class,'posts_mannage']);
Route::get('Reviews_Manage',[AdminController::class,'reviews_manage']);

Route::post('send_notification',[AdminController::class,'notification']);

//Customer
Route::post('/login',[LoginAPIController::class,'login']); 
Route::post('/registration',[LoginAPIController::class,'registration']); 
Route::post('/logout',[LoginAPIController::class,'logout']); 
Route::post('/dashboard_customer',[api_car_service_customer_controller::class,'dashboard_customer'])->middleware('APICustomer'); 
Route::post('/post_for_a_car',[api_car_service_customer_controller::class,'post_for_a_car']);
Route::get('my_posts',[api_car_service_customer_controller::class,'my_posts']);
Route::get('/my_posts_delete/{id}',[api_car_service_customer_controller::class,'my_posts_delete']);
Route::get('/view_car_list',[api_car_service_customer_controller::class,'view_car_list'])->middleware('APICustomer'); 
Route::get('/notice',[api_car_service_customer_controller::class,'notice'])->middleware('APICustomer'); 
Route::get('view_car_list_details/{id}',[api_car_service_customer_controller::class,'view_car_list_details']);
Route::post('payment_done',[api_car_service_customer_controller::class,'done']);

//renter
Route::post('/dashboard_renter',[api_car_service_renter_controller::class,'dashboard_renter']); 
Route::post('/car_list',[api_car_service_renter_controller::class,'car_list']); 
Route::get('/notice',[api_car_service_renter_controller::class,'notice']);
Route::post('/add_new_car',[api_car_service_renter_controller::class,'add_new_car']);
