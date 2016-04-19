@extends('layouts.master')
@section('title')
Dashboard
@stop
@section('content')
    <section class="section page-hero work-banner">
          <div class="dark-overlay"></div>
            <div class="content">
                <h1 class="text-center">Welcome {{Auth::user()->first_name}}</h1>
                <hr class="line-lg line-center">
            </div>
        <div class="gradient-overlay"></div>
    </section>
    <div class="content-admin">
        <div class="admin-nav">
            <ul class="nav">
                <li>
                    <a href="{{ url('projects/') }}">
                        <i class="fa fa-cubes fa-3x"></i>
                        <span>Projects</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/manage-students') }}">
                        <i class="fa fa-users fa-3x"></i>
                        <span>Students</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/logout') }}">
                        <i class="fa fa-sign-out fa-3x"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@stop