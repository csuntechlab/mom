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
<section class="section section-page section-white projects" style="background-image: url({{ asset('/imgs/lines-right-white.png') }}); background-size: contain; background-position: top right; background-repeat: no-repeat;">
    <div class="container">
        <div class="row no-padding">
            <div class="col-xs-6 col-sm-4">
                <h1 class="heading-block">Project</h1>
            </div>
        </div>
        <div class="row no-padding">
            <div id="project{{$y}}" class="row-eq-height">
                <div class="col-xs-12">
                    
                    <div class="col-md-4">
                        <div class="card card-light">
                            <div class="card-content-xl card-content-action">
                                <h2>{{ $project->meta->title }}</h2>
                                <hr class="line-inline">
                                @if(!empty($project->image))
                                    <img src="{{ asset('imgs/projects/'.$project->image->src)}}" alt="{{ $project->meta->title }}" class="img-responsive">
                                @else
                                    <img src="{{ asset('imgs/macbook-pro-placeholder.png')}}" alt="{{ $project->meta->title }}" class="img-responsive">
                                @endif
<!-- MOBILE DROP DOWN FUNCTIONS done -->
                                <div class="row hidden-md hidden-lg hidden-xl">
                                    <div class="col-xs-12">
                                        <button class="btn btn--view btn-sm btn-primary center-block" type="button" data-toggle="collapse" data-target="#collapse{{ $y }}" aria-expanded="false" aria-controls="collapseExample">View +</button>
                                    </div>
                                </div>

                                <div class="collapse out hidden-md hidden-lg hidden-xl" id="collapse{{ $y }}" aria-expanded="false"> 
                                    <!-- part 1 of well 1 -->
                                    <div class="padding well card-dropdown card-light">
                                        <div class="row">
                                            <div class="col-xs-7 ">
                                                <h3>Scope of Work</h3>
                                            </div>
                                            <div class="col-xs-12 col-sm-12">
                                                <p>{{$project->meta->description}}</p>
                                            </div>
                                        </div>
                                        <!--  part two of first well-->
                                        <div class="">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <h2 class="small">
                                                        Product Owner
                                                    </h2> 
                                                </div>
                                                <div class="col-xs-6">
                                                    <h2 class="small">
                                                        Scrum Master
                                                    </h2> 
                                                </div>
                                                <div class="col-xs-6 col-sm-6">
                                                    <?php $productOwner = "product-owner";
                                                    $productOwnerID = $project->productOwner->user_id; ?>  
                                                                                                  
                                                    @if(!empty($project->productOwner->profile) && !empty($project->productOwner->profile->image))
                                                        <img class="members--member-img" src="{{ asset('user-profile/image/' . $project->productOwner->profile->image->src)}}" alt="{{$project->productOwner->display_name}}">
                                                    @else
                                                        <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$project->productOwner->display_name}}">
                                                    @endif                                                    
                                                </div> 
                                                <div class="col-xs-6 col-sm-6">                    
                                                    @if(!empty($project->scrumMaster->profile) && !empty($project->scrumMaster->profile->image))
                                                        <img class="members--member-img" src="{{ asset('user-profile/image/' . $project->scrumMaster->profile->image->src)}}" alt="">
                                                    @else
                                                        <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$project->scrumMaster->display_name}}">
                                                    @endif                                                    
                                                </div>
                                                <div class="col-xs-6 col-sm-6">
                                                    <p>{{$project->productOwner->display_name}}</p>
                                                </div>
                                                <div class="col-xs-6 col-sm-6">
                                                    <p>{{$project->scrumMaster->display_name}}</p>
                                                </div> 

                                            </div>
                                        </div>
                                    </div>

                                    <div class="padding well card-dropdown card-light col-xs-12 col-sm-12"> 
                                        <div class="container">
                                        @foreach($project->members as $member)
                                            <div class="row">
                                                <div class="padding col-xs-3 col-xs-offset-3">
                                                    <?php $memberID = $member->user_id; 
                                                    $memberIdModal = explode(":", $memberID); ?>
                                                    <a href="#" data-toggle="modal" data-target="#<?php echo $memberIdModal[1]; ?>">
                                                        @if(!empty($member->profile) && !empty($member->profile->image))
                                                            <img class="members--member-img" src="{{ asset('user-profile/image/' . $member->profile->image->src)}}" alt="">
                                                        @endif 
                                                    </a>                                                     
                                                </div>
                                                <div class="col-xs-12">
                                                    <h3 class="small">{{$member->display_name}}</h3>
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
                                <div class="row ">
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
                                    @if(!empty($project->productOwner->profile) && !empty($project->productOwner->profile->image))
                                        <img class="members--member-img" src="{{ asset('user-profile/image/' . $project->productOwner->profile->image->src)}}" alt="">
                                    @else
                                        <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$project->productOwner->display_name}}">
                                    @endif
                                    </div>  
                                    <div class="col-md-6">
                                    @if(!empty($project->scrumMaster->profile) && !empty($project->scrumMaster->profile->image))
                                        <img class="members--member-img" src="{{ asset('user-profile/image/' . $project->scrumMaster->profile->image->src)}}" alt="">
                                    @else
                                        <img class="members--member-img" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$project->scrumMaster->display_name}}">
                                    @endif
                                    </div>
                                    <div class="col-md-6">
                                        <p class="small">{{$project->productOwner->display_name}}</p>
                                    </div> 
                                    <div class="col-md-6">
                                        <p class="small">{{$project->scrumMaster->display_name}}</p>
                                    </div>                                 
                                </div>  
                            </div>
                        </div>
                    </div>                  
                    <div class="col-md-4 hidden-sm hidden-xs">
                        <div class="card card-light">
                            <div class="card-content-xl card-content-action">
