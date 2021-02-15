<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="user_section dashboard_sec">
      	<div class="container">
<div class="row">
    <div class="col-md-12">

        <!-- form start -->
        <?php echo form_open_multipart('admin/settings_post'); ?>

        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General Settings</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Email Settings</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Contact Settings</a></li>
                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Social Media Settings</a></li>
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content settings-tab-content">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="tab-pane active" id="tab_1">

                    <div class="form-group">
                        <label class="control-label">Language</label>

                        <select name="site_lang" class="form-control custom-select">
                            <option value="english" <?php echo ($settings->site_lang == "english") ? "selected" : ""; ?>>English</option>
                            <option value="french" <?php echo ($settings->site_lang == "french") ? "selected" : ""; ?>>French</option>
                            <option value="german" <?php echo ($settings->site_lang == "german") ? "selected" : ""; ?>>German</option>
                            <option value="portuguese" <?php echo ($settings->site_lang == "portuguese") ? "selected" : ""; ?>>Portuguese</option>
                            <option value="russian" <?php echo ($settings->site_lang == "russian") ? "selected" : ""; ?>>Russian</option>
                            <option value="turkish" <?php echo ($settings->site_lang == "turkish") ? "selected" : ""; ?>>Turkish</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Application Name</label>
                        <input type="text" class="form-control" name="application_name" placeholder="Application Name"
                               value="<?php echo html_escape($settings->application_name); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Footer About Section</label>
                        <textarea class="form-control text-area" name="about_footer" placeholder="Footer About Section"
                                  style="min-height: 140px;"><?php echo html_escape($settings->about_footer); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Post Optional Url Button Name</label>
                        <input type="text" class="form-control" name="optional_url_button_name"
                               placeholder="Button Name"
                               value="<?php echo html_escape($settings->optional_url_button_name); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Number of Posts Per Page (Pagination)</label>
                        <input type="number" class="form-control" name="pagination_per_page" value="<?php echo html_escape($settings->pagination_per_page); ?>" required style="max-width: 200px;">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Show RSS</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_rss_1" name="show_rss" value="1" class="square-purple" checked>&nbsp;&nbsp;
                                <label for="rb_rss_1" class="cursor-pointer" <?php echo ($settings->show_rss == "1") ? 'checked' : ''; ?>>Yes</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_rss_2" name="show_rss" value="0" class="square-purple" <?php echo ($settings->show_rss == "0" || $settings->show_rss == null) ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="rb_rss_2" class="cursor-pointer">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Show Post Hit Counts</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_hit_1" name="show_hits" value="1" class="square-purple" checked>&nbsp;&nbsp;
                                <label for="rb_hit_1" class="cursor-pointer" <?php echo ($settings->show_hits == "1") ? 'checked' : ''; ?>>Yes</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_hit_2" name="show_hits" value="0" class="square-purple" <?php echo ($settings->show_hits == "0" || $settings->show_hits == null) ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="rb_hit_2" class="cursor-pointer">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Show News Ticker</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_ticker_1" name="show_newsticker" value="1" class="square-purple" checked>&nbsp;&nbsp;
                                <label for="rb_ticker_1" class="cursor-pointer" <?php echo ($settings->show_newsticker == "1") ? 'checked' : ''; ?>>Yes</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_ticker_2" name="show_newsticker" value="0" class="square-purple" <?php echo ($settings->show_newsticker == "0" || $settings->show_newsticker == null) ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="rb_ticker_2" class="cursor-pointer">No</label>
                            </div>
                        </div>
                    </div>

                </div><!-- /.tab-pane -->

                <div class="tab-pane" id="tab_2">

                    <div class="form-group">
                        <label class="control-label">Mail Protocol</label>

                        <select name="mail_protocol" class="form-control custom-select">
                            <option value="smtp" <?php echo ($settings->mail_protocol == "smtp") ? "selected" : ""; ?>>SMTP</option>
                            <option value="mail" <?php echo ($settings->mail_protocol == "mail") ? "selected" : ""; ?>>Mail</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Mail Title</label>
                        <input type="text" class="form-control" name="mail_title"
                               placeholder="Exp: Varient" value="<?php echo html_escape($settings->mail_title); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Mail Host</label>
                        <input type="text" class="form-control" name="mail_host"
                               placeholder="Exp: mail.domain.com" value="<?php echo html_escape($settings->mail_host); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Mail Port</label>
                        <input type="text" class="form-control" name="mail_port"
                               placeholder="Exp: 587" value="<?php echo html_escape($settings->mail_port); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Mail Username</label>
                        <input type="text" class="form-control" name="mail_username"
                               placeholder="Exp: info@domain.com" value="<?php echo html_escape($settings->mail_username); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Mail Password</label>
                        <input type="password" class="form-control" name="mail_password"
                               placeholder="Mail Password" value="<?php echo html_escape($settings->mail_password); ?>">
                    </div>

                    <div class="callout" style="max-width: 500px;margin-top: 30px;">
                        <h4>Gmail SMTP</h4>

                        <p><strong>Mail Host:&nbsp;&nbsp;</strong>ssl://smtp.googlemail.com</p>
                        <p><strong>Mail Port:&nbsp;&nbsp;</strong>465</p>
                    </div>


                </div><!-- /.tab-pane -->

                <div class="tab-pane" id="tab_3">
                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input type="text" class="form-control" name="contact_address"
                               placeholder="Address" value="<?php echo html_escape($settings->contact_address); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email Address</label>
                        <input type="text" class="form-control" name="contact_email"
                               placeholder="Email Address" value="<?php echo html_escape($settings->contact_email); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Phone Number</label>
                        <input type="text" class="form-control" name="contact_phone"
                               placeholder="Phone Number" value="<?php echo html_escape($settings->contact_phone); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Google Map API Key</label>
                        <input type="text" class="form-control" name="map_api_key"
                               placeholder="Google Map API Key" value="<?php echo html_escape($settings->map_api_key); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Google Map Latitude</label>
                        <input type="text" class="form-control" name="latitude"
                               placeholder="Latitude" value="<?php echo html_escape($settings->latitude); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Google Map Longitude</label>
                        <input type="text" class="form-control" name="longitude"
                               placeholder="Longitude" value="<?php echo html_escape($settings->longitude); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Contact Text</label>
                        <textarea id="ckEditor" class="form-control" name="contact_text"
                                  placeholder="Contact Text"><?php echo html_escape($settings->contact_text); ?></textarea>
                    </div>


                </div><!-- /.tab-pane -->

                <div class="tab-pane" id="tab_4">
                    <div class="form-group">
                        <label class="control-label">Facebook Url</label>
                        <input type="text" class="form-control" name="facebook_url"
                               placeholder="Facebook Url" value="<?php echo html_escape($settings->facebook_url); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Twitter Url</label>
                        <input type="text" class="form-control"
                               name="twitter_url" placeholder="Twitter Url"
                               value="<?php echo html_escape($settings->twitter_url); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Google Url</label>
                        <input type="text" class="form-control"
                               name="google_url" placeholder="Google Url"
                               value="<?php echo html_escape($settings->google_url); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Instagram Url</label>
                        <input type="text" class="form-control" name="instagram_url" placeholder="Instagram Url"
                               value="<?php echo html_escape($settings->instagram_url); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Pinterest Url</label>
                        <input type="text" class="form-control" name="pinterest_url" placeholder="Pinterest Url"
                               value="<?php echo html_escape($settings->pinterest_url); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">LinkedIn Url</label>
                        <input type="text" class="form-control" name="linkedin_url" placeholder="LinkedIn Url"
                               value="<?php echo html_escape($settings->linkedin_url); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">VK Url</label>
                        <input type="text" class="form-control" name="vk_url"
                               placeholder="VK Url" value="<?php echo html_escape($settings->vk_url); ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Youtube Url</label>
                        <input type="text" class="form-control" name="youtube_url"
                               placeholder="Youtube Url" value="<?php echo html_escape($settings->youtube_url); ?>">
                    </div>
                </div>
            </div><!-- /.tab-content -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div>
        </div><!-- nav-tabs-custom -->

        <?php echo form_close(); ?>
    </div><!-- /.col -->
</div>
</div>

      </section>
