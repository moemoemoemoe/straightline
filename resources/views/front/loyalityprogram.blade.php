@extends('layouts.app_front')
@section('content_front')




    <div class="package_d_cont">
      <div class="container">
        <div class="cust_container">
          <div class="cellWrapper">
            <div class="cell">
              <div class="pck_d_title font-weight-bold text-uppercase">Loyalty Program</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="singleTitleCont greyColor pt-5">
      <div class="container mb-0">
        <div class="cust_container">
          <div class="loyaltyFirstSection pb-5">
            <p>Here at StraightLine, we have created our loyalty program with exciting and exclusive rewards to say ‘thank you’ to our amazing customers.
            Earn points for every $1 excluding airport taxes you spend in-store at StraightLine premises to unlock exciting rewards. </p>
            <div class="darkBlue font_25 font-weight-bold mb-3 mt-5 text-uppercase planeBg">LOYALTY FORMULA</div>
            <div class="row my-5 formula_list">
@foreach($loyalities as $loy)
      @if($loy->name == 'BRONZE')
              <div class="col-lg-4 ">
                <div class="bronze">
                  <div class="font_20 text-uppercase font-weight-bold">{{$loy->name}}</div>
                  <div>{{$loy->from_value}} to {{$loy->to_value}} USD Account Size</div>
                  <div>1 USD = {{$loy->point_usd}} point</div>
                </div>
              </div>
              @elseif($loy->name == 'SILVER')
<div class="col-lg-4">
                <div class="silver">
                  <div class="font_20 text-uppercase font-weight-bold">{{$loy->name}}</div>
                  <div>{{$loy->from_value}} to {{$loy->to_value}} USD Account Size</div>
                  <div>1 USD = {{$loy->point_usd}} point</div>
                </div>
              </div>
              @elseif($loy->name == 'GOLD')
              <div class="col-lg-4">
                <div class="gold">
                  <div class="font_20 text-uppercase font-weight-bold">GOLD</div>
                  <div>{{$loy->from_value}} USD < Account Size</div>
                  <div>1 USD = {{$loy->point_usd}} point</div>
                </div>
              </div>
      @endif
@endforeach

             
            </div>
              <span id="btn_show">
            <div class="row">
                <div class="col-md-2" >
                </div>
              <div class="col-md-4" >
          
              <br/><br/><button  class="btn d-flex align-items-center justify-content-center serviceBtn text-uppercase font-weight-bold text-center font_18" style="width: 70% ;height: 30%" onclick="show_form()" >JOIN OUR<br/><br/>LOYALTY PROGRAM</button></span>
          </div>
          <div class="col-md-6">
            <img src="{{asset('images/card.png')}}" style="width:100%; margin-top: -110px;margin-bottom: -100px">
          </div>
          </div>
          </div>

        </div>
      </div>
    </div>

<div class="choose_ur_pack contactFooter single_choose d-flex align-items-center mb-0 py-5"  id="form_send" style="display: none!important;">
      <div class="container" >
        <div class="cust_container">
          <div class="row align-items-center m-0">
            <div class="col-lg-12 align-items-end pr-0 pl-0 ml-0">
              <div class="flight_date_select whats_fds ml-3">
                <div class="d-flex align-items-center whats_text ">
                  <div class="col-lg-4 mr-0 pl-0"><div class="light_dark_blue_title mb-3 font_25"><div> JOIN OUR </div>LOYALTY PROGRAM</div></div>
                
                </div>
                <form method="POST" enctype="multipart/form-data" class="well" action="{{route('submit_loyality')}}">
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
                
               
 <input type="submit" value="JOIN OUR LOYALTY PROGRAM" class="request_callback font-weight-bold text-uppercase mt-3 float-right ml-2" style="width: 20em">

                
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="container my-5">
      <div class="cust_container">
        <div class="row">
          <div class="col-lg-6">
            <div class="darkBlue font_25 font-weight-bold mb-4 text-uppercase planeBg">FAQ</div>
            <div class="greyColor aboutList aboutListValues loyalty">
               @foreach($faqs as $faq)
               
              <div class="">
                <div class="lightBlue font-weight-bold">{{$faq->question}}</div>
                <p>{{$faq->answer}}</p>
              </div>
             @endforeach
             
            </div>
          </div>
          <div class="col-lg-6">
            <div class="darkBlue font_25 font-weight-bold mb-4 text-uppercase planeBg">TERMS & CONDITIONS</div>
            <div class=" greyColor serviceBottomList loyaltyTerms">
              <ul>
                {!! $terms[0]->Description !!}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
 <script type="text/javascript">
    function show_form(){
      var link = document.getElementById('btn_show');

      $('#form_send').show();
   link.style.display = 'none';

    }


 </script>
@endsection