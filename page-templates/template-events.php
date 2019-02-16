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
                                $location = get_post_meta( $post_id, 'event_place', true );
                                $date = get_post_meta( $post_id, 'event_date', true );
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
                <?php   } wp_reset_query(); } ?>
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
                        $query = new WP_Query( array(
                            'post_type' => 'events',
                            'order' => 'DESC',
                            'posts_per_page' => 8,
                            'meta_key' => 'event_date',
                            'meta_query' => array(
                                array(
                                    'key' => 'event_date',
                                    'value' => $today,
                                    'compare' => '<'
                                )
                            ),
                        ) );
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $post_id = get_the_ID();
                                $post_title = get_the_title();
                                $post_content = get_the_excerpt();
                                $post_url = get_the_permalink();
                                $location = get_post_meta( $post_id, 'event_place', true );
                                $date = get_post_meta( $post_id, 'event_date', true );
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
                                <h5 class="font-weight-bold"><a href="#"><?php echo $post_title; ?></a></h5>
                            </div>
                            <a class="readmore-arrow" href=""><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <?php   } wp_reset_query(); } ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();?>