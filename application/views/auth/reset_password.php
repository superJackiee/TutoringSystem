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
                                <h1 class="auth-title font-1"><?php echo trans("title_reset_password"); ?></h1>
                            </div>

                            <div class="box-body">
                                <p class="p-auth-modal"><?php echo trans("subtitle_reset_password"); ?></p>

                                <!-- form start -->
                                <?php echo form_open("auth/reset_password_post"); ?>

                                <!-- include message block -->
                                <?php $this->load->view('partials/_messages'); ?>

                                <div class="form-group has-feedback">
                                    <input type="email" name="email" class="form-control form-input"
                                           placeholder="<?php echo trans("placeholder_email"); ?>" required>
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>

                                <div class="row">
                                    <div class="col-sm-7">
                                    </div>
                                    <div class="col-sm-5" style="display:contents;">
                                        <button type="submit" class="btn btn-primary btn-custom pull-right">
                                            <?php echo trans("btn_reset_password"); ?>
                                        </button>
                                    </div>
                                </div>

                                <?php echo form_close(); ?><!-- form end -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.Section: wrapper -->

