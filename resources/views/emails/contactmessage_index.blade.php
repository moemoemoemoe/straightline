@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Contact US  Messages </div>
            

            </div>
        </div>
    </div>
</div>
<br/>
<div class="container">
   
    <table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
         contactmessage
         
          <th scope="col">Name</th>
           <th scope="col">Last Name</th>
          <th scope="col">contact info</th>  <!-- email and phone -->
          <th scope="col">Message</th>
          

           <th scope="col" style="text-align:center"><i class="fas fa-trash"></i> </th>
           <th scope="col" style="text-align:center"><i class="fas fa-archive"></i> </th>
      </tr>
  </thead>
  <tbody>
   @foreach($contactmessages as $contactmessage)
   <tr>
    <th >{{$contactmessage->name}}</th>
        <th >{{$contactmessage->last_name}}</th>

      <th style="text-align: center;"><i class="fas fa-phone"></i> {{$contactmessage->phone}} <br/> <i class="fas fa-envelope"></i> {{$contactmessage->email}} </th>
      <th >{{$contactmessage->message}}</th>
     
         
           <td>  <a href="{{route('delete_contactmessage', $contactmessage->id)}}" class="btn btn-danger ">DELETE</a></td>
          <td>@if($contactmessage->status == 0)
                 <a href="{{route('archive_contactmessage', $contactmessage->id)}}" class="btn btn-success ">Archive</a>
                 @else
                 <a href="{{route('archive_contactmessage', $contactmessage->id)}}" class="btn btn-warning">UnArchive</a>
                 @endif
           </td>
         

      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$contactmessages->links()!!} 
</div>


@endsection
