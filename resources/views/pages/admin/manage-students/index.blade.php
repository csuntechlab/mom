@extends('layouts.master')
@section('title')
Manage Students
@stop
@section('content')
	 <div class="">
        <section class="section page-hero work-banner">
              <div class="dark-overlay"></div>
                <div class="content">
                    <h1 class="text-center">Manage Students</h1>
                    <hr class="line-lg line-center">
                </div>
            <div class="gradient-overlay"></div>
        </section>
    </div>

	<div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="bk-btn">
                    <a href="{{ url('admin/') }}">
                        <i class="fa fa-arrow-left fa-2x"></i><span> return</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
        		<a href="{{ url('admin/manage-students/add') }}" type="button" class="btn btn-primary">Add Students</a>
        		<a href="{{ url('admin/manage-students/remove') }}" type="button" class="btn btn-primary">Remove Students</a>
            </div>
        </div>
	</div>
@stop