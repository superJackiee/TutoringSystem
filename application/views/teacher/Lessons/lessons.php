<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="true">Lessons</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Lesson Invitations</a></li>
            </ul>
<section class="user_section dashboard_sec">
      	<div class="container">
<div class="row">
    <div class="col-md-12">

        <!-- form start -->
        <!-- Custom Tabs -->
    
            <div class="tab-content settings-tab-content">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

        <div class="tab-pane active" id="tab_1">

    <?php 
                $i = 0;
              foreach($book_teacher as $book){
                if($book['book_status'] == '1' ){
                    $i++;
                  ?>      
                        <div class="LessonItem LessonItem-desktop">
                             <div class="LessonItem-part-1">
                                    <a href="/user/6901599">
                                    <div class="avatar avatar-lsmall LessonItem-avatar avatar-placeholder">
                                        <img src="<?php echo base_url($book['avatar']) ?>" alt="Avatar">
                                    </div>
                                </a>
                                <div class="LessonItem-userInfo-box">
                                    <div class="font-b font-14"><?php echo $book['username'] ?></div>
                                    <div class="font-l font-14">
                                        <span>Lesson ID</span>: <?php echo $book['lesson_id'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="LessonItem-part-2 font-14">
                                <div class="lessonInfo-title">
                                    <span><?php echo $book['category'] ?>   - <?php echo $book['title'] ?></span>
                                </div>
                                <div class="lessonInfo-bar">
                                    <span class="language font-14" title="english">
                                        <span><?php echo $book['language_taught'] ?></span>
                                    </span>&nbsp;-&nbsp;
                                    <span><?php echo $book['lesson_time'] ?> minutes</span>
                                    <span style="margin-left:5px;"><?php echo $book['from_time'] ?> - </span>
                                    <span><?php echo $book['to_time'] ?></span>
                                </div>
                            </div>
                            <div class="LessonItem-part-3 font-14">
                                <!--<div class="LessonItem-p3-upcoming">-->
                                <!--    <div class="LessonTimer LessonTimer-desktop LessonTimer-upcoming">-->
                                <!--            <a href="#" class="view_profile">Will Start Shortly</a>-->
                                <!--    </div>-->
                                <!--</div>-->
                                 <div class="LessonItem-part-1">
                                    <div class="LessonItem-userInfo-box">
                                        <div class="font-b font-14">Skype ID: <?php echo $book['comm_id'] ?></div>
                                        <div onload='count_down('+ <?php echo $book['comm_id'] ?> +')'></div>
                                    </div>
                                </div>
                            </div>
                    </div>
             <?php } }
              if( $i == 0){ ?>
                    <h2>No results found!</h2>   
              <?php }
              ?>
                
                    </div><!-- /.tab-pane -->

                <div class="tab-pane" id="tab_2">
        <?php
        $i = 0;
         foreach($book_teacher as $book){

                if($book['book_status'] == '0' && $book['payment_status'] == '1'){
                     $i++;
                  ?>      
                    <div class="LessonItem LessonItem-desktop">
                             <div class="LessonItem-part-1">
                                    <a href="/user/6901599">
                                    <div class="avatar avatar-lsmall LessonItem-avatar avatar-placeholder">
                                        <img src="<?php echo base_url($book['avatar']) ?>" alt="Avatar">
                                    </div>
                                </a>
                                <div class="LessonItem-userInfo-box">
                                    <div class="font-b font-14"><?php echo $book['username'] ?></div>
                                    <div class="font-l font-14">
                                        <span>Lesson ID</span>: <?php echo $book['lesson_id'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="LessonItem-part-2 font-14">
                                <div class="lessonInfo-title">
                                    <span><?php echo $book['category'] ?>   - <?php echo $book['title'] ?></span>
                                </div>
                                <div class="lessonInfo-bar">
                                    <span class="language font-14" title="english">
                                        <span><?php echo $book['language_taught'] ?></span>
                                    </span>&nbsp;-&nbsp;
                                    <span><?php echo $book['lesson_time'] ?> minutes</span>
                                </div>
                            </div>
                            <div class="LessonItem-part-3 font-14">
                                <div class="LessonItem-p3-upcoming">
                                    <div class="LessonTimer LessonTimer-desktop LessonTimer-upcoming">
                                            <a href="<?php echo base_url('teacher/accept_book?id='.$book['booking_id']);?>" class="view_profile">Accept</a>
                                    </div>
                                </div>
                            </div>
                    </div>
              <?php } }
              if( $i == 0){ ?>
                    <h2>No results found!</h2>   
              <?php }
              ?>
                </div><!-- /.tab-pane -->

           
            </div><!-- /.tab-content -->
            <!-- <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div> -->
            </div>

      </section>
        </div><!-- nav-tabs-custom -->
    </div><!-- /.col -->
</div>
<script>
    
</script>
<style>
.lesson_no {
        text-align: center;
}
a.view_profile {
    padding: 7px 21px;
    font-size: 16px;
    text-transform: uppercase;
}
</style>


