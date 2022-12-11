<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlockUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

class BlockUserController extends Controller
{

    public function add_block(Request $req)
    {
        $s_user=User :: find ($req->id);
        $s_user->block_status = 1;
        $s_user->save();

        $user= new BlockUser();
        $user->user_id = $s_user->id;
        $user->first_name = $s_user->first_name;
        $user->last_name = $s_user->last_name;
        $user->username = $s_user->username;
        $user->email = $s_user->email;
        $user->dob = $s_user->dob;
        $user->gender = $s_user->gender;
        $user->phone_number = $s_user->phone_number;
        $user->address = $s_user->address;
        $user->nid_number = $s_user->nid_number;
        $user->dl_number = $s_user->dl_number;
        $user->password = Hash::needsRehash($s_user->password);
        $user->type = $s_user->type;
        $user->pp = $s_user->pp;
        $res = $user->save();

        if($res){
            return "You have Block successfully";
        }else{
            return "Something Went Wrong";
        }



    }
    public function delete_block(Request $req)
    {
        $b_user=BlockUser :: find ($req->id) ;
        if($b_user)
        {
        $status=$b_user->user_id;
        $user=User::find($status);
        $user->block_status=0;
        $user->save();
        $b_user->delete();
        if($b_user){
            return 'You have Unblock successfully';
        }else{
            return 'Something Went Wrong';
        }
    }
    else{
        return 'not found';
    }
    }
    public function block_users_search(Request $req)
    {
        $req->validate([
            'search'=>'required',
        ]);
        $BUser=BlockUser::where('email','like','%'.$req->search)->orWhere('username','like','%'.$req->search)->get();
        if($BUser)
        {
            return $BUser +'Search Found';
        }
        else
        {
            $User=BlockUser::all();
            return $User+'Search Found';
        }
    }

}
