var mom = {
    html: $('html').data('url'),
    token: $('html').data('token'),
};

$.ajaxSetup({
    headers: {
        'X-CSRF-Token': mom.token
    }
});

$(document).ready(function(){
    $(".chosen-select").chosen();
});

$(document).ready(function() {

    var $navigation = $('.navbar-default');
    var $metalablogo = $('.metalab-logo');
    var $website = $('#content');
    var fadeStart = 80;
    var fadeEnd = 250;
    var opacity = 0;

    if (!isMobile()) {
        $(window).scroll(function(e){
            var offset = $(window).scrollTop();
            if(offset <= fadeStart){
                $navigation.css('background-color', 'transparent');
                $metalablogo.css('width', '50%');
                opacity = 1;
            } else if(offset >= 150){
                $navigation.css('background-color', '#151515');
                $metalablogo.css('width', '35%');
            } else if(offset >= fadeStart){
                opacity = 0;
            }
            $('.page-hero h1').css('opacity', opacity);
        });
    }

    $('#toggle-overlay').on('click', function(e){
        e.preventDefault();
        toggleMenu();
    });

    function toggleMenu(){
        $('body').toggleClass('modal-open');
        $('.overlay').toggleClass('active');
        $('#toggle-overlay').toggleClass('active');
        $website.toggleClass('blurry');
    }

    $(function(){
        $('.close').click(function(){
            $('iframe').attr('src', $('iframe').attr('src'));
        });
    });

    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }
    
    $('.sortable-projects' ).sortable();
    $('.sortable-projects .draggable-objects').on('mouseup', function() {
      var itemPositions = [];
      setTimeout(function(){
        for(let listItem of $('.sortable-projects .draggable-objects')){
          var itemId = $(listItem).data('project-id');
          itemPositions.push( itemId );
        }

        var dataItemPositions = { itemPositions };

         $.ajax({
            type: "POST",
            data: dataItemPositions,
            url: mom.html + '/admin/projects/updatepositions',
            success: function(data, textStatus, jqXHR){
        
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(errorThrown);
            },
         });
      }, 100);



    });

    // function toggleVideo(state) {
    //     // if state == 'hide', hide. Else: show video
    //     var div = document.getElementById("videoModal");
    //     var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
    //     div.style.display = state == 'hide' ? 'none' : '';
    //     func = state == 'hide' ? 'pauseVideo' : 'playVideo';
    //     iframe.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
    // }



    // var video = $('#video-source').attr('src', 'http://localhost:8888/metalab-web/wp-content/themes/metalab-v2/assets/vids/Background-Video_1.mp4');

});
