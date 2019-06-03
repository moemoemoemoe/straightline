@extends('layouts.app')

@section('content')


<div class="container">

<div class="row">
          

                                                                               

 
<table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
         
          <th scope="col">Image</th>
          <th scope="col">Package Title</th>
          
           <th scope="col" style="text-align:center"><i class="fas fa-edit"></i> </th>
         
      </tr>
  </thead>
  <tbody>
  @foreach($packages as $package)
   <tr>
      <th ><img src="{{asset('uploads/packages/'.$package->main_image)}}" width="50px" height="50px" /></th>
      <th >{{$package->title}}</th>

        

          <td><a href="{{ route('package_update', ['id'=>$package->id]) }}" class="btn btn-primary">Update And Details</a></td>
        

      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
  

               

        </div>

    </div>
@endsection


