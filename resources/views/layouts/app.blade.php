<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    

    <script src="https://cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>
    <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/minty.min.css') }}" rel="stylesheet">

   
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


</head>
<body>
    <div id="app" >

     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >

        <div class="container" >

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <ul class="nav ">
                   <!--  nav-tabs -->
                   
                <li class="nav-item dropdown">
                      @if( Route::current()->getName() == 'manage_country' || Route::current()->getName() == 'manage_city' )
                    <a class="active nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Counrties & Cities</a>
                    @else
                     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Counrties & Cities</a>
                    @endif
                    <div class="dropdown-menu">
                        @if( Route::current()->getName() == 'manage_country' )
                        
                        <a class="dropdown-item active" href="{{route('manage_country')}}" >Manage Country
                        </a>
                        @else
                         <a class="dropdown-item" href="{{route('manage_country')}}" >Manage Country
                        </a>
                        @endif
                        @if( Route::current()->getName() == 'manage_city' )
                        <a class="active dropdown-item" href="{{route('manage_city')}}">
                         Manage Cities
                     </a> 
                       @else   
                        <a class="dropdown-item" href="{{route('manage_city')}}">
                         Manage Cities
                     </a>      
                     @endif
                   
                 </div>
             </li>


             <!--  -->

             <li class="nav-item dropdown">
                 @if( Route::current()->getName() == 'manage_cont' || Route::current()->getName() == 'manage_themes' || Route::current()->getName() == 'manage_hotel' )
                <a class="active nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">General</a>
                @else
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">General</a>
                @endif
                <div class="dropdown-menu">
                    @if(Route::current()->getName() == 'manage_cont' )
                    <a class="active dropdown-item" href="{{route('manage_cont')}}" > Manage Continents</a>
@else
                    <a class="dropdown-item" href="{{route('manage_cont')}}" > Manage Continents</a>

@endif
                    @if(Route::current()->getName() == 'manage_themes' )

                    <a class="active dropdown-item" href="{{route('manage_themes')}}">Manage Themes </a> 
@else
                    <a class="dropdown-item" href="{{route('manage_themes')}}">Manage Themes </a> 

@endif
                    <div class="dropdown-divider">
                        
                    </div>
                    @if(Route::current()->getName() == 'manage_hotel' )

                    <a class="active  dropdown-item" href="{{route('manage_hotel')}}" > Manage Hotels </a> 
                    @else
                                        <a class="dropdown-item" href="{{route('manage_hotel')}}" > Manage Hotels </a> 

@endif   
</div>
                </li>

                <!--  -->
                <li class="nav-item dropdown">
                       @if( Route::current()->getName() == 'manage_package_categories' || Route::current()->getName() == 'create_package' || Route::current()->getName() == 'view_packages' )
                    <a class="active nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Packages</a>
                    @else
                     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Packages</a>
                    @endif
                    <div class="dropdown-menu">
 @if(Route::current()->getName() == 'manage_package_categories' )
                       <a class="active dropdown-item" href="{{route('manage_package_categories')}}" >
                          Manage Package Categories
                      </a>
                      @else 
                       <a class="dropdown-item" href="{{route('manage_package_categories')}}" >
                          Manage Package Categories
                      </a>
                      @endif
 @if(Route::current()->getName() == 'create_package' )

                      <a class="active dropdown-item" href="{{route('create_package')}}">
                          Create New Package
                      </a>
                      @else
                      <a class="dropdown-item" href="{{route('create_package')}}">
                          Create New Package
                      </a>
                      @endif
                       @if(Route::current()->getName() == 'view_packages' )

                      <a class="active dropdown-item" href="{{route('view_packages')}}">
                          View Packages
                      </a>
                      @else
                        <a class="dropdown-item" href="{{route('view_packages')}}">
                          View Packages
                      </a>
                      @endif

                  </div>
              </li>

              <!--  -->

                <li class="nav-item dropdown">
                 @if( Route::current()->getName() == 'create_popular')
                <a class="active nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Popular Destination</a>
                @else
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Popular Destination</a>
                @endif
                <div class="dropdown-menu">
                    @if(Route::current()->getName() == 'create_popular' )
                    <a class="active dropdown-item" href="{{route('create_popular')}}" > Create Destination</a>
@else
                    <a class="dropdown-item" href="{{route('create_popular')}}" > Create Destination</a>

@endif
                   
                        
                    </div>
                   
                </li>


                <li class="nav-item dropdown">
                
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Informations</a>
             
                <div class="dropdown-menu">
                    @if(Route::current()->getName() == 'create_service' )
                    <a class="active dropdown-item" href="{{route('create_service')}}" > Create Service</a>
@else
                    <a class="dropdown-item" href="{{route('create_service')}}" > Create Service</a>

@endif
                    <a class="dropdown-item" href="{{route('create_service')}}" > Contact Us</a>

                   
                                        </div>
                   
                </li>


          </ul>


          <ul class="navbar-nav ml-auto">

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>
</div>
</div>

</nav>

<main class="py-4">

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

    @yield('content')

</main>
<script type="text/javascript">



    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'detailed' );
    CKEDITOR.replace( 'price_included' );

</script>

</div>
<script type="text/javascript"> $(function () {
 var bindDatePicker = function() {
    $(".date").datetimepicker({
        format:'YYYY-MM-DD',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    }).find('input:first').on("blur",function () {
            // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
            // update the format if it's yyyy-mm-dd
            var date = parseDate($(this).val());

            if (! isValidDate(date)) {
                //create date based on momentjs (we have that)
                date = moment().format('YYYY-MM-DD');
            }

            $(this).val(date);
        });
}

var isValidDate = function(value, format) {
    format = format || false;
        // lets parse the date to the best of our knowledge
        if (format) {
            value = parseDate(value);
        }

        var timestamp = Date.parse(value);

        return isNaN(timestamp) == false;
    }

    var parseDate = function(value) {
        var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
        if (m)
            value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

        return value;
    }

    bindDatePicker();
});</script>
</body>

</html>

