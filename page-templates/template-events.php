<?php

/**
 * Template Name: QP - Upcoming Events
 * Description: Template for displaying faq page
 */

get_header();
?>
    <section id="upcoming-events" class="col-xl-12 float-left grey-bg">
        <div class="container">
            <div id="upcoming-head" class="col-xl-12 float-left mb-4 p-0">
                <div class="col-lg-5 float-left pl-0">
                    <h1 class="up-head float-left font-weight-bold">Upcoming Events</h1>
                </div>
                <div class="col-lg-7 float-left">
                    <div class="qp-h-latestnews">
                        <div class="upcoming-nav qp-h-latestnews-top">
                            <ul class="float-right nav event-filterlist">
                                <li class="nav-item active" data-event-filter="all"><a class="nav-link">ALL</a>
                                </li>
                                <li class="nav-item" data-event-filter="monthly"><a class="nav-link">MONTH</a>
                                </li>
                                <li class="nav-item" data-event-filter="week"><a class="nav-link">WEEK</a>
                                </li>
                                <li class="nav-item" data-event-filter="day"><a class="nav-link">DAY</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="upcoming-month" class="col-xl-12 float-left p-0">
                <div class="col-xl-12 float-left p-0" id="event-list-inner">
                    <?php
$query = new WP_Query(array(
	'post_type' => 'events',
	'post_status' => 'publish',
	'posts_per_page' => 6,
	'meta_key' => 'event_date',
	'orderby' => 'meta_value',
	'order' => 'DESC',
));
if ($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();
		$post_id = get_the_ID();
		$post_title = get_the_title();
		$post_content = get_the_excerpt();
		$post_url = get_the_permalink();
		$location = get_post_meta($post_id, 'event_place', true);
		$date = get_post_meta($post_id, 'event_date', true);
		if (has_post_thumbnail()) {
			$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
		} else { $featured_img_url = get_template_directory_uri() . "/img/No_image.png";}
		?>
                    <div class="up-event-list col-xl-12 float-left pl-0 pr-0">
                        <div class="up-txt col-xl-9 pl-0">
                            <h5>
                                <a href="#" class="font-weight-bold"><?php echo $post_title; ?><i class="ml-2 fas fa-arrow-right d-none faa-horizontal animated" aria-hidden="true"></i></a>
                            </h5>
                        </div>
                        <div class="up-tail col-xl-3 pr-0">
                            <div class="up-date">
                                <span class="up-loc"><i class="mr-2 fa fa-map-marker" aria-hidden="true"></i><?php echo $location; ?></span> <?php echo date("M j, Y", strtotime($date)); ?>
                            </div>
                        </div>
                    </div>
                <?php }
	wp_reset_query();}?>
                </div>
            </div>
        </div>
    </section>

    <section id="past-events" class="col-xl-12 m-0 p-0 float-left grey-bg">
        <div class="container">
            <div id="past-head" class="col-xl-12 float-left px-0">
                <h1 class="past-head float-left font-weight-bold w-100 pb-2">Past Events</h1>
            </div>
            <div id="past-content" class="col-xl-12 float-left px-0">
                <div class="row col-lg-12 mx-auto p-0 mt-5">
                    <?php
$today = date('Ymd');
$query = new WP_Query(array(
	'post_type' => 'events',
	'order' => 'DESC',
	'posts_per_page' => 8,
	'meta_key' => 'event_date',
	'meta_query' => array(
		array(
			'key' => 'event_date',
			'value' => $today,
			'compare' => '<',
		),
	),
));
if ($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();
		$post_id = get_the_ID();
		$post_title = get_the_title();
		$post_content = get_the_excerpt();
		$post_url = get_the_permalink();
		$location = get_post_meta($post_id, 'event_place', true);
		$date = get_post_meta($post_id, 'event_date', true);
		if (has_post_thumbnail()) {
			$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
		} else { $featured_img_url = get_template_directory_uri() . "/img/No_image.png";}
		?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 d-flex px-2">
                        <div class="up-past-block">
                            <div class="col-12 float-left px-0 pb-3">
                                <div class="up-past-date col-6 float-left px-0">
                                    <p class="mb-0"><?php echo date("M j, Y", strtotime($date)); ?></p>
                                </div>
                                <div class="up-past-loc col-6 float-left px-0 text-right">
                                    <p class="mb-0"><i class="mr-3 fa fa-map-marker" aria-hidden="true"></i><?php echo $location; ?></p>
                                </div>
                            </div>
                            <div class="up-past-text col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                                <h5 class="font-weight-bold"><a><?php echo $post_title; ?></a></h5>
                            </div>
                            <a id="past-event-pop" class="readmore-arrow"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <?php }
	wp_reset_query();}?>
                </div>
            </div>
        </div>
    </section>

    <section id="event-news-popup" class="bg-news-popup w-100 h-100 float-left">
        <div class="container">
            <div class="row">
                <div class="news-popup w-100 bg-white">
                    <div class="col-10 mx-auto mb-5">
                        <div class="arrow-nav">
                            <div class="go-back float-left"> <a class="btn btn-lg btn-qp qp-theme-bg" href="">go back</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                    <div class="news-popup-image w-100">
                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/img/popup1.png">
                        <div class="up-pop up-popup-image-content">
                            <div class="post-date text-left pb-2 font-weight-light"> <span>FEBRUARY 12,2019</span></div>
                            <h1 class="text-left">Energy Mexico Oil Gas Power <br>2019 Expo & Congress</h1>
                        </div>
                    </div>
                    <div class="container mb-2">
                        <div class="row">
                            <div class="col-lg-12 mx-auto text-center pr-0">
                                <div class="qp-h-latestnews">
                                    <div class="">
                                        <ul class="upop-nav float-right nav">
                                            <li class="nav-item active"><a class="nav-link" href="#">01</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#">02</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#">03</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 mx-auto news-popup-content">
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</p>
                    </div>
                    <div class="container news-popup-latestnews">
                        <div class="row col-lg-12 mx-auto">
                            <div class="col-sm-4 d-flex pl-4 pr-4">
                                <div class="upop card">
                                    <div class="card-body pl-0 pr-0">
                                        <p class="card-header">FEB 27, 2019</p>
                                        <h6 class="card-text"><a href="#"><b>Nigeria International Petroleum Summit(NIPS 2019)</b></a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 d-flex pl-4 pr-4">
                                <div class="upop card">
                                    <div class="card-body pl-0 pr-0">
                                        <p class="card-header">FEB 27, 2019</p>
                                        <h6 class="card-text"><a href="#"><b>Gas to Power APAC Congress (GTP APACCongress)</b></a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 d-flex pl-4 pr-4">
                                <div class="upop card">
                                    <div class="card-body pl-0 pr-0">
                                        <p class="card-header">FEB 27, 2019</p>
                                        <h6 class="card-text"><a href="#"><b>American Petroleum Institute (API) Inspection & Mechanical Integrity Summit</b></a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

<?php get_footer();?>