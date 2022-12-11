<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarService;
use App\Models\RentHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class HistoryController extends Controller
{
    public function single_history_view(Request $request)
    {
        $approve=RentHistory::where('id','=',$request->id)->first();
        $myinfo=User::where('id','=',$approve->customer_id)->first();
        $Clist=CarService::where('id','=',$approve->service_id)->first();
        $client_info=User::where('id','=',$approve->renter_id)->first();
        return $Clist+$client_info+$myinfo+$approve;
    }
    public function history_delete(Request $request)
    {
        $approve=RentHistory::where('id','=',$request->id)->first();
        $Clist=CarService::where('id','=',$approve->service_id)->first();
        $Clist->rent_status=0;
        $Clist-> save();
        $approve->delete();
        return 'Delete Successfully';
    }
}
