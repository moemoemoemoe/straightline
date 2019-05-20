@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add New Theme </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="theme_name" placeholder="Theme Name" class="form-control" value="{{old('theme_name')}}" autocomplete="off">
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
         @foreach($themes as $theme)
    <div class="col-md-2" style="padding:10px">
      <div class="card">
            <div class="card-header" style="background-color:#ccc ">
                <b style="font-weight: 900;">{{$theme->id}}</b> 
            </div>
            <div class="card-body" style="height: 100px;background-color: #fff;font-weight: bold">
              <p>  <span style="color: green;">Name: </span><span>{{$theme->theme_name}}</span></p>

            </div>
           
                <a href="{{route('update_theme', $theme->id)}}" class="btn btn-primary form-control">Update And Details</a>
<br/>
@if($theme->status == 0)
                 <a href="{{route('publish_theme', $theme->id)}}" class="btn btn-secondary form-control">Publish</a>
                 @else
                 <a href="{{route('publish_theme', $theme->id)}}" class="btn btn-danger form-control">Unpublish</a>
                 @endif
           
        </div>
    </div>

    @endforeach
    </div>
</div>
@endsection
