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
	{!! Form::submit('Create Project') !!}

{!! Form::close() !!}