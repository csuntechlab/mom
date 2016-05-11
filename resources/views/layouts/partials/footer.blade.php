<section id="footer">
	<section class="section">
		<div class="container">
			<div class="content">
				<div class="footer-logo">
					<img src="{{ asset('imgs/metalab-logo-2.png') }}" alt="meta lab logo">
					<h5>Matador Emerging Technology & Arts</h5>
				</div>
					<hr>
					<div class="row">
					<div class="col-sm-8">
						<ul class="list-inline footer-nav">
							<li>
								<a href="/">Home</a>
							</li>
							<li>
								<a href="/about/">About</a>
							</li>
							<li>
								<a href="/our-team/">Our Team</a>
							</li>
							<li>
								<a href="{{ url('/work') }}">Work</a>
							</li>
							<li>
								<a href="/contact/">Contact</a>
							</li>
							<li>
								<a href="/blog/">Blog</a>
							</li>
							@if(Auth::guest())
								<li><a href="{{ url('/login') }}">Login</a></li>
							@else
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										{{ Auth::user()->first_name }} <span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										@if(Auth::user()->hasRole('admin'))
											<li><a href="{{ url('/admin') }}">Dashboard</a></li>
										@endif
										<li><a href="{{ url('profiles/'. Auth::user()->email_uri) }}">Edit Profile</a></li>
										<li><a href="{{ url('/logout') }}">Logout</a></li>
									</ul>
								</li>
							@endif
						</ul>
					</div>
					<div class="col-sm-4">
						<ul class="list-inline social pull-right">
							<li>
								<a href="https://www.facebook.com/csunmetalab" target="_blank"><img src="{{ asset('/imgs/fb.png') }}" alt="Facebook Icon"></a>
							</li>
							<li>
								<a href="https://twitter.com/csunMetaLab" target="_blank"><img src="{{ asset('/imgs/tw.png') }}" alt="Twitter Icon"></a>
							</li>
							<li>
								<a href="https://instagram.com/csunmetalab/" target="_blank"><img src="{{ asset('/imgs/ig.png') }}" alt="Instagram Icon"></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>


	<div class="gradient-overlay"></div>
	</section>
</section>

</div> <!-- close #content -->

</body>
</html>