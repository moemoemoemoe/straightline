@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header">Update Package Category</div>
				<div class="card-body">

					<form method="POST" enctype="multipart/form-data" class="well">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<p>
							<input type="text" name="cat_name" placeholder="Package Category" class="form-control" value="{{$categories->cat_name}}" autocomplete="off">
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
