<?php

/**
 * Template Name: QP - Gallery
 * Description: Template for displaying about page
 */

get_header();
?>

    <section id="qp-img-gallery" class="float-left w-100">
        <div class="container">
            <div class="col-xl-12 p-0">
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
		$title_length = strlen($post_title);
		if ($title_length > "80") {
			$post_title = substr($post_title, 0, 80) . "...";
		}
		if (has_post_thumbnail()) {
			$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
		} else { $featured_img_url = get_template_directory_uri() . "/img/gal-no-img.jpg";}
		?>
                    <div class="col-xl-4 col-md-6 float-left px-2 mb-2 pt-5">
                        <a class="pop-up-hover" href="<?php echo $featured_img_url; ?>">
                            <img class="img-fluid qp-gal-img" src="<?php echo $featured_img_url; ?>" alt="<?php echo $post_title; ?>" title="<?php echo $post_title; ?>" />
                            <!-- <div class="img-hover-icon container w-100 p-0 d-none">
                                <div class="col-12 p-0 w-100 justify-content-center align-self-center text-center">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                            </div> -->
                            <div class="img-hover-icon w-100 p-0">
                                <div class="d-flex container h-100 w-100 p-0">
                                    <div class="col-12 p-0 w-100 justify-content-center align-self-center text-center">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
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
                <a id="qp-img-more" class="hvr-icon-hang" data-id="<?php echo $post_id; ?>" data-max-pages="<?php echo $maxpages; ?>" data-posts-per-page="1">Show More <i class="pl-2 fas fa-long-arrow-alt-down hvr-icon"></i></a>
            </div>
        <?php }} else {echo "<div class='row w-100 pt-4'><h4 class='purple-color m-auto'> No medias found.. </h4></div>";}?>
        </div>
    </section>
    <section id="qp-vid-gallery" class="float-left w-100 grey-bg">
        <div class="container">
            <div id="qp-vid-head" class="col-xl-12 float-left p-0">
                <div class="col-md-10 float-left pl-0">
                    <h2 class="head-clr">Video gallery</h2>
                </div>
            </div>
            <div class="col-xl-12 float-left mt-3 p-0">
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
        if (has_post_thumbnail()) {
            $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
        } else { $featured_img_url = get_template_directory_uri() . "/img/gal-no-img.jpg";}
		?>
                      <div>
                        <div class="w-100">
                            <!-- <!-- <video id="video-active-<?php // echo $post_id; ?>" class="w-100" controls autoplay> -->
                            <!-- <video id="video-active-<?php echo $post_id; ?>" class="d-none">
                                <source src="<?php echo $video; ?>#t=10" type="video/mp4">
                            </video> -->
                            <div class="vid-img-cont">
                            <a href="<?php echo $video; ?>" data-toggle="lightbox">
                                <img src="<?php echo $featured_img_url; ?>" class="img-fluid image">
                                <div class="middle">
                                    <div class="text">
                                        <img src="<?php echo get_template_directory_uri();?>/img/play-icon.png" />
                                    </div>
                                  </div>
                            </a>

                            </div>
                             <div class="news-video-image-content">
                                <h6 class="text-left mt-3 pb-0 mb-0"><?php echo $post_title; ?></h6>
                                <div class="post-date text-left pb-2 font-weight-light head-clr">
                                    <span> Published On: <?php echo get_the_date('M j, Y'); ?></span>
                                    <div><span id="totalTime-<?php echo $post_id; ?>"></span></div>
                                </div>
                             </div>
                        </div>
                      </div>
                    <?php }
	wp_reset_query();}?>
                    </div>
                </div>
            </div>
        </div>
    </section>
     

<?php get_footer();?>

