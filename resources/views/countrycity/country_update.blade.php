@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header">Update Country</div>
				<div class="card-body">

					<form method="POST" enctype="multipart/form-data" class="well">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<p>
							<input type="text" name="name" placeholder="Package Category" class="form-control" value="{{$countries->name}}" autocomplete="off">
						</p>
   <p>
                            <select class="form-control" name="cont_id">
                                @foreach($continents as $conts)
                                <option value="{{$conts->id}}" {{ ($countries->continent_id == $conts->id) ? 'selected' : '' }}>{{$conts->cont_name}}</option>
                                @endforeach
                            </select>
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
