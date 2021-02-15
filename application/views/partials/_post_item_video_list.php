<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Check list type-->
<?php if ($vsettings->post_list_style == "vertical"): ?>
    <!--Post row item-->
    <div class="col-sm-6 col-xs-12">
        <div class="post-item">

            <?php if (isset($show_label)): ?>
                <a href="<?php echo base_url(); ?>videos">
                    <label class="category-label video-label"><?php echo trans("label_video") ?></label>
                </a>
            <?php endif; ?>



            <a href="<?php echo base_url(); ?>video/<?php echo html_escape($video->title_slug); ?>/<?php echo html_escape($video->id); ?>">

                <div class="video-image">

                    <img src="<?php echo base_url(); ?>assets/img/video_bg.jpg" alt="<?php echo html_escape($video->title); ?>" class="img-responsive video-bg">

                    <!--If image from url-->
                    <?php if (empty($video->image_url)): ?>

                        <img src="<?php echo base_url() . html_escape($video->image_default); ?>" alt="<?php echo html_escape($video->title); ?>" class="img-responsive video-img">

                    <?php else: ?>

                        <img src="<?php echo html_escape($video->image_url); ?>" alt="<?php echo html_escape($video->title); ?>" class="img-responsive video-img">

                    <?php endif; ?>

                    <a href="#" class="icon-video"><i class="fa fa-play"></i></a>

                </div>
            </a>

            <h3 class="title">
                <a href="<?php echo base_url(); ?>video/<?php echo html_escape($video->title_slug); ?>/<?php echo html_escape($video->id); ?>">
                    <?php echo html_escape(character_limiter($video->title, 55, '...')); ?>
                </a>
            </h3>
            <p class="post-meta">
                <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($video->user_slug); ?>"><?php echo html_escape($video->username); ?></a>
                <span><?php echo helper_date_format($video->created_at); ?></span>
                <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($video->id); ?></span>
                <?php if ($settings->show_hits): ?>
                    <span><i class="fa fa-eye"></i><?php echo $video->hit; ?></span>
                <?php endif; ?>
            </p>

            <p class="description">
                <?php echo html_escape(character_limiter($video->summary, 80, '...')); ?>
            </p>
        </div>
    </div>
<?php else: ?>
    <!--Post row item-->
    <div class="col-sm-12 col-xs-12">
        <div class="row">
            <div class="post-item-horizontal">

                <?php if (isset($show_label)): ?>
                    <a href="<?php echo base_url(); ?>videos">
                        <label class="category-label video-label"><?php echo trans("label_video") ?></label>
                    </a>
                <?php endif; ?>

                <div class="col-sm-5 col-xs-12 item-image">
                    <a href="<?php echo base_url(); ?>video/<?php echo html_escape($video->title_slug); ?>/<?php echo html_escape($video->id); ?>">

                        <div class="video-image">

                            <img src="<?php echo base_url(); ?>assets/img/video_bg.jpg" alt="<?php echo html_escape($video->title); ?>" class="img-responsive video-bg">

                            <!--If image from url-->
                            <?php if (empty($video->image_url)): ?>

                                <img src="<?php echo base_url() . html_escape($video->image_default); ?>" alt="<?php echo html_escape($video->title); ?>" class="img-responsive video-img">

                            <?php else: ?>

                                <img src="<?php echo html_escape($video->image_url); ?>" alt="<?php echo html_escape($video->title); ?>" class="img-responsive video-img">

                            <?php endif; ?>

                            <a href="#" class="icon-video"><i class="fa fa-play"></i></a>

                        </div>
                    </a>
                </div>

                <div class="col-sm-7 col-xs-12 item-content">

                    <h3 class="title">
                        <a href="<?php echo base_url(); ?>post/<?php echo html_escape($video->title_slug); ?>/<?php echo html_escape($video->id); ?>">
                            <?php echo html_escape(character_limiter($video->title, 55, '...')); ?>
                        </a>
                    </h3>
                    <p class="small-post-meta">
                        <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($video->user_slug); ?>"><?php echo html_escape($video->username); ?></a>
                        <span><?php echo helper_date_format($video->created_at); ?></span>
                        <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($video->id); ?></span>
                        <?php if ($settings->show_hits): ?>
                            <span><i class="fa fa-eye"></i><?php echo $video->hit; ?></span>
                        <?php endif; ?>
                    </p>
                    <p class="description">
                        <?php echo html_escape(character_limiter($video->summary, 130, '...')); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>








