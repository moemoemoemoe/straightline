@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Hotel</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="name" placeholder="Hotel Name*" class="form-control" value="{{old('name')}}">
                        </p>
                        <p>
                            <b>
                                Choose City  
                            </b>
                        </p>
                        <p>
                            <select class="form-control" name="city_id">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}} ---- >>{{$city->country->name}} </option>
                            @endforeach
                        </select>
                    </p> 


                    <p>
                        <div class="row">
                            <div class="col-md-6">
                             <input type="text" name="coor_x" placeholder="Coordinate X*" class="form-control" value="{{old('coor_x')}}">
                         </div>
                         <div class="col-md-6">
                             <input type="text" name="coor_y" placeholder="Coordinate Y*" class="form-control" value="{{old('coor_y')}}">
                         </div>

                     </div>
                 </p>

                 <p>
                     <div class="row">
                        <div class="col-md-12">
                            Choose Image/s
                            <input type="file" name="photo"  class="form-control" />
                        </div>

                    </div>
                </p>
                <p>
                            <input type="submit" value="Update" class="btn btn-primary form-control">
                        </p>

            </form>


        </div>
    </div>
</div>
</div>
</div>
<br/>
<div class="container">

<div class="row">
          

                                                                               
@foreach($hotels as $hotel)
    <div class="col-md-3">
        <div class="card">
            <div class="card-header" style="background-color:#fff ">
                <b><span style="color: #4CAF50;font-weight: 900">{{$hotel->name}}</span></b>
            </div>
             <div class="panel-heading text-center">
                <b><span style="color: black">{{$hotel->city->name}}</span></b>
            </div>
            <div class="panel-body" style="height:80px; background: url('{{asset('uploads/hotels/'.$hotel->img_url)}}'); background-size: cover; background-position: center center;background-repeat: no-repeat;">
                
            </div>
          
            <div class="panel-footer text-center">
               <a href="{!! route('hotel_update', ['id'=>$hotel->id]) !!}" class="btn btn-primary form-control">Edit ...</a>
            </div>
           
        </div>
    </div>

    @endforeach

               

        </div>

    </div>
@endsection


