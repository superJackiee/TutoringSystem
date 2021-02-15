<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">Polls</h3>
            <br>
            <small class="pull-left">You can see polls here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/add-poll" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                Add New Poll
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
                            <th>Question</th>
                            <th></th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($polls as $item): ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td class="break-word"><?php echo html_escape($item->question); ?></td>
                                <td>
                                    <button class="btn btn-info btn-xs" data-toggle="modal"
                                            data-target="#pollModal<?php echo html_escape($item->id); ?>">View Result
                                    </button>
                                </td>
                                <td>
                                    <?php if ($item->status == 1): ?>
                                        <label class="label label-success">Active</label>
                                    <?php else: ?>
                                        <label class="label label-danger">Inactive</label>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo nice_date($item->created_at, 'd.m.Y'); ?></td>

                                <td>
                                    <!-- form delete -->
                                    <?php echo form_open('poll/delete_poll_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown">Select an option
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu options-list">
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/update-poll/<?php echo html_escape($item->id); ?>">
                                                    <i class="fa fa-edit i-edit"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a class="p0">
                                                    <button type="submit" name="option" value="delete"
                                                            class="btn-list-button"
                                                            onclick="return confirm('Are you sure you want to delete this poll?');">
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


<?php foreach ($polls as $poll): ?>

    <!-- Modal -->
    <div id="pollModal<?php echo $poll->id; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo html_escape($poll->question); ?></h4>
                </div>

                <div class="modal-body">
                    <div class="poll">

                        <div class="result">
                            <?php $total_vote = get_total_vote_count($poll->id); ?>

                            <p class="text-center"><strong>Total Vote: <?php echo $total_vote; ?></strong></p>

                            <?php for ($i = 1; $i <= 10; $i++):
                                $option = "option" . $i;

                                $percent = 0;

                                if (!empty($poll->$option)):
                                    $option_vote = get_option_vote_count($poll->id, $option);

                                    if ($total_vote > 0) {
                                        $percent = round(($option_vote * 100) / $total_vote);
                                    }

                                    ?>

                                    <span><?php echo html_escape($poll->$option); ?></span>

                                    <?php if ($percent == 0): ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-0" role="progressbar" aria-valuenow="<?php echo $total_vote; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent; ?>%">
                                            <span><?php echo $percent; ?>%&nbsp;&nbsp;(Vote: 0)</span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $total_vote; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent; ?>%">
                                            <?php echo $percent; ?>%&nbsp;&nbsp;(Vote: <?php echo $option_vote; ?>)
                                        </div>
                                    </div>
                                <?php endif; ?>

                                    <?php
                                endif;
                            endfor; ?>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>


            </div>

        </div>
    </div>

<?php endforeach; ?>