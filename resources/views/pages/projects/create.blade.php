@extends('layouts.master')

@section('content')

	<div class="">
	    <section class="section page-hero work-banner">
	          <div class="dark-overlay"></div>
	            <div class="content">
	                <h1 class="text-center">Add a New Project</h1>
	                <hr class="line-lg line-center">
	            </div>
	        <div class="gradient-overlay"></div>
	    </section>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="bk-btn">
					<a href="{{ url('admin') }}">
						<i class="fa fa-arrow-left fa-2x"></i><span> return</span>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				@if(session('message'))
					{{ session('message') }}
				@endif
				@if(!empty($errors))
					@if(!$errors->isEmpty())
						<ul>
						@foreach($errors->all() as $error)
							<li>
								{{ $error }}
							</li>
						@endforeach
						</ul>
					@endif
				@endif
			</div>
		</div>
		<div class="row">
			<div class="project-form">
				<div class="col-sm-10 col-sm-offset-1">
					{!! Form::open(['url' => url('project')]) !!}
						<div class="form-group">
							{!! Form::label('title', 'Project Title') !!}
							{!! Form::text('title', '', ['placeholder' => 'Title', 'class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('description', 'Project Description') !!}
							{!! Form::textarea('description', '' , ['placeholder' => 'Description', 'class' => 'form-control', 'rows' => '8'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('start_date', 'Start Date:') !!}
					        {!! Form::input('text', 'start_date', date('Y-m-d'), ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
						</div>
						<div class="form-group">
					    	{!! Form::label('end_date', 'Estimated End Date:') !!}
					    	{!! Form::input('text', 'end_date', date('Y-m-d', strtotime("+30 days")), ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}    
						</div>
						<div class="form-group">
							{!! Form::submit('Create Project', ['class' => 'btn btn-primary']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop