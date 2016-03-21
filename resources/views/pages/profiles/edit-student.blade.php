@extends('layouts.master')
@section('content')
<section class="section page-hero work-banner">
	  <div class="dark-overlay"></div>
		<div class="content">
			<h1 class="text-center">Edit Profile</h1>
			<hr class="line-lg line-center">
		</div>
	<div class="gradient-overlay"></div>
</section>
<section class="section section-page section-white projects">
<div class="container" style="background-color: #fff;">
	<div class="student">
		{{ Form::open(['url' => 'profile/edit/' . $profile->individuals_id, 'files' => 'true']) }}

	    <div class="row">
	    	<!-- <div class="col-xs-1"></div> -->
	    	<!-- <div class="col-xs-2 text-right">
	    		<div class="social-media-btn">
	    			<a href="#">
	    				<img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="portfolium" />
	    				<p>Portfolium</p>
					</a>
				</div>
			</div> -->
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left">
	    	<label for="profile_image_file">
	    	<!-- <img class="student-image" id="profile_image_preview" src="http://placehold.it/300x300" alt="student image" style="cursor: pointer;"> -->
	    	@if($profile->image->src)
			<div id="profile_image_preview" style="cursor: pointer; border-radius: 50%; width: 300px; height: 300px; background: url('{{ asset('user-profile/image/' . $profile->image->src) }}') no-repeat center center; background-size: cover; position: relative;">
	    	</div>
	    	@else
	    	<div id="profile_image_preview" style="cursor: pointer; border-radius: 50%; width: 300px; height: 300px; background: #f2f2f2; position: relative;"> <span id="profile_image_preview_text" style="position: absolute; top: 20%; left: 50%; transform: translate(-30%, 50%); font-size: 200%;">Upload Image</span>
	    	</div>
	    	@endif
	    	</label>
	    	@if($errors->any())
	    	<div class="alert alert-danger">
	    		<ul>
	    			@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
	    		</ul>
			</div>
	    	@endif
	    	{!! Form::file('profile_image', ['id' => 'profile_image_file', 'style' => 'display: none;']) !!}
	    	</div>
		</div>
		<div class="row social-media">
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left"><img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />{!! Form::text('linkedin_url', $linkedin_url, ['placeholder' => 'Add URL', 'class' => 'input-text']) !!}</div>
		</div>
		<div class="row social-media">
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left"><img class="social-media-btn-img" src="{{ asset('imgs/github.svg' ) }}" alt="linkedin" />{!! Form::text('github_url', $github_url, ['placeholder' => 'Add URL', 'class' => 'input-text']) !!}</div>
		</div>
		<div class="row social-media">
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left"><img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="linkedin" />{!! Form::text('portfolium_url', $portfolium_url, ['placeholder' => 'Add URL', 'class' => 'input-text']) !!}</div>
	    	<!--<div class="col-xs-2 text-left">
	    		<div class="social-media-btn">
	    			<a href="#">
	    				<img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />
	    				<p>LinkedIn</p>
					</a>
				</div>
			</div>
	    	<div class="col-md-1"></div> -->
	    </div>
	   
	    <div class="row">
	    	<div class="col-sm-12 student-seb">
	    		<label class="student-seb-title">Skills <!-- <button style="background: transparent; border: 0;" id="add_skill"><i class="fa fa-plus-circle add-seb"></i></button> -->
	    		</label>
	    		<ul id="skills_list" class="student-seb-list">
	    			<li class="student-seb-list-items">
	    			{!! Form::select('skills[]', $skills, $profile_skills, ['multiple' => '', 'class' => 'input-text chosen-select', 'placeholder' => 'Add skill']) !!}
	    			</li>
	    		</ul>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-12 student-seb">
	    		<label class="student-seb-title">Experience
	    		<button style="background: transparent; border: 0;" id="add_experience">
	    			<i class="fa fa-plus-circle add-seb"></i>
    			</button></label>
    			@if($profile->experience->count() > 0)
    				<ul id="experience_list" class="student-seb-list">
    					@foreach($profile->experience as $exp)
						<li class="student-seb-list-items">
							<input type="text" name="experiences[]" value="{{ $exp->experience }}" placeholder="Add experience" class="input-text">
							<button style="background: transparent; border: 0;" id="experiences"><span class="student-seb-list-del">X</span></button>
						</li>
    					@endforeach
    				</ul>
				@else
	    		<ul id="experience_list" class="student-seb-list">
	    			<li class="student-seb-list-items">{{--{{ Form::text('experiences', NULL, ['placeholder' => 'Add experience', 'class' => 'input-text']) }}--}}
	    			<input type="text" name="experiences[]" placeholder="Add experience" class="input-text">
	    			</li>
	    		</ul>
	    		@endif
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-12 student-seb">
	    		<label class="student-seb-title">Background <!-- <button style="background: transparent; border: 0;" id="add_background"><i class="fa fa-plus-circle add-seb"></i></button> --></label>
	    		<ul id="background_list" class="student-seb-list">
	    			<li class="student-seb-list-items">{!! Form::text('background', $profile->background, ['placeholder' => 'Add background', 'class' => 'input-text']) !!}
	    			</li>
	    		</ul>
	    	</div>
	    </div>
	    <div class="row edit-student-buttons">
	    	<div class="col-xs-12 col-sm-1"></div>
	    	<div class="col-xs-12 col-sm-2"><button id="edit-profile-modal-btn" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Preview</button>
	    	</div>
	   		<div class="col-xs-12 col-sm-2">{!! Form::submit('Save', ['class' => 'btn btn-default']) !!}</div>
	    	<div class="col-xs-12 col-sm-7"></div>
	    </div>
	    {!! Form::close() !!}
	    
	</div>

	<!-- Student Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body student lines-back">
		        <div class="row">
		        	<div class="col-xs-1"></div>
		        	<div class="col-xs-2 text-right">
		        		<div class="social-media-btn">
		        		@if($portfolium_url)
		        			<a href="{{ $portfolium_url }}">
		        				<img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="portfolium" />
		        				<p>Portfolium</p>
		    				</a>
		    			@endif
						</div>
					</div>
					
		        	<div class="col-xs-6 text-center">
		        	@if($profile->image->src)
					<div id="profile_image_preview" style="border-radius: 50%; width: 200px; height: 200px; background: url('{{ asset('user-profile/image/' . $profile->image->src) }}') no-repeat center center; background-size: cover; position: relative;">
			    	</div>
			    	@else
			    	<img class="student-image product-owner" src="http://placehold.it/200x200" alt="student image">
			    	</div>
			    	@endif
		        	</div>
		        	<div class="col-xs-2 text-left">
		        		<div class="social-media-btn">
		        		@if($linkedin_url)
		        			<a href="{{ $linkedin_url }}">
		        				<img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />
		        				<p>LinkedIn</p>
		    				</a>
		    			@endif
						</div>
					</div>
		        	<div class="col-md-1"></div>
		        </div>
		        
		        <div class="row">
		        	<div class="col-sm-12 text-center">
		        		<p class="student-name">{{ $profile->fullName() }}</p>
	    			</div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-12 text-center"><p class="student-title">{{ $profile->position }}</p></div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-12 text-center"><i class="fa fa-graduation-cap student-graduate"></i> <span class="graduates-in">Graduates in {{ date('Y', strtotime($profile->grad_date)) }}</span></div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-1"></div>
		        	<div class="col-sm-10 text-left student-seb">
		        		<h2 class="student-seb-title">Skills</h2>
		        		<ul class="student-seb-list">
		        		@if($profile->skills->count() > 0)
		        			@foreach($profile->skills as $skill)
								<li class="student-seb-list-items">{{ $skill->title }}</li>
		        			@endforeach
		        		@else
							<li class="student-seb-list-items">No skills added yet</li>
		        		@endif
		        		</ul>
		        	</div>
		        	<div class="col-sm-1"></div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-1"></div>
		        	<div class="col-sm-10 text-left student-seb">
		        		<h2 class="student-seb-title">Experience</h2>
		        		<ul class="student-seb-list">
		        		@if($profile->experience->count() > 0)
		        			@foreach($profile->experience as $exp)
								<li class="student-seb-list-items">{{ $exp->experience }}</li>
		        			@endforeach
		        		@else
							<li class="student-seb-list-items">No experience added yet</li>
		        		@endif
		        		</ul>
		        	</div>
		        	<div class="col-sm-1"></div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-1"></div>
		        	<div class="col-sm-10 text-left student-seb">
		        		<h2 class="student-seb-title">Background</h2>
		        		<ul class="student-seb-list">
		        		@if($profile->background)
							<li class="student-seb-list-items">{{ $profile->background }}</li>
		        		@else
							<li class="student-seb-list-items">No background added yet</li>
		        		@endif
		        		</ul>
		        	</div>
		        	<div class="col-sm-1"></div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
</div> 
@endsection