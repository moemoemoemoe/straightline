@extends('layouts.app_front')
@section('content_front')

<br/><br/><br/><br/><br/>
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
    </div>



@endsection