@extends('layouts.master')

@section('title', 'Student Modal')
@section('description')
  
@endsection

@section('content')

<?php $i = 1; ?>

<div class="container">
	

	<div id="project{{$i}}" class="projects">
		<div class="projects--project-btn">Project Name</div>
		<div class="project">
			<div class="row">
				<div class="col-sm-4">
					<a href="#"><img class="project--img img-responsive" src="http://placehold.it/350x380" alt="product image"></a>
					<a class="project--img-view" href="#">
						<div class="project--img-view-icon">+</div>
						<div class="project--img-view-text">View</div>
					</a>
				</div>
				<div class="col-sm-3">
					<div class="row project-sow">
						<h4>Scope of work</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste odio quidem perspiciatis reiciendis consequatur nostrum sint accusantium dolorum illum tempore alias et praesentium provident omnis cupiditate neque minus, delectus explicabo.</p>
					</div>
					<div class="row project-po">
						<h4>Product Owner</h4>
						<div class="projects-product-owner">
						<div class="col-xs-4">
							<img class="projects-product-owner--image" src="http://placehold.it/80x80" alt="product owner">
							</div>
							<div class="col-xs-8">
								<h5 class="projects-product-owner--name">Firstname Lastname</h5>	
						
								<div class="projects-product-owner--title">Staff</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-sm-5"> 
				<div class="project-members">
					<a href="#" class="project-members--member">
						<img class="project-member--img product-owner" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">
							Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<!-- <a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a> -->
					</div>
				</div>
			</div>
		</div>
		<?php $i++; ?>
	</div>

	<div id="project{{$i}}" class="projects">
		<div class="projects--project-btn">Project Name</div>
		<div class="project">
			<div class="row">
				<div class="col-sm-4">
					<a href="#"><img class="project--img img-responsive" src="http://placehold.it/350x380" alt="product image"></a>
					<a class="project--img-view" href="#">
						<div class="project--img-view-icon">+</div>
						<div class="project--img-view-text">View</div>
					</a>
				</div>
				<div class="col-sm-3">
					<div class="row project-sow">
						<h4>Scope of work</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste odio quidem perspiciatis reiciendis consequatur nostrum sint accusantium dolorum illum tempore alias et praesentium provident omnis cupiditate neque minus, delectus explicabo.</p>
					</div>
					<div class="row project-po">
						<h4>Product Owner</h4>
						<div class="projects-product-owner">
						<div class="col-xs-4">
							<img class="projects-product-owner--image" src="http://placehold.it/80x80" alt="product owner">
							</div>
							<div class="col-xs-8">
								<h5 class="projects-product-owner--name">Firstname Lastname</h5>	
						
								<div class="projects-product-owner--title">Staff</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-sm-5"> 
				<div class="project-members">
					<a href="#" class="project-members--member">
						<img class="project-member--img product-owner" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">
							Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					</div>
				</div>
			</div>
		</div>
		<?php $i++; ?>
	</div>
	<div id="project{{$i}}" class="projects">
		<div class="projects--project-btn">Project Name</div>
		<div class="project">
			<div class="row">
				<div class="col-sm-4">
					<a href="#"><img class="project--img img-responsive" src="http://placehold.it/350x380" alt="product image"></a>
					<a class="project--img-view" href="#">
						<div class="project--img-view-icon">+</div>
						<div class="project--img-view-text">View</div>
					</a>
				</div>
				<div class="col-sm-3">
					<div class="row project-sow">
						<h4>Scope of work</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste odio quidem perspiciatis reiciendis consequatur nostrum sint accusantium dolorum illum tempore alias et praesentium provident omnis cupiditate neque minus, delectus explicabo.</p>
					</div>
					<div class="row project-po">
						<h4>Product Owner</h4>
						<div class="projects-product-owner">
						<div class="col-xs-4">
							<img class="projects-product-owner--image" src="http://placehold.it/80x80" alt="product owner">
							</div>
							<div class="col-xs-8">
								<h5 class="projects-product-owner--name">Firstname Lastname</h5>	
						
								<div class="projects-product-owner--title">Staff</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-sm-5"> 
				<div class="project-members">
					<a href="#" class="project-members--member">
						<img class="project-member--img product-owner" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">
							Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<!-- <a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div>
					</a>
					<a href="#" class="project-members--member">
						<img class="project-member--img" src="http://placehold.it/80x80" alt="student image"><div class="project-member--name">Student / Title</div> -->
					</a>
					</div>
				</div>
			</div>
		</div>
		<?php $i++; ?>
	</div>
</div>

<script>

var projects = $('.projects').length;

for(i=1; i <= projects; i++){
	var radius = 135;
	var fields = $('#project'+i+' .project-members--member'), container = $('.project-members'), width = container.width(), height = container.height();
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
