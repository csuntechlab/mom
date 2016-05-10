@extends('layouts.master')
@section('title')
Projects
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
            <div class="admin-nav">
                <ul class="nav">
                    <li>
                        <a class="active" href="{{ url('projects/') }}">
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
                        <a href="{{ url('/logout') }}">
                            <i class="fa fa-sign-out fa-3x"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="projects">
            <div class="text-left">
                <h2>Meta+Lab Projects</h2>  
                <a href="{{ url('projects/create') }}" type="button" class="btn btn-primary">Add a New Project</a>
            </div>
            @if(count($projects))
                <ul class="media-list">
                    @foreach($projects as $project)
                        <li class="media">
                            <div class="media-left">
                                <!-- Add link for project demo here -->
                                <a href="" title="">
                                    @if($project->image)
                                    <div style="background: url({{ asset('imgs/projects/large/' . $project->image->src)  }}); background-size: cover; width: 225px; height: 150px;"></div>
                                    @else
                                    <img class="media-object thumbnail" src="http://placehold.it/225x150" alt="...">
                                    @endif
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-sm-2 pull-right">
                                        <div class="text-right">
                                            <a href="{{ url('projects/' . $project->project_id . '/edit') }}" type="button" class="btn btn-primary">Edit</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <dl class="dl-horizontal">
                                            <dt>Project</dt>
                                            <dd>{{ $project->meta->title }}</dd>
                                            <dt>Start Date</dt>
                                            <dd>{{ $project->start_date->format('m-d-Y') }}</dd>
                                            <dt>End Date</dt>
                                            <dd>{{ $project->end_date ? $project->end_date->format('m-d-Y') : "TBA" }}</dd>
                                            <dt>Product Owner</dt>
                                            <dd> {{ $project->productOwner->display_name or 'Not Assigned'}} </dd>
                                            <dt>Scrum Master</dt>
                                            <dd> {{ $project->scrumMaster->display_name or 'Not Assigned' }} </dd>
                                            <dt>Team Members</dt>
                                            <dd>
                                                @if(count($project->members))
                                                    @for($i=0; $i < count($project->members); $i++)
                                                        {{ $project->members[$i]->display_name }}
                                                        @if($i < count($project->members) - 1)
                                                            {{ '|' }}
                                                        @endif
                                                    @endfor
                                                @else
                                                    Not Assigned
                                                @endif
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@stop