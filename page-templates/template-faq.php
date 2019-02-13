<?php

/**
 * Template Name: QP - FAQ
 * Description: Template for displaying faq page
 */

get_header();
?>
<header class="faq-hd">
    <div class="container" style="color:#fff">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="faq-how text-lg-left text-center mb-5">how can we help ?</h1>
                <p></p>
            </div>
            <div class="col-lg-6" style="border-bottom:3px solid">
                <h1 class="head-search">Search <i class="fa fa-search float-right" aria-hidden="true"></i></h1>
            </div>
        </div>
    </div>
</header>
<section class="position-relative" data-spy="scroll" data-target="#myScrollspy" data-offset="100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-left mb-5">
                    <h6 class="filter-by">FILTER BY:</h6>
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <nav id="myScrollspy">
                            <div id="MyNavPills">
	                            <ul class="nav nav-pills nav-stacked li-width" id="v-pills-tab" data-spy="affix" data-offset-top="205">
	                                <li class="active" id="job-offer"><a class="nav-link1"><span class="font-weight-bold side-head">JOB OFFFER PROCESS OVERVIEW</span></a></li>
	                                <li id="theory"><a class="nav-link1"><span class="font-weight-bold side-head">THEORY OF CONSTRAINTS</span></a></li>
	                                <li id="learn"><a class="nav-link1"><span class="font-weight-bold side-head">LEARNING & DEVELOPMENT</span></a></li>
	                                <li id="onboard"><a class="nav-link1"><span class="font-weight-bold side-head">ONBOARDING </span></a></li>
	                                <li id="isdn"><a class="nav-link1"><span class="font-weight-bold side-head">ISND & QP FUTURE</span></a></li>
	                            </ul>
                        	</div>
                    </nav>
                    </div>
                    <img style="width: 30%;" class="pt-4" src="<?php echo get_template_directory_uri();?>/img/setting.png">

                </div>
                <div class="col-lg-8">
                    <div class="nav-panes" id="nav-job">
                        <h2>Job Offer Process Review</h2>
                        <?php 
                        	the_field('job_offer_process_overview_intro');
                        	if( have_rows('job_offer_stages') ):
							    while ( have_rows('job_offer_stages') ) : the_row();
							        echo '<p class="faq-textp">'.get_sub_field('stage_head').'</p>';
							        the_sub_field('stage_description');
							    endwhile;
							else :
							endif; 
                        ?>
                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-theory">
                        <h2>Theory of constraints</h2>
                        <?php the_field('theory_of_constraints'); ?>
                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-learn">
                        <h2>Learning development</h2>
                       <?php the_field('leading_development_intro'); ?>
                        <div class="w-100">
                            <a href="<?php the_field('learning_pdf'); ?>" target="_blank">
                                <div class="border-a">
                                    LEARNING PDF (20MB)
                                </div>
                            </a><br>
                            <a href="<?php the_field('study_development_pdf'); ?>" target="_blank">
                                <div class="border-a mb-5">
                                    STUDY DEVELOPMENT PDF (12MB)
                                </div>
                            </a>
                        </div>
                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-onboard">
                        <h2>Onboarding</h2>
                        <?php 
                        	the_field('onboarding_description_first');  
                        	echo '<ol class="faq-textp pb-3 pl-3">';
                        	if( have_rows('onboarding_lists') ):
							    while ( have_rows('onboarding_lists') ) : the_row();
							        echo '<li>'.get_sub_field('onboarding_list_name').'</li>';
							        the_sub_field('stage_description');
							    endwhile;
							endif;
							echo '</ol>';
							the_field('onboarding_description_second');
                        ?>
                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-isdn">
                        <h2>ISND & QP Future</h2>
                        <?php the_field('isnd_and_qp_future_description'); ?>
                    </div>
                </div>
                <a href="#" id="scroll" style="display: none;"><span></span></a>
            </div>
        </div>
    </section>

<?php get_footer(); ?>