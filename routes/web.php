<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\customer\car_service_customer_controller;
use App\Http\Controllers\Admin\UserControlByAdminController;
use App\Http\Controllers\Admin\BlockUserController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login',[CustomAuthController::class,'login'])->name('login');
Route::get('registration',[CustomAuthController::class,'registration']);

Route::post('register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
//Admin
Route::get('dashboard_admin',[AdminController::class,'dashboard_admin'])->middleware('admin')->name('admin dashboard');

Route::get('Users_Add_By_Admin',[AdminController::class,'users_add_by_admin'])->middleware('admin')->name('users add by admin');

Route::get('Admin_custorans_List',[AdminController::class,'custorans_list'])->middleware('admin')->name('admin custorans list');
Route::get('Renter_List',[AdminController::class,'renter_list'])->middleware('admin')->name('admin renter list');

Route::get('User_Details/{id}',[AdminController::class,'user_details'])->middleware('admin')->name('admin single user details');
Route::get('BlockUser_Details/{id}',[AdminController::class,'blockuser_details'])->middleware('admin')->name('admin single blockuser details');

Route::get('Block_Users_List',[AdminController::class,'block_users_list'])->middleware('admin')->name('admin block users list');
Route::get('Block_Users_List/{id}',[BlockUserController::class,'add_block'])->middleware('admin')->name('admin block');
Route::get('Unblock_Users_List/{id}',[BlockUserController::class,'delete_block'])->middleware('admin')->name('admin unblock');

Route::get('Add_Car_By_Admin',[AdminController::class,'add_car_by_admin'])->middleware('admin')->name('add car by admin');
Route::get('Cars_List',[AdminController::class,'cars_list'])->middleware('admin')->name('cars list');

Route::get('Admin_Approval',[AdminController::class,'admin_approval'])->middleware('admin')->name('admin approval');

Route::get('Rent_History',[AdminController::class,'rent_history'])->middleware('admin')->name('rent history');

Route::get('Admin_Message_List',[AdminController::class,'admin_message_list'])->middleware('admin')->name('admin message list');

Route::get('Admin_Notice',[AdminController::class,'admin_notice'])->middleware('admin')->name('admin notice');


Route::post('Users_Add_By_Admin',[UserControlByAdminController::class,'users_add'])->middleware('admin')->name('users add');
Route::get('Users_Edit_By_Admin/{id}',[UserControlByAdminController::class,'users_edit'])->middleware('admin')->name('admin edit');
Route::post('Edit_By_Admin/{edit_id}',[UserControlByAdminController::class,'edit'])->middleware('admin')->name('edit');


Route::get('Posts_Mannage',[AdminController::class,'posts_mannage'])->middleware('admin')->name('posts mannage');
Route::get('Reviews_Manage',[AdminController::class,'reviews_manage'])->middleware('admin')->name('reviews manage');

//Renter
Route::get('dashboard_renter',[CustomAuthController::class,'dashboard_renter'])->middleware('renter');


//Customer
// Route::get('dashboard_admin',[AdminController::class,'dashboard_admin'])->middleware('admin')->name('admin dashboard');
//Route::get('dashboard_customer',[CustomAuthController::class,'dashboard_customer'])->middleware('customer')->name('dashboard_customer');
Route::get('dashboard_customer',[car_service_customer_controller::class,'dashboard_customer'])->middleware('customer')->name('customer dashboard');
Route::get('edit_profile',[car_service_customer_controller::class,'edit_profile'])->middleware('customer')->name('edit_profile');
Route::post('edit_profile',[car_service_customer_controller::class,'edit_profile_submit'])->name('edit_profile_submit');


Route::get('messageCustomer',[car_service_customer_controller::class,'messageCustomer'])->middleware('customer')->name('messageCustomer');
Route::get('my_posts',[car_service_customer_controller::class,'my_posts'])->middleware('customer')->name('my_posts');
Route::get('my_posts_edit/{id}',[car_service_customer_controller::class,'my_posts_edit'])->middleware('customer')->name('my_posts_edit');
Route::post('my_posts_edit',[car_service_customer_controller::class,'my_posts_edit_submit'])->name('my_posts_edit_submit');
Route::get('my_posts_delete/{id}',[car_service_customer_controller::class,'my_posts_delete'])->middleware('customer')->name('my_posts_delete');
Route::get('post_for_a_car',[car_service_customer_controller::class,'post_for_a_car'])->middleware('customer')->name('post_for_a_car');
Route::post('post_for_a_car',[car_service_customer_controller::class,'post_for_a_car_submit'])->name('post_for_a_car_submit');
Route::get('view_car_list',[car_service_customer_controller::class,'view_car_list'])->middleware('customer')->name('view_car_list');
Route::get('view_car_list_details/{id}',[car_service_customer_controller::class,'view_car_list_details'])->middleware('customer')->name('view_car_list_details');
Route::post('search_view_car_list',[car_service_customer_controller::class,'search_view_car_list'])->middleware('customer')->name('search_view_car_list');
Route::get('car_rent/{id}',[car_service_customer_controller::class,'car_rent_view'])->middleware('customer')->name('rent_view');
Route::get('payment_view/{id}',[car_service_customer_controller::class,'payment'])->middleware('customer')->name('payment');
Route::post('payment_done',[car_service_customer_controller::class,'done'])->middleware('customer')->name('done');
Route::get('check_notices',[car_service_customer_controller::class,'check_notices'])->middleware('customer')->name('check_notices');





Route::get('approval_check_page',[car_service_customer_controller::class,'approval_check_page'])->middleware('customer')->name('approval_check_page');
Route::get('single_approval_details/{id}',[car_service_customer_controller::class,'single_approval_details'])->middleware('customer')->name('single_approval_details');
Route::post('cancel_service',[car_service_customer_controller::class,'cancel_service'])->middleware('customer')->name('cancel_service');









Route::get('logout',[CustomAuthController::class,'logout'])->name('logout');
