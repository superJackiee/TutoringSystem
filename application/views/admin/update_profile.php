<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-8">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title">Update Profile</h3>
                    <br>
                    <small>You can update your profile from this form</small>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/update_profile_post'); ?>

            <input type="hidden" name="id" value="<?php echo html_escape($user->id); ?>">

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12 col-profile">
                            <img src="<?php echo html_escape(get_user_avatar($user)); ?>" alt="avatar" class="thumbnail img-responsive img-update">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-profile">
                            <p>
                                <a class="btn btn-success btn-sm">
                                    Change Avatar
                                    <input name="file" size="40" class="uploadFile" accept=".png, .jpg, .jpeg" onchange="$('#upload-file-info').html($(this).val());" type="file">
                                </a>
                            </p>
                            <p class='label label-info' id="upload-file-info"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control form-input"
                           name="username" placeholder="Username"
                           value="<?php echo html_escape($user->username); ?>">
                </div>

                <div class="form-group">
                    <label>Name Slug</label>
                    <input type="text" class="form-control form-input"
                           name="slug" placeholder="Name Slug"
                           value="<?php echo html_escape($user->slug); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">About Me</label>
                    <textarea class="form-control text-area"
                              name="about_me" placeholder="About Me"><?php echo html_escape($user->about_me); ?></textarea>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control form-input" name="phone" placeholder="000-00-000-00" value="<?php echo $user->phone;?>">
                </div>
				<div class="form-group">
				<?php
				$checked =($user->gender =='female')?'checked':'';
				$checkedmale =($user->gender =='male')?'checked':'';
				?>
				Female
				<input type="radio" name="gender" value="female" <?=$checked;?>>
				Male
				<input type="radio" name="gender" value="male" <?=$checkedmale;?>>
                </div>
				<div class="form-group">
				<?php
				$option=($user->role =='student')?'selected':'';
				$optionteacher =($user->role =='teacher')?'selected':'';
				?>
				<label>Role</label>
				<select name="role" class="form-control form-input">
				<option value="student" <?=$option;?>>Student</option>
				<option value="teacher" <?=$optionteacher;?>>Teacher</option>
				</select>
                </div>
				<div class="form-group">
                    <label>Social Accounts</label>
                    <input type="text" class="form-control form-input" name="facebook_url"
                           placeholder="Facebook Url" value="<?php echo html_escape($user->facebook_url); ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-input"
                           name="twitter_url" placeholder="Twitter Url"
                           value="<?php echo html_escape($user->twitter_url); ?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-input"
                           name="google_url" placeholder="Google Url"
                           value="<?php echo html_escape($user->google_url); ?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-input" name="instagram_url" placeholder="Instagram Url"
                           value="<?php echo html_escape($user->instagram_url); ?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-input" name="pinterest_url" placeholder="Pinterest Url"
                           value="<?php echo html_escape($user->pinterest_url); ?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-input" name="linkedin_url" placeholder="LinkedIn Url"
                           value="<?php echo html_escape($user->linkedin_url); ?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-input" name="vk_url"
                           placeholder="VK Url" value="<?php echo html_escape($user->vk_url); ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-input" name="youtube_url"
                           placeholder="Youtube Url" value="<?php echo html_escape($user->youtube_url); ?>">
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
    </div>
</div>