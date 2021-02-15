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
                    <li class="breadcrumb-item active"><?php echo html_escape($title); ?></li>
                </ol>
            </div>

            <div class="col-sm-12 page-login">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 login-box-cnt center-box">
                        <div class="login-box">
                            <div class="box-head">
                                <h1 class="auth-title font-1"><?php echo trans("title_change_password"); ?></h1>
                            </div>

                            <div class="box-body">
                                <p class="p-auth-modal"><?php echo trans("subtitle_change_password"); ?></p>

                                <!-- include message block -->
                                <?php $this->load->view('partials/_messages'); ?>

                                <!-- form start -->
                                <?php echo form_open('auth/change_password_post'); ?>

                                <?php if (!empty($user->password)): ?>
                                    <div class="form-group has-feedback">
                                        <input type="password" name="old_password" class="form-control form-input"
                                               placeholder="<?php echo trans("placeholder_old_password"); ?>"
                                               value="<?php echo old('old_password'); ?>" required>
                                        <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                    <input type="hidden" name="old_password_empty" value="1">
                                <?php else: ?>
                                    <input type="hidden" name="old_password_empty" value="0">
                                <?php endif; ?>

                                <div class="form-group has-feedback">
                                    <input type="password" name="password" class="form-control form-input"
                                           placeholder="<?php echo trans("placeholder_password"); ?>"
                                           value="<?php echo old('password'); ?>" required>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <input type="password" name="password_confirmation" class="form-control form-input"
                                           placeholder="<?php echo trans("placeholder_confirm_password"); ?>"
                                           value="<?php echo old('password_confirmation'); ?>" required>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-custom pull-right">
                                            <?php echo trans("btn_change_password"); ?>
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

