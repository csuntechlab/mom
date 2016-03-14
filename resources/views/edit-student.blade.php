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
	<div class="edit-student">
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
	    	<div class="col-xs-12">
	    	<label for="profile_image_file">
	    	<!-- <img class="student-image" id="profile_image_preview" src="http://placehold.it/300x300" alt="student image" style="cursor: pointer;"> -->
	    	<div id="profile_image_preview" style="cursor: pointer; border-radius: 50%; width: 300px; height: 300px; background: #f2f2f2; position: relative;"> <span id="profile_image_preview_text" style="position: absolute; top: 20%; left: 50%; transform: translate(-50%, 50%); font-size: 200%;">Upload Image</span></div>
	    	</label>
	    	{{ Form::file('profile_image', ['id' => 'profile_image_file', 'style' => 'display: none;']) }}
	    	</div>
		</div>
		<div class="row social-media">
	    	<div class="col-xs-12">
	    		<img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />
	    		<input type="text" class="input-text" placeholder="Add URL">
    		</div>
		</div>
		<div class="row social-media">
	    	<div class="col-xs-12">
	    		<img class="social-media-btn-img" src="{{ asset('imgs/github.svg' ) }}" alt="linkedin" />
	    		<input type="text" class="input-text" placeholder="Add URL">
    		</div>
		</div>
		<div class="row social-media">
	    	<div class="col-xs-12">
	    		<img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="linkedin" />
	    		<input type="text" class="input-text" placeholder="Add URL">
    		</div>
	    </div>
	   
	    <div class="row">
	    	<div class="col-sm-12 student-seb">
	    		<label class="student-seb-title">Skills <button style="background: transparent; border: 0;" id="add_skill"><i class="fa fa-plus-circle add-seb"></i></button></label>
	    		<ul id="skills_list" class="student-seb-list">
	    			<li class="student-seb-list-items"><input name="skill1" type="text" class="input-text" placeholder="Add skill">
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
	    		<ul id="experience_list" class="student-seb-list">
	    			<li class="student-seb-list-items"><input name="experience1" type="text" class="input-text" placeholder="Add experience">
	    			</li>
	    		</ul>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-12 student-seb">
	    		<label class="student-seb-title">Background <button style="background: transparent; border: 0;" id="add_background"><i class="fa fa-plus-circle add-seb"></i></button></label>
	    		<ul id="background_list" class="student-seb-list">
	    			<li class="student-seb-list-items"><input name="background1" type="text" class="input-text" placeholder="Add background">
	    			</li>
	    		</ul>
	    	</div>
	    </div>
	    <div class="row edit-student-buttons">
	    	
	    		<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Preview</button>
	   	
	   		<button class="btn btn-default">Save</button>
	    	
	    </div>
	    
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