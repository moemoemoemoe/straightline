@extends('layouts.app_front')

@section('content_front')
<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url({{asset('front/images/img_bg_4.jpg')}});">


					</li>



				</ul>
			</div>
		</aside>



<div id="colorlib-reservation"  >
			<div class="container">
				<div class="row" >
					<div class="col-md-12 search-wrap" style="background-color: #299fdb">
						<!-- <img src="images/web_search.jpg"/> -->








						<ul class="nav nav-tabs" id="myTab" role="tablist" >
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">FLIGHT</a>
  </li>
  <li class="nav-item" >
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">INSURANCE</a>
  </li>
 <div class="col-md-12">
			
<hr style="border: 1px solid #ffca50;" >
</div>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="col-md-2"><input type="checkbox" name="fooby[1][]" value="1" checked="checked" id="a"> <span style="color: #fff"> ROUND TRIP</span></div>
<div class="col-md-2"><input type="checkbox" name="fooby[1][]" value="2" id="b"> <span style="color: #fff"> ONE WAY</span></div>

<div class="col-md-2"><input type="checkbox" name="fooby[1][]" value="3" id = "c"> <span style="color: #fff"> MULTI-LEG</span></div>

<div class="col-md-6" style="visibility: hidden;"><input type="checkbox" name="" value="" > <span style="color: #fff"> MY DATES ARE FIXABLE (-/+ 3DAYS)</span></div>
<br/><br/>

<div class="col-md-3">
				<div class="form-group" >

					
<input type="text" name="from" placeholder="From" class="form-control from" style="background-color: #fff;border-radius: 15px;height: 50px" autocomplete="off" id="from" >		
</div>	
</div>

<div class="col-md-3">
				<div class="form-group" >
<input type="text" name="to" placeholder="To" class="form-control" style="background-color: #fff;border-radius: 15px;height: 50px" autocomplete="off" id="to">		
</div>	
</div>
<div class="col-md-3">
	<!-- 			<div class="form-group">
<input type="date" name="dep" placeholder="Depart" class="form-control" id="dep_date" style="background-color: #fff;border-radius: 15px;height: 50px">		
</div>	 -->
<div class="form-group">
            <div class="input-group date" id="datetimepicker">
                <input type="text" name="dep" placeholder="Depart" class="form-control" id="dep_date" style="background-color: #fff;border-radius: 15px;height: 50px" autocomplete="off" />	 <span  class="input-group-addon" style="visibility: hidden;" >
                         <span class="glyphicon-calendar glyphicon"></span>
                       </span>
            </div>
        </div>

</div>
<div class="col-md-3">
	<!-- 			<div class="form-group" id="re">
<input type="date" id="retu" name="ret" placeholder="Return" class="form-control" style="background-color: #fff;border-radius: 15px;height: 50px">		
</div>	 -->
<div class="form-group">
            <div class="input-group date" id="datetimepicker">
                <input type="text" id="retu" name="ret" placeholder="Return" class="form-control" style="background-color: #fff;border-radius: 15px;height: 50px" autocomplete="off" />	 <span class="input-group-addon" style="visibility: hidden;">
                         <span class="glyphicon-calendar glyphicon"></span>
                       </span>
            </div>
        </div>
</div>

<div class="col-md-3">
			
				<div class="form-check">
 <!--  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> -->
  <!-- <label class="form-check-label" for="defaultCheck1"
  style="color: #fff" >
   MY DATES ARE FIXABLE (-/+ 3DAYS)

  </label> -->
  <input type="checkbox" name="fooby[1][]" value="4" id="d"> <span style="color: #fff"> MY DATES ARE FIXABLE (-/+ 3DAYS)</span>
</div>
</div>

<div class="col-md-3">
				<div class="form-group" style="visibility: hidden;" >
<input type="text" name="" placeholder="Full Name" class="form-control" style="background-color: #fff;border-radius: 15px;height: 50px" autocomplete="off">		
</div>	
</div>

<div class="col-md-3">
				<div class="form-group">
<input type="number" min="0" name="adult" placeholder="Adult" id="adult" class="form-control" style="background-color: #fff;border-radius: 15px;height: 50px" autocomplete="off" value="0">		
</div>	
</div>
<div class="col-md-3">
				<div class="form-group">
