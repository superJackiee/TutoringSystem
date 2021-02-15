<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.bundle.min.js"></script>
<section class="user_section dashboard_sec">
      	<div class="container">
<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">Pages</h3>
            <br>
            <small class="pull-left">You can see the pages here.</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/add-page" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                Add New Page
            </a>
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
                            <th>Page Title</th>
                            <th>Page Visibility</th>
                            <th>Page Type</th>
                            <th>Date Added</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($pages as $item): ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td><?php echo html_escape($item->title); ?></td>
                                <td>
                                    <?php if ($item->visibility == 1): ?>
                                        <label class="label label-success"><i class="fa fa-eye"></i></label>
                                    <?php else: ?>
                                        <label class="label label-danger"><i class="fa fa-eye"></i></label>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($item->is_custom == 1): ?>
                                        <label class="label bg-teal">Custom</label>
                                    <?php else: ?>
                                        <label class="label label-default">Default</label>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo nice_date($item->created_at, 'd.m.Y'); ?></td>

                                <td>
                                    <!-- form delete page-->
                                    <?php echo form_open('page/delete_page_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown">Select an option
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/update-page/<?php echo html_escape($item->id); ?>">
                                                    <i class="fa fa-edit i-edit"></i>Edit</a>
                                            </li>

                                            <li>
                                                <a class="p0">
                                                    <button type="submit" class="btn-list-button"
                                                            onclick="return confirm('Are you sure you want to delete this page?');">
                                                        <i class="fa fa-trash i-delete"></i>Delete
                                                    </button>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                    <?php echo form_close(); ?><!-- form end -->

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

</section>
</div>
<style>
.form-inline {
display: -ms-flexbox;
display: contents !important;
}
</style>