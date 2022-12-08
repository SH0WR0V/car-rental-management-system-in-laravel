<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\CarService;
use App\Models\Token;
use App\Models\User;
use App\Models\Notice;
use Illuminate\Http\Request;

class api_car_service_customer_controller extends Controller
{
    public function view_car_list()
    {
        return CarService::all();
    }

    public function dashboard_customer(Request $req)
   {
        $customer_check=User ::where('id','=',$req)->first();
        return $customer_check;
   }
    // {
    //     // $customer=session()->get('Cid');
    //     // $customer_check=User ::all()->where('id','=',$customer);
    //     // return $customer_check;
    //     // $token = request()->header('Authorization');
    //     // $check_token = Token::where('token',$token)->first();
    // } 

    public function notice()
    {
        return Notice::all();
    }
}
