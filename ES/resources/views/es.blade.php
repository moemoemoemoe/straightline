@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Create New   Article </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="title" placeholder="Title" class="form-control" value="{{old('title')}}" autocomplete="off">
                        </p>
                          <p>
   <textarea name="body" class="form-control"></textarea>
</p>
               <p>
                            <input type="text" name="tags" placeholder="Tags" class="form-control" value="{{old('tags')}}" autocomplete="off">
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

@endsection
