@extends('layouts.app_front')
@section('content_front')

 <div class="package_d_cont">
      <div class="container">
        <div class="cust_container">
          <div class="cellWrapper">
            <div class="cell">
              <div class="pck_d_title font-weight-bold text-uppercase">PACKAGES & OFFERS, <span>{{$package_same_cat[0]->city->country->continent->cont_name}}</span></div>
            </div>
          </div>
          <a href="{{route('front_index')}}" class="p_back text-uppercase font-weight-bold">Back</a>
        </div>
      </div>
    </div>
    <div class="singleTitleCont py-3">
      <div class="container mb-2">
        <div class="cust_container">
          <div class="singleTitle darkBlue text-normal font-weight-bold mb-4">{{$packages_detail->title}}</div>
        </div>
      </div>
    </div>
    <div class="py-3 greyColor packageSliderCont">
      <div class="container mb-2">
        <div class="cust_container">
          <div class="d-flex">
            <div class="">
              <div id="packageSlider" class="carousel slide d-flex align-items-center" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#packageSlider" data-slide-to="0" class="active"></li>
                   @php
$i = 1;
@endphp
                  @foreach($galleries as $gallery)
@if($i >= count($galleries))

@else
                  <li data-target="#packageSlider" data-slide-to="{{$i}}"></li>
@endif
                  @php $i++; 
                   @endphp
                  @endforeach
                 
                </ol>
                <div class="carousel-inner">

                 <div class="carousel-item text-center active">
                    <img class="d-inline-block" src="{{asset('uploads/packages/'.$packages_detail->main_image)}}" alt="">
                  </div>
                    	
               @foreach($galleries as $gallery)
               @if($gallery->img_url == $packages_detail->main_image)
              @else

                  <div class="carousel-item text-center ">
                  	
                    <img class="d-inline-block" src="{{asset('uploads/packages/'.$gallery->img_url)}}" alt="">
                </div>
                @endif
                 @endforeach  
                
                </div>
              </div>
            </div>
            <div class="pt-4 pl-2 singleMapPrice">
            
            	
              <div class="show_location text-uppercase font-weight-bold darkBlue">Show Location</div>
              <div class="gmap_canvas mt-2">
                <iframe width="100%" height="100%" class="" src="https://maps.google.com/maps?q={{$packages_detail->city->name}}%20{{$packages_detail->city->country->name}}&t=&z=8&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
              </div>
           
              <div class="my-3 days_nights lightBlue font-weight-bold">{{$packages_detail->night}} Nights / {{$packages_detail->day}} Days</div>
              <div class="mt-3 singleBlue px-3 lightBlue font-weight-bold d-flex align-items-center">
                <i class="mr-2">Starting</i>
                <div class="yellowColor singlePrice mr-4">${{$packages_detail->price}}</div>
                <i class="ml-5">per person</i>
              </div>
              <a href="#form_request_package">
              <button  class="request_callback singleRequest font-weight-bold text-uppercase mt-3">Submit a Request</button>
            </a>
            </div>
          </div>
          <div class="row mb-5 detailedContainer" id="form_request_package">
            <div class="col-lg-6">
              <div class="darkBlue font_25 mb-2">Celebrate Summer 2019 in {{$packages_detail->city->name}}</div>
              <div class="greyColor">
                <p>{!! $packages_detail->description !!}</p>
                  <div>From {{$packages_detail->depart_date}} till {{$packages_detail->revenu_date}}</div>
                  
                </div>
                <div class="mt-4">
                  <div class="darkBlue text-uppercase font-weight-bold font_25 mb-2">PRICE INCLUDES</div>
                  <ul class="singleUl">
                                      {!! $packages_detail->price_included !!}

                  </ul>
                  @if($packages_detail->detailed && $packages_detail->price_execluded)
                   <div class="darkBlue text-uppercase font-weight-bold font_25 mb-2">PRICE Execluded</div>
                  <ul class="singleUl">
                                      {!! $packages_detail->price_execluded !!}

                  </ul>
                  @endif
                  @if(!$packages_detail->brochur_url)
                  <button class="btn mt-4 download_broshure yellowColor font-weight-bold text-uppercase">Download Brochure</button>
                  @else

                  @endif
                </div>

              </div>
@if($packages_detail->detailed && !$packages_detail->price_excluded)



              <div class="col-lg-6">
                <div class="leftShadow">
                  <div class="detailed_itin mb-4 font-weight-bold darkBlue font_25 text-uppercase">DETAILED ITINERARY</div>
                  <div id="accordion">
@if(count($data2) == 1)
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            DAY1
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                       {{$data2[0]['value']}}
                        </div>
                      </div>
                    </div>
@endif
@if(count($data2) == 2)
                          <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            DAY1
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          {{$data2[0]['value']}}
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            DAY2
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        {{$data2[1]['value']}}
                       </div>
                     </div>
                   </div>
@endif
@if(count($data2) == 3)
  <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            DAY1
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                         {{$data2[0]['value']}}
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            DAY2
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        {{$data2[1]['value']}}
                       </div>
                     </div>
                   </div>
                   <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          DAY3
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                       {{$data2[2]['value']}}
                      </div>
                    </div>
                  </div>
                  @endif
