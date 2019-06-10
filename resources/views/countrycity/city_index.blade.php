@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add New City </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="name" placeholder="City Name" class="form-control" value="{{old('name')}}" autocomplete="off">
                        </p>
                        <p>


                            <select class="form-control" name="country_id">
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select> 
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
          <th scope="col">#</th>
          <th scope="col">Country Name</th>
          <th scope="col">City Name</th>
           <th scope="col" style="text-align:center"><i class="fas fa-edit"></i> </th>
         
      </tr>
  </thead>
  <tbody>
   @foreach($cities as $city)
   <tr>
      <th >{{$city->id}}</th>
      <th >
          {{$city->country->name}}</th>

          <td>{{$city->name}}</td>
          <td><a href="{{route('update_city', $city->id)}}" class="btn btn-primary">Update And Details</a></td>
      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$cities->links()!!} 
</div>


@endsection
