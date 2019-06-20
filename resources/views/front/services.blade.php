@extends('layouts.app_front')
@section('content_front')


<div class="package_d_cont">
      <div class="container">
        <div class="cust_container">
          <div class="cellWrapper">
            <div class="cell">
              <div class="pck_d_title font-weight-bold text-uppercase">OUR SERVICES</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="serviceTitleCont pt-5">
      <div class="container mb-0">
        <div class="cust_container">
          <div class="singleTitle serviceTitle mb-4">
            <div class="darkBlue font-weight-bold text-uppercase font_25">VISA</div>
            <div class="lightBlue font_18 font-italic">Your key to the world</div>
          </div>
          <div class="row resetRow mb-5">
            <div class="col-lg-4 st_tab-menu">
              <div class="list-group text-left">
                 <a href="#" class="list-group-item active planeBg">
                  {{$services_important_first[0]->name}}
                </a>
                @foreach($services_important as $service)
                <a href="#" class="list-group-item  planeBg">
                  {{$service->name}}
                </a>
                @endforeach
              </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-9 col-xs-9 st_tab">

              <div class="st_tab_content active">
                <div class="materialsneeded font-weight-bold text-uppercase font_20">
                  <div class="darkBlue">MATERIALS NEEDED</div>
                  <div class="yellowColor"> {{ $services_important_first[0]->name }}</div>
                </div>
                <div class="greyColor my-4">
                {!! $services_important_first[0]->description !!}
                </div>
              </div>
  @foreach($services_important as $service)

              <div class="st_tab_content">
                <div class="materialsneeded font-weight-bold text-uppercase font_20">
                  <div class="darkBlue">MATERIALS NEEDED</div>
                  <div class="yellowColor"> {{ $service->name }}</div>
                </div>
                <div class="greyColor my-4">
                {!! $service->description !!}
                </div>
              </div>
             @endforeach
             
         
       

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="serviceBottomCont pt-5">
      <div class="container mb-0">
        <div class="cust_container">
          <div class="row greyColor mb-5">
            <div class="col-lg-4 borderRight">
              <div class="serviceBottomTitle yellowPlane mb-4">
                <div class="darkBlue font-weight-bold text-uppercase font_25">FLIGHTS</div>
                <div class="lightBlue font_18 font-italic">We'll get you there</div>
              </div>
              <p>When it comes to airlines, we are one of the most favored travel agencies in the region. Confirming reservations, issuing tickets and providing information about airlines schedules, connections fares and other services with different airlines.</p>
              <a href="{{route('front_index')}}" class="btn d-flex align-items-center serviceBtn bookTicketBtn text-uppercase font-weight-bold" style="color: #fff"><span></span>Book Your Ticket</a>
            </div>
            <div class="col-lg-4 borderRight">
              <div class="serviceBottomTitle hotelBg mb-4">
                <div class="darkBlue font-weight-bold text-uppercase font_25">HOTEL RESERVATION</div>
                <div class="lightBlue font_18 font-italic">Atmosphere of comfort & luxury</div>
              </div>
              <p>When it comes to booking a hotel, From the top starred to the most undiscovered hotels and resorts in the world, Straight Line can direct you to the  one suitable for you. We provide more service and get better prices than anyone else. That’s one of the success secrets of our reputation.</p>
            </div>
            <div class="col-lg-4">
              <div class="serviceBottomTitle insuranceBg mb-4">
                <div class="darkBlue font-weight-bold text-uppercase font_25">INSURANCE</div>
                <div class="lightBlue font_18 font-italic">Relax & Travel with Peace of Mind</div>
              </div>
              <p>Travel insurance is an essential part of your holiday preparations. That is why at Straight Line, we believe safety comes first and we are delighted to provide you with a wide array of possibilities. From covering medical issues, to loss of luggage, and more. Travel insurance can equally be tailored to your needs. contact us for more info.</p>
              <a href="{{route('front_index')}}#nav_insurance" class="btn d-flex align-items-center serviceBtn travelInsuranceBtn text-uppercase font-weight-bold" style="color: #fff"><span></span>Get a travel insurance</a>
            </div>
          </div>
          <div class="d-flex best_travel_title mb-5 serviceBorder">
            <div class="col-lg-3 pl-0">
              <div class="serviceBlueTitle mt-5 darkBlue font_25 text-uppercase font-weight-bold">More Services</div>
            </div>
            <div class="w-100 d-flex align-items-end pr-0">
              <hr class="w-100">
            </div>
          </div>
          <div class="row greyColor serviceBottomList pb-5 mb-5">

         
            <div class="col-lg-4">
              <ul>
                <li>Leisure & Vacation Travel Planning</li>
                <li>Corporate Travel Management</li>
                <li>France Visa formalities</li>
                <li>Airport Assistance</li>
              </ul>
            </div>
            <div class="col-lg-4">
              <ul>
                <li>Visa Consultancy</li>
                <li>Credits facilities</li>
                <li>Organization of Civil Weddings</li>
                <li>Wholesaler for Travel Agencies</li>
              </ul>
            </div>
            <div class="col-lg-4">
              <ul>
                <li>Hotels, Apartments, Bed & Breakfast, Accommodations</li>
                <li>Tours & Packages</li>
                <li>Event Management</li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>




@endsection