<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">Posts</h3>
            <br>
            <small class="pull-left">You can see posts here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/add-post" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                Add New Post
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
                            <th>Category</th>
                            <th>Author</th>
                            <th>&nbsp;</th>
                            <th>Date Added</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($posts as $item): ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td>
                                    <img src="<?php echo base_url() . html_escape($item->image_small); ?>" alt="">
                                </td>
                                <td class="break-word"><?php echo html_escape($item->title); ?></td>
                                <td>
                                    <?php $category = helper_get_category($item->category_id);
                                    if (!empty($category)): ?>
                                        <label class="category-label m-r-5 label-table" style="background-color: <?php echo html_escape($category->color); ?>!important;">
                                            <?php echo html_escape($category->name); ?>
                                        </label>
                                    <?php endif; ?>

                                    <?php $category = helper_get_category($item->subcategory_id);
                                    if (!empty($category)): ?>
                                        <label class="category-label label-table" style="background-color: <?php echo html_escape($category->color); ?>">
                                            <?php echo html_escape($category->name); ?>
                                        </label>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php $author = get_user($item->user_id);
                                    if (!empty($author)): ?>
                                        <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($author->slug); ?>" target="_blank">
                                            <strong><?php echo html_escape($author->username); ?></strong>
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td class="td-post-sp">
                                    <?php if ($item->visibility == 1): ?>
                                        <label class="label label-success label-table"><i class="fa fa-eye"></i></label>
                                    <?php else: ?>
                                        <label class="label label-danger label-table"><i class="fa fa-eye"></i></label>
                                    <?php endif; ?>

                                    <?php if ($item->is_slider): ?>
                                        <label class="label bg-red label-table">Slider</label>
                                    <?php endif; ?>

                                    <?php if ($item->is_featured): ?>
                                        <label class="label bg-olive label-table">Featured</label>
                                    <?php endif; ?>

                                    <?php if ($item->is_recommended): ?>
                                        <label class="label bg-aqua label-table">Recommended</label>
                                    <?php endif; ?>

                                    <?php if ($item->is_breaking): ?>
                                        <label class="label bg-teal label-table">Breaking</label>
                                    <?php endif; ?>

                                    <?php if ($item->need_auth): ?>
                                        <label class="label label-warning label-table">Only Registered</label>
                                    <?php endif; ?>

                                </td>

                                <td><?php echo nice_date($item->created_at, 'd.m.Y'); ?></td>

                                <td>
                                    <!-- form delete user -->
                                    <?php echo form_open('post/post_options_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown">Select an option
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu pull-right options-list">
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/update-post/<?php echo html_escape($item->id); ?>">
                                                    <i class="fa fa-edit i-edit"></i>Edit</a>
                                            </li>

                                            <?php if ($item->is_slider == 1): ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="add-remove-from-slider" class="btn-list-button">
                                                            <i class="fa fa-times i-delete"></i>Remove from Slider
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="add-remove-from-slider" class="btn-list-button">
                                                            <i class="fa fa-plus i-delete"></i>Add to Slider
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if ($item->is_featured == 1): ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="add-remove-from-featured" class="btn-list-button">
                                                            <i class="fa fa-times i-delete"></i>Remove from Featured
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="add-remove-from-featured" class="btn-list-button">
                                                            <i class="fa fa-plus i-delete"></i>Add to Featured
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if ($item->is_breaking == 1): ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="add-remove-from-breaking" class="btn-list-button">
                                                            <i class="fa fa-times i-delete"></i>Remove from Breaking
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="add-remove-from-breaking" class="btn-list-button">
                                                            <i class="fa fa-plus i-delete"></i>Add to Breaking
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if ($item->is_recommended == 1): ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="add-remove-from-recommended" class="btn-list-button">
                                                            <i class="fa fa-times i-delete"></i>Remove from Recommended
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="add-remove-from-recommended" class="btn-list-button">
                                                            <i class="fa fa-plus i-delete"></i>Add to Recommended
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <li>
                                                <a class="p0">
                                                    <button type="submit" name="option" value="delete"
                                                            class="btn-list-button"
                                                            onclick="return confirm('Are you sure you want to delete this post?');">
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