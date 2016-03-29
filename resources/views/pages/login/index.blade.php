@extends('layouts.master')

{{-- META TAGS 4 SEO --}}
@section('title')
Login
@stop

@section('description')
@stop

{{-- WEBSITE CONTENT --}}
@section('content')

{{-- PAGE HEADER --}}
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			
		</div>
	</div>
</div>

<br>

{{-- PAGE CONTENT --}}
<div class="container">
	@if (Session::get('errors') || Session::get('error'))	
	<div class="row">
		<div class="alert alert-danger alert-dismissible" role="alert">
	
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			@if (Session::get('error'))
				{{ Session::get('error') }}
			@elseif (Session::get('errors')->count() > 1)
			<ul>
				@foreach (Session::get('errors')->all() as $error)
					<li>{{ $error  }}</li>
				@endforeach
			</ul>
			@elseif (Session::get('errors')->count() == 1)
				{{ Session::get('errors')->first() }}
			@endif

		</div>
	</div>
	@endif

	<div class="login">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h1>Login</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
			{!! Form::open(array('url' => url('login'), 'class' => 'loginForm')) !!}
				<div class="form-group">
					{!! Form::label('username','Username') !!}
					{!! Form::input('username', 'username', '', ['class'=>'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::label('password','Password')!!}
					{!! Form::input('password', 'password', '', ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Login', ['class'=>'btn btn-primary btn-lg'])!!}
				</div>
			{!! Form::close() !!}
			</div>				
		</div>
	</div>
</div>
@stop