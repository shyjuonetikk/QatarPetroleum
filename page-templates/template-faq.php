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
                <!-- <h1 class="head-search">Search <i class="fa fa-search float-right" aria-hidden="true"></i></h1> -->
                <h1 class="head-search">
                    <form class="col-12 float-left">
                        <input id="faq-search" class="col-10 float-left" type="text" placeholder="Search" name="faq-search" />
                        <button id="faq-submit" type="submit" class="col-2 float-left">
                            <i class="fa fa-search float-right" aria-hidden="true"></i>
                        </button>
                    </form>
                </h1>
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
                    <img style="width: 30%;" class="pt-4" src="<?php echo get_template_directory_uri(); ?>/img/setting.png">

                </div>
                <div class="col-lg-8">
                    <div class="nav-panes" id="nav-job">
                        <h2>Job Offer Process Review</h2>
                        <?php
the_field('job_offer_process_overview_intro');
if (have_rows('job_offer_stages')):
	while (have_rows('job_offer_stages')): the_row();
    echo '<div class="mt-5">';
		echo '<p class="faq-textp">' . get_sub_field('stage_head') . '</p>';
		the_sub_field('stage_description');
    echo '</div>';
	endwhile;
else:
endif;
?>

                        <h4>Related Questions</h4>

                        <!-- Accordion -->
                        <div id="accordion" class="faq-acc">
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                              <div class="card-header" id="heading-1"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-1" class="collapse" data-parent="#accordion" aria-labelledby="heading-1">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                              <div class="card-header" id="heading-2"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="heading-2">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                              <div class="card-header" id="heading-3"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum"?</span>
                              </div>
                            </a>
                            <div id="collapse-3" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                        </div>
                        <!--  -->
                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-theory">
                        <h2>Theory of constraints</h2>
                        <?php the_field('theory_of_constraints');?>
                         <h4>Related Questions</h4>
                        <!-- Accordion -->
                        <div id="accordion2" class="faq-acc">
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-12" aria-expanded="false" aria-controls="collapse-12">
                              <div class="card-header" id="heading-12"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-12" class="collapse" data-parent="#accordion2" aria-labelledby="heading-12">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-22" aria-expanded="false" aria-controls="collapse-22">
                              <div class="card-header" id="heading-22"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-22" class="collapse" data-parent="#accordion2" aria-labelledby="heading-22">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-32" aria-expanded="false" aria-controls="collapse-32">
                              <div class="card-header" id="heading-32"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum"?</span>
                              </div>
                            </a>
                            <div id="collapse-32" class="collapse" data-parent="#accordion2" aria-labelledby="heading-32">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                        </div>
                        <!--  -->
                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-learn">
                        <h2>Learning development</h2>
                       <?php the_field('leading_development_intro');?>
                        <div class="w-100">
                            <a href="<?php the_field('learning_pdf');?>" target="_blank">
                                <div class="border-a">
                                    LEARNING PDF (20MB)
                                </div>
                            </a><br>
                            <a href="<?php the_field('study_development_pdf');?>" target="_blank">
                                <div class="border-a mb-5">
                                    STUDY DEVELOPMENT PDF (12MB)
                                </div>
                            </a>
                        </div>
                         <h4>Related Questions</h4>

                        <!-- Accordion -->
                        <div id="accordion3" class="faq-acc">
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-13" aria-expanded="false" aria-controls="collapse-13">
                              <div class="card-header" id="heading-13"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-13" class="collapse" data-parent="#accordion3" aria-labelledby="heading-13">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-23" aria-expanded="false" aria-controls="collapse-23">
                              <div class="card-header" id="heading-22"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-23" class="collapse" data-parent="#accordion3" aria-labelledby="heading-23">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-33" aria-expanded="false" aria-controls="collapse-33">
                              <div class="card-header" id="heading-33"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum"?</span>
                              </div>
                            </a>
                            <div id="collapse-33" class="collapse" data-parent="#accordion3" aria-labelledby="heading-33">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                        </div>
                        <!--  -->
                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-onboard">
                        <h2>Onboarding</h2>
                        <?php
the_field('onboarding_description_first');
echo '<ol class="faq-textp pb-3 pl-3">';
if (have_rows('onboarding_lists')):
	while (have_rows('onboarding_lists')): the_row();
		echo '<li>' . get_sub_field('onboarding_list_name') . '</li>';
		the_sub_field('stage_description');
	endwhile;
endif;
echo '</ol>';
the_field('onboarding_description_second');
?>
                        <h4>Related Questions</h4>
                        <!-- Accordion -->
                        <div id="accordion4" class="faq-acc">
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-14" aria-expanded="false" aria-controls="collapse-14">
                              <div class="card-header" id="heading-14"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-14" class="collapse" data-parent="#accordion4" aria-labelledby="heading-14">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-24" aria-expanded="false" aria-controls="collapse-24">
                              <div class="card-header" id="heading-24"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-24" class="collapse" data-parent="#accordion4" aria-labelledby="heading-24">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-34" aria-expanded="false" aria-controls="collapse-34">
                              <div class="card-header" id="heading-34"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum"?</span>
                              </div>
                            </a>
                            <div id="collapse-34" class="collapse" data-parent="#accordion4" aria-labelledby="heading-34">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                        </div>
                        <!--  -->
                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-isdn">
                        <h2>ISND & QP Future</h2>
                        <?php the_field('isnd_and_qp_future_description');?>
                         <h4>Related Questions</h4>

                        <!-- Accordion -->
                        <div id="accordion5" class="faq-acc">
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-15" aria-expanded="false" aria-controls="collapse-15">
                              <div class="card-header" id="heading-15"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-15" class="collapse" data-parent="#accordion5" aria-labelledby="heading-15">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-25" aria-expanded="false" aria-controls="collapse-25">
                              <div class="card-header" id="heading-25"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC?</span>
                              </div>
                            </a>
                            <div id="collapse-25" class="collapse" data-parent="#accordion5" aria-labelledby="heading-25">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                          <div class="card my-3">
                            <a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-35" aria-expanded="false" aria-controls="collapse-35">
                              <div class="card-header" id="heading-35"> <span class="mb-0">Section 1.10.32 of "de Finibus Bonorum et Malorum"?</span>
                              </div>
                            </a>
                            <div id="collapse-35" class="collapse" data-parent="#accordion5" aria-labelledby="heading-35">
                              <div class="card-body card-padding h4-p-grey">Suspendisse non consectetur ipsum, in mollis lacus. Sed a sollicitudin elit. Pellentesque in dolor congue, tempor erat nec, sagittis est. Vivamus cursus ante ut tellus ullamcorper accumsan ac sit amet odio. Mauris ac ligula dictum.</div>
                            </div>
                          </div>
                        </div>
                        <!--  -->
                    </div>
                </div>
                <a href="#" id="scroll" style="display: none;"><span></span></a>
            </div>
        </div>
    </section>

<?php get_footer();?>