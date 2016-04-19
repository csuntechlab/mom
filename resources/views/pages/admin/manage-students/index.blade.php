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
            <div class="admin-nav">
                <ul class="nav">
                    <li>
                        <a href="{{ url('projects/') }}">
                            <i class="fa fa-cubes fa-3x"></i>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li>
                        <a class="active" href="{{ url('admin/manage-students') }}">
                            <i class="fa fa-users fa-3x"></i>
                            <span>Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}">
                            <i class="fa fa-sign-out fa-3x"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form_add">
                    {!! Form::open(['url' => url('admin/manage-students/add'), 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-sm-9 col-xs-12">
                                {!! Form::text('student_id', null, ['placeholder' => 'Student ID', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                {!! Form::submit('Add Student', ['class' => 'btn btn-primary pull-right']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form_remove">
                    {!! Form::open(['url' => url('admin/manage-students/remove'), 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-sm-9 col-xs-12">
                                {!! Form::select('individuals_id', $students, null, ['placeholder' => 'Select Student', 'role' => 'Select Student', 'class' => 'form-control chosen-select']) !!}
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                {!! Form::submit('Remove Student', ['class' => 'btn btn-primary pull-right']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
	</div>
@stop