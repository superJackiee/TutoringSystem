<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Partial: Footer Random Posts-->
<div class="footer-widget f-widget-random">
    <div class="col-sm-12">
        <div class="row">
            <h4 class="title"><?php echo html_escape(trans("footer_random_posts")); ?></h4>
            <div class="title-line"></div>
            <ul class="f-random-list">

                <!--List random posts-->
                <?php foreach($footer_random_posts as $item):?>
                    <li>
                        <a href="<?php echo base_url() . 'post/' . html_escape($item->title_slug) . '/' . $item->id; ?>">
                            <?php if (!empty($item->image_small)): ?>
                                <img src="<?php echo base_url() . $item->image_small; ?>"
                                     alt="<?php echo html_escape($item->title); ?>"/>
                            <?php endif; ?>
                        </a>

                        <h5 class="title">
                            <a href="<?php echo base_url() . 'post/' . html_escape($item->title_slug) . '/' . $item->id; ?>">
                                <?php echo html_escape(character_limiter($item->title, 55, '...')); ?>
                            </a>
                        </h5>

                    </li>
              <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>
