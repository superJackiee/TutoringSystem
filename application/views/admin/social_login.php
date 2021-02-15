<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Social Login Configuration</h3>
                <br>
                <small>You can make your social login configurations from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('admin/social_login_configuration_post'); ?>
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <h4 style="margin-top: 0;">Facebook</h4>
                <div class="form-group">
                    <label class="label-sitemap">App ID</label>
                    <input type="text" class="form-control" name="facebook_app_id" placeholder="App ID"
                           value="<?php echo $settings->facebook_app_id; ?>">
                </div>

                <div class="form-group">
                    <label class="label-sitemap">App Secret</label>
                    <input type="text" class="form-control" name="facebook_app_secret" placeholder="App Secret"
                           value="<?php echo $settings->facebook_app_secret; ?>">
                </div>

                <h4>Google Plus</h4>
                <div class="form-group">
                    <label class="label-sitemap">App Name</label>
                    <input type="text" class="form-control" name="google_app_name" placeholder="App Name"
                           value="<?php echo $settings->google_app_name; ?>">
                </div>
                <div class="form-group">
                    <label class="label-sitemap">Client ID</label>
                    <input type="text" class="form-control" name="google_client_id" placeholder="Client ID"
                           value="<?php echo $settings->google_client_id; ?>">
                </div>

                <div class="form-group">
                    <label class="label-sitemap">Client Secret</label>
                    <input type="text" class="form-control" name="google_client_secret" placeholder="Client Secret"
                           value="<?php echo $settings->google_client_secret; ?>">
                </div>

                <!-- /.box-body -->
                <div class="box-footer" style="padding-left: 0; padding-right: 0;">
                    <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                </div>
                <!-- /.box-footer -->

                <?php echo form_close(); ?><!-- form end -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <style>
        h4 {
            color: #0d6aad;
            text-align: left;
            font-weight: 600;
            margin-bottom: 15px;
            margin-top: 30px;
        }
    </style>