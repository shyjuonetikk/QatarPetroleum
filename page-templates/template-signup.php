<?php 

/**

 * Template Name: QP - SignUp
 * 
 */

get_header('login');

?>
<section class="sec-bg-login">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto text-left">
          <h3 class="login-h3 font-weight-bold pt-4 prm-clr mb-3 mb-sm-3 mb-md-3 mb-lg-4 mb-xl-5">With your Qatar ID you can have access to tons of information to guide you</h3>
		 
		  <form class="needs-validation signup-form" novalidate id="signup-form" name="signup-form">
			  <div class="form-row">
			    <div class="col-md-12 mb-3 mb-sm-3 mb-md-3 mb-lg-4 mb-xl-5">
			      <div class="input-group">
			        <input type="text" class="form-control qp-fields" id="username" name="username" placeholder="QATAR ID" aria-describedby="inputGroupPrepend" required>
			      </div>
			    </div>
			    <div class="col-md-12 mb-3 mb-sm-3 mb-md-3 mb-lg-4 mb-xl-5">
			      <div class="input-group">
			        <input id="password" type="password" class="form-control qp-fields" name="password" placeholder="PASSWORD">
              		<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
			      </div>
			    </div>
			    <div class="col-md-12 mb-3 mb-sm-3 mb-md-3 mb-lg-4 mb-xl-5">
			      <div class="input-group">
			        <input id="co_password" type="password" class="form-control qp-fields" name="co_password" placeholder="CONFIRM PASSWORD">
			        <span toggle="#co_password" class="fa fa-fw fa-eye field-icon toggle-copassword"></span>
			      </div>
			    </div>
			  </div>
  				<div class="g-recaptcha mb-3 mb-sm-3 mb-md-3 mb-lg-3 mb-xl-3" data-sitekey="6LeksJIUAAAAAJX5jvItQFJ0tFffYgIR0iW7BHyZ"></div>
  				<div id="recaptcha-error"></div>
  			<button class="btn btn-signup mt-3" id="btn-signup" type="submit">REGISTER</button>
		  </form>
		  <div id="success" class="mt-3 text-center">
		  </div>
        </div>
        </div>
      </div>
  </section>
<?php get_footer('login');?>