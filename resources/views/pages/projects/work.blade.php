@extends('layouts.master')
@section('title')
Our Work
@stop
@section('content')

<?php $y = 1; ?>

<section class="section page-hero work-banner">
      <div class="dark-overlay"></div>
        <div class="content">
            <h1 class="text-center">Our Work</h1>
            <hr class="line-lg line-center">
        </div>
    <div class="gradient-overlay"></div>
</section>

@foreach($projects as $project)

    @if($project->meta->confidential == 0)
        <section class="section section-page section-white projects" style="background-image: url({{ asset('/imgs/lines-right-white.png') }}); background-size: contain; background-position: top right; background-repeat: no-repeat;">
            <div class="container">
                <div class="row no-padding">
                    <div class="col-xs-6 col-sm-4">
                        @if($y == 1)
                            <h1 class="heading-block project-block">Projects</h1>
                        @endif
                    </div>
                </div>

                <div class="row no-padding">
                    <div id="project{{$y}}" class="row-eq-height">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="card work card-light">
                                <div class="work card-content-xl card-content-action">
                                    <h2 class="project-title">{{ $project->meta->title }}</h2>
                                    <hr class="line-inline">
                                    <a href="{{isset($project->link) ? $project->link->link_url : ''}}">
                                        @if(!empty($project->image))
                                            <img src="{{ asset('imgs/projects/'.$project->image->src)}}" alt="Product image" class="img-responsive">
                                        @else
                                            <img src="{{ asset('imgs/macbook-pro-placeholder.png')}}" alt="" class="img-responsive">
                                        @endif
                                    </a>
                                    <h4 style="color: #333;">Sponsor</h4>
                                    <span>
                                        @if($project->sponsor)
                                        {{ $project->sponsor }}
                                        @else
                                        Meta+Lab
                                        @endif
                                    </span>
                                    <div class="row visible-xs visible-sm">
                                        <div class="col-xs-12">
                                            <button class="btn btn--view btn-sm btn-primary center-block" type="button" data-toggle="collapse" data-target="#collapse{{ $y }}" aria-expanded="false" aria-controls="collapseExample">View +</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-8 project-collapse collapse" id="collapse{{ $y }}">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="card card-light">
                                    <div class="card-content-xl card-content-action">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <h3>Scope of Work</h3>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <p>{{$project->meta->description}}</p>
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <h2 class="small">
                                                    Product Owner
                                                </h2>
                                            </div>
                                            @if($project->scrumMaster->first_name != null)
                                                <div class="col-xs-6 col-md-6">
                                                    <h2 class="small">
                                                        Scrum Master
                                                    </h2>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <a href="{{$project->productOwner->profile_link}}">
                                                    @if(!empty($project->productOwner->profile->image))
                                                        <img class="members--member-img" src="{{ asset('user-profile/image/' . $project->productOwner->profile->image)}}" alt="{{$project->productOwner->first_name}}">
                                                    @else
                                                        <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$project->productOwner->first_name}}">
                                                    @endif
                                                        <div class="members--member-name">{{$project->productOwner->first_name}}</div>
                                                </a>
                                            </div>

                                            @if($project->scrumMaster->first_name != null)
                                                <div class="col-md-6">
                                                    <a href="{{ $project->scrumMaster->profile_link ?: '#' }}">
                                                        @if(!empty($project->scrumMaster->profile->image))
                                                            <img class="members--member-img" src="{{ asset('user-profile/image/' . $project->scrumMaster->profile->image)}}" alt="{{$project->scrumMaster->first_name}}">
                                                        @else
                                                            <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="project-scrum-master">
                                                        @endif
                                                        <div class="members--member-name">
                                                            {{ $project->scrumMaster->first_name or 'N/A' }}
                                                        </div>
                                                    </a>
                                                </div>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="card card-light">
                                    <div class="card-content-xl card-content-action">
                                        <div class="row">
                                            <h3>Team Members</h3>
                                        </div>
                                        <div class="members">
                                            @foreach($project->members as $member)
                                                    <a href="{{ $member->profile_link }}" class="members--member">
                                                    @if(!empty($member->profile) && !empty($member->profile->image))
                                                        <img class="members--member-img" src="{{ asset('user-profile/image/' . 'sm_' . $member->profile->image->src)}}" alt="{{$member->first_name}}">
                                                    @else
                                                        <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$member->first_name}}">
                                                    @endif
                                                    <div class="members--member-name">{{$member->first_name}}</div>
                                                </a>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $y++; ?> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endforeach

<div class="text-center">
    {{ $projects->links() }}
</div>

<script>

var projects = $('.projects').length;


$(document).ready(windowResize);
$(window).resize(windowResize);

function windowResize() {
    if($(window).width() > 991){
        for(y=1; y <= projects; y++){
            var radius = 130;
            var fields = $('#project'+y+' .members--member'), container = $('.members'), width = container.width(), height = container.height();
            var angle = (1.5*Math.PI), step = (2*Math.PI) / fields.length;

            fields.each(function() {
                var cosAngle = Math.cos(angle);
                var sinAngle = Math.sin(angle);

                var x = Math.round(width/2 + radius * cosAngle - $(this).width()/2);
                var y = Math.round((height/2) + (radius * sinAngle) - ($(this).height()/2));

                $(this).css({
                    left: x + 'px',
                    top: y-25 + 'px',
                    width: 100 + 'px'
                }).removeClass('row');
                angle += step;

                $(this).find('div').removeClass('ml100');

            });
        }
    }
    else{
        for(y=1; y <= projects; y++){
            var fields = $('#project'+y+' .members--member');
            var container = $('.members');

            fields.each(function(){
                 $(this).css({
                    width: '100%',
                    left: '0',
                    top: '0',
                 }).addClass('row');

                 $(this).find('div').addClass('ml100');
            });
        }
    }
};

</script>
@endsection
