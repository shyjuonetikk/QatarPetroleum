<?php 

/**
 * Template Name: QP - Reset Password
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
		 	$username = $_GET['login'];
		 	$users = get_user_by('login', $username);
			$user_id = $users->ID;
			if ( username_exists( $username ) ){ ?>

			<form class="needs-validation reset-form mt-3" novalidate id="reset-form" name="reset-form">
			  <div class="form-row">
			    <input type="hidden" id="username" name="username" value="<?php echo $username; ?>" >
			    <div class="col-md-12 mb-3">
			      <div class="input-group">
			        <input id="password" type="password" class="form-control qp-fields" name="password" placeholder="PASSWORD">
              		<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
			      </div>
			    </div>
			    <div class="col-md-12 mb-3">
			      <div class="input-group">
			        <input id="co_password" type="password" class="form-control qp-fields" name="co_password" placeholder="CONFIRM PASSWORD">
			        <span toggle="#co_password" class="fa fa-fw fa-eye field-icon toggle-copassword"></span>
			      </div>
			    </div>
			  </div>
  			<button class="btn btn-signup mt-3" id="btn-reset" type="submit">Reset Password</button>
		  </form>
		  <div id="success" class="mt-3 text-center">
		  </div>	
			<?php }
		    else {
		        echo "<div class='alert alert-danger'><strong>Error!</strong> Username doesn't exists.. </div>";
		    }
		 ?>
        </div>
        </div>
      </div>
  </section>
<?php get_footer('login');?>