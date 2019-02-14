<?php

/**
 * Template Name: QP - About
 * Description: Template for displaying about page
 */

get_header();
?>
    <section id="about-cover" style="background: url('<?php echo get_template_directory_uri(); ?>/img/about-cover.png') no-repeat;">
        <div id="cover-hgt" class="col-md-9 mx-auto d-flex h-100">
            <div class="row justify-content-left align-self-center">
                <div id="abt-main-head" class="col-12 justify-content-left align-center">
                    <h1 id="about-heading" class="text-white"><?php the_field('banner_heading'); ?></h1>
                </div>
                <div class="col-12 justify-content-left align-self-top">
                    <ul class="about-sect-links float-left w-100 p-0 col-lg-10 col-md-12">
                        <li class="abt-nav-item col-lg-3">
                            <a id="msg-ceo-sel" class="abt-nav-link active" href="#msg-ceo">MESSAGE FROM THE CEO</a>
                        </li>
                        <li class="abt-nav-item col-lg-3 col-md-12">
                            <a id="strat-sec-sel" class="abt-nav-link" href="#strat-sec">VISION STATEMENT</a>
                        </li>
                        <li class="abt-nav-item col-lg-3 col-md-12">
                            <a id="values-sec-sel" class="abt-nav-link" href="#values-sec">STRATEGY AND VALUES</a>
                        </li>
                        <li class="abt-nav-item col-lg-3 col-md-12">
                            <a id="abt-vision-sel" class="abt-nav-link" href="#abt-vision">OUR STRATEGY</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="abt-sec">
        <div class="container">
            <div class="col-md-9 mx-auto">
                <h1 id="abt-desc-title" class="prm-clr"><span class="font-weight-light"><?php the_field('content_heading'); ?></span></h1>
                <p id="border-line" class="w-25 sec-bg"></p>
                <?php the_field('content'); ?>
            </div>
        </div>
    </section>
    <section id="msg-ceo" class="float-left w-100 grey-bg">
        <div class="container">
            <div id="ceo-border" class="col-12 float-left">
            	<div class="col-12 float-left mb-5">
            		<h2 class="head-clr font-weight-bold">Message from CEO</h2>
            	</div>
                <div class="col-xl-6 float-left">
                    <?php

                        $msgceo = get_field('message_from_ceo');
                        $ceo_image = $msgceo['ceo_image'];
                        $ceo_name = $msgceo['ceo_name'];
                        $position = $msgceo['ministry_position'];
                        $designation = $msgceo['designation'];
                        $message = $msgceo['message'];

                    ?>
                    <div class="ceo-image w-100">
                        <img class="w-100" src="<?php echo $ceo_image; ?>">
                         <div class="ceo-content">
                            <h4 class="mb-0"><?php echo $ceo_name; ?></h4>
                            <p class="text-left mb-0"><?php echo $position; ?></p>
                            <p class="text-left mb-0"><?php echo $designation; ?></p>
                         </div>
                    </div>
                </div>
                <div class="col-xl-6 float-left">
                    <div class="ceo-content-desc">
                        <?php echo $message; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="strat-sec" class="float-left w-100 grey-bg pt-0">
        <div class="container">
            <div id="strategy-desc" class="col-12">
                <h2 class="head-clr font-weight-bold">Strategy and Values</h2>
                <?php the_field('strategy_and_values_intro'); ?>
            </div>
    </section>
    <section id="values-sec" class="float-left w-100 grey-bg pt-0">
        <div class="container">
            <div class="col-xl-6 float-left">
                <div class="col-12 value-item-one p-0">
                    <h5 class="values-title prm-clr font-weight-bold">OUR VALUES</h5>
                    <?php 

                        the_field('our_values_intro');
                        if( have_rows('our_values_list') ):
                            while ( have_rows('our_values_list') ) : the_row();
                                echo '<h6>'.get_sub_field('value_name').'</h6>';
                                the_sub_field('value_description');
                            endwhile;
                        else :
                        endif;
                    ?>
                </div>
            </div>
            <div class="col-xl-6 float-left">
                <div class="col-12 value-item-two p-0">
                    <h5 class="values-title prm-clr font-weight-bold">OUR STRATEGY</h5>
                    <?php 
                        the_field('our_strategy_intro');
                        if( have_rows('our_strategy_list') ):
                            echo '<ul id="strat-list">';
                            while ( have_rows('our_strategy_list') ) : the_row();
                                echo '<li>'.get_sub_field('strategy_list_name').'</li>';
                            endwhile;
                        else :
                            echo '</ul>';
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section id="abt-vision" class="float-left w-100 grey-bg pt-0">
        <div class="container">
            <div class="col-12 float-left">
                <h2 class="head-clr font-weight-bold">Vision Statement</h2>
                <?php the_field('vision_statement'); ?>
            </div>
        </div>
    </section>
<?php get_footer();?>


