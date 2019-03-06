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
                                <?php
                                  $query = new WP_Query(array(
                                              'post_type' => array('faqfilter'),
                                              'post_status' => 'publish',
                                              'posts_per_page' => -1,
                                              'orderby' => 'date',
                                              'order' => 'ASC',
                                            ));
                                  if ($query->have_posts()){
                                    while ($query->have_posts()){
                                      $query->the_post();
                                      $post_id = get_the_ID();
                                      $title = get_the_title();
                                      echo '<li id="job-offer-'.$post_id.'"><a class="nav-link1"><span class="font-weight-bold side-head">' . $title . '</span></a></li>';
                                ?>
                                <script type="text/javascript">
                                  var $jq = jQuery.noConflict();
                                  $jq(document).ready(function(){
                                      $jq("#job-offer-<?php echo $post_id; ?>").click(function() {
                                          $jq('html, body').animate({
                                              scrollTop: $jq("#nav-job-<?php echo $post_id; ?>").offset().top
                                          }, 2000);
                                      });
                                  });
                                </script>
                                <?php  } wp_reset_query(); } ?>
	                            </ul>
                        	</div>
                    </nav>
                    </div>
                    <img style="width: 30%;" class="pt-4" src="<?php echo get_template_directory_uri(); ?>/img/setting.png">
                </div>
                <div class="col-lg-8" id="right-content">
                  <?php
                  $query = new WP_Query(array(
                              'post_type' => array('faqfilter'),
                              'post_status' => 'publish',
                              'posts_per_page' => -1,
                              'orderby' => 'date',
                              'order' => 'ASC',
                            ));

                    if ($query->have_posts()){
                      while ($query->have_posts()){
                        $query->the_post();
                        $post_id = get_the_ID();
                        $title = get_the_title();
                        $post_content = get_the_content();
                    ?>
                    <div class="nav-panes mb-5" id="nav-job-<?php echo $post_id; ?>">
                    <?php
                        echo '<h2>'.$title.'</h2>';
                        echo $post_content;
                        while (have_rows('stages')): the_row();
                            echo '<div class="mt-5">';
                            echo '<p class="faq-textp">' . get_sub_field('stage_name') . '</p>';
                            the_sub_field('stage_description');
                            echo '</div>';
                        endwhile;
                          echo '<div class="w-100">';
                            while (have_rows('pdf_files')): the_row();
                                echo '<a href="'. get_sub_field('pdf_file') .'" target="_blank">';
                                echo '  <div class="border-a">'. get_sub_field('pdf_name') . '</div>';
                                echo '</a><br>';
                            endwhile;
                          echo '</div>';
                          echo '<h4>Related Questions</h4>';
                          echo '<div id="accordion" class="faq-acc">';
                            $i = 1;
                            if (have_rows('question_and_answers')):
                              while (have_rows('question_and_answers')): the_row(); 
                              echo '<div class="card my-3"><a class="collapsed p-grey" role="button" data-toggle="collapse" href="#collapse-'. $i . '" aria-expanded="false" aria-controls="collapse-'. $i . '">';
                              echo '<div class="card-header" id="heading-'. $i . '"> <span class="mb-0">'. get_sub_field('question') . '</span></div></a>';
                              echo '<div id="collapse-'. $i . '" class="collapse" data-parent="#accordion" aria-labelledby="heading-'. $i . '">';
                               echo '<div class="card-body card-padding h4-p-grey">'. get_sub_field('answer') .'</div></div></div>';
                               $i++;
                               endwhile;
                            else:
                            endif; 
                          echo '</div>';
                        echo '</div>';
                      } wp_reset_query(); }
                  ?>
                </div>
                <a href="#" id="scroll" style="display: none;"><span></span></a>
            </div>
        </div>
    </section>
  </div>

<?php get_footer();?>