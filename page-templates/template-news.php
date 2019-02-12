<?php

/**
 *  Template Name: QP - News
 * 	Template Description: Template for displaying all news / Home page
 */

get_header();

?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="center w-100">
	  <div>
	  	<img src="<?php echo get_template_directory_uri(); ?>/img/slider.png" alt="Third slide">
	  </div>
	  <div>
	  	<img src="<?php echo get_template_directory_uri(); ?>/img/slider.png" alt="Third slide">
	  </div>
	  <div>
	  	<img src="<?php echo get_template_directory_uri(); ?>/img/slider.png" alt="Third slide">
	  </div>
	  <div>
	  	<img src="<?php echo get_template_directory_uri(); ?>/img/slider.png" alt="Third slide">
	  </div>
	  <div>
	  	<img src="<?php echo get_template_directory_uri(); ?>/img/slider.png" alt="Third slide">
	  </div>
	  <div>
	  	<img src="<?php echo get_template_directory_uri(); ?>/img/slider.png" alt="Third slide">
	  </div>
	</div> 
</div>
<section>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 mx-auto text-center">
          <div class="qp-h-latestnews">
            <div class="qp-h-latestnews-top">
              <h3 class="float-left">Latest news</h3>
              <ul class="float-right nav" id="filter">
                <li class="nav-item active" data-post-type="qp_news" data-filter-type="all" id="filter-type"><a class="nav-link">ALL</a>
                </li>
                <li class="nav-item" id="filter-type" data-post-type="qp_news" data-filter-type="monthly"><a class="nav-link">MONTHLY</a>
                </li>
                <li class="nav-item" id="filter-type" data-post-type="qp_news" data-filter-type="weekly"><a class="nav-link">WEEKLY</a>
                </li>
                <li class="nav-item" id="filter-type" data-post-type="qp_news" data-filter-type="daily"><a class="nav-link">DAILY</a>
                </li>
              </ul>
            </div>
            <div class="clearfix"></div>
        <div id="news-main">
        	<?php
	            $query = new WP_Query(array(
					'post_type' => array('qp_news'),
					'post_status' => 'publish',
					'posts_per_page' => 4,
					'orderby' => 'date',
				    'order' => 'DESC',
				));
				$maxpages = $query->max_num_pages;
            ?>
			<div class="news-container">
            <?php
				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						$post_id = get_the_ID();
						$post_title = get_the_title();
						$post_content = get_the_excerpt();
						$post_url = get_the_permalink();
						if (has_post_thumbnail()) {
							$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
						} else { $featured_img_url = get_template_directory_uri() . "/img/No_image.png";}
			?>
			<div class="qp-h-latestnews-content">
              <div class="row">
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 post-image float-left">
                  <a href="#">
                    <img src="<?php echo $featured_img_url; ?>" class="img-fluid  border-0" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 post-content pt-4">
                  <div class="post-date text-left"> <span><?php echo get_the_date('M j, Y'); ?></span>
                  </div>
                  <h5 class="text-left"><a href="#"><?php echo $post_title; ?></a></h5>
                  <a class="readmore-arrow" href=""><i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
		<?php	} wp_reset_query(); ?>
		</div> <!-- news-container -->
		<hr>
			<?php if ($maxpages > 1) {?>
					<a id="btn-shw" data-post-type="qp_news" data-posts-per-page="1" data-max-pages="<?php echo $maxpages; ?>" class="hvr-icon-wobble-horizontal">Show more <i class="fa fa-arrow-right hvr-icon"></i></a>
				<?php }?>
			<?php } else { echo "<div class='row w-100 pt-4'><h4 class='purple-color m-auto'> No News found.. </h4></div>";} ?>
        </div> <!-- news main -->
      </div>
          <!-- qp-h-latestnews -->
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mx-auto text-center">
           <div class="qp-h-recentnews" >
            <div class="qp-h-recentnews-top">
              <h3 class="float-left">Recent news</h3>
            </div>
            <div class="clearfix"></div>

             <?php

	            $query = new WP_Query(array(
					'post_type' => array('qp_news'),
					'post_status' => 'publish',
					'posts_per_page' => 4,
				));
				$maxpages = $query->max_num_pages;

            ?>

            <?php
				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						$post_id = get_the_ID();
						$post_title = get_the_title();
						$post_content = get_the_excerpt();
						$post_url = get_the_permalink();
						if (has_post_thumbnail()) {
							$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
						} else { $featured_img_url = get_template_directory_uri() . "/img/No_image.png";}
			?>

            <div class="qp-h-recentnews-content">
              <div class="row">
                <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 post-image float-left">
                  <a href="#">
                    <img src="<?php echo$featured_img_url; ?>" class="img-fluid w-100 border-0" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7 post-content pt-1 pl-lg-0 pl-md-0 pl-xl-0">
                  <div class="post-date text-left pb-2"> <span><?php echo get_the_date('M j, Y'); ?></span>
                  </div>
                  <h6 class="text-left font-weight-bold"><a href="#"><?php echo $post_title; ?></a></h6>
                </div>
              </div>
            </div>

            <?php	} wp_reset_query(); } ?>
            
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
