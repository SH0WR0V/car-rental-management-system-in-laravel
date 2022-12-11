<?php

namespace App\Http\Controllers\renter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;
use App\Http\Controllers\renter\Session;
use App\Models\Approval;
use App\Models\RentMessage;
use DateTime;

class RenterController extends Controller
{
    public function dashboard_renter(Request $req)
    {
        $request_approval_view= Approval::where('renter_id','=',$req->session()->get('Rid'))->get();
        return view('Renter_Pages.dashboard_renter')->with('r_app',$request_approval_view);
    }

    public function notices(Request $req)
    {
        $notice=Notice::all();
    
        $notice=Notice::paginate(2);
        return view('Renter_Pages.checkNotices')->with('notices',$notice);
    }

    public function profile(Request $req)
    {
        $n= $req->session()->get('email');

        $s_user=User ::all()->where('email','=',$n);
        return view('Renter_Pages.profile')->with('s_user',$s_user);
    }

    public function renter_message_list(Request $request)
    {
        $message=RentMessage::where("receiver",'=',$request->session()->get('Rid'))->get();
        return view('Renter_Pages.messageslist')->with('m',$message);
    }

    
    public function message_view(Request $request)
    {
        $receiver=$request->id;
        $message=RentMessage::where('sender','=',$receiver,'and','receiver','=',$request->session()->get('Rid'))->orwhere('receiver','=',$receiver,'and','sender','=',$request->session()->get('Rid'))->get();
        return view('Renter_Pages.message_view')->with("m",$message)->with("r",$receiver);
        // return $message;
    }


    public function send_message(Request $request)
    {
        $message= new RentMessage();
        $message->sender=$request->session()->get('Rid');
        $message->receiver=$request->receiver;
        $message->m_date=new DateTime(today());
        $message->m_text=$request->text;
        $message->save();
        return back();
        //return $message;
    }

   


    public function editProfile(Request $req)
    {
        $n= $req->session()->get('email');
        $s_user=User ::all()->where('email','=',$n);
        return view('Renter_Pages.editProfile')->with('s_user',$s_user); 
        
    }
    public function editProfileSubmit(Request $request)
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
        
        if($request->pp==null)
          {
            $user->pp=$user->pp;

          }
          else
          {
            $file_name = time().".".$request->file('pp')->getClientOriginalExtension();
            $request->file('pp')->move(public_path('pro_images'),$file_name);
            $user->pp = $file_name;
          }
        
        $res = $user->save();
        if($res){
            return back()->with('success','You have edited your profile successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }
}
