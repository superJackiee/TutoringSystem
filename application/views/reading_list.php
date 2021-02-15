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

            <div id="content" class="col-sm-8">

                <div class="row">
                    <!--Check page title active-->
                    <?php if ($page->title_active == 1): ?>
                        <div class="col-sm-12">
                            <h1 class="page-title"><?php echo html_escape($page->title); ?></h1>
                        </div>
                    <?php endif; ?>


                    <?php $count = 0; ?>
                    <?php foreach ($posts as $post): ?>

                        <?php if ($count != 0 && $count % 2 == 0): ?>
                            <div class="col-sm-12"></div>
                        <?php endif; ?>

                        <!--include post item-->
                        <?php
                        if ($post->post_type == "video"):
                            $this->load->view("partials/_post_item_video_list", ["video" => $post, "show_label" => true]);
                        else:
                            $this->load->view("partials/_post_item_list", ["post" => $post, "show_label" => true]);
                        endif;
                        ?>

                        <?php $count++; ?>
                    <?php endforeach; ?>


                    <?php if ($count == 0): ?>
                        <p class="text-center">
                            <?php echo trans("text_list_empty"); ?>
                        </p>
                    <?php endif; ?>

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