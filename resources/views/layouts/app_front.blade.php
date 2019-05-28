<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Straight Line</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
<!--   <link href="https://fonts.googleapis.com/css?family=Roboto:900&display=swap" rel="stylesheet">
 -->
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('front/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('front/css/flexslider.css')}}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('front/css/bootstrap-datepicker.css')}}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{asset('front/fonts/flaticon/font/flaticon.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('front/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('front/js/modernizr-2.6.2.min.js')}}"></script>

	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body >

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<p class="site"><img src="{{asset('front/images/hotline.png')}}"/> <b>Hotline:</b> +961 9 200 400</p>
						</div>
						<div class="col-xs-8 text-right">
							<p class="num">
								<ul class="colorlib-social">
									<li class="active"><a href="#">Home</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Contact</a></li>
									<li><a >|</a></li> 
									<li style="text-align: right"><a ><img src="{{asset('front/images/watsh.png')}}"></a></li>
									<li><a><span style="font-size:2px!!important">08:30PM - 07:00PM</span></a></li>
								</ul>
							</p>
							
						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.html"><img src="{{asset('front/images/logo.png')}}"/></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class=""><a href=""><img src="{{asset('front/images/book_your.png')}}" /></a><span style="color:#c6e6f6">|</span></li>
								<li><a href=""><img src="{{asset('front/images/packageoffer.png')}}" /></a><span style="color:#c6e6f6">|</span></li>
								<li><a href=""><img src="{{asset('front/images/trevelinsurance.png')}}" /></a></li>


							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>





    @yield('content_front')



<footer id="colorlib-footer" role="contentinfo" style="background-color: #ebebeb">
	<div class="container" >
		<div class="row row-pb-md" >
			
<div class="col-md-3 colorlib-widget1">
				<h4></h4>
				<ul class="colorlib-footer-links">
					<li><img src="{{asset('front/images/logo.png')}}"/></li>
					<!-- <li><a href="tel://1234567920">+ 1235 2355 98</a></li>
					<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
					<li><a href="http://luxehotel.com">luxehotel.com</a></li> -->
				</ul>
			</div>

			<div class="col-md-3 colorlib-widget">
				<h4 style="color: #0d4fa0">Join Our Mailing List</h4>
				<p>
					<ul class="colorlib-footer-links"  >
						<li><a href="#" style="color: #999">Accomodation</a></li>
						<li><a href="#" style="color: #999">Dining &amp; Bar</a></li>
						<li><a href="#" style="color: #999">Restaurants</a></li>
						<li><a href="#" style="color: #999">Beach &amp; Resorts</a></li>
					</ul>
				</p>
			</div>
			<div class="col-md-3">
				<h4 style="color: #189adb">Get In Touch</h4>
				<ul class="colorlib-footer-links">
					<li><a href="#" style="color: #999">The Ultimate Packing List For Female Travelers</a></li>
					<li><a href="#" style="color: #999">How These 5 People Found The Path to Their Dream Trip</a></li>
					<li><a href="#" style="color: #999">A Definitive Guide to the Best Dining and Drinking Venues in the City</a></li>
				</ul>
			</div>
<div class="col-md-3 colorlib-widget">
				<h4 style="color: #0d4fa0">Stay Connected</h4>
				<p style="color: #999">Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				<p>
					<ul class="colorlib-social-icons">
						<li><a href="#" ><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-linkedin"></i></a></li>
						<li><a href="#"><i class="icon-dribbble"></i></a></li>
					</ul>
				</p>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<p>
					<small class="block" style="color: #0d4fa0">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered By  <a href="#" target="_blank">Future Destination</a>
					</small> 
						
					</p>
				</div>
			</div>
		</div>
	</footer>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<!-- jQuery -->


<script src="{{asset('front/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('front/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('front/js/jquery.waypoints.min.js')}}"></script>
<!-- Flexslider -->
<script src="{{asset('front/js/jquery.flexslider-min.js')}}"></script>
<!-- Owl carousel -->
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front/js/magnific-popup-options.js')}}"></script>
<!-- Date Picker -->
<script src="{{asset('front/js/bootstrap-datepicker.js')}}"></script>
<!-- Main -->
<script src="{{asset('front/js/main.js')}}"></script>



<script type="text/javascript">
var type = 1;
	$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    //window.alert($box.val()) 
     if($box.attr('id') == "a")
    {

    	document.getElementById("retu").disabled = false;
    	type = 1;
    	}
    if($box.attr('id') == "b")
    {

    	document.getElementById("retu").disabled = true;
    	type = 2;
    }
   if($box.attr('id') == "c")
    {

    document.getElementById("retu").disabled = false;
    	type = 3;
    }
 if($box.attr('id') == "d")
    {

    document.getElementById("retu").disabled = false;
    	type = 4;
    }
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
//window.alert(type);
});



   
    function search_flight(){
       var the_type = type ;
       var from = $('#from').val();
       var to = $('#to').val();
       var dep_date = $('#dep_date').val();
       var rev_date = $('#retu').val();
       var adu = $('#adult').val();
       var chil = $('#child').val();
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
</script>
</body>
</html>
