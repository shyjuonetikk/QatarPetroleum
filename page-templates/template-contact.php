<?php

/**
 * Template Name: QP - Contact Us
 * Description: Template for displaying faq page
 */

get_header();
?>
<section class="p-0">
    <div class="row m-0 p-0">
      <div class="col-12 m-0 p-0 contact-map">
        <a href="<?php the_field('contact_map_link'); ?>" target="_blank"><img class="img-fluid" src="<?php the_field('contact_map'); ?>" /></a>
      </div>
    </div>
    <div class="contact-bg">
      <div class="container">
        <div class="row col-11 contact-info-box mx-auto px-0 mb-3 py-3">
          <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3 p-0 m-0 mx-auto pt-3 pb-1">
	            <div class="phone-icon">
	            	<i class="fas fa-mobile-alt"></i>
	            </div>
	             <div class="phone-num">
	             	<p>HOTLINE</p>
	             	<span><?php the_field('hotline'); ?></span>	
	            </div>
          </div>
          <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 p-0 m-0 mx-auto pt-3 pb-1">
	            <div class="phone-icon ml-5 pl-2">
	            	<i class="far fa-envelope"></i>
	            </div>
	             <div class="phone-num">
	             	<p>EMAIL</p>
	             	<span><?php the_field('email'); ?></span>	
	            </div>
          </div>
          <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 p-0 m-0 mx-auto pt-3 pb-1">
	            <div class="phone-icon ml-5 pl-2">
	            	<i class="fas fa-map-marker-alt"></i>
	            </div>
	             <div class="phone-num">
	             	<p>ADDRESS</p>
	             	<span><?php the_field('address'); ?></span>	
	            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 mx-auto p-5">
          <h1 class="head-clr">Help us serve you better by<br>answering this survey</h1>
          <?php echo do_shortcode('[contact-form-7 id="194" title="Contact form 1"]'); ?>
        </div>
        
      </div>
    </div>
</section>

  

<?php get_footer(); ?>