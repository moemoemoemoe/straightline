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
                            <input type="text" name="name" placeholder="Service Name" class="form-control" value="{{$services->name}}" autocomplete="off">
                        </p>
                          <p>
    <textarea name="description">{{$services->description}}</textarea>
</p>
              <p>
   
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
