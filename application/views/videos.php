<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">

            <!--Check breadcrumb active-->
            <?php if ($page->breadcrumb_active == 1): ?>
                <!-- breadcrumb -->
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

            <div id="content" class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <!--Check page title active-->
                        <?php if ($page->title_active == 1): ?>
                            <h1 class="page-title"><span><?php echo html_escape($page->title); ?></span></h1>
                        <?php endif; ?>
                    </div>

                    <div class="col-sm-12 video-posts-cnt">
                        <?php $count = 0; ?>
                        <?php foreach ($videos as $video): ?>

                            <?php if ($count != 0 && $count % 2 == 0): ?>
                                <div class="col-sm-12"></div>
                            <?php endif; ?>

                            <!--include post item -->
                            <div class="<?php echo ($page->right_column_active == 1) ? 'col-sm-6' : 'col-sm-4'; ?>">
                                <?php $this->load->view('partials/_post_item_video', ['video' => $video]); ?>
                            </div>

                            <?php if ($count == 3): ?>
                                <!--Include banner-->
                                <?php $this->load->view('partials/_ad_spaces', ['ad' => "videos"]); ?>
                            <?php endif; ?>

                            <?php $count++; ?>
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="col-sm-12">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>

            <div id="sidebar" class="col-sm-4">
                <!--include sidebar -->
                <?php $this->load->view('partials/_sidebar'); ?>

            </div>
        </div>
    </div>


</div>
<!-- /.Section: wrapper -->
