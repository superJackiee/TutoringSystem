<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Post</h3>
                <br>
                <small>You can update post from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('post/update_post_post', ['onkeypress' => 'return event.keyCode != 13;']); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <input type="hidden" name="id" value="<?php echo html_escape($post->id); ?>">
                <input type="hidden" name="redirect_url" value="<?php echo html_escape($this->input->get('redirect_url')); ?>">

                <div class="form-group">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title"
                           value="<?php echo html_escape($post->title); ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Title Slug
                        <small>(If you leave it blank, it will be generated automatically.)</small>
                    </label>
                    <input type="text" class="form-control" name="title_slug" placeholder="Title Slug"
                           value="<?php echo html_escape($post->title_slug); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Keywords (Meta Tag)</label>
                    <input type="text" class="form-control" name="keywords"
                           placeholder="Keywords (Meta Tag)" value="<?php echo html_escape($post->keywords); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Summary</label>
                    <textarea class="form-control text-area" name="summary"
                              placeholder="Summary"><?php echo html_escape($post->summary); ?></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Category</label>
                    <select name="category_id" class="form-control max-600" onchange="get_sub_categories(this.value);" required>
                        <option value="">Select a category</option>
                        <?php foreach ($categories as $item): ?>
                            <?php if ($item->id == $post->category_id): ?>
                                <option value="<?php echo html_escape($item->id); ?>"
                                        selected><?php echo html_escape($item->name); ?></option>
                            <?php else: ?>
                                <option value="<?php echo html_escape($item->id); ?>"><?php echo html_escape($item->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="subcategories">
                    <div class="form-group">
                        <label class="control-label">Subcategory</label>
                        <select name="subcategory_id" class="form-control max-600">
                            <option value="">Select a category</option>
                            <?php foreach ($subcategories as $item): ?>
                                <?php if ($item->id == $post->subcategory_id): ?>
                                    <option value="<?php echo html_escape($item->id); ?>"
                                            selected><?php echo html_escape($item->name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo html_escape($item->id); ?>"><?php echo html_escape($item->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <?php if (is_admin()): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Page Visibility</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_visibility_1" name="visibility" value="1" class="square-purple" <?php echo ($post->visibility == 1) ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="rb_visibility_1" class="cursor-pointer">Show</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_visibility_2" name="visibility" value="0" class="square-purple" <?php echo ($post->visibility == 0) ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="rb_visibility_2" class="cursor-pointer">Hide</label>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="visibility" value="<?php echo $post->visibility; ?>">
                <?php endif; ?>


                <?php if (is_admin()): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label class="control-label">Add to Featured Posts</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="checkbox" name="is_featured" value="1" class="square-purple" <?php echo ($post->is_featured == 1) ? 'checked' : ''; ?>>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="is_featured" value="<?php echo $post->is_featured; ?>">
                <?php endif; ?>


                <?php if (is_admin()): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label class="control-label">Add to Breaking News</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="checkbox" name="is_breaking" value="1" class="square-purple" <?php echo ($post->is_breaking == 1) ? 'checked' : ''; ?>>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="is_breaking" value="<?php echo $post->is_breaking; ?>">
                <?php endif; ?>

                <?php if (is_admin()): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label class="control-label">Add to Slider</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="checkbox" name="is_slider" value="1" class="square-purple" <?php echo ($post->is_slider == 1) ? 'checked' : ''; ?>>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="is_slider" value="<?php echo $post->is_slider; ?>">
                <?php endif; ?>


                <?php if (is_admin()): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label class="control-label">Add to Recommended Posts</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="checkbox" name="is_recommended" value="1" class="square-purple" <?php echo ($post->is_recommended == 1) ? 'checked' : ''; ?>>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="is_recommended" value="<?php echo $post->is_recommended; ?>">
                <?php endif; ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <label class="control-label">Show Only to Registered Users</label>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <input type="checkbox" name="need_auth" value="1" class="square-purple" <?php echo ($post->need_auth == 1) ? 'checked' : ''; ?>>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label">Tags</label>
                    <input id="tags-input" type="text" name="tags" data-role="tagsinput"
                           class="form-control" value="<?php echo html_escape($tags); ?>"/>
                    <small>(Type tag and hit enter)</small>
                </div>

                <div class="form-group">
                    <label class="control-label">Optional Url</label>
                    <input type="text" class="form-control"
                           name="optional_url" placeholder="Optional Url"
                           value="<?php echo html_escape($post->optional_url); ?>">
                </div>


                <div class="form-group">
                    <label class="control-label">Main Image</label>

                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?php echo base_url() . $post->image_default; ?>" class="img-thumbnail" alt="">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12">
                            <a class='btn btn-sm bg-purple'>
                                Change image
                                <input type="file" id="Multifileupload" name="file" size="40" class="uploadFile"
                                       accept=".png, .jpg, .jpeg, .gif">
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div id="MultidvPreview">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label">Additional Images</label>

                    <div class="row" style="margin-top: 10px;">
                        <div id="delete-image-response">
                            <?php foreach ($post_images as $image): ?>
                                <div class="col-sm-3">
                                    <div class="img-preview-box">
                                        <a class="btn btn-danger btn-delete-image" onclick="deletePostImage('<?php echo $image->id ?>');"><i class="fa fa-trash"></i></a>
                                        <img src="<?php echo base_url() . $image->image_default ?>" class="img-thumbnail" alt="">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12">
                            <a class='btn btn-sm bg-purple'>
                                Add images
                                <input type="file" id="Multifileupload1" name="add_file[]" size="40"
                                       class="uploadFile" accept=".png, .jpg, .jpeg, .gif" multiple>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div id="MultidvPreview1">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label">Content</label>
                    <textarea id="ckEditor" class="form-control"
                              name="content" placeholder="Content"><?php echo html_escape($post->content); ?></textarea>
                </div>

                <div id="image-upload-response"></div>

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

<?php if (auth_check() && user()->role != "admin"): ?>
    <div class="callout callout-danger">
        <h4>Warning!</h4>
        <p>Update will require admin approval.</p>
    </div>
<?php endif; ?>
