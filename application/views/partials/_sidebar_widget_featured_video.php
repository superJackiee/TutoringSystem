<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Widget: Featured Video-->
<div class="sidebar-widget">
    <div class="widget-head">
        <h4 class="title"><?php echo html_escape($widget->title); ?></h4>
    </div>
    <div class="widget-body">
        <ul class="featured-video">

            <!--Print Popular Videos-->
            <?php foreach ($popular_videos as $video): ?>

                <li>

                    <!--include post item -->
                    <?php $this->load->view('partials/_post_item_video', ['video' => $video]); ?>

                </li>

            <?php endforeach; ?>

        </ul>
    </div>
</div>