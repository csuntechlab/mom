@extends('layouts.master')

@section('title')
Remove Student Membership
@stop

@section('content')
<br>

<div class="">
    <section class="section page-hero work-banner">
          <div class="dark-overlay"></div>
            <div class="content">
                <h1 class="text-center">Remove Student Membership</h1>
                <hr class="line-lg line-center">
            </div>
        <div class="gradient-overlay"></div>
    </section>
</div>

<div class="container">
	<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="bk-btn">
					<a href="{{ url('admin/manage-students') }}">
						<i class="fa fa-arrow-left fa-2x"></i><span> return</span>
					</a>
				</div>
			</div>
	</div>
	@if( Session::has('message') || !$errors->isEmpty() )
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				@if ($errors->isEmpty())
		   			<div class="alert alert-success">{{ Session::get('message') }}</div>
		   		@else
	       			<div class="alert alert-danger">
		       			<p>The following errors occurred:</p>
		       			<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error  }}</li>
						@endforeach
						</ul>
					</div>
		   		@endif
	   		</div>
		</div>
	@endif
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
		{!! Form::open(['url' => url('admin/manage-students/remove'), 'method' => 'POST']) !!}
			{!! Form::select('individuals_id', $students, null, ['placeholder' => 'Select Student', 'role' => 'Select Student', 'class' => 'form-control chosen-select']) !!}
			{!! Form::submit('Remove Student', ['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}
		</div>
	<div class="row">
</div>

@stop