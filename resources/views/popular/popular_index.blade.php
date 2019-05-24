@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">New Popular Destination </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="country" placeholder="Country Name" class="form-control" value="{{old('country')}}" autocomplete="off">
                        </p>
                          <p>
                            <input type="text" name="city" placeholder="City Name" class="form-control" value="{{old('city')}}" autocomplete="off">
                        </p>
                       <p>
                 
                        <div class="col-md-12">
                            Choose Image/s
                            <input type="file" name="photo"  class="form-control" />
                        </div>

                
                </p>
                <p>
                            <input type="text" name="url" placeholder="Redirect Url example: http://www.lorem.com" class="form-control" value="{{old('url')}}" autocomplete="off">
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
   
    <table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
         
          <th scope="col">Image</th>
          <th scope="col">Country Name</th>
          <th scope="col">City Name</th>
          <th scope="col">Redirect URL</th> 
           <th scope="col" style="text-align:center"><i class="fas fa-edit"></i> </th>
           <th scope="col" style="text-align:center"><i class="fas fa-upload"></i> </th>
      </tr>
  </thead>
  <tbody>
   @foreach($pops as $pop)
   <tr>
      <th ><img src="{{asset('uploads/popular/'.$pop->image)}}" width="50px" height="50px" /></th>
      <th >{{$pop->country}}</th>

          <td>{{$pop->city}}</td>
      <td>{{$pop->url}}</td>

          <td><a href="{{route('update_popular', $pop->id)}}" class="btn btn-primary">Update And Details</a></td>
          <td>
            @if($pop->status == 0)
                 <a href="{{route('publish_popular', $pop->id)}}" class="btn btn-success ">Publish</a>
                 @else
                 <a href="{{route('publish_popular', $pop->id)}}" class="btn btn-danger ">Unpublish</a>
                 @endif
           </td>

      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$pops->links()!!} 
</div>


@endsection
