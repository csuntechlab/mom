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
                                    <div class="col-sm-2 pull-right">
                                        <div class="text-right">
                                            <a href="{{ url('project/' . $project->project_id . '/edit') }}" type="button" class="btn btn-primary">Edit</a>
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
                                            <dd>
                                                @if(count($project->productOwner))
                                                    @foreach($project->productOwner as $owner)
                                                        {{ $owner->display_name }}
                                                    @endforeach
                                                @else
                                                    Not Assigned
                                                @endif
                                            </dd>
                                            <dt>Scrum Master</dt>
                                            <dd>
                                                @if(count($project->scrumMaster))  
                                                    @foreach($project->scrumMaster as $master)
                                                       {{ $master->display_name }}
                                                    @endforeach
                                                @else
                                                    Not Assigned
                                                @endif
                                            </dd>
                                            <dt>Team Members</dt>
                                            <dd>
                                                @if(count($project->members))
                                                    <?php $count = 0; ?>
                                                    @foreach ($project->members as $member)
                                                        <?php $count++; ?>
                                                        <span class="team-member-name">{{ $member->display_name }}</span>
                                                        @if($count < $project->members->count())
                                                            {{ '|' }}
                                                        @endif
                                                    @endforeach
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