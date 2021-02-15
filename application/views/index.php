
      <!----------------------------- header end here ------------------------------->
      <!------------------------- banner sec start ------------------------------->
      <section class="banner_sec">
         <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators sec_slider">
               <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <?php
                  $a=0;
                  if(count($slider)){
                     foreach ($slider as $value) {
                           if($a==0){ ?>
               <div class="carousel-item active">
                  <div class="banner_part" style="background-image:url(<?php echo base_url($value->path_big)?>)">
                     <div class="container">
                        <div class="text_part">
                           <h2 style='color:<?php echo $value->favcolor ?>;font-size:40px'><?php echo $value->title?></h2>
                           <p style='color:<?php echo $value->favcolor ?>;font-size:24px'><?php echo $value->slider_description?></p>
                        </div>
                     </div>
                  </div>
               </div>
               <?php    $a++;
            }
            else
            {?>
                    <div class="carousel-item">
                  <div class="banner_part" style="background-image:url(<?php echo base_url($value->path_big)?>)">
                     <div class="container">
                        <div class="text_part">
                            <h2 style='color:<?php echo $value->favcolor ?>;font-size:40px'><?php echo $value->title?></h2>
                           <p style='color:<?php echo $value->favcolor ?>;font-size:24px'><?php echo $value->slider_description?></p>
                        </div>
                     </div>
                  </div>
               </div>
            <?php     $a++;
            }
        }
    }
    ?>
            </div>
            <a class="carousel-control-prev mt-5" href="#carouselExampleIndicators1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next mt-5" href="#carouselExampleIndicators1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </section>
      <!------------------------- banner sec end ------------------------------->

      <!------------------------- section first start ------------------------>
      <section class="section_first">
         <div class="container">
            <div class="section_first_part">
               <div class="row ">
                  <div class="col-md-4 display_flax">
                     <div class="box_part">
                        <h5><?php echo $section[0]['title']?></h5>
                        <p><?php echo $section[0]['description']?></p>
                        <div class="box_img_part">
                           <img src="<?php echo base_url($section[0]['image']) ?>" alt="images" width="100%"> 
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 display_flax">
                     <div class="box_part">
                        <form method="POST" action="<?php echo base_url('home/contact_post') ?>">
                        <h5><?php echo $section[1]['title']?></h5>
                        <p><?php echo $section[1]['description']?></p>
                        <input type="text" name="name" placeholder="Name">
                        <input type="email" placeholder="Email" name="email">
                        <textarea class="form-control form-input form-textarea" name="message" placeholder="Message" required=""></textarea>
                        <input class="sub_btn send" type="submit" name="" value="Send">
                        </form>
                     </div>
                  </div>
                  <div class="col-md-4 display_flax">
                     <div class="box_part">
                        <h5><?php echo $section[2]['title']?></h5>
                        <p><?php echo $section[2]['description']?></p>
                        <a href="#" class="read_more"><i>Read More</i></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="section_sec_part">
               <div class="row">
                  <div class="col-md-4">
                     <div class="box_img_part">
                        <img src="<?php echo base_url($section[3]['image']) ?>" alt="images" width="100%"> 
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="text_part">
                        <h3><?php echo $section[3]['title']?></h3>
                        <p><?php echo $section[3]['description']?></p>
                        <a href="<?php echo base_url('about')?>" target="_blank" class="sub_btn mo_ab_us float-right">More About Us</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!------------------------- section first end ------------------------->
       <!---------------------------- Why why_chose_us section start here -------------------------------->
      <section class="why_chose_us">
         <div class="container">
            <h2>Why My Tutoring Pro?</h2>
            <div class="row">
               <div class="col-md-4">
                  <div class="why_chose_us_sec">
                     <div class="why_chose_us_img">
                        <img alt="my-language-learning" src="<?php echo base_url($section[7]['image']) ?>" width="100%">
                     </div>
                     <div class="why_chose_us_sec_desc">
                         <h6><?php echo $section[7]['title']?></h6>
                         <!--<div class="why_chose_us_dividers"></div>-->
                         <p><?php echo $section[7]['description']?></p>
                         <!--<div class="why_chose_us_gradient">-->
                         <!--</div>-->
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="why_chose_us_sec">
                     <div class="why_chose_us_img">
                        <img alt="my-language-learning" src="<?php echo base_url($section[8]['image']) ?>" width="100%">
                     </div>
                    <div class="why_chose_us_sec_desc" style="padding-bottom:25px;">     
                         <h6 style="margin-top:8px;"><?php echo $section[8]['title']?></h6>
                         <!--<div class="why_chose_us_dividers"></div>-->
                         <p><?php echo $section[8]['description']?></p>
                         <!--<div class="why_chose_us_gradient" style="bottom: -5px;">-->
                         <!--</div>-->
                    </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="why_chose_us_sec">
                     <div class="why_chose_us_img">
                        <img alt="my-language-learning" src="<?php echo base_url($section[9]['image']) ?>" width="100%">
                     </div>
                    <div class="why_chose_us_sec_desc">     
                         <h6><?php echo $section[9]['title']?></h6>
                         <!--<div class="why_chose_us_dividers"></div>-->
                         <p><?php echo $section[9]['description']?></p>
                         <!--<div class="why_chose_us_gradient">-->
                         <!--</div>-->
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--------------------------------------- Why why_chose_us section end here ----------------------------->
      <!--------------------------- how_it_work section start -------------------->
      <section class="how_it_work text-center">
         <div class="container">
            <h2>How does it work?</h2>
            <div class="row">
               <div class="col-md-4">
                  <div class="how_it_work_part">
                     <div class="icon">
                        <img src="<?php echo base_url($section[4]['image']) ?>" alt="Icon" height="100%" width="100%">
                     </div>
                        <h3><?php echo $section[4]['title']?></h3>
                        <p><?php echo $section[4]['description']?></p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="how_it_work_part">
                     <div class="icon">
                        <img src="<?php echo base_url($section[5]['image']) ?>" alt="Icon" height="100%" width="100%">
                     </div>
                        <h3 style="margin:0px 10px 5px 10px"><?php echo $section[5]['title']?></h3>
                        <p><?php echo $section[5]['description']?></p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="how_it_work_part">
                     <div class="icon">
                        <img src="<?php echo base_url($section[6]['image']) ?>" alt="Icon" height="100%" width="100%">
                     </div>
                        <h3><?php echo $section[6]['title']?></h3>
                        <p><?php echo $section[6]['description']?></p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--------------------------- how_it_work section end -------------------->
      <!----------------------------- any question section satrt -------------------------->
      <section class="any_qus_sec text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="any_qus_part">
                     <h4>Do you have any questions?</h4>
                     <a href="<?php echo  base_url('support')?>">
                     <input type="button" name="" value="Visit our Help &amp; Support Center">
                     </a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="any_qus_part learn_info">
                     <h4>Are you here to learn?</h4>
                     <a href="<?php echo  base_url('Auth/student_register')?>">
                     <input type="button" name="" value="Learn a language">
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!----------------------------------- any question section end ---------------------------->
      <!----------------------------------- teachers_section section start ---------------------------->
      <section class="teachers_section" hidden>
         <div class="container">
            <h2><?php // echo $total_teacher; ?>Tutors Available. <span> Any language.</span></h2>
            <div id="carouselExampleIndicators" class="carousel slide teacher_slider" data-ride="carousel">
               <div class="carousel-inner">
               <?php
                  $is_active = true; // Only true for the first iteration
                  $i = 0;  
                  foreach($teacher as $teachers):
                     if ($i % 6 == 0):
                     ?>
                  <div class="carousel-item <?php if ($is_active) echo 'active'?>">
                     <div class="row">
                  <?php endif?>
                              <div class="col-md-4 ">
                                 <div class="teacher_item">
                                    <a href="<?php echo base_url('find-teachers') ?>">
                                       <div class="teacher_image">
                                          <img alt="englich" src="<?php echo base_url($teachers['avatar']);?>">
                                       </div>
                                       <div class="teacher_detail">
                                          <div class="teacher_detail_text">
                                             <h3><?php echo $teachers['username']?></h3>
                                             <!-- <p>82 Teachers</p> -->
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                             </div>
                           
                  <?php if (($i+1) % 6 == 0 || $i == count($teacher)-1):?>
                  </div></div>
                  <?php endif?>
                  <?php
                  $i++;
                  if ($is_active) $is_active = false;
                  endforeach;
                  ?>
                       
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon teacher_prev" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <!--<span class="carousel-control-next-icon teacher_next" aria-hidden="true"></span>-->
               <span class="sr-only">Next</span>
               </a>
               <ol class="carousel-indicators teacher">
             <?php
                  $is_active = true; // Only true for the first iteration
                  $i = 0;  
                  foreach($teacher as $teachers):
                     if ($i % 6 == 0):
                     ?>
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="<?php if ($is_active) echo 'active'?>">
                  <?php endif?>
                    <?php if (($i+1) % 6 == 0 || $i == count($teacher)-1):?>
                  </li>
                  <?php endif?>
                  <?php
                  $i++;
                  if ($is_active) $is_active = false;
                  endforeach;
                  ?>
               </ol>
            </div>
            <div class="find_your_teacher text-center">
               <input type="button" name="" value="FIND YOUR TUTORS">
            </div>
         </div>
      </section>
      <!----------------------------------- teachers_section section end ---------------------------->
      <!---------------------------- Why why_chose_us section start here -------------------------------->
      <!--<section class="why_chose_us">-->
      <!--   <div class="container">-->
      <!--      <h2>Why My Tutoring Pro?</h2>-->
      <!--      <div class="row">-->
      <!--         <div class="col-md-4">-->
      <!--            <div class="why_chose_us_sec">-->
      <!--               <div class="why_chose_us_img">-->
      <!--                  <img alt="my-language-learning" src="<?php echo base_url($section[7]['image']) ?>" width="100%">-->
      <!--               </div>-->
      <!--               <div class="why_chose_us_sec_desc">-->
      <!--                   <h6><?php echo $section[7]['title']?></h6>-->
      <!--                   <div class="why_chose_us_dividers"></div>-->
      <!--                   <p><?php echo $section[7]['description']?></p>-->
                         <!--<div class="why_chose_us_gradient">-->
                         <!--</div>-->
      <!--               </div>-->
      <!--            </div>-->
      <!--         </div>-->
      <!--         <div class="col-md-4">-->
      <!--            <div class="why_chose_us_sec">-->
      <!--               <div class="why_chose_us_img">-->
      <!--                  <img alt="my-language-learning" src="<?php echo base_url($section[8]['image']) ?>" width="100%">-->
      <!--               </div>-->
      <!--              <div class="why_chose_us_sec_desc" style="padding-bottom:25px;">     -->
      <!--                   <h6 style="margin-top:8px;"><?php echo $section[8]['title']?></h6>-->
      <!--                   <div class="why_chose_us_dividers"></div>-->
      <!--                   <p><?php echo $section[8]['description']?></p>-->
                         <!--<div class="why_chose_us_gradient" style="bottom: -5px;">-->
                         <!--</div>-->
      <!--              </div>-->
      <!--            </div>-->
      <!--         </div>-->
      <!--         <div class="col-md-4">-->
      <!--            <div class="why_chose_us_sec">-->
      <!--               <div class="why_chose_us_img">-->
      <!--                  <img alt="my-language-learning" src="<?php echo base_url($section[9]['image']) ?>" width="100%">-->
      <!--               </div>-->
      <!--              <div class="why_chose_us_sec_desc">     -->
      <!--                   <h6><?php echo $section[9]['title']?></h6>-->
      <!--                   <div class="why_chose_us_dividers"></div>-->
      <!--                   <p><?php echo $section[9]['description']?></p>-->
                         <!--<div class="why_chose_us_gradient">-->
                         <!--</div>-->
      <!--              </div>-->
      <!--            </div>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</section>-->
      <!--------------------------------------- Why why_chose_us section end here ----------------------------->
      <!-------------------------------------------- logos_sec section start here -------------------------------->
      <!--<section class="logos_sec">-->
      <!--   <div class="container hide">-->
      <!--      <ul>-->
      <!--         <li>-->
      <!--            <img alt="bbc" src="<?php echo base_url($gallery[6]['path_big']) ?>">-->
      <!--         </li>-->
      <!--         <li>-->
      <!--            <img alt="bbc" src="<?php echo base_url($gallery[5]['path_big']) ?>">-->
      <!--         </li>-->
      <!--         <li>-->
      <!--            <img alt="bbc" src="<?php echo base_url($gallery[4]['path_big']) ?>">-->
      <!--         </li>-->
      <!--         <li>-->
      <!--            <img alt="bbc" src="<?php echo base_url($gallery[3]['path_big']) ?>">-->
      <!--         </li>-->
      <!--         <li>-->
      <!--            <img alt="bbc" src="<?php echo base_url($gallery[2]['path_big']) ?>">-->
      <!--         </li>-->
      <!--         <li>-->
      <!--            <img alt="bbc" src="<?php echo base_url($gallery[1]['path_big']) ?>">-->
      <!--         </li>-->
      <!--         <li>-->
      <!--            <img alt="bbc" src="<?php echo base_url($gallery[0]['path_big']) ?>">-->
      <!--         </li>-->
      <!--      </ul>-->
      <!--   </div>-->
      <!--</section>-->
      <!-------------------------------- logos_sec section end here ------------------------------------------>
      <!-------------------------------------------- over_learner section start --------------------------------------->
      <section class="over_learner" hidden>
         <div class="container">
            <h2> 
            <!-- <span><?php echo $total_teacher; ?></span> -->
            Learners’ Feedback</h2>
            <div id="carouselExampleIndicators2" class="carousel slide teacher_slider" data-ride="carousel">
               <div class="carousel-inner">
               <?php
                  $a=0;
                  if(count($testimonial)){
                     foreach ($testimonial as $value) {
                           if($a==0){ ?>
                  <div class="carousel-item active">
                     <div class="time_box">
                        <div class="middle-container">
                           <div class="middle-text">
                              <h3><?php echo $value['title']?></h3>
                              <h6>"<?php echo $value['description']?>"</h6>
                              <p><?php echo $value['author']?></p>
                           </div>
                        </div>
                     </div>
                     <div class="image_box"> <img src="<?php echo base_url($value['img']) ?>" alt="portuguese" height="100%" width="100%"> </div>
                  </div>
                  <?php    $a++;
            }
            else
            {?>
                     <div class="carousel-item">
                     <div class="time_box">
                        <div class="middle-container">
                           <div class="middle-text">
                              <h3><?php echo $value['title']?></h3>
                              <h6>"<?php echo $value['description']?>"</h6>
                              <p><?php echo $value['author']?></p>
                           </div>
                        </div>
                     </div>
                     <div class="image_box"> <img src="<?php echo base_url($value['img']) ?>" alt="portuguese" height="100%" width="100%"> </div>
                  </div>
            <?php     $a++;
            }
        }
    }
    ?>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon teacher_prev" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
               <span class="carousel-control-next-icon teacher_next" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
               <ol class="carousel-indicators teacher over_slider_down">
               <?php
                  $i=0;
                  if(count($testimonial)){
                     foreach ($testimonial as $value) {
                           if($i==0){
                              echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
                              $i++;
                           }
                           else
                           {
                              echo '<li data-target="#carousel-example-generic" data-slide-to="0"></li>';
                              $i++;
                           }
                     }
                  }
                  ?>
               </ol>
            </div>
         </div>
      </section>
      <!------------------------------------------ over learner section end ------------------------------------>
      <!-------------------------------- socil_icon section start------------------------------>
      <section class="socil_icon_sec text-center">
         <div class="container">
            <ul>
               <li><a class="fb" href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
               <li><a class="twt" href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
               <li><a class="wifi" href="javascript:void(0);"><i class="fas fa-wifi"></i></a></li>
               <li><a class="gogpls" href="javascript:void(0);"><i class="fab fa-google-plus-g"></i></a></li>
               <li><a class="lindin" href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
         </div>
      </section>
      <!--------------------------------- socil_icon section end -------------------------------->