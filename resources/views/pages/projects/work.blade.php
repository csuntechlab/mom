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
                        <h1 class="heading-block project-block">
                        Project
                        </h1>
                    </div>
                </div>
                <div class="row no-padding">
                    <div id="project{{$y}}" class="row-eq-height">
                        <div class="col-xs-12">

                            <div class="col-md-4 col-sm-12 col-xs-12">
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
        <!-- MOBILE DROP DOWN FUNCTIONS done -->
                                        <div class="row hidden-md hidden-lg hidden-xl">
                                            <div class="col-xs-12">
                                                <button class="btn btn--view btn-sm btn-primary center-block" type="button" data-toggle="collapse" data-target="#collapse{{ $y }}" aria-expanded="false" aria-controls="collapseExample">View +</button>
                                            </div>
                                        </div>

                                        <div class="collapse out hidden-md hidden-lg hidden-xl" id="collapse{{ $y }}" aria-expanded="false">
                                            <!-- part 1 of well 1 -->
                                            <div class="work padding well card-dropdown card-light">
                                                <div class="row">
                                                    <div class="col-xs-7 ">
                                                        <h3>Scope of Work</h3>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12">
                                                        <p style="padding-bottom: 1em;">{{$project->meta->description}}</p>
                                                    </div>
                                                </div>
                                                <!--  part two of first well-->
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-xs-6 col-sm-6">
                                                            <p class="work small">Product Owner</p>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-6">
                                                            <p class="work small">Scrum Master</p>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-6">
                                                            <?php $productOwner = "product-owner";
                                                            $productOwnerID = $project->productOwner->user_id;
                                                            $scrumMasterID = $project->scrumMaster->user_id;?>
                                                            @if(!empty($project->productOwner->profile) && !empty($project->productOwner->profile->image))
                                                                <img class="members--member-img" src="{{ asset('user-profile/image/' .'sm_'. $project->productOwner->profile->image->src)}}" alt="{{$project->productOwner->first_name}}">
                                                            @else
                                                                <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$project->productOwner->first_name}}">
                                                            @endif
                                                        </div>
                                                        <div class="col-xs-6 col-sm-6">
                                                            @if(!empty($project->scrumMaster->profile) && !empty($project->scrumMaster->profile->image))
                                                                <img class="members--member-img" src="{{ asset('user-profile/image/' .'sm_'. $project->scrumMaster->profile->image->src)}}" alt="{{$project->scrumMaster->first_name}}">
                                                            @else
                                                                <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$project->scrumMaster->first_name}}">
                                                            @endif
                                                        </div>
                                                        <div class="col-xs-6 col-sm-6">
                                                            <h3 class="small">{{$project->productOwner->first_name}}</h3>
                                                        </div>

                                                        <div class="col-xs-6 col-sm-6">
                                                            <h3 class="small">{{$project->scrumMaster->first_name}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="work well card-dropdown card-light col-xs-12 col-sm-12">
                                                <div class="">

                                                <p class="work small" style="padding-bottom: 1em;">Team Members</p>

                                                @foreach($project->members as $member)
                                                    <div class="row" style="padding-bottom: 1em;">
                                                        <div class="col-xs-6">
                                                            <a href="{{ $member->profile_link }}">
                                                                @if(!empty($member->profile) && !empty($member->profile->image))
                                                                    <img class="members--member-img" src="{{ asset('user-profile/image/' . 'sm_' . $member->profile->image->src)}}" alt="{{$member->first_name}}">
                                                                @else
                                                                   <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$member->first_name}}">
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6" style="padding-top: 0.8em;">
                                                            <h3 class="small">{{$member->first_name}}</h3>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
        <!-- END MOBILE DROPDOWN  -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 hidden-sm hidden-xs">
                                <div class="card card-light">
                                    <div class="card-content-xl card-content-action">
                                        <div class="col-md-12">
                                            <h3>Scope of Work</h3>
                                        </div>
                                        <div class="col-md-12">
                                            <p>{{$project->meta->description}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="small">
                                                Product Owner
                                            </h2>
                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="small">
                                                Scrum Master
                                            </h2>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{$project->productOwner->profile_link}}">
                                                @if(!empty($project->productOwner->profile->image))
                                                    <img class="members--member-img" src="{{ asset('user-profile/image/' . $project->productOwner->profile->image)}}" alt="{{$project->productOwner->first_name}}">
                                                @else
                                                    <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$project->productOwner->first_name}}">
                                                @endif
                                                    <div class="members--member-name">{{$project->productOwner->first_name}}</div>
                                            </a>
                                        </div>
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 hidden-sm hidden-xs">
                                <div class="card card-light">
                                    <div class="card-content-xl card-content-action">
                                        <div class="col-md-12">
                                                <h3>Team Members</h3>
                                            </div>
        <!-- MEMBER DISPLAY FOR IPAD -->
                                         @foreach ($project->members as $member)
                                            <div class="hidden-lg">
                                                <div class="col-md-4">
                                                    <div class="">

                                                      <div class="no-padding">
                                                        <a href="{{ $member->profile_link }}" class="thumbnail">
                                                            @if(!empty($member->profile) && !empty($member->profile->image))
                                                                <img class="members--member-img" src="{{ asset('user-profile/image/' . 'sm_' / $member->profile->image->src)}}" alt="{{$member->first_name}}">
                                                            @else
                                                                <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$member->first_name}}">
                                                            @endif
                                                        </a>
                                                      </div>
        <!--                                               Name -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
        <!-- END FOR IPAD -->
                                        <!-- <h2>Members</h2>
                                        <hr class="line-inline"> -->

                                        <div class="members hidden-xs hidden-md">

                                            @foreach($project->members as $member)
                                            <a href="{{ $member->profile_link }}" class="members--member" >
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
                        </div>
                        <?php $y++; ?>
                    </div>

                </div> <!-- edn of row -->
                <hr class="visible-sm visible-xs hidden-md hidden-lg" />
            </div>
        </section>
    @endif
@endforeach
<div class="text-center">
{{ $projects->links() }}
</div>
<script>

var projects = $('.projects').length;

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
            top: y-25 + 'px'
        });
        angle += step;
    });
}


</script>
@endsection
