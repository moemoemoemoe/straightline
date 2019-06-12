@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Contact US  Messages 
                   <div class="form-group" style="float: right">
<a href="{{route('export_contact_oyality_excell', 'xlsx')}}" class="btn btn-success">Export & Dwnld  .xlsx</a>
<a href="{{route('export_contact_oyality_excell', 'xls')}}" class="btn btn-primary">Export & Dwnld  .xls</a>
</div>
                </div>
            

            </div>
        </div>
    </div>
</div>
<br/>
<div class="container">
   
    <table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
     
          <th scope="col">Name</th>
           <th scope="col">Last Name</th>
          <th scope="col">contact info</th>  <!-- email and phone -->
          <th scope="col">Message</th>
          

           <th scope="col" style="text-align:center"><i class="fas fa-trash"></i> </th>
           <th scope="col" style="text-align:center"><i class="fas fa-archive"></i> </th>
      </tr>
  </thead>
  <tbody>
   @foreach($messages as $contactmessage)
   <tr>
    <th >{{$contactmessage->name}}</th>
        <th >{{$contactmessage->last_name}}</th>

      <th style="text-align: center;"><i class="fas fa-phone"></i> {{$contactmessage->phone}} <br/> <i class="fas fa-envelope"></i> {{$contactmessage->email}} </th>
      <th width="30%">{{$contactmessage->message}}</th>
     
         
          
              <td> <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('loyality_delete_messages', $contactmessage->id)}}">DELETE</a></td>
          <td>@if($contactmessage->status == 0)
                 <a href="{{route('loyality_archive_messages', $contactmessage->id)}}" class="btn btn-success ">Archive</a>
                 @else
                 <a href="{{route('loyality_archive_messages', $contactmessage->id)}}" class="btn btn-warning">UnArchive</a>
                 @endif
           </td>
         

      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$messages->links()!!} 
</div>


@endsection
