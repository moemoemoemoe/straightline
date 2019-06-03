@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Profile Form </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <p>
    <textarea name="description">{{$profiles[0]->description}}</textarea>
</p>
<p>
<div class="row">
  <div class="col-md-6">
    <b>Our Mission</b>
        <textarea name="detailed">{{$profiles[0]->mission}}</textarea>

  </div>
  <div class="col-md-6">
        <b>Our Vision</b>

        <textarea name="price_included">{{$profiles[0]->vision}}</textarea>

  </div>
  </div>
</p>
<p>       
  <div class="row">
  <div class="col-md-12">
 <textarea name="execluded">{{$profiles[0]->goals}}</textarea>
</div></div>
</p>
<p>      
  <div class="row">
  <div class="col-md-12">
 <textarea name="values">{{$profiles[0]->values}}</textarea>
</div></div>
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
