<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ad Spaces</h3>
                <br>
                <small>You can update ad spaces from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('admin/ads_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <h4>Header Ad Space</h4>
                    <label class="control-label">728x90</label>
                    <textarea class="form-control text-area" name="header_728"
                              placeholder="Paste Ad Code"><?php echo $ads->header_728; ?></textarea>
                    <br>

                    <label class="control-label">468x60</label>


                    <textarea class="form-control text-area" name="header_468"
                              placeholder="Paste Ad Code"><?php echo $ads->header_468; ?></textarea>

                    <br>
                    <label class="control-label">234x60</label>


                    <textarea class="form-control text-area" name="header_234"
                              placeholder="Paste Ad Code"><?php echo $ads->header_234; ?></textarea>
                    <br>
                </div>

                <div class="form-group">
                    <h4>Index Ad Space (Top)</h4>
                    <label class="control-label">728x90</label>
                    <textarea class="form-control text-area" name="index_728_top"
                              placeholder="Paste Ad Code"><?php echo $ads->index_728_top; ?></textarea>
                    <br>

                    <label class="control-label">468x60</label>


                    <textarea class="form-control text-area" name="index_468_top"
                              placeholder="Paste Ad Code"><?php echo $ads->index_468_top; ?></textarea>

                    <br>
                    <label class="control-label">234x60</label>


                    <textarea class="form-control text-area" name="index_234_top"
                              placeholder="Paste Ad Code"><?php echo $ads->index_234_top; ?></textarea>
                    <br>
                </div>

                <div class="form-group">
                    <h4>Index Ad Space (Bottom)</h4>
                    <label class="control-label">728x90</label>
                    <textarea class="form-control text-area" name="index_728_bottom"
                              placeholder="Paste Ad Code"><?php echo $ads->index_728_bottom; ?></textarea>
                    <br>

                    <label class="control-label">468x60</label>


                    <textarea class="form-control text-area" name="index_468_bottom"
                              placeholder="Paste Ad Code"><?php echo $ads->index_468_bottom; ?></textarea>

                    <br>
                    <label class="control-label">234x60</label>


                    <textarea class="form-control text-area" name="index_234_bottom"
                              placeholder="Paste Ad Code"><?php echo $ads->index_234_bottom; ?></textarea>
                    <br>
                </div>

                <div class="form-group">
                    <h4>Posts Page Ad Space</h4>
                    <label class="control-label">728x90</label>
                    <textarea class="form-control text-area" name="posts_728"
                              placeholder="Paste Ad Code"><?php echo $ads->posts_728; ?></textarea>
                    <br>

                    <label class="control-label">468x60</label>

                    <textarea class="form-control text-area" name="posts_468"
                              placeholder="Paste Ad Code"><?php echo $ads->posts_468; ?></textarea>

                    <br>
                    <label class="control-label">234x60</label>


                    <textarea class="form-control text-area" name="posts_234"
                              placeholder="Paste Ad Code"><?php echo $ads->posts_234; ?></textarea>
                    <br>
                </div>

                <div class="form-group">
                    <h4>Videos Page Ad Space</h4>
                    <label class="control-label">728x90</label>
                    <textarea class="form-control text-area" name="videos_728"
                              placeholder="Paste Ad Code"><?php echo $ads->videos_728; ?></textarea>
                    <br>

                    <label class="control-label">468x60</label>

                    <textarea class="form-control text-area" name="videos_468"
                              placeholder="Paste Ad Code"><?php echo $ads->videos_468; ?></textarea>

                    <br>
                    <label class="control-label">234x60</label>


                    <textarea class="form-control text-area" name="videos_234"
                              placeholder="Paste Ad Code"><?php echo $ads->videos_234; ?></textarea>
                    <br>
                </div>

                <div class="form-group">
                    <h4>Category Page Ad Space</h4>
                    <label class="control-label">728x90</label>
                    <textarea class="form-control text-area" name="category_728"
                              placeholder="Paste Ad Code"><?php echo $ads->category_728; ?></textarea>
                    <br>

                    <label class="control-label">468x60</label>

                    <textarea class="form-control text-area" name="category_468"
                              placeholder="Paste Ad Code"><?php echo $ads->category_468; ?></textarea>

                    <br>
                    <label class="control-label">234x60</label>


                    <textarea class="form-control text-area" name="category_234"
                              placeholder="Paste Ad Code"><?php echo $ads->category_234; ?></textarea>
                    <br>
                </div>

                <div class="form-group">
                    <h4>Tag Page Ad Space</h4>
                    <label class="control-label">728x90</label>
                    <textarea class="form-control text-area" name="tag_728"
                              placeholder="Paste Ad Code"><?php echo $ads->tag_728; ?></textarea>
                    <br>

                    <label class="control-label">468x60</label>

                    <textarea class="form-control text-area" name="tag_468"
                              placeholder="Paste Ad Code"><?php echo $ads->tag_468; ?></textarea>

                    <br>
                    <label class="control-label">234x60</label>
                    <textarea class="form-control text-area" name="tag_234"
                              placeholder="Paste Ad Code"><?php echo $ads->tag_234; ?></textarea>
                    <br>
                </div>

                <div class="form-group">
                    <h4>Search Page Ad Space</h4>
                    <label class="control-label">728x90</label>
                    <textarea class="form-control text-area" name="search_728"
                              placeholder="Paste Ad Code"><?php echo $ads->search_728; ?></textarea>
                    <br>

                    <label class="control-label">468x60</label>

                    <textarea class="form-control text-area" name="search_468"
                              placeholder="Paste Ad Code"><?php echo $ads->search_468; ?></textarea>

                    <br>
                    <label class="control-label">234x60</label>
                    <textarea class="form-control text-area" name="search_234"
                              placeholder="Paste Ad Code"><?php echo $ads->search_234; ?></textarea>
                    <br>
                </div>

                <div class="form-group">
                    <h4>Post Details Page Ad Space</h4>
                    <label class="control-label">728x90</label>
                    <textarea class="form-control text-area" name="post_details_728"
                              placeholder="Paste Ad Code"><?php echo $ads->post_details_728; ?></textarea>
                    <br>

                    <label class="control-label">468x60</label>

                    <textarea class="form-control text-area" name="post_details_468"
                              placeholder="Paste Ad Code"><?php echo $ads->post_details_468; ?></textarea>

                    <br>
                    <label class="control-label">234x60</label>
                    <textarea class="form-control text-area" name="post_details_234"
                              placeholder="Paste Ad Code"><?php echo $ads->post_details_234; ?></textarea>
                    <br>
                </div>

                <div class="form-group">
                    <h4>Sidebar Ad Space</h4>
                    <label class="control-label">300x250</label>
                    <textarea class="form-control text-area" name="sidebar_300"
                              placeholder="Paste Ad Code"><?php echo $ads->sidebar_300; ?></textarea>
                    <br>

                    <label class="control-label">234x60</label>


                    <textarea class="form-control text-area" name="sidebar_234"
                              placeholder="Paste Ad Code"><?php echo $ads->sidebar_234; ?></textarea>
                    <br>
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

<style>
    h4 {
        color: #0d6aad;
        text-align: left;
        font-weight: 600;
        margin-bottom: 30px;
    }
</style>