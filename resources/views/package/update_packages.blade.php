@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Package</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <p>
                            <input type="text" name="title" placeholder="Package Title*" class="form-control" value="{{$packages->title}}">
                        </p>
  <p>
                            <b>
                                Choose Category  
                            </b>
                        </p>
          <p>
          <select class="form-control" name="cat_id">
                                @foreach($cats as $cat)
                                <option value="{{$cat->id}}" {{ ($packages->cat_id == $cat->id) ? 'selected' : '' }}>{{$cat->cat_name}}</option>
                                @endforeach
                            </select>
                        </p> 
<p>
    <textarea name="description">{{$packages->description}}</textarea>
</p>

<p>
    <div class="row">
        <div class="col-md-3">
 <!-- <input type="text" name="hotel_id" placeholder="Hotel Name*" class="form-control" value="{{old('hotel_id')}}"> -->
  <select class="form-control" name="hotel_id">
                                @foreach($hotels as $hotel)
                                 <option value="{{$hotel->id}}" {{ ($packages->hotel_id == $hotel->id) ? 'selected' : '' }}>{{$hotel->name}}---> {{$hotel->city->name}}</option>
                                
                                @endforeach
                            </select>
</div>
    <div class="col-md-2">
 <input type="number" name="day" placeholder="Day" class="form-control" value="{{$packages->day}}">
</div>
  <div class="col-md-2">
 <input type="number" name="night" placeholder="Night" class="form-control" value="{{$packages->night}}">
</div>
    <div class="col-md-2">

<select class="form-control" name="theme_id">
                                @foreach($themes as $theme)
 <option value="{{$theme->id}}" {{ ($packages->theme_id == $theme->id) ? 'selected' : '' }}>{{$theme->theme_name}}</option>                                @endforeach
                            </select> 
</div>

  <div class="col-md-3">

<select class="form-control" name="cont_id">
                                @foreach($conts as $cont)
 <option value="{{$cont->id}}" {{ ($packages->cont_id == $cont->id) ? 'selected' : '' }}>{{$cont->cont_name}}</option>                                @endforeach
                            </select> 
</div>
</div>
</p>
 <p>
                            <b>
                                Detailed Itinerary 
                            </b>
                        </p>
<p>
    <textarea name="detailed">{{$packages->detailed}}</textarea>
</p>
 </p>


<p>
     <div class="row">
        <div class="col-md-4">
 <input type="text" name="map_loc" placeholder="Map Location " class="form-control" value="{{$packages->map_loc}}">
</div>
    <div class="col-md-4">
<!--   <input type="text" name="depart_date" placeholder="Depart date" class="form-control" value="{{old('depart_date')}}">
 -->

           <!--  <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div> -->
        
    <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="depart_date" value="{{$packages->depart_date}}" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
   
    

   </div>
 </div>
<div class="col-md-4">
<div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="revenue_date" value="{{$packages->revenu_date}}" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
   
    

   </div></div>


</div>
</p>



<p>
     <div class="row">
        <div class="col-md-6">
     <input type="text" name="price" placeholder="Package Price" class="form-control" value="{{$packages->price}}">
 </div>
 <div class="col-md-6">
     <select class="form-control" name="is_featured">
                               
                           <option value="1">Not Featured</option>
                           <option value="0"> Featured Package</option>

                              
                            </select>
 </div>
</div>
</p>
 <p>
                            <b>
                                Price Included
                            </b>
                        </p>
<p>
    <textarea name="price_included">{{$packages->price_included}}</textarea>
</p>
<p>


 <p>
 <b>Current photos</b>
                        </p>
                        <p>
                        <div class="row">
                            @foreach($gallery as $image)
                            <div class="col-md-2" style="margin:10px"> 
                                <img src="{{asset('uploads/packages/'.$image->img_url)}}" class="img img-thumbnail " style="height:150px" />
                            
                                    <a href="{!! route('delete_gallery', ['id'=>$image->id]) !!}" class="btn btn-danger" width="20px" >Delete</a>    
                           
                  
                  </div>
                         
                            @endforeach
                        </div>
  
                   
</p>
 <p>
     <div class="row">
        <div class="col-md-6">
            Choose Image/s
 <input type="file" name="attachment[]"  class="form-control" multiple />
        </div>
        <div class="col-md-6">
                 Choose brochure
             <input type="file" name="brochur_url"  class="form-control" />
        </div>
    </div>
 </p>
  <p>
                            <input type="submit" value="Save" class="btn btn-primary form-control">
                        </p>

                    </form>

                 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
    

