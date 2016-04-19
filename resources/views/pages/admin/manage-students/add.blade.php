@extends('layouts.master')

@section('title')
Add Student
@stop

@section('content')
<br>

<div class="">
    <section class="section page-hero work-banner">
          <div class="dark-overlay"></div>
            <div class="content">
                <h1 class="text-center">Add Student</h1>
                <hr class="line-lg line-center">
            </div>
        <div class="gradient-overlay"></div>
    </section>
</div>

<div class="container">
	<div class="row">
	    <div class="admin-nav">
	        <ul class="nav">
	            <li>
	                <a href="">
	                    <i class="fa fa-dashboard fa-3x"></i>
	                    <span>Dashboard</span>
	                </a>
	            </li>
	            <li>
	                <a href="{{ url('projects/') }}">
	                    <i class="fa fa-cubes fa-3x"></i>
	                    <span>Projects</span>
	                </a>
	            </li>
	            <li>
	                <a href="{{ url('admin/manage-students') }}">
	                    <i class="fa fa-users fa-3x"></i>
	                    <span>Students</span>
	                </a>
	            </li>
	            <li>
	                <a href="">
	                    <i class="fa fa-sign-out fa-3x"></i>
	                    <span>Logout</span>
	                </a>
	            </li>
	        </ul>
	    </div>
	</div>
	<div class="row">
			<div class="col-sm-12">
				<div class="bk-btn">
					<a href="{{ url('admin/manage-students') }}">
						<i class="fa fa-arrow-left fa-2x"></i><span> return</span>
					</a>
				</div>
			</div>
	</div>
	@if( Session::has('message') || !$errors->isEmpty() )
		<div class="row">
			<div class="col-sm-12">
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
		<div class="col-sm-12">
			{!! Form::open(['url' => url('admin/manage-students/add'), 'method' => 'POST']) !!}
				{!! Form::text('student_id', null, ['placeholder' => 'Student ID', 'class' => 'form-control']) !!}
				{!! Form::submit('Add Student', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>

@stop