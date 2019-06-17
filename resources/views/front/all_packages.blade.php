@extends('layouts.app_front')
@section('content_front')



<div class="packages_map d-flex">
      <div class="container">
        <div class="cust_container">
          <div class="row font-weight-bold">
            <div class="align-items-center col-lg-3 col-md-3 d-flex flex-column justify-content-center">
              <a href="javascript:;" id="middle_east_and_africa">
               <div class="cellWrapper">
                <div class="cell">
                  <div class="map_img text-center"><img src="front/images/africa.png"  alt="" /></div>
                  <div class="align-items-center d-flex map_text justify-content-center africa_title"><div class="mr-2 continent_plane" /></div>MIDDLE EAST<br>& AFRICA</div>
                </div>
              </div>
            </a>
          </div>
          <div class="align-items-center col-lg-3 col-md-3 d-flex flex-column justify-content-center">
            <a href="javascript:;" id="europe">
              <div class="cellWrapper">
                <div class="cell">
                  <div class="map_img text-center"><img src="front/images/europe.png"  alt="" /></div>
                  <div class="align-items-center d-flex map_text justify-content-center"><div class="continent_plane mr-2" /></div>EUROPE</div>
                </div>
              </div>
            </a>
          </div>
          <div class="align-items-center col-lg-3 col-md-3 d-flex flex-column justify-content-center">
            <a href="javascript:;" id="north_america">
              <div class="cellWrapper">
                <div class="cell">
                  <div class="map_img text-center"><img src="front/images/north-america.png"  alt="" /></div>
                  <div class="align-items-center d-flex map_text justify-content-center"><div class="mr-2 continent_plane" /></div>NORTH AMERICA</div>
                </div>
              </div>
            </a>
          </div>
          <div class="align-items-center col-lg-3 col-md-3 d-flex flex-column justify-content-center">
            <a href="javascript:;" id="asia">
              <div class="cellWrapper">
                <div class="cell">
                  <div class="map_img text-center last"><img src="front/images/asia.png"  alt="" /></div>
                  <div class="align-items-center d-flex map_text justify-content-center"><div class="mr-2 continent_plane" /></div>ASIA</div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="packages_offers_form pt-3">
    <div class="container mb-2">
      <div class="cust_container">
        <div class="row align-items-center flight_date_select ">
        <!--   <input type="text" name="flight_destination" id="flight_destination" value="" placeholder="DESTINATION" autocomplete="off"/> -->
        <form method="POST" enctype="multipart/form-data" class="well" action="{{route('search_in_all_package')}}">
                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <select class="flight_theme ml-3 " name="city_id">
            @foreach($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
           
            @endforeach
          </select>
          <input type="text"  name="flight_from_date" class="date ml-3 datepicker-here" id="flight_from_date" value="" placeholder="DEPART" autocomplete="off" data-language="en" />
          <input type="text" data-language="en"  name="flight_to_date" class="date ml-3 datepicker-here" id="flight_to_date" value="" placeholder="RETURN" autocomplete="off" />
          <input type="text" name="flight_budget" id="flight_budget" value="" placeholder="FROM BUDGET" class="dollar ml-3" autocomplete="off"/>
             <input type="text" name="flight_budget_to" id="flight_budget_to" value="" placeholder="TO BUDGET" class="dollar ml-3" autocomplete="off"/>
             <br/>
          <select class="flight_theme  ml-3 well" name="theme_id" style="margin-top:30px ">
            @foreach($themes as $theme)
            <option value="{{$theme->id}}">{{$theme->theme_name}}</option>
           
            @endforeach
          </select>
      
        
          <input type="submit" value="Search" class="btn search_form_btn font-weight-bold col-md-4" >
        </p>
        </form>
        </div>

        <div class="d-flex best_travel_title mb-3 pt-5 pb-4">
          <div class="col-lg-12 pl-0 text-center text-uppercase">
            <div class="light_dark_blue_title po_title">PACKAGES & OFFERS</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="packages_offers container mb-5">
    <div class="cust_container">

    
        {{ csrf_field() }}
  
    <div id="post_data" class="row justify-content-between list_packages featured_pcks mb-5 m-0 "></div>
     
    
    
    </div>
   </div>
     
      </div>
    </div>
  </div>



<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"{{ route('load_data') }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data);
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Loading...</b>');
  load_data(id, _token);
 });

});
</script>



@endsection