@if(count($data2) == 4)
  <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            DAY1
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                         {{$data2[0]['value']}}
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            DAY2
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        {{$data2[1]['value']}}
                       </div>
                     </div>
                   </div>
                   <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          DAY3
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        {{$data2[2]['value']}}
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          DAY4
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body">
                       {{$data2[3]['value']}}
                      </div>
                    </div>
                  </div>
@endif
@if(count($data2) == 5)
  <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            DAY1
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                           {{$data2[0]['value']}}
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            DAY2
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        {{$data2[1]['value']}}
                       </div>
                     </div>
                   </div>
                   <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          DAY3
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                       {{$data2[2]['value']}}
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          DAY4
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body">
                       {{$data2[3]['value']}}
                      </div>
                    </div>
                  </div>
                  <div class="card" >
                    <div class="card-header" id="headingFive">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          DAY5
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                      <div class="card-body">
                       {{$data2[4]['value']}}
                      </div>
                    </div>
                  </div>
@endif
                </div>
              </div>
            </div>
@else

<div class="col-lg-6">
                <div class="leftShadow">
                  <div class="mb-4 font-weight-bold darkBlue font_25 text-uppercase">PRICE Execluded </div>
                  <div id="accordion">
                     <ul class="singleUl">
{!! $packages_detail->price_execluded !!}

</ul>

                    </div>
                  </div></div>

@endif

          </div>
        </div>
      </div>
    </div>
    <div class="choose_ur_pack single_choose d-flex align-items-center mb-4 py-3"  >
      <div class="container">
        <div class="cust_container">
          <div class="row align-items-center m-0">
            <div class="col-lg-12 align-items-end pr-0 pl-0 ml-0">
              <div class="flight_date_select whats_fds ml-3 singleBlueForm">
                <div class="d-flex align-items-center whats_text ">
                  <div class="col-lg-4 mr-0 pl-0"><div class="light_dark_blue_title mb-3 font_25"><div>PLEASE FILL</div>THE FORM BELOW</div></div>
                </div>
                 <form method="POST" enctype="multipart/form-data" class="well" action="{{route('submit_reservation_pack', $packages_detail->id)}}">
                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="d-flex align-items-center mt-2">
                  <input class="mr-3 flex-fill passenger_bg" type="text" name="firstname" id="firstname" value="" placeholder="FIRST NAME" autocomplete="off">
                  <input class="mr-3 flex-fill passenger_bg" type="text" name="lastname" id="lastname" value="" placeholder="LAST NAME" autocomplete="off">
                  <input class="mr-3 flex-fill email_bg" type="text" name="email" id="email" value="" placeholder="EMAIL" autocomplete="off">
                  <input class="flex-fill phone_bg" type="text" name="phone" id="phone" value="" placeholder="PHONE NUMBER" autocomplete="off">
                </div>
                <div class="d-flex align-items-center mt-2">
                  <input class="mr-3 flex-fill passenger_bg" type="text" name="nbtravellers" id="nbtravellers" value="" placeholder="NB. OF TRAVELLERS" autocomplete="off">
                  <input type="text" autocomplete="off"  name="from_date" class="date mr-3 flex-fill datepicker-here" id="from_date" value="" placeholder="DEPART DATE" data-language = "en" />
                    <input autocomplete="off" type="text"  name="to_date" class="date mr-3 flex-fill datepicker-here" id="to_date" value="" placeholder="RETURN DATE" data-language = "en" />
                  <input  autocomplete="off" class="flex-fill" type="text" name="message" id="message" value="" placeholder="MESSAGE">
                </div>
                <button  type="submit" class="request_callback font-weight-bold text-uppercase mt-3 float-right">Request</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="packages_offers container mb-5">
      <div class="cust_container">
        <div class="darkBlue font-weight-bold text-uppercase you_may mb-3">YOU MAY ALSO LIKE</div>
        <div class="row justify-content-between list_packages featured_pcks mb-5 m-0 ">
          
    @foreach($package_same_cat as $same_cat )
          <div class="col-lg-4">
            <a href="{{route('package_detail', $same_cat->id)}}">
              <div class="featured_pck">
                <div class="pck_img">
                  <img src="{{asset('uploads/packages/'.$same_cat->main_image)}}" alt="" class="" style="width: 324px" />
                  <div class="pck_type text-uppercase"><i>{{$same_cat->cat->cat_name}}</i></div>
                </div>
                <div class="pt-3 home_pck_details">
                  <h3 class="pck_title pl-3">{{$same_cat->title}}</h3>
                  <div class="pck_continent mt-3 pb-2 mb-2">{{$same_cat->city->country->continent->cont_name}}</div>
                  <div class="pck_starting px-3 pt-1 w-100 d-flex justify-content-between align-items-center">
                    <div class="start_price">
                      <div class="pck_price">${{$same_cat->price}}</div>
                      <div class="pck_price_days">{{$same_cat->night}} nights / {{$same_cat->day}} days</div>
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