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
          <!-- <form class="login-form">
			  <div class="form-group">
			    <input type="email" class="form-control" id="loginInputEmail" aria-describedby="emailHelp" placeholder="QATAR ID" required="true">   
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" id="loginInputPassword" placeholder="PASSWORD" required="true">
			  </div>
			  <small id="sign-up-small" class="form-text text-muted">Don't have an account yet? <a href="#">Sign up</a>
			    <p class="float-right mr-4">Forgot Password ?</p></small>
  				<button type="submit" class="btn btn-primary">SIGN IN</button>
		  </form> -->
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
        </div>
        </div>
      </div>
  </section>
<?php get_footer('login');?>