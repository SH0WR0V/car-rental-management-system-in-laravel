<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRMS- Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

</head>

<style>
    .intro{
            width: 300px;
            height: 600px;
            background-color: coral;
            overflow-x: hidden; /* Hide horizontal scrollbar */
            overflow-y: scroll; /* Add vertical scrollbar */
        }

        
.footer_area {
    position: relative;
    z-index: 1;
    overflow: hidden;
    box-shadow: 0 8px 48px 8px rgba(47, 91, 234, 0.175);
    padding:60px;
}
.footer_area .row {
    margin-left: -25px;
    margin-right: -25px;
}
.footer_area .row .col,
.footer_area .row .col-1,
.footer_area .row .col-10,
.footer_area .row .col-11,
.footer_area .row .col-12,
.footer_area .row .col-2,
.footer_area .row .col-3,
.footer_area .row .col-4,
.footer_area .row .col-5,
.footer_area .row .col-6,
.footer_area .row .col-7,
.footer_area .row .col-8,
.footer_area .row .col-9,
.footer_area .row .col-auto,
.footer_area .row .col-lg,
.footer_area .row .col-lg-1,
.footer_area .row .col-lg-10,
.footer_area .row .col-lg-11,
.footer_area .row .col-lg-12,
.footer_area .row .col-lg-2,
.footer_area .row .col-lg-3,
.footer_area .row .col-lg-4,
.footer_area .row .col-lg-5,
.footer_area .row .col-lg-6,
.footer_area .row .col-lg-7,
.footer_area .row .col-lg-8,
.footer_area .row .col-lg-9,
.footer_area .row .col-lg-auto,
.footer_area .row .col-md,
.footer_area .row .col-md-1,
.footer_area .row .col-md-10,
.footer_area .row .col-md-11,
.footer_area .row .col-md-12,
.footer_area .row .col-md-2,
.footer_area .row .col-md-3,
.footer_area .row .col-md-4,
.footer_area .row .col-md-5,
.footer_area .row .col-md-6,
.footer_area .row .col-md-7,
.footer_area .row .col-md-8,
.footer_area .row .col-md-9,
.footer_area .row .col-md-auto,
.footer_area .row .col-sm,
.footer_area .row .col-sm-1,
.footer_area .row .col-sm-10,
.footer_area .row .col-sm-11,
.footer_area .row .col-sm-12,
.footer_area .row .col-sm-2,
.footer_area .row .col-sm-3,
.footer_area .row .col-sm-4,
.footer_area .row .col-sm-5,
.footer_area .row .col-sm-6,
.footer_area .row .col-sm-7,
.footer_area .row .col-sm-8,
.footer_area .row .col-sm-9,
.footer_area .row .col-sm-auto,
.footer_area .row .col-xl,
.footer_area .row .col-xl-1,
.footer_area .row .col-xl-10,
.footer_area .row .col-xl-11,
.footer_area .row .col-xl-12,
.footer_area .row .col-xl-2,
.footer_area .row .col-xl-3,
.footer_area .row .col-xl-4,
.footer_area .row .col-xl-5,
.footer_area .row .col-xl-6,
.footer_area .row .col-xl-7,
.footer_area .row .col-xl-8,
.footer_area .row .col-xl-9,
.footer_area .row .col-xl-auto {
    padding-right: 25px;
    padding-left: 25px;
}

.single-footer-widget {
    position: relative;
    z-index: 1;
}
.single-footer-widget .copywrite-text a {
    color: #747794;
    font-size: 1rem;
}
.single-footer-widget .copywrite-text a:hover,
.single-footer-widget .copywrite-text a:focus {
    color: #3f43fd;
}
.single-footer-widget .widget-title {
    margin-bottom: 1.5rem;
}
.single-footer-widget .footer_menu li a {
    color: #747794;
    margin-bottom: 1rem;
    display: block;
    font-size: 1rem;
}
.single-footer-widget .footer_menu li a:hover,
.single-footer-widget .footer_menu li a:focus {
    color: #3f43fd;
}
.single-footer-widget .footer_menu li:last-child a {
    margin-bottom: 0;
}

.footer_social_area {
    position: relative;
    z-index: 1;
}
.footer_social_area a {
    border-radius: 50%;
    height: 40px;
    text-align: center;
    width: 40px;
    display: inline-block;
    background-color: #f5f5ff;
    line-height: 40px;
    -webkit-box-shadow: none;
    box-shadow: none;
    margin-right: 10px;
}
.footer_social_area a i {
    line-height: 36px;
}
.footer_social_area a:hover,
.footer_social_area a:focus {
    color: #ffffff;
}

@-webkit-keyframes bi-cycle {
    0% {
        left: 0;
    }
    100% {
        left: 100%;
    }
}

@keyframes bi-cycle {
    0% {
        left: 0;
    }
    100% {
        left: 100%;
    }
}
ol li, ul li {
    list-style: none;
}

ol, ul {
    margin: 0;
    padding: 0;
}

</style>
<body>


@yield("customer_nav")


<section style="background-color: #eee;" >
  <div class="container py-5">

    <div class="row">

      <div class=""style = "position:relative; left:-250px;>

        <h3 class="font-weight-bold mb-4 text-center text-lg-start"  align="center">Customer Dashboard</h3>

        <div class="intro">
            <div class="card" >
            <div class="card-body" >

            <ul class="list-unstyled mb-0" >
              <li class="p-2 border-bottom">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">

                    <div class="pt-1">
                    <a class="nav-link" href="{{ route('customer dashboard') }}">Profile</a>
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
                    <a class="nav-link" href="{{ route('edit_profile') }}">Edit Profile</a>
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
                    <a class="nav-link" href="{{ route('post_for_a_car') }}">Post for a Car</a>
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
                    <a class="nav-link" href="{{ route('my_posts') }}"> Manage My Posts</a>
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
                    <a class="nav-link" href="{{ route('view_car_list') }}">View Car List</a>
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
                    <a class="nav-link" href="{{ route('approval_check_page') }}">Approval Status</a>
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
                    <a class="nav-link" href="{{ route('messageCustomer') }}">Messages</a>
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
                    <a class="nav-link" href="{{route('check_notices')}}">Notices</a>
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
                    <a class="nav-link" href="">History</a>
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
                    <a class="nav-link" href="">Review</a>
                    </div>
                  </div>
                  <div class="pt-1">

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

 @yield("customer_main")
            </div>

        </div>

    </div>

</section>


<footer class="footer_area section_padding_130_0">
      <div class="container">
        <div class="row">
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Footer Logo-->
              <div class="footer-logo mb-3"></div>
              <p>CRMS is a creative, lightweight, clean application.</p>
              <!-- Copywrite Text-->
              <div class="copywrite-text mb-5">
                <p class="mb-0">Made with <i class="lni-heart mr-1"></i>by<a class="ml-1" href="https://wrapbootstrap.com/user/DesigningWorld">Designing World</a></p>
              </div>
              <!-- Footer Social Area-->
              <div class="footer_social_area"><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype"><i class="fa fa-skype"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">About</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Corporate Sale</a></li>
                  <li><a href="#">Terms &amp; Policy</a></li>
                  <li><a href="#">Community</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">Support</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Term &amp; Conditions</a></li>
                  <li><a href="#">Help &amp; Support</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">Contact</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Call Centre</a></li>
                  <li><a href="#">Email Us</a></li>
                  <li><a href="#">Term &amp; Conditions</a></li>
                  <li><a href="#">Help Center</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">

    </script>
</html>
