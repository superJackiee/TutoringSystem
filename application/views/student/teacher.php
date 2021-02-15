<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <!-- <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="true">Favorited</a></li> -->
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">My Teachers</a></li>
            </ul>
<section class="user_section dashboard_sec">
      	<div class="container">
<div class="row">
    <div class="col-md-12">

        <!-- form start -->
        <?php echo form_open_multipart('admin/settings_post'); ?>

        <!-- Custom Tabs -->
    
            <div class="tab-content settings-tab-content">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="tab-pane active" id="tab_1">

                    <div class="LessonList-block">
                        <?php 
                        if($teacher_sub){
                        foreach($teacher_detail as $detail){?>
                    <div class="favorited_teachers_sec">
                        <div class="favorited_teachers_left" onclick="window.open('<?php echo base_url('teacher-detail?id='.$user_detail[0]['id']);?>')">
                            <div class="fav_teh_profile_part text-center">
                            <div class=" profile_image fav_teh_profile">
                                <img src="<?php echo base_url($user_detail[0]['avatar']);?>" alt="Profile">
                            </div>
                            <ul class="fav_teh_stars_box">
                                        <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                                        <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                                        <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                                        <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                                        <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                                    </ul>
                                    <p>61 Lessons</p>
                            </div>
                            <div class="fav_tch_pro_dtl">
                                <h3><?php echo $user_detail[0]['username']; ?> <i class="flag flag-es"></i></h3>
                                <p>TUTOR</p>
                                <div class="redbar mar_set"></div>
                                <p>Teaches</p>
                                <h6><?php echo $detail['native_lang']?></h6>
                                <p>Also speaks</p>
                                <h6><?php echo $detail['speak_language']?></h6>
                                <div class="hous_rate">
                                    <p>Hourly Rate From</p>
                                    <h6>ARS <?php echo $lesson_avg?></h6>
                                </div>
                                </div>
                                <div class="fav_tch_icon_prt">
                                <!-- <img src="<?php echo base_url('uploads/images/heart-half.svg')?>" alt="schedule"> -->
                                <!-- <img src="<?php echo base_url('uploads/images/heart-full.svg')?>" alt="heart-full"> -->
                                </div>
                            </div>
                            <div class="favorited_teachers_right">
                            <ul class="nav tabs-cyan fav_rgt_header" id="myClassicTabShadow" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link  waves-light active show" id="profile-tab-classic-shadow" data-toggle="tab" href="#profile-classic-shadow"
                                role="tab" aria-controls="profile-classic-shadow" aria-selected="true">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-light" id="follow-tab-classic-shadow" data-toggle="tab" href="#follow-classic-shadow"
                                role="tab" aria-controls="follow-classic-shadow" aria-selected="false">Intro</a>
                            </li>
                            </ul>
                            <div class="tab-content card fav_rgt_part video" id="myClassicTabContentShadow">
                                <div class="tab-pane fade active show" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">
                                <video controls="" autoplay="" controlslist="nodownload">
                                    <source src="<?php echo base_url($detail['vedio']) ?>" type="video/mp4"></video>
                                </div>
                                <div class="fav_rgt_part Intro tab-pane fade" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
                                    <p style="overflow:auto;height:200px"><?php echo $detail['about'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } } else{
                     echo "<div style='padding: 0px 30pc;'><img src='".base_url('uploads/images/noItemIcon.bc6bda2d.svg')."'><p>No record</p></div>";   
                    }?>
                </div>
            </div><!-- /.tab-pane -->

                <!-- <div class="tab-pane" id="tab_2">
                     <div class="LessonList-block">
                        <div class="LessonList-block-title LessonList-block-title-upcoming">
                            <span>Upcoming</span>&nbsp;•&nbsp;8
                        </div>
                     </div>
                </div>/.tab-pane -->
           
            </div><!-- /.tab-content -->
            <!-- <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div> -->
            </div>

      </section>
        </div><!-- nav-tabs-custom -->

        <?php echo form_close(); ?>
    </div><!-- /.col -->
</div>
<style>
/* .fc-left, .fc-right, .fc-clear {
    display: none;
}
.fc-toolbar {
    padding: 0px !important;
} */
</style>


