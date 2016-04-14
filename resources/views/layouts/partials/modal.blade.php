        <?php
            // $member = profile->members;
            $memberID = $member->user_id; 
            $memberIdModal = explode(":", $memberID);

                if($productOwnerID == $memberID){
                    $productOwner = "product-owner";
                }
                else {
                    $productOwner = "";
                }
         ?>
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-body student lines-back">
    <div class="row">
        <div class="col-xs-12 text-center">
            @if(!empty($member->profile) && !empty($member->profile->image))
                <img class="student-image <?php echo $productOwner; ?>" src="{{ asset('user-profile/image/' . $member->profile->image->src)}}" alt="student image">
            @else
                <img class="student-image <?php echo $productOwner; ?>" src="http://www.placehold.it/200x200" alt="student image">
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
    <!-- <div class="row">
        <div class="col-sm-12 text-center"><i class="fa fa-graduation-cap student-graduate"></i> <span class="graduates-in">Graduates in 20XY</span></div>
    </div> -->
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
                    <li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>{{$experience->title}}</li>
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
            <h2 class="student-seb-title">Background</h2>
            <ul class="student-seb-list">
            
                    <li class="student-seb-list-items"><span class="student-seb-list-item-space"></span>{{$member->profile['background']}}</li>
            
            </ul>
        </div>
        <div class="col-sm-1"></div>
    </div>
  </div>
</div>
</div>