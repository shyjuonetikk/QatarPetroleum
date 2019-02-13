<?php
/**
 * QP functions and definitions
 *
 * @package QP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

// Function for changing the username label from admin side //

add_filter( 'gettext', 'qpid_gettext', 10, 2 );
function qpid_gettext( $translation, $original )
{
    if ( 'Username' == $original ) {
        return 'Qatar ID';
    }
    return $translation;
}


// Function to change sender name

function wpb_sender_name( $original_email_from ) {
    return 'Qatar Petroleum';
}
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );


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
				        'after' => '1 week ago'
				    )
				)
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
			$post_content = get_the_excerpt();
			$post_url = get_the_permalink();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			?>
			<div class="qp-h-latestnews-content">
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
	} else {
	}
	exit;
}
add_action('wp_ajax_nopriv_more_news_ajax', 'more_news_ajax');
add_action('wp_ajax_more_news_ajax', 'more_news_ajax');

// filter using types

function news_filter(){
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
				        'after' => '1 week ago'
				    )
				)
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
						$post_content = get_the_excerpt();
						$post_url = get_the_permalink();
						if (has_post_thumbnail()) {
							$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
						} else { $featured_img_url = get_template_directory_uri() . "/img/No_image.png";}
			?>
			<div class="qp-h-latestnews-content">
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
		<?php	} wp_reset_query(); ?>
		</div> <!-- news-container -->
		<hr>
			<?php if ($maxpages > 1) {?>
					<a id="btn-shw" data-post-type="qp_news" data-posts-per-page="1" data-max-pages="<?php echo $maxpages; ?>" class="hvr-icon-wobble-horizontal">Show more <i class="fa fa-arrow-right hvr-icon"></i></a>
				<?php }?>
			<?php } else { echo "<div class='row w-100 pt-4'><h4 class='purple-color m-auto'> No News found.. </h4></div>";} ?>

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
<?php exit; }

add_action('wp_ajax_nopriv_news_filter', 'news_filter');
add_action('wp_ajax_news_filter', 'news_filter');
