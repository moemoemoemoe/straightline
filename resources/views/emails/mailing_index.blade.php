@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Mailing List 
             <!--    <div style="float: right"><a href="" class="btn btn-primary">Export</a></div>  -->
             <div class="form-group" style="float: right">
<a href="{{route('export_mailing_excell', 'xlsx')}}" class="btn btn-success">Export to .xlsx</a>
<a href="{{route('export_mailing_excell', 'xls')}}" class="btn btn-primary">Export to .xls</a>
</div>
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
         
         
          <th scope="col">Full Name</th>
          <th scope="col">Email</th>  <!-- email and phone -->
        

           <th scope="col" style="text-align:center"><i class="fas fa-trash"></i> </th>
           <th scope="col" style="text-align:center"><i class="fas fa-archive"></i> </th>
      </tr>
  </thead>
  <tbody>
   @foreach($mailings as $mailing)
   <tr>
    <th >{{$mailing->full_name}}</th>
      <th style="text-align: center;"> <i class="fas fa-envelope"></i> {{$mailing->email}} </th>
     
         
           <td>  <a href="{{route('delete_mailing', $mailing->id)}}" class="btn btn-danger ">DELETE</a></td>
          <td>@if($mailing->status == 0)
                 <a href="{{route('archive_mailing', $mailing->id)}}" class="btn btn-success ">Archive</a>
                 @else
                 <a href="{{route('archive_mailing', $mailing->id)}}" class="btn btn-warning">UnArchive</a>
                 @endif
           </td>
         

      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >
{!!$mailings->links()!!} 
</div>


@endsection
