<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package QP
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/simplelightbox.min.css">
	<link href="<?php echo get_template_directory_uri(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<?php wp_head();?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/qp.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/qp-responsive.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ekko-lightbox.css" >
	<?php wp_head();?>
</head>

<body <?php body_class();?>>

<div class="site" id="page">
<div id="overlay">
    <div class="lds-css ng-scope"><div style="width:100%;height:100%" class="lds-ripple"><div></div><div></div></div></div>
</div>

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'QP');?></a>

		<nav id="qp-sticky" class="navbar navbar-expand-lg navbar-light sticky-top">

		<?php if ('container' == $container): ?>
			<div class="container" >
		<?php endif;?>

					<!-- Your site title as branding in the menu -->
					<?php if (!has_custom_logo()) {?>

						<?php if (is_front_page() && is_home()): ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name');?></a></h1>

						<?php else: ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name');?></a>

						<?php endif;?>


					<?php } else {
	the_custom_logo();
}?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap');?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
	array(
		'theme_location' => 'primary',
		'container_class' => 'collapse navbar-collapse',
		'container_id' => 'navbarNavDropdown',
		'menu_class' => 'navbar-nav ml-auto',
		'fallback_cb' => '',
		'menu_id' => 'main-menu',
		'depth' => 2,
		'walker' => new Understrap_WP_Bootstrap_Navwalker(),
	)
);?>
			<?php if ('container' == $container): ?>
			</div><!-- .container -->
			<?php endif;?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
