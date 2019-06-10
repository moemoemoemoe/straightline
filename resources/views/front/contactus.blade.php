@extends('layouts.app_front')
@section('content_front')


 <div class="package_d_cont">
      <div class="container">
        <div class="cust_container">
          <div class="cellWrapper">
            <div class="cell">
              <div class="pck_d_title font-weight-bold text-uppercase">Contact us</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="contactMap">
      <div class="roundedShadow">
        <iframe class="col-lg-7 text-right" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=straight%20line&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      </div>
      <div class="cellWrapper">
        <div class="cell">
          <div class="container">
            <div class="cust_container">
              <div class="row align-items-center greyColor">
                <div class="col-lg-4">
                  <div class="singleTitle mb-4 contactLoc">
                    <div>
                      <div class="darkBlue font-weight-bold text-uppercase font_18">OUR LOCATION</div>
                      <div class="font_16">{{$contacts[0]->location_description}}</div>
                      <a class="lightBlue font_15 font-weight-bold showloc" href="javascript:;">show location <span></span></a>
                    </div>
                  </div>
                  <div class="singleTitle mb-4 contactPhone pt-2">
                    <div class="darkBlue font-weight-bold text-uppercase font_18">KEEP IN TOUCH</div>
                    <div class="font_16">{{$contacts[0]->mobile}}</div>
                  </div>
                  <div class="singleTitle mb-4 contactMail pt-2">
                    <div class="darkBlue font-weight-bold text-uppercase font_18">EMAIL</div>
                    <div class="font_16">{{$contacts[0]->email}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
    <div class="choose_ur_pack contactFooter single_choose d-flex align-items-center mb-0 py-5">
      <div class="container">
        <div class="cust_container">
          <div class="row align-items-center m-0">
            <div class="col-lg-12 align-items-end pr-0 pl-0 ml-0">
              <div class="flight_date_select whats_fds ml-3">
                <div class="d-flex align-items-center whats_text ">
                  <div class="col-lg-4 mr-0 pl-0"><div class="light_dark_blue_title mb-3 font_25"><div>Send us</div>a message</div></div>
                </div>
                <form method="POST" enctype="multipart/form-data" class="well" action="{{route('submit_contactus')}}">
                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="d-flex align-items-center mt-2">
                    <input class="mr-3 flex-fill passenger_bg" type="text" name="firstname" id="firstname" value="" placeholder="FIRST NAME" autocomplete="off">
                    <input class="mr-3 flex-fill passenger_bg" type="text" name="lastname" id="lastname" value="" placeholder="LAST NAME" autocomplete="off">
                    <input class="mr-3 flex-fill email_bg" type="text" name="email" id="email" value="" placeholder="EMAIL" autocomplete="off">
                    <input class="flex-fill phone_bg" type="text" name="phone" id="phone" value="" placeholder="PHONE NUMBER" autocomplete="off">
                  </div>
                  <div class="d-flex align-items-center mt-2">
                    <textarea class="flex-fill px-3 py-2" type="text" name="message" id="message" value="" placeholder="MESSAGE" autocomplete="off"></textarea>
                  </div>
                  <!-- <div class="captcha">
                    <div class="g-recaptcha float-left" data-sitekey="6LdT-qYUAAAAABGNQphGiSS8yw954RxkuL7RFqrx"></div>
                  </div> -->
                  <input type="submit" value="Send" class="request_callback font-weight-bold text-uppercase mt-3 float-right ml-2">

                  <button class="request_callback reset_callback yellowColor font-weight-bold text-uppercase mt-3 float-right ">Reset</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




@endsection