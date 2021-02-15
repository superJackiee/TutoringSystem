<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">
            <!-- breadcrumb -->
            <?php if ($post->post_type == "video"): ?>

                <div class="col-sm-12 page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>video"><?php echo trans("breadcrumb_videos") ?></a>
                        </li>

                        <li class="breadcrumb-item active">
                            <?php echo html_escape(character_limiter($post->title, 160, '...')); ?>
                        </li>
                    </ol>
                </div>

            <?php else: ?>

                <div class="col-sm-12 page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                        </li>
                        <?php if (!empty($category)): ?>
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url(); ?>category/<?php echo html_escape($category->name_slug); ?>/<?php echo html_escape($category->id); ?>">
                                    <?php echo html_escape($category->name); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($subcategory)): ?>
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url(); ?>category/<?php echo html_escape($subcategory->name_slug); ?>/<?php echo html_escape($subcategory->id); ?>">
                                    <?php echo html_escape($subcategory->name); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="breadcrumb-item active"> <?php echo html_escape(character_limiter($post->title, 160, '...')); ?></li>
                    </ol>
                </div>
            <?php endif; ?>

            <div id="content" class="col-sm-8 col-xs-12">

                <!-- Check if it is video -->
                <?php if ($post->post_type == "video"): ?>

                    <!-- Icnlude video post details -->
                    <?php $this->load->view('partials/_post_details_video', ['post' => $post]); ?>

                <?php else: ?>

                    <!-- Icnlude post details -->
                    <?php $this->load->view('partials/_post_details', ['post' => $post]); ?>

                <?php endif; ?>


                <section id="comments" class="section section-related-posts">
                    <?php $this->load->view('partials/_comments', ['comments' => $comments]); 										?>
                </section>

                <!--Comment Box-->
                <section class="section section-make-comment">
                    <h4 class="title"><?php echo trans("title_leave_reply"); ?></h4>
                    <div class="section-content section-comment">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php if (auth_check()): ?>
                                    <!-- form make comment -->
                                    <form id="make-comment" method="post">
                                        <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo user()->id; ?>">
                                        <input type="hidden" name="parent_id" value="0">

                                        <div class="form-group margin-top-15">
                                            <textarea id="parent-comment-text" class="form-control form-input form-textarea" name="comment" maxlength="4999"
                                                      placeholder="<?php echo html_escape(trans("placeholder_comment")); ?>"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-custom pull-right">
                                                <?php echo html_escape(trans("btn_submit")); ?>
                                            </button>

                                        </div>
                                    </form><!-- form end -->
                                <?php else: ?>
                                    <div class="form-group margin-top-15">
                                        <textarea class="form-control form-input form-textarea" name="comment" maxlength="4999"
                                                  placeholder="<?php echo html_escape(trans("placeholder_comment")); ?>"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <a href="#" data-toggle="modal" data-target="#modal-login" class="btn btn-primary btn-custom pull-right">
                                            <?php echo html_escape(trans("btn_submit")); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div id="sidebar" class="col-sm-4 col-xs-12">
                <!--include sidebar -->
                <?php $this->load->view('partials/_sidebar'); ?>

            </div>
        </div>
    </div>


</div>
<!-- /.Section: wrapper -->