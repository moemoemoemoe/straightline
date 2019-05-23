@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add New Continents </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="cont_name" placeholder="Continents Name" class="form-control" value="{{old('cont_name')}}" autocomplete="off">
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
          <th scope="col">Continent Name</th>
          <th scope="col" style="text-align:center"><i class="fas fa-edit"></i> </th>
          <th scope="col"><i class="fas fa-upload"></i> </th>
      </tr>
  </thead>
  <tbody>
   @foreach($conts as $cont)
   <tr>
      <th >{{$cont->id}}</th>
      <th > {{$cont->cont_name}}</th>

          <td>  <a href="{{route('update_cont', $cont->id)}}" class="btn btn-primary ">Update And Details</a></td>
          <td>@if($cont->status == 0)
                 <a href="{{route('publish_cont', $cont->id)}}" class="btn btn-success ">Publish</a>
                 @else
                 <a href="{{route('publish_cont', $cont->id)}}" class="btn btn-danger ">Unpublish</a>
                 @endif
           </td>
      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$conts->links()!!} 
</div>
@endsection
