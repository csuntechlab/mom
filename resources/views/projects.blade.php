@extends('layouts.master')
@section('content')
<?php $y = 1; ?>
<section class="section page-hero work-banner">
	  <div class="dark-overlay"></div>
		<div class="content">
			<h1 class="text-center">Our Work</h1>
			<hr class="line-lg line-center">
		</div>
	<div class="gradient-overlay"></div>
</section>



<section class="section section-page section-white projects " style="background-image: url({{ asset('/imgs/lines-right-white.png') }}); background-size: contain; background-position: top right; background-repeat: no-repeat;">
	<div class="container">
		<div class="row no-padding">
			<div class="col-xs-6 col-sm-6 col-md-4">
				<!--<h1 class=" heading-block display hidden-xs hidden-sm"> -->
				<h1 class=" heading-block display ">Products</h1>
			</div>
		</div>
		<div class="row no-padding">
			<div id="project{{$y}}" class="row-eq-height">
				<div class="col-md-12">
					
					<div class="col-sm-12 col-md-4">
						<div class="card card-light">
							<div class="card-content-xl card-content-action">
								<h2>Metaphor </h2>
								<hr class="line-inline">
								<img src="{{ asset('/imgs/macbook-pro-placeholder.png') }}" alt="Product image" class="img-responsive">
<!-- MOBILE DROPDOWN  -->
								<div class="row hidden-md hidden-lg hidden-xl">
									<div class="col-xs-6">
										Scope of Work
									</div>
									<div class="col-xs-6">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">View+</button>
									</div>
								</div>

								<div class="collapse in hidden-md hidden-lg hidden-xl" id="collapseExample" aria-expanded="true"> 
									<!-- part 1 of well 1 -->
									<div class="well card-dropdown card-light">
										<div class="row">
											<div class="col-xs-7 ">
												<h3>Scope of Work</h3>
											</div>
											<div class="col-xs-12 col-sm-12">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi accusantium illo, nobis nostrum temporibus exercitationem.</p>
											</div>
										</div>
										<!--  part two of first well-->
										<div class="">
											<div class="row">
												<div class="col-xs-7">
													<h2 class="small">
														Product Owner
													</h2> 
												</div>
												<div class="col-xs-7 col-sm-7">
													<img src="http://www.placehold.it/80x80" class="student-image" alt="">
												</div>				
											</div>
										</div>
									</div>

									<div class="well card-dropdown card-light col-xs-12 col-sm-7"> 
										<div class="container">
											<div class="row">
											@for ($i = 0; $i < 5; $i++)

												<div class="col-xs-3 col-xs-offset-3">
													<img class="members--member-img " src="http://placehold.it/60x60" alt="student image">
												</div>
												<div class="col-xs-12">
													<h3 class="small">Student / Title / Full Name {!! $i !!}</h3>
												</div>
											@endfor
											</div>
										</div>
									</div> 

								</div>
								<!-- </div> -->
<!-- END OF MOBILE DROPDOWN  -->
							</div>
						</div>
					</div>
					<div class="col-md-4 hidden-sm hidden-xs">
						<div class="card card-light">
							<div class="card-content-xl card-content-action">
								<div class="row">
									<div class="col-md-12">
										<h3>Scope of Work</h3>
									</div>
									<div class="col-md-12">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi accusantium illo, nobis nostrum temporibus exercitationem.</p>
									</div>
									<div class="col-md-12">
										<h2 class="small">
											Product Owner
										</h2> 
									</div>
									<div class="col-md-12">
										<img src="http://www.placehold.it/80x80" class="student-image" alt="">
									</div>									
								</div>	
							</div>
						</div>
					</div>					
					<div class="col-md-4 hidden-sm hidden-xs">
						<div class="card card-light">
							<div class="card-content-xl card-content-action">
								<!-- <h2>Members</h2>
								<hr class="line-inline"> -->
								<div class="members">
									<a href="#" class="members--member" data-toggle="modal" data-target="#myModal-productOwner">
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
				<?php $y++; ?>
			</div>

		</div>

		<!-- Student Modal -->
		<div class="modal fade" id="myModal-productOwner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
					
		        	<div class="col-xs-6 text-center"><img class="student-image" src="http://placehold.it/200x200" alt="student image"></div>
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

