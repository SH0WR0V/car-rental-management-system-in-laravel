<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlockUser;
use App\Http\Controllers\Admin\Session;

class AdminController extends Controller
{
    public function dashboard_admin(Request $req)
    {
        $n= $req->session()->get('email');

        $s_user=User ::all()->where('email','=',$n);
        return view('Admin_Pages.dashboard_admin')->with('s_user',$s_user);
    }

    public function custorans_list()
    {
        $customers= User::all()->where('type','=','Customer');

        return view('Admin_Pages.customers_list')->with('customers',$customers);
    }
    public function renter_list()
    {
        $renter= User::all()->where('type','=','Renter');

        return view('Admin_Pages.renter_list')->with('renters',$renter);
    }
    public function block_users_list()
    {
        $BUser=BlockUser::all();
        return view('Admin_Pages.block_users_list')->with('BUser',$BUser);
    }
    public function add_car_by_admin()
    {
        return view('Admin_Pages.admin_add_car');
    }
    public function cars_list()
    {
        return view('Admin_Pages.car_lists');
    }
    public function admin_approval()
    {
        return view('Admin_Pages.admin_approvals');
    }
    public function rent_history()
    {
        return view('Admin_Pages.rent_historys');
    }
    public function admin_message_list()
    {
        return view('Admin_Pages.admin_messages_list');
    }
    public function admin_notice()
    {
        return view('Admin_Pages.admin_notice');
    }
    public function users_add_by_admin()
    {
        return view('Admin_Pages.users_add_by_admin');
    }
    public function posts_mannage()
    {
        return view('Admin_Pages.posts_manage');
    }
    public function reviews_manage()
    {
        return view('Admin_Pages.reviews_manage');
    }
    public function user_details(Request $request)
    {
        $s_user=User ::all()->where('id','=',decrypt($request->id));
        return view('Admin_Pages.single_user_details')->with('s_user',$s_user);
    }
    public function blockuser_details(Request $request)
    {
        $s_user=BlockUser ::all()->where('id','=',decrypt($request->id));
        return view('Admin_Pages.single_user_details')->with('s_user',$s_user);
    }
}
