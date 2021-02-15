<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="user_section dashboard_sec">
      	<div class="container">
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Page</h3>
                <br>
                <small>You can update page from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('page/update_page_post'); ?>

            <input type="hidden" name="id" value="<?php echo html_escape($page->id); ?>">

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label class="control-label">Page Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Page Title"
                           value="<?php echo html_escape($page->title); ?>" required>
                </div>

                <?php if ($page->is_custom == 1): ?>
                    <div class="form-group">
                        <label class="control-label">Page Slug
                            <small>(If you leave it blank, it will be generated automatically.)</small>
                        </label>
                        <input type="text" class="form-control" name="slug" placeholder="Page Slug"
                               value="<?php echo html_escape($page->slug); ?>">
                    </div>
                <?php else: ?>
                    <input type="hidden" name="slug" value="<?php echo html_escape($page->slug); ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label class="control-label">Page Description</label>
                    <input type="text" class="form-control" name="description"
                           placeholder="Page Description (Meta Tag)"
                           value="<?php echo html_escape($page->description); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Page Keywords (Meta Tag)</label>
                    <input type="text" class="form-control" name="keywords"
                           placeholder="Page Keywords (Meta Tag)" value="<?php echo html_escape($page->keywords); ?>">
                </div>

                <?php if ($page->slug != "index" && $page->slug != "register" && $page->slug != "login" && $page->slug != "reset-password" && $page->slug != "update-profile" && $page->slug != "change-password" && $page->slug != "posts" && $page->slug != "rss-channels" && $page->slug != "reading-list" && $page->slug != "user-agreement"): ?>
                    <!-- <div class="form-group">
                        <label>Page Order</label>
                        <input type="number" class="form-control" name="page_order" placeholder="Page Order"
                               value="<?php echo html_escape($page->page_order); ?>" min="1" max="99999"
                               style="width: 300px;max-width: 100%;">
                    </div> -->
                <?php else: ?>
                    <input type="hidden" name="page_order" value="<?php echo html_escape($page->page_order); ?>">
                <?php endif; ?>


                <?php if ($page->slug != "index" && $page->slug != "video" && $page->slug != "register" && $page->slug != "login" && $page->slug != "posts" && $page->slug != "reset-password" && $page->slug != "update-profile" && $page->slug != "change-password" && $page->slug != "rss-channels" && $page->slug != "reading-list" && $page->slug != "user-agreement"): ?>
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Page Location</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="location" value="top" id="menu_top"
                                       class="square-purple" <?php echo ($page->location == "top") ? 'checked' : ''; ?>>
                                <label for="menu_top" class="option-label">Top Menu</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="location" value="main" id="manu_main"
                                       class="square-purple" <?php echo ($page->location == "main") ? 'checked' : ''; ?>>
                                <label for="manu_main" class="option-label">Main Menu</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="location" value="footer" id="menu_footer"
                                       class="square-purple" <?php echo ($page->location == "footer") ? 'checked' : ''; ?>>
                                <label for="menu_footer" class="option-label">Footer</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="location" value="none" id="menu_none"
                                       class="square-purple" <?php echo ($page->location == "none") ? 'checked' : ''; ?>>
                                <label for="menu_none" class="option-label">Don't Add to Menu</label>
                            </div>
                        </div>
                    </div> -->
                <?php else: ?>
                    <input type="hidden" name="location" value="<?php echo html_escape($page->location); ?>">
                <?php endif; ?>


                <?php if ($page->slug != "index" && $page->slug != "register" && $page->slug != "login" && $page->slug != "reading-list" && $page->slug != "posts" && $page->slug != "reset-password" && $page->slug != "update-profile" && $page->slug != "change-password"): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Page Visibility</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="visibility" value="1" id="page_enabled"
                                       class="square-purple" <?php echo ($page->visibility == 1) ? 'checked' : ''; ?>>
                                <label for="page_enabled" class="option-label">Show</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="visibility" value="0" id="page_disabled"
                                       class="square-purple" <?php echo ($page->visibility == 0) ? 'checked' : ''; ?>>
                                <label for="page_disabled" class="option-label">Hide</label>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="visibility" value="<?php echo html_escape($page->visibility); ?>">
                <?php endif; ?>

                <?php if ($page->slug != "index" && $page->slug != "register" && $page->slug != "login" && $page->slug != "reading-list" && $page->slug != "reset-password" && $page->slug != "update-profile" && $page->slug != "change-password" && $page->slug != "user-agreement"): ?>
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Show Page Only to Registered Users</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="need_auth" value="1" id="need_auth_enabled"
                                       class="square-purple" <?php echo ($page->need_auth == 1) ? 'checked' : ''; ?>>
                                <label for="need_auth_enabled" class="option-label">Yes</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="need_auth" value="0" id="need_auth_disabled"
                                       class="square-purple" <?php echo ($page->need_auth == 0) ? 'checked' : ''; ?>>
                                <label for="need_auth_disabled" class="option-label">No</label>
                            </div>
                        </div>
                    </div> -->
                <?php else: ?>
                    <input type="hidden" name="need_auth" value="<?php echo html_escape($page->need_auth); ?>">
                <?php endif; ?>

                <?php if ($page->slug != "index" && $page->slug != "register" && $page->slug != "login" && $page->slug != "reset-password" && $page->slug != "update-profile" && $page->slug != "change-password"): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Page Title Visibility</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="title_active" value="1" id="title_enabled"
                                       class="square-purple" <?php echo ($page->title_active == 1) ? 'checked' : ''; ?>>
                                <label for="title_enabled" class="option-label">Show</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="title_active" value="0" id="title_disabled"
                                       class="square-purple" <?php echo ($page->title_active == 0) ? 'checked' : ''; ?>>
                                <label for="title_disabled" class="option-label">Hide</label>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="title_active" value="<?php echo html_escape($page->title_active); ?>">
                <?php endif; ?>

                <?php if ($page->slug != "index" && $page->slug != "register" && $page->slug != "login" && $page->slug != "reset-password" && $page->slug != "change-password" && $page->slug != "update-profile"): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Page Breadcrumb Visibility</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="breadcrumb_active" value="1" id="breadcrumb_enabled"
                                       class="square-purple" <?php echo ($page->breadcrumb_active == 1) ? 'checked' : ''; ?>>
                                <label for="breadcrumb_enabled" class="option-label">Show</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="breadcrumb_active" value="0" id="breadcrumb_disabled"
                                       class="square-purple" <?php echo ($page->breadcrumb_active == 0) ? 'checked' : ''; ?>>
                                <label for="breadcrumb_disabled" class="option-label">Hide</label>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="breadcrumb_active"
                           value="<?php echo html_escape($page->breadcrumb_active); ?>">
                <?php endif; ?>

                <?php if ($page->slug != "index" && $page->slug != "gallery" && $page->slug != "register" && $page->slug != "login" && $page->slug != "reset-password" && $page->slug != "update-profile" && $page->slug != "change-password" && $page->slug != "contact" && $page->slug != "posts" && $page->slug != "videos" && $page->slug != "rss-channels" && $page->slug != "reading-list" && $page->slug != "user-agreement" && $page->slug != "user-agreement"): ?>
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Right Column Visibility</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="right_column_active" value="1" id="right_column_enabled"
                                       class="square-purple" <?php echo ($page->right_column_active == 1) ? 'checked' : ''; ?>>
                                <label for="right_column_enabled" class="option-label">Show</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" name="right_column_active" value="0" id="right_column_disabled"
                                       class="square-purple" <?php echo ($page->right_column_active == 0) ? 'checked' : ''; ?>>
                                <label for="right_column_disabled" class="option-label">Hide</label>
                            </div>
                        </div>
                    </div> -->
                <?php else: ?>
                    <input type="hidden" name="right_column_active"
                           value="<?php echo html_escape($page->right_column_active); ?>">
                <?php endif; ?>

                <?php if ($page->is_custom == 1 || $page->slug == "user-agreement" || $page->slug == "rss-channels"): ?>
                    <div class="form-group" style="margin-top: 60px;">
                        <label>Page Content</label>
                        <textarea id="ckEditor" class="form-control" name="page_content"
                                  placeholder="Content"><?php echo $page->page_content; ?></textarea>
                    </div>
                <?php endif; ?>

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
</div>

</section>
