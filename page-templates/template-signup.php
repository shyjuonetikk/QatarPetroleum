<?php 

/**
 * Template Name: QP - Sign UP
 * 
 */

get_header('login');

?>
<section class="sec-register">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-left">
                <h3 class="login-h3 font-weight-bold pt-4">With your Qatar ID you can have access to tons of information to guide you</h3>
                <form id="qp-reg-form" class="login-form">
                    <div class="form-group">
                        <input type="email" class="form-control" id="registerEmail" aria-describedby="emailHelp" placeholder="QATAR ID" required="true">
                    </div>
                    <div class="form-group inputWithIcon">
                        <input type="password" class="form-control" id="registerPassword1" placeholder="PASSWORD" required="true">
                        <span toggle="#registerPassword1" class="fa fa-fw fa-eye field-icon toggle-password float-right"></span>
                    </div>
                    <div class="form-group inputWithIcon">
                        <input type="password" class="form-control" id="registerPassword2" placeholder="CONFIRM PASSWORD" required="true">
                        <!-- <i class="fa fa-eye fa-fw" aria-hidden="true"></i> -->
                        <span toggle="#registerPassword2" class="fa fa-fw fa-eye field-icon toggle-password  float-right"></span>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">REGISTER</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
<?php get_footer('login');?>