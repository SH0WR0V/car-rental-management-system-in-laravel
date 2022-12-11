<?php

namespace App\Http\Controllers\renter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\renter\Session;
use App\Models\AdminApproval;
use App\Models\CarService;
use App\Models\VideoPost;
use App\Models\Approval;
use Illuminate\Pagination\Paginator;
use DateTime; 
   
class car_service_renter_controller extends Controller
{
    public function addNewCar(Request $req){
        $n= $req->session()->get('email');
        $s_user=User ::all()->where('email','=',$n);
        return view('Renter_Pages.addNewCar')->with('s_user',$s_user);
    }



    public function addNewCarRenter(Request $request)
    {
        $request->validate([
            'car_name'=>'required',
            'car_model'=>'required',
            'car_type'=>'required',
            'car_number'=>'required',
            'rent_price'=>'required',
            'car_buy_date'=>'required',
            'car_color'=>'required',
            'sit_number'=>'required',
            'car_details'=>'required',
            'car_pic'=>'mimes:jpg,jpeg,png',


          ]);
          
          $post_car = new CarService();
          $file_name = time().".".$request->file('car_pic')->getClientOriginalExtension();
          $post_car->car_name=$request->car_name;
          $post_car->car_model=$request->car_model;
          $post_car->car_type=$request->car_type;
          $post_car->sit_number=$request->sit_number;
          $post_car->car_color=$request->car_color;
          $post_car->car_buy_date=$request->car_buy_date;
          $post_car->car_details=$request->car_details;
          $post_car->car_number=$request->car_number;
          $post_car->rent_price=$request->rent_price;
          $post_car->car_owner_name=$request->username;
          $post_car->owner_id=$request->id;
          $request->file('car_pic')->move(public_path('pro_images'),$file_name);
          $post_car->car_pic = $file_name;
          $post_car->rent_status = 0;
         
  
          $res = $post_car->save();
          if($res){
              return back()->with('success','You have Posted successfully');
          }else{
              return back()->with('fail', 'Something Went Wrong');
          }
    }
    public function Carlist(Request $req){
        
        $n= $req->session()->get('RUname');
        $car_list=CarService ::all()->where('car_owner_name','=',$n);
       
        return view('Renter_Pages.carlist')->with('car_lists',$car_list);

    }

    public function APICarlist(Request $req){
        
        $n= $req->session()->get('RUname');
        $car_list=CarService ::all()->where('car_owner_name','=',$n);
       
        return view('Renter_Pages.carlist')->with('car_lists',$car_list);

    }
    

    public function deleteCar(Request $req){
        
        $car_list = CarService::find($req->id); 
        $car_list->delete();
        return redirect('/carlist');
    }

    public function editCarlist(Request $req)
    {
        $car_list=CarService::where('id','=',$req->id)->first();
        return view('Renter_Pages.editCarlist')->with('car_list',$car_list);
        
    }

    public function editCarlistSubmit(Request $req)
    {
        $req->validate([
            'car_name'=>'required',
            'car_model'=>'required',
            'rent_price'=>'required',
            
            
            
          ]);
        
        $car_list=CarService::where('id','=',$req->id)->first();
        
        $car_list->id = $req->id;
        $car_list->car_name = $req->car_name;
        $car_list->car_model = $req->car_model;
        $car_list->rent_price = $req->rent_price;
        $car_list->car_details = $req->car_details;
       
        

        if($req->car_pic==null)
          {
            $car_list->car_pic=$car_list->car_pic;

          }
          else
          {
            $file_name = time().".".$req->file('car_pic')->getClientOriginalExtension();
            $req->file('car_pic')->move(public_path('pro_images'),$file_name);
            $car_list->car_pic = $file_name;
          }
        
       
    
        $res = $car_list->save();
        if($res){
            return redirect('/carlist');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }


    public function postCarVideo(Request $req){
        $n= $req->session()->get('email');
        $s_user=User ::all()->where('email','=',$n);
        return view('Renter_Pages.postCarVideo')->with('s_user',$s_user);
    }

    public function postNewCarVideo(Request $request)
    {
        $request->validate([
           
          
          'video'=> 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'

          ]);
          
          $post_car_video = new VideoPost;
          $post_car_video->uploader_name=$request->session()->get('RUname');
          $post_car_video->uploader_id=$request->session()->get('Rid');
          $post_car_video->v_post_date=new DateTime(today());
          $file_name = time().".".$request->file('video')->getClientOriginalExtension();
          $request->file('video')->move(public_path('pro_images'),$file_name); 
          $post_car_video->video = $file_name;        
         
          $res = $post_car_video->save();
          if($res){
              return back()->with('success','You have Posted successfully');
          }else{
              return back()->with('fail', 'Something Went Wrong');
          }
         
    }

    public function videolist(Request $req){
        
        $n= $req->session()->get('RUname');
        $video_list=VideoPost ::all()->where('uploader_name','=',$n);
        return view('Renter_Pages.video_list')->with('video_list',$video_list);

    }
     
   

    public function search_view_user_list(Request $request)
    {
        $s_user=User::where('username','like','%'.$request->username)->get();
        return view('Renter_Pages.messages')->with('s_user',$s_user);
    }

    public function acceptApproval(Request $request)
    {
        
        $renterApproval= Approval::where('id','=',$request->id)->first();
        $renterApproval->status=1;
        $renterApproval->save();
        $adminApproval= new AdminApproval();
        $adminApproval->renter_app_id = $renterApproval->id;
        $adminApproval->renter_name = $renterApproval->renter_name;
        $adminApproval->renter_id = $renterApproval->renter_id;
        $adminApproval->customer_name = $renterApproval->customer_name;
        $adminApproval->customer_id = $renterApproval->customer_id;
        $adminApproval->rent_date = $renterApproval->rent_date;
        $adminApproval->service_id = $renterApproval->service_id;
        $adminApproval->payment_no = $renterApproval->payment_no;
        $adminApproval->rent_price = $renterApproval->rent_price;
        $adminApproval->save();
        $request_approval_view= Approval::where('renter_id','=',$request->session()->get('Rid'))->get();
        return view('Renter_Pages.dashboard_renter')->with('r_app',$request_approval_view);
        
    }

    public function singleViewApproval(Request $request){
      
        $approve=Approval::where('id','=',$request->id)->first();
        $myinfo=User::where('id','=',$approve->customer_id)->first();
        $Clist=CarService::where('id','=',$approve->service_id)->first();
        $client_info=User::where('id','=',$approve->renter_id)->first();
        return view('Renter_Pages.single_approval_details')->with('Clist',$Clist)->with('client_info',$client_info)->with('myinfo',$myinfo)->with('approve',$approve);

    }

    public function deleteApproval(Request $request){
        $cancel=Approval::where('id','=',$request->id)->first();
        $back_to_service=CarService::where('id','=',$cancel->service_id)->first();
        $back_to_service->rent_status=0;
        $back_to_service->save();
        $cancel->delete();
        $request_approval_view= Approval::where('renter_id','=',$request->session()->get('Rid'))->get();
        return view('Renter_Pages.dashboard_renter')->with('r_app',$request_approval_view);
    }



   
}


