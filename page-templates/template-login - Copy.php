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
		  	if (isset($_GET["checkemail"])) {
			    echo '<div class="alert alert-info">
			    		  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Mail Sent! </strong> Please check your email for password reset link.
					  </div>';    
			}
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
		  <div class="float-left">
		  	Don't have an account ? Please <a href="<?php echo $homeurl; ?>/sign-up/">Sign up</a>
		  </div>
		  <div class="float-right">
		  	<a href="<?php echo $homeurl; ?>/forgot-password/">Forgot Password ?</a>
		  </div>
        </div>
        </div>
        <div class="wp_login_error">
		    <?php if( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) { ?>
		        <p>The password you entered is incorrect, Please try again.</p>
		    <?php } 
		    else if( isset( $_GET['login'] ) && $_GET['login'] == 'empty' ) { ?>
		        <p>Please enter both username and password.</p>
		    <?php } ?>
		</div>
      </div>
  </section>
<?php get_footer('login');?>