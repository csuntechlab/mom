<h1>Project Details</h1>

<a href="{{ url('projects') }}">
	&larr; Go Back
</a>
|
<a href="{{ url('projects/' . $project->project_id . '/edit') }}">
	Edit Project
</a>

{!! Form::open(['method' => 'DELETE']) !!}
	{!! Form::submit('Delete Project') !!}
{!! Form::close() !!}
@if(session('message'))
		{{ session('message') }}
@endif

<h3>Project</h3>
<p> {{ $project->meta->title }} </p>

<h3>Description </h3>
<p> {{ $project->meta->description }} </p>

<h3>Product Owner</h3>
<p> {{ $project->product_owner->display_name }} </p>

<h3>Scrum Master</h3>
<p> {{ $project->scrum_master->display_name }} </p>

<h3>Project Link</h3>
<p> {{ $project->project_link->pivot->link_url }} </p>

<h3>Team Members</h3>
@foreach($project->members as $member)
	<p> {{ $member->display_name }} </p>
@endforeach
	
<h3>Start Date </h3>
<p> {{ $project->start_date }} </p>

<h3>Estimated End Date </h3>
<p> {{ $project->end_date }} </p>

<h3>Created At Date </h3>
<p> {{ $project->created_at }} </p>

<h3>Updated At Last Date </h3>
<p> {{ $project->updated_at }} </p>