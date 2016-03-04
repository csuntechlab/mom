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
    <br/><br/>    
    {!! Form::label('product_owner', 'Product Owner:') !!}    
    	{!! Form::select('product_owner', $users, null, 
    		['placeholder' => 'Select Product Owner', 'role' => 'Select Team Members' ])!!}
    <br/><br/>
    {!! Form::label('scrum_master', 'Scrum Master:') !!}    
    	{!! Form::select('scrum_master', $users, null, 
    		['placeholder' => 'Select Scrum Master', 'role' => 'Select Team Members' ])!!}
    <br/><br/>     
    {!! Form::label('members[]', 'Team Members:') !!}    
    	{!! Form::select('members[]', $users, null, 
    		['class' => 'form-control chosen-select', 'multiple' => '', 'role' => 'Select Team Members' ])!!}
    <br/><br/>     
	{!! Form::submit('Create Project') !!}
{!! Form::close() !!}