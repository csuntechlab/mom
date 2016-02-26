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
	{!! Form::label('start_date', 'Start date:') !!}
        {!! Form::input('text', 'start_date', $project->dates->start_date->format('Y-m-d') ) !!}
    {!! Form::label('end_date', 'Estimated end date:') !!}
        {!! Form::input('text', 'end_date', $project->dates->end_date ? $project->dates->end_date->format('Y-m-d'): date('Y-m-d', strtotime("+30 days"))) !!}
	{!! Form::submit('Update Project') !!}

{!! Form::close() !!}
