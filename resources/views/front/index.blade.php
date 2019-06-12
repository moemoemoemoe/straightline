@extends('layouts.app_front')

@section('content_front')

 
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="front/images/slider1.jpg" />
        </div>
        <div class="carousel-item">
          <img src="front/images/slider2.jpg" />
        </div>
        <div class="carousel-item">
          <img src="front/images/slider3.jpg" />
        </div>
        <div class="carousel-item">
          <img src="front/images/slider4.jpg" />
        </div>
        <div class="carousel-item">
          <img src="front/images/slider5.jpg" />
        </div>
      </div>
      <div class="container pb-3">
        <div class="cust_container">
          <nav class="flex-column flex-sm-row">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item pl-5 nav-link mb-0 flight_tab active" id="nav_flight-tab" data-toggle="tab" href="#nav_flight" role="tab" aria-controls="nav_flight" aria-selected="true">Flight</a>
              <a class="nav-item pl-5 nav-link mb-0 insurance_tab" id="nav-insurance-tab" data-toggle="tab" href="#nav-insurance" role="tab" aria-controls="nav-insurance" aria-selected="false">Insurance</a>
            </div>
          </nav>
          <div class="tab-content p-4" id="nav-tabContent">
            <div class="tab-pane fade show active " id="nav_flight" role="tabpanel" aria-labelledby="nav_flight-tab">
              <div class="fligh_plan_select d-flex">
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="roundTrip" checked value="roundTrip" name="flightPlan">
                  <label class="form-check-label" for="roundTrip">Round trip</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="oneWay" value="oneWay"  name="flightPlan">
                  <label class="form-check-label" for="oneWay">One Way</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="multiLeg" value="multiLeg"  name="flightPlan">
                  <label class="form-check-label" for="multiLeg">Multi-Leg</label>
                </div>
              </div>
              <div class="flight_date_select pt-3 ">

                <div class="flight roundTrip active">
                  <div class="d-flex align-items-center">
                    <input type="text" name="flight_from_place" id="flight_from_place" value="" placeholder="FROM" class="typeahead" />
                    <img src="front/images/fromto.png" class="px-2" />
                    <input type="text" name="flight_to_place" id="flight_to_place" value="" placeholder="TO" class="typeahead"/>

                    <input type="text" class="datepicker-here date ml-2" data-language='en' id="flight_from_date"  name="flight_from_date" placeholder="DEPART" autocomplete="off">
                    
                    <input type="text" class="datepicker-here date ml-2" data-language='en' id="flight_to_date"  name="flight_to_date" placeholder="RETURN" autocomplete="off">

                  </div>
                  <div class="row align-items-center"> 
                    <div class="col-lg-6">
                      <input type="checkbox" name="fixable_date" id="fixable_date">
                      <label class="form-check-label fixable_date" for="fixable_date">My Dates Are Fixable (-/+ 3 days)</label>
                    </div>
                    <div class="col-lg-6 d-flex mt-2">
                      <select class="adult_dropdown" name="adult" id="adult">
                      
                        <option value="1">ADULT (1)</option>
                        <option value="2">ADULT (2)</option>
                        <option value="3">ADULT (3)</option>
                        <option value="4">ADULT (4)</option>
                      </select>
                      <select class="ml-2" name="child" id="child">
                     
                        <option value="1">CHILD (1)</option>
                        <option value="2">CHILD (2)</option>
                        <option value="3">CHILD (3)</option>
                        <option value="4">CHILD (4)</option>


                      </select>
                    </div>
                  </div>
                </div>

                <div class="flight oneWay">
                  <div class="d-flex align-items-center">
                    <input type="text" name="flight_from_place" id="flight_from_placea" value="" placeholder="FROM" class="typeahead" />
                    <img src="front/images/fromto.png" class="px-2" />
                    <input type="text" name="flight_to_place" id="flight_to_placea" value="" placeholder="TO" class="typeahead"/>
                    <input type="text" class="datepicker-here date ml-2" data-language='en' name="flight_from_date" class="date ml-2" id="flight_from_datea" value="" placeholder="DEPART" autocomplete="off" />
                    <input type="text" class="datepicker-here date ml-2" data-language='en' name="flight_to_date" class="date ml-2" id="flight_to_datea" value="" placeholder="RETURN" autocomplete="off"  />
                    <select class="nb_travellers ml-2"  id="traveller" name="traveller">
                      <option>0 TRAVELLER(S)</option>
                      <option>1 TRAVELLER(S)</option>
                      <option>2 TRAVELLER(S)</option>
                    </select>
                  </div>
                  <div class="row align-items-center"> 
                    <div class="col-lg-8">
                      <input type="checkbox" name="direct_flights" id="direct_flights">
                      <label class="form-check-label fixable_date" for="direct_flights">DIRECT FLIGHTS</label>
                    </div>
                    <div class="col-lg-4 d-flex pl-0 mt-2">
                      <select class="adult_dropdown" name="adult" id="adulta">


                        <option value="1">ADULT (1)</option>
                        <option value="2">ADULT (2)</option>
                        <option value="3">ADULT (3)</option>
                        <option value="4">ADULT (4)</option>
                      </select>
                      <select class="ml-2 child_dropdown" name="child" id="childa">
                      	
                        <option value="1">CHILD (1)</option>
                        <option value="2">CHILD (2)</option>
                        <option value="3">CHILD (3)</option>
                        <option value="4">CHILD (4)</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="flight multiLeg">
                  <div class="multi_flights_cont">
                    <div class="d-flex align-items-center">
                      <input type="text" name="flight_from_place" id="flight_from_placeb" value="" placeholder="FROM" class="typeahead"/>
                      <img src="front/images/fromto.png" class="px-2" />
                      <input type="text" name="flight_to_place" id="flight_to_placeb" value="" placeholder="TO" class="typeahead"/>
                      <input type="text" class="datepicker-here date ml-2" data-language='en' name="flight_from_date" class="date ml-2" id="flight_from_dateb" value="" placeholder="DEPART" autocomplete="off" />
                    </div>
                  </div>
                  <div class="d-flex align-items-center mt-2">
                    <div class="flight_empty">&nbsp;</div>
                    <select class="adult_dropdown" name="adult" id="adultb">

                        <option value="1">ADULT (1)</option>
                        <option value="2">ADULT (2)</option>
                        <option value="3">ADULT (3)</option>
                        <option value="4">ADULT (4)</option>
                      </select>
                   <select class="ml-2 child_dropdown" name="child" id="childb">
                      	 
                        <option value="1">CHILD (1)</option>
                        <option value="2">CHILD (2)</option>
                        <option value="3">CHILD (3)</option>
                        <option value="4">CHILD (4)</option>
                      </select>
                  </div>
                 <!--  <div class="row mt-2">
                    <div class="col-lg-12">
                      <a href="javascript:;" class="add_flight font-weight-bold"><img src="front/images/plus.png" class="align-text-top" /> Add Flight</a>
                    </div>
                  </div> -->
                  
                </div>
                <div class="row align-items-center mt-3">
                  <div class="col-lg-12 d-flex ">
                    <div class="search_border my-auto"></div>
                    <button onclick="search_flight()" class="btn search_flight text-uppercase font-weight-bold float-right">Search Flight</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="nav-insurance" role="tabpanel" aria-labelledby="nav-insurance-tab">
              <div class="flight_date_select pt-3 ">
                <div class="active">
                	<form method="POST" enctype="multipart/form-data" class="well" action="{{route('submit_insurance')}}">
                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="d-flex align-items-center">
                    <input class="" type="text" name="insurance_fullname" id="insurance_fullname" value="" placeholder="FULL NAME" autocomplete="off" />
                    <input class="ml-2" type="text" name="insurance_fathername" id="insurance_fathername" value="" placeholder="FATHER NAME" autocomplete="off" />
                    <input class="ml-2" type="text" name="insurance_phone" id="insurance_phone" value="" placeholder="PHONE NUMBER" autocomplete="off"  />
                    <input class="ml-2" type="email" name="insurance_email" id="insurance_email" value="" placeholder="EMAIL ADDRESS" autocomplete="off" />
                  </div>
                  <div class="d-flex align-items-center mt-2">
                    <input type="text"  name="insurance_birth" class="date datepicker-here" id="insurance_birth" value="" placeholder="BIRTH DATE" autocomplete="off" data-language='en' />
                    <input class="ml-2" type="text" name="insurance_passport" id="insurance_passport" value="" placeholder="PASSPORT NB." autocomplete="off" />
                    <input type="text"  name="flight_from_date" data-language='en' class="date ml-2 datepicker-here" id="flight_from_date_c" value="" placeholder="DEPART" autocomplete="off" />
                    <input type="text"  name="flight_to_date" class="date ml-2 datepicker-here" id="flight_to_date_c" value="" placeholder="RETURN" autocomplete="off" data-language='en' />
                  </div>
                  <div class="d-flex align-items-center mt-2"> 
                    <div class="insurance_empty">&nbsp;</div>
                    <div class="insurance_empty ml-2">&nbsp;</div>
                    <div class="d-flex">
                      <select class="adult_dropdown ml-2" name="adult">
                      
                        <option value="1">ADULT (1)</option>
                        <option value="2">ADULT (2)</option>
                        <option value="3">ADULT (3)</option>
                        <option value="4">ADULT (4)</option>
                      </select>
                      <select class="ml-2" name="child">
                      
                         <option value="1">CHILD (1)</option>
                        <option value="2">CHILD (2)</option>
                        <option value="3">CHILD (3)</option>
                        <option value="4">CHILD (4)</option>
                      </select>
                    </div>
                  </div>
                  <div class="row align-items-center mt-3">
                    <div class="col-lg-12 d-flex">
                      <div class="search_border insurance_border my-auto"></div>
                      <button type="submit" class="btn search_flight text-uppercase font-weight-bold float-right">Get a quote</button>
                    </div>
                  </div>
              </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="cust_container">
        <div class="d-flex best_travel_title mb-5">
          <div class="col-lg-3 pl-0">
            <div class="light_dark_blue_title">BEST TRAVEL<div>PACKAGES</div></div>
          </div>
          <div class="w-100 d-flex align-items-end pr-0">
            <hr class="w-100">
          </div>
        </div>

        <div class="row list_packages mt-4 mb-5 m-0">
        	@foreach($packages_best as $best)
          <div class="col-lg-6 pr-3">
            <a href="{{route('package_detail', $best->id)}}">
              <div class="home_pck  d-flex mb-4">
                <div class="pck_img">
                  <img src="{{asset('uploads/packages/'.$best->main_image)}}" alt="" class="" />
                </div>
                <div class="pt-4 home_pck_details">
                  <h3 class="pck_title pl-3">{{$best->title}}</h3>
                  <div class="pck_continent mt-3 pb-2 mb-2">{{$best->city->country->continent->cont_name}}</div>
                  <div class="pck_days mt-3 pb-2 pl-3 mb-2"><b>{{$best->night}}</b> nights / <b>{{$best->day}}</b> days</div>
                  <div class="pck_starting px-3 py-2 w-100 d-flex justify-content-between align-items-center">
                    <div class="start_price">
                      <i>Starting</i>
                      <div class="pck_price">{{$best->price}}$</div>
                    </div>
                 
                    <div class="">
                    	
                      <button class="text-uppercase font-weight-bold pck_details_btn">Details</button>
               
                    </div>
                 
                  </div>
                </div>
              </div>
            </a>
          </div>
      
          @endforeach
    
   
        
        </div>
      </div>
    </div><!-- /.container -->
   <!--  <div class="popular_destinations py-5" >
      <div class="container">
        <div class="cust_container">
          <div class="d-flex best_travel_title mb-4">
            <div class="pr-4">
              <div class="light_dark_blue_title">POPULAR<div>DESTINATIONS</div></div>
            </div>
            <div class="d-flex w-100 align-items-end pr-0 pl-0">
              <hr class="w-100">
            </div>
          </div>
          <div class="row m-0 popular_list">

  @foreach($populars_all as $all)
            <div class="pr-0">
              <a href="#">
                <div class="home_destination">
                  <div><img src="{{asset('uploads/popular/'.$all->image)}}" alt="" /></div>
                  <div class="dest_title yellow pl-5 mt-1">{{$all->city}}<div>{{$all->country}}</div></div>
                </div>
              </a>
            </div>
