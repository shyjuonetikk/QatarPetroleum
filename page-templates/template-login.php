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
        </div>
        </div>
      </div>
  </section>
<?php get_footer('login');?>