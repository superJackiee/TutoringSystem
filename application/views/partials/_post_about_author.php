<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if (!empty($post_user)): ?>

    <div class="col-sm-12 col-xs-12">
        <div class="row">

            <div class="about-author">
                <div class="about-author-left">
                    <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($post_user->slug); ?>" class="author-link">
                        <img src="<?php echo get_user_avatar($post_user); ?>" alt="" class="img-responsive img-author">
                    </a>
                </div>
                <div class="about-author-right">
                    <div class="about-author-row">
                        <p>
                            <strong>
                                <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($post_user->slug); ?>" class="author-link"> <?php echo html_escape($post_user->username); ?> </a>
                            </strong>
                        </p>
                    </div>


                    <div class="about-author-row">
                        <?php echo html_escape($post_user->about_me); ?>

                        <div class="author-social-cnt">
                            <ul class="author-social">
                                <!--if facebook url exists-->
                                <?php if (!empty($post_user->facebook_url)) : ?>
                                    <li>
                                        <a class="facebook" href="<?php echo html_escape($post_user->facebook_url); ?>"
                                           target="_blank"><i
                                                    class="fa fa-facebook"></i></a>
                                    </li>
                                <?php endif; ?>
                                <!--if twitter url exists-->
                                <?php if (!empty($post_user->twitter_url)) : ?>
                                    <li>
                                        <a class="twitter" href="<?php echo html_escape($post_user->twitter_url); ?>"
                                           target="_blank"><i
                                                    class="fa fa-twitter"></i></a>
                                    </li>
                                <?php endif; ?>
                                <!--if google url exists-->
                                <?php if (!empty($post_user->google_url)) : ?>
                                    <li>
                                        <a class="google" href="<?php echo html_escape($post_user->google_url); ?>"
                                           target="_blank"><i
                                                    class="fa fa-google-plus"></i></a>
                                    </li>
                                <?php endif; ?>
                                <!--if pinterest url exists-->
                                <?php if (!empty($post_user->pinterest_url)) : ?>
                                    <li>
                                        <a class="pinterest" href="<?php echo html_escape($post_user->pinterest_url); ?>"
                                           target="_blank"><i
                                                    class="fa fa-pinterest"></i></a>
                                    </li>
                                <?php endif; ?>
                                <!--if instagram url exists-->
                                <?php if (!empty($post_user->instagram_url)) : ?>
                                    <li>
                                        <a class="instagram" href="<?php echo html_escape($post_user->instagram_url); ?>"
                                           target="_blank"><i
                                                    class="fa fa-instagram"></i></a>
                                    </li>
                                <?php endif; ?>
                                <!--if linkedin url exists-->
                                <?php if (!empty($post_user->linkedin_url)) : ?>
                                    <li>
                                        <a class="linkedin" href="<?php echo html_escape($post_user->linkedin_url); ?>"
                                           target="_blank"><i
                                                    class="fa fa-linkedin"></i></a>
                                    </li>
                                <?php endif; ?>
                                <!--if vk url exists-->
                                <?php if (!empty($post_user->vk_url)) : ?>
                                    <li>
                                        <a class="vk" href="<?php echo html_escape($post_user->vk_url); ?>"
                                           target="_blank"><i class="fa fa-vk"></i></a>
                                    </li>
                                <?php endif; ?>
                                <!--if youtube url exists-->
                                <?php if (!empty($post_user->youtube_url)) : ?>
                                    <li>
                                        <a class="vk" href="<?php echo html_escape($post_user->youtube_url); ?>"
                                           target="_blank"><i class="fa fa-youtube-play"></i></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>

<?php endif; ?>
