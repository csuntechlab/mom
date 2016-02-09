@extends('layouts.master')

@section('title', 'Student Modal')
@section('description')
  
@endsection

@section('content')

<div class="container">
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  Student modal
	</button>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body student">
	     	<?php $productOwner = true; ?>
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
				
	        	<div class="col-xs-6 text-center"><img class="student-image <?php if($productOwner) echo'product-owner' ?>" src="http://placehold.it/220x220" alt="student image"></div>
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
	<script>
 //    	var studentName = document.getElementById("the-student-name");  
	// 	var studentNameWidth = parseInt(window.getComputedStyle(studentName, null).getPropertyValue("width"));
	// 	alert(studentNameWidth);
	// 	var studentNameRedBorder = document.getElementById("student-name-red-border"); 
	// 	studentNameRedBorder.style.width = studentNameWidth;
    </script>
@endsection

