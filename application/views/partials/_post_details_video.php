<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="post-content">

    <p class="m-0">
        <a href="<?php echo base_url(); ?>videos">
            <label class="category-label video-label"><?php echo trans("label_video") ?></label>
        </a>
    </p>

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

    <div class="post-image post-video">
        <iframe width="750" height="422" src="<?php echo $post->embed_code; ?>" frameborder="0" allowfullscreen></iframe>
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
        <h4 class="title"><?php echo trans("title_related_videos"); ?></h4>
    </div>

    <div class="section-content">
        <div class="row">
            <?php $i = 0; ?>
            <?php foreach ($related_posts as $video): ?>

                <?php if ($i > 0 && $i % 2 == 0): ?>
                    <div class="col-sm-12"></div>
                <?php endif; ?>

                <!--include post item -->
                <div class="col-sm-6">
                    <?php $this->load->view('partials/_post_item_video', ['video' => $video]); ?>
                </div>

                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
