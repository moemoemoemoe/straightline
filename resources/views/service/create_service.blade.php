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
    <textarea name="description"><ol>
  <li>Passport valid 6 months after date of return</li>
  <li>2 photos</li>
  <li>Personal bank statement of account stamped by the bank (recent for the last 3 months)</li>
  <li>A new family extract in Arabic (less than 3 months old) translated to French or English + 1 copy</li>
  <li>2 photocopy of passport</li>
  <li>1 photocopy of all Schengen visas</li>
  <li>International insurance</li>
  <li>Notarized parental authorization for children under 18 years old, traveling with or without parents (in French or English)</li>
  <li>Hotel booking</li>
  <li>For employees employment letter stating salary (in French or English) precising the date of departure and return + certificate of registration from CNSS + photocopy of commercial circular (French or English)</li>
  <li>For students letter of enrollment from school (in English or French) + 1 photocopy of student ID</li>
  <li>For Business owners photocopy of the commercial register (French or English)</li>
</ol></textarea>
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
                 <a href="{{route('publish_service', $service->id)}}" class="btn btn-warning">Unpublish</a>
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
