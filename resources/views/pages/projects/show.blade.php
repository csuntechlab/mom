<h1>Project Details</h1>

<a href="{{ url('project') }}">
	&larr; Go Back
</a>
|
<a href="{{ url('project/' . $project->project_id . '/edit') }}">
	Edit Project
</a>

{!! Form::open(['method' => 'DELETE']) !!}
	{!! Form::submit('Delete Project') !!}
{!! Form::close() !!}
@if(session('message'))
		{{ session('message') }}
@endif

<h3>Project</h3>
<p> {{$project->title }} </p>

<h3>Description </h3>
<p> {{$project->description }} </p>

<h3>Start Date </h3>
<p> {{$project->dates->start_date }} </p>

<h3>Estimated End Date </h3>
<p> {{$project->dates->end_date }} </p>

<h3>Created At Date </h3>
<p> {{$project->created_at }} </p>

<h3>Updated At Last Date </h3>
<p> {{$project->updated_at }} </p>