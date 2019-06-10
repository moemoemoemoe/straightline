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
            <center><button class="btn d-flex align-items-center justify-content-center serviceBtn text-uppercase font-weight-bold text-center" style="font-size: 1em">JOIN OUR LOYALTY PROGRAM</button></center>
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



@endsection