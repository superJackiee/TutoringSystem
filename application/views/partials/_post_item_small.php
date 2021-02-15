<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Post item small-->
<div class="post-item-small">
    <div class="left">
        <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>">
            <img src="<?php echo base_url() . html_escape($post->image_small); ?>" alt="<?php echo html_escape($post->title); ?>" class="img-responsive"/>
        </a>
    </div>
    <div class="right">
        <h3 class="title">
            <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>">
                <?php echo html_escape(character_limiter($post->title, 55, '...')); ?>
            </a>
        </h3>
        <p class="small-post-meta">
            <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($post->user_slug); ?>"><?php echo html_escape($post->username); ?></a>
            <span><?php echo helper_date_format($post->created_at); ?></span>
            <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($post->id); ?></span>
            <?php if ($settings->show_hits): ?>
                <span><i class="fa fa-eye"></i><?php echo $post->hit; ?></span>
            <?php endif; ?>
        </p>
    </div>
</div>