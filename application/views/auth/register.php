<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.registerbox{
	border-radius: 8px;
	box-shadow: 0 7px 25px 0 rgba(0,0,0,.1);
	background-color: #fff;
	padding:34px 24px;
	display: block;	
}
.registerbox .form-group {
    padding: 0px 5px;
}
.registerbox .register-terms {
    padding: 40px 0px 15px 0;
    font-size: 16px;
}

.error-message p {
    text-align: center;
}

ul.nav.nav-tabs li {
    text-transform: uppercase;
    font-size: 18px;
    padding: 0 10px;
}
.question-boards .board{
	border-radius: 8px;
	box-shadow: 0 7px 25px 0 rgba(0,0,0,.1);
	background-color: #fff;
	padding:34px 24px;
}
.secarea .description,.question-boards .board>.icons,.question-boards .board>.title,.question-boards .board>.btn-box {
    text-align: center;
}
.question-boards .board>.title {
    border-bottom: 1px solid #ccc;
    margin: 5px 0;
    padding: 16px 0;
    font-size: 18px;
}
.secarea .description {
    font-size: 18px;
    font-weight: 400;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.5;
    letter-spacing: normal;
    color: #333;
	margin: 13px 0 34px 0;
}

.color-bar>div:first-child {
    width: 12%;
    background: #18ebbd;
}
.color-bar>div {
    float: left;
    height: 100%;
}
.color-bar>div:nth-child(2) {
    width: 33%;
    background: #0071b9;
}.color-bar>div:nth-child(3) {
    width: 15%;
    background: #00bfbd;
}
.color-bar>div:nth-child(4) {
    width: 30%;
    background: #ffbd00;
}.color-bar>div:nth-child(5) {
    width: 10%;
    background: #ff4338;
}
.secboard {
    margin-bottom: 40px;
}
.start-apply-btn {
    margin: auto;
    padding: 0 20px;
    min-width: 300px;
    height: 60px;
    display: block;
    border-radius: 4px;
    background-image: -webkit-gradient(linear,right top,left top,from(#ff786b),to(#ff4338));
    background-image: -webkit-linear-gradient(right,#ff786b,#ff4338);
    background-image: linear-gradient(270deg,#ff786b,#ff4338);
    font-size: 18px;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #fff;
}
</style>
<!-- Section: wrapper -->
<section id="wrapper">
    <div class="container">
        <div class="row">
            <!-- breadcrumb -->
            <!-- <div class="col-sm-12 page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div> -->
			<div class="col-sm-12">
			<?php //$this->load->view('partials/_messages'); ?>
			</div>
			<div class="col-sm-12 page-login">
				<ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#student">become a student</a></li>
				<li><a data-toggle="tab" href="#teacher">become a teacher</a></li>
				</ul>
				<div class="tab-content registerbox">
				<div id="student" class="tab-pane fade in active">
					<!----------student- start ---------------->
					<div class="box-body">
								
								<center><h2>Student <?php echo trans("title_register"); ?></h2></center>
                                <!-- <p class="p-auth-modal">
                                    <?php echo trans("register_with_social"); ?>
                                </p> -->

                                <div class="row row-login-ext">
                                    <div class="col-sm-6 col-xs-6">
                                        <!-- <a href="<?php echo $facebook_login_url; ?>" class="btn-login-ext btn-login-facebook">
                                            <span class="icon"><i class="ion-social-facebook"></i></span>
                                            <span class="text"><?php echo trans("facebook"); ?></span>
                                        </a> -->
                                    </div>
                                    <!-- <div class="col-sm-6 col-xs-6">
                                        <a href=" <?php // echo $google_plus_login_url; ?>" class="btn-login-ext btn-login-google">
                                            <span class="icon"> <i class="ion-social-googleplus"></i> </span>
                                            <span class="text"><?php echo trans("google"); ?></span>
                                        </a>
                                    </div> -->
                                </div>

                                <p class="p-auth-modal-or">
                                    <span><?php echo trans("or"); ?></span>
                                </p>
                                <div class="col-sm-12">
			                        <?php $this->load->view('partials/_messages'); ?>
			                    </div>

                                <!-- form start -->
                                <?php echo form_open("auth/register_post"); ?>

                               
                                <div class="col-sm-6  form-group">
								Username <span style="color:red;">*</span>
                                    <input type="text" name="username" class="form-control form-input" placeholder="<?php echo trans("placeholder_username"); ?>" value="<?php echo old("username"); ?>" required>
                                </div>
                                <div class="col-sm-6 form-group">
								Email Id <span style="color:red;">*</span>
                                    <input type="email" name="email" class="form-control form-input"  placeholder="<?php echo trans("placeholder_email"); ?>" value="<?php echo old("email"); ?>" required>
                                </div>
                                <div class="col-sm-6  form-group">
								Password <span style="color:red;">*</span>
                                    <input type="password" name="password" class="form-control form-input" placeholder="<?php echo trans("placeholder_password"); ?>" value="<?php echo old("password"); ?>" required>
                                </div>
                                <div class="col-sm-6  form-group">
								Confirm Password <span style="color:red;">*</span>
                                    <input type="password" name="confirm_password" class="form-control form-input" placeholder="<?php echo trans("placeholder_confirm_password"); ?>" required>
						   </div>
								<div class="col-sm-6  form-group">
									Female
                                    <input type="radio" name="gender" value="female" checked>
									Male
                                    <input type="radio" name="gender" value="male">
                                </div>
								<!-- <div class="col-sm-6  form-group">
									Phone Number
                                    <input type="text" name="phone" class="form-control form-input" placeholder="00-000-000-00">
                                </div> -->

        <!--                        <div class="col-sm-6 form-group">-->
								<!--Rcaptcha-->
								<!--<div class="captcha-cnt cap-register-cnt">-->
								<!--	<a class="captcha-refresh" onclick="refresh_captcha();"><i class="fa fa-refresh"></i></a>-->
								<!--	<img class="img-captcha" id='imageCaptcha' alt="">-->
								<!--</div>-->
        <!--                        </div>-->

        <!--                        <div class="col-sm-6 form-group">-->
								<!--Rcaptcha<span style="color:red;">*</span>-->
        <!--                          <input type="text" id="captcha-mregister" class="form-control pull-right form-input captcha-input" placeholder="<?php //echo trans("placeholder_captcha"); ?>" required>-->
        <!--                        </div>-->

                                <div class="col-sm-12 form-group">
                                    <p class="register-terms"><?php echo trans("register_message"); ?>
                                        <a href="<?php echo base_url(); ?>user-agreement" target="_blank"><?php echo trans("user_agreement"); ?></a></p>
                                </div>
                                
								<div class="col-sm-12">
									<center><button type="submit" class="btn btn-primary btn-custom  margin-top-15">
										<?php echo trans("btn_register"); ?>
									</button>
									</center>
								</div>
                                
                                <?php echo form_close(); ?><!-- form end -->

                            </div>
					<!----------student- end ---------------->
				</div>
				<div id="teacher" class="tab-pane fade secarea">
				<!--<center><h3 class="head-title"><span>Before starting</span></h3>-->
				<!--	<div class="col-md-12 description"><span>Check the following information. We recommend that you read everything in detail.</span><br><span>Once you have all the answers and material you need, you can start your application.</span>-->
				<!--	</div>-->
				<!--	</center>-->
				<!--	<div class="row question-boards">-->
					
					<!-- start columan -->
				<!--	<div class="col-md-6 secboard">-->
				<!--	<div class="color-bar" style="height: 4px;"><div style="border-top-left-radius: 8px;"></div><div></div><div></div><div></div><div style="border-top-right-radius: 8px;"></div></div>-->
				<!--		<div class="col-md-12 board">-->
				<!--		<div class="icons">-->
				<!--		<img src="https://d1m3ds7i7t710d.cloudfront.net/orion/static/media/application-icon-1.bd5b3e00.svg" alt="not found">-->
				<!--		</div>-->
				<!--		<div class="title">-->
				<!--		What is the Application Process?-->
				<!--		</div>-->
				<!--		<div class="content">-->
				<!--		<p>Before applying, kindly note the application process will be lengthy, selective and will require your active participation.</p>-->
				<!--		</div>-->
				<!--		<div class="btn-box">-->
				<!--		<a href="#" target="_blank">-->
				<!--		<button type="button" class="board-btn btn btn-big btn-ghost-default">-->
				<!--		Understand The Process-->
				<!--		</button>-->
				<!--		</a>-->
				<!--		</div>-->
				<!--		</div>-->
				<!--	</div>-->
					<!-- end columan -->
					<!-- start columan -->
				<!--	<div class="col-md-6 secboard">-->
				<!--	<div class="color-bar" style="height: 4px;"><div style="border-top-left-radius: 8px;"></div><div></div><div></div><div></div><div style="border-top-right-radius: 8px;"></div></div>-->
				<!--		<div class="col-md-12 board">-->
				<!--		<div class="icons">-->
				<!--		<img src="https://d1m3ds7i7t710d.cloudfront.net/orion/static/media/application-icon-1.bd5b3e00.svg" alt="not found">-->
				<!--		</div>-->
				<!--		<div class="title">-->
				<!--		What is the Application Process?-->
				<!--		</div>-->
				<!--		<div class="content">-->
				<!--		<p>Before applying, kindly note the application process will be lengthy, selective and will require your active participation.</p>-->
				<!--		</div>-->
				<!--		<div class="btn-box">-->
				<!--		<a href="#" target="_blank">-->
				<!--		<button type="button" class="board-btn btn btn-big btn-ghost-default">-->
				<!--		Understand The Process-->
				<!--		</button>-->
				<!--		</a>-->
				<!--		</div>-->
				<!--		</div>-->
				<!--	</div>-->
					<!-- end columan -->
					<!-- start columan -->
				<!--	<div class="col-md-6 secboard">-->
				<!--	<div class="color-bar" style="height: 4px;"><div style="border-top-left-radius: 8px;"></div><div></div><div></div><div></div><div style="border-top-right-radius: 8px;"></div></div>-->
				<!--		<div class="col-md-12 board">-->
				<!--		<div class="icons">-->
				<!--		<img src="https://d1m3ds7i7t710d.cloudfront.net/orion/static/media/application-icon-1.bd5b3e00.svg" alt="not found">-->
				<!--		</div>-->
				<!--		<div class="title">-->
				<!--		What is the Application Process?-->
				<!--		</div>-->
				<!--		<div class="content">-->
				<!--		<p>Before applying, kindly note the application process will be lengthy, selective and will require your active participation.</p>-->
				<!--		</div>-->
				<!--		<div class="btn-box">-->
				<!--		<a href="#" target="_blank">-->
				<!--		<button type="button" class="board-btn btn btn-big btn-ghost-default">-->
				<!--		Understand The Process-->
				<!--		</button>-->
				<!--		</a>-->
				<!--		</div>-->
				<!--		</div>-->
				<!--	</div>-->
					<!-- end columan -->
					<!-- start columan -->
				<!--	<div class="col-md-6 secboard">-->
				<!--	<div class="color-bar" style="height: 4px;"><div style="border-top-left-radius: 8px;"></div><div></div><div></div><div></div><div style="border-top-right-radius: 8px;"></div></div>-->
				<!--		<div class="col-md-12 board">-->
				<!--		<div class="icons">-->
				<!--		<img src="https://d1m3ds7i7t710d.cloudfront.net/orion/static/media/application-icon-1.bd5b3e00.svg" alt="not found">-->
				<!--		</div>-->
				<!--		<div class="title">-->
				<!--		What is the Application Process?-->
				<!--		</div>-->
				<!--		<div class="content">-->
				<!--		<p>Before applying, kindly note the application process will be lengthy, selective and will require your active participation.</p>-->
				<!--		</div>-->
				<!--		<div class="btn-box">-->
				<!--		<a href="#" target="_blank">-->
				<!--		<button type="button" class="board-btn btn btn-big btn-ghost-default">-->
				<!--		Understand The Process-->
				<!--		</button>-->
				<!--		</a>-->
				<!--		</div>-->
				<!--		</div>-->
				<!--	</div>-->
					<!-- end columan -->
					<!--</div>-->
					<!--<button type="button" class="start-apply-btn btn btn-big btn-main"><span>Start Your Application</span></button>-->
					
					<!----------teacher- start ---------------->
					<div class="box-body">
					<center><h2>Teacher <?php echo trans("title_register"); ?></h2></center>
                                <!-- <p class="p-auth-modal">
                                    <?php echo trans("register_with_social"); ?>
                                </p> -->

                                <div class="row row-login-ext">
                                    <!-- <div class="col-sm-6 col-xs-6">
                                        <a href="<?php echo $facebook_login_url; ?>" class="btn-login-ext btn-login-facebook">
                                            <span class="icon"><i class="ion-social-facebook"></i></span>
                                            <span class="text"><?php echo trans("facebook"); ?></span>
                                        </a>
                                    </div> -->
                                    <!-- <div class="col-sm-6 col-xs-6">
                                        <a href="<?php // echo $google_plus_login_url; ?>" class="btn-login-ext btn-login-google">
                                            <span class="icon"> <i class="ion-social-googleplus"></i> </span>
                                            <span class="text"><?php echo trans("google"); ?></span>
                                        </a>
                                    </div> -->
                                </div>

                                <p class="p-auth-modal-or">
                                    <span><?php echo trans("or"); ?></span>
                                </p>


                                <!-- form start -->
                                <?php echo form_open("auth/teacher_register_post"); ?>

                                <div class="col-sm-6  form-group">
								Username <span style="color:red;">*</span>
                                    <input type="text" name="username" class="form-control form-input" placeholder="<?php echo trans("placeholder_username"); ?>" value="<?php echo old("username"); ?>" required>
                                </div>
                                <div class="col-sm-6 form-group">
								Email Id <span style="color:red;">*</span>
                                    <input type="email" name="email" class="form-control form-input"  placeholder="<?php echo trans("placeholder_email"); ?>" value="<?php echo old("email"); ?>" required>
                                </div>
                                <div class="col-sm-6  form-group">
								Password <span style="color:red;">*</span>
                                    <input type="password" name="password" class="form-control form-input" placeholder="<?php echo trans("placeholder_password"); ?>" value="<?php echo old("password"); ?>" required>
                                </div>
                                <div class="col-sm-6  form-group">
								Confirm Password <span style="color:red;">*</span>
                                    <input type="password" name="confirm_password" class="form-control form-input" placeholder="<?php echo trans("placeholder_confirm_password"); ?>" required>
						   </div>
								<div class="col-sm-6  form-group">
									Female
                                    <input type="radio" name="gender" value="female">
									Male
                                    <input type="radio" name="gender" value="male" checked>
                                </div>
								<!-- <div class="col-sm-6  form-group">
									Phone Number
                                    <input type="text" name="phone" class="form-control form-input" placeholder="00-000-000-00">
                                </div> -->

                                <div class="col-sm-12 form-group">
                                    <p class="register-terms"><?php echo trans("register_message"); ?>
                                        <a href="<?php echo base_url(); ?>user-agreement" target="_blank"><?php echo trans("user_agreement"); ?></a></p>
                                </div>
                                
								<div class="col-sm-12">
									<center><button type="submit" class="btn btn-primary btn-custom  margin-top-15">
										<?php echo trans("btn_register"); ?>
									</button>
									</center>
								</div>
                                
                                <?php echo form_close(); ?><!-- form end -->

                            </div>
					<!----------teacher- end ---------------->
				</div>
				
				</div>
			</div>
		</div>
    </div>
</section>
<!-- /.Section: wrapper -->

