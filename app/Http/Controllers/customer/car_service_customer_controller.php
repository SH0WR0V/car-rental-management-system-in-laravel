<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class car_service_customer_controller extends Controller
{
    //
    public function index(){
        return view('Customer_Pages.home');
    }

    public function edit_profile(Request $req)
    {
        $n= $req->session()->get('email');
        $s_user=User ::all()->where('email','=',$n);
        return view('Customer_Pages.edit_profile')->with('s_user',$s_user);
    }
    public function edit_profile_submit(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'Date_of_birth'=>'required',
            'gender'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
            'nid_number'=>'required',
            'dl_number'=>'required',
          ]);
        //   $user = new User();
        $user=User::where('email','=',$request->session()->get('email'))->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->username = $request->session()->get('CUname');
        // $user->email = $request->session()->get('email');
        $user->dob = $request->Date_of_birth;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->nid_number = $request->nid_number;
        $user->dl_number = $request->dl_number;
        $res = $user->save();
        if($res){
            return back()->with('success','You have edited your profile successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }

}
