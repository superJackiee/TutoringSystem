<section class="user_section">
      	<div class="container">      
        <?php 
        foreach($teacher_sub as $detail){?>
            <div class="favorited_teachers_sec">
                <div class="favorited_teachers_left" onclick="window.open('<?php echo base_url('teacher-detail?id='.$detail['user_id']);?>')">
                    <div class="fav_teh_profile_part text-center">
                        <div class=" profile_image fav_teh_profile">
                            <img src="<?php echo base_url($detail['avatar']);?>" alt="Profile">
                        </div>
                             <ul class="fav_teh_stars_box">
                                <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                                <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                                <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                                <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                                <li><img src="<?php echo base_url('uploads/images/star.svg')?>" alt="star"></li>
                            </ul>
                            <p><?php echo $detail['count'] ?> Lessons</p>
                    </div>
                    <div class="fav_tch_pro_dtl">
                        <h3><?php echo $detail['username']; ?> <i class="flag flag-es"></i></h3>
                        <p>TUTOR</p>
                        <div class="redbar mar_set"></div>
                        <p>Teaches</p>
                        <h6><?php echo $detail['native_lang']?></h6>
                        <p>Also speaks</p>
                        <h6><?php echo $detail['native_lang']?></h6>
                        <div class="hous_rate">
                            <p>Hourly Rate From</p>
                            <h6>ARS <?php echo $detail['avg']?></h6>
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
                                <a class="nav-link  waves-light active show" id="profile-tab-classic-shadow<?php echo $detail['id']; ?>" data-toggle="tab" href="#profile-classic-shadow<?php echo $detail['id']; ?>"
                                role="tab" aria-controls="profile-classic-shadow" aria-selected="true">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-light" id="follow-tab-classic-shadow<?php echo $detail['id']; ?>" data-toggle="tab" href="#follow-classic-shadow<?php echo $detail['id']; ?>"
                                role="tab" aria-controls="follow-classic-shadow" aria-selected="false">Intro</a>
                            </li>
                            </ul>
                            <div class="tab-content card fav_rgt_part video" id="myClassicTabContentShadow">
                                <div class="tab-pane fade active show" id="profile-classic-shadow<?php echo $detail['id']; ?>" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">
                                    <video controls="" autoplay="" controlslist="nodownload">
                                    <source src="<?php echo base_url($detail['vedio']) ?>" type="video/mp4"></video>
                                </div>
                                <div class="fav_rgt_part Intro tab-pane fade" id="follow-classic-shadow<?php echo $detail['id']; ?>" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
                                    <p style="overflow:auto;height:200px"><?php  echo $detail['about'] ?></p>
                                </div>
                            </div>
                    </div>
                </div>
            <?php } ?>
         </div>   
    </div>
</section>
