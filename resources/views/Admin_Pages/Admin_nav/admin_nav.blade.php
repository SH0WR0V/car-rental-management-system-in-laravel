<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRMS- Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<style>
    .intro{
            width: 300px;
            height: 600px;
            background-color: coral;
            overflow-x: hidden; /* Hide horizontal scrollbar */
            overflow-y: scroll; /* Add vertical scrollbar */
        }
</style>
<body>

<section style="background-color: #eee;" >
  <div class="container py-5">

    <div class="row">

      <div class=""style = "position:relative; left:-250px;>

        <h5 class="font-weight-bold mb-3 text-center text-lg-start">Admin DashBoard</h5>

        <div class="intro">
            <div class="card" >
            <div class="card-body" >

            <ul class="list-unstyled mb-0" >
              <li class="p-2 border-bottom" style="background-color: #eee;">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('admin dashboard') }}">Profile</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('admin block users list') }}">Block Users List</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('users add by admin') }}">Users Add By Admin</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('admin renter list') }}">Renter List</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('admin custorans list') }}">Customers List</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('add car by admin') }}">Add New Car</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('cars list') }}">Car List</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('admin approval') }}">Approval</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('rent history') }}">Rent History</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('admin notice') }}">Notice</a>
                    </div>
                  </div>
                  <div class="pt-1">

                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">

                    </div>
                  </div>
                  <div class="pt-1">
                  <a class="nav-link" href="{{ route('admin message list') }}">Messages</a>
                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">

                    </div>
                  </div>
                  <div class="pt-1">
                  <a class="nav-link" href="{{ route('posts mannage') }}">Post Manage</a>
                  </div>
                </a>
              </li>
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">

                    </div>
                  </div>
                  <div class="pt-1">
                  <a class="nav-link" href="{{ route('reviews manage') }}">Reviews Manage</a>
                  </div>
                </a>
                </li>
                </ul>

                </div>
            </div>

        </div>
              <div class="d-flex flex-row">

                <div class="pt-1">
                    <br>
                <a class="btn btn-primary me-3" href="{{ route('logout') }}">Logout</a>
                </div>
              </div>
              <div class="pt-1">

              </div>
            </a>
          </li>

      </div>


      <div class="col-md-6 col-lg-7 col-xl-8" style = "position:relative; left:-180px;" >

 @yield("admin_main")
            </div>

        </div>

    </div>

</section>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">

    </script>
</html>
