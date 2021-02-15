<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!--News Ticker-->
<?php if ($settings->show_newsticker == 1 && count($news_ticker_posts) > 0): ?>
    <div class="col-sm-12 news-ticker-cnt">
        <div class="row m-0">
            <div class="left">
                <span class="news-ticker-title font-second custom_news_ticker"><?php echo trans("breaking_news"); ?></span>
            </div>

            <div class="right">
                <div class="news-ticker">
                    <ul>
                        <?php foreach ($news_ticker_posts as $post): ?>
                            <li>
                                <a href="<?php echo base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>/<?php echo html_escape($post->id); ?>">
                                    <?php echo html_escape($post->title); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="news-ticker-btn-cnt">
                <a href="#" class="bnt-news-ticker news-prev"><span class="ion-ios-arrow-left"></span></a>
                <a href="#" class="bnt-news-ticker news-next"><span class="ion-ios-arrow-right"></span></a>
            </div>
        </div>

    </div>
<?php else: ?>
    <div class="col-sm-12 news-ticker-sep"></div>
<?php endif; ?>