@extends('layouts.master')
@section('title')
Edit Project
@stop
@section('content')

	<div class="header">
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
					<a href="{{ url('projects') }}">
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
					{!! Form::open(['url' => url('projects/' . $project->project_id), 'method' => 'PUT', 'files' => 'true']) !!}
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="project_image_file">
										Upload Image: 
										@if($project->image)
										<div id="project_image_preview" style="background: url({{ asset('imgs/projects/' . 'sm_' . $project->image->src)  }}) no-repeat center center; background-size: cover; width: 150px; height: 150px; border-radius: 2px;"></div>
										@else
										<div id="project_image_preview" class="img-rounded text-center">
											<span id="project_image_preview_icon"><i class="fa fa-upload fa-2x"></i></span>
										</div>
										@endif
									</label>
									{{ Form::file('project_image', ['id' => 'project_image_file', 'style' => 'display: none;']) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{!! Form::label('title', 'Project Title') !!}
									{!! Form::text('title', $project->meta->title, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{!! Form::label('sponsor', 'Project Sponsor') !!}
									{!! Form::text('sponsor', isset($project->sponsor) ? $project->sponsor : '',['placeholder' => 'Project Sponsor', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{!! Form::label('description', 'Project Description') !!}
									{!! Form::textarea('description', $project->meta->description , ['placeholder' => 'Description', 'class' => 'form-control', 'rows' => '8'])!!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('start_date', 'Start Date') !!}
							        {!! Form::text('start_date', $project->start_date->format('Y-m-d'), ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
							    	{!! Form::label('end_date', 'Estimated End Date') !!}
							    	{!! Form::text('end_date', $project->end_date ? $project->end_date->format('Y-m-d') : "", ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}  
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('product_owner', 'Product Owner') !!}    
									{!! Form::select('product_owner', $users, $project->productOwner->user_id,
									['placeholder' => 'Select Product Owner', 'role' => 'Select Team Members', 'class' => 'form-control chosen-select']) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('scrum_master', 'Scrum Master') !!}
									{!! Form::select('scrum_master', $users, $project->scrumMaster->user_id,
									['placeholder' => 'Select Scrum Master', 'role' => 'Select Team Members', 'class' => 'form-control chosen-select']) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{!! Form::label('members[]', 'Team Members') !!}
									{!! Form::select('members[]', $users, $members, 
									['multiple' => '', 'role' => 'Select Team Members', 'class' => 'form-control chosen-select']) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{!! Form::submit('Update Project', ['class' => 'btn btn-primary']) !!}
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop