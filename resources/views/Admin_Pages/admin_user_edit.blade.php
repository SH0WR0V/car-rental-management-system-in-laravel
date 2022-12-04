@extends("Admin_Pages.Admin_nav.admin_nav")
<style>
    .intro1{
            width: 600px;
            height: 600px;
            background-color: coral;
            overflow-x: hidden; /* Hide horizontal scrollbar */
            overflow-y: scroll; /* Add vertical scrollbar */
        }
</style>
@foreach ($e_user as $e_user)


@section('admin_main')
<h1>Edit User By Admin</h1>
    <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class=""></div>
            <div class="row justify-content-center">
              <div class="intro1">

                <form action="{{ route('edit',['edit_id'=>encrypt($e_user->id)])}}" method="post"  class="mx-1 mx-md-4" enctype="multipart/form-data" >
                  @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif

                  {{@csrf_field()}}

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Choose Role</label>  <br>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" @if($e_user->type =="Customer") value="Customer" checked @endif value="Customer" >
                        <label class="form-check-label" >Customer</label>
                      </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" @if($e_user->type =="Renter") value="Renter" checked @endif value="Renter">
                    <label class="form-check-label" >Renter</label>
                  </div>



                       <span class="text-danger">@error('role') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ $e_user-> first_name}}">

                       <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                    </div>


                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{$e_user-> last_name}}">

                       <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">User Name</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Name" value="{{$e_user-> username}}">

                       <span class="text-danger">@error('username') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Your Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter E-mail" value="{{$e_user-> email}}">

                      <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Date of birth</label>
                    <input type="date" name="Date_of_birth" class="form-control"  value="{{$e_user-> dob}}">

                       <span class="text-danger">@error('Date_of_birth') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Gender</label> <br>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" @if($e_user-> gender =="Female") value="Female" checked @endif value="Female">
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" @if($e_user-> gender=="Male") value="Male" checked @endif value="Male">
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" @if($e_user-> gender =="Other") value="Other" checked @endif value="Other">
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                  </select>
                       <span class="text-danger">@error('gender') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control"  value="{{$e_user-> phone_number}}">

                       <span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Address</label>
                    <input type="text-area" name="address" class="form-control"  value="{{$e_user-> address}}">

                       <span class="text-danger">@error('address') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Nid Number</label>
                    <input type="text" name="nid_number" class="form-control"  value="{{$e_user-> nid_number}}">

                       <span class="text-danger">@error('nid_number') {{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Driving License Number</label>
                    <input type="text" name="dl_number" class="form-control"  value="{{$e_user-> dl_number}}">

                       <span class="text-danger">@error('dl_number') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Profile Picture</label>
                    <input type="file" name="pp" class="form-control"  value="{{old('pp')}}">

                       <span class="text-danger">@error('pp') {{$message}} @enderror</span>
                    </div>
                  </div>




                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>
                </form>

              </div>
            </div>

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@endforeach
