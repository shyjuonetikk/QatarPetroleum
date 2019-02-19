<?php
/**
 * The template for displaying the login footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package QP
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull');?>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer();?>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript">
  var $jq = jQuery.noConflict();
  $jq(window).load(function(){
  $jq('#overlay').fadeOut();
});
  
   $jq(document).ready(function(){
      $jq('#qp-loginform #user_login').attr('placeholder', 'QATAR ID');
      $jq('#qp-loginform #user_pass').attr('placeholder', 'PASSWORD');
   });

</script>
</body>

</html>

