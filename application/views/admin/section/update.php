<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-10 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Section</h3>
                <br>
                <small>You can update section from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('home/edit_section'); ?>
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label class="control-label">Section Title</label>*
                    <input type="text" class="form-control" name="title" placeholder="Section title" value="<?php echo $section[0]['title']?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Section Content</label>*
                    <textarea  class="form-control" name="description" placeholder="Content" required><?php echo $section[0]['description']?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Image </label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="<?php echo base_url($section[0]['image'])?>" alt=""
                                     class="thumbnail img-responsive">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm'>
                                    Change image
                                    <input type="file" id="Multifileupload" name="image" size="40"
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
                <input type="hidden" name="id"  value="<?php echo $section[0]['id']?>">
                <input type="hidden" name="image"  value="<?php echo $section[0]['image']?>">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
</div>