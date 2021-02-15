<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Featured Slider-->
<div class="owl-carousel featured-slider" id="featured-slider">

    <?php foreach ($featured_slider_posts as $post): ?>

        <?php $category = get_post_category($post); ?>

        <div class="featured-slider-item">

            <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>" class="img-link">
                <img src="<?php echo base_url() . $post->image_slider; ?>" class="img-responsive" alt="<?php echo html_escape($post->title); ?>"/>
            </a>

            <div class="caption">

                <a href="<?php echo base_url(); ?>category/<?php echo html_escape($category['name_slug']); ?>/<?php echo html_escape($category['id']); ?>">
                    <label class="category-label"
                           style="background-color: <?php echo html_escape($category['color']); ?>"><?php echo html_escape($category['name']); ?></label>
                </a>

                <h2 class="title">
                    <?php echo html_escape(character_limiter($post->title, 120, '...')); ?>
                </h2>

                <p class="post-meta">
                    <span class="span-author"><a href="<?php echo base_url(); ?>profile/<?php echo html_escape($post->user_slug); ?>"><?php echo html_escape($post->username); ?></a></span>
                    <span><?php echo helper_date_format($post->created_at); ?></span>
                    <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($post->id); ?></span>
                    <?php if ($settings->show_hits): ?>
                        <span><i class="fa fa-eye"></i><?php echo $post->hit; ?></span>
                    <?php endif; ?>
                </p>
            </div>


        </div>

    <?php endforeach; ?>

</div>