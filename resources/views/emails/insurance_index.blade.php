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
          <th scope="col">contact info</th>  <!-- email and phone and dob -->
          <th scope="col">Pass ID</th>
          <th scope="col">Depart to Return</th>
          <th scope="col">Adult / Child</th>

           <th scope="col" style="text-align:center"><i class="fas fa-trash"></i> </th>
           <th scope="col" style="text-align:center"><i class="fas fa-archive"></i> </th>
      </tr>
  </thead>
  <tbody>
   @foreach($insurances as $insurance)
   <tr>
    <th >{{$insurance->full_name}}</th>
      <th style="text-align: center;"><i class="fas fa-phone"></i> {{$insurance->phone}} <br/> <i class="fas fa-envelope"></i> {{$insurance->email}} <br/><i class="fas fa-birthday-cake"></i>  {{$insurance->dob}} </th>
      <th >{{$insurance->pass_id}}</th>
      <th >{{$insurance->depart_date}} till {{$insurance->return_date}}</th>
      <th >{{$insurance->adult}} adult / {{$insurance->child}} child </th>
         
           <td>  <a href="{{route('delete_insurance', $insurance->id)}}" class="btn btn-danger ">DELETE</a></td>
          <td>@if($insurance->status == 0)
                 <a href="{{route('archive_insurance', $insurance->id)}}" class="btn btn-success ">Archive</a>
                 @else
                 <a href="{{route('archive_insurance', $insurance->id)}}" class="btn btn-warning">UnArchive</a>
                 @endif
           </td>
         

      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$insurances->links()!!} 
</div>


@endsection
