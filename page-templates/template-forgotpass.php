<?php 

/**
 * Template Name: QP - Forgot Password
 * 
 */

get_header('login');

?>
<section class="sec-bg-login">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto text-left">
          <h3 class="login-h3 font-weight-bold pt-4 prm-clr mb-3">With your Qatar ID you can have access to tons of information to guide you</h3>
		 
		 <form name="lostpasswordform" id="lostpasswordform" action="<?php echo wp_lostpassword_url(); ?>" method="post">
		    <div class="form-row">
		        <div class="col-md-12 mb-3">
			      <div class="input-group">
			        <input type="text" class="form-control qp-fields input" id="user_login" name="user_login" placeholder="QATAR ID" >
			      </div>
			    </div>
		    </div>
		    <?php 
		    	$homeurl = get_site_url(); ?>
		    <input type="hidden" name="redirect_to" value="<?php echo $homeurl; ?>/login/?checkemail=confirm">
		    <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="btn btn-signup" value="Get New Password" tabindex="100"></p>
		</form>
        </div>
        </div>
      </div>
  </section>
<?php get_footer('login');?>