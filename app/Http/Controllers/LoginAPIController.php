<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use Illuminate\Support\Str;
use DateTime;
class LoginAPIController extends Controller
{


    public function login(Request $req){

        $user = User::where('email',$req->email)->where('password',$req->password)->first();

        if($user){
            $api_token = Str::random(64);
            $token = new Token();
            $token->userid = $user->id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return $token;
        }
        return "No user found";

    }

    public function registration(Request $request){

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->nid_number = $request->nid_number;
        $user->dl_number = $request->dl_number;
        $user->password = $request->password;
        $user->type = $request->type;
        $user->block_status = 0;
        $user->save();
        return $user;
    }

    public function logout()
    {
        $token = request()->header('Authorization');
        $check_token = Token::where('token',$token)->first();
        if($check_token)
        {
            $check_token->expired_at = new DateTime();
            $check_token->save();
            return "Logged out";
        }
    }


} 
