<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Video</h3>
                <br>
                <small>You can update video from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('video/update_video_post', ['onkeypress' => 'return event.keyCode != 13;']); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <input type="hidden" name="id" value="<?php echo html_escape($video->id); ?>">
                <input type="hidden" name="user_id" value="<?php echo html_escape($video->user_id); ?>">
                <input type="hidden" name="image_default" value="<?php echo html_escape($video->image_default); ?>">

                <div class="form-group">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title"
                           value="<?php echo html_escape($video->title); ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Title Slug
                        <small>(If you leave it blank, it will be generated automatically.)</small>
                    </label>
                    <input type="text" class="form-control" name="title_slug" placeholder="Title Slug"
                           value="<?php echo html_escape($video->title_slug); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Keywords (Meta Tag)</label>
                    <input type="text" class="form-control" name="keywords"
                           placeholder="Keywords (Meta Tag)" value="<?php echo html_escape($video->keywords); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Summary</label>
                    <textarea class="form-control text-area" name="summary"
                              placeholder="Summary"><?php echo html_escape($video->summary); ?></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Video Embed Code
                        <small>(Example: https://www.youtube.com/embed/kgj76ujhfdj)</small>
                    </label>
                    <textarea class="form-control text-embed"
                              name="embed_code" placeholder="Video Embed Code" required><?php echo html_escape($video->embed_code); ?></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Video Thumbnails
                        <small>(Image for video)</small>
                    </label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo base_url() . html_escape($video->image_default); ?>" alt=""
                                     class="thumbnail img-responsive">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm'>
                                    Change image
                                    <input type="file" id="Multifileupload" name="file" size="40"
                                           class="uploadFile" accept=".png, .jpg, .jpeg, .gif">
                                </a>
                            </div>
                        </div>

                        <div id="MultidvPreview"></div>

                        <div class="row">
                            <div class="col-sm-12 m-b-15">
                                <label>Or<br></label>
                            </div>
                            <div class="col-sm-12 m-b-15">
                                <input type="text" class="form-control" name="image_url" placeholder="Add Image Url"
                                       value="<?php echo html_escape($video->image_url); ?>">
                            </div>
                        </div>

                    </div>
                </div>

                <?php if (is_admin()): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 col-lang">
                                <label>Video Visibility</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_visibility_1" name="visibility" value="1" class="square-purple" <?php echo ($video->visibility == 1) ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="rb_visibility_1" class="cursor-pointer">Show</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_visibility_2" name="visibility" value="0" class="square-purple" <?php echo ($video->visibility == 0) ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="rb_visibility_2" class="cursor-pointer">Hide</label>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="visibility" value="<?php echo $video->visibility; ?>">
                <?php endif; ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <label class="control-label">Show Only to Registered Users</label>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <input type="checkbox" name="need_auth" value="1" class="square-purple" <?php echo ($video->need_auth == 1) ? 'checked' : ''; ?>>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tags</label>
                    <input id="tags-input" type="text" name="tags" data-role="tagsinput" class="form-control" value="<?php echo $tags; ?>"/>
                    <small>(Type tag and hit enter)</small>
                </div>

                <div class="form-group">
                    <label class="control-label">Optional Url</label>
                    <input type="text" class="form-control"
                           name="optional_url" placeholder="Optional Url"
                           value="<?php echo html_escape($video->optional_url); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Content</label>
                    <textarea id="ckEditor" class="form-control"
                              name="content" placeholder="Content" required><?php echo $video->content; ?></textarea>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->

        </div>
    </div>
</div>

<?php if (auth_check() && user()->role != "admin"): ?>
    <div class="callout callout-danger">
        <h4>Warning!</h4>
        <p>Update will require admin approval.</p>
    </div>
<?php endif; ?>
