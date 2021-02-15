<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Header ad space-->
<?php if (!empty($ad) && $ad == "header"): ?>

    <?php if (!empty($ads->header_728)): ?>
        <div class="bn-lg">
            <?php echo $ads->header_728; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->header_468)): ?>
        <div class="bn-md">
            <?php echo $ads->header_468; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>

<!--Header mobile ad space-->
<?php if (!empty($ad) && $ad == "header_mobile"): ?>

    <?php if (!empty($ads->header_468)): ?>
        <div class="bn-md bn-header-mobile-468">
            <div class="col-sm-12 col-xs-12 m-b-15">
                <div class="row">
                    <?php echo $ads->header_468; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($ads->header_234)): ?>
        <div class="col-sm-12 col-xs-12 bn-sm p-b-15">
            <div class="row">
                <?php echo $ads->header_234; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>


<!--Index top ad space-->
<?php if (!empty($ad) && $ad == "index_top"): ?>

    <?php if (!empty($ads->index_728_top)): ?>
        <div class="bn-lg p-b-30">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->index_728_top; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->index_468_top)): ?>
        <div class="bn-md p-b-15">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->index_468_top; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->index_234_top)): ?>
        <div class="col-sm-12 col-xs-12 bn-sm p-b-30">
            <div class="row">
                <?php echo $ads->index_234_top; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>


<!--Index bottom ad space-->
<?php if (!empty($ad) && $ad == "index_bottom"): ?>

    <?php if (!empty($ads->index_728_bottom)): ?>
        <div class="bn-lg p-b-30">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->index_728_bottom; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->index_468_bottom)): ?>
        <div class="bn-md p-b-15">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->index_468_bottom; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->index_234_bottom)): ?>
        <div class="col-sm-12 col-xs-12 bn-sm p-b-30">
            <div class="row">
                <?php echo $ads->index_234_bottom; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<!--Posts ad space-->
<?php if (!empty($ad) && $ad == "posts"): ?>

    <?php if (!empty($ads->posts_728)): ?>
        <div class="bn-lg p-b-30">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->posts_728; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->posts_468)): ?>
        <div class="bn-md p-b-15">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->posts_468; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->posts_234)): ?>
        <div class="col-sm-12 col-xs-12 bn-sm p-b-30">
            <div class="row">
                <?php echo $ads->posts_234; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<!--Videos ad space-->
<?php if (!empty($ad) && $ad == "videos"): ?>

    <?php if (!empty($ads->videos_728)): ?>
        <div class="bn-lg p-b-30">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->videos_728; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->videos_468)): ?>
        <div class="bn-md p-b-15">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->videos_468; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->videos_234)): ?>
        <div class="col-sm-12 col-xs-12 bn-sm p-b-30">
            <div class="row">
                <?php echo $ads->videos_234; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<!--Category ad space-->
<?php if (!empty($ad) && $ad == "category"): ?>

    <?php if (!empty($ads->category_728)): ?>
        <div class="bn-lg p-b-30">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->category_728; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->category_468)): ?>
        <div class="bn-md p-b-15">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->category_468; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->category_234)): ?>
        <div class="col-sm-12 col-xs-12 bn-sm p-b-30">
            <div class="row">
                <?php echo $ads->category_234; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<!--Tag ad space-->
<?php if (!empty($ad) && $ad == "tag"): ?>

    <?php if (!empty($ads->tag_728)): ?>
        <div class="bn-lg p-b-30">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->tag_728; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->tag_468)): ?>
        <div class="bn-md p-b-15">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->tag_468; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->tag_234)): ?>
        <div class="col-sm-12 col-xs-12 bn-sm p-b-30">
            <div class="row">
                <?php echo $ads->tag_234; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<!--Search ad space-->
<?php if (!empty($ad) && $ad == "search"): ?>

    <?php if (!empty($ads->search_728)): ?>
        <div class="bn-lg p-b-30">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->search_728; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->search_468)): ?>
        <div class="bn-md p-b-15">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->search_468; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->search_234)): ?>
        <div class="col-sm-12 col-xs-12 bn-sm p-b-30">
            <div class="row">
                <?php echo $ads->search_234; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<!--Post Details ad space-->
<?php if (!empty($ad) && $ad == "post_details"): ?>

    <?php if (!empty($ads->post_details_728)): ?>
        <div class="bn-lg p-b-30">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->post_details_728; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->post_details_468)): ?>
        <div class="bn-md p-b-15">
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    <?php echo $ads->post_details_468; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($ads->post_details_234)): ?>
        <div class="col-sm-12 col-xs-12 bn-sm p-b-30">
            <div class="row">
                <?php echo $ads->post_details_234; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>
