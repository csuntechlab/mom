@extends('layouts.master')

@section('content')
	 <div class="">
        <section class="section page-hero work-banner">
              <div class="dark-overlay"></div>
                <div class="content">
                    <h1 class="text-center">Welcome {{Auth::user()->first_name}}</h1>
                    <hr class="line-lg line-center">
                </div>
            <div class="gradient-overlay"></div>
        </section>
    </div>

	<div class="container">
		<a href="{{ url('profile/') }}" type="button" class="btn btn-primary">Manage Users</a>
		<a href="{{ url('project/') }}" type="button" class="btn btn-primary">Manage Project</a>
	</div>
@stop