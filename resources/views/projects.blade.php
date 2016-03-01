@extends('layouts.master')
@section('content')

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
			<div class="row-eq-height">
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
							<div class="card-content-xl card-content-action work-block">
								<h2>Members</h2>
								<hr class="line-inline">
								<div class="members">
						<a href="#" class="members--member">
							<img class="members--member-img product-owner" src="http://placehold.it/80x80" alt="student image"><div class="members--member-name">
								Student / Title</div>
						</a>
						<a href="#" class="members--member">
							<img class="members--member-img" src="http://placehold.it/80x80" alt="student image"><div class="members--member-name">Student / Title</div>
						</a>
						<a href="#" class="members--member">
							<img class="members--member-img" src="http://placehold.it/80x80" alt="student image"><div class="members--member-name">Student / Title</div>
						</a>
						<a href="#" class="members--member">
							<img class="members--member-img" src="http://placehold.it/80x80" alt="student image"><div class="members-member--name">Student / Title</div>
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
			</div>

		</div>
	</div>
</section>
<script>

var projects = $('.projects').length;

for(i=1; i <= projects; i++){
	var radius = 135;
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