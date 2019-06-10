@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Loyality Messages 
                <div class="form-group" style="float: right">
<a href="{{route('export_callback_excell', 'xlsx')}}" class="btn btn-success">Export & Dwnld  .xlsx</a>
<a href="{{route('export_callback_excell', 'xls')}}" class="btn btn-primary">Export & Dwnld  .xls</a>
</div></div>
            

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
          <th scope="col">Last Name</th>  <!-- email and phone -->
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Message</th>

           <th scope="col" style="text-align:center"><i class="fas fa-trash"></i> </th>
           
      </tr>
  </thead>
  <tbody>
   @foreach($calls as $call)
   <tr>
    <th >{{$call->name}}</th>
        <th >{{$call->last_name}}</th>


    <th style="text-align: center;"><i class="fas fa-phone"></i> {{$call->phone}}</th>
      <th >{{$call->email}} </th>
      <th >{{$call->message}} </th>
         
             <td> <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="">DELETE</a></td>
        
         

      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$calls->links()!!} 
</div>


@endsection
