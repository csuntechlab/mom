@extends('layouts.errors')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Unauthorized</h1>
			</div>
		</div>
	</div>

	<br />
	
	<!-- Page Main Content -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				@if (!empty($e))
				<p>{{ $e->getMessage() }}</p>
				@else
				<p>You are not allowed to access this resource.</p>
				@endif
			</div>
		</div>
	</div>
@stop