<section class="section section-page section-white projects " style="background-image: url({{ asset('/imgs/lines-right-white.png') }}); background-size: contain; background-position: top right; background-repeat: no-repeat;">
	<div class="container">
		<div class="row no-padding">
			<div class="col-xs-6 col-sm-6 col-md-4">
				<!--<h1 class=" heading-block display hidden-xs hidden-sm"> -->
				<h1 class=" heading-block display ">Products</h1>
			</div>
		</div>
		<div class="row no-padding">
			<div id="project{{$y}}" class="row-eq-height">
				<div class="col-md-12">
					
					<div class="col-sm-12 col-md-4">
						<div class="card card-light">
							<div class="card-content-xl card-content-action">
								<h2>Metaphor </h2>
								<hr class="line-inline">
								<img src="{{ asset('/imgs/macbook-pro-placeholder.png') }}" alt="Product image" class="img-responsive">
<!-- MOBILE DROPDOWN  -->
								<div class="row hidden-md hidden-lg hidden-xl">
									<div class="col-xs-6">
										Scope of Work
									</div>
									<div class="col-xs-6">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">View+</button>
									</div>
								</div>

								<div class="collapse in hidden-md hidden-lg hidden-xl" id="collapseExample" aria-expanded="true"> 
									<!-- part 1 of well 1 -->
									<div class="well card-dropdown card-light">
										<div class="row">
											<div class="col-xs-7 ">
												<h3>Scope of Work</h3>
											</div>
											<div class="col-xs-12 col-sm-12">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi accusantium illo, nobis nostrum temporibus exercitationem.</p>
											</div>
										</div>
										<!--  part two of first well-->
										<div class="">
											<div class="row">
												<div class="col-xs-7">
													<h2 class="small">
														Product Owner
													</h2> 
												</div>
												<div class="col-xs-7 col-sm-7">
													<img src="http://www.placehold.it/80x80" class="student-image" alt="">
												</div>				
											</div>
										</div>
									</div>

									<div class="well card-dropdown card-light col-xs-12 col-sm-7"> 
										<div class="container">
											<div class="row">
											@for ($i = 0; $i < 5; $i++)

												<div class="col-xs-3 col-xs-offset-3">
													<img class="members--member-img " src="http://placehold.it/60x60" alt="student image">
												</div>
												<div class="col-xs-12">
													<h3 class="small">Student / Title / Full Name {!! $i !!}</h3>
												</div>
											@endfor
											</div>
										</div>
									</div> 

								</div>
								<!-- </div> -->
<!-- END OF MOBILE DROPDOWN  -->
							</div>
						</div>
					</div>
					<div class="col-md-4 hidden-sm hidden-xs">
						<div class="card card-light">
							<div class="card-content-xl card-content-action">
								<div class="row">
									<div class="col-md-12">
										<h3>Scope of Work</h3>
									</div>
									<div class="col-md-12">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi accusantium illo, nobis nostrum temporibus exercitationem.</p>
									</div>
									<div class="col-md-12">
										<h2 class="small">
											Product Owner
										</h2> 
									</div>
									<div class="col-md-12">
										<img src="http://www.placehold.it/80x80" class="student-image" alt="">
									</div>									
								</div>	
							</div>
						</div>
					</div>					
					<div class="col-md-4 hidden-sm hidden-xs">
						<div class="card card-light">
							<div class="card-content-xl card-content-action">
								<!-- <h2>Members</h2>
								<hr class="line-inline"> -->
								<div class="members">
									<a href="#" class="members--member" data-toggle="modal" data-target="#myModal-productOwner">
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
				<?php $y++; ?>
			</div>

		</div>

		<!-- Student Modal -->
		<div class="modal fade" id="myModal-productOwner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
					
		        	<div class="col-xs-6 text-center"><img class="student-image" src="http://placehold.it/200x200" alt="student image"></div>
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

for(y=1; y <= projects; y++){
	var radius = 130;
	var fields = $('#project'+y+' .members--member'), container = $('.members'), width = container.width(), height = container.height();
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