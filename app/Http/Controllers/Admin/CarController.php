<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Session;
use Illuminate\Pagination\Paginator;

class CarController extends Controller
{
    public function add_car(Request $request)
    {
        // $request->validate([
        //     'car_name'=>'required',
        //     'car_model'=>'required',
        //     'car_type'=>'required',
        //     'car_number'=>'required',
        //     'rent_price'=>'required',
        //     'car_buy_date'=>'required',
        //     'car_color'=>'required',
        //     'sit_number'=>'required',
        //     'car_details'=>'required',
        //     'car_owner_username'=>'required',
        //     'car_owner_id'=>'required',
        //   ]);
          $car= new CarService();
          $car->car_name=$request->car_name;
          $car->car_model=$request->car_model;
          $car->car_type=$request->car_type;
          $car->sit_number=$request->sit_number;
          $car->car_color=$request->car_color;
          $car->car_buy_date=$request->car_buy_date;
          $car->car_details=$request->car_details;
          $car->car_number=$request->car_number;
          $car->rent_price=$request->rent_price;
          $car->car_owner_name=$request->car_owner_username;
          $car->owner_id=$request->car_owner_id;
          $car->rent_status=0;
          // if($request->car_pic==null)
          // {
          //   $car->car_pic= "carrental.png";

          // }
          // else
          // {
          //   $file_name = time().".".$request->file('car_pic')->getClientOriginalExtension();
          //   $request->file('car_pic')->move(public_path('car_pic'),$file_name);
          //   $car->car_pic = $file_name;
          // }
          $res=$car->save();
          if($res){
            return 'You Add Car successfully';
        }else{
            return'Something Went Wrong';
        }

    }
    public function edit_car_view(Request $req)
    {
        $car_edit=CarService::where('id','=',$req->id)->first();
        // return $car_edit;
        return $car_edit;
    }
    public function edit_car(Request $request)
    {
        $car=CarService::where('id','=',($request->edit_id))->first();
        $car->car_name=$request->car_name;
        $car->car_model=$request->car_model;
        $car->car_type=$request->car_type;
        $car->sit_number=$request->sit_number;
        $car->car_color=$request->car_color;
        $car->car_buy_date=$request->car_buy_date;
        $car->car_details=$request->car_details;
        $car->car_number=$request->car_number;
        $car->rent_price=$request->rent_price;
        $car->car_owner_name=$request->car_owner_username;
        $car->owner_id=$request->car_owner_id;

        if($request->car_pic==null)
          {
            $car->car_pic= $car->car_pic;

          }
          else
          {
            $file_name = time().".".$request->file('car_pic')->getClientOriginalExtension();
            $request->file('car_pic')->move(public_path('car_pic'),$file_name);
            $car->car_pic = $file_name;
          }
        $res=$car->save();
          if($res){
            return 'You Car Update successfully';
        }else{
            return 'Something Went Wrong';
        }

    }
    public function delete_car(Request $req)
    {
        $car_edit=CarService::where('id','=',($req->id))->first();
        $car_edit->delete();
        $res=$car_edit;
          if($res){
            return 'You Car Delete successfully';
        }else{
            return 'Something Went Wrong';
        }
    }
    public function search_car(Request $req)
    {
        $req->validate([
            'search'=>'required',
        ]);
        $BUser=CarService::where('car_name','like','%'.$req->search)->orWhere('car_owner_name','like','%'.$req->search)->get();
        if($BUser)
        {
            return $BUser+'Search Found';
        }
        else
        {
            $User=CarService::all();
            return $User+'Search Found';
        }
    }
    public function single_car_details_view(Request $req)
    {
        $Clist=CarService::where('id','=',($req->id))->first();

        return $Clist;
    }
}
