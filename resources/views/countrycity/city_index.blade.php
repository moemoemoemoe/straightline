@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add New City </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="name" placeholder="City Name" class="form-control" value="{{old('name')}}" autocomplete="off">
                        </p>
                        <p>


<select class="form-control" name="country_id">
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select> 
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
<br/>
<div class="container">
    <div class="row">
         @foreach($cities as $city)
    <div class="col-md-2" style="padding:10px">
      <div class="card">
            <div class="card-header" style="background-color:#ccc ">
                <b style="font-weight: 900;">{{$city->name}}</b> 
            </div>
            <div class="card-body" style="height: 100px;background-color: #fff;font-weight: bold">
              <p>  <span style="color: green;">Country : </span><span>{{$city->country->name}}</span></p>

            </div>
           
                <a href="{{route('update_city', $city->id)}}" class="btn btn-primary form-control">Update And Details</a>


        </div>
    </div>

    @endforeach
    </div>
</div>

@endsection
