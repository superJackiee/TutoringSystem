<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
//get category posts
$category_posts = helper_get_last_posts_by_category($item->id, 4);
?>

<li class="dropdown megamenu-fw mega-li-<?php echo $item->id; ?> <?php echo (uri_string() == 'category/' . html_escape($item->name_slug) . '/' . html_escape($item->id)) ? 'active' : ''; ?>">
    <a href="<?php echo base_url(); ?>category/<?php echo html_escape($item->name_slug) ?>/<?php echo html_escape($item->id); ?>" class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo html_escape($item->name); ?> <span
                class="caret"></span></a>

    <!--Check if has posts-->
    <?php if (count($category_posts) > 0): ?>
        <ul class="dropdown-menu megamenu-content" role="menu" aria-expanded="true" data-mega-ul="<?php echo $item->id; ?>">
            <li>
                <div class="sub-menu-left">
                    <ul class="nav-sub-categories">
                        <li data-category-filter="all" class="li-sub-category active">
                            <a href="<?php echo base_url(); ?>category/<?php echo html_escape($item->name_slug) ?>/<?php echo html_escape($item->id); ?>">
                                <?php echo trans("all"); ?>
                            </a>
                        </li>

                        <!--Subcategories-->
                        <?php foreach (helper_get_subcategories($item->id) as $sub): ?>
                            <li data-category-filter="<?php echo html_escape($sub->name_slug); ?>-<?php echo html_escape($sub->id); ?>" class="li-sub-category">
                                <a href="<?php echo base_url(); ?>category/<?php echo html_escape($sub->name_slug) ?>/<?php echo html_escape($sub->id); ?>">
                                    <?php echo html_escape($sub->name); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

                <div class="sub-menu-right">

                    <!--All-->
                    <div class="sub-menu-inner filter-all active">
                        <div class="row row-menu-right">

                            <!--Posts-->
                            <?php foreach ($category_posts as $post): ?>

                                <div class="col-sm-3 menu-post-item">
                                    <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>">
                                        <img src="<?php echo base_url() . html_escape($post->image_mid); ?>" class="img-responsive"
                                             alt="<?php echo html_escape($post->title); ?>"/>
                                    </a>

                                    <h3 class="title">
                                        <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>"><?php echo html_escape(character_limiter($post->title, 50, '...')); ?></a>
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


                    <!--Subcategories-->
                    <?php foreach (helper_get_subcategories($item->id) as $sub): ?>
                        <div class="sub-menu-inner filter-<?php echo html_escape($sub->name_slug); ?>-<?php echo html_escape($sub->id); ?>">
                            <div class="row row-menu-right">

                                <!--Posts-->
                                <?php foreach (helper_get_last_posts_by_subcategory($sub->id, 4) as $post): ?>

                                    <div class="col-sm-3 menu-post-item">
                                        <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>">
                                            <img src="<?php echo base_url() . html_escape($post->image_mid); ?>" class="img-responsive"
                                                 alt="<?php echo html_escape($post->title); ?>"/>
                                        </a>
                                        <h3 class="title">
                                            <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>"><?php echo html_escape(character_limiter($post->title, 50, '...')); ?></a>
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
                    <?php endforeach; ?>

                </div>


            </li>
        </ul>
    <?php endif; ?>
</li>