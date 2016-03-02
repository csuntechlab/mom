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
	    	<div class="col-xs-11 text-left"><img class="student-image" src="http://placehold.it/200x200" alt="student image"></div>
		</div>
		<div class="row social-media">
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left"><img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" /><input type="text" class="input-text" placeholder="Add URL"></div>
		</div>
		<div class="row social-media">
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left"><img class="social-media-btn-img" src="{{ asset('imgs/github.svg' ) }}" alt="linkedin" /><input type="text" class="input-text" placeholder="Add URL"></div>
		</div>
		<div class="row social-media">
			<div class="col-xs-1"></div>
	    	<div class="col-xs-11 text-left"><img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="linkedin" /><input type="text" class="input-text" placeholder="Add URL"></div>
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
	    		<label class="student-seb-title">Skills</label><i class="fa fa-plus-circle add-seb"></i>
	    		<ul class="student-seb-list">
	    			<li class="student-seb-list-items"><input type="text" class="input-text" placeholder="Add skill"><span class="student-seb-list-del">X</a>
	    			</li>
	    		</ul>

	    	</div>
	    	<div class="col-sm-1"></div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-1"></div>
	    	<div class="col-sm-10 text-left student-seb">
	    		<label class="student-seb-title">Experience</label><i class="fa fa-plus-circle add-seb"></i>
	    		<ul class="student-seb-list">
	    			<li class="student-seb-list-items"><input type="text" class="input-text" placeholder="Add experience"><span class="student-seb-list-del">X</a>
	    			</li>
	    		</ul>
	    	</div>
	    	<div class="col-sm-1"></div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-1"></div>
	    	<div class="col-sm-10 text-left student-seb">
	    		<label class="student-seb-title">Background</label><i class="fa fa-plus-circle add-seb"></i>
	    		<ul class="student-seb-list">
	    			<li class="student-seb-list-items"><input type="text" class="input-text" placeholder="Add background"><span class="student-seb-list-del">X</a>
	    			</li>
	    		</ul>
	    	</div>
	    	<div class="col-sm-1"></div>
	    </div>
	    <div class="row edit-student-buttons">
	    	<div class="col-xs-12 col-sm-1"></div>
	    	<div class="col-xs-12 col-sm-2"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Preview</button></div>
	   	<div class="col-xs-12 col-sm-2"><button class="btn btn-default">Save</button></div>
	    	<div class="col-xs-12 col-sm-7"></div>
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