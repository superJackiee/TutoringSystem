<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-5 col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Category</h3>
                <br>
                <small>You can add a new category from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('category/add_category_post'); ?>

            <input type="hidden" name="parent_id" value="0">

            <div class="box-body">

                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages_form'); ?>

                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Category Name"
                           value="<?php echo old('name'); ?>" maxlength="200" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Category Slug <small>(If you leave it blank, it will be generated automatically.)</small> </label>
                    <input type="text" class="form-control" name="name_slug" placeholder="Category Slug"
                           value="<?php echo old('name_slug'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Category Description (Meta Tag)</label>
                    <input type="text" class="form-control" name="description"
                           placeholder="Category Description (Meta Tag)" value="<?php echo old('description'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Category Keywords (Meta Tag)</label>
                    <input type="text" class="form-control" name="keywords"
                           placeholder="Category Keywords (Meta Tag)" value="<?php echo old('keywords'); ?>">
                </div>

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Category Color</label>
                    <div class="input-group my-colorpicker">
                        <input type="text" class="form-control" name="color" maxlength="200" placeholder="Select Color" required>
                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div><!-- /.input group -->
                </div><!-- /.form group -->

                <div class="form-group">
                    <label>Category Order</label>
                    <input type="number" class="form-control" name="category_order" placeholder="Category Order"
                           value="<?php echo old('category_order'); ?>" min="1" max="99999" required>
                </div>

                <div class="form-group">
                    <label>Category Block Style</label>

                    <div class="row m-b-15">
                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center m-b-15">
                                <input type="radio" name="block_type" value="block-1" class="square-purple" checked>
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/block-1.png" alt="" class="img-responsive">
                        </div>
                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center m-b-15">
                                <input type="radio" name="block_type" value="block-2" class="square-purple">
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/block-2.png" alt="" class="img-responsive">
                        </div>

                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center m-b-15">
                                <input type="radio" name="block_type" value="block-3" class="square-purple">
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/block-3.png" alt="" class="img-responsive">
                        </div>
                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center m-b-15">
                                <input type="radio" name="block_type" value="block-4" class="square-purple">
                            </div>
                            <img src="<?php echo base_url(); ?>assets/admin/img/block-4.png" alt="" class="img-responsive">
                        </div>
                    </div>

                </div>


            </div>


            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Add Category</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>


    <div class="col-md-7 col-sm-12">
        <div class="box">
            <div class="box-header">
                <div class="pull-left">
                    <h3 class="box-title">Categories</h3>
                    <br>
                    <small>You can see all categories on this table</small>
                </div>
            </div><!-- /.box-header -->

            <!-- include message block -->
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th width="20">Id</th>
                                    <th>Category Name</th>
                                    <th>Category Order</th>
                                    <th>Category Color</th>
                                    <th class="max-width-120">Options</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($categories as $item): ?>
                                    <tr>
                                        <td><?php echo html_escape($item->id); ?></td>
                                        <td><?php echo html_escape($item->name); ?></td>
                                        <td><?php echo html_escape($item->category_order); ?></td>
                                        <td>
                                            <div style="width: 60px; height: 30px; background-color:<?php echo html_escape($item->color); ?> ;"></div>
                                        </td>
                                        <td>
                                            <!--Form delete category-->
                                            <?php echo form_open('category/delete_category_post'); ?>

                                            <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                            <div class="dropdown">
                                                <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                        type="button"
                                                        data-toggle="dropdown">Select an option
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>admin/update-category/<?php echo html_escape($item->id); ?>"><i
                                                                    class="fa fa-edit i-edit"></i>Edit</a></li>
                                                    <li>
                                                        <a class="p0">
                                                            <button type="submit" class="btn-list-button"
                                                                    onclick="return confirm('Are you sure you want to delete this category?');">
                                                                <i class="fa fa-trash i-delete"></i>Delete
                                                            </button>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            </form><!--Form end-->

                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
