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
                            <input type="text" name="title" placeholder="Package Title*" class="form-control" value="{{old('title')}}">
                        </p>
  <p>
                            <b>
                                Choose Category  
                            </b>
                        </p>
          <p>
          <select class="form-control" name="cat_id">
                                @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach
                            </select>
                        </p> 
<p>
    <textarea name="description"></textarea>
</p>

<p>
    <div class="row">
        <div class="col-md-3">
 <input type="text" name="hotel_id" placeholder="Hotel Name*" class="form-control" value="{{old('hotel_id')}}">
</div>
    <div class="col-md-3">
 <input type="text" name="day_night" placeholder="Day/Night*" class="form-control" value="{{old('day_night')}}">
</div>

    <div class="col-md-3">

<select class="form-control" name="theme_id">
                                @foreach($themes as $theme)
                                <option value="{{$theme->id}}">{{$theme->theme_name}}</option>
                                @endforeach
                            </select> 
</div>

  <div class="col-md-3">

<select class="form-control" name="cont_id">
                                @foreach($conts as $cont)
                                <option value="{{$cont->id}}">{{$cont->cont_name}}</option>
                                @endforeach
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
    <textarea name="detailed"></textarea>
</p>
 </p>


<p>
     <div class="row">
        <div class="col-md-4">
 <input type="text" name="map_loc" placeholder="Map Location " class="form-control" value="{{old('map_loc')}}">
</div>
    <div class="col-md-4">
 <input type="text" name="depart_date" placeholder="Depart date" class="form-control" value="{{old('depart_date')}}">
</div>
<div class="col-md-4">
 <input type="text" name="revenu_date" placeholder="Revenue date" class="form-control" value="{{old('revenu_date')}}">
</div>


</div>
</p>



<p>
     <input type="text" name="price" placeholder="Package Price" class="form-control" value="{{old('price')}}">

</p>
 <p>
                            <b>
                                Price Included
                            </b>
                        </p>
<p>
    <textarea name="price_included"></textarea>
</p>

 <p>
     <div class="row">
        <div class="col-md-6">
            Choose Image/s
 <input type="file" name="main_image[]"  class="form-control" />
        </div>
        <div class="col-md-6">
                 Choose brochure
             <input type="file" name="brochur_url"  class="form-control" />
        </div>
    </div>
 </p>

                    </form>

                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    

