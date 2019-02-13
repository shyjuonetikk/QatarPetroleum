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

<footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 h-100 text-center text-lg-left my-auto">
          <p class="text-white small mb-lg-0 Copyright">Copyrightⓒ 2019 All right reserved. Qatar Petrol</p>
        </div>
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 h-100 text-center text-lg-right my-auto list-inline">
          <!-- <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="#">JOB PORTAL</a>
            </li>
            <li class="list-inline-item">
            <a href="#">NEWS</a>
            </li>
            <li class="list-inline-item">
              <a href="#">FAQ</a>
            </li>
            <li class="list-inline-item">
            <a href="#">ABOUT QP</a>
            </li>
            <li class="list-inline-item">
              <a href="#">UPCOMING EVENTS</a>
            </li>
            <li class="list-inline-item">
            <a href="#">MULTIMEDIA</a>
            </li>
            <li class="list-inline-item">
              <a href="#">MULTIMEDIA</a>
            </li>
          </ul> -->
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script type="text/javascript">
  $(window).load(function(){
   // PAGE IS FULLY LOADED
   // FADE OUT YOUR OVERLAYING DIV
   $('#overlay').fadeOut();
});
  var $jq = jQuery.noConflict();
   $(document).ready(function(){
      var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
      var page = 1;

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
            slidesToShow: 3
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

    $("#btn-shw").click(function(){

      var post_type = $(this).data('post-type');
      var post_per_page = $(this).data('posts-per-page');
      var max_pages = $(this).data('max-pages');
      var filtertype = $("#filter .active").data('filter-type');

      $.post(ajaxUrl,{action:"more_news_ajax",
        offset: (page * post_per_page) + 1,
        ppp: post_per_page,
        posttype: post_type,
        filtertype: filtertype,
      },
         function(data){
          if(data == ''){
            $("#loading-indicator").toggle();
            $("#btn-shw").hide();
          }
          else{
             page++;
             $(".news-container").append(data);
             $("#loading-indicator").toggle();
             if(max_pages == page){
              $("#btn-shw").hide();
             }else{
              $("#btn-shw").show();
             }
          }
        });

    });

    // filter

    $("#filter li").click(function(){
      $("#btn-shw").show();
      var filtertype = $(this).data('filter-type');
      var post_type = $(this).data('post-type');
      $(this).addClass('active').siblings().removeClass('active');
      $.post(ajaxUrl,{action:"news_filter",
        posttype: post_type,
        filtertype: filtertype,
      },
         function(data){
            $("#loading-indicator").toggle();
            $("#news-main").html(data);
        });
    });

   });

</script>
</body>

</html>

