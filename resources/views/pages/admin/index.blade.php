@extends('layouts.master')

@section('content')
    <div class="">
        <section class="section page-hero work-banner">
              <div class="dark-overlay"></div>
                <div class="content">
                    <h1 class="text-center">Welcome Yazmin</h1>
                    <hr class="line-lg line-center">
                </div>
            <div class="gradient-overlay"></div>
        </section>
    </div>
    <div class="container">
        <div class="projects">
            <div class="text-left">
                <h2>Meta+Lab Projects</h2>  
                <a href="{{ url('project/create') }}" type="button" class="btn btn-primary">Add a New Project</a>
            </div>
            @if(count($projects))
                <ul class="media-list">
                    @foreach($projects as $project)
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                  <img class="media-object thumbnail" src="http://placehold.it/225x150" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-sm-3 pull-right">
                                        <div class="text-right">
                                            <a href="{{ url('project/' . $project->project_id . '/edit') }}" type="button" class="btn btn-primary">Edit</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <h3 class="media-heading">{{ $project->title }}</h3>
                                        <p class="project-description">{{ $project->description }}</p>
                                        <h4> Team Members: </h4>
                                        <h4> Start: {{ $project->dates->start_date->format('m-d-Y') }}
                                        & End: {{ $project->dates->end_date ? $project->dates->end_date->format('m-d-Y'): date('m-d-Y', strtotime("+30 days"))}}</h4>
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