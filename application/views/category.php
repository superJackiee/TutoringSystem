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
                    <?php if ($category_type == "sub"): ?>
                        <!-- get parent category -->
                        <?php $parent_category = helper_get_category($category->parent_id); ?>
                        <?php if (!empty($parent_category)): ?>
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url(); ?>category/<?php echo html_escape($parent_category->name_slug); ?>/<?php echo html_escape($parent_category->id); ?>"><?php echo html_escape($parent_category->name); ?></a>
                            </li>
                        <?php endif; ?>

                        <li class="breadcrumb-item active"><?php echo html_escape($category->name); ?></li>

                    <?php else: ?>
                        <li class="breadcrumb-item active"><?php echo html_escape($category->name); ?></li>
                    <?php endif; ?>

                </ol>
            </div>

            <div id="content" class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-title"><span> <?php echo trans("title_category"); ?>:</span>&nbsp;<strong><?php echo html_escape($category->name); ?></strong></h1>
                    </div>

                    <?php $count = 0; ?>
                    <?php foreach ($posts as $post): ?>

                        <?php if ($count != 0 && $count % 2 == 0): ?>
                            <div class="col-sm-12"></div>
                        <?php endif; ?>

                        <!--include post item-->
                        <?php $this->load->view("partials/_post_item_list", ["post" => $post]); ?>


                        <?php if ($count == 3): ?>
                            <!--Include banner-->
                            <?php $this->load->view('partials/_ad_spaces', ['ad' => "category"]); ?>
                        <?php endif; ?>



                        <?php $count++; ?>
                    <?php endforeach; ?>


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