<?php

/**
 * Template Name: QP - Gallery
 * Description: Template for displaying about page
 */

get_header();
?>

    <section id="qp-img-gallery" class="float-left w-100">
        <div class="container">
            <div class="col-xl-12">
                <h2 class="head-clr">Image Gallery</h2>
                <hr>
            </div>
            <div class="gallery col-xl-12 float-left">
              <div class="row" id="qp-gal-img">  
                <?php

// Fetching image gallery

$query = new WP_Query(array(
	'post_type' => 'gallery',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'category_name' => 'image-gallery',
	'orderby' => 'date',
	'order' => 'ASC',
));
$maxpages = $query->max_num_pages;
if ($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();
		$post_id = get_the_ID();
		$post_title = get_the_title();
		if (has_post_thumbnail()) {
			$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
		} else { $featured_img_url = get_template_directory_uri() . "/img/No_image.png";}
		?>
                    <div class="col-xl-4 col-md-6 float-left px-2 mb-2">
                        <a class="pop-up-hover" href="<?php echo $featured_img_url; ?>">
                            <img class="img-fluid qp-gal-img" src="<?php echo $featured_img_url; ?>" alt="<?php echo $post_title; ?>" title="<?php echo $post_title; ?>" />
                            <div class="img-hover-icon container d-flex w-100 p-0 d-none">
                                <div class="col-12 p-0 w-100 justify-content-center align-self-center text-center">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <p class="font-weight-bold"><?php echo $post_title; ?></p>
                    </div>
                <?php }
	wp_reset_query();?>
            </div>
            </div>
            <?php if ($maxpages > 1) {?>
            <div class="col-12 text-center float-left my-4">
                <button id="qp-img-more" class="btn btn-success prm-clr sec-bg px-3 py-1 border-0" data-id="<?php echo $post_id; ?>" data-max-pages="<?php echo $maxpages; ?>" data-posts-per-page="1">Show More</button>
            </div>
        <?php }} else {echo "<div class='row w-100 pt-4'><h4 class='purple-color m-auto'> No medias found.. </h4></div>";}?>
        </div>
    </section>
    <section id="qp-vid-gallery" class="float-left w-100 grey-bg">
        <div class="container">
            <div id="qp-vid-head" class="col-xl-12 float-left">
                <div class="col-md-10 float-left">
                    <h2 class="head-clr">Video gallery</h2>
                </div><!-- 
                <div class="col-md-2 float-left">
                    <ul id="qp-vid-list" class="list-inline">
                        <li class="qp-vid-item list-inline-item col-4 m-0 float-left text-center my-1 font-weight-bold head-clr">01</li>
                        <li class="qp-vid-item list-inline-item col-4 m-0 float-left text-center my-1 font-weight-bold head-clr">02</li>
                        <li class="qp-vid-item list-inline-item col-4 m-0 float-left text-center my-1 font-weight-bold head-clr">03</li>
                    </ul>
                </div> -->
            </div>
            <div id="" class="col-xl-12 float-left mt-3">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="slider w-100">
                    <?php
$query = new WP_Query(array(
	'post_type' => 'gallery',
	'post_status' => 'publish',
	'posts_per_page' => 6,
	'category_name' => 'video-gallery',
	'orderby' => 'date',
	'order' => 'DESC',
));
if ($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();
		$post_id = get_the_ID();
		$post_title = get_the_title();
		$post_url = get_the_permalink();
        $video = get_field('video_file');
		?>
      <div>
        <div class="w-100" id="video_container">
            <video id="video-active" class="w-100" controls autoplay>
              <source src="<?php echo $video; ?>" type="video/mp4">
            </video>
             <div class="news-video-image-content">
                <h6 class="text-left mt-3 pb-0 mb-0"><?php echo $post_title; ?></h6>
                <div class="post-date text-left pb-2 font-weight-light head-clr"> 
                    <span> Published On: <?php echo get_the_date('M j, Y'); ?></span>
                    <div><span id="totalTime"></span></div>
                </div>
             </div>
        </div>
        <script type="text/javascript">
          var $jq = jQuery.noConflict();
            $jq(document).ready(function(){
              var id = $jq('#video_container > video');
              $jq(function() {
                var time = id.get(0).duration;
                var minutes =  Math.floor(time);
                var totaltime = minutes * 1000;
                $jq('#totalTime').html(millisToMinutesAndSeconds(totaltime));
              });
          });

          function millisToMinutesAndSeconds(millis) {
            var minutes = Math.floor(millis / 60000);
            var seconds = ((millis % 60000) / 1000).toFixed(0);
            return "Run time : " + minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
          }
      </script>
      </div>

    <?php } wp_reset_query(); } ?>
        </div>
      </div>
     </div>
    </div>
  </section>

<?php get_footer();?>

