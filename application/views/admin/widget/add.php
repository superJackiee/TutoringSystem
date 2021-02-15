<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <div class="left">
                    <h3 class="box-title">Add Widget</h3>
                    <br>
                    <small>You can add a new widget from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/widgets" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        View Widgets
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('widget/add_widget_post'); ?>

            <input type="hidden" name="is_custom" value="1">
            <input type="hidden" name="type" value="custom">

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label class="control-label">Widget Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Widget title" value="<?php echo old('title'); ?>" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Widget Order</label>
                    <input type="number" class="form-control max-400" name="widget_order" min="1" max="99999" placeholder="Widget order" value="<?php echo old('widget_order'); ?>"
                           required>
                </div>
                <div class="form-group" style="height: 50px;">
                    <label class="control-label">Widget Visibility</label>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="widget-radio">
                                <input type="radio" id="radio1" name="visibility" value="1" class="square-purple" <?php echo (old('visibility') != "0") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="radio1" class="cursor-pointer">Show</label>
                            </div>
                            <div class="widget-radio">
                                <input type="radio" id="radio2" name="visibility" value="0" class="square-purple" <?php echo (old('visibility') == "0") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="radio2" class="cursor-pointer">Hide</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Content</label>
                    <textarea id="ckEditor" class="form-control"
                              name="content" placeholder="Content" required><?php echo old('content'); ?></textarea>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Add Widget</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
</div>