<input type="number" min="0" name="child" placeholder="Child" class="form-control" style="background-color: #fff;border-radius: 15px;height: 50px" autocomplete="off" value="0" id="child"> 		
</div>	
</div>
<div class="col-md-10">
			
<hr style="border: 1px solid #ffca50;" >
</div>
<div class="col-md-2">
	<button  type="button" onclick="search_flight()"  name="submit" class="btn form-control" style="background-color: #ffca50;color: #305a9b;border-radius: 15px;font-weight: 999">	SEARCH	</button>

</div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
</div>











					</div>
				</div>
			</div>
		</div>
	</br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
<!-- <img src="images/popular.png" />
-->		
<div class="col-md-3"><b><span class="firstcolor">BEST TRAVEL </span></b><b><span style="color:#169cd9;font-size :25px;font-family:bold">PACKAGES</span></b></div>
<div class="col-md-9"> <hr style="border: 1px solid #169cd9;" /> </div>
</div>
</div>
</div>
<br/>
<div class="container">
	<div class="row" >



		
		

	<div class="col-md-6" >

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :200px;background: url('{{asset('front/images/img_bg_3.jpg')}}; background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>


						<th style= border-radius: 15px><h5 class="card-title" style="color: #189adb;font-weight:999">Card title</h5>
							<p class="card-text" style="color: #189adb;font-size: 11px">
								<img src="{{asset('front/images/location.png')}}" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							<p class="card-text"><small class="text-muted"><b>4 </b>nights/ <b>5</b> days</small></p>
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;background-color: #1159a7 ;border-radius: 5px;" >

									<span style="color: #fff;">Starting</span> 
									<p><span style="color: #ffca50">900$</span><a href="" class="btn btn-primary" style="background-color: #189adb;border-radius: 15px ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 

	<div class="col-md-6" >

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :200px;background: url('{{asset('front/images/img_bg_3.jpg')}}'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>


						<th style= border-radius: 15px><h5 class="card-title" style="color: #189adb;font-weight:999">Card title</h5>
							<p class="card-text" style="color: #189adb;font-size: 11px">
								<img src="{{asset('front/images/location.png')}}" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							<p class="card-text"><small class="text-muted"><b>4 </b>nights/ <b>5</b> days</small></p>
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;background-color: #1159a7 ;border-radius: 5px;" >

									<span style="color: #fff;">Starting</span> 
									<p><span style="color: #ffca50">900$</span><a href="" class="btn btn-primary" style="background-color: #189adb;border-radius: 15px ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 

	<div class="col-md-6" >

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :200px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>


						<th style= border-radius: 15px><h5 class="card-title" style="color: #189adb;font-weight:999">Card title</h5>
							<p class="card-text" style="color: #189adb;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							<p class="card-text"><small class="text-muted"><b>4 </b>nights/ <b>5</b> days</small></p>
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;background-color: #1159a7 ;border-radius: 5px;" >

									<span style="color: #fff;">Starting</span> 
									<p><span style="color: #ffca50">900$</span><a href="" class="btn btn-primary" style="background-color: #189adb;border-radius: 15px ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 
<div class="col-md-6" >

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :200px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>


						<th style= border-radius: 15px><h5 class="card-title" style="color: #189adb;font-weight:999">Card title</h5>
							<p class="card-text" style="color: #189adb;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							<p class="card-text"><small class="text-muted"><b>4 </b>nights/ <b>5</b> days</small></p>
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;background-color: #1159a7 ;border-radius: 5px;" >

									<span style="color: #fff;">Starting</span> 
									<p><span style="color: #ffca50">900$</span><a href="" class="btn btn-primary" style="background-color: #189adb;border-radius: 15px ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 
		<div class="col-md-6" >

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :200px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>


						<th style= border-radius: 15px><h5 class="card-title" style="color: #189adb;font-weight:999">Card title</h5>
							<p class="card-text" style="color: #189adb;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							<p class="card-text"><small class="text-muted"><b>4 </b>nights/ <b>5</b> days</small></p>
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;background-color: #1159a7 ;border-radius: 5px;" >

									<span style="color: #fff;">Starting</span> 
									<p><span style="color: #ffca50">900$</span><a href="" class="btn btn-primary" style="background-color: #189adb;border-radius: 15px ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 

<div class="col-md-6" >

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :200px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>


						<th style= border-radius: 15px><h5 class="card-title" style="color: #189adb;font-weight:999">Card title</h5>
							<p class="card-text" style="color: #189adb;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							<p class="card-text"><small class="text-muted"><b>4 </b>nights/ <b>5</b> days</small></p>
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;background-color: #1159a7 ;border-radius: 5px;" >

									<span style="color: #fff;">Starting</span> 
									<p><span style="color: #ffca50">900$</span><a href="" class="btn btn-primary" style="background-color: #189adb;border-radius: 15px ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 
		


</div>


</div>

<br/><br/>




<div id="colorlib-rooms" class="colorlib-light-grey">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
				<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
				<h2><b><span class="firstcolor" style="font-size: 25px">POPULAR </span></b><b><span style="color:#169cd9;font-size :25px;font-family:bold">DESTINATIONS</span></b></h2>
				<p>Whether you enjoy the outdoors, art museums, cultural experiences, shopping, cuisine, nature, architecture or just wandering in a new place, any of these top destinations can inspire you to take the trip of a lifetime.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 animate-box">
				<div class="owl-carousel owl-carousel2">
					<div class="item">
						<a href="images/room-1.jpg" class="room image-popup-link" style="background-image: url(images/room-1.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
							<h3><a href="rooms-suites.html">ISTANBUL</a></h3>
							<hr style="border: 1px solid #169cd9;" />
							<p class="price">
								
								<span class="price-room">europe</span>
								
							</p>
						
							<p><a class="btn btn-primary btn-book"><img src="images/avion.png"></a></p>
						</div>
					</div>
					<div class="item">
						<a href="images/room-2.jpg" class="room image-popup-link" style="background-image: url(images/room-2.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
							<h3><a href="rooms-suites.html">ISTANBUL</a></h3>
							<hr style="border: 1px solid #169cd9;" />
							<p class="price">
								
								<span class="price-room">europe</span>
								
							</p>
						
							<p><a class="btn btn-primary btn-book"><img src="images/avion.png"></a></p>
						</div>
					</div>
					<div class="item">
						<a href="images/room-3.jpg" class="room image-popup-link" style="background-image: url(images/room-3.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
							<h3><a href="rooms-suites.html">ISTANBUL</a></h3>
							<hr style="border: 1px solid #169cd9;" />
							<p class="price">
								
								<span class="price-room">europe</span>
								
							</p>
						
							<p><a class="btn btn-primary btn-book"><img src="images/avion.png"></a></p>
						</div>
					</div>
					<div class="item">
						<a href="images/room-4.jpg" class="room image-popup-link" style="background-image: url(images/room-4.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
							<h3><a href="rooms-suites.html">ISTANBUL</a></h3>
							<hr style="border: 1px solid #169cd9;" />
							<p class="price">
								
								<span class="price-room">europe</span>
								
							</p>
						
							<p><a class="btn btn-primary btn-book"><img src="images/avion.png"></a></p>
						</div>
					</div>
					<div class="item">
						<a href="images/room-5.jpg" class="room image-popup-link" style="background-image: url(images/room-5.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
							<h3><a href="rooms-suites.html">ISTANBUL</a></h3>
							<hr style="border: 1px solid #169cd9;" />
							<p class="price">
								
								<span class="price-room">europe</span>
								
							</p>
						
							<p><a class="btn btn-primary btn-book"><img src="images/avion.png"></a></p>
						</div>
					</div>
					<div class="item">
						<a href="images/room-6.jpg" class="room image-popup-link" style="background-image: url(images/room-6.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
							<h3><a href="rooms-suites.html">ISTANBUL</a></h3>
							<hr style="border: 1px solid #169cd9;" />
							<p class="price">
								
								<span class="price-room">europe</span>
								
							</p>
						
							<p><a class="btn btn-primary btn-book"><img src="images/avion.png"></a></p>
						</div>
					</div>
			</div>
			<!-- <div class="col-md-12 text-center animate-box">
				<a href="#">View all rooms <i class="icon-arrow-right3"></i></a>
			</div> -->
		</div>
	</div>
</div>

<!--  -->
<div class="container">
	<div class="row" style="background-image: url(images/background_book_now.png); height: 220px">
		<div class="col-md-12" style="text-align: center;">
			<div class="col-md-3">
<span style="color: #ffca50;font-weight: 999;font-size: 18px">Choose</span>
<p>
	<span style="color: #fff;font-weight: 999;font-size: 18px">YOUR PACKAGE</span>

	</p>
			</div>
			<div class="col-md-3">
<span style="color: #ffca50;font-weight: normal;font-size: 12px">WHATS IN YOUR MIND?</span>

			</div>
			<div class="col-md-3">
<span style="color: #ffca50;font-weight: normal;font-size: 12px">WHERE DO YOU WANT TO GO?</span>

			</div>
			<div class="col-md-3">
<span style="color: #ffca50;font-weight: normal;font-size:12px">WHENE YOU'RE PLANING TO GO?</span>

			</div>
			
			<div class="col-md-3">
				<div class="form-group" style="padding-right: 2em;padding-left: 2em">
  <select class="form-control" name="activity" style="background-color: #fff;border-radius: 15px;height: 10%">
  	<option>All Activity</option>
  	  	<option>Water Activity</option>

  </select>
</div>
			</div>
			<div class="col-md-3">
<div class="form-group" style="padding-right: 2em;padding-left: 2em">
  <select class="form-control" name="activity" style="background-color: #fff;border-radius: 15px;height: 10%">
  	<option>All Over The World</option>
  	  	<option>Water Activity</option>

  </select>
</div>
			</div>
			<div class="col-md-3">
<div class="form-group" style="padding-right: 2em;padding-left: 2em">
  <select class="form-control" name="activity" style="background-color: #fff;border-radius: 15px;height: 10%">
  	<option>All Seasons</option>
  	  	<option>Water Activity</option>

  </select>
</div>
			</div>
			<div class="col-md-3">
				<div class="form-group" style="padding-right: 2em;padding-left: 2em">
                            <input type="submit" value="REQUEST A CALLBACK" class="btn btn-primary" style="border-radius: 15px;background-color: #ffca50;color:#0d4fa0">
                        </div>

			</div>
			<div class="col-md-3">
				<div class="form-group" style="padding-right: 2em;padding-left: 2em">
<input type="text" name="" placeholder="Full Name" class="form-control" style="background-color: #fff;border-radius: 15px;height: 10%">		
</div>	
</div>
			<div class="col-md-3">
<div class="form-group" style="padding-right: 2em;padding-left: 2em">
<input type="text" name="" placeholder="Mobile Number" class="form-control" style="background-color: #fff;border-radius: 15px;height: 10%">		
</div>	
			</div>
			<div class="col-md-3">
<div class="form-group" style="padding-right: 2em;padding-left: 2em">
<input type="text" name="" placeholder="Email Adress" class="form-control" style="background-color: #fff;border-radius: 15px;height: 10%">		
</div>	
			</div>
		</div>
	</div>
</div>
<br/>
<!--  -->
<div class="container">
		<div class="row">
			<div class="col-md-12">
<!-- <img src="images/popular.png" />
-->		
<div class="col-md-3"><b><span class="firstcolor">FEATURED </span></b><b><span style="color:#169cd9;font-size :25px;font-family:bold">PACKAGES</span></b></div>
<div class="col-md-9"> <hr style="border: 1px solid #169cd9;" /> </div>
</div>
</div>
</div>
<br/>
<div class="container">
	<div class="row" >



		
		

	<div class="col-md-4" style="background-color: #f5f5f5 ">

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :220px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>
</tr><tr>

						<th style= "border-radius: 15px"><h5 class="card-title" style="color: #656565;font-weight:999">ISTANBUL IN EASTER ORTHODOX 2019</h5>
							<p class="card-text" style="color: #656565;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;border-radius: 5px;">

									<span style="color: #0f9ce3">900$</span>
									<p class="card-text"><small class="text-muted" style="color: #5a7bae;font-size: 12px"><b>4 </b>nights/ <b>5</b> days</small><a href="" class="btn " style="color:#fff;background-color: #0d50a1;border-radius: 15px  ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 

	
	<div class="col-md-4" style="background-color: #f5f5f5 ">

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :220px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>
</tr><tr>

						<th style= "border-radius: 15px"><h5 class="card-title" style="color: #656565;font-weight:999">ISTANBUL IN EASTER ORTHODOX 2019</h5>
							<p class="card-text" style="color: #656565;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;border-radius: 5px;">

									<span style="color: #0f9ce3">900$</span>
									<p class="card-text"><small class="text-muted" style="color: #5a7bae;font-size: 12px"><b>4 </b>nights/ <b>5</b> days</small><a href="" class="btn " style="color:#fff;background-color: #0d50a1;border-radius: 15px  ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 


	
	<div class="col-md-4" style="background-color: #f5f5f5 ">

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :220px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>
</tr><tr>

						<th style= "border-radius: 15px"><h5 class="card-title" style="color: #656565;font-weight:999">ISTANBUL IN EASTER ORTHODOX 2019</h5>
							<p class="card-text" style="color: #656565;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;border-radius: 5px;">

									<span style="color: #0f9ce3">900$</span>
									<p class="card-text"><small class="text-muted" style="color: #5a7bae;font-size: 12px"><b>4 </b>nights/ <b>5</b> days</small><a href="" class="btn " style="color:#fff;background-color: #0d50a1;border-radius: 15px  ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 

	
	
	<div class="col-md-4" style="background-color: #f5f5f5 ">

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :220px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>
</tr><tr>

						<th style= "border-radius: 15px"><h5 class="card-title" style="color: #656565;font-weight:999">ISTANBUL IN EASTER ORTHODOX 2019</h5>
							<p class="card-text" style="color: #656565;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;border-radius: 5px;">

									<span style="color: #0f9ce3">900$</span>
									<p class="card-text"><small class="text-muted" style="color: #5a7bae;font-size: 12px"><b>4 </b>nights/ <b>5</b> days</small><a href="" class="btn " style="color:#fff;background-color: #0d50a1;border-radius: 15px  ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 

		
	
	<div class="col-md-4" style="background-color: #f5f5f5 ">

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :220px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>
</tr><tr>

						<th style= "border-radius: 15px"><h5 class="card-title" style="color: #656565;font-weight:999">ISTANBUL IN EASTER ORTHODOX 2019</h5>
							<p class="card-text" style="color: #656565;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;border-radius: 5px;">

									<span style="color: #0f9ce3">900$</span>
									<p class="card-text"><small class="text-muted" style="color: #5a7bae;font-size: 12px"><b>4 </b>nights/ <b>5</b> days</small><a href="" class="btn " style="color:#fff;background-color: #0d50a1;border-radius: 15px  ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 

	
	
	<div class="col-md-4" style="background-color: #f5f5f5 ">

			<table class="table table-striped" >

				<tbody>
					<tr >

						<td  style="width:50%;height :220px;background: url('images/img_bg_3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;border-radius: 15px"></td>
</tr><tr>

						<th style= "border-radius: 15px"><h5 class="card-title" style="color: #656565;font-weight:999">ISTANBUL IN EASTER ORTHODOX 2019</h5>
							<p class="card-text" style="color: #656565;font-size: 11px">
								<img src="images/location.png" / > EUROPE
							</p> 

							<hr style="border-top: dotted 1px #ccc;" />
							
							<p>
								<div class="col-md-12" style=" padding-left: 1em;padding-top:0.2em;border-radius: 5px;">

									<span style="color: #0f9ce3">900$</span>
									<p class="card-text"><small class="text-muted" style="color: #5a7bae;font-size: 12px"><b>4 </b>nights/ <b>5</b> days</small><a href="" class="btn " style="color:#fff;background-color: #0d50a1;border-radius: 15px  ;margin-left: 6em;" ><b>DETAILS</b></a> 
									</p>
								</div>
							</p>


						</th>

					</tr>

				</tbody>

			</table>

		</div> 


</div>


</div>

<br/><br/>



@endsection