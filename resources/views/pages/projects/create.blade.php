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

{!! Form::open(['url' => url('project')]) !!}

	{!! Form::text('title', '', ['placeholder' => 'Title']) !!}
	{!! Form::textarea('description', '' , ['placeholder' => 'Description'])!!}
	{!! Form::label('start_date', 'Start date:') !!}
        {!! Form::input('start_date', 'start_date', date('Y-m-d')) !!}
    {!! Form::label('end_date', 'Estimated end date:') !!}
        {!! Form::input('end_date', 'end_date', date('Y-m-d', strtotime("+30 days"))) !!}    
	{!! Form::submit('Create Project') !!}

{!! Form::close() !!}