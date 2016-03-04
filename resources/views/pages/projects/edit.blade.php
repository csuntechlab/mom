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

	{!! Form::text('title', $project->meta->title, ['placeholder' => 'Title']) !!}
	{!! Form::textarea('description', $project->meta->description , ['placeholder' => 'Description'])!!}
	{!! Form::label('start_date', 'Start date:') !!}
        {!! Form::input('text', 'start_date', $project->start_date->format('Y-m-d') ) !!}
    {!! Form::label('end_date', 'Estimated end date:') !!}
        {!! Form::input('text', 'end_date', $project->end_date ? $project->end_date->format('Y-m-d'): date('Y-m-d', strtotime("+30 days"))) !!}
    <br/><br/>    
    {!! Form::label('product_owner', 'Product Owner:') !!}    
    	{!! Form::select('product_owner', $users, $project->productOwner->user_id, ['placeholder' => 'Select Product Owner', 'role' => 'Select Product Owner'])!!}
    <br/><br/>
    {!! Form::label('scrum_master', 'Scrum Master:') !!}    
    	{!! Form::select('scrum_master', $users, $project->scrumMaster->user_id, ['placeholder' => 'Select Scrum Master', 'role' => 'Select Scrum Master'])!!}
    <br/><br/>     
    {!! Form::label('members[]', 'Team Members:') !!}    
    	{!! Form::select('members[]', $users, null, ['class' => 'form-control', 'multiple' => '', 'role' => 'Select Team Members' ])!!}
    <br/><br/>      
	{!! Form::submit('Update Project') !!}

{!! Form::close() !!}