<!-- MEMBER DISPLAY FOR IPAD -->
                                 @foreach ($project->members as $member)
                                    <?php $memberID = $member->user_id; 
                                    $memberIdModal = explode(":", $memberID);

                                    if($productOwnerID == $memberID){
                                        $productOwner = "product-owner";
                                    }
                                    else {
                                        $productOwner = "";
                                    }?>                                
                                    
                                    <div class="hidden-lg">
                                        <div class="col-md-4">
                                            <div class="">
                                              <div class="no-padding">
                                                <a href="#" class="thumbnail">
                                                    @if(!empty($member->profile) && !empty($member->profile->image))
                                                        <img class="members--member-img <?php echo $productOwner; ?>" src="{{ asset('user-profile/image/' . $member->profile->image->src)}}" alt="{{$member->display_name}}">
                                                    @else
                                                        <img class="members--member-img <?php echo $productOwner; ?>" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$member->display_name}}">
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
                                    
                                    <?php $memberID = $member->user_id; 
                                    $memberIdModal = explode(":", $memberID);

                                    if($productOwnerID == $memberID){
                                        $productOwner = "product-owner";
                                    }
                                    else {
                                        $productOwner = "";
                                    }?>

                                    <a href="#" class="members--member" data-toggle="modal" data-target="#<?php echo $memberIdModal[1]; ?>">
                                    @if(!empty($member->profile) && !empty($member->profile->image))
                                        <img class="members--member-img <?php echo $productOwner; ?>" src="{{ asset('user-profile/image/' . $member->profile->image->src)}}" alt="{{$member->display_name}}">
                                    @else
                                        <img class="members--member-img <?php echo $productOwner; ?>" src="{{ asset('/imgs/anonymous.png') }}" alt="{{$member->display_name}}">
                                    @endif
                                    <div class="members--member-name">{{$member->display_name}}</div>
                                    </a>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <?php $y++; ?>
            </div>
        </div> <!-- edn of row --->

        <!-- Student Modal -->
        @foreach($project->members as $member)
        <?php
            $memberID = $member->user_id; 
            $memberIdModal = explode(":", $memberID);

                if($productOwnerID == $memberID){
                    $productOwner = "product-owner";
                }
                else {
                    $productOwner = "";
                }
         ?>
        <div class="modal fade" id="<?php echo $memberIdModal[1]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body student lines-back">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        @if(!empty($member->profile) && !empty($member->profile->image))
                            <img class="student-image <?php echo $productOwner; ?>" src="{{ asset('user-profile/image/' . $member->profile->image->src)}}" alt="student image">
                        @else
                            <img class="student-image <?php echo $productOwner; ?>" src="{{ asset('/imgs/anonymous.png') }}" alt="student image">
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        @if(!empty($member->profile) && !empty($member->profile->links))
                        @foreach($member->profile->links as $link)
                            @if($link->type == 'linkedin' && !empty($link->pivot->link_url))
                            <div class="social-media-btn">
                                <a href="{{$link->pivot->link_url}}">
                                    <img class="social-media-btn-img" src="{{ asset('imgs/linkden.svg' ) }}" alt="linkedin" />
                                    <p>LinkedIn</p>
                                </a>
                            </div>
                            @endif
                            @if($link->type == 'portfolium' && !empty($link->pivot->link_url))
                            <div class="social-media-btn">
                                <a href="{{$link->pivot->link_url}}">
                                    <img class="social-media-btn-img" src="{{ asset('imgs/Hover.svg' ) }}" alt="portfolium" />
                                    <p>Portfolium</p>
                                </a>
                            </div>
                            @endif
                            @if($link->type == 'github' && !empty($link->pivot->link_url))
                                <div class="social-media-btn">
                                <a href="{{$link->pivot->link_url}}">
                                    <img class="social-media-btn-img" src="{{ asset('imgs/github.svg' ) }}" alt="github" />
                                    <p>GitHub</p>
                                </a>
                            </div>
                            @endif
                            @if($link->type == 'website' && !empty($link->pivot->link_url))
                                <div class="social-media-btn">
                                <a href="{{$link->pivot->link_url}}">
                                    <img class="social-media-btn-img" src="{{ asset('imgs/sphere.svg' ) }}" alt="website" />
                                    <p>Website</p>
                                </a>
                            </div>
                            @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="student-name">{{$member->display_name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center"><p class="student-title">{{$member->profile['position']}}</p></div>
                </div>
                @if(!empty($member->profile['grad_date']))
                <div class="row">
                    <div class="col-sm-12 text-center"><i class="fa fa-graduation-cap student-graduate"></i> <span class="graduates-in">Graduates in {{$member->profile['grad_date']}}</span></div>
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10 text-left student-seb">
                        <h2 class="student-seb-title">Skills</h2>
                        <ul class="student-seb-list">
                        @if(!empty($member->profile))
                            @foreach($member->profile->skills as $skill)
                                <li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>{{$skill->title}}</li>
                            @endforeach
                        @else
                            <li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>Student has not registrered any skills.</li>
                        @endif
                        </ul>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10 text-left student-seb">
                        <h2 class="student-seb-title">Experience</h2>
                        <ul class="student-seb-list">
                            @if(!empty($member->profile))
                            @foreach($member->profile->experience as $experience)
                                <li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>{{$experience->experience}}</li>
                            @endforeach
                        @else
                            <li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>Student has not registrered any experience.</li>
                        @endif
                        </ul>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10 text-left student-seb">
                        <h2 class="student-seb-title">Education</h2>
                        <div class="student-seb-list">
                            @if(!empty($member->profile['background']))
                                <li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>{{$member->profile['background']}}</li>
                            @else
                                 <p><span class="student-seb-list-item-space"></span>Student has not registrered any education.</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</section>
@endforeach
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