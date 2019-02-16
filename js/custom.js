//  About Page JS
 var $jq = jQuery.noConflict();
$jq(document).ready(function() {
	// Home page tag active on click
    $jq("section").mouseenter(function() {
        var id = $jq(this).attr('id');
        if( id != "about-cover"){
        	$jq('.abt-nav-item > a').removeClass('active');
        }
        else {
        	$jq('#msg-ceo-sel').addClass('active');	
        }
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
	            scrollTop: target.offset().top-100
	        }, 1000);
	    }
	});

    $jq('#overlay').hide();
});

// Image Gallery Plugin
$jq(function(){
    var $gallery = $jq('.gallery > div > a').simpleLightbox();
});

// Upcoming events Page JS
$jq(".event-filterlist > li").click(function(){
   $jq(this).addClass('active');
    $jq(".event-filterlist > li").not(this).removeClass('active');
});

