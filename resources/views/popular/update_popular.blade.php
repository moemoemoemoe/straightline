@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">New Popular Destination </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="country" placeholder="Country Name" class="form-control" value="{{$pops->country}}" autocomplete="off">
                        </p>
                          <p>
                            <input type="text" name="city" placeholder="City Name" class="form-control" value="{{$pops->city}}" autocomplete="off">
                        </p>
                        <p>
                  
                            <b>Current icon</b>
                        </p>
                        <p>
                            <img src="{{asset('uploads/popular/'.$pops->image)}}" class="img img-responsive" style="height:200px" />
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
                            <input type="text" name="url" placeholder="Redirect Url example: http://www.lorem.com" class="form-control" value="{{$pops->url}}" autocomplete="off">
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
