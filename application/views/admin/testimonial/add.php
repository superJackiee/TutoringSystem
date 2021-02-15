<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <div class="left">
                    <h3 class="box-title">Add Testimonial</h3>
                    <br>
                    <small>You can add a new Testimonial from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>home/view_testimonial" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        View Testimonial
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('home/add_testimonial'); ?>
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label class="control-label">Title</label>*
                    <input type="text" class="form-control" name="title" placeholder="Section title" value="" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Author Name</label>*
                    <input type="text" class="form-control" name="author" placeholder="Section title" value="" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Content</label>*
                    <textarea  class="form-control" name="description" placeholder="Content" required></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Upload image</label>
                    <input type="file" class="form-control" name="image"></textarea>
                </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Add Testimonial</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
</div>