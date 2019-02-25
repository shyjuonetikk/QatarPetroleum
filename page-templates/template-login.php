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
<<<<<<< HEAD
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
		  	Don't have an account ?<a href="<?php echo $homeurl; ?>/sign-up/"> <b>Sign up</b></a>
		  </div>
		  <div class="float-right">
		  	<a href="<?php echo $homeurl; ?>/forgot-password/">Forgot Password ?</a>
		  </div>
=======

		  <form class="needs-validation signin-form" novalidate id="signin-form" name="signin-form">
			  <div class="form-row">
			    <div class="col-md-12 mb-3">
			      <div class="input-group">
			        <input type="text" class="form-control qp-fields" id="username" name="username" placeholder="QATAR ID" aria-describedby="inputGroupPrepend" required>
			      </div>
			    </div>
			    <div class="col-md-12 mb-3">
			      <div class="input-group">
			        <input id="password" type="password" class="form-control qp-fields" name="password" placeholder="PASSWORD">
              		<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
			      </div>
			    </div>
			  </div>
			  <p>Don't have an account yet? <a href="./sign-up/" class="text-left">Sign Up</a> <a href="./forgot-password/" class="float-right">Forgot Password?</a></p>
  			<button class="btn btn-signup mt-3 float-left" id="btn-signin" type="submit">Login</button>
		  </form>
			<div class="float-left w-100 mt-3" id="error-signin">
			</div>
>>>>>>> 8ad52af7eed3a585275111aa0767e68566d6a353
        </div>
        </div>
      </div>
  </section>
<?php get_footer('login');?>