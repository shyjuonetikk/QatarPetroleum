<?php 

/**
 * Template Name: QP - Login
 * 
 */

get_header('login');

?>
<section class="sec-bg-login">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto text-left">
          <h3 class="login-h3 font-weight-bold pt-4 prm-clr">With your Qatar ID you can have access to tons of information to guide you</h3>
		  <?php
		  	$homeurl = get_site_url();
		  	$args = array(
						'redirect'       => $homeurl,
						'form_id'        => 'qp-loginform',
						'label_username' => __( '' ),
						'label_password' => __( '' ),
						'label_log_in'   => __( 'SIGN IN' ),
						'remember' => false
					);
		  	wp_login_form( $args ); 
		  ?> 
		  <div>
		  	<p>Don't have an account yet ? <a href="#" class="font-weight-bold">Sign up</a></p>
		  </div>
        </div>
        </div>
      </div>
  </section>
<?php get_footer('login');?>