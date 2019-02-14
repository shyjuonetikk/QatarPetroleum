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
$(function(){
    var $gallery = $('.gallery > div > a').simpleLightbox();

    $gallery.on('show.simplelightbox', function(){
        console.log('Requested for showing');
    })
    .on('shown.simplelightbox', function(){
        console.log('Shown');
    })
    .on('close.simplelightbox', function(){
        console.log('Requested for closing');
    })
    .on('closed.simplelightbox', function(){
        console.log('Closed');
    })
    .on('change.simplelightbox', function(){
        console.log('Requested for change');
    })
    .on('next.simplelightbox', function(){
        console.log('Requested for next');
    })
    .on('prev.simplelightbox', function(){
        console.log('Requested for prev');
    })
    .on('nextImageLoaded.simplelightbox', function(){
        console.log('Next image loaded');
    })
    .on('prevImageLoaded.simplelightbox', function(){
        console.log('Prev image loaded');
    })
    .on('changed.simplelightbox', function(){
        console.log('Image changed');
    })
    .on('nextDone.simplelightbox', function(){
        console.log('Image changed to next');
    })
    .on('prevDone.simplelightbox', function(){
        console.log('Image changed to prev');
    })
    .on('error.simplelightbox', function(e){
        console.log('No image found, go to the next/prev');
        console.log(e);
    });
});

// Upcoming events Page JS
$(".event-filterlist > li").click(function(){
    $(this).addClass('active');
    $(".event-filterlist > li").not(this).removeClass('active');
});