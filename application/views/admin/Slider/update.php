<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Image</h3>
                <br>
                <small>You can update image from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('gallery/update_slider_image_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <input type="hidden" name="id" value="<?php echo html_escape($image->id); ?>">
                <input type="hidden" name="path_big" value="<?php echo html_escape($image->path_big); ?>">
                <input type="hidden" name="path_small" value="<?php echo html_escape($image->path_small); ?>">

                <div class="form-group">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control"
                           name="title" id="title" placeholder="Image title"
                           value="<?php echo html_escape($image->title); ?>">
                </div>
                
                <div class="form-group">
                    <label class="control-label">Color</label>
                    <input type="color" class="form-control"
                           name="favcolor" id="favcolor"
                           value="<?php echo html_escape($image->favcolor); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Description</label>
                    <input type="text" class="form-control"
                           name="slider_description" id="slider_description" placeholder="Slider Description"
                           value="<?php echo html_escape($image->slider_description); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Image </label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="<?php echo base_url() . html_escape($image->path_small); ?>" alt=""
                                     class="thumbnail img-responsive">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm'>
                                    Change image
                                    <input type="file" id="Multifileupload" name="file" size="40"
                                           class="uploadFile" accept=".png, .jpg, .jpeg, .gif" style="cursor: pointer;">
                                </a>
                            </div>
                        </div>

                        <div id="MultidvPreview"></div>

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