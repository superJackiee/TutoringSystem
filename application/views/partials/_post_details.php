<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="post-content">

    <?php if (!empty($subcategory)): ?>

        <p class="m-0">
            <a href="<?php echo base_url(); ?>category/<?php echo html_escape($subcategory->name_slug) ?>/<?php echo html_escape($subcategory->id) ?>">
                <label class="category-label" style="background-color: <?php echo html_escape($subcategory->color); ?>">
                    <?php echo html_escape($subcategory->name); ?>
                </label>
            </a>
        </p>

    <?php else: ?>

        <?php if (!empty($category)): ?>
            <p class="m-0">
                <a href="<?php echo base_url(); ?>category/<?php echo html_escape($category->name_slug) ?>/<?php echo html_escape($category->id) ?>">
                    <label class="category-label" style="background-color: <?php echo html_escape($category->color); ?>">
                        <?php echo html_escape($category->name); ?>
                    </label>
                </a>
            </p>
        <?php endif; ?>

    <?php endif; ?>


    <h1 class="title"><?php echo html_escape($post->title); ?></h1>

    <p class="post-meta">
        <span class="post-author-meta sp-left">
            <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($post->user_slug); ?>">
                <img src="<?php echo get_user_avatar_by_id($post->user_id); ?>" alt="<?php echo html_escape($post->username); ?>">
                <?php echo html_escape($post->username); ?>
            </a>
        </span>
        <span class="sp-left"><?php echo helper_date_format($post->created_at); ?></span>
        <?php if ($settings->show_hits): ?>
            <span class="sp-right"><i class="fa fa-eye"></i><?php echo $post->hit; ?></span>
        <?php endif; ?>
        <span class="sp-right"><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($post->id); ?></span>
    </p>

    <div class="post-share">
        <!--include Social Share -->
        <?php $this->load->view('partials/_post_share_box'); ?>
    </div>

    <div class="post-image">
        <?php if ($post_image_count > 0) : ?>
            <!-- owl-carousel -->
            <div class="owl-carousel post-detail-slider" id="post-detail-slider">

                <div class="post-detail-slider-item">
                    <a class="image-popup-no-title lightbox" href="<?php echo base_url() . $post->image_big; ?>" title="<?php echo html_escape($post->title); ?>">
                        <img src="<?php echo base_url() . html_escape($post->image_default); ?>"
                             class="img-responsive center-image"
                             alt="<?php echo html_escape($post->title); ?>"/>
                    </a>
                </div>

                <!--List  random slider posts-->
                <?php foreach ($post_images as $image): ?>
                    <!-- slider item -->
                    <div class="post-detail-slider-item">

                        <a class="image-popup-no-title lightbox" href="<?php echo base_url() . $image->image_big; ?>" title="<?php echo html_escape($post->title); ?>">
                            <img src="<?php echo base_url() . html_escape($image->image_default); ?>"
                                 class="img-responsive center-image"
                                 alt="<?php echo html_escape($post->title); ?>"/>
                        </a>

                    </div>
                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <?php if (!empty($post->image_default)): ?>
                <a class="image-popup-no-title lightbox" href="<?php echo base_url() . $post->image_big; ?>" title="<?php echo html_escape($post->title); ?>">
                    <img src="<?php echo base_url() . html_escape($post->image_default); ?>"
                         class="img-responsive center-image"
                         alt="<?php echo html_escape($post->title); ?>"/>
                </a>
            <?php endif; ?>

        <?php endif; ?>


    </div>

    <div class="post-text">
        <?php echo $post->content; ?>
    </div>

    <!--Optional Url Button -->
    <?php if (!empty($post->optional_url)) : ?>
        <div class="optional-url-cnt">
                <a href="<?php echo html_escape($post->optional_url); ?>" class="btn btn-primary btn-custom" target="_blank">
                    <?php echo html_escape($settings->optional_url_button_name); ?>
                </a>
        </div>
    <?php endif; ?>

    <div class="post-tags">
        <h2 class="tags-title"><?php echo trans("title_post_tags"); ?></h2>
        <ul class="tag-list">
            <?php foreach ($post_tags as $tag) : ?>
                <li>
                    <a href="<?php echo base_url() . 'tag/' . html_escape($tag->tag_slug); ?>">
                        <?php echo html_escape($tag->tag); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="post-share post-share-bottom">
        <div class="share-left">
            <h3 class="share-title"><i class="fa fa-share-alt"></i> <?php echo trans("title_share"); ?></h3>
        </div>
        <div class="share-right">
            <!--include Social Share -->
            <?php $this->load->view('partials/_post_share_box'); ?>
        </div>
    </div>

</div>

<!--include next previous post -->
<?php $this->load->view('partials/_post_next_prev', ['previous_post' => $previous_post, 'next_post' => $next_post]); ?>

<!--Include banner-->
<?php $this->load->view('partials/_ad_spaces', ['ad' => "post_details"]); ?>

<!--include about author -->
<?php $this->load->view('partials/_post_about_author', ['post_user' => $post_user]); ?>


<section class="section section-related-posts">
    <div class="section-head">
        <h4 class="title"><?php echo trans("title_related_posts"); ?></h4>
    </div>

    <div class="section-content">
        <div class="row">
            <?php $i = 0; ?>
            <?php foreach ($related_posts as $item): ?>

                <?php if ($i > 0 && $i % 2 == 0): ?>
                    <div class="col-sm-12"></div>
                <?php endif; ?>

                <!--include post item-->
                <div class="col-sm-6 col-xs-12">
                    <?php $this->load->view("partials/_post_item", ["post" => $item]); ?>
                </div>

                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>






