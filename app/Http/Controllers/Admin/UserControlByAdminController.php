<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserControlByAdminController extends Controller
{
    public function users_add(Request $request)
    {
        $request->validate([
            'role'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'Date_of_birth'=>'required',
            'gender'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
            'nid_number'=>'required',
            'dl_number'=>'required',
            'password'=>'required|min:3|max:12',


          ]);
          $user = new User();
          $user->first_name = $request->first_name;
          $user->last_name = $request->last_name;
          $user->username = $request->username;
          $user->email = $request->email;
          $user->dob = $request->Date_of_birth;
          $user->gender = $request->gender;
          $user->phone_number = $request->phone_number;
          $user->address = $request->address;
          $user->nid_number = $request->nid_number;
          $user->dl_number = $request->dl_number;
          $user->password = Hash::make ($request->password);
          $user->type = $request->role;
          $user->pp = $request->pp;
          $user->block_status = 0;
          $res = $user->save();
          if($res){
              return back()->with('success','You have registered successfully');
          }else{
              return back()->with('fail', 'Something Went Wrong');
          }
    }

    public function users_edit(Request $req)
    {
        $e_user=User::all()->where('id','=',decrypt($req->id));
        return view('Admin_Pages.admin_user_edit',compact('e_user'));
    }
    public function edit(Request $request)
    {

        $request->validate([
            'role'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'Date_of_birth'=>'required',
            'gender'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
            'nid_number'=>'required',
            'dl_number'=>'required',
          ]);
          $user = User:: find (decrypt($request->edit_id));
          $user->first_name = $request->first_name;
          $user->last_name = $request->last_name;
          $user->username = $request->username;
          $user->email = $request->email;
          $user->dob = $request->Date_of_birth;
          $user->gender = $request->gender;
          $user->phone_number = $request->phone_number;
          $user->address = $request->address;
          $user->nid_number = $request->nid_number;
          $user->dl_number = $request->dl_number;
          $user->type = $request->role;
          $user->pp = $request->pp;
          $user->block_status = 0;
          $res = $user->save();
          if($res){
              return back()->with('success','You have Update successfully');
          }else{
              return back()->with('fail', 'Something Went Wrong');
          }

    }
}
