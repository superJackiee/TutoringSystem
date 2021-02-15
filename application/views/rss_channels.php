<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">

            <!--Check breadcrumb active-->
            <?php if ($page->breadcrumb_active == 1): ?>
                <div class="col-sm-12 page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                        </li>

                        <li class="breadcrumb-item active"><?php echo html_escape($page->title); ?></li>
                    </ol>
                </div>
            <?php else: ?>
                <div class="col-sm-12 page-breadcrumb"></div>
            <?php endif; ?>

            <div id="content" class="col-sm-12">
                <div class="row">
                    <!--Check page title active-->
                    <?php if ($page->title_active == 1): ?>
                        <div class="col-sm-12">
                            <h1 class="page-title"><?php echo html_escape($page->title); ?></h1>
                        </div>
                    <?php endif; ?>
                    <div class="col-sm-12">
                        <div class="page-content font-text">

                            <h2 class="rss-title"><?php echo trans("posts"); ?></h2>
                            <div class="rss-item">
                                <div class="left">
                                    <a href="<?php echo base_url(); ?>rss/posts" target="_blank"><i class="fa fa-rss"></i>&nbsp;&nbsp;<?php echo trans("all_posts"); ?></a>
                                </div>
                                <div class="right">
                                    <p><?php echo base_url() . "rss/posts"; ?></p>
                                </div>
                            </div>

                            <div class="rss-item">
                                <div class="left">
                                    <a href="<?php echo base_url(); ?>rss/popular-posts" target="_blank"><i class="fa fa-rss"></i>&nbsp;&nbsp;<?php echo trans("title_popular_posts"); ?></a>
                                </div>
                                <div class="right">
                                    <p><?php echo base_url() . "rss/popular-posts"; ?></p>
                                </div>
                            </div>

                            <div class="rss-item">
                                <div class="left">
                                    <a href="<?php echo base_url(); ?>rss/latest-posts" target="_blank"><i class="fa fa-rss"></i>&nbsp;&nbsp;<?php echo trans("title_latest_posts"); ?></a>
                                </div>
                                <div class="right">
                                    <p><?php echo base_url() . "rss/latest-posts"; ?></p>
                                </div>
                            </div>

                            <?php foreach ($categories as $category): ?>
                                <div class="rss-item">
                                    <div class="left">
                                        <a href="<?php echo base_url(); ?>rss/posts/<?php echo html_escape($category->name_slug); ?>/<?php echo html_escape($category->id); ?>" target="_blank"><i class="fa fa-rss"></i>&nbsp;&nbsp;<?php echo html_escape($category->name); ?></a>
                                    </div>
                                    <div class="right">
                                        <p><?php echo base_url(); ?>rss/posts/<?php echo html_escape($category->name_slug); ?>/<?php echo html_escape($category->id); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <h2 class="rss-title"><?php echo trans("title_videos"); ?></h2>
                            <div class="rss-item">
                                <div class="left">
                                    <a href="<?php echo base_url(); ?>rss/videos" target="_blank"><i class="fa fa-rss"></i>&nbsp;&nbsp;<?php echo trans("title_videos"); ?></a>
                                </div>
                                <div class="right">
                                    <p><?php echo base_url() . "rss/videos"; ?></p>
                                </div>
                            </div>

                            <div class="rss-content">
                                <?php echo $page->page_content; ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
<!-- /.Section: wrapper -->