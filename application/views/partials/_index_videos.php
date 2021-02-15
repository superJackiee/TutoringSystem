<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!--Category Block Type 4-->
<?php if (count($index_last_videos) > 0): ?>
    <div class="col-sm-12 col-xs-12">
        <div class="row">
            <section class="section section-video">
                <div class="section-head">
                    <h4 class="title">
                        <a href="<?php echo base_url(); ?>videos">
                            <?php echo trans("title_videos"); ?>
                        </a>
                    </h4>
                </div>


                <div class="section-content">

                    <div class="row">
                        <?php $i = 0; ?>
                        <?php foreach ($index_last_videos as $video): ?>

                            <?php if ($i > 0 && $i % 2 == 0): ?>
                                <div class="row m-0"></div>
                            <?php endif; ?>

                            <!--include post item -->
                            <div class="col-sm-6">
                                <?php $this->load->view('partials/_post_item_video', ['video' => $video]); ?>
                            </div>

                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </div>

                </div>


            </section>
        </div>
    </div>
<?php endif; ?>