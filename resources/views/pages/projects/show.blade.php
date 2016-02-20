<h1>Project Details</h1>

<a href="{{ url('project') }}">
	&larr; Go Back
</a>
|
<a href="{{ url('project/' . $project->project_id . '/edit') }}">
	Edit User
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