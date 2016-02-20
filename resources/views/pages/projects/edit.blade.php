<p>
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
</p>

{!! Form::open(['url' => url('project/' . $project->project_id), 'method' => 'PUT']) !!}

	{!! Form::text('title', $project->title, ['placeholder' => 'Title']) !!}
	{!! Form::textarea('description', $project->description , ['placeholder' => 'Description'])!!}
	{!! Form::submit('Update Project') !!}

{!! Form::close() !!}