@endforeach
           


       
        
      
      
          </div>
        </div>
      </div>
    </div> -->
    <div class="choose_ur_pack d-flex align-items-center">
      <div class="container">
        <div class="cust_container">
          <div class="row align-items-center m-0">
            <div class="p-0 col-lg-3 mr-0">
              <div class="light_dark_blue_title mb-3">CHOOSE<div>YOUR PACKAGE</div></div>
              <form method="POST" enctype="multipart/form-data" class="well" action="{{route('submit_callback')}}">
                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button class="request_callback font-weight-bold text-uppercase" type="submit">Request a callback</button>
            </div>
            <div class="col-lg-9 align-items-end pr-0 pl-0 ml-0">
              <div class="flight_date_select whats_fds ml-3">

              	
                <div class="d-flex align-items-center whats_text">
                  <div class="col-lg-4 mr-0 pl-0">What's On Your Mind?</div>
                  <div class="col-lg-4 mr-0 pl-0">Where Do You Want to Go?</div>
                  <div class="col-lg-4 mr-0 pl-0">Whene  You Want to Go?</div>
                </div>
                <div class="d-flex align-items-center">
                  <select class="mr-2 flex-fill pl-1" name="your_mind">
                    <option value="All Activities"> All Activities</option>
                   
                  </select>
                  <select class="mr-2 flex-fill pl-1" name="your_go">
                    <option value="All over the world">All over the world</option>
                   
                  </select>
                  <select class="mr-2 flex-fill pl-1" name="your_whene">
                    <option value="All seasons">All seasons</option>
                  
                  </select>
                </div>
                <div class="d-flex align-items-center mt-2">
                  <input class="mr-2 flex-fill passenger_bg" type="text" name="ur_fullname" id="ur_fullname" value="" placeholder="YOUR FULL NAME" />
                  <input class="mr-2 flex-fill phone_bg" type="text" name="ur_phone" id="ur_phone" value="" placeholder="YOUR PHONE NUMBER" />
                  <input class="mr-2 flex-fill email_bg" type="text" name="ur_email" id="ur_email" value="" placeholder="YOUR EMAIL ADDRESS" />
                </div>

              </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container my-5">
      <div class="cust_container">
        <div class="d-flex best_travel_title mb-5">
          <div class="col-lg-3 pl-0">
            <div class="light_dark_blue_title">FEATURED<div>PACKAGES</div></div>
          </div>
          <div class="w-100 d-flex align-items-end pr-0">
            <hr class="w-100">
          </div>
        </div>

        <div class="row list_packages featured_pcks mt-4 mb-5 m-0 ">
         @foreach($packages_featured as $featured)
          <div class="col-lg-4">
            <a href="{{route('package_detail', $featured->id)}}">
              <div class="featured_pck">
                <div class="pck_img">
                  <img src="front/images/pack66.jpg" alt="" class="" />
                </div>
                <div class="pt-3 home_pck_details">
                  <h3 class="pck_title pl-3">{{$featured->title}}</h3>
                  <div class="pck_continent mt-3 pb-2 mb-2">{{$featured->city->country->continent->cont_name}}</div>
                  <div class="pck_starting px-3 pt-1 w-100 d-flex justify-content-between align-items-center">
                    <div class="start_price">
                      <div class="pck_price">{{$featured->price}}$</div>
                      <div class="pck_price_days">{{$featured->night}} nights / {{$featured->day}} days</div>
                    </div>
                    <div class="">
                      <button class="text-uppercase font-weight-bold pck_details_btn">Details</button>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
