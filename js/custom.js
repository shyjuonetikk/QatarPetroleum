//  About Page JS
$(document).ready(function() {
	// Home page tag active on click
    $("section").mouseenter(function() {
        var id = $(this).attr('id');
        if( id != "about-cover"){
        	$('.abt-nav-item > a').removeClass('active');
        }
        else {
        	$('#msg-ceo-sel').addClass('active');	
        }
        $("#" + id + "-sel").addClass('active');
    });
    // add border on hover for cover section links
    $(".abt-nav-link").hover(function(){
    	$(this).addClass("active");
    });
    // remove border on hover for cover section links
    $(".abt-nav-link").mouseleave(function(){
    	var linkId = $(this).attr('id');
    	if(linkId != "msg-ceo-sel") {
    		$(this).removeClass("active");
    	}
    });
    // Smooth Scroll & offset on scroll
    $('a.abt-nav-link').on('click', function(event) {
    	event.preventDefault();
	    var target = $(this.getAttribute('href'));
	    if( target.length ) {
	        // event.preventDefault();
	        $('html, body').stop().animate({
	            scrollTop: target.offset().top-100
	        }, 1000);
	    }
	});
});

// Image Gallery Plugin
jQuery(function(){
    var $gallery = jQuery('.gallery > div > a').simpleLightbox();
});

// Upcoming events Page JS
$(".event-filterlist > li").click(function(){
    $(this).addClass('active');
    $(".event-filterlist > li").not(this).removeClass('active');
});