<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">Videos</h3>
            <br>
            <small class="pull-left">You can see videos here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/add-video" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                Add New Video
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Visibility</th>
                            <th>Date Added</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($videos as $item): ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td>
                                    <?php if (empty($item->image_url)): ?>
                                        <img src="<?php echo base_url() . html_escape($item->image_default); ?>" alt="" style="max-width: 140px; max-height:98px;">
                                    <?php else: ?>
                                        <img src="<?php echo html_escape($item->image_url); ?>" alt="" style="max-width: 140px; max-height:98px;">
                                    <?php endif; ?>
                                </td>

                                <td class="break-word"><?php echo html_escape($item->title); ?></td>
                                <td>
                                    <?php $author = get_user($item->user_id);
                                    if (!empty($author)): ?>
                                        <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($author->slug); ?>" target="_blank">
                                            <strong><?php echo html_escape($author->username); ?></strong>
                                        </a>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php if ($item->visibility == 1): ?>
                                        <label class="label label-success"><i class="fa fa-eye"></i></label>
                                    <?php else: ?>
                                        <label class="label label-danger"><i class="fa fa-eye"></i></label>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo nice_date($item->created_at, 'd.m.Y'); ?></td>

                                <td>
                                    <!-- form delete -->
                                    <?php echo form_open('video/video_options_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown">Select an option
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu options-list">
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/update-video/<?php echo html_escape($item->id); ?>">
                                                    <i class="fa fa-edit i-edit"></i>Edit</a></li>
                                            <li>
                                                <a class="p0">
                                                    <button type="submit" name="option" value="delete"
                                                            class="btn-list-button"
                                                            onclick="return confirm('Are you sure you want to delete this video?');">
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