<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Category Block Type 4-->
<div class="col-sm-12 col-xs-12">
    <div class="row">
        <section class="section section-block-4">
            <div class="section-head" style="border-bottom: 2px solid <?php echo html_escape($category->color); ?>;">
                <h4 class="title" style="background-color: <?php echo html_escape($category->color); ?>">
                    <a href="<?php echo base_url(); ?>category/<?php echo html_escape($category->name_slug) ?>/<?php echo html_escape($category->id) ?>" style="color: <?php echo html_escape($category->color); ?>">
                        <?php echo html_escape($category->name); ?>
                    </a>
                </h4>

                <!--Include subcategories-->
                <?php $this->load->view('partials/_block_subcategories', ['category' => $category]); ?>

            </div>


            <div class="section-content">
                <div class="tab-content pull-left">

                    <div role="tabpanel" class="tab-pane fade in active" id="all-<?php echo html_escape($category->id); ?>">
                        <div class="row">

                            <?php foreach (helper_get_last_posts_by_category($category->id, 3) as $post): ?>
                                <div class="col-sm-4">
                                    <!--include post item-->
                                    <?php $this->load->view("partials/_post_item_mid", ["post" => $post]); ?>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>

                    <?php foreach (helper_get_subcategories($category->id) as $subcategory): ?>
                        <div role="tabpanel" class="tab-pane fade in " id="<?php echo html_escape($subcategory->name_slug); ?>-<?php echo html_escape($subcategory->id); ?>">
                            <div class="row">
                                <?php foreach (helper_get_last_posts_by_subcategory($subcategory->id, 3) as $post): ?>
                                    <div class="col-sm-4">
                                        <!--include post item-->
                                        <?php $this->load->view("partials/_post_item_mid", ["post" => $post]); ?>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>


        </section>
    </div>
</div>