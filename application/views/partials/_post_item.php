<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Post row item-->
<div class="post-item">

    <?php if (isset($show_label)): ?>

        <?php $post_category = get_post_category($post); ?>

        <a href="<?php echo base_url(); ?>category/<?php echo html_escape($post_category['name_slug']); ?>/<?php echo html_escape($post_category['id']); ?>">
            <label class="category-label" style="background-color: <?php echo html_escape($post_category['color']); ?>"><?php echo html_escape($post_category['name']); ?></label>
        </a>

    <?php endif; ?>

    <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>">
        <img src="<?php echo base_url() . html_escape($post->image_mid); ?>" alt="<?php echo html_escape($post->title); ?>" class="img-responsive post-image"/>
    </a>

    <h3 class="title">
        <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>">
            <?php echo html_escape(character_limiter($post->title, 55, '...')); ?>
        </a>
    </h3>
    <p class="post-meta">
        <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($post->user_slug); ?>"><?php echo html_escape($post->username); ?></a>
        <span><?php echo helper_date_format($post->created_at); ?></span>
        <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($post->id); ?></span>
        <?php if ($settings->show_hits): ?>
            <span><i class="fa fa-eye"></i><?php echo $post->hit; ?></span>
        <?php endif; ?>
    </p>

    <p class="description">
        <?php echo html_escape(character_limiter($post->summary, 80, '...')); ?>
    </p>
</div>