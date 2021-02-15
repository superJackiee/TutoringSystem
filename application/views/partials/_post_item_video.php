<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Post row item-->
<div class="post-item">
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