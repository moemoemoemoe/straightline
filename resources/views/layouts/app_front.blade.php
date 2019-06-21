<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('front/css/carousel.css')}}" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('front/css/custom.css')}}" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<link href="{{asset('datepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('datepicker/js/datepicker.min.js')}}"></script>

        <!-- Include English language -->
        <script src="{{asset('datepicker/js/i18n/datepicker.en.js')}}"></script>
  <title>Home | Straight Line</title>
</head>
<body class="home">
  <header>
    <nav class="navbar-expand-sm fixed-top bg-dark-blue navbarblue">
      <div class="container">
        <div class="cust_container">
          <div class="row">
            <div class="col-lg-4 col-md-12 hotline"><b>HOTLINE</b> +961 3 300 997</div>
            <div class="col-lg-8 col-md-12">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="row">
                <div class="col-lg-8">
                  <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                    <ul class="navbar-nav text-uppercase">
                        @if(Route::current()->getName() == 'front_index' )
                      <li class="nav-item active ">
                        <a class="nav-link" href="{{route('front_index')}}">Home</a>
                      </li>
                      @else
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('front_index')}}">Home</a>
                      </li>
                      @endif
                         @if(Route::current()->getName() == 'aboutus' )
                      <li class="nav-item active">
                        <a class="nav-link" href="{{route('aboutus')}}">About us</a>
                      </li>
                      @else
                       <li class="nav-item">
                        <a class="nav-link" href="{{route('aboutus')}}">About us</a>
                      </li>
                      @endif
                       @if(Route::current()->getName() == 'services' )
                      <li class="nav-item active">
                        <a class="nav-link active" href="{{route('services')}}">Services</a>
                      </li>
                      @else
                       <li class="nav-item">
                        <a class="nav-link" href="{{route('services')}}">Services</a>
                      </li>
                      @endif
 @if(Route::current()->getName() == 'contactus' )
                      <li class="nav-item active">
                        <a class="nav-link" href="{{route('contactus')}}">Contacts</a>
                      </li>
                      @else
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('contactus')}}">Contacts</a>
                      </li>
                      @endif

                    </ul>

                  </div>
                </div>
                <div class="col-lg-4 clock_header">
                  <span>08:30 AM - 06:30 PM</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <nav class="navbar-expand-sm">
      <div class="container pb-3">
        <div class="cust_container">
          <div class="row">
            <div class="col-lg-3">
              <a class="navbar-brand" href="{{route('front_index')}}">
                <img src="{{asset('front/images/footer-logo.png')}}" alt="">
              </a>
            </div>
            <div class="col-lg-9 d-flex justify-content-end align-items-center">
              <ul class="navbar-nav text-uppercase navbar2">
                @if(Route::current()->getName() == 'front_index')
                <li class="nav-item active">
                  <a class="nav-link bookTicketLink" href="{{route('front_index')}}#">Book<div>Your Ticket</div></a>
                </li>
                @else
                 <li class="nav-item ">
                  <a class="nav-link bookTicketLink" href="{{route('front_index')}}#">Book<div>Your Ticket</div></a>
                </li>
                @endif
                 @if(Route::current()->getName() == 'all_packages' )
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('all_packages')}}">Packages<div>& Offers</div></a>
                </li>
                @else
                 <li class="nav-item">
                  <a class="nav-link" href="{{route('all_packages')}}">Packages<div>& Offers</div></a>
                </li>
                @endif
                <li class="nav-item">
                  <a class="nav-link travelInsuranceLink" href="{{route('front_index')}}#nav_insurance">Travel<div>Insurance</div></a>
                </li>
                 @if(Route::current()->getName() == 'loyality_program' )
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('loyality_program')}}">Loyalty<div>Program</div></a>
                </li>
                @else
                  <li class="nav-item">
                  <a class="nav-link" href="{{route('loyality_program')}}">Loyalty<div>Program</div></a>
                </li>
                @endif

              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
<main role="main">
 <div class="col-md-12" style="padding-right:18%;padding-left: 18%">
        @if (count($errors) > 0)
        <div class="alert alert-danger" >
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('success'))
        <p class="alert alert-success">{{Session('success')}}</p>
        @endif

    </div>

    @yield('content_front')


  <footer class="pb-3">
      <div class="container">
        <div class="cust_container">
          <div class="row">
            <div class="col-lg-3  align-items-center" style="text-align: center;padding-top: 1em">

<img src="{{asset('images/france.png')}}"  />
<hr/>


              <a href="{{route('front_index')}}"><img src="{{asset('front/images/footer-logo.png')}}" alt="" width="212" height="49" /></a>




            </div>
            <div class="col-lg-3 mt-4 border-white border-right pl-0">
              <div class="footer_title text-uppercase font-weight-bold mb-2 mb-4">Join our<div>Mailing list</div></div>
               <form method="POST" enctype="multipart/form-data" class="well" action="{{route('submit_mailinglist')}}">
                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div><input type="text" name="footer_ur_name" id="footer_ur_name" placeholder="YOUR NAME"></div>
              <div><input type="text" name="footer_ur_email" id="footer_ur_email" placeholder="YOUR EMAIL"></div>
              <div><input type="submit" class="font-weight-bold p-0" name="footer_submit" id="footer_submit" value="Send"></div>
            </form>
            </div>
            <div class="col-lg-3 mt-4 pl-4">
              <div class="footer_title text-uppercase font-weight-bold mb-4">Get<div>in touch</div></div>
              <div class="copyright_border border-white border-right">
                <p>Zouk Mosbeh Main Street ,<br>Saliba building, 1st Floor.</p>
                <p><span>P</span> +961 9 220 400<br><span>E</span> info@straightline.com.lb</p>
              </div>
            </div>
             <div class="col-lg-3 pl-0 ">
            <div class="col-lg-3 pl-0 copyright">
              <a >
                <div class="go_top d-flex justify-content-center align-items-center mb-4">
                  <div class="d-flex justify-content-center align-items-center">Go Top</div>
                </div>
              </div>
              </a>
              <div>© Copyright 2019 <span>STRAIGHTLINE</span>.</div>
              <div>All Rights Reserved.</div>
              <div class="powered mb-3">Powered by <a href="https://www.futuredestination.com" target="_blank"><b>FUTURE DESTINATION</b></a></div>
              <div class="font-weight-bold d-flex align-items-center">
                STAY CONNECTED&nbsp;&nbsp;
                <a href="https://www.facebook.com/StraightLineTravelAndTourism" target="_blank" class="f_fb d-inline-block"></a>&nbsp;
                <a href="https://www.instagram.com/straightlinetraveltourism" target="_blank" class="f_insta d-inline-block"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </main>

  <script src="{{asset('front/js/jquery-3.4.1.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('front/js/popper.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('front/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('front/js/custom.js')}}" crossorigin="anonymous"></script>

 
</body>
</html>