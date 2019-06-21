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

<b>You are In Section : 

@if($mails_save->section_id == 1)
Contact Us
@elseif($mails_save->section_id == 2)
Reservation Package
@elseif($mails_save->section_id == 3)
CallBack Request
@endif
</b>
                             
                        </p>
                        <p>
                            <input type="text" name="emails" placeholder="Emails separate by ," class="form-control" value="{{$mails_save->emails}}" autocomplete="off">
                        </p>
                      

                        <p>
                            <input type="submit" value="Update" class="btn btn-primary form-control">
                        </p>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
