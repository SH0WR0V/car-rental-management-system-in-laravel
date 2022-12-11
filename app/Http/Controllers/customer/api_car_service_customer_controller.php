<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\CarService;
use App\Models\RentPost;
use App\Models\Token;
use App\Models\Approval;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Notice;
use DateTime;
use Illuminate\Http\Request;

class api_car_service_customer_controller extends Controller
{
    public function view_car_list()
    {
        return CarService::all();
    }

    public function dashboard_customer(Request $req)
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
    public function post_for_a_car(Request $request)
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
        
        $post = new RentPost();
        $post->poster_name = $request->poster_name;
        $post->poster_type = $request->poster_type;
        $post->post_date =  new DateTime(today());
        $post->post_text = $request->post_text;
        $post->save();
        return $post;
    }
    public function my_posts()
    {
        // $id = $req->id;
        // $s_user=RentPost ::all()->where('id','=',$id)->first();
        // if($s_user)
        // {
        //     return $s_user;
        // }
        // else{
        //     return"not found";
        // }
        return RentPost::all();
    }
    public function my_posts_delete(Request $req)
    {
        $n=RentPost::where('id','=',($req->id))->first();
        $res = $n->delete();

        if($res){
            return 'Your Notice Post Delete successfully';
        }else{
            return 'Something Went Wrong';
        }
    }
    public function done(Request $req)
    {
        // $req->validate([
        //     'payment_no'=>'required',
        //   ]);

        $myinfo=User::where('id','=',$req->my)->first();
        
        $Clist=CarService::where('id','=',$req->car)->first();
        $Clist->rent_status=1;
        $Clist->save();

        $client_info=User::where('id','=',$req->client)->first();
        $approv=new Approval();
        $approv->renter_name=$client_info->first_name.' '.$client_info->last_name;
        $approv->renter_id=$client_info->id;
        $approv->customer_name=$myinfo->first_name.' '.$myinfo->last_name;
        $approv->customer_id=$myinfo->id;
        $approv->rent_date =  new DateTime(today());
        $approv->service_id = $Clist->id;
        // $approv->payment_no = $req->payment_no;
        $approv->payment_no = Str::random(10);
        $approv->rent_price = $Clist->rent_price;
        $approv->status = 0;
        $approv->save();

        if($approv){
            return "done";
        }else{
            return "not done";
        }
        // $c_user=Approval::where('customer_id','=',$req->session()->get('Cid'))->get();
        // return view('Customer_Pages.checking_approval')->with('c_user',$c_user);
        
    }
    public function view_car_list_details(Request $req)
    {
        // $carlist=CarService::where('id','=',decrypt($req->id))->first();
        $carlist=CarService::where('id','=',$req->id)->first();
        // return view('Customer_Pages.view_car_list_details')->with('Clist',$carlist);
        return $carlist;
    }
}
