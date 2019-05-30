@extends('layouts.app')

@section('content')


<div class="container">

<div class="row">
          

                                                                               
@foreach($packages as $package)
    <div class="col-md-4">
        <div class="card" style="border-radius: 20px">
            <div class="card-header" style="background-color:#fff ">
                <b><span style="color: #4CAF50;font-weight: 900">{{$package->title}}</span></b>
            </div>
            
            <div class="panel-body" style="height:200px; background: url('{{asset('uploads/packages/'.$package->main_image)}}'); background-size: cover; background-position: center center;background-repeat: no-repeat;">
                
            </div>
          <br/>
            <div class="panel-footer text-center">
               <a href="{!! route('package_update', ['id'=>$package->id]) !!}" class="btn btn-primary form-control">Edit ...</a>
            </div>
           
        </div>
    </div>

    @endforeach

               

        </div>

    </div>
@endsection


