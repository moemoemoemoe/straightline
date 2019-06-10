@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Loyality Form
                <span style="float: right;"><a href="" class="btn btn-primary"> Messages</a></span>
            </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="name" placeholder="Loyality Name" class="form-control" value="{{old('name')}}" autocomplete="off">
                        </p>
                          
               <p>
                            <input type="text" name="from_value" placeholder="From" class="form-control" value="{{old('from_value')}}" autocomplete="off">
                        </p>
 <p>
                            
                            <input type="text" name="to_value" placeholder="To" class="form-control" value="{{old('to_value')}}" autocomplete="off">
                        </p>
                         <p>
                            <input type="text" name="point_usd" placeholder="Point to Usd" class="form-control" value="{{old('point_usd')}}" autocomplete="off">
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
         
         
          <th scope="col">Loyality Name</th>
          <th scope="col">From</th>  <!-- email and phone -->
          <th scope="col">To</th>
          <th scope="col">Point / Usd</th>
        

           
           <th scope="col" style="text-align:center"><i class="fas fa-archive"></i> </th>

      </tr>
  </thead>
  <tbody>
   @foreach($loyalities as $loy)
   <tr>
    <th >{{$loy->name}}</th>
      <th>  {{$loy->from_value}} </th>
      <th >{{$loy->to_value}}</th>
      <th >{{$loy->point_usd}} </th>
  
         
           
          <td>@if($loy->status == 0)
                 <a href="{{route('loyality_archive', $loy->id)}}" class="btn btn-success ">Archive</a>
                 @else
                 <a href="{{route('loyality_archive', $loy->id)}}" class="btn btn-warning">UnArchive</a>
                 @endif
           </td>

      </tr>

      @endforeach
      
  </tbody>
  
</table>

</div>


@endsection
