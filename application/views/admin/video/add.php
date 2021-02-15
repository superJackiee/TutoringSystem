<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header">
                <div class="left">
                    <h3 class="box-title">Add Video</h3>
                    <br>
                    <small>You can add a new video from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/videos" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        View Videos
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('video/add_video_post', ['onkeypress' => 'return event.keyCode != 13;']); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title"
                           value="<?php echo old('title'); ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Title Slug
                        <small>(If you leave it blank, it will be generated automatically.)</small>
                    </label>
                    <input type="text" class="form-control" name="title_slug" placeholder="Title Slug"
                           value="<?php echo old('title_slug'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Keywords (Meta Tag)</label>
                    <input type="text" class="form-control" name="keywords"
                           placeholder="Keywords (Meta Tag)" value="<?php echo old('keywords'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Summary</label>
                    <textarea class="form-control text-area"
                              name="summary" placeholder="Summary"><?php echo old('summary'); ?></textarea>

                </div>

                <div class="form-group">
                    <label class="control-label">Video Embed Code
                        <small>(Example: https://www.youtube.com/embed/kgj76ujhfdj)</small>
                    </label>
                    <textarea class="form-control text-embed"
                              name="embed_code" placeholder="Video Embed Code" required><?php echo old('embed_code'); ?></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Video Thumbnails
                        <small>(Image for video)</small>
                    </label>
                    <div class="row">
                        <div class="col-sm-12 m-b-15">
                            <a class='btn btn-success btn-sm'>
                                Select image
                                <input type="file" id="Multifileupload" name="file" size="40" class="uploadFile"
                                       accept=".png, .jpg, .jpeg, .gif">
                            </a>
                        </div>

                        <div class="col-sm-12">
                            <div id="MultidvPreview"></div>
                        </div>


                        <div class="col-sm-12 m-b-15">
                            <label>Or<br></label>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="image_url" placeholder="Add Image Url"
                                   value="<?php echo old('image_url'); ?>">
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
                                <input type="radio" id="rb_visibility_1" name="visibility" value="1" class="square-purple" checked>&nbsp;&nbsp;
                                <label for="rb_visibility_1" class="cursor-pointer">Show</label>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                <input type="radio" id="rb_visibility_2" name="visibility" value="0" class="square-purple">&nbsp;&nbsp;
                                <label for="rb_visibility_2" class="cursor-pointer">Hide</label>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="visibility" value="0">
                <?php endif; ?>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <label class="control-label">Show Only to Registered Users</label>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <input type="checkbox" name="need_auth" value="1" class="square-purple" <?php echo (old('need_auth') == 1) ? 'checked' : ''; ?>>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tags</label>
                    <input id="tags-input" type="text" name="tags" data-role="tagsinput" class="form-control"/>
                    <small>(Type tag and hit enter)</small>
                </div>

                <div class="form-group">
                    <label class="control-label">Optional Url</label>
                    <input type="text" class="form-control"
                           name="optional_url" placeholder="Optional Url"
                           value="<?php echo old('optional_url'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Content</label>
                    <textarea id="ckEditor" class="form-control"
                              name="content" placeholder="Content" required><?php echo old('content'); ?></textarea>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Add Video</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->

        </div>
    </div>
</div>
