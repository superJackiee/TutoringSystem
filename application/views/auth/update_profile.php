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
                                <h1 class="auth-title font-1"><?php echo trans("title_update_profile"); ?></h1>
                            </div>

                            <div class="box-body">

                                <!-- form start -->
                                <?php echo form_open_multipart('auth/update_profile_post'); ?>
                                <!-- include message block -->
                                <?php $this->load->view('partials/_messages'); ?>


                                <div class="col-sm-12 m-t-15 col-update-profile">
                                    <div class="row">
                                        <div class="col-sm-12 col-profile">
                                            <img src="<?php echo html_escape(get_user_avatar($user)); ?>" alt="avatar" class="thumbnail img-responsive img-update">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-profile">
                                            <p>
                                                <a class="btn btn-success btn-sm">
                                                    <?php echo trans("change_avatar"); ?>
                                                    <input name="file" size="40" class="uploadFile" accept=".png, .jpg, .jpeg" onchange="$('#upload-file-info').html($(this).val());" type="file">
                                                </a>
                                            </p>
                                            <p class='label label-info' id="upload-file-info"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-update-profile">
                                    <div class="form-group has-feedback">
                                        <input type="email" class="form-control form-input"
                                               name="email" placeholder="Email"
                                               value="<?php echo html_escape($user->email); ?>" readonly>
                                        <span class=" glyphicon glyphicon-envelope form-control-feedback"></span>

                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                               name="username" placeholder="Username"
                                               value="<?php echo html_escape($user->username); ?>" required>
                                        <span class=" glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
									<div class="form-group has-feedback">
									Phone Number
                                        <input type="text" class="form-control form-input"
                                               name="phone" placeholder="000-00-000-00"
                                               value="<?php echo html_escape($user->phone); ?>">
                                    </div>
									<div class="form-group has-feedback">
									<?php
									$checked =($user->gender =='female')?'checked':'';
									$checkedmale =($user->gender =='male')?'checked':'';
									?>
									Female
                                    <input type="radio" name="gender" value="female" <?=$checked;?>>
									Male
                                    <input type="radio" name="gender" value="male" <?=$checkedmale;?>>
                                </div>


                                <div class="col-sm-12 col-update-profile">
                                    <button type="submit" class="btn btn-primary btn-custom pull-right">
                                        <?php echo trans("btn_update_profile"); ?>
                                    </button>
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