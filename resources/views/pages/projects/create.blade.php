@extends('layouts.master')

@section('content')

	<div class="header">
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
					<a href="{{ url('project') }}">
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
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="project_image_file">
										Upload Image: 
										<div id="project_image_preview" class="img-rounded text-center">
											<span id="project_image_preview_icon"><i class="fa fa-upload fa-2x"></i></span>
										</div>
									</label>
									{{ Form::file('project_image', ['id' => 'project_image_file', 'style' => 'display: none;']) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{!! Form::label('title', 'Project Title') !!}
									{!! Form::text('title', '', ['placeholder' => 'Title', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{!! Form::label('description', 'Project Description') !!}
									{!! Form::textarea('description', '' , ['placeholder' => 'Description', 'class' => 'form-control', 'rows' => '8'])!!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('start_date', 'Start Date:') !!}
							        {!! Form::text('start_date', date('Y-m-d'), ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
							    	{!! Form::label('end_date', 'Estimated End Date:') !!}
							    	{!! Form::text('end_date', date('Y-m-d', strtotime("+30 days")), ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}    
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('product_owner', 'Product Owner:') !!}    
									{!! Form::select('product_owner', $users, null, 
									['placeholder' => 'Select Product Owner', 'role' => 'Select Team Members', 'class' => 'form-control chosen-select']) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('scrum_master', 'Scrum Master:') !!}    
									{!! Form::select('scrum_master', $users, null, 
									['placeholder' => 'Select Scrum Master', 'role' => 'Select Team Members', 'class' => 'form-control chosen-select']) !!}  
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{!! Form::label('members[]', 'Team Members:') !!}    
									{!! Form::select('members[]', $users, null, 
									['multiple' => '', 'role' => 'Select Team Members', 'class' => 'form-control chosen-select']) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{!! Form::submit('Create Project', ['class' => 'btn btn-primary']) !!}
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop
