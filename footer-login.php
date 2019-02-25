<?php
/**
 * The template for displaying the login footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package QP
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull');?>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer();?>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
  var $jq = jQuery.noConflict();
  $jq(window).load(function(){
  $jq('#overlay').fadeOut();
});
  
   $jq(document).ready(function(){
      $jq('#qp-loginform #user_login').attr('placeholder', 'QATAR ID');
      $jq('#qp-loginform #user_pass').attr('placeholder', 'PASSWORD');

      var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
      var homeUrl = "<?php echo home_url(); ?>";

      $jq(".toggle-password").click(function() {

		  $jq(this).toggleClass("fa-eye fa-eye-slash");
			  var input = $jq($jq(this).attr("toggle"));
			  if (input.attr("type") == "password") {
			    input.attr("type", "text");
			  } else {
			    input.attr("type", "password");
			  }
			});

			$jq(".toggle-copassword").click(function() {

		  $jq(this).toggleClass("fa-eye fa-eye-slash");
			  var input = $jq($jq(this).attr("toggle"));
			  if (input.attr("type") == "password") {
			    input.attr("type", "text");
			  } else {
			    input.attr("type", "password");
			  }
			});

      $jq("#btn-signup").click(function(e){
      	e.preventDefault();
	      var username = $jq("#username").val();
	      var password = $jq("#password").val();
	      var co_password = $jq("#co_password").val();

	      $jq(".error").remove();

		    if (username.length < 1 && password.length < 1 && co_password.length < 1) {
		      $jq('#username').after('<span class="error">This field is required</span>');
		      $jq('#password').after('<span class="error">This field is required</span>');
		      $jq('#co_password').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (password.length < 1 && co_password.length < 1) {
		      $jq('#password').after('<span class="error">This field is required</span>');
		      $jq('#co_password').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (username.length < 1 && co_password.length < 1) {
		      $jq('#username').after('<span class="error">This field is required</span>');
		      $jq('#co_password').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (username.length < 1 && password.length < 1) {
		      $jq('#username').after('<span class="error">This field is required</span>');
		      $jq('#password').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (username.length < 1) {
		      $jq('#username').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (password.length < 1) {
		      $jq('#password').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (co_password.length < 1) {
		      $jq('#co_password').after('<span class="error">This field is required</span>');
		      return false;
		    }

		    if (password.length < 6) {
		      $jq('#password').after('<span class="error">Password must be at least 6 characters long</span>');
		      return false;
		    }
		    if (co_password.length < 6){
		    	$jq('#co_password').after('<span class="error">Password must be at least 6 characters long</span>');
		    	return false;
		    }
		    if(password !== co_password){
		    	$jq('#co_password').after('<span class="error">Password Mismatch !!</span>');
		    	return false;
		    }

		    if (grecaptcha.getResponse() == ""){
				    $jq('#recaptcha-error').append('<span class="error-captcha">Please confirm recaptcha to register</span>').fadeOut(2000);

				} else {
				    $jq.post(ajaxUrl,{action:"signUp",
					      	username: username,
					      	password: password,
					      },
					         function(data){
					         	if(data == 'error'){
					          	$jq('#username').after('<span class="error">Invalid Qatar ID</span>');
					         	}
					         	else{
					         		$jq('#success').append('<div class="alert alert-success"><strong>Success!</strong> You are Successfully Registered..</div>');
					         	}
					      });
				}

	    });

	    //reset password page

	    $jq("#btn-reset").click(function(e){
      	e.preventDefault();
	      var username = $jq("#username").val();
	      var password = $jq("#password").val();
	      var co_password = $jq("#co_password").val();

	      $jq(".error").remove();
		    
		    if (password.length < 1 && co_password.length < 1) {
		      $jq('#password').after('<span class="error">This field is required</span>');
		      $jq('#co_password').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (password.length < 1) {
		      $jq('#password').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (co_password.length < 1) {
		      $jq('#co_password').after('<span class="error">This field is required</span>');
		      return false;
		    }

		    if (password.length < 6) {
		      $jq('#password').after('<span class="error">Password must be at least 6 characters long</span>');
		      return false;
		    }
		    if (co_password.length < 6){
		    	$jq('#co_password').after('<span class="error">Password must be at least 6 characters long</span>');
		    	return false;
		    }
		    if(password !== co_password){
		    	$jq('#co_password').after('<span class="error">Password Mismatch !!</span>');
		    	return false;
		    }

		    $jq.post(ajaxUrl,{action:"signUp",
	      	username: username,
	      	password: password,
	      },
	         function(data){
	         	if(data == 'Success'){
	         		$jq('#success').append('<div class="alert alert-success"><strong>Success!</strong> Your password has been changed Successfully.. You will be redirect to login in <span class="c" id="8"></span></div>');
	         		window.setTimeout(function() {
							    window.location.href = homeUrl + '/login/';
							}, 5000);
	         	}
	      });

	      function c(){
					var n=$jq('.c').attr('id');
				  var c=n;
					$jq('.c').text(c);
					setInterval(function(){
						c--;
						if( c >= 0 ){
							$jq('.c').text(c);
						}
				        if(c==0){
				            $jq('.c').text(n);
				        }
					},1000);
				}

				// Start
				c();
				// Loop
				setInterval(function(){
					c();
				},1000);

	    });

	    // Login page
	    
	    $jq("#btn-signin").click(function(e){
      	e.preventDefault();
	      var username = $jq("#username").val();
	      var password = $jq("#password").val();

	      $jq(".error").remove();

		    if (username.length < 1 && password.length < 1 ) {
		      $jq('#username').after('<span class="error">This field is required</span>');
		      $jq('#password').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (username.length < 1) {
		      $jq('#username').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    if (password.length < 1) {
		      $jq('#password').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    $jq.post(ajaxUrl,{action:"signIn",
			      	username: username,
			      	password: password,
			      },
			         function(data){
			         	var site_url = '<?php echo site_url(); ?>';
			         	if(data == 'success'){
			         		window.location.replace(site_url);
			         	}
			         	else if(data == 'error'){
			         		$jq('#error-signin').append('<div class="alert alert-danger text-center"><strong>Error!!</strong> Invalid Login Credentials</div>').fadeOut(4000);
			         	}
			         	
			      });

	    });

	    // Forgot password page
	    
	    $jq("#btn-forgetpass").click(function(e){
      	e.preventDefault();
	      var username = $jq("#username").val();

	      $jq(".error").remove();

		    if (username.length < 1) {
		      $jq('#username').after('<span class="error">This field is required</span>');
		      return false;
		    }
		    $jq.post(ajaxUrl,{action:"forgotPassword",
			      	username: username,
			      },
			      function(data){
			         	
			         	alert(data);
			         	
			      });

	    });
   });

</script>
</body>

</html>

