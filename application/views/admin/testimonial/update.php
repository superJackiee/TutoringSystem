<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-10 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Testimonial</h3>
                <br>
                <small>You can update Testimonial from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('home/update_testimonial'); ?>
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>
                <input type="hidden" name="img" value="<?php echo $section[0]['img']?>">
                <div class="form-group">
                    <label class="control-label">Title</label>*
                    <input type="text" class="form-control" name="title" placeholder="Section title" value="<?php echo $section[0]['title']?>" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Author Name</label>*
                    <input type="text" class="form-control" name="author" placeholder="Section title" value="<?php echo $section[0]['author']?>" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Content</label>*
                    <textarea  class="form-control" name="description" placeholder="Content" required><?php echo $section[0]['description']?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Image </label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="<?php echo base_url($section[0]['img'])?>" alt=""
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
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
</div>