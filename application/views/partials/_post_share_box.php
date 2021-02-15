<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ($post->post_type == "video"): ?>
    <ul class="share-box">
        <li class="share-li-lg">
            <a href="javascript:void(0)"
               onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>video/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-lg facebook">
                <i class="fa fa-facebook"></i>
                <span><?php echo trans("facebook"); ?></span>
            </a>
        </li>

        <li class="share-li-lg">
            <a href="javascript:void(0)"
               onclick="window.open('https://twitter.com/share?url=<?php echo base_url(); ?>video/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>&amp;text=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-lg twitter">
                <i class="fa fa-twitter"></i>
                <span><?php echo trans("twitter"); ?></span>
            </a>
        </li>
        <li class="share-li-lg">
            <a href="javascript:void(0)"
               onclick="window.open('https://plus.google.com/share?url=<?php echo base_url(); ?>video/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-lg google">
                <i class="fa fa-google-plus"></i>
                <span><?php echo trans("google"); ?></span>
            </a>
        </li>


        <li class="share-li-sm">
            <a href="javascript:void(0)"
               onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>video/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm facebook">
                <i class="fa fa-facebook"></i>
            </a>
        </li>

        <li class="share-li-sm">
            <a href="javascript:void(0)"
               onclick="window.open('https://twitter.com/share?url=<?php echo base_url(); ?>video/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>&amp;text=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm twitter">
                <i class="fa fa-twitter"></i>
            </a>
        </li>

        <li class="share-li-sm">
            <a href="javascript:void(0)"
               onclick="window.open('https://plus.google.com/share?url=<?php echo base_url(); ?>video/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm google">
                <i class="fa fa-google-plus"></i>
            </a>
        </li>

        <li>
            <a href="javascript:void(0)"
               onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo base_url(); ?>video/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm linkedin">
                <i class="fa fa-linkedin"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)"
               onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo base_url(); ?>video/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>&amp;media=<?php echo base_url() . html_escape($post->image_default); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm pinterest">
                <i class="fa fa-pinterest"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)"
               onclick="window.open('http://www.tumblr.com/share/link?url=<?php echo base_url(); ?>video/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>&amp;title=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm tumblr">
                <i class="fa fa-tumblr"></i>
            </a>
        </li>


        <!--Add to Reading List-->
        <?php if (auth_check()) : ?>

            <?php if ($is_reading_list == false) : ?>
                <li>
                    <a href="javascript:void(0)" class="social-btn-sm add-reading-list" data-toggle-tool="tooltip" data-placement="top" title="<?php echo html_escape(trans("add_reading_list")); ?>"
                       onclick="add_delete_from_reading_list('<?php echo $post->id; ?>');">
                        <i class="fa fa-star"></i>
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="javascript:void(0)" class="social-btn-sm remove-reading-list" data-toggle-tool="tooltip" data-placement="top" title="<?php echo html_escape(trans("delete_reading_list")); ?>"
                       onclick="add_delete_from_reading_list('<?php echo $post->id; ?>');">
                        <i class="fa fa-star"></i>
                    </a>
                </li>
            <?php endif; ?>

        <?php else: ?>
            <li>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-login" data-toggle-tool="tooltip" data-placement="top" title="<?php echo html_escape(trans("add_reading_list")); ?>"
                   class="social-btn-sm add-reading-list">
                    <i class="fa fa-star"></i>
                </a>
            </li>
        <?php endif; ?>

    </ul>
<?php else: ?>
    <ul class="share-box">
        <li class="share-li-lg">
            <a href="javascript:void(0)"
               onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-lg facebook">
                <i class="fa fa-facebook"></i>
                <span><?php echo trans("facebook"); ?></span>
            </a>
        </li>

        <li class="share-li-lg">
            <a href="javascript:void(0)"
               onclick="window.open('https://twitter.com/share?url=<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>&amp;text=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-lg twitter">
                <i class="fa fa-twitter"></i>
                <span><?php echo trans("twitter"); ?></span>
            </a>
        </li>
        <li class="share-li-lg">
            <a href="javascript:void(0)"
               onclick="window.open('https://plus.google.com/share?url=<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-lg google">
                <i class="fa fa-google-plus"></i>
                <span><?php echo trans("google"); ?></span>
            </a>
        </li>


        <li class="share-li-sm">
            <a href="javascript:void(0)"
               onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm facebook">
                <i class="fa fa-facebook"></i>
            </a>
        </li>

        <li class="share-li-sm">
            <a href="javascript:void(0)"
               onclick="window.open('https://twitter.com/share?url=<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>&amp;text=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm twitter">
                <i class="fa fa-twitter"></i>
            </a>
        </li>

        <li class="share-li-sm">
            <a href="javascript:void(0)"
               onclick="window.open('https://plus.google.com/share?url=<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm google">
                <i class="fa fa-google-plus"></i>
            </a>
        </li>

        <li>
            <a href="javascript:void(0)"
               onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm linkedin">
                <i class="fa fa-linkedin"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)"
               onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>&amp;media=<?php echo base_url() . html_escape($post->image_default); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm pinterest">
                <i class="fa fa-pinterest"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)"
               onclick="window.open('http://www.tumblr.com/share/link?url=<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>&amp;title=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
               class="social-btn-sm tumblr">
                <i class="fa fa-tumblr"></i>
            </a>
        </li>


        <!--Add to Reading List-->
        <?php if (auth_check()) : ?>

            <?php if ($is_reading_list == false) : ?>
                <li>
                    <a href="javascript:void(0)" class="social-btn-sm add-reading-list" data-toggle-tool="tooltip" data-placement="top" title="<?php echo html_escape(trans("add_reading_list")); ?>"
                       onclick="add_delete_from_reading_list('<?php echo $post->id; ?>');">
                        <i class="fa fa-star"></i>
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="javascript:void(0)" class="social-btn-sm remove-reading-list" data-toggle-tool="tooltip" data-placement="top" title="<?php echo html_escape(trans("delete_reading_list")); ?>"
                       onclick="add_delete_from_reading_list('<?php echo $post->id; ?>');">
                        <i class="fa fa-star"></i>
                    </a>
                </li>
            <?php endif; ?>

        <?php else: ?>
            <li>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-login" data-toggle-tool="tooltip" data-placement="top" title="<?php echo html_escape(trans("add_reading_list")); ?>"
                   class="social-btn-sm add-reading-list">
                    <i class="fa fa-star"></i>
                </a>
            </li>
        <?php endif; ?>

    </ul>
<?php endif; ?>



