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
                            <input type="text" name="name" placeholder="Hotel Name*" class="form-control" value="{{$hotels->name}}">
                        </p>
                        <p>
                            <b>
                                Choose City  
                            </b>
                        </p>
     </p>
                       <p>
                            <select class="form-control" name="city_id">
                                @foreach($cities as $city)
                                <option value="{{$city->id}}" {{ ($hotels->city_id == $city->id) ? 'selected' : '' }}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </p> 

                    <p>
                        <div class="row">
                            <div class="col-md-6">
                             <input type="text" name="coor_x" placeholder="Coordinate X*" class="form-control" value="{{$hotels->coor_x}}">
                         </div>
                         <div class="col-md-6">
                             <input type="text" name="coor_y" placeholder="Coordinate Y*" class="form-control" value="{{$hotels->coor_y}}">
                         </div>

                     </div>
                 </p>

 <p>
                  
                            <b>Current icon</b>
                        </p>
                        <p>
                            <img src="{{asset('uploads/hotels/'.$hotels->img_url)}}" class="img img-responsive" style="height:200px" />
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

@endsection


