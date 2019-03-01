//  About Page JS
var $jq = jQuery.noConflict();
$jq(document).ready(function() {
    // Home page tag active on click
    $jq("section").mouseenter(function() {
        var id = $jq(this).attr('id');
        // if( id != "about-cover"){
        //     $jq('.abt-nav-item > a').removeClass('active');
        // }
        // else {
        //     $jq('#msg-ceo-sel').addClass('active'); 
        // }
        $jq('.abt-nav-item > a').removeClass('active');
        $jq("#" + id + "-sel").addClass('active');
    });
    // add border on hover for cover section links
    $jq(".abt-nav-link").hover(function(){
        $jq(this).addClass("active");
    });
    // remove border on hover for cover section links
    $jq(".abt-nav-link").mouseleave(function(){
        var linkId = $jq(this).attr('id');
        if(linkId != "msg-ceo-sel") {
            $jq(this).removeClass("active");
        }
    });
    // Smooth Scroll & offset on scroll
    $jq('a.abt-nav-link').on('click', function(event) {
        event.preventDefault();
        var target = $jq(this.getAttribute('href'));
        if( target.length ) {
            // event.preventDefault();
            $jq('html, body').stop().animate({
                scrollTop: target.offset().top-110
            }, 1000);
        }
    });

    $jq('#overlay').hide();
});

// Image Gallery Plugin
$jq(function(){
    var $gallery = $jq('.gallery > div > div > a').simpleLightbox();
});

// Upcoming events Page JS
$jq(".event-filterlist > li").click(function(){
   $jq(this).addClass('active');
    $jq(".event-filterlist > li").not(this).removeClass('active');
});

// Multimedia page - image hover js
$jq(".pop-up-hover").mouseenter(function(){
    $jq(".img-hover-icon > div, .img-hover-icon, .img-hover-icon > div > i", this).fadeIn();
    // $jq(".img-hover-icon", this).css({"height" : "100%"});
});
$jq(".pop-up-hover").mouseleave(function(){
    // $jq(".img-hover-icon", this).css({"height" : "0"});
    $jq(".img-hover-icon > div, .img-hover-icon, .img-hover-icon > div > i", this).fadeOut();
});


$jq(window).scroll(function() {    
    var scroll = $jq(window).scrollTop();
    if (scroll >= "50") {
        $jq("#qp-sticky").addClass("shadow-sm");
    }
    else{
        $jq("#qp-sticky").removeClass("shadow-sm");
    }
}); //missing );


$jq(document).ready(function(){
    $jq(".qp-gal-vid", this).click(function(e){
        $jq(this).attr("controls", "");
    });

    $jq.expr[':'].contains = function(a, i, m) {
      return $jq(a).text().toUpperCase()
          .indexOf(m[3].toUpperCase()) >= 0;
    };
    var right_content = $jq("#right-content").html();

    $jq("#faq-search").keyup(function(e){
        e.preventDefault();
        var textlen = $jq(this).val().length;
        if(textlen > 3){
            var text = $jq(this).val();
            $jq("#right-content").find('div').hide();
            if(text) {
               $jq("#right-content").find("div:Contains("+text+")").show();
            }
        }
        else{
            $jq("#right-content").html(right_content);
        }
    });
});