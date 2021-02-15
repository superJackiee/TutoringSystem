<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Category Block Type 2-->
<div class="col-sm-12 col-xs-12">
    <div class="row">
        <section class="section section-block-2">
            <div class="section-head" style="border-bottom: 2px solid <?php echo html_escape($category->color); ?>;">
                <h4 class="title" style="background-color: <?php echo html_escape($category->color); ?>">
                    <a href="<?php echo base_url(); ?>category/<?php echo html_escape($category->name_slug) ?>/<?php echo html_escape($category->id) ?>">
                        <?php echo html_escape($category->name); ?>
                    </a>
                </h4>

                <!--Include subcategories-->
                <?php $this->load->view('partials/_block_subcategories', ['category' => $category]); ?>

            </div><!--End section head-->

            <div class="section-content">
                <div class="tab-content pull-left">
                    <div role="tabpanel" class="tab-pane fade in active" id="all-<?php echo html_escape($category->id); ?>">
                        <div class="row">

                            <!--Print latest posts by category-->
                            <?php $count = 0; ?>
                            <?php foreach (helper_get_last_posts_by_category($category->id, 6) as $post): ?>

                                <?php if ($count != 0 && $count % 2 == 0): ?>
                                    <div class="col-sm-12 col-xs-12"></div>
                                <?php endif; ?>

                                <!--include post item-->
                                <div class="col-sm-6 col-xs-12">
                                    <?php $this->load->view("partials/_post_item", ["post" => $post]); ?>
                                </div>

                                <?php $count++; ?>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <?php foreach (helper_get_subcategories($category->id) as $subcategory): ?>
                        <div role="tabpanel" class="tab-pane fade in " id="<?php echo html_escape($subcategory->name_slug); ?>-<?php echo html_escape($subcategory->id); ?>">
                            <div class="row">
                                <!--Print latest posts by subcategory-->
                                <?php $count = 0; ?>
                                <?php foreach (helper_get_last_posts_by_subcategory($subcategory->id, 6) as $post): ?>

                                    <?php if ($count != 0 && $count % 2 == 0): ?>
                                        <div class="col-sm-12 col-xs-12"></div>
                                    <?php endif; ?>

                                    <!--include post item-->
                                    <div class="col-sm-6 col-xs-12">
                                        <?php $this->load->view("partials/_post_item", ["post" => $post]); ?>
                                    </div>

                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>

            </div><!--End section-content-->
        </section><!--End section block 1-->
    </div>
</div>