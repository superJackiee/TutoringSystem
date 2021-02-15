<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <div class="left">
                    <h3 class="box-title">Visual Settings</h3>
                    <br>
                    <small>You can change your visual settings from this form</small>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/visual_settings_post'); ?>

            <div class="box-body">

                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label class="control-label">Site Color</label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color1" value="default"
                                       class="regular-checkbox" <?php echo ($visual_settings->site_color === "default" ||
                                    $visual_settings->site_color === "") ? "checked" : ""; ?>/>
                                <label for="color1" style="background-color: #28ae8d;"></label>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color2" value="violet"
                                       class="regular-checkbox"
                                    <?php echo ($visual_settings->site_color === "violet") ? "checked" : ""; ?>/>
                                <label for="color2" style="background-color:  #6770B7;"></label>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color3" value="blue"
                                       class="regular-checkbox"
                                    <?php echo ($visual_settings->site_color === "blue") ? "checked" : ""; ?>/>
                                <label for="color3" style="background-color:  #1da7da;"></label>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color7" value="bondi"
                                       class="regular-checkbox"
                                    <?php echo ($visual_settings->site_color === "bondi") ? "checked" : ""; ?>/>
                                <label for="color7" style="background-color:  #0494b1;"></label>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color4" value="amaranth"
                                       class="regular-checkbox"
                                    <?php echo ($visual_settings->site_color === "amaranth") ? "checked" : ""; ?>/>
                                <label for="color4" style="background-color:  #e91e63;"></label>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color10" value="red"
                                       class="regular-checkbox"
                                    <?php echo ($visual_settings->site_color === "red") ? "checked" : ""; ?>/>
                                <label for="color10" style="background-color:  #e74c3c;"></label>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color5" value="orange"
                                       class="regular-checkbox"
                                    <?php echo ($visual_settings->site_color === "orange") ? "checked" : ""; ?>/>
                                <label for="color5" style="background-color:  #f86923;"></label>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color6" value="yellow"
                                       class="regular-checkbox"
                                    <?php echo ($visual_settings->site_color === "yellow") ? "checked" : ""; ?>/>
                                <label for="color6" style="background-color:  #f2d438;"></label>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color8" value="bluewood"
                                       class="regular-checkbox"
                                    <?php echo ($visual_settings->site_color === "bluewood") ? "checked" : ""; ?>/>
                                <label for="color8" style="background-color:  #34495e;"></label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="radio" name="site_color" id="color9" value="cascade"
                                       class="regular-checkbox"
                                    <?php echo ($visual_settings->site_color === "cascade") ? "checked" : ""; ?>/>
                                <label for="color9" style="background-color:  #95a5a6;"></label>
                            </div>

                        </div>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label>Top Header and Block Heads Color</label>
                    <div class="input-group my-colorpicker" style="max-width: 500px;">
                        <input type="text" class="form-control" name="site_block_color" maxlength="200" placeholder="Select Color" value="<?php echo $visual_settings->site_block_color; ?>" required>
                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div><!-- /.input group -->
                </div>

                <div class="form-group">
                    <label>Post Item Block Style</label>

                    <div class="row m-b-15">
                        <div class="col-sm-2">
                            <div class="col-sm-12 m-b-15">
                                <input type="radio" name="post_list_style" value="vertical" class="square-purple" <?php echo ($visual_settings->post_list_style == "vertical") ? 'checked' : ''; ?> >
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/post_vertical.jpg" alt="" class="img-responsive" style="width: 100px;">
                        </div>
                        <div class="col-sm-3">
                            <div class="col-sm-12 m-b-15">
                                <input type="radio" name="post_list_style" value="horizontal" class="square-purple" <?php echo ($visual_settings->post_list_style == "horizontal") ? 'checked' : ''; ?>>
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/post_horizontal.jpg" alt="" class="img-responsive" style="height: 68px;">
                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <label class="control-label">Logo</label>
                    <div class="col-sm-12 p0" style="margin-bottom: 30px;">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo get_logo($visual_settings); ?>" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm'>
                                    Change logo
                                    <input type="file" name="logo" size="40" class="uploadFile"
                                           accept=".png, .jpg, .jpeg, .gif"
                                           onchange="$('#upload-file-info1').html($(this).val());">
                                </a>
                            </div>
                        </div>

                        <span class='label label-info' id="upload-file-info1"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Logo Footer</label>
                    <div class="col-sm-12 p0" style="margin-bottom: 30px;">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo get_logo_footer($visual_settings); ?>" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm'>
                                    Change logo
                                    <input type="file" name="logo_footer" size="40" class="uploadFile"
                                           accept=".png, .jpg, .jpeg, .gif"
                                           onchange="$('#upload-file-info2').html($(this).val());">
                                </a>
                            </div>
                        </div>

                        <span class='label label-info' id="upload-file-info2"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Favicon</label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo get_favicon($visual_settings); ?>" alt="" style="width: 20px; height: 20px;">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px;">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm'>
                                    Change favicon
                                    <input type="file" name="favicon" size="40" class="uploadFile"
                                           accept=".png, .jpg, .jpeg, .gif"
                                           onchange="$('#upload-file-info3').html($(this).val());">
                                </a>
                            </div>
                        </div>

                        <span class='label label-info' id="upload-file-info3"></span>
                    </div>
                </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
</div>