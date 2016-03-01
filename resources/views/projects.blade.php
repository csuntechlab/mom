@extends('layouts.master')
@section('content')
<?php $i = 1; ?>
<section class="section page-hero work-banner">
	  <div class="dark-overlay"></div>
		<div class="content">
			<h1 class="text-center">Our Work</h1>
			<hr class="line-lg line-center">
		</div>
	<div class="gradient-overlay"></div>
</section>
<section class="section section-page section-white" style="background-image: url({{ asset('/imgs/lines-right-white.png') }}); background-size: contain; background-position: top right; background-repeat: no-repeat;">
	<div class="container">
		<div class="row no-padding">
			<div class="col-xs-6 col-sm-4">
				<h1 class="heading-block">Products</h1>
			</div>
		</div>
		<div class="row no-padding">
			<div id="project{{$i}}" class="projects row-eq-height">
				<div class="col-md-12">
					
					<div class="col-md-4">
						<div class="card card-light" style="background-image: url({{ asset('/imgs/faculty-mobile.png') }});">
							<div class="card-content-xl card-content-action work-block">
								<h2>Metaphor</h2>
								<hr class="line-inline">
								<span>Coming Soon</span>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-light">
							<div class="card-content-xl card-content-action work-block">
								<div class="row">
									<div class="col-md-12">
										<h3>Scope of Work</h3>
									</div>
									<div class="col-md-12">
										<h2 class="small">
											Product Owner
										</h2> 
									</div>									
								</div>	
							</div>
						</div>
					</div>					
					<div class="col-md-4">
						<div class="card card-light">
							<div class="card-content-xl card-content-action">
								<!-- <h2>Members</h2>
								<hr class="line-inline"> -->
								<div class="members">
									<a href="#" class="members--member" data-toggle="modal" data-target="#myModal">
										<img class="members--member-img product-owner" src="http://placehold.it/60x60" alt="student image"><div class="members--member-name">
											Student / Title</div>
									</a>
									<a href="#" class="members--member" data-toggle="modal" data-target="#myModal">
										<img class="members--member-img" src="http://placehold.it/60x60" alt="student image"><div class="members--member-name">Student / Title</div>
									</a>
									<a href="#" class="members--member" data-toggle="modal" data-target="#myModal">
										<img class="members--member-img" src="http://placehold.it/60x60" alt="student image"><div class="members--member-name">Student / Title</div>
									</a>
									<a href="#" class="members--member" data-toggle="modal" data-target="#myModal">
										<img class="members--member-img" src="http://placehold.it/60x60" alt="student image"><div class="members--member-name">Student / Title</div>
									</a>
									<a href="#" class="members--member" data-toggle="modal" data-target="#myModal">
										<img class="members--member-img" src="http://placehold.it/60x60" alt="student image"><div class="members--member-name">Student / Title</div>
									</a>
									<a href="#" class="members--member" data-toggle="modal" data-target="#myModal">
										<img class="members--member-img" src="http://placehold.it/60x60" alt="student image"><div class="members--member-name">Student / Title</div>
									</a>
								</div>
							</div>
						</div>
					</div>
<!-- 					<div class="card card-light">
						<div class="card-content-xl card-content-action work-block product-faculty">
							<h2>Faculty</h2>
							<hr class="line-inline">
							<span>Web Application</span>
							<img src="{{ asset('/imgs/faculty-mobile.png') }}" alt="Faculty Application Mockup">
							<p></p>
							<a class="btn btn-link-default" href="http://www.metalab.csun.edu/faculty/" target="_blank"><button class="btn btn-round-default"><i class="fa fa-plus"></i></button>View</a>
						</div>
					</div> -->

				</div>
<!-- 				<div class="col-sm-6 col-md-4">
					<div class="card card-light">
						<div class="card-content-xl card-content-action work-block product-jewel">
							<h2>Jewel</h2>
							<hr class="line-inline">
							<span>Web Service</span>
							<img src="{{ asset('/imgs/jewel-mockup.png') }}" alt="Jewel Web Service Mockup">
							<p></p>
							<a class="btn btn-link-default" href="https://jewel.ptg.csun.edu/" target="_blank"><button class="btn btn-round-default"><i class="fa fa-plus"></i></button>View</a>
						</div>
					</div>
				</div> -->
				<?php $i++; ?>
			</div>

		</div>

		<!-- Student Modal -->
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
					
		        	<div class="col-xs-6 text-center"><img class="student-image <?php if($productOwner) echo'product-owner' ?>" src="http://placehold.it/200x200" alt="student image"></div>
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
</section>
<script>

var projects = $('.projects').length;

for(i=1; i <= projects; i++){
	var radius = 130;
	var fields = $('#project'+i+' .members--member'), container = $('.members'), width = container.width(), height = container.height();
	var angle = (1.5*Math.PI), step = (2*Math.PI) / fields.length;

	fields.each(function() {
		var cosAngle = Math.cos(angle);
		var sinAngle = Math.sin(angle);

    	var x = Math.round(width/2 + radius * cosAngle - $(this).width()/2);
    	var y = Math.round((height/2) + (radius * sinAngle) - ($(this).height()/2));
    
	
	    $(this).css({
	        left: x + 'px',
	        top: y-25 + 'px'
	    });
	    angle += step;
	});
}


</script>
@endsection