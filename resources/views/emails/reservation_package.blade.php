@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                Reservation Package 
                          <div class="form-group" style="float: right">
<a href="{{route('export_packres_excell', 'xlsx')}}" class="btn btn-success">Export & Dwnld  .xlsx</a>
<a href="{{route('export_packres_excell', 'xls')}}" class="btn btn-primary">Export & Dwnld  .xls</a>
</div>
              </div>
            <br/>
<div class="row">
<div class="col-md-12">
                  <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
               <input type="text" name="search_keyword" class="form-control" placeholder="Search By email,name or mobile number ...">
               <p>
                <div class="row">
                <div class="col-md-6">
                  <b>Startring Date </b>
                <input type="date" name="start_date" class="form-control" > 
              </div>
               <div class="col-md-6">
                <b>End Date </b>
                <input type="date" name="end_date" class="form-control" > 
              </div>
            </div>
              </p>
              <div class="col-md-12">
               <input type="submit" value="Search" class="btn btn-warning form-control">
             </div>
            </div>  
             
           </form> 
                      
             
</div>
<br/>
            </div>
        </div>
    </div>
</div>
<br/>
<div class="container">
   
    <table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Pack Name</th>
          <th scope="col"> Name</th>
        
          <th scope="col">Contact info</th>  <!-- email and phone -->
          <th scope="col">Depart Til Return </th>
          

           <th scope="col" style="text-align:center"><i class="fas fa-trash"></i> </th>
           <th scope="col" style="text-align:center"><i class="fas fa-archive"></i> </th>
         <th scope="col" style="text-align:center"><i class="fas fa-eye"></i> </th>

      </tr>
  </thead>
  <tbody>
   @foreach($packages as $pack)
   <tr>
      <th ><img src="{{asset('uploads/packages/'.$pack->package->main_image)}}" width="60px" height="60px" /></th>

      <th width="20%">{{$pack->package->title}}</th>
        <th >{{$pack->name}}  {{$pack->last_name}}</th>

      <th style="text-align: center; width: 20%"><i class="fas fa-phone"></i> {{$pack->phone}} <br/> <i class="fas fa-envelope"></i> {{$pack->email}} </th>

      <th width="20%">{{$pack->dep_date}} Till  {{$pack->return_date}}</th>
     
         
      
              <td> <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('delete_reservation_package', $pack->id)}}">DELETE</a></td>
          <td>@if($pack->status == 0)
                 <a href="{{route('archive_reservation_package', $pack->id)}}" class="btn btn-success ">Archive</a>
                 @else
                 <a href="{{route('archive_reservation_package', $pack->id)}}" class="btn btn-warning">UnArchive</a>
                 @endif
           </td>
                    <td>  <a href="{{route('view_reservation_package', $pack->id)}}" class="btn btn-info ">View</a></td>


      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$packages->links()!!} 
</div>


@endsection
