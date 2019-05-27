@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Create New   Service </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="name" placeholder="Service Name" class="form-control" value="{{old('name')}}" autocomplete="off">
                        </p>
                          <p>
    <textarea name="description"></textarea>
</p>
              <p>
          <select class="form-control" name="is_important">
                             
                                <option value="1">Section Top</option>
                                   <option value="0">Section Other Services</option>
                               
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
         
         
          <th scope="col">Service Name</th>
          <th scope="col">Section Name</th>
        
           <th scope="col" style="text-align:center"><i class="fas fa-edit"></i> </th>
           <th scope="col" style="text-align:center"><i class="fas fa-upload"></i> </th>
      </tr>
  </thead>
  <tbody>
   @foreach($services as $service)
   <tr>
      <th >{{$service->name}}</th>

         @if($service->is_important ==1)
     <th><a href="{{route('change_section', $service->id)}}" ><i class="fas fa-exchange-alt"></i></a>  Top Service in page</th>
@else
 <th><a href="{{route('change_section', $service->id)}}"> <i class="fas fa-exchange-alt"></i> </a> Onther Services </th>
@endif
           <td>  <a href="{{route('update_service', $service->id)}}" class="btn btn-primary ">Update And Details</a></td>
          <td>@if($service->status == 0)
                 <a href="{{route('publish_service', $service->id)}}" class="btn btn-success ">Publish</a>
                 @else
                 <a href="{{route('publish_service', $service->id)}}" class="btn btn-warning ">Unpublish</a>
                 @endif
           </td>
         

      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$services->links()!!} 
</div>


@endsection
