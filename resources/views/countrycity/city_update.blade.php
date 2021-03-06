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
                            <input type="text" name="name" placeholder="City Name" class="form-control" value="{{$cities->name}}" autocomplete="off">
                        </p>
                       <p>
                            <select class="form-control" name="country_id">
                                @foreach($countries as $country)
                                <option value="{{$country->id}}" {{ ($cities->country_id == $country->id) ? 'selected' : '' }}>{{$country->name}}</option>
                                @endforeach
                            </select>
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
