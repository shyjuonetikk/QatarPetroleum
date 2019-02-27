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
<div id="ful-contr">
<section class="position-relative" id="full-sec" data-spy="scroll" data-target="#myScrollspy" data-offset="100">
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
                <div class="col-lg-8" id="right-content">
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
                        <div class="w-100">
                          <?php
                          if (have_rows('job_file_upload')):
                            while (have_rows('job_file_upload')): the_row(); 

                            echo '<a href="'. get_sub_field('file_link') .'" target="_blank">';
                              echo '  <div class="border-a">'. get_sub_field('file_name') . '</div>';
                            echo '</a><br>';
                             endwhile;
                          else:
                          endif;
                          ?>
                        </div>
                        
                        <h4>Related Questions</h4>

                        <!-- Accordion -->
                        <div id="accordion" class="faq-acc">
                          <?php
                          $i = 1;
                          if (have_rows('job_offer_question_&_answer')):
                            while (have_rows('job_offer_question_&_answer')): the_row(); 
                            echo '<div class="card my-3"><a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-'. $i . '" aria-expanded="false" aria-controls="collapse-'. $i . '">';
                            echo '<div class="card-header" id="heading-'. $i . '"> <span class="mb-0">'. get_sub_field('question') . '</span></div></a>';
                            echo '<div id="collapse-'. $i . '" class="collapse" data-parent="#accordion" aria-labelledby="heading-'. $i . '">';
                             echo '<div class="card-body card-padding h4-p-grey">'. get_sub_field('answer') .'</div></div></div>';
                             $i++;
                             endwhile;
                          else:
                          endif;
                          ?>
                        </div>
                        <!--  -->

                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-theory">
                        <h2>Theory of constraints</h2>
                        <?php the_field('theory_of_constraints');?>

                        <div class="w-100">
                          <?php
                          if (have_rows('theory_of_constraints_file_upload')):
                            while (have_rows('theory_of_constraints_file_upload')): the_row(); 

                            echo '<a href="'. get_sub_field('file_link') .'" target="_blank">';
                              echo '  <div class="border-a">'. get_sub_field('file_name') . '</div>';
                            echo '</a><br>';
                             endwhile;
                          else:
                          endif;
                          ?>
                        </div>

                         <h4>Related Questions</h4>
                        <!-- Accordion -->
                        <div id="accordion2" class="faq-acc">
                          <?php
                          $i = 21;
                          if (have_rows('theory_of_constraints_question_&_answer')):
                            while (have_rows('theory_of_constraints_question_&_answer')): the_row(); 
                            echo '<div class="card my-3"><a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-'. $i . '" aria-expanded="false" aria-controls="collapse-'. $i . '">';
                            echo '<div class="card-header" id="heading-'. $i . '"> <span class="mb-0">'. get_sub_field('question') . '</span></div></a>';
                            echo '<div id="collapse-'. $i . '" class="collapse" data-parent="#accordion2" aria-labelledby="heading-'. $i . '">';
                             echo '<div class="card-body card-padding h4-p-grey">'. get_sub_field('answer') .'</div></div></div>';
                             $i++;
                             endwhile;
                          else:
                          endif;
                          ?>
                        </div>
                        <!--  -->
                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-learn">
                        <h2>Learning development</h2>
                       <?php the_field('leading_development_intro');?>

                        <div class="w-100">
                          <?php
                          if (have_rows('learning_development_file_upload')):
                            while (have_rows('learning_development_file_upload')): the_row(); 

                            echo '<a href="'. get_sub_field('file_link') .'" target="_blank">';
                              echo '  <div class="border-a">'. get_sub_field('file_name') . '</div>';
                            echo '</a><br>';
                             endwhile;
                          else:
                          endif;
                          ?>
                        </div>

                         <h4>Related Questions</h4>
                        <!-- Accordion -->
                        <div id="accordion3" class="faq-acc">
                          <?php
                          $i = 31;
                          if (have_rows('learning_development_question_&_answer')):
                            while (have_rows('learning_development_question_&_answer')): the_row(); 
                            echo '<div class="card my-3"><a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-'. $i . '" aria-expanded="false" aria-controls="collapse-'. $i . '">';
                            echo '<div class="card-header" id="heading-'. $i . '"> <span class="mb-0">'. get_sub_field('question') . '</span></div></a>';
                            echo '<div id="collapse-'. $i . '" class="collapse" data-parent="#accordion3" aria-labelledby="heading-'. $i . '">';
                             echo '<div class="card-body card-padding h4-p-grey">'. get_sub_field('answer') .'</div></div></div>';
                             $i++;
                             endwhile;
                          else:
                          endif;
                          ?>
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
 
                        <div class="w-100">
                          <?php
                          if (have_rows('onboarding_file_upload')):
                            while (have_rows('onboarding_file_upload')): the_row(); 

                            echo '<a href="'. get_sub_field('file_link') .'" target="_blank">';
                              echo '  <div class="border-a">'. get_sub_field('file_name') . '</div>';
                            echo '</a><br>';
                             endwhile;
                          else:
                          endif;
                          ?>
                        </div>

                         <h4>Related Questions</h4>
                        <!-- Accordion -->
                        <div id="accordion4" class="faq-acc">
                          <?php
                          $i = 41;
                          if (have_rows('onboarding_question_&_answer')):
                            while (have_rows('onboarding_question_&_answer')): the_row(); 
                            echo '<div class="card my-3"><a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-'. $i . '" aria-expanded="false" aria-controls="collapse-'. $i . '">';
                            echo '<div class="card-header" id="heading-'. $i . '"> <span class="mb-0">'. get_sub_field('question') . '</span></div></a>';
                            echo '<div id="collapse-'. $i . '" class="collapse" data-parent="#accordion4" aria-labelledby="heading-'. $i . '">';
                             echo '<div class="card-body card-padding h4-p-grey">'. get_sub_field('answer') .'</div></div></div>';
                             $i++;
                             endwhile;
                          else:
                          endif;
                          ?>
                        </div>
                        <!--  -->

                        <hr class="hr-border">
                    </div>
                    <div class="nav-panes" id="nav-isdn">
                        <h2>ISND & QP Future</h2>
                        <?php the_field('isnd_and_qp_future_description');?>

                        <div class="w-100">
                          <?php
                          if (have_rows('isnd_&_qp_future_file_upload')):
                            while (have_rows('isnd_&_qp_future_file_upload')): the_row(); 

                            echo '<a href="'. get_sub_field('file_link') .'" target="_blank">';
                              echo '  <div class="border-a">'. get_sub_field('file_name') . '</div>';
                            echo '</a><br>';
                             endwhile;
                          else:
                          endif;
                          ?>
                        </div>

                         <h4>Related Questions</h4>
                        <!-- Accordion -->
                        <div id="accordion5" class="faq-acc">
                          <?php
                          $i = 51;
                          if (have_rows('isnd_&_qp_future_question_&_answer')):
                            while (have_rows('isnd_&_qp_future_question_&_answer')): the_row(); 
                            echo '<div class="card my-3"><a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-'. $i . '" aria-expanded="false" aria-controls="collapse-'. $i . '">';
                            echo '<div class="card-header" id="heading-'. $i . '"> <span class="mb-0">'. get_sub_field('question') . '</span></div></a>';
                            echo '<div id="collapse-'. $i . '" class="collapse" data-parent="#accordion5" aria-labelledby="heading-'. $i . '">';
                             echo '<div class="card-body card-padding h4-p-grey">'. get_sub_field('answer') .'</div></div></div>';
                             $i++;
                             endwhile;
                          else:
                          endif;
                          ?>
                        </div>
                        <!--  -->
                        <!--  -->
                    </div>
                </div>
                <a href="#" id="scroll" style="display: none;"><span></span></a>
            </div>
        </div>
    </section>
  </div>

<?php get_footer();?>