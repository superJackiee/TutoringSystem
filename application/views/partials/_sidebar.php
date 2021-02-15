<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php  foreach ($widgets as $widget): ?>

    <?php if ($widget->visibility == 1): ?>

        <?php if ($widget->type == "popular-posts"): ?>

            <div class="row">
                <div class="col-sm-12">
                    <!--Include Widget Popular Posts-->
                    <?php $this->load->view('partials/_sidebar_widget_popular_posts', ['widget' => $widget]); ?>
                </div>
            </div>

        <?php endif; ?>


        <?php if ($widget->type == "recommended-posts"): ?>

            <div class="row">
                <div class="col-sm-12">
                    <!--Include Widget Our Picks-->
                    <?php $this->load->view('partials/_sidebar_widget_recommended_posts', ['widget' => $widget]); ?>
                </div>
            </div>

        <?php endif; ?>


        <?php if ($widget->type == "random-slider-posts"): ?>

            <div class="row">
                <div class="col-sm-12">
                    <!--Include Widget Random Slider-->
                    <?php $this->load->view('partials/_sidebar_widget_random_slider', ['widget' => $widget]); ?>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($widget->type == "featured-video"): ?>

            <div class="row">
                <div class="col-sm-12">
                    <!--Include Featured Video-->
                    <?php $this->load->view('partials/_sidebar_widget_featured_video', ['widget' => $widget]); ?>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($widget->type == "tags"): ?>

            <div class="row">
                <div class="col-sm-12">
                    <!--Include Widget Tags-->
                    <?php $this->load->view('partials/_sidebar_widget_tags', ['widget' => $widget]); ?>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($widget->type == "poll"): ?>

            <div class="row">
                <div class="col-sm-12">
                    <!--Include Widget Comments-->
                    <?php $this->load->view('partials/_sidebar_widget_polls', ['widget' => $widget]); ?>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($widget->type == "custom"): ?>

            <div class="row">
                <div class="col-sm-12">
                    <!--Include Widget Custom-->
                    <?php $this->load->view('partials/_sidebar_widget_custom', ['widget' => $widget]); ?>
                </div>
            </div>

        <?php endif; ?>

    <?php endif; ?>

<?php endforeach; ?>


<?php if (!empty($ads->sidebar_300)): ?>
    <div class="bn-lg p-b-30">
        <div class="col-sm-12">
            <div class="row">
                <?php echo $ads->sidebar_300; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($ads->sidebar_300)): ?>
    <div class="bn-md p-b-30">
        <div class="col-sm-12">
            <div class="row">
                <?php echo $ads->sidebar_300; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($ads->sidebar_234)): ?>
    <div class="bn-sm p-b-15">
        <div class="col-sm-12">
            <div class="row">
                <?php echo $ads->sidebar_234; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
