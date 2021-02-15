<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Update Poll</h3>
                <br>
                <small>You can update poll from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('poll/update_poll_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <input type="hidden" name="id" value="<?php echo html_escape($poll->id); ?>">

                <div class="form-group">
                    <label class="control-label">Question</label>
                    <textarea class="form-control text-area"
                              name="question" placeholder="Question" required><?php echo html_escape($poll->question); ?></textarea>

                </div>

                <div class="form-group">
                    <label class="control-label">Option 1</label>
                    <input type="text" class="form-control" name="option1" placeholder="Option 1"
                           value="<?php echo html_escape($poll->option1); ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Option 2</label>
                    <input type="text" class="form-control" name="option2" placeholder="Option 2"
                           value="<?php echo html_escape($poll->option2); ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Option 3</label>
                    <input type="text" class="form-control" name="option3" placeholder="Option 3 (Optional)"
                           value="<?php echo html_escape($poll->option3); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Option 4</label>
                    <input type="text" class="form-control" name="option4" placeholder="Option 4 (Optional)"
                           value="<?php echo html_escape($poll->option4); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Option 5</label>
                    <input type="text" class="form-control" name="option5" placeholder="Option 5 (Optional)"
                           value="<?php echo html_escape($poll->option5); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Option 6</label>
                    <input type="text" class="form-control" name="option6" placeholder="Option 6 (Optional)"
                           value="<?php echo html_escape($poll->option6); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Option 7</label>
                    <input type="text" class="form-control" name="option7" placeholder="Option 7 (Optional)"
                           value="<?php echo html_escape($poll->option7); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Option 8</label>
                    <input type="text" class="form-control" name="option8" placeholder="Option 8 (Optional)"
                           value="<?php echo html_escape($poll->option8); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Option 9</label>
                    <input type="text" class="form-control" name="option9" placeholder="Option 9 (Optional)"
                           value="<?php echo html_escape($poll->option9); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Option 10</label>
                    <input type="text" class="form-control" name="option10" placeholder="Option 10 (Optional)"
                           value="<?php echo html_escape($poll->option10); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Status</label>
                    <div class="col-sm-12" style="margin-bottom: 15px;">
                        <div class="row">
                            <div class="visibility-radio">
                                <input type="radio" id="radio1" name="status" value="1" class="square-purple" <?php echo ($poll->status == "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="radio1" class="cursor-pointer">Active</label>
                            </div>
                            <div class="visibility-radio">
                                <input type="radio" id="radio2" name="status" value="0" class="square-purple" <?php echo ($poll->status == "0") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                                <label for="radio2" class="cursor-pointer">Inactive</label>
                            </div>
                        </div>
                    </div>
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