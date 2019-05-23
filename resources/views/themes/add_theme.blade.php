@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add New Theme </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="theme_name" placeholder="Theme Name" class="form-control" value="{{old('theme_name')}}" autocomplete="off">
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
          <th scope="col">Theme Name</th>
           <th scope="col" style="text-align:center"><i class="fas fa-edit"></i> </th>
          <th scope="col"><i class="fas fa-upload"></i> </th>
      </tr>
  </thead>
  <tbody>
   @foreach($themes as $theme)
   <tr>
      <th >{{$theme->id}}</th>
      <th > {{$theme->theme_name}}</th>

          <td>  <a href="{{route('update_theme', $theme->id)}}" class="btn btn-primary ">Update And Details</a></td>
          <td>@if($theme->status == 0)
                 <a href="{{route('publish_theme', $theme->id)}}" class="btn btn-success ">Publish</a>
                 @else
                 <a href="{{route('publish_theme', $theme->id)}}" class="btn btn-danger ">Unpublish</a>
                 @endif
           </td>
      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$themes->links()!!} 
</div>
@endsection
