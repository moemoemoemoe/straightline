@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Package</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <p>
                            <input type="text" name="title" placeholder="Package Title*" class="form-control" value="{{$packages->title}}">
                        </p>
  
          <p>
            <div class="row">
              <div class="col-md-6">
                <p>
                            <b>
                                Choose Category  
                            </b>
                        </p>
          <select class="form-control" name="cat_id">
                                @foreach($cats as $cat)
                                <option value="{{$cat->id}}" {{ ($packages->cat_id == $cat->id) ? 'selected' : '' }}>{{$cat->cat_name}}</option>
                                @endforeach
                            </select>
</div>
                             <div class="col-md-6">
<p>
                            <b>
                                Choose Theme  
                            </b>
                        </p>
<select class="form-control" name="theme_id">
                                @foreach($themes as $theme)
 <option value="{{$theme->id}}" {{ ($packages->theme_id == $theme->id) ? 'selected' : '' }}>{{$theme->theme_name}}</option>                                @endforeach
                            </select> 
</div>
                      </div>
                        </p> 

                        <p>
    <div class="row">
            <div class="col-md-6">
                <b>
                                City Name
                            </b>
  <select class="form-control" name="city_id" onchange="show_hotels(this);">
                                @foreach($cities as $city)
                                 <option value="{{$city->id}}" {{ ($packages->city_id == $city->id) ? 'selected' : '' }}>{{$city->name}}</option>
                                
                                @endforeach
                            </select>
                                   <p>
                  <b><p> <span id="loading" style="color: red;font-weight: 900;display: none;">LOADING...</span></p></b>
                </p>
</div>

        <div class="col-md-6">
            <b>
                                Hotel Name
                            </b>
                            @if($packages->hotel_id == 0)
                              <select class="form-control" name="hotel_id" id="hotel_id"  >
                   <option value="0" >-- Select Hotel--</option>
                 </select>
                 @elseif($packages->hotel_id == -1)
                              <select class="form-control" name="hotel_id" id="hotel_id"  >
                   <option value="-1" >--Select Hotel--</option>
                 </select>
                 @else
                 <select class="form-control" name="hotel_id" id="hotel_id">
                                @foreach($hotels as $hotel)
                                @if($packages->hotel_id == $hotel->id)
                                 <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                @else
                                @endif
                                @endforeach
                            </select>
                            @endif
                           

   
</div>
  <p>
    <div class="col-md-6">
        <b>
                              Day
                            </b>
 <input type="number" name="day" placeholder="Day" class="form-control" value="{{$packages->day}}" min="0">
</div>
  <div class="col-md-6">
      <b>
                              Night
                            </b>
 <input type="number" name="night" placeholder="Night" class="form-control" value="{{$packages->night}}" min="0">
</div>
   

</div>

</p>


<p>
     <div class="row">
      
    <div class="col-md-6">

        
    <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" name="depart_date" value="{{$packages->depart_date}}" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
   
    

   </div>
 </div>
<div class="col-md-6">
<div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" name="revenue_date" value="{{$packages->revenu_date}}" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
   
    

   </div></div>


</div>
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
</p>
<p>
    <textarea name="description">{{$packages->description}}</textarea>
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




 <div class="row">

<div class="col-md-6">
<p>

    <b>
        Price Included *
    </b>
</p>
<p>
    <textarea name="price_included">{{$packages->price_included}}</textarea>
</p>
</div>
<div class="col-md-6">
<p>

    <b>
        Price Excluded *
    </b>
</p>
<p>
    <textarea name="execluded">{{$packages->price_execluded}}</textarea>
</p>
</div></div>
 
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
    

