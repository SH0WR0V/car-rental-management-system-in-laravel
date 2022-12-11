<?php

namespace App\Http\Controllers\renter;
use App\Models\User;
use App\Models\CarService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class api_car_service_renter_controller extends Controller
{
    public function dashboard_renter(Request $req)
    {
        $id = $req->id;
        $s_user=User ::all()->where('id','=',$id)->first();
        if($s_user)
        {
            return $s_user;
        }
        else{
            return"not found";
        }
    }

    public function car_list(Request $req){
        
        // $n= $req->id;
        return CarService ::all();
       
        // if($car_list)
        // {
        //     return $car_list;
        // }
        // else{
        //     return"not found";
        // }

    }

    public function notice()
    {
        return Notice::all();
    }


    public function add_new_car(Request $request)
    {
        // $id = $request->id;
        // $s_user=User ::all()->where('id','=',$id)->first();
        // if($s_user)
        // {
        //     return $s_user;
        // }
        // else{
        //     return"not found";
        // }
          $userinfo = User :: where('id','=',$request->userid)->first();
          $userid = $userinfo->id;
          $username = $userinfo->username;
          $post_car = new CarService();
         
          $post_car->car_name=$request->car_name;
          $post_car->car_model=$request->car_model;
          $post_car->car_type=$request->car_type;
          $post_car->sit_number=$request->sit_number;
          $post_car->car_color=$request->car_color;
          $post_car->car_buy_date=$request->car_buy_date;
          $post_car->car_details=$request->car_details;
          $post_car->car_number=$request->car_number;
          $post_car->rent_price=$request->rent_price;
          $post_car->car_owner_name=$username;
          $post_car->owner_id=$userid;
          $post_car->rent_status = 0;
          $post_car->save();
          
          if($post_car){
            return "Success";
          }else{
            return "fail";
          }
          return $post_car;
    }
}
