<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!--if facebook url exists-->
<?php if (!empty($settings->facebook_url)) : ?>
    <li>
        <a class="facebook" href="<?php echo html_escape($settings->facebook_url); ?>"
           target="_blank"><i
                    class="fa fa-facebook"></i></a>
    </li>
<?php endif; ?>
    <!--if twitter url exists-->
<?php if (!empty($settings->twitter_url)) : ?>
    <li>
        <a class="twitter" href="<?php echo html_escape($settings->twitter_url); ?>"
           target="_blank"><i
                    class="fa fa-twitter"></i></a>
    </li>
<?php endif; ?>
    <!--if google url exists-->
<?php if (!empty($settings->google_url)) : ?>
    <li>
        <a class="google" href="<?php echo html_escape($settings->google_url); ?>"
           target="_blank"><i
                    class="fa fa-google-plus"></i></a>
    </li>
<?php endif; ?>
    <!--if pinterest url exists-->
<?php if (!empty($settings->pinterest_url)) : ?>
    <li>
        <a class="pinterest" href="<?php echo html_escape($settings->pinterest_url); ?>"
           target="_blank"><i
                    class="fa fa-pinterest"></i></a>
    </li>
<?php endif; ?>
    <!--if instagram url exists-->
<?php if (!empty($settings->instagram_url)) : ?>
    <li>
        <a class="instagram" href="<?php echo html_escape($settings->instagram_url); ?>"
           target="_blank"><i
                    class="fa fa-instagram"></i></a>
    </li>
<?php endif; ?>
    <!--if linkedin url exists-->
<?php if (!empty($settings->linkedin_url)) : ?>
    <li>
        <a class="linkedin" href="<?php echo html_escape($settings->linkedin_url); ?>"
           target="_blank"><i
                    class="fa fa-linkedin"></i></a>
    </li>
<?php endif; ?>

    <!--if vk url exists-->
<?php if (!empty($settings->vk_url)) : ?>
    <li>
        <a class="vk" href="<?php echo html_escape($settings->vk_url); ?>"
           target="_blank"><i class="fa fa-vk"></i></a>
    </li>
<?php endif; ?>

    <!--if youtube url exists-->
<?php if (!empty($settings->youtube_url)) : ?>
    <li>
        <a class="youtube" href="<?php echo html_escape($settings->youtube_url); ?>"
           target="_blank"><i class="fa fa-youtube-play"></i></a>
    </li>
<?php endif; ?>

    <!--if rss active-->
<?php if (!empty($settings->show_rss) && $rss_hide == false) : ?>
    <li>
        <a class="rss" href="<?php echo base_url(); ?>rss-channels"><i class="fa fa-rss"></i>
        </a>
    </li>
<?php endif; ?>