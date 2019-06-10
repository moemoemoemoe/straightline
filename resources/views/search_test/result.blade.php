@extends('layouts.app_front')

@section('content_front')


<div class="container">

<div class="row">
	
		<iframe src="{{ Session::get('link')}}"  frameborder="0" allowfullscreen width="100%" height="800px"></iframe>
		</div> 
	</div>
	@endsection