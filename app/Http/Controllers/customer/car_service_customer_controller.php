<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RentPost;
use DateTime;


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

}
