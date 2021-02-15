<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<section id="wrapper">
    <div class="container">
        <div class="row">

            <!-- breadcrumb -->
            <div class="col-sm-12 page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div>

            <div class="col-sm-12 page-login">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 login-box-cnt center-box">
                        <div class="login-box">
                            <div class="box-head">
                                <h1 class="auth-title font-1"><?php echo trans("title_login"); ?></h1>
                            </div>
                            <div class="box-body">
                                <!--<p class="p-auth-modal">-->
                                <!--    <?php echo trans("login_with_social"); ?>-->
                                <!--</p>-->

                                <div class="row row-login-ext">
                                    <!--<div class="col-sm-6 col-xs-6">-->
                                    <!--    <a href="<?php echo $facebook_login_url; ?>" class="btn-login-ext btn-login-facebook">-->
                                    <!--        <span class="icon"><i class="ion-social-facebook"></i></span>-->
                                    <!--        <span class="text"><?php echo trans("facebook"); ?></span>-->
                                    <!--    </a>-->
                                    <!--</div>-->
                                    <!-- <div class="col-sm-6  col-xs-6">
                                        <a href="<?php // echo $google_plus_login_url; ?>" class="btn-login-ext btn-login-google">
                                            <span class="icon"> <i class="ion-social-googleplus"></i> </span>
                                            <span class="text"><?php // echo trans("google"); ?></span>
                                        </a>
                                    </div> -->
                                </div>

                                <p class="p-auth-modal-or">
                                  <!--<span><?php echo trans("or"); ?></span>-->
                                </p>


                                <!-- form start -->
                                <?php echo form_open("auth/login_post"); ?>

                                <!-- include message block -->
                                <?php $this->load->view('partials/_messages'); ?>

                                <div class="form-group has-feedback">
                                    <input type="email" name="email" class="form-control form-input"
                                           placeholder="<?php echo trans("placeholder_email"); ?>"
                                           value="<?php echo old('email'); ?>" required>
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <input type="password" name="password" class="form-control form-input"
                                           placeholder="<?php echo trans("placeholder_password"); ?>"
                                           value="<?php echo old('password'); ?>" required>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>

                                <div class="row">
                                    <div class="col-sm-7 col-xs-7">
                                        <a href="<?php echo base_url(); ?>reset-password" class="link-forget">
                                            <?php echo trans("title_forgot_password"); ?>
                                        </a>
                                    </div>
                                    <div class="col-sm-5 col-xs-5">
                                        <button type="submit" class="btn btn-primary btn-custom pull-right">
                                            <?php echo trans("btn_login"); ?>
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?><!-- form end -->

                            </div>

                            <div class="box-footer">
                                <?php echo trans("create_account"); ?>
                                <a href="<?php echo base_url(); ?>Auth/student_register" class="link-forget">
                                  Student
                                </a> or
                                
                                <a href="<?php echo base_url(); ?>Auth/teacher_acknowlegment" class="link-forget">
                                  Teacher
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.Section: wrapper -->
<style>
    .box-body form {
    display: block;
    }
    .login-box .box-footer a {
    color: #007bff;
}
</style>


