@extends('layouts.master')
@section('content')
	<section class="section page-hero work-banner">
		  <div class="dark-overlay"></div>
			<div class="content">
				<h1 class="text-center">
				@if(Auth::check())
					@if(Auth::user()->canEdit($profile->individuals_id))
						Edit Profile
					@else
						{{ $profile->display_name }}
					@endif
				@else
					{{ $profile->display_name }}
				@endif
				</h1>
				<hr class="line-lg line-center">
			</div>
		<div class="gradient-overlay"></div>
	</section>
	<section class="section section-page section-white projects">
		<div class="container" style="background-color: #fff;">
			@if(Auth::check())
			@if(Auth::user()->canEdit($profile->individuals_id))
			<div class="student">
				{{ Form::open(['url' => 'profiles/edit/' . $profile->individuals_id, 'files' => 'true']) }}
				    <div class="row">
				    	<div class="col-sm-4 col-sm-offset-4 text-center">
				    		<label for="profile_image_file">
					    		@if(!empty($profile->image->src))
									<div id="profile_image_preview" style="cursor: pointer; border-radius: 50%; width: 200px; height: 200px; background: url('{{ asset('user-profile/image/' . 'lg_' . $profile->image->src) }}') no-repeat center center; background-size: cover; position: relative;">
					    			</div>
					    		@else
					    			<div id="profile_image_preview" style="cursor: pointer; border-radius: 50%; width: 300px; height: 300px; background: #f2f2f2; position: relative;"> <span id="profile_image_preview_text" style="position: absolute; top: 20%; left: 50%; transform: translate(-45%, 50%); font-size: 200%;">Upload Image</span>
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
					<div class="row">

					



						<div class="col-sm-8 col-sm-offset-2">
							<div class="social-media">
					    		<div class="form-group">
					    			<div class="input-group">
					    				<div class="input-group-addon">
							    			<img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />
					    				</div>
					    				{!! Form::text('linkedin_url', !empty($linkedin_url) ? $linkedin_url : "", ['placeholder' => 'Add URL', 'class' => 'form-control']) !!}
					    			</div>
						    	</div>
					    	</div>
					    </div>
					    <div class="col-sm-8 col-sm-offset-2">
							<div class="social-media">
					    		<div class="form-group">
					    			<div class="input-group">
						    			<div class="input-group-addon">
							    			<img class="social-media-btn-img" src="{{ asset('imgs/github.svg' ) }}" alt="linkedin" />
						    			</div>
							    		{!! Form::text('github_url', !empty($github_url) ? $github_url : "", ['placeholder' => 'Add URL', 'class' => 'form-control']) !!}
					    			</div>
					    		</div>
					    	</div>
					    </div>
					    <div class="col-sm-8 col-sm-offset-2">
							<div class="social-media">
					    		<div class="form-group">
					    			<div class="input-group">
					    				<div class="input-group-addon">
							    			<img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="linkedin" />
					    				</div>
							    		{!! Form::text('portfolium_url', !empty($portfolium_url) ? $portfolium_url : "", ['placeholder' => 'Add URL', 'class' => 'form-control']) !!}
					    			</div>
					    		</div>
						    </div>
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<!-- Using social-media class temporarly -->
							<div class="social-media">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-2x fa-graduation-cap"></i>
												</div>
												{!! Form::select('graduation_year', $years, $profile->grad_date, ['placeholder'=> 'Graduation Year', 'class' => 'grad-year-select form-control chosen-select']) !!}
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-2x fa-briefcase"></i>
												</div>
												{!! Form::text('position', $profile->position, ['class' => 'form-control', 'placeholder' => 'Position']) !!}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				    <div class="row">
				    	<div class="col-sm-8 col-sm-offset-2">
					    	<div class="student-seb">
					    		<div class="form-group">
					    	
						    		<label class="student-seb-title">Skills</label>
						    		<ul id="skills_list" class="list-unstyled">
						    			<li>
						    				{!! Form::select('skills[]', $skills, $profile_skills, ['multiple' => '', 'class' => 'chosen-select form-control']) !!}
						    			</li>
						    		</ul>
					    		</div>
					    	</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col-sm-8 col-sm-offset-2">
					    	<div class="form-group">
					    		<label class="student-seb-title">Experience
						    		<button style="background: transparent; border: 0;" id="add_experience">
						    			<i class="fa fa-plus-circle add-seb"></i>
					    			</button>
				    			</label>
				    			@if($profile->experience->count() > 0)
				    				<ul id="experience_list" class="list-unstyled">
				    					@foreach($profile->experience as $exp)
										<li>
											<input type="text" name="experiences[]" value="{{ $exp->experience }}" placeholder="Add experience" class="form-control">
											<button style="background: transparent; border: 0;" id="experiences"><span class="student-seb-list-del">X</span></button>
										</li>
				    					@endforeach
				    				</ul>
								@else
					    		<ul id="experience_list" class="list-unstyled">
					    			<li>
					    				<input type="text" name="experiences[]" placeholder="Add experience" class="form-control">
					    			</li>
					    		</ul>
					    		@endif
					    	</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col-sm-8 col-sm-offset-2">
					    	<div class="student-seb">
					    		<label class="student-seb-title">Education</label>
					    		<ul id="background_list" class="list-unstyled">
					    			<li>
					    				{!! Form::text('background', $profile->background, ['placeholder' => 'Add background', 'class' => 'form-control']) !!}
					    			</li>
					    		</ul>
					    	</div>
				    	</div>
				    </div>
					<div class="row">
						<div class="col-sm-12">
					    	<div class="edit-student-buttons text-center">
						    	<div class="col-xs-4 col-xs-offset-2">
						    		<button id="edit-profile-modal-btn" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Preview</button>
						    	</div>
						   		<div class="col-xs-4">
						   			{!! Form::submit('Save', ['class' => 'btn btn-default']) !!}
						   		</div>
						    </div>
						</div>
				    </div>
			    {!! Form::close() !!}
			</div>
			@else
			<div>
			    <div>
			      <div class="modal-body student lines-back">
			        <div class="row">
			        	<div class="text-center">
			        	@if(!empty($profile->image->src))
						<div id="profile_image_preview" style="border-radius: 50%; width: 200px; height: 200px; background: url('{{ asset('user-profile/image/lg_' . $profile->image->src) }}') no-repeat center center; background-size: cover; position: relative; margin: auto;">
				    	</div>
				    	@else
				    	<img class="student-image product-owner" src="http://placehold.it/200x200" alt="student image">
				    	</div>
				    	@endif
			        	</div>
			        	@if(!empty($linkedin_url) || !empty($portfolium_url) || !empty($github_url))
			        	<div class="row" style="text-align: center; margin-top: 25px;">
			        		<ul class="list-inline list-unstyled">
			        			@if(!empty($linkedin_url))
			        			<li>
				        			<a href="{{ $linkedin_url }}">
				        				<img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />
				        				<p>LinkedIn</p>
				    				</a>
			    				</li>
			        			@endif
			        			@if(!empty($portfolium_url))
			        			<li>
			        				<a href="{{ ($portfolium_url) }}">
			        				<img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="portfolium" />
			        				<p>Portfolium</p>
			    					</a>
			        			</li>
			        			@endif
			        			@if(!empty($github_url))
			        			<li>
			        				<a href="{{ ($github_url) }}">
			        				<img class="social-media-btn-img" src="{{ asset('imgs/github.svg' ) }}" alt="github" />
			        				<p>GitHub</p>
			    					</a>
			        			</li>
			        			@endif
			        		</ul>
			        	</div>
			        	@endif
			        </div>
			        <div class="row">
			        	<div class="col-sm-12 text-center">
			        		<p class="student-name">{{ $profile->display_name }}</p>
		    			</div>
			        </div>
			        <div class="row">
			        	<div class="col-sm-12 text-center"><p class="student-title">{{ $profile->position }}</p></div>
			        </div>
			        @if($profile->grad_date > 0)
			        <div class="row">
			        	<div class="col-sm-12 text-center"><i class="fa fa-graduation-cap student-graduate"></i> <span class="graduates-in">Graduates in {{ $profile->grad_date }}</span></div>
			        </div>
			        @endif
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

			        <div class="row">
			        	<div class="col-sm-1"></div>
			        	<div class="col-sm-10 text-left student-seb">
			        		<h2 class="student-seb-title">Projects</h2>
			        		<ul class="student-seb-list">
			        		@if($profile->filteredProjects()->count() > 0)
			        			@foreach($profile->filteredProjects() as $project)
								<li class="student-seb-list-items">{{ $project->meta->title }} - {{ $project->role_position }}</li>
								@endforeach
			        		@else
								<li class="student-seb-list-items">This individual has not been added to any projects yet.</li>
			        		@endif
			        		</ul>
			        	</div>
			        	<div class="col-sm-1"></div>
			        </div>
			      </div>
			    </div>
			@endif
			@else
			  <div>
			    <div>
			      <div class="modal-body student lines-back">
			        <div class="row">
			        	<div class="text-center">
			        	@if(!empty($profile->image->src))
						<div id="profile_image_preview" style="border-radius: 50%; width: 200px; height: 200px; background: url('{{ asset('user-profile/image/lg_' . $profile->image->src) }}') no-repeat center center; background-size: cover; position: relative; margin: auto;">
				    	</div>
				    	@else
				    	<img class="student-image product-owner" src="http://placehold.it/200x200" alt="student image">
				    	</div>
				    	@endif
			        	</div>
			        	@if(!empty($linkedin_url) || !empty($portfolium_url) || !empty($github_url))
			        	<div class="row" style="text-align: center; margin-top: 25px;">
			        		<ul class="list-inline list-unstyled">
			        			@if(!empty($linkedin_url))
			        			<li>
				        			<a href="{{ $linkedin_url }}">
				        				<img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />
				        				<p>LinkedIn</p>
				    				</a>
			    				</li>
			        			@endif
			        			@if(!empty($portfolium_url))
			        			<li>
			        				<a href="{{ ($portfolium_url) }}">
			        				<img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="portfolium" />
			        				<p>Portfolium</p>
			    					</a>
			        			</li>
			        			@endif
			        			@if(!empty($github_url))
			        			<li>
			        				<a href="{{ ($github_url) }}">
			        				<img class="social-media-btn-img" src="{{ asset('imgs/github.svg' ) }}" alt="github" />
			        				<p>GitHub</p>
			    					</a>
			        			</li>
			        			@endif
			        		</ul>
			        	</div>
			        	@endif
			        </div>
			        <div class="row">
			        	<div class="col-sm-12 text-center">
			        		<p class="student-name">{{ $profile->display_name }}</p>
		    			</div>
			        </div>
			        <div class="row">
			        	<div class="col-sm-12 text-center"><p class="student-title">{{ $profile->position }}</p></div>
			        </div>
			        @if($profile->grad_date > 0)
			        <div class="row">
			        	<div class="col-sm-12 text-center"><i class="fa fa-graduation-cap student-graduate"></i> <span class="graduates-in">Graduates in {{ $profile->grad_date }}</span></div>
			        </div>
			        @endif
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

			        <div class="row">
			        	<div class="col-sm-1"></div>
			        	<div class="col-sm-10 text-left student-seb">
			        		<h2 class="student-seb-title">Projects</h2>
			        		<ul class="student-seb-list">
			        		@if($profile->filteredProjects()->count() > 0)
			        			@foreach($profile->filteredProjects() as $project)
								<li class="student-seb-list-items">{{ $project->meta->title }} - {{ $project->role_position }}</li>
								@endforeach
			        		@else
								<li class="student-seb-list-items">This individual has not been added to any projects yet.</li>
			        		@endif
			        		</ul>
			        	</div>
			        	<div class="col-sm-1"></div>
			        </div>
			      </div>
			    </div>
		@endif
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-body student lines-back">
			        <div class="row">
			        	<div class="col-xs-1"></div>
			        	<div class="col-xs-2 text-right">
			        		<div class="social-media-btn">
			        		@if(!empty($portfolium_url))
			        			<a href="{{ ($portfolium_url) }}">
			        				<img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="portfolium" />
			        				<p>Portfolium</p>
			    				</a>
			    			@endif
							</div>
						</div>
						
			        	<div class="col-xs-6 text-center">
			        	@if(!empty($profile->image->src))
						<div id="profile_image_preview" style="border-radius: 50%; width: 200px; height: 200px; background: url('{{ asset('user-profile/image/lg_' . $profile->image->src) }}') no-repeat center center; background-size: cover; position: relative;">
				    	</div>
				    	@else
				    	<img class="student-image product-owner" src="http://placehold.it/200x200" alt="student image">
				    	</div>
				    	@endif
			        	</div>
			        	<div class="col-xs-2 text-left">
			        		<div class="social-media-btn">
			        		@if(!empty($linkedin_url))
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
			        		<p class="student-name">{{ $profile->display_name }}</p>
		    			</div>
			        </div>
			        <div class="row">
			        	<div class="col-sm-12 text-center"><p class="student-title">{{ $profile->position }}</p></div>
			        </div>
			        <div class="row">
			        	<div class="col-sm-12 text-center"><i class="fa fa-graduation-cap student-graduate"></i> <span class="graduates-in">Graduates in {{ $profile->grad_date }}</span></div>
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
			        		<h2 class="student-seb-title">Education</h2>
			        		<ul class="student-seb-list">
			        		@if($profile->background)
								<li class="student-seb-list-items">{{ $profile->background }}</li>
			        		@else
								<li class="student-seb-list-items">No education added yet</li>
			        		@endif
			        		</ul>
			        	</div>
			        	<div class="col-sm-1"></div>
			        </div>
			      </div>
			    </div>
			</div>
		</div>
	</section>
@endsection