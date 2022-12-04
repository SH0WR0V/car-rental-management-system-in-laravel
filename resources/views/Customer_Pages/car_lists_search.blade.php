@extends('Customer_Pages.Customer_nav.customer_nav')
@section('customer_main')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs4 search Bar - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<form action="{{route('search_view_car_list')}}" method="post">
    {{@csrf_field()}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <br/>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" name="car_name" placeholder="Search here">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>

<style type="text/css">

.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>


</form>
<h4>Available Car List</h4>
<br>

<div class="row row-cols-1 row-cols-md-4 g-4"style="width: 85rem;">
    @foreach ($Clist as $C)
    <div class="card" style="width: 100rem;">
        <img src="https://www.carmodelslist.com/wp-content/uploads/2012/04/Hyundai-Tucson.jpg" class="card-img-top"height="180" >
        <div class="card-body">
          <a href=""><h5>{{ $C->car_name }} {{ $C->car_model }}</h5></a>
          <h4>Provider: {{ $C->car_owner_name }}</h4>
          <h6> {{ $C->car_details }}</h6>
          <a href="#" class="btn btn-primary">Details</a>
          <a href="#" class="btn btn-primary">Rent</a>
        </div>
      </div>
      
      @endforeach

      
      
  </div>

@endsection