<h1>Users</h1>

@if(session('message'))
		{{ session('message') }}
@endif
<p>
	<a href="{{ url('project/create') }}"> + Create Project </a>
</p>
<ul>
	@foreach($projects as $project)
		<li>	 
		<a href="{{ url('project/' . $project->project_id) }}">
		{{ $project->meta->title }}
		</a>
		</li>
	@endforeach
</ul>