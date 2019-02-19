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
            <div id="qp-gal-img" class="gallery col-xl-12 float-left">

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
		$post_title_len = strlen($post_title);
		$title_length = strlen($post_title);
		if ($title_length > "80") {
			$post_title = substr($post_title, 0, 80) . "...";
		}
		if (has_post_thumbnail()) {
			$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
		} else { $featured_img_url = get_template_directory_uri() . "/img/gal-no-img.jpg";}

		?>
                    <div class="col-xl-4 col-md-6 float-left px-2 mb-2">
                        <a class="pop-up-hover" href="<?php echo $featured_img_url; ?>">
                            <img class="img-fluid qp-gal-img" src="<?php echo $featured_img_url; ?>" alt="<?php echo $post_title; ?>" title="<?php echo $post_title; ?>" />
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
                </div>
                <div class="col-md-2 float-left">
                    <ul id="qp-vid-list" class="list-inline">
                        <li class="qp-vid-item list-inline-item col-4 m-0 float-left text-center my-1 font-weight-bold head-clr">01</li>
                        <li class="qp-vid-item list-inline-item col-4 m-0 float-left text-center my-1 font-weight-bold head-clr">02</li>
                        <li class="qp-vid-item list-inline-item col-4 m-0 float-left text-center my-1 font-weight-bold head-clr">03</li>
                    </ul>
                </div>
            </div>
            <div id="" class="col-xl-12 float-left mt-3">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="center w-100">
                    <?php
$query = new WP_Query(array(
	'post_type' => array('qp_news'),
	'post_status' => 'publish',
	'posts_per_page' => 6,
	'tag' => 'slider-news',
	'orderby' => 'date',
	'order' => 'DESC',
));
if ($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();
		$post_id = get_the_ID();
		$post_title = get_the_title();
		$post_content = get_the_excerpt();
		$post_url = get_the_permalink();
		if (has_post_thumbnail()) {
			$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
		} else { $featured_img_url = get_template_directory_uri() . "/img/gal-no-img.jpg";}
		?>
      <div>
        <div class="news-slider-image w-100">
            <img class="w-100" src="<?php echo $featured_img_url; ?>" alt="<?php echo $post_title; ?>">
             <div class="news-slider-image-content">
                <div class="post-date text-left pb-2 font-weight-light"> <span><?php echo get_the_date('M j, Y'); ?></span></div>
                <h1 class="text-left"><?php echo $post_title; ?></h1>
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

