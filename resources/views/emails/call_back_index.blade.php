@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Insurance Messages </div>
            

            </div>
        </div>
    </div>
</div>
<br/>
<div class="container">
   
    <table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
         
         
          <th scope="col">Full Name</th>
          <th scope="col">contact info</th>  <!-- email and phone -->
          <th scope="col">In Mind</th>
          <th scope="col">Destination</th>
          <th scope="col">Season</th>

           <th scope="col" style="text-align:center"><i class="fas fa-trash"></i> </th>
           <th scope="col" style="text-align:center"><i class="fas fa-archive"></i> </th>
      </tr>
  </thead>
  <tbody>
   @foreach($calls as $call)
   <tr>
    <th >{{$call->full_name}}</th>
      <th style="text-align: center;"><i class="fas fa-phone"></i> {{$call->phone}} <br/> <i class="fas fa-envelope"></i> {{$call->email}} </th>
      <th >{{$call->your_mind}}</th>
      <th >{{$call->your_go}} </th>
      <th >{{$call->your_whene}} </th>
         
           <td>  <a href="{{route('delete_callback', $call->id)}}" class="btn btn-danger ">DELETE</a></td>
          <td>@if($call->status == 0)
                 <a href="{{route('archive_callback', $call->id)}}" class="btn btn-success ">Archive</a>
                 @else
                 <a href="{{route('archive_callback', $call->id)}}" class="btn btn-warning">UnArchive</a>
                 @endif
           </td>
         

      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$calls->links()!!} 
</div>


@endsection
