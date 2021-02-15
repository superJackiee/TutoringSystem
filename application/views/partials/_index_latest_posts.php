<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if (count($last_posts) > 0): ?>
    <div class="col-sm-12 col-xs-12">
        <div class="row">
            <section class="section">
                <div class="section-head">
                    <h4 class="title">
                        <a href="<?php echo base_url(); ?>posts">
                            <?php echo trans("title_latest_posts"); ?>
                        </a>
                    </h4>
                </div><!--End section head-->

                <div class="section-content">
                    <div class="row latest-articles">
                        <?php foreach ($last_posts as $post): ?>

                            <!--include horizontal post item-->
                            <?php $this->load->view("partials/_post_item_horizontal", ["post" => $post, "show_label" => true]); ?>

                        <?php endforeach; ?>
                    </div>
                </div><!--End section content-->
            </section><!--End section-->
        </div>
    </div>


    <div class="col-sm-12 col-xs-12">
        <a href="<?php echo base_url(); ?>posts" class="a-view-all">
            <?php echo trans("view_all_posts"); ?>
        </a>
    </div>
<?php endif; ?>