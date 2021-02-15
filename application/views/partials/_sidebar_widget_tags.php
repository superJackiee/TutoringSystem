<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Widget: Tags-->
<div class="sidebar-widget">
    <div class="widget-head">
        <h4 class="title"><?php echo html_escape($widget->title); ?></h4>
    </div>
    <div class="widget-body">
        <ul class="tag-list">
            <!--List tags-->
            <?php foreach ($tags as $item): ?>
                <li>
                    <a href="<?php echo base_url() . 'tag/' . html_escape($item->tag_slug); ?>">
                        <?php echo html_escape($item->tag); ?>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>
</div>