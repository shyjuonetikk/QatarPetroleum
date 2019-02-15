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
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script> -->
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/simple-lightbox.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script type="text/javascript">
  $jq(window).load(function(){
   // PAGE IS FULLY LOADED
   // FADE OUT YOUR OVERLAYING DIV
  $jq('#overlay').fadeOut();
});
  var $jq = jQuery.noConflict();
   $jq(document).ready(function(){

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

    $jq("#btn-shw").click(function(){

      var post_type = $jq(this).data('post-type');
      var post_per_page = $jq(this).data('posts-per-page');
      var max_pages = $jq(this).data('max-pages');
      var filtertype = $jq("#filter .active").data('filter-type');

      $.post(ajaxUrl,{action:"more_news_ajax",
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
      $.post(ajaxUrl,{action:"news_filter",
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


   });

</script>
</body>

</html>

