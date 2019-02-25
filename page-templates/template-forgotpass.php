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
		 
		 <form name="lostpasswordform" id="lostpasswordform" method="post">
		    <div class="form-row">
		        <div class="col-md-12 mb-3">
			      <div class="input-group">
			        <input type="text" class="form-control qp-fields input" id="username" name="username" placeholder="QATAR ID" >
			      </div>
			    </div>
		    </div>
		    <p class="submit">
		    	<input type="submit" name="forgetpass" id="btn-forgetpass" class="btn btn-signup" value="Get New Password" tabindex="100">

		    	<a href="./login" class="float-right mt-2">Back to login</a>
		    </p>
		</form>
		<div id="forgt-msg">

		</div>
        </div>
        </div>
      </div>
  </section>
<?php get_footer('login');?>