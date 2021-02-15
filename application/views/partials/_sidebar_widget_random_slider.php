<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Widget: Random Slider-->
<div class="sidebar-widget">
    <div class="widget-head">
        <h4 class="title"><?php echo html_escape($widget->title); ?></h4>
    </div>
    <div class="widget-body">
        <div class="owl-carousel random-slider" id="random-slider">

            <!--Print Random Posts-->
            <?php foreach ($random_posts as $post): ?>

                <!--include post item-->
                <?php $this->load->view("partials/_post_item", ["post" => $post, "show_label" => true]); ?>

            <?php endforeach; ?>
        </div>
    </div>
</div>