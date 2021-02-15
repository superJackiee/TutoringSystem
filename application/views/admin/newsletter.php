<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Send Email to Registered Emails</h3>
                <br>
                <small>You can send email to registered emails from this form</small>
            </div>
            <!-- /.box-header -->


            <!-- form start -->
            <?php echo form_open('admin/newsletter_send_email_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea id="ckEditor" name="message" class="form-control textarea-exp" required></textarea>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Send Email</button>
            </div>
            <!-- /.box-footer -->

            <?php echo form_close(); ?><!-- form end -->

        </div>
        <!-- /.box -->
    </div>
</div>


<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">Registered Emails</h3>
            <br>
            <small class="pull-left">You can see the registered emails here.</small>
        </div>
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th width="20">Id</th>
                            <th>Email</th>
                            <th>Date Added</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($newsletter as $item): ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td><?php echo html_escape($item->email); ?></td>
                                <td><?php echo nice_date($item->created_at, 'd.m.Y'); ?></td>

                                <td>
                                    <!-- form delete email -->
                                    <?php echo form_open('admin/delete_newsletter_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown">Select an option
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="p0">
                                                    <button type="submit" class="btn-list-button"
                                                            onclick="return confirm('Are you sure you want to delete this email?');">
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
