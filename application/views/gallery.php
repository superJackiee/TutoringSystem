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

            <div class="col-sm-12">
                <div class="content page-about page-gallery">

                    <!--Check page title active-->
                    <?php if ($page->title_active == 1): ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="page-title"><?php echo html_escape($page->title); ?></h1>
                            </div>
                        </div>
                    <?php endif; ?>


                    <!--Portfolio Filters-->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="filters text-center">
                                <label data-filter="" class="btn btn-primary active">
                                    <input type="radio" name="options"> <?php echo trans("all"); ?>
                                </label>

                                <?php foreach ($gallery_categories as $category): ?>
                                    <label data-filter="<?php echo $category->name; ?>" class="btn btn-primary">
                                        <input type="radio" name="options"> <?php echo $category->name; ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row row-masonry">
                        <div id="masonry" class="gallery">
                            <!--Load Items-->
                            <?php foreach ($gallery_images as $item): ?>
                                <div data-filter="<?php echo html_escape($item->category_name); ?>" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 gallery-item">
                                    <div class="item-inner">
                                        <a class="image-popup lightbox" href="<?php echo base_url() . $item->path_big; ?>" data-effect="mfp-zoom-out" title="<?php echo html_escape($item->title); ?>">
                                            <img src="<?php echo base_url() . $item->path_small; ?>" alt="<?php echo html_escape($item->title); ?>" class="img-responsive"/>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>


</div>
<!-- /.Section: wrapper -->