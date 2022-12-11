<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminApproval;
use App\Models\Approval;
use App\Models\CarService;
use App\Models\RentHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Mail\AdminApprovelMail;
use Illuminate\Support\Facades\Mail;

class AdminApprovalController extends Controller
{
    public function single_approvals_details(Request $request)
    {
        $approve=AdminApproval::where('id','=',$request->id)->first();
        $myinfo=User::where('id','=',$approve->customer_id)->first();
        $Clist=CarService::where('id','=',$approve->service_id)->first();
        $client_info=User::where('id','=',$approve->renter_id)->first();
        return $Clist + $client_info + $myinfo +$approve;
    }

    public function approv_add(Request $request)
    {
        $approve=AdminApproval::where('id','=',$request->id)->first();
        $history= new RentHistory();

        $history->renter_name=$approve->renter_name;
        $history->renter_id=$approve->renter_id;
        $renter_address = User::where('id','=',$approve->renter_id)->pluck('address');
        $renter_username = User::where('id','=',$approve->renter_id)->pluck('username');
        $renter_mail = User::where('id','=',$approve->renter_id)->pluck('email');
        $renter_name = $approve->renter_name;
        $renter_id = $approve->renter_id;


        $history->customer_name=$approve->customer_name;
        $history->customer_id=$approve->customer_id;
        $customer_address = User::where('id','=',$approve->customer_id)->pluck('address');
        $customer_username = User::where('id','=',$approve->customer_id)->pluck('username');
        $customer_mail = User::where('id','=',$approve->customer_id)->pluck('email');
        $customer_name = $approve->customer_name;
        $customer_id = $approve->customer_id;

        $history->rent_date=$approve->created_at;
        $history->service_id=$approve->service_id;
        $history->payment_no=$approve->payment_no;
        $history->rent_price=$approve->rent_price;


        $rent_date=$approve->created_at;
        $service_id=$approve->service_id;
        $payment_no=$approve->payment_no;
        $rent_price=$approve->rent_price;

        $Clist=CarService::where('id','=',$approve->service_id)->first();
        $car_name=$Clist->car_name;
        $car_model=$Clist->car_model;
        $car_type=$Clist->car_type;
        $car_color=$Clist->car_color;
        $car_number=$Clist->car_number;
        $id=$Clist->id;


        Mail::to($customer_mail)->send(new AdminApprovelMail
        ($renter_address,
        $renter_mail,
        $renter_username,
        $renter_name,
        $renter_id,
        $customer_address,
        $customer_username,
        $customer_mail,
        $customer_name,
        $customer_id,
        $rent_date,
        $service_id,
        $payment_no,
        $rent_price,
        $car_name,
        $car_model,
        $car_type,
        $car_color,
        $car_number,
        $id
        ));
        Mail::to($renter_mail)->send(new AdminApprovelMail
        ($renter_address,
        $renter_mail,
        $renter_username,
        $renter_name,
        $renter_id,
        $customer_address,
        $customer_username,
        $customer_mail,
        $customer_name,
        $customer_id,
        $rent_date,
        $service_id,
        $payment_no,
        $rent_price,
        $car_name,
        $car_model,
        $car_type,
        $car_color,
        $car_number,
        $id
        ));

        $history->save();

        $renter_approval=Approval::where('id','=',$approve->renter_app_id)->first();
        $renter_approval->delete();
        $approve->delete();
        $historis= RentHistory::all();
        return "Mail send";


    }
    public function approv_delete(Request $request)
    {
        $approve=AdminApproval::where('id','=',$request->id)->first();
        $history= RentHistory::all();
        $renter_approval=Approval::where('id','=',$approve->renter_app_id)->first();
        $renter_approval->delete();
        $approve->delete();
        return $history;


    }
}
