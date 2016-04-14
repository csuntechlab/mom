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
                <div class="col-md-12">
                    
                    <div class="col-md-4">
                        <div class="card card-light">
                            <div class="card-content-xl card-content-action">
                                <h2>{{ $project->meta->title }}</h2>
                                <hr class="line-inline">
                                <img src="{{ asset('/imgs/macbook-pro-placeholder.png') }}" alt="Product image" class="img-responsive">
                            </div>
                        </div>
                    </div>                   
                    <div class="col-md-4">
                        <div class="card card-light">
                            <div class="card-content-xl card-content-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Scope of Work</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <p>{{$project->meta->description}}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h2 class="small">
                                            Product Owner
                                        </h2> 
                                    </div>
                                    <div class="col-md-6">
                                        @if(!empty($project->productOwner->profile) && !empty($project->productOwner->profile->image))
                                            <a class="modal fade" href="<?php echo $project->productOwner->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <img class="members--member-img" src="{{ asset('user-profile/image/' . $project->productOwner->profile->image->src)}}" alt="Student Image">
                                            </a>
                                            <!-- <div class="members--member-name">{{$project->scrumMaster->profile->name}}</div> -->
                                        @endif
                                    </div>
                                     <div class="col-md-6">
                                        @if(!empty($project->productOwner->profile) && !empty($project->scrumMaster->profile->image))
                                            <a class="modal fade" href="<?php echo $project->scrumMaster->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <img class="members--member-img" src="{{ asset('user-profile/image/' . $project->scrumMaster->profile->image->src)}}" alt="Student Image">
                                            </a>
                                        @endif
                                    </div>                                  
                                </div>  
                            </div>
                        </div>
                    </div>                  
                    <div class="col-md-4">
                        <div class="card card-light">
                            <div class="card-content-xl card-content-action">
                                <!-- <h2>Members</h2>
                                <hr class="line-inline"> -->
                                <div class="members">
                                    <?php $productOwner = "product-owner";
                                    $productOwnerID = $project->productOwner->user_id; ?>

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
                                        <img class="members--member-img <?php echo $productOwner; ?>" src="http://www.placehold.it/50x50" alt="{{$member->display_name}}">
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
        </div>

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
                @include('layouts.partials.modal')
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