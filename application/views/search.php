<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">

            <!-- breadcrumb -->
            <div class="col-sm-12 page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo trans("title_search") . ": " . html_escape($q); ?></li>
                </ol>
            </div>

            <div id="content" class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-title"><span> <?php echo trans("title_search"); ?>:</span>&nbsp;<strong><?php echo html_escape($q); ?></strong></h1>
                    </div>

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

                        <?php if ($count == 3): ?>
                            <!--Include banner-->
                            <?php $this->load->view('partials/_ad_spaces', ['ad' => "search"]); ?>
                        <?php endif; ?>

                        <?php $count++; ?>
                    <?php endforeach; ?>

                    <?php if ($count == 0): ?>
                        <p class="text-center">
                            <?php echo trans("search_noresult"); ?>
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