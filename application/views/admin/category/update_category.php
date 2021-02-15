<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Category</h3>
                <br>
                <small>You can update category from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('category/update_category_post'); ?>

            <input type="hidden" name="id" value="<?php echo html_escape($category->id); ?>">
            <input type="hidden" name="parent_id" value="0">

            <div class="box-body">

                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Category Name"
                           value="<?php echo html_escape($category->name); ?>" maxlength="200" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Category Slug
                        <small>(If you leave it blank, it will be generated automatically.)</small>
                    </label>
                    <input type="text" class="form-control" name="name_slug" placeholder="Category Slug"
                           value="<?php echo html_escape($category->name_slug); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Category Description (Meta Tag)</label>
                    <input type="text" class="form-control" name="description"
                           placeholder="Category Description (Meta Tag)" value="<?php echo html_escape($category->description); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Category Keywords (Meta Tag)</label>
                    <input type="text" class="form-control" name="keywords"
                           placeholder="Category Keywords (Meta Tag)" value="<?php echo html_escape($category->keywords); ?>">
                </div>

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Category Color</label>
                    <div class="input-group my-colorpicker">
                        <input type="text" class="form-control" name="color" maxlength="200" value="<?php echo html_escape($category->color); ?>" placeholder="Select Color"
                               required>
                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div><!-- /.input group -->
                </div><!-- /.form group -->

                <div class="form-group">
                    <label>Category Order</label>
                    <input type="number" class="form-control" name="category_order" placeholder="Category Order"
                           value="<?php echo html_escape($category->category_order); ?>" min="0" max="99999" required>
                </div>

                <div class="form-group">
                    <label>Category Block Style</label>

                    <div class="row m-b-15">
                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center m-b-15">
                                <input type="radio" name="block_type" value="block-1" class="square-purple" <?php echo ($category->block_type == 'block-1') ? 'checked' : ''; ?> >
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/block-1.png" alt="" class="img-responsive">
                        </div>
                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center m-b-15">
                                <input type="radio" name="block_type" value="block-2" class="square-purple" <?php echo ($category->block_type == 'block-2') ? 'checked' : ''; ?>>
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/block-2.png" alt="" class="img-responsive">
                        </div>

                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center m-b-15">
                                <input type="radio" name="block_type" value="block-3" class="square-purple" <?php echo ($category->block_type == 'block-3') ? 'checked' : ''; ?>>
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/block-3.png" alt="" class="img-responsive">
                        </div>
                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center m-b-15">
                                <input type="radio" name="block_type" value="block-4" class="square-purple" <?php echo ($category->block_type == 'block-4') ? 'checked' : ''; ?>>
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/block-4.png" alt="" class="img-responsive">
                        </div>
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
