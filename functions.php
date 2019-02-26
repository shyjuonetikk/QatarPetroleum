<?php
/**
 * QP functions and definitions
 *
 * @package QP
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php', // Initialize theme default settings.
	'/setup.php', // Theme setup and custom theme supports.
	'/widgets.php', // Register widget area.
	'/enqueue.php', // Enqueue scripts and styles.
	'/template-tags.php', // Custom template tags for this theme.
	'/pagination.php', // Custom pagination for this theme.
	'/hooks.php', // Custom hooks.
	'/extras.php', // Custom functions that act independently of the theme templates.
	'/customizer.php', // Customizer additions.
	'/custom-comments.php', // Custom Comments file.
	'/jetpack.php', // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php', // Load custom WordPress nav walker.
	'/woocommerce.php', // Load WooCommerce functions.
	'/editor.php', // Load Editor functions.
);

foreach ($understrap_includes as $file) {
	$filepath = locate_template('inc' . $file);
	if (!$filepath) {
		trigger_error(sprintf('Error locating /inc%s for inclusion', $file), E_USER_ERROR);
	}
	require_once $filepath;
}

// Hide admin bar for non admin 

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}



// Function for changing the username label from admin side //

add_filter('gettext', 'qpid_gettext', 10, 2);
function qpid_gettext($translation, $original) {
	if ('Username' == $original) {
		return 'Qatar ID';
	}
	return $translation;
}

// Function to change sender name

function wpb_sender_name($original_email_from) {
	return 'Qatar Petroleum';
}
add_filter('wp_mail_from_name', 'wpb_sender_name');

// Function chnage the email body after adding user

// add_filter( 'wp_new_user_notification_email', 'custom_wp_new_user_notification_email', 10, 3 );

// function custom_wp_new_user_notification_email( $wp_new_user_notification_email, $user, $blogname ) {
//     $wp_new_user_notification_email['subject'] = sprintf( 'Registration');
//     $wp_new_user_notification_email['message'] = sprintf( "%s ( %s ) has registerd to your website %s. We recommend you to reset your password for security purpose. Your current password is %s", $user->user_login, $user->user_email, $blogname,$user->plaintext_password );
//     return $wp_new_user_notification_email;
// }

// Load more news

function more_news_ajax() {

	$offset = $_POST["offset"];
	$ppp = 4;
	$postype = $_POST["posttype"];
	$filtertype = $_POST["filtertype"];
	$year = date('Y');
	$month = date('m');
	switch ($filtertype) {
	case "all":
		$query = new WP_Query(array(
			'post_type' => $postype,
			'post_status' => 'publish',
			'tag' => 'latest-news',
			'posts_per_page' => $ppp,
			'paged' => $offset,
		));
		break;
	case "monthly":
		$query = new WP_Query(array(
			'post_type' => $postype,
			'post_status' => 'publish',
			'tag' => 'latest-news',
			'posts_per_page' => $ppp,
			'year=' => $year,
			'monthnum' => $month,
			'paged' => $offset,
		));
		break;
	case "weekly":
		$query = new WP_Query(array(
			'post_type' => $postype,
			'post_status' => 'publish',
			'tag' => 'latest-news',
			'posts_per_page' => $ppp,
			'paged' => $offset,
			'orderby' => 'date',
			'order' => 'DESC',
			'date_query' => array(
				array(
					'after' => '1 week ago',
				),
			),
		));
		break;
	case "daily":
		$day = date('j');
		$query = new WP_Query(array(
			'post_type' => $postype,
			'post_status' => 'publish',
			'tag' => 'latest-news',
			'posts_per_page' => $ppp,
			'paged' => $offset,
			'day' => $day,
			'orderby' => 'date',
			'order' => 'DESC',
		));
		break;
	} // Switch Ends

	if ($query->have_posts()) {

		while ($query->have_posts()) {
			$query->the_post();
			$post_id = get_the_ID();
			$post_title = get_the_title();
			$post_title_len = strlen($post_title);
			$title_length = strlen($post_title);
			if ($title_length > "98") {
				$post_title = substr($post_title, 0, 98) . "...";
			}
			$post_content = get_the_excerpt();
			$post_url = get_the_permalink();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			?>
			<div class="qp-h-latestnews-content" data-post-id="<?php echo $post_id; ?>">
              <div class="row">
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 post-image float-left">
                  <a href="#">
                    <img src="<?php echo $featured_img_url; ?>" class="img-fluid  border-0" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 post-content pt-4">
                  <div class="post-date text-left"> <span><?php echo get_the_date('M j, Y'); ?></span>
                  </div>
                  <h5 class="text-left"><a href="#"><?php echo $post_title; ?></a></h5>
                  <a class="readmore-arrow" href=""><i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
				<?php	}
		wp_reset_query();
	 ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/simple-lightbox.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript">
			var $jq = jQuery.noConflict();
			$jq(document).ready(function(){
				var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
				$jq(".qp-h-latestnews-content").click(function() {
			        var postid = $jq(this).data('post-id');
			        $jq.post(ajaxUrl,{action:"newsPopup",
			          post_id: postid,
			        },
			           function(data){
			              $jq("html, body").animate({ scrollTop: "0" },500);
			              $jq('#qp-news-popup').html(data);
			              $jq("#qp-news-popup").fadeIn();
			              $jq("body").addClass("modal-open");   
			          });
			      });
			});
		</script>
<?php } else {
	}
	exit;
}
add_action('wp_ajax_nopriv_more_news_ajax', 'more_news_ajax');
add_action('wp_ajax_more_news_ajax', 'more_news_ajax');

// filter using types

function news_filter() {
	$filtertype = $_POST['filtertype'];
	$posttype = $_POST['posttype'];
	$ppp = 4;
	$year = date('Y');
	$month = date('m');
	switch ($filtertype) {
	case "all":
		$query = new WP_Query(array(
			'post_type' => $posttype,
			'post_status' => 'publish',
			'tag' => 'latest-news',
			'posts_per_page' => $ppp,
		));
		$maxpages = $query->max_num_pages;
		break;
	case "monthly":
		$query = new WP_Query(array(
			'post_type' => $posttype,
			'post_status' => 'publish',
			'tag' => 'latest-news',
			'posts_per_page' => $ppp,
			'year=' => $year,
			'monthnum' => $month,
		));
		$maxpages = $query->max_num_pages;
		break;
	case "weekly":
		$query = new WP_Query(array(
			'post_type' => $posttype,
			'post_status' => 'publish',
			'tag' => 'latest-news',
			'posts_per_page' => $ppp,
			'orderby' => 'date',
			'order' => 'DESC',
			'date_query' => array(
				array(
					'after' => '1 week ago',
				),
			),
		));
		$maxpages = $query->max_num_pages;
		break;
	case "daily":
		$day = date('j');
		$query = new WP_Query(array(
			'post_type' => $posttype,
			'post_status' => 'publish',
			'tag' => 'latest-news',
			'posts_per_page' => $ppp,
			'day' => $day,
			'orderby' => 'date',
			'order' => 'DESC',
		));
		$maxpages = $query->max_num_pages;
		break;
	} // Switch Ends

	echo '<div class="news-container">';
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$post_id = get_the_ID();
			$post_title = get_the_title();
			$post_title_len = strlen($post_title);
			$title_length = strlen($post_title);
			if ($title_length > "98") {
				$post_title = substr($post_title, 0, 98) . "...";
			}
			$post_content = get_the_excerpt();
			$post_url = get_the_permalink();
			if (has_post_thumbnail()) {
				$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
			} else {
				$featured_img_url = get_template_directory_uri() . "/img/no-news-cover.jpg";
			}
			?>
			<div class="qp-h-latestnews-content" data-post-id="<?php echo $post_id; ?>">
              <div class="row">
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 post-image float-left">
                  <a href="#">
                    <img src="<?php echo $featured_img_url; ?>" class="img-fluid  border-0" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 post-content pt-4">
                  <div class="post-date text-left"> <span><?php echo get_the_date('M j, Y'); ?></span>
                  </div>
                  <h5 class="text-left"><a href="#"><?php echo $post_title; ?></a></h5>
                  <a class="readmore-arrow" href=""><i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
		<?php	}
		wp_reset_query();?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/simple-lightbox.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
			<script type="text/javascript">
				var $jq = jQuery.noConflict();
				$jq(document).ready(function(){
					var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
					$jq(".qp-h-latestnews-content").click(function() {
				        var postid = $jq(this).data('post-id');
				        $jq.post(ajaxUrl,{action:"newsPopup",
				          post_id: postid,
				        },
				           function(data){
				              $jq("html, body").animate({ scrollTop: "0" },500);
				              $jq('#qp-news-popup').html(data);
				              $jq("#qp-news-popup").fadeIn();
				              $jq("body").addClass("modal-open");   
				          });
				      });
				});
			</script>
		</div> <!-- news-container -->
		<hr>
			<?php if ($maxpages > 1) {?>
					<a id="btn-shw" data-post-type="qp_news" data-posts-per-page="1" data-max-pages="<?php echo $maxpages; ?>" class="hvr-icon-hang">Show more <i class="pl-2 fas fa-long-arrow-alt-down hvr-icon"></i></a>
				<?php }?>
			<?php } else {echo "<div class='row w-100 pt-4'><h4 class='purple-color m-auto'> No News found.. </h4></div>";}?>

<script type="text/javascript">
   $(document).ready(function(){
      var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
      var page = 1;

    $("#btn-shw").click(function(){

      var post_type = $(this).data('post-type');
      var post_per_page = $(this).data('posts-per-page');
      var max_pages = $(this).data('max-pages');
      var filtertype = $("#filter .active").data('filter-type');

      $.post(ajaxUrl,{action:"more_news_ajax",
        offset: (page * post_per_page) + 1,
        ppp: post_per_page,
        posttype: post_type,
        filtertype: filtertype,
      },
         function(data){
          if(data == ''){
            $("#loading-indicator").toggle();
            $("#btn-shw").hide();
          }
          else{
             page++;
             $(".news-container").append(data);
             $("#loading-indicator").toggle();
             if(max_pages == page){
              $("#btn-shw").hide();
             }else{
              $("#btn-shw").show();
             }
          }
        });

    });
   });

</script>
<?php exit;}

add_action('wp_ajax_nopriv_news_filter', 'news_filter');
add_action('wp_ajax_news_filter', 'news_filter');

// Events filter

function events_filter() {
	$eventFilter = $_POST['eventfilter'];
	switch ($eventFilter) {
	case "all":
		$query = new WP_Query(array(
			'post_type' => 'events',
			'post_status' => 'publish',
			'posts_per_page' => 6,
			'meta_key' => 'event_date',
			'orderby' => 'meta_value',
			'order' => 'DESC',
		));
		break;
	case "monthly":
		$month = date('m');
		$query = new WP_Query(array(
			'post_type' => 'events',
			'post_status' => 'publish',
			'posts_per_page' => 6,
			'meta_key' => 'event_date',
			'meta_query' => array(
				array(
					'key' => 'event_date',
					'value' => $month,
					'compare' => 'LIKE',
					'type' => 'DATE',
				),
			),
			'order' => 'DESC',
		));
		break;

	case "week":
		$day = date('w');
		$week_start = date('Ymd', strtotime('-' . $day . ' days'));
		$week_end = date('Ymd', strtotime('+' . (6 - $day) . ' days'));
		$query = new WP_Query(array(
			'post_type' => 'events',
			'order' => 'DESC',
			'posts_per_page' => 8,
			'meta_query' => array(
				array(
					'key' => 'event_date',
					'compare' => '>=',
					'value' => $week_start,
				),
				array(
					'key' => 'event_end_date',
					'compare' => '<=',
					'value' => $week_end,
				),
			),
		));
		break;

	case "day":
		$today = date('Ymd');
		$query = new WP_Query(array(
			'post_type' => 'events',
			'order' => 'DESC',
			'posts_per_page' => 5,
			'meta_key' => 'event_date',
			'meta_query' => array(
				array(
					'key' => 'event_date',
					'value' => $today,
					'compare' => '=',
				),
			),
		));
		break;
	} // Switch Ends

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
			$post_content = get_the_excerpt();
			$post_url = get_the_permalink();
			$location = get_post_meta($post_id, 'event_place', true);
			$date = get_post_meta($post_id, 'event_date', true);
			if (has_post_thumbnail()) {
				$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
			} else { $featured_img_url = get_template_directory_uri() . "/img/no-news-cover.jpg";}
			?>
                    <div class="up-event-list col-xl-12 float-left pl-0 pr-0" data-post-id="<?php echo $post_id; ?>">
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
		wp_reset_query();} ?>
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript">
			var $jq = jQuery.noConflict();
			var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
			$jq(".up-event-list, #past-event-pop, .up-past-block").click(function() {
	          var postid = $jq(this).data('post-id');
	           $jq.post(ajaxUrl,{action:"eventsPopup",
	            post_id: postid,
	          },
	             function(data){
	                $jq("html, body").animate({ scrollTop: "0" },500);
	                $jq("#event-news-popup").css({"overflow-y":"scroll"});
	                $jq('#event-news-popup').html(data);
	                $jq("#event-news-popup").fadeIn();
	                $jq("body").addClass("modal-open");   
	            });
	        });
		</script>
<?php
	exit;
}
add_action('wp_ajax_nopriv_events_filter', 'events_filter');
add_action('wp_ajax_events_filter', 'events_filter');

// Multimedia gallery

function more_gallery() {

	$offset = $_POST["offset"];
	$ppp = 3;
	$query = new WP_Query(array(
		'post_type' => 'gallery',
		'post_status' => 'publish',
		'category_name' => 'image-gallery',
		'posts_per_page' => $ppp,
		'paged' => $offset,
		'orderby' => 'date',
		'order' => 'ASC',
	));
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
			} else { $featured_img_url = get_template_directory_uri() . "/img/gal-no-img.jpg";}?>
    	  	<div class="col-xl-4 col-md-6 float-left px-2 mb-2 pt-4">
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
		wp_reset_query();}?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/simple-lightbox.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript">
			var $jq = jQuery.noConflict();
		   	$jq(document).ready(function(){
		   		$jq(function(){
				    var $gallery = $jq('.gallery > div > a').simpleLightbox();

				});
		   	});
		</script>

<?php
exit;
}

add_action('wp_ajax_nopriv_more_gallery', 'more_gallery');
add_action('wp_ajax_more_gallery', 'more_gallery');

// News pop up

function newsPopup(){

	$post_id = $_POST['post_id'];
	$content_post = get_post($post_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$title = get_the_title($post_id);
	$image = get_the_post_thumbnail_url($post_id, 'full');
	$date = get_the_date('M j, Y',$post_id);

	wp_reset_postdata();
	?>
	<div class="container" id="pop-container">
		<div class="row">
			<div class="news-popup w-100 bg-white">
				<div class="col-10 mx-auto mb-5">
					<div class="arrow-nav">
					<div class="go-back float-left"> <a class="btn btn-lg btn-qp qp-theme-bg" id="go-back">go back</a>
					</div>
					<div class="go-next float-right d-none"> <a class="btn btn-lg btn-qp qp-theme-bg" href="">next</a>
					</div>
					</div>
					<div class="clearfix"></div>
					<hr>
				</div>

				<div class="news-popup-image w-100">
					<img class="w-100" src="<?php echo $image; ?>">
					 <div class="news-popup-image-content">
					 	<div class="post-date text-left pb-2 font-weight-light"> <span><?php echo $date; ?></span></div>
					 	<h1 class="text-left"><?php echo $title; ?></h1>
					 </div>
				</div>
				<div class="col-10 mx-auto news-popup-content">
					<?php echo $content; ?>
				</div>
				<div class="news-popup-latestnews">
					<div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 mx-auto">
						<div class="qp-h-recentnews-top w-100">
							<h3 class="float-left mb-0">Latest News</h3>
						</div>
						<div class="clearfix"></div>
						<div class="qp-h-recentnews-content">
							<div class="row">
								<?php 
									$query = new WP_Query(array(
										'post_type' => array('qp_news'),
										'post_status' => 'publish',
										'posts_per_page' => 2,
										'tag' => 'latest-news',
										'orderby' => 'date',
										'order' => 'DESC',
									));
									if ($query->have_posts()) {
										while ($query->have_posts()) {
											$query->the_post();
											$post_id = get_the_ID();
											$post_title = get_the_title();
											$post_title_len = strlen($post_title);
											$title_length = strlen($post_title);
											if ($title_length > "98") {
												$post_title = substr($post_title, 0, 98) . "...";
											}
											$post_content = get_the_excerpt();
											$post_url = get_the_permalink();
											if (has_post_thumbnail()) {
												$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
											} else { $featured_img_url = get_template_directory_uri() . "/img/no-news-cover.jpg";}
								?>
								<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
								<script type="text/javascript">
									function innerpopup(post_id){
										var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
										var $jq = jQuery.noConflict();
									        $jq.post(ajaxUrl,{action:"newsPopup",
									          post_id: post_id,
									        },
									           function(data){
									              $jq("html, body").animate({ scrollTop: "0" },500);
									              $jq('#qp-news-popup').html(data);
									              $jq("#qp-news-popup").fadeIn();
									              $jq("body").addClass("modal-open");   
									          });
									}
								</script>
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" id="inner-thumb" onclick="innerpopup(<?php echo $post_id; ?>)" data-post-id="<?php echo $post_id; ?>">
									<div class="row">
										<div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 post-image float-left pb-sm-3">
											<a>
												<img src="<?php echo $featured_img_url; ?>" class="img-fluid w-100 border-0" alt="<?php echo $post_title; ?>">
											</a>
										</div>
										<div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7 post-content pt-1 pl-lg-0 pl-md-0 pl-xl-0 pt-md-0 pt-lg-1 pt-xl-4">
											<div class="post-date text-left pb-2"> <span><?php echo get_the_date('M j, Y'); ?></span>
											</div>
											<h6 class="text-left font-weight-bold"><a href="#"><?php echo $post_title; ?></a></h6>
										</div>
									</div>
								</div>
								<?php } wp_reset_query(); } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
			<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
				<script type="text/javascript">
					var $jq = jQuery.noConflict();
					$jq(document).ready(function(){
						$jq("#go-back").click(function(){
							$jq("#qp-news-popup").fadeOut(500);
							$jq("body").removeClass("modal-open");
						});
					});
				</script>
			<!-- news-popup -->
		</div>
	</div>
<?php

	exit;

}

add_action('wp_ajax_nopriv_newsPopup', 'newsPopup');
add_action('wp_ajax_newsPopup', 'newsPopup');


// Events popup

function eventsPopup(){

	$post_id = $_POST['post_id'];
	$content_post = get_post($post_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$title = get_the_title($post_id);
	$image = get_the_post_thumbnail_url($post_id, 'full');
	$date = get_the_date('M j, Y',$post_id);

	wp_reset_postdata();
?>
<div class="container">
    <div class="row">
        <div class="news-popup w-100 bg-white">
            <div class="col-10 mx-auto mb-5">
					<div class="arrow-nav">
					<div class="go-back float-left"> <a class="btn btn-lg btn-qp qp-theme-bg" id="back-btnn" href="">go back</a>
					</div>
					<div class="go-next float-right d-none"> <a class="btn btn-lg btn-qp qp-theme-bg" href="">next</a>
					</div>
					</div>
					<div class="clearfix"></div>
					<hr>
				</div>
            <div class="news-popup-image w-100">
                <img class="w-100" src="<?php echo $image; ?>">
                <div class="up-pop up-popup-image-content">
                    <div class="post-date text-left pb-2 font-weight-light"> <span><?php echo $date; ?></span></div>
                    <h1 class="text-left"><?php echo $title; ?></h1>
                </div>
            </div>
            <!-- <div class="container mb-2">
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
            </div> -->
            <div class="col-10 mx-auto news-popup-content">
                <?php echo $content; ?>
            </div>
            <div class="container news-popup-latestnews">
                <div class="row col-lg-12 mx-auto">
                <?php
					$query = new WP_Query(array(
						'post_type' => 'events',
						'post_status' => 'publish',
						'posts_per_page' => 3,
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
				?>
                    <div class="col-sm-4 d-flex pl-4 pr-4">
                        <div class="upop card">
                            <div class="card-body pl-0 pr-0">
                                <p class="card-header"><?php echo date("M j, Y", strtotime($date)); ?></p>
                                <h6 class="card-text"><a href="#"><b><?php echo $post_title; ?></b></a></h6>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_query(); } ?>
                </div>
            </div>
            <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
			<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
				<script type="text/javascript">
					var $jq = jQuery.noConflict();
					$jq(document).ready(function(){
						$jq("#back-btn").click(function(){
							$jq("#event-news-popup").fadeOut(500);
							$jq("body").removeClass("modal-open");
						});
					});
				</script>
        </div>
    </div>

<?php
	exit;
}

add_action('wp_ajax_nopriv_eventsPopup', 'eventsPopup');
add_action('wp_ajax_eventsPopup', 'eventsPopup');

// Sign up Form

function signUp(){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$admin_email = get_option( 'admin_email' );
	$password = wp_hash_password($password);
	$users = get_user_by('login', $username);
	$parts = explode('@', $username);
	$user = $parts[0];
	$domain = $parts[1];
	$name = explode('.', $domain);
	$domainname = $name[0];

	$user_id = $users->ID;

	global $wpdb;

	$myrows = $wpdb->get_results( "SELECT domain_name FROM wp_domains WHERE domain_name LIKE '%$domainname%'" );

	if(!empty($myrows)){
		$user_id = username_exists( $user_name );
		if ( !$user_id and email_exists($username) == false ) {

			$insert = $wpdb->insert('wp_signups', array(
			    'username' => $username,
			    'password' => $password,
			));

			if($insert){
				$to = $username;
				$subject = "Registration";

				$message = "
				<html>
				<head>
					<title>Registration</title>
				</head>
				<body>
				<p>Thank you for Signing up with Qatar Petroleum. Your registration is being verified by the Admin</p>
				</body>
				</html>
				";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: Qatar Petroleum <'.$admin_email.'>' . "\r\n";
				if(mail($to,$subject,$message,$headers)){
					echo '<div class="alert alert-info">
			    		  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Mail Sent! </strong> Please check your email for password reset link.
					    </div>';
				}
				else{
					echo '<div class="alert alert-danger">
			    		  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Mail Not Sent! </strong> Something went wrong.
					    </div>';
				}
				echo "success";
			}

			
		} else {
			echo "error";
		}
	}
	else{
		echo "error";
	}

	// if ( username_exists( $username ) ){
	// 	$user_data = wp_update_user( array ('ID' => $user_id, 'user_pass' => $password) ) ;
	// 	 if ( is_wp_error( $user_data ) ) {
	// 	    // There was an error; possibly this user doesn't exist.
	// 	    echo 'Error.';
	// 	} else {
	// 	    // Success!
	// 	    echo 'Success';
	// 	}
	// }
 //    else {
 //        echo 'error';
 //    }
	exit;
}

add_action('wp_ajax_nopriv_signUp', 'signUp');
add_action('wp_ajax_signUp', 'signUp');

// Disable change password email

//add_filter( 'send_password_change_email', '__return_false' );

function override_reset_password_form_redirect() {
    $action = isset( $_GET['action'] ) ? $_GET['action'] : '';
    $key = isset( $_GET['key'] ) ? $_GET['key'] : '';
    $login = isset( $_GET['login'] ) ? $_GET['login'] : '';

    if($_GET['action']==='rp' && strpos($_SERVER['REQUEST_URI'],'wp-login.php')) {
	    $key = isset( $_GET['key'] ) ? $_GET['key'] : '';
	    $login = isset( $_GET['login'] ) ? $_GET['login'] : '';
	    wp_redirect( site_url( '/reset-password/' ) . '?key=' . $key . '&login=' . $login );
	    exit;
	}
}
add_action( 'init', 'override_reset_password_form_redirect' );


// Reset password

function resetpassword(){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$users = get_user_by('login', $username);

	$user_id = $users->ID;

	if ( username_exists( $username ) ){
		$user_data = wp_update_user( array ('ID' => $user_id, 'user_pass' => $password) ) ;
		 if ( is_wp_error( $user_data ) ) {
		    // There was an error; possibly this user doesn't exist.
		    echo 'Error.';
		} else {
		    // Success!
		    echo 'Success';
		}
	}
    else {
        echo 'error';
    }
	exit;
}

add_action('wp_ajax_nopriv_resetpassword', 'resetpassword');
add_action('wp_ajax_resetpassword', 'resetpassword');


// login page

function signIn(){
	$username = esc_attr($_POST['username']);
	$password = esc_attr($_POST['password']);

	$creds = array();
	$creds['user_login'] = $username;
	$creds['user_password'] = $password;
	$user = wp_signon( $creds, false );
	if ( is_wp_error($user) ){
		echo 'error';
	}
	else{
		echo "success";
		wp_set_current_user($user->ID,$username); 
		wp_set_auth_cookie( $user->ID, true, false );
		//return $user;
	}

	exit;
		
}

add_action('wp_ajax_nopriv_signIn', 'signIn');
add_action('wp_ajax_signIn', 'signIn');

// redirect url

add_action( 'template_redirect', 'redirect_to_specific_page' );

function redirect_to_specific_page() {

if ( is_page('news') && ! is_user_logged_in() ) {
	$location = get_site_url() . "/login";
	wp_redirect($location, 302);
    }
}

// add welcome to nav

add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
function add_loginout_link( $items, $args ) {
	$redirect = get_site_url() . "/login";
    if (is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page nav-item">
        				<div class="dropdown">
						  <a class="wel-user dropdown-toggle nav-link" data-toggle="dropdown">
						    WELCOME USER 
						  </a>
						  <div class="dropdown-menu">
						    <a class="dropdown-item" href="'. wp_logout_url( $redirect ) .'">LOG OUT</a>
						  </div>
						</div>
        			</li>';
    }
    return $items;
}

//forgot password

function forgotPassword(){

	$username = $_POST['username'];
	if(username_exists($username)){
		$user = get_userdatabylogin($username);
		if($user){
		   $useremail = $user->user_email;
		   $to = $useremail;
			$subject = "Password Reset";

			$message = "
			<html>
			<head>
			<title>Password Reset</title>
			</head>
			<body>
			<p>Please click the below link to reset your password.<br> <a href='".get_site_url()."/reset-password/?login=".$username."'>Reset Password</a></p>
			
			</body>
			</html>
			";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: Qatar Petroleum <shyju.k@dgfootprints.com>' . "\r\n";
			if(mail($to,$subject,$message,$headers)){
				echo '<div class="alert alert-info">
		    		  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Mail Sent! </strong> Please check your email for password reset link.
				    </div>';
			}
			else{
				echo '<div class="alert alert-danger">
		    		  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Mail Not Sent! </strong> Something went wrong.
				    </div>';
			}

		}
	}
	else{
		echo '<div class="alert alert-danger">
	    		  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error !!</strong> Invalid Qatar ID
			    </div>';
	}

	exit;

}

add_action('wp_ajax_nopriv_forgotPassword', 'forgotPassword');
add_action('wp_ajax_forgotPassword', 'forgotPassword');


// add new options to user menu

add_action('admin_menu', 'adddomain_submenu_page');
 
function adddomain_submenu_page() {
    add_submenu_page(
        'users.php',
        'Domains',
        'Domains',
        'manage_options',
        'domains',
        'adddomain_list' );
}
 
function adddomain_list() {
    echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>'; ?>

<div class="wrap">
<h1 class="wp-heading-inline">Domain Names</h1>

	<a href="#" class="page-title-action" id="add" data-value="add">Add New</a>

<hr class="wp-header-end">
	<div class="row" id="domain-list">
		<?php
				global $wpdb;
				$result = $wpdb->get_results( "SELECT ID,domain_name FROM wp_domains" );
				if($result){ ?>
		<table class="wp-list-table widefat fixed striped users">
			<tr>
				<th>Domain Name</th>
				<th>Action</th>
			</tr>
			<?php
					foreach( $result as $results ) {
	        			echo '
	        					<tr>
									<td>'.$results->domain_name.'</td>
									<td><a data-option="delete" data-id="'.$results->ID.'">delete</a></td>
								</tr>
	        				';
	    			}
			?>
			<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
			<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
			<script type="text/javascript">
				var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
				var $jq = jQuery.noConflict();

				$jq("#domain-list a").click(function(){
					var option = $jq(this).data('option');
					var id = $jq(this).data('id');
					$jq.post(ajaxUrl,{action:"updateDomain",
				      	option: option,
				      	id: id,
				      },
				      function(data){
				      	$jq('#domain-list').html(data);
				      });
				});
			</script>
		</table>
		<?php }
				else{
					echo "<h3>No domain names found..</h3>";
				}
		?>
	</div>

	<div class="row" style="display: none;" id="new-domain">
		<div class="form-group">
			<hr class="wp-header-end">
			<h3>Enter your email extension domain name to add</h3>
		    <label for="domain_name">Domain Name:</label>
		    <input type="text" class="form-control" id="domain_name" name="domain_name">
		    <button id="btn-add" class="btn btn-info">Add</button>
		 </div>
		 <div class="add-success"></div>
	</div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">
	var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
	var $jq = jQuery.noConflict();

	$jq('#add').click(function(){

		$jq('#domain-list').hide();
		$jq('#new-domain').show();

	});

	$jq("#btn-add").click(function(){
		var domainName = $jq('#domain_name').val();
		$jq.post(ajaxUrl,{action:"getDomain",
	      	domain_name: domainName,
	      },
	      function(data){
	         $jq('.add-success').append(data);
	      });
	});

	
	
</script>
<?php    
    echo '</div>';
    exit;
}


add_action('wp_ajax_nopriv_adddomain_list', 'adddomain_list');
add_action('wp_ajax_adddomain_list', 'adddomain_list');

// Update Domain

function updateDomain(){

	$option = $_POST['option'];
	$id = $_POST['id'];

	global $wpdb;

	$delete = $wpdb->delete( 'wp_domains', array( 'ID' => $id ) );

	if($delete){
		echo "Domain deleted successfully !
			<button class='btn' id='del-success'>Ok</button>
			";
	}
?>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">
	var $jq = jQuery.noConflict();
	$jq('#del-success').click(function(){
		location.reload();
	});
</script>
<?php
	exit;
}

add_action('wp_ajax_nopriv_updateDomain', 'updateDomain');
add_action('wp_ajax_updateDomain', 'updateDomain');


function getDomain(){

	$domain_name = $_POST['domain_name'];
	
	global $wpdb;

	$insert = $wpdb->insert('wp_domains', array(
			    'domain_name' => $domain_name,
			));
	if($insert){
		echo "<div class='success-msg'>
				<p>Domain added Successfully..</p>
				<button id='ok-btn'>Ok</button>
		</div>";
	}
	else{
		echo "Not able to add domain..";
	} ?>

	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript">
		var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
		var $jq = jQuery.noConflict();
			$jq('#ok-btn').click(function(){
			location.reload();
		});
	</script>

<?php

	exit;

}

add_action('wp_ajax_nopriv_getDomain', 'getDomain');
add_action('wp_ajax_getDomain', 'getDomain');


// add newsignup list to users menu

add_action('admin_menu', 'newsignup_submenu_page');
 
function newsignup_submenu_page() {
    add_submenu_page(
        'users.php',
        'New SignUps',
        'New SignUps',
        'manage_options',
        'newsignups',
        'newsignup_list' );
}
 
function newsignup_list() {
    echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>'; ?>

<div class="wrap">
<h1 class="wp-heading-inline">New SignUp List</h1>

<hr class="wp-header-end">
	<div class="row" id="domain-list">
		<table class="wp-list-table widefat fixed striped users" id="signuplist">
			<tr>
				<th>Username</th>
				<th>Action</th>
			</tr>
			<?php
				global $wpdb;
				$result = $wpdb->get_results( "SELECT ID,username,password FROM wp_signups" );
				if(empty($result)){
					echo '
						<tr>
							<td><h3>No new user signups found..</h3></td>
						</tr>
					';
				}
				else{
					foreach( $result as $results ) {
	        			echo '
	        					<tr>
									<td>'.$results->username.'</td>
									<td><a href="#" data-value="approve" data-id="'.$results->ID.'">Approve</a> / <a href="#" data-value="reject" data-id="'.$results->ID.'">Reject</a></td>
								</tr>

	        			';
	    			}
				}
			?>
			
		</table>
	</div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">
	var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
	var $jq = jQuery.noConflict();

	$jq("#signuplist a").click(function(){
		var status = $jq(this).data('value');
		var id = $jq(this).data('id');
		$jq.post(ajaxUrl,{action:"createUser",
	      	status: status,
	      	id: id,
	      },
	      function(data){
	         alert(data);
	         location.reload();
	      });
	});

	
	
</script>
<?php    
    echo '</div>';
    exit;
}


add_action('wp_ajax_nopriv_newsignup_list', 'newsignup_list');
add_action('wp_ajax_newsignup_list', 'newsignup_list');

function createUser(){
	$admin_email = get_option( 'admin_email' );
	$loginurl = site_url().'/login/';

	$action = $_POST['status'];
	$id 	= $_POST['id'];

	global $wpdb;

	$results = $wpdb->get_results( "SELECT username, password FROM wp_signups WHERE ID = '$id'" );

	foreach ($results as $values) {
		$username = $values->username;
		$password = $values->password;
	}

	switch ($action) {
    case "approve":
        $user_id = wp_create_user( $username, $password, $username );
        if($user_id){
        	$wpdb->delete( 'wp_signups', array( 'ID' =>  $id) );
        	$to = $username;
			$subject = "Registration Approved";

			$message = "
			<html>
			<head>
				<title>Registration Approved</title>
			</head>
			<body>
			<p>
				Congratulations! Your registration has been confimed. Please proceed to  login at <a href='".$loginurl."'>Click here to login</a>
			</p>
			</body>
			</html>
			";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: Qatar Petroleum <'.$admin_email.'>' . "\r\n";
			if(mail($to,$subject,$message,$headers)){
				echo '<div class="alert alert-info">
		    		  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Mail Sent! </strong> Please check your email for password reset link.
				    </div>';
			}
			else{
				echo '<div class="alert alert-danger">
		    		  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Mail Not Sent! </strong> Something went wrong.
				    </div>';
			}
        	echo "New user approved Successfully";
        }
        else{
        	echo "User already exist";
        }
        break;
    case "reject":
        echo "Rejected";
        break;
}

	exit;
}

add_action('wp_ajax_nopriv_createUser', 'createUser');
add_action('wp_ajax_createUser', 'createUser');








