<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\CarService;
use Illuminate\Http\Request;

class api_car_service_customer_controller extends Controller
{
    public function view_car_list()
    {
        return CarService::all();
    }
}
