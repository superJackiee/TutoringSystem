<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="featured">
    <div class="container">

        <div class="featured-left">
            <!--Include Featured Slider-->
            <?php $this->load->view('partials/_featured_slider'); ?>
        </div>

        <div class="featured-right">
            <?php $count = 1; ?>
            <?php foreach ($featured_posts as $item): ?>

                <?php if ($count < 5): ?>
                    <div class="col-sm-6 col-xs-6 featured-box-<?php echo $count; ?>">
                        <div class="featured-box">
                            <a href="<?php echo base_url(); ?>post/<?php echo html_escape($item->title_slug); ?>/<?php echo html_escape($item->id); ?>">
                                <img src="<?php echo base_url() . $item->image_slider; ?>" class="img-responsive" alt="<?php echo html_escape($item->title); ?>"/>
                                <div class="overlay"></div>
                                <div class="caption">
                                    <h3 class="title">
                                        <?php echo html_escape(character_limiter($item->title, 50, '...')); ?>
                                    </h3>

                                    <p class="post-meta">
                                        <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($item->user_slug); ?>"><?php echo html_escape($item->username); ?></a>
                                        <span><?php echo helper_date_format($item->created_at); ?></span>
                                        <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($item->id); ?></span>
                                        <?php if ($settings->show_hits): ?>
                                            <span><i class="fa fa-eye"></i><?php echo $item->hit; ?></span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php $count++; ?>
            <?php endforeach; ?>
        </div>

    </div>
</div>