<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Subcategory</h3>
                <br>
                <small>You can update the subcategory from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('category/update_subcategory_post'); ?>

            <input type="hidden" name="id" value="<?php echo html_escape($category->id); ?>">

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

                <div class="form-group">
                    <label>Parent Category</label>
                    <select class="form-control" name="parent_id" required>
                        <option value="">Select</option>
                        <?php foreach ($top_categories as $item): ?>
                            <option value="<?php echo $item->id; ?>" <?php echo ($category->parent_id == $item->id) ? 'selected' : ''; ?>><?php echo $item->name; ?></option>
                        <?php endforeach; ?>
                    </select>
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
