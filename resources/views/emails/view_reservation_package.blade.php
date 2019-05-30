@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
              <span style="font-weight: 999">Package Name: </span> <span style="color: #0d4fa0"> {{$packages[0]->package->title}} </span>
                
                <br/>
                <span style="font-weight: 999">Message:</span><span style="color: #0d4fa0">  {{$packages[0]->message}}
    </span>
    <br/>
                <span style="font-weight: 999">Categorie: </span><span style="color: #0d4fa0">{{$packages[0]->package->cat->cat_name}} </span>
                  <div class="form-group" style="float: right">
                <a href="{{route('reservation_package')}}" class="btn btn-primary">Back</a>

              </div>
            

            </div>
        </div>
    </div>
</div>
<br/>
<div class="container">
   
    <table class="table table-striped" style="text-align: center;">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Pack Name</th>
          <th scope="col"> Name</th>
        
          <th scope="col">Contact info</th>  <!-- email and phone -->
          <th scope="col">Depart Til Return </th>
             <th scope="col">Traveller Number</th>  <!-- email and phone -->
         
         
      </tr>
  </thead>
  <tbody>
  
   <tr>
      <th ><img src="{{asset('uploads/packages/'.$packages[0]->package->main_image)}}" width="60px" height="60px" /></th>

      <th width="30%">{{$packages[0]->package->title}}</th>
      <th width="20%">{{$packages[0]->name}}  {{$packages[0]->last_name}}</th>

      <th style="text-align: center; width: 20%"><i class="fas fa-phone"></i> {{$packages[0]->phone}} <br/> <i class="fas fa-envelope"></i> {{$packages[0]->email}} </th>

      <th width="20%">{{$packages[0]->dep_date}} Till  {{$packages[0]->return_date}}</th>
            <th>{{$packages[0]->traveller_number}}</th>

   

     </tr>
         
        

      </tr>

      
      
  </tbody>
  
</table>

</div>


@endsection
