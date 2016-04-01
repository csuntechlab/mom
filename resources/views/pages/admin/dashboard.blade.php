@extends('layouts.master')
@section('title')
Admin Dashboard
@stop
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
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
        		<a href="{{ url('admin/manage-students') }}" type="button" class="btn btn-primary">Manage Students</a>
        		<a href="{{ url('projects/') }}" type="button" class="btn btn-primary">Manage Projects</a>
            </div>
        </div>    
	</div>
@stop