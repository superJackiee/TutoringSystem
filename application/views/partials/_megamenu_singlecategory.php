<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
//get category posts
$video_posts = helper_get_last_posts_by_category($item->id, 5);
?>

<li class="dropdown megamenu-fw mega-li-<?php echo $item->id; ?> <?php echo (uri_string() == 'category/' . html_escape($item->name_slug) . '/' . html_escape($item->id)) ? 'active' : ''; ?>">
    <a href="<?php echo base_url(); ?>category/<?php echo html_escape($item->name_slug) ?>/<?php echo html_escape($item->id) ?>" class="dropdown-toggle disabled"
       data-toggle="dropdown" role="button" aria-expanded="false"><?php echo html_escape($item->name); ?>
        <span class="caret"></span>
    </a>

    <!--Check if has posts-->
    <?php if (count($video_posts) > 0): ?>
        <ul class="dropdown-menu megamenu-content" role="menu" data-mega-ul="<?php echo $item->id; ?>">
            <li>
                <div class="col-sm-12">
                    <div class="row">

                        <div class="sub-menu-right sub-menu-video">
                            <div class="row row-menu-right">

                                <?php foreach ($video_posts as $post): ?>

                                    <div class="col-sm-3 menu-post-item">

                                        <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>">
                                            <img src="<?php echo base_url() . html_escape($post->image_mid); ?>" alt="<?php echo html_escape($post->title); ?>" class="img-responsive">
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

                                    </div>

                                <?php endforeach; ?>

                            </div>
                        </div>

                    </div>
                </div>
            </li>
        </ul>
    <?php endif; ?>
</li>


