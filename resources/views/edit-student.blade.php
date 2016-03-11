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
		{{ Form::open(['url' => 'profile/edit']) }}
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
	    	{{ $profile->fullName() }}
	    	@if($errors->any())
				@foreach($errors->all() as $error)
					<ul>
						<li>{{ $error }}</li>
					</ul>
				@endforeach
	    	@endif
	    	<label for="profile_image_file">
	    	<img class="student-image" id="profile_image_preview" src="http://placehold.it/200x200" alt="student image" style="cursor: pointer;">
	    	</label>
	    	{{ Form::file('profile_image', ['id' => 'profile_image_file', 'style' => 'display: none;']) }}
	    	</div>
		</div>
		<div class="row social-media">
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left"><img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />{{ Form::text('linkedin_url', null, ['placeholder' => 'Add URL', 'class' => 'input-text']) }}</div>
		</div>
		<div class="row social-media">
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left"><img class="social-media-btn-img" src="{{ asset('imgs/github.svg' ) }}" alt="linkedin" />{{ Form::text('github_url', null, ['placeholder' => 'Add URL', 'class' => 'input-text']) }}</div>
		</div>
		<div class="row social-media">
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left"><img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="linkedin" />{{ Form::text('portfolium_url', null, ['placeholder' => 'Add URL', 'class' => 'input-text']) }}</div>
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
	    	<div class="col-sm-1"></div>
	    	<div class="col-sm-10 text-left student-seb">
	    		<label class="student-seb-title">Skills</label><button style="background: transparent; border: 0;" id="add_skill"><i class="fa fa-plus-circle add-seb"></i></button>
	    		<ul id="skills_list" class="student-seb-list">
	    			<li class="student-seb-list-items">{{ Form::text('skill', NULL, ['placeholder' => 'Add Skill', 'class' => 'input-text']) }}
	    			</li>
	    		</ul>

	    	</div>
	    	<div class="col-sm-1"></div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-1"></div>
	    	<div class="col-sm-10 text-left student-seb">
	    		<label class="student-seb-title">Experience</label><button style="background: transparent; border: 0;" id="add_experience"><i class="fa fa-plus-circle add-seb"></i></button>
	    		<ul id="experience_list" class="student-seb-list">
	    			<li class="student-seb-list-items">{{ Form::text('experience', NULL, ['placeholder' => 'Add experience', 'class' => 'input-text']) }}
	    			</li>
	    		</ul>
	    	</div>
	    	<div class="col-sm-1"></div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-1"></div>
	    	<div class="col-sm-10 text-left student-seb">
	    		<label class="student-seb-title">Background</label><button style="background: transparent; border: 0;" id="add_background"><i class="fa fa-plus-circle add-seb"></i></button>
	    		<ul id="background_list" class="student-seb-list">
	    			<li class="student-seb-list-items">{{ Form::text('background', NULL, ['placeholder' => 'Add background', 'class' => 'input-text']) }}
	    			</li>
	    		</ul>
	    	</div>
	    	<div class="col-sm-1"></div>
	    </div>
	    <div class="row edit-student-buttons">
	    	<div class="col-xs-12 col-sm-1"></div>
	    	<div class="col-xs-12 col-sm-2"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Preview</button></div>
	   	<div class="col-xs-12 col-sm-2">{{ Form::submit('Save', ['class' => 'btn btn-default']) }}</div>
	    	<div class="col-xs-12 col-sm-7"></div>
	    </div>
	    {{ Form::close() }}
	    
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
		        			<a href="#">
		        				<img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="portfolium" />
		        				<p>Portfolium</p>
		    				</a>
						</div>
					</div>
					
		        	<div class="col-xs-6 text-center"><img class="student-image product-owner" src="http://placehold.it/200x200" alt="student image"></div>
		        	<div class="col-xs-2 text-left">
		        		<div class="social-media-btn">
		        			<a href="#">
		        				<img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />
		        				<p>LinkedIn</p>
		    				</a>
						</div>
					</div>
		        	<div class="col-md-1"></div>
		        </div>
		        
		        <div class="row">
		        	<div class="col-sm-12 text-center">
		        		<p class="student-name">FirstName Lastname</p>
	    			</div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-12 text-center"><p class="student-title">Title</p></div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-12 text-center"><i class="fa fa-graduation-cap student-graduate"></i> <span class="graduates-in">Graduates in 20XY</span></div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-1"></div>
		        	<div class="col-sm-10 text-left student-seb">
		        		<h2 class="student-seb-title">Skills</h2>
		        		<ul class="student-seb-list">
		        			<?php
		        				
		        				for($i=1; $i <= 3; $i++){
		        				echo '<li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>Skill #'.$i.'</li>';
		        				}
		        			?>
		        		</ul>
		        	</div>
		        	<div class="col-sm-1"></div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-1"></div>
		        	<div class="col-sm-10 text-left student-seb">
		        		<h2 class="student-seb-title">Experience</h2>
		        		<ul class="student-seb-list">
		        			<?php
		        				
		        				for($i=1; $i <= 3; $i++){
		        				echo '<li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>Experience #'.$i.'</li>';
		        				}
		        			?>
		        		</ul>
		        	</div>
		        	<div class="col-sm-1"></div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-1"></div>
		        	<div class="col-sm-10 text-left student-seb">
		        		<h2 class="student-seb-title">Background</h2>
		        		<ul class="student-seb-list">
		        			<?php
		        				
		        				for($i=1; $i <= 3; $i++){
		        				echo '<li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>Background #'.$i.'</li>';
		        				}
		        			?>
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