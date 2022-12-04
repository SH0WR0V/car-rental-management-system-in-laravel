<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Approval;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;
use App\Models\RentPost;
use App\Models\CarService;
use DateTime;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class car_service_customer_controller extends Controller
{
    public function dashboard_customer(Request $req)
    {
        $n= $req->session()->get('email');

        $s_user=User ::all()->where('email','=',$n);
        return view('Customer_Pages.dashboard_customer')->with('s_user',$s_user);
    }
    // public function messageCustomer(Request $request){
    //     $message=RentMessage::distinct()->select('sender')->where('receiver', '=', $request->session()->get('UserID'))->groupBy('sender')->get();
           
    //     return view('Customer_Pages.message_customer')->with('m',$message);
    // }

    

    public function post_for_a_car(Request $req){
        $n= $req->session()->get('email');
        $s_user=User ::all()->where('email','=',$n);
        
        return view('Customer_Pages.post_for_a_car')->with('s_user',$s_user);
    }

    public function post_for_a_car_submit(Request $request)
    {
        $request->validate([
            'poster_name'=>'required',
            'poster_type'=>'required',
            'post_text'=>'required',
            'post_img'=>'mimes:jpg,jpeg,png',
 
          ]);

        $post = new RentPost();
        // $post=RentPost::where('id','=',$request->session()->get('id'))->first();
        $file_name = time().".".$request->file('post_img')->getClientOriginalExtension();
        $request->file('post_img')->move(public_path('post_imgs'),$file_name);
        $post->poster_name = $request->poster_name;
        $post->poster_type = $request->poster_type;
        // $user->username = $request->session()->get('CUname');
        // $user->email = $request->session()->get('email');
        $post->post_date =  new DateTime(today());
        $post->post_text = $request->post_text;
        $post->post_img = $file_name;
        
        $res = $post->save();
        if($res){
            return back()->with('success','You have posted successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    public function my_posts(Request $req){
        $n= $req->session()->get('Cid');
    
        $s_user = RentPost::all()->where('poster_name','=',$n);
        // $posts=RentPost :: all();
        return view('Customer_Pages.my_posts')->with('s_user',$s_user);
        // return view('Customer_Pages.my_posts');
    }

    public function my_posts_edit(Request $req)
    {
        $post=RentPost::where('id','=',$req->id)->first();
        return view('Customer_Pages.post_for_a_car_edit')->with('post',$post);
    }

    public function my_posts_edit_submit(Request $req)
    {
        $req->validate([
            'poster_name'=>'required',
            'poster_type'=>'required',
            'post_text'=>'required',
            'post_img'=>'mimes:jpg,jpeg,png',
 
          ]);

        $post=RentPost::where('id','=',$req->id)->first();
        $file_name = time().".".$req->file('post_img')->getClientOriginalExtension();
        $req->file('post_img')->move(public_path('post_imgs'),$file_name);
        $post->id=$req->id;
        $post->poster_name=$req->poster_name;
        $post->poster_type=$req->poster_type;
        $post->post_date =  new DateTime(today());
        $post->post_text=$req->post_text;
        $post->post_img = $file_name;
        $post->save();
        return redirect()->route('my_posts');
    }

    public function my_posts_delete(Request $req)
    {
        $s_user = RentPost::where('id','=',$req->id)->first();
        $s_user->delete();
        return redirect()->route('my_posts');
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


    public function view_car_list(Request $req)
    {
        $user=Approval::where('customer_id','=',$req->session()->get('Cid'))->get();
        // $s=$user->service_id;
        // $carlist=CarService::where('id','!=',$used_car);
        
        $carlist=CarService::paginate(4);
        return view('Customer_Pages.car_lists')->with('Clist',$carlist)->with('user',$user);
    }
    
    public function search_view_car_list(Request $request)
    {
        $carlist=CarService::where('car_name','like','%'.$request->car_name)->get();
        return view('Customer_Pages.car_lists_search')->with('Clist',$carlist);
    }

    public function view_car_list_details(Request $req)
    {
        $carlist=CarService::where('id','=',decrypt($req->id))->first();
        return view('Customer_Pages.view_car_list_details')->with('Clist',$carlist);
    }

    public function car_rent_view(Request $req)
    {
        $Clist=CarService::where('id','=',($req->id))->first();
        return view('Customer_Pages.rent_view_page',compact('Clist'));
    }

    public function payment(Request $req)
    {
        $myinfo=User::where('id','=',$req->session()->get('Cid'))->first();
        $Clist=CarService::where('id','=',($req->id))->first();
        $client_info=User::where('id','=',$Clist->owner_id)->first();
        return view('Customer_Pages.payment_page')->with('Clist',$Clist)->with('client_info',$client_info)->with('myinfo',$myinfo);
    }

    public function done(Request $req)
    {
        $req->validate([
            'payment_no'=>'required',
          ]);

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
        $approv->payment_no = $req->payment_no;
        $approv->rent_price = $Clist->rent_price;
        $approv->status = 0;
        $approv->save();
        
        $c_user=Approval::where('customer_id','=',$req->session()->get('Cid'))->get();
        return view('Customer_Pages.checking_approval')->with('c_user',$c_user);
        
    }

    public function approval_check_page(Request $req)
    {
        $c_user=Approval::where('customer_id','=',$req->session()->get('Cid'))->get();
        return view('Customer_Pages.checking_approval')->with('c_user',$c_user);
    }


    public function single_approval_details(Request $req)
    {
        $approve=Approval::where('id','=',$req->id)->first();
        $myinfo=User::where('id','=',$approve->customer_id)->first();
        $Clist=CarService::where('id','=',$approve->service_id)->first();
        $client_info=User::where('id','=',$approve->renter_id)->first();
        return view('Customer_Pages.single_approve_details')->with('Clist',$Clist)->with('client_info',$client_info)->with('myinfo',$myinfo)->with('approve',$approve);
    }

    public function cancel_service(Request $req)
    {
        $cancel=Approval::where('id','=',$req->id)->first();
        $back_to_service=CarService::where('id','=',$cancel->service_id)->first();
        $back_to_service->rent_status=0;
        $back_to_service->save();
        $cancel->delete();
        $c_user=Approval::where('customer_id','=',$req->session()->get('Cid'))->get();
        return view('Customer_Pages.checking_approval')->with('c_user',$c_user);
       
    }

    public function check_notices(Request $req)
    {
        $notice=Notice::paginate(3);
        // $s=$user->service_id;
        // $carlist=CarService::where('id','!=',$used_car);
        
        return view('Customer_Pages.check_notices')->with('notices',$notice);
    }
}
