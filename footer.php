<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package QP
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull');?>

<footer class="footer float-left w-100">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 h-100 text-center text-lg-left my-auto">
          <p class="text-white small mb-lg-0 Copyright">Copyrightⓒ 2019 All right reserved. Qatar Petrol</p>
        </div>
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 h-100 text-center text-lg-right my-auto list-inline">
          <?php
wp_nav_menu(
	array(
		'theme_location' => 'footermenu',
		'fallback_cb' => '',
		'menu' => 'footermenu',
		'menu_class' => 'footer-menu list-inline mb-0',
		'walker' => new Understrap_WP_Bootstrap_Navwalker(),
	)
);
?>
        </div>
      </div>
    </div>
  </footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer();?>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/simple-lightbox.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ekko-lightbox.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5lightbox.js"></script>

<script type="text/javascript">
  var $jq = jQuery.noConflict();
  $jq(window).load(function(){
  $jq('#overlay').fadeOut();
});

   $jq(document).ready(function(){

      var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
      var page = 1;

  // Video Lightbox

  $jq(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $jq(this).ekkoLightbox();
});

    // Slick
    $jq('.center').slick({
      centerMode: true,
      centerPadding: '60px',
      slidesToShow: 3,
      variableWidth: true,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5000,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });

    //slick video

    $jq('.slider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 2,
      customPaging : function(slider, i) {
      var thumb = $jq(slider.$slides[i]).data();
      return '<a>0'+(i+1)+'</a>';
    },
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $jq('.slick-dots > li > a').click(function(){
      $jq(this).addClass('active');
      $jq(".slick-dots > li > a").not(this).removeClass('active');
    });


    $jq("#btn-shw").click(function(){

      var post_type = $jq(this).data('post-type');
      var post_per_page = $jq(this).data('posts-per-page');
      var max_pages = $jq(this).data('max-pages');
      var filtertype = $jq("#filter .active").data('filter-type');

      $jq.post(ajaxUrl,{action:"more_news_ajax",
        offset: (page * post_per_page) + 1,
        ppp: post_per_page,
        posttype: post_type,
        filtertype: filtertype,
      },
         function(data){
          if(data == ''){
            $jq("#loading-indicator").toggle();
            $jq("#btn-shw").hide();
          }
          else{
             page++;
             $jq(".news-container").append(data);
             $jq("#loading-indicator").toggle();
             if(max_pages == page){
              $jq("#btn-shw").hide();
             }else{
              $jq("#btn-shw").show();
             }
          }
        });

    });

    // filter

    $jq("#filter li").click(function(){
      $jq("#btn-shw").show();
      var filtertype =$jq(this).data('filter-type');
      var post_type =$jq(this).data('post-type');
      $jq(this).addClass('active').siblings().removeClass('active');
      $jq.post(ajaxUrl,{action:"news_filter",
        posttype: post_type,
        filtertype: filtertype,
      },
         function(data){
            $jq("#loading-indicator").toggle();
            $jq("#news-main").html(data);
        });
    });

    // FAQ page

      $jq(window).scroll(function(){
          if ($jq(this).scrollTop() > 100) {
              $jq('#scroll').fadeIn();
          } else {
              $jq('#scroll').fadeOut();
          }
      });
      $jq('#scroll').click(function(){
          $jq("html, body").animate({ scrollTop: 0 }, 600);
          return false;
      });

      $jq("#job-offer").click(function() {
          $jq('html, body').animate({
              scrollTop: $jq("#nav-job").offset().top
          }, 2000);
      });

      $jq("#theory").click(function() {
          $jq('html, body').animate({
              scrollTop: $jq("#nav-theory").offset().top
          }, 2000);
      });

      $jq("#learn").click(function() {
          $jq('html, body').animate({
              scrollTop: $jq("#nav-learn").offset().top
          }, 2000);
      });

      $jq("#onboard").click(function() {
          $jq('html, body').animate({
              scrollTop: $jq("#nav-onboard").offset().top
          }, 2000);
      });

      $jq("#isdn").click(function() {
          $jq('html, body').animate({
              scrollTop: $jq("#nav-isdn").offset().top
          }, 2000);
      });

      // Events Page
      $jq(".event-filterlist > li").click(function(){
          $jq(this).addClass('active');
          var eventFilter = $jq(this).data('event-filter');
          $jq(".event-filterlist > li").not(this).removeClass('active');
          $jq.post(ajaxUrl,{action:"events_filter",
            eventfilter: eventFilter,
          },
             function(data){
                $jq('#event-list-inner').html(data);
            });
      });

      // Multimedia page Ajax

      $jq("#qp-img-more").click(function(){
        var id =$jq(this).data('id');
        var max_pages = $jq(this).data('max-pages');
        var post_per_page = $jq(this).data('posts-per-page');
        $jq.post(ajaxUrl,{action:"more_gallery",
          offset: (page * post_per_page) + 1,
          ppp: post_per_page,
          id: id,
        },
           function(data){
              if(data == ''){
                $jq("#loading-indicator").toggle();
                $jq("#qp-img-more").hide();
              }
              else{
                 page++;
                 $jq("#qp-gal-img").append(data);
                 $jq("#loading-indicator").toggle();
                 if(max_pages == page){
                  $jq("#qp-img-more").hide();
                 }else{
                  $jq("#qp-img-more").show();
                 }
              }
          });
      });

      // News Page popup
      $jq(".qp-h-latestnews-content").click(function() {
        var postid = $jq(this).data('post-id');
        $jq.post(ajaxUrl,{action:"newsPopup",
          post_id: postid,
        },
           function(data){
              $jq("html, body").animate({ scrollTop: "0" },500);
              $jq('#qp-news-popup').html(data);
              $jq("#qp-news-popup").fadeIn();
              $jq("body").addClass("modal-open");   
          });
      });
      // To Close new page popup
      $jq("section#qp-news-popup").click(function(e) {
          var container = $jq("section#qp-news-popup > .container");
          $jq(".qp-h-latestnews-content").css({"overflow-y":"visible"});
          if (!container.is(e.target) && container.has(e.target).length === 0) {
              $jq("#qp-news-popup").fadeOut();
              $jq("body").removeClass("modal-open");
          }
      });

      // news popup ends

      // Events Page popup
        $jq(".up-event-list, #past-event-pop, .up-past-block").click(function() {
          var postid = $jq(this).data('post-id');
            eventPopUp(postid);
        });
        // To Close Events page popup
        $jq("#event-news-popup").click(function(e) {
          var postid = $jq(this).data('post-id');
            var container = $jq("#event-news-popup > .container");
            $jq("#event-news-popup").css({"overflow-y":"visible"});
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $jq("#event-news-popup").fadeOut();
                $jq("body").removeClass("modal-open");
            }
            // else{
            //     eventPopUp();
            // }
        });

        function eventPopUp(postid){

          $jq.post(ajaxUrl,{action:"eventsPopup",
            post_id: postid,
          },
             function(data){
                $jq("html, body").animate({ scrollTop: "0" },500);
                $jq("#event-news-popup").css({"overflow-y":"scroll"});
                $jq('#event-news-popup').html(data);
                $jq("#event-news-popup").fadeIn();
                $jq("body").addClass("modal-open");   
            });
        }

      // Events popup ends

   });

</script>
</body>

</html>

