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
    <link href="{{ asset('css/flatly.min.css') }}" rel="stylesheet">

   
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

     <nav class="navbar navbar-expand-lg navbar-dark bg-primary" >

        <div class="container" >

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
 @if(Route::current()->getName() == 'login'  ||  Route::current()->getName() == 'register' ) 

 @else
                <ul class="nav " style="font-size: 0.8em">
                   <!--  nav-tabs -->
                   
                <li class="nav-item dropdown">
                      @if( Route::current()->getName() == 'manage_country' || Route::current()->getName() == 'manage_city' )
                    <a class="active nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Counrties & Cities</a>
                    @else
                     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Counrties & Cities</a>
                    @endif
                    <div class="dropdown-menu">
                      @if(Route::current()->getName() == 'manage_cont' )
                    <a class="active dropdown-item" href="{{route('manage_cont')}}" > Manage Continents</a>
@else
                    <a class="dropdown-item" href="{{route('manage_cont')}}" > Manage Continents</a>

@endif
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
                <a class="active nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Managmenet</a>
                @else
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Managmenet</a>
                @endif
                <div class="dropdown-menu">
                    
                    @if(Route::current()->getName() == 'manage_themes' )

                    <a class="active dropdown-item" href="{{route('manage_themes')}}">Manage Themes </a> 
@else
                    <a class="dropdown-item" href="{{route('manage_themes')}}">Manage Themes </a> 

@endif
                 
                        
                   
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
                
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Static Pages</a>
             
                <div class="dropdown-menu">
                    @if(Route::current()->getName() == 'create_service' )
                    <a class="active dropdown-item" href="{{route('create_service')}}" >  Services</a>
@else
                    <a class="dropdown-item" href="{{route('create_service')}}" >  Services</a>

@endif
 @if(Route::current()->getName() == 'contact_index' )
                    <a class="active dropdown-item" href="{{route('contact_index')}}" > Contact Us</a>

                   @else
                                       <a class=" dropdown-item" href="{{route('contact_index')}}" > Contact Us</a>
@endif

@if(Route::current()->getName() == 'profile_index' )
                    <a class="active dropdown-item" href="{{route('profile_index')}}" > Profile</a>

                   @else
                                       <a class=" dropdown-item" href="{{route('profile_index')}}" > Profile</a>
@endif
@if(Route::current()->getName() == 'loyality_index' )
                    <a class="active dropdown-item" href="{{route('loyality_index')}}" > Loyality Page</a>

                   @else
                                       <a class=" dropdown-item" href="{{route('loyality_index')}}" > Loyality Page</a>
@endif



@if(Route::current()->getName() == 'faq_index' )
                    <a class="active dropdown-item" href="{{route('faq_index')}}" > Faq ? </a>

                   @else
                                       <a class=" dropdown-item" href="{{route('faq_index')}}" > Faq ?</a>
@endif



@if(Route::current()->getName() == 'terms_index' )
                    <a class="active dropdown-item" href="{{route('terms_index')}}" > Terms & Condition </a>

                   @else
                                       <a class=" dropdown-item" href="{{route('terms_index')}}" > Terms & Condition </a>
@endif
                                        </div>
                   
                </li>


                <li class="nav-item dropdown">
                
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Forms</a>
             
                <div class="dropdown-menu">

<a class="dropdown-item" href="{{route('manage_sending_mails')}}" >Manage Sending mails</a>


                  @if(Route::current()->getName() == 'reservation_package' )
                    <a class="active dropdown-item" href="{{route('reservation_package')}}" > Package Reservation</a>
@else
                    <a class="dropdown-item" href="{{route('reservation_package')}}" >  Package Reservation</a>

@endif
                    @if(Route::current()->getName() == 'insurance_index' )
                    <a class="active dropdown-item" href="{{route('insurance_index')}}" > Insurance</a>
@else
                    <a class="dropdown-item" href="{{route('insurance_index')}}" >  Insurance</a>

@endif
 @if(Route::current()->getName() == 'callback_index' )
                    <a class="active dropdown-item" href="{{route('callback_index')}}" > CallBack</a>

                   @else
                                       <a class=" dropdown-item" href="{{route('callback_index')}}" > CallBack</a>
@endif

 @if(Route::current()->getName() == 'mailing_index' )
                    <a class="active dropdown-item" href="{{route('mailing_index')}}" > Mailing List</a>

                   @else
                                       <a class=" dropdown-item" href="{{route('mailing_index')}}" > Mailing List</a>
@endif

@if(Route::current()->getName() == 'contactmessage_index' )
                    <a class="active dropdown-item" href="{{route('contactmessage_index')}}" >Contact Us Messages</a>

                   @else
                                       <a class=" dropdown-item" href="{{route('contactmessage_index')}}" >Contact Us Messages</a>
@endif
@if(Route::current()->getName() == 'loyality_messages' )
                    <a class="active dropdown-item" href="{{route('loyality_messages')}}" >Loyality Messages</a>

                   @else
                                       <a class=" dropdown-item" href="{{route('loyality_messages')}}" >Loyality Messages</a>
@endif
                                        </div>
                   
                </li>
          </ul>

@endif
          <ul class="navbar-nav ml-auto">

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            
            @endif
            @else

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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



    CKEDITOR.replace('description');
    CKEDITOR.replace('detailed');
    CKEDITOR.replace('price_included');
    CKEDITOR.replace('execluded');
    // CKEDITOR.replace('missions');
    // CKEDITOR.replace('visions');
    // CKEDITOR.replace('goals');
    
    CKEDITOR.replace('values');

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
});

function show_hotels(id){

  var city_id = id.value;
 
//window.alert(id_room);
$.ajax({
  url: '{{route('show_hotels')}}',
  type: 'POST',
  data:{
    _token: '{{ csrf_token() }}',
    city_id:city_id
  },
  cache: false,
  datatype: 'JSON',
  success: function(response){
    $('#loading').show();
    $('#hotel_id').html('');
    var i;
    var count = Object.keys(response).length;
    if(count == 0)
    {
      var option=$('<option></option>');
      option.attr('value',-1);
      option.text('--No hotels--');
      $('#hotel_id').append(option);
    } else
    {
    var JSONObject = JSON.parse(JSON.stringify(response));
    $('#hotel_id').append('<option value="0">-- Select Hotel --</option>');
    for(i=0;i<count;i++)
    { 
     var option=$('<option></option>');
     option.attr('value',JSONObject[i]["id"]);
     option.text(JSONObject[i]["name"]);
     $('#hotel_id').append(option);
   }
 }
   // $('#hotel_id').append('<option value="0">---choose--</option>');
   $('#loading').hide();

 },error:function(){
  alert('Somthing Went Wrong');
  $('#loading').hide();

}
});
}

</script>
</body>

</html>

