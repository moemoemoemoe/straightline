@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add New Email Receive </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <p>


                            <select class="form-control" name="section_id">
                               
                                <option value="1">Contact Us</option>
                                <option value="2"> Reservation Package</option>
                                <option value="3">CallBack Request</option>
                             
                            </select> 
                        </p>
                        <p>
                            <input type="text" name="emails" placeholder="Emails separate by comma ( , )" class="form-control" value="{{old('emails')}}" autocomplete="off">
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
          <th scope="col">Section</th>
          <th scope="col">Emails</th>
           <th scope="col" style="text-align:center"><i class="fas fa-edit"></i> </th>
         
      </tr>
  </thead>
  <tbody>
   @foreach($emails as $email)
   <tr>
      <th >{{$email->id}}</th>
      <th >
@if($email->section_id == 1)
Contact Us
@elseif($email->section_id == 2)
Reservation Package
@elseif($email->section_id == 3)
CallBack Request
@endif
        

      </th>

          <td>{{$email->emails}}</td>
          <td><a href="{{route('update_mail_receive', $email->id)}}" class="btn btn-primary">Update And Details</a></td>
      </tr>

      @endforeach
      
  </tbody>
  
</table>
<hr style="border: 1px solid #169cd9;" >

</div>


@endsection
