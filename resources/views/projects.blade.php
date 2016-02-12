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
								<span>Coming Soon</span>
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
@endsection