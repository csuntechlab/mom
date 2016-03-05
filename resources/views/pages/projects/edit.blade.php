@extends('layouts.master')

@section('content')

	<div class="">
	    <section class="section page-hero work-banner">
	          <div class="dark-overlay"></div>
	            <div class="content">
	                <h1 class="text-center">Edit the Project</h1>
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
					{!! Form::open(['url' => url('project/' . $project->project_id), 'method' => 'PUT']) !!}
						<div class="form-group">
							{!! Form::label('title', 'Project Title') !!}
							{!! Form::text('title', $project->title, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('description', 'Project Description') !!}
							{!! Form::textarea('description', $project->description , ['placeholder' => 'Description', 'class' => 'form-control', 'rows' => '8'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('start_date', 'Start Date:') !!}
					        {!! Form::input('start_date', 'start_date', $project->dates->start_date->format('Y-m-d'), ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
						</div>
						<div class="form-group">
					    	{!! Form::label('end_date', 'Estimated End Date:') !!}
					    	{!! Form::input('end_date', 'end_date', $project->dates->end_date ? $project->dates->end_date->format('Y-m-d') : "", ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}    
						</div>
						<div class="form-group">
							{!! Form::submit('Update Project', ['class' => 'btn btn-primary']) !!}
						</div>
						<div class="form-group">
<!-- 						{!! Form::open(['method' => 'DELETE']) !!}
								{!! Form::submit('Delete Project', ['class' => 'btn btn-primary']) !!}
							{!! Form::close() !!} -->
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop