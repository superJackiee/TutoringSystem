<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Widget: Our Picks-->
<div class="sidebar-widget">
    <div class="widget-head">
        <h4 class="title"><?php echo html_escape($widget->title); ?></h4>
    </div>
    <div class="widget-body">

        <?php foreach ($polls as $poll): ?>
            <?php if ($poll->status == 1): ?>

                <div id="poll_<?php echo $poll->id; ?>" class="poll">

                    <div class="question">
                        <form data-form-id="<?php echo $poll->id; ?>" class="poll-form" method="post">
                            <input type="hidden" name="poll_id" value="<?php echo $poll->id; ?>">
                            <h5 class="title"><?php echo html_escape($poll->question); ?></h5>
                            <?php
                            for ($i = 1; $i <= 10; $i++):
                                $option = "option" . $i;
								
                                if (!empty($poll->$option)): ?>
                                    <p class="option">
                                        <input type="radio" name="option" value="<?php echo $option; ?>" class="flat-blue" required>
                                        <span><?php echo html_escape($poll->$option); ?></span>
                                    </p>
                                    <?php
                                endif;
                            endfor; ?>

                            <?php if (auth_check()): ?>
                                <p class="button-cnt">
                                    <button type="submit" class="btn btn-primary btn-custom btn-custom-sm"><?php echo trans("vote"); ?></button>
                                    <a onclick="view_poll_results('<?php echo $poll->id; ?>');" class="a-view-results"><?php echo trans("view_results"); ?></a>
                                </p>
                            <?php else: ?>
                                <p class="button-cnt">
                                    <button type="button" class="btn btn-primary btn-custom btn-custom-sm" data-toggle="modal" data-target="#modal-login"><?php echo trans("vote"); ?></button>
                                    <a href="#" class="a-view-results" data-toggle="modal" data-target="#modal-login"><?php echo trans("view_results"); ?></a>
                                </p>
                            <?php endif; ?>

                            <div id="poll-error-message-<?php echo $poll->id; ?>" class="poll-error-message">
                                <?php echo trans("voted_message"); ?>
                            </div>
                        </form>

                    </div>

                    <div class="result" id="poll-results-<?php echo $poll->id; ?>">
                        <h5 class="title"><?php echo html_escape($poll->question); ?></h5>

                        <?php $total_vote = get_total_vote_count($poll->id); ?>

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
                                        <span><?php echo $percent; ?>%&nbsp;&nbsp;(<?php echo trans("vote"); ?>: 0)</span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $total_vote; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent; ?>%">
                                        <?php echo $percent; ?>%&nbsp;&nbsp;(<?php echo trans("vote"); ?>: <?php echo $option_vote; ?>)
                                    </div>
                                </div>
                            <?php endif; ?>

                                <?php
                            endif;
                        endfor; ?>

                        <p>
                            <a onclick="view_poll_options('<?php echo $poll->id; ?>');" class="a-view-results m-0"><?php echo trans("view_options"); ?></a>
                        </p>
                    </div>

                </div>

            <?php endif; ?>
        <?php endforeach; ?>

    </div>
</div>