@endforeach
          <div class="col-lg-12 text-center mt-4 text-uppercase ">
            <a href="{{route('all_packages')}}" class="btn btn-allpacks font-weight-bold">All Packages</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade large_bootbox" id="modal-confirm-operator-message" tabindex="-1" role="dialog" style="z-index: 999999999">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-4" id="operator_logo">
<img src="{{asset('front/images/oops.png')}}" width="100px" height="100px">
            </div>
            <div class="col-md-9 col-sm-8 col-xs-8" style="color: #000">
            Somthing is Missing Please Make Sure Your Are Fill All Form Input...
            </div>
          </div>
        </div>

        <!-- Modal Actions -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ok</button>
<!--           <button type="button" class="btn btn-success" onclick="()" id="confirm_btn">Continue</button>
 -->        </div>
      </div>
    </div>
  </div>
 <script type="text/javascript">
 var type = 1;
  $("input:radio").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:radio[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    //window.alert($box.val()) 
     if($box.attr('id') == "roundTrip")
    {
      
     type = 1;


      }
    if($box.attr('id') == "oneWay")
    {
      
      type = 2;
    }
   if($box.attr('id') == "multiLeg")
    {
    
      type = 3;
    }
 
    
   
 }

});


  function search_flight(){
  	var from = $('#flight_from_place').val();
  	var to = $('#flight_to_place').val();
  	var dep_date = $('#flight_from_date').val();
  	var rev_date = $('#flight_to_date').val();
  	var adu = $('#adult').val();
  	var chil = $('#child').val();

  	var froma = $('#flight_from_placea').val();
  	var toa = $('#flight_to_placea').val();
  	var dep_datea = $('#flight_from_datea').val();
  	var rev_datea = $('#flight_to_datea').val();
  	var adua = $('#adulta').val();
  	var chila = $('#childa').val();

  	var fromb = $('#flight_from_placeb').val();
  	var tob = $('#flight_to_placeb').val();
  	var dep_dateb = $('#flight_from_dateb').val();
  	var adub = $('#adultb').val();
  	var chilb = $('#childb').val();
  	var the_type = type ;
       if(the_type == 1)
       {
        if(from && to && dep_date && rev_date)
        {
       	  $.ajax({
    
        url: '{{route('front_index')}}',
        type: 'POST',
        data:{
          _token: '{{ csrf_token() }}',
          the_type: the_type,
          from: from,
          to: to,
          dep_date: dep_date,
          rev_date: rev_date,
          adu: adu,
          chil: chil
        },
        cache: false,
        datatype: 'JSON',
        success: function(data){
        window.location.href = '{{route('result_search')}}';
        },
        error: function(){
         
        }
      });
        }
        else
        {
          
      $('#modal-confirm-operator-message').modal('show');
   
        }
       	 
       }
       if (the_type == 2) {
        if(froma && toa && dep_datea && rev_datea)
        {
       	  $.ajax({
        url: '{{route('front_index')}}',
        type: 'POST',
        data:{
          _token: '{{ csrf_token() }}',
          the_type: the_type,
          from: froma,
          to: toa,
          dep_date: dep_datea,
          rev_date: rev_datea,
          adu: adua,
          chil: chila
        },
        cache: false,
        datatype: 'JSON',
        success: function(data){
        window.location.href = '{{route('result_search')}}';
        },
        error: function(){
         
        }
      });
        }
        else
        {$('#modal-confirm-operator-message').modal('show');}
       	
       }
       if (the_type == 3) {
         if(fromb && tob && dep_dateb)
        {
       	  $.ajax({
        url: '{{route('front_index')}}',
        type: 'POST',
        data:{
          _token: '{{ csrf_token() }}',
          the_type: the_type,
          from: fromb,
          to: tob,
          dep_date: dep_dateb,
          rev_date: '30/10/2010',
          adu: adub,
          chil: chilb
        },
        cache: false,
        datatype: 'JSON',
        success: function(data){
        window.location.href = '{{route('result_search')}}';
        },
        error: function(){
         
        }
      });
       }
       else
        {$('#modal-confirm-operator-message').modal('show');}

 }
    }
</script>
 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> -->
  <script src="{{asset('js/typeahead.jquery.js')}}" crossorigin="anonymous"></script>

 <script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
       hint: false,
    highlight: true,
     maxItem: 100, 
        minLength: 2,
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>

@endsection