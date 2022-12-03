@extends('Customer_Pages.Customer_nav.customer_nav')
@section('customer_main')
@foreach ($s_user as $s_user )


@section('customer_nav')



<body>
  


<nav class="navbar navbar-expand-lg navbar-dark bg-light" style="background-color: #e3f2fd;">

  <div class="container-fluid justify-content-between">
    <!-- Left elements -->
    <div class="d-flex">
      <!-- Brand -->
      <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="dashboard_renter">
      <h4 style="color:black;">crms</h4>
      </a>


    </div>

    <!-- Center elements -->

    <!-- Right elements -->
    <ul class="navbar-nav flex-row">
    
    <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="" style="color:black;">
    <h6>Welcome <br>{{  $s_user->username }}</h6>
    </a>
      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center" href="">
        <img
              src="{{asset('pro_images/'.$s_user->pp)}}"
              alt=""
              style="width: 32px; height: 32px"
              class="rounded-circle"
              />

        </a>

      </li>

      <li class="nav-item me-3 me-lg-2">

        <a class="nav-link" style="color:black;" href="{{ route('logout') }}">
          <span><i class="fa-solid fa-right-from-bracket"></i></span>
          Logout
        </a>
      </li>
      <li class="nav-item dropdown me-3 me-lg-1">
        <a
          class="nav-link dropdown-toggle hidden-arrow" style="color:black;"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          

          <span class="badge rounded-pill badge-notification bg-danger"></span>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>

        </ul>
      </li>



    </ul>
    <!-- Right elements -->
  </div>
</nav>

@endsection


<form action="{{ route('post_for_a_car_submit') }}" method="post" enctype="multipart/form-data">

@if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif

{{@csrf_field()}}
<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="{{asset('pro_images/'.$s_user->pp)}}" alt="" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4>{{  $s_user->username }}</h4>
									<p class="text-secondary mb-1">{{ $s_user->type }}</p>
									<p class="text-muted font-size-sm">{{ $s_user->address }}</p>
									<!-- <button class="btn btn-primary">Follow</button>
									<button class="btn btn-outline-primary">Message</button> -->
								</div>
							</div>
							<hr class="my-4">
							<!-- <ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
									<span class="text-secondary">https://bootdey.com</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
									<span class="text-secondary">bootdey</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
									<span class="text-secondary">@bootdey</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
									<span class="text-secondary">bootdey</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
									<span class="text-secondary">bootdey</span>
								</li>
							</ul> -->
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Poster Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="hidden" name="poster_name" class="form-control"  value="{{$s_user->id}}" >
									<span class="text-danger">@error('poster_name') {{$message}} @enderror</span>
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Poster Type</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="hidden" name="poster_type" class="form-control"  value="{{$s_user->type}}">
									<span class="text-danger">@error('poster_type') {{$message}} @enderror</span>
								</div>
							</div>
							
							
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Details</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <!-- <input type="text" name="" class="form-control"  value=""> -->
                                <textarea name="post_text" cols="38" rows="5" placeholder="Write Something!"></textarea>
								<span class="text-danger">@error('post_text') {{$message}} @enderror</span>

								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Image</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="file" name="post_img" class="form-control"  value="{{old('post_img')}}">
                                
								<span class="text-danger">@error('post_img') {{$message}} @enderror</span>
								</div>
							</div>
                            
                            

							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
                                <button type="submit" class="btn btn-primary btn-lg">Post</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
    </form>



@endforeach

@endsection