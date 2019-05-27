@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Create New   Service </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="location_description" placeholder="Location Description" class="form-control" value="{{$contacts[0]->location_description}}" autocomplete="off">
                        </p>
                          
               <p>
                            <input type="tel" name="mobile" placeholder="Mobile Number" class="form-control" value="{{$contacts[0]->mobile}}" autocomplete="off">
                        </p>
 <p>
                            <input type="tel" name="email" placeholder="Eamil" class="form-control" value="{{$contacts[0]->email}}" autocomplete="off">
                        </p>
                         <p>
                            <input type="text" name="map_loc" placeholder="Map Location example: 33444,343434" class="form-control" value="{{$contacts[0]->map_loc}}" autocomplete="off">
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
