  <!--------------------------- profile start here ---------------------------->
  <section class="user_section profile_sec">
         <div class="container">
         <?php if($teacher_detail){?>
            <div class="row">

               <div class="col-md-8">
                  <div class="person_detail profile_part you_tube_video_sec">
                        <video controls>
                            <source src="<?php echo base_url($teacher_detail[0]['vedio']); ?>" type="video/mp4">
                        </video>
                    <div class="teachercard">
                        <div class="teachercard_left">
                           <div class="basic_info_profile pad_zero">
                              <ul>
                                 <li>
                                    <div class="profile_image">
                                       <a href="javascript:void(0);">   <img src="<?php echo base_url($user_detail[0]['avatar'])?>" alt="Profile"></a>
                                    </div>
                                 </li>
                                 <li class="margin_left">
                                    <ul class="p_margin_bottom">
                                       <li>
                                          <h5><?php echo $basic_detail[0]['first_name'] .' '.$basic_detail[0]['last_name'] ?></h5>
                                       </li>
                                       <li>
                                          <p>Professional Teacher</p>
                                       </li>
                                       <li>
                                          <p>From <?php echo $basic_detail[0]['from_add']?></p>
                                       </li>
                                       <li>
                                          <p>Living in <?php echo $basic_detail[0]['live_state']?>, <?php echo $basic_detail[0]['live_add']?> (UTC<?php echo $basic_detail[0]['time_zone']?>:00)</p>
                                       </li>
                                       <li class="redbar mar_set"></li>
                                    </ul>
                                    <ul class="margin_top_bottom">
                                       <li class="language_skill">
                                          <h6>TEACHES</h6>
                                          <p><?php echo $teacher_detail[0]['native_lang']?></p>
                                          <div class="display_inline">
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                          </div>
                                          <p></p>
                                       </li>
                                       <li class="language_skill learning">
                                          <h6>ALSO SPEAKS</h6>
                                          <p><?php echo $teacher_detail[0]['speak_language']?></p>
                                         <?php if($teacher_detail[0]['speak_level'] == 'A1'){?>
                                          <div class="display_inline">
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                          </div>
                                         <?php } else if($teacher_detail[0]['speak_level'] == 'A2') {?>
                                          <div class="display_inline">
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                          </div>
                                          <?php } else if($teacher_detail[0]['speak_level'] == 'B1') {?>
                                          <div class="display_inline">
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                          </div>
                                          <?php } else if($teacher_detail[0]['speak_level'] == 'B2') {?>
                                          <div class="display_inline">
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                          </div>
                                          <?php } else if($teacher_detail[0]['speak_level'] == 'C1') {?>
                                          <div class="display_inline">
                                             <span class="level level-color-2 level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                          </div>
                                          <?php } else if($teacher_detail[0]['speak_level'] == 'C2') {?>
                                          <div class="display_inline">
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                             <span class="level  level-color-3"></span>
                                          </div>
                                          <?php } ?>
                                       </li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="teachercard_right">
                           <div class="teachercard_right_stars">
                              <ul class="stars_box">
                                 <li class="star"></li>
                                 <li class="star"></li>
                                 <li class="star"></li>
                                 <li class="star"></li>
                                 <li class="star"></li>
                                 <span class="number">5.0</span>
                              </ul>
                           </div>
                           <p>156 LESSONS</p>
                           <p>22 STUDENTS</p>
                        </div>
                     </div>
                     <div class="border_hor"></div>
                     <div class="profile_about"> 
                        <div class="profile_about_heading">
                           <h5>About Me</h5> 
                           <p>My language Pro teacher since <?php echo $user_detail[0]['created_at']?></p>
                        </div>
                        <div><p><?php echo $teacher_detail[0]['about']?><span id="dots">...</span></p>
                        <div id="more" style="display:none">
                        <h5>Me as a Teacher</h5> 
                        <p><?php echo $teacher_detail[0]['teacher_info']?></p>
                        <h5>My Lessons & Teaching Style</h5> 
                        <p><?php echo $teacher_detail[0]['teaching_style']?></p>
                        </div></div>
                        <p style="color:#ff4338" onclick="myFunction()" id="myBtn">Read more</p>
                     </div>
                     <script>
                        function myFunction() {
                        var dots = document.getElementById("dots");
                        var moreText = document.getElementById("more");
                        var btnText = document.getElementById("myBtn");
                        if (dots.style.display === "none") {
                           dots.style.display = "inline";
                           btnText.innerHTML = "Read more"; 
                           moreText.style.display = "none";
                        } else {
                           dots.style.display = "none";
                           btnText.innerHTML = "Read less"; 
                           moreText.style.display = "inline";
                        }
                        }
                        </script>

                  </div>


                  <div class="person_detail profile_right_part private_info profile_mar_top" >
                         
                        
                            <div class="lesson_part">
                                  <h5>Lessons</h5>
                              <ul>
                                 <li class="lesson_card hover_cls">
                                 <?php if($lesson){?>
                                    <a href="javascript:void(0);">                            
                                    <div class="lesson_card_text mar_top">
                                       <div class="lesson_text">
                                          <h6><?php echo $lesson[0]['category']?> <?php echo $lesson[0]['language_taught']?> - <?php echo $lesson[0]['title']?></h6>
                                          <div class="redbar black lesson_bar"></div>
                                          <p><?php echo $lesson[0]['category']?>  • <?php echo $lesson[0]['language_taught']?> • $<?php echo $lesson[0]['total_price']?> USD / <?php echo $lesson[0]['lesson_time']."min";?></p>
                                       </div>
                                        <div class="lesson_icon">
                                        <?php
                                        $discount = $lesson[0]['total_price'] - ($lesson[0]['total_price'] * ($lesson[0]['discount']/100));
                                        ?>
                                         <span>EUR <?php echo $discount ;?></span>
                                       </div>
                                       <div class="lessoncard_discount">
                                          <span>Up to <?php echo $lesson[0]['discount']."%"?> off</span>
                                       </div>
                                    </div>
                                 </a>                                 
                                 </li>      
                                 <?php }?>                          
                              </ul>
                            </div>
                     </div>



                     <div class="person_detail profile_right_part private_info profile_mar_top" >                      
                            <div class="lesson_part">
                                  <h5>Resume</h5>
                              <ul class="pro_rsum">
                                 <li class="work_experience">                               
                                    <div class="lesson_card_text work_experience_part">
                                       <div class="pro_rsum_text">
                                          <h6>Work Experience</h6>
                                          <?php if($work){?>
                                          <p><?php echo $work[0]['from_work']?> - <?php echo $work[0]['to_work']?><br> <?php echo $work[0]['position']?> </br> <?php echo $work[0]['company']?></p>
                                          <?php } ?>
                                       </div>
                                    </div>                             
                                 </li>
                                 <li class="education">
                             
                                    <div class="lesson_card_text work_experience_part">
                                       <div class="pro_rsum_text">
                                          <h6>Education</h6>
                                          <?php if($education){?>
                                          <p><?php echo $education[0]['from_institute']?> - <?php echo $education[0]['to_institute']?> <br> <?php echo $education[0]['degree']?> - <?php echo $education[0]['Edu_description']?></p>
                                          <?php } ?>
                                       </div>
                                    </div>
                                   
                                 </li>

                                 <li class="certificates">
                                 
                                    <div class="lesson_card_text work_experience_part">
                                       <div class="pro_rsum_text">
                                          <h6>Certificates</h6>
                                          <p><?php echo $certificate;?> Uploaded certificates</p>
                                       </div>
                                    </div>
                                   
                                 </li>
                              </ul>
                            </div>
                     </div>





                  <div class="person_detail profile_right_part private_info profile_mar_top" > 
                     <div class="upcoming_wapper action_required statistics pro_statestics">
                        <h4>Statistics</h4>
                        <div class="upcoming_wapper_part statistics_sec pro_statestics_sec">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="up_part_profile statistics_part">
                                    <div class="up_part_text statistics_text">
                                       <h2>150</h2>
                                          <p> Completed lessons </p>
                                    </div>
                                   <div class="box_sec">
                                      <div class="box_one">
                                       <p>Jan</p>
                                          <div class="coler_bg"><p>6</p> </div>
                                      </div>
                                      <div class="box_one">
                                          <p>Feb</p>   
                                          <div class="coler_bg two_bg"><p>40</p></div>                   
                                      </div>
                                      <div class="box_one">
                                           <p>Mar</p>      
                                           <div class="coler_bg three_bg"><p> 80</p> </div>               
                                      </div>
                                </div>
                              </div>
                              </div>   
                              <div class="col-md-4">
                                 <div class="up_part_profile statistics_part">
                                    
                                   <div class="up_part_text statistics_text">
                                       <h2>97%</h2>
                                       <p>Response rate</p>
                                    </div>

                                    <div class="box_sec two_sec">
                                      <div class="box_one two ">
                                       <p>Jan</p>
                                          <div class="coler_bg three_bg"><p>90%</p> </div>
                                      </div>
                                      <div class="box_one two">
                                          <p>Feb</p>   
                                          <div class="coler_bg two_bg"><p>40%</p></div>                   
                                      </div>
                                      <div class="box_one two">
                                           <p>Mar</p>      
                                           <div class="coler_bg "><p> 8$</p> </div>               
                                      </div>
                                </div>
                              </div>
                          
                              </div> 
                              <div class="col-md-4">
                                 
                                 <div class="up_part_profile statistics_part">
                                    
                                   <div class="up_part_text statistics_text">
                                       <h2>99%</h2>
                                       <p>Attendance rate</p>
                                    </div>

                                    <div class="box_sec two_sec">
                                      <div class="box_one two ">
                                       <p>Jan</p>
                                          <div class="coler_bg three_bg"><p>90%</p> </div>
                                      </div>
                                      <div class="box_one two">
                                          <p>Feb</p>   
                                          <div class="coler_bg two_bg"><p>40%</p></div>                   
                                      </div>
                                      <div class="box_one two">
                                           <p>Mar</p>      
                                           <div class="coler_bg "><p> 8%</p> </div>               
                                      </div>
                                </div>
                              </div>
                         
                              </div> 
                           </div>
                        </div>
                     </div>
                  </div>

                   <div class="person_detail profile_right_part private_info profile_mar_top" > 

                     <div class="lesson_part">
                                  <h5>Reviews</h5>
                              <ul class="pro_rsum">
                                 <li class="reviews">
                                   
                                
                                   <!--  <div class="lesson_card_text work_experience_part"> -->
                                    <a href="javascript:void(0);">
                                       <div class="pro_rsum_text reviews_text_sec">
                                          <p>Perfect!</p>
                                          <div class="reviews_pro">
                                             <div class="reviews_img">
                                                <img src="<?php echo base_url('uploads/images/default.svg')?>" alt="Avatar">
                                             </div>
                                             <div class="reviews_text">
                                                <span>Eduardo Villanueva</span>
                                                <p>54 Lessons</p>
                                             </div>
                                             <p class="reviews_p">Apr 12, 2020</p>
                                          </div>
                                       </div>
                                    </a>
                                   <!--  </div> -->
                             
                                   
                                 </li>

                                 <li class="reviews mr_rgt">
                             
                                    <!-- <div class="lesson_card_text work_experience_part"> -->
                                       <a href="javascript:void(0);">
                                       <div class="pro_rsum_text reviews_text_sec">
                                          <p>One more lesson with James, as usual, it was extremely helpful! Thank you James see you soon.</p>
                                          <div class="reviews_pro">
                                             <div class="reviews_img">
                                                <img src="<?php echo base_url('uploads/images/default.svg')?>" alt="Avatar">
                                             </div>
                                             <div class="reviews_text">
                                                <span>Eduardo Villanueva</span>
                                                <p>54 Lessons</p>
                                             </div>
                                             <p class="reviews_p">Apr 12, 2020</p>
                                          </div>
                                       </div>
                                    </a>
                                    <!-- </div> -->
                                   
                                 </li>

                              </ul>
                        </div>

                   </div>






               </div>

               <div class="col-md-4">
                  <div class="position_fixed">
                     <div class="person_detail profile_part">
                        <div class="lessons_sec">
                           <div class="lessons_part disabled">
                              <p>Lessons</p>
                              <h5>EUR <?php echo $average_score ?></h5>
                           </div>
                           <input class="change_photo book_now disabled" type="button" name="" value="Book Now">
                           <div class="border_hor pd_bok"></div>
                           <button class="change_photo book_now cont_teach disabled">
                              <span>
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect width="24" height="24" fill="white"></rect>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 3.11111H6C5.44772 3.11111 5 3.60857 5 4.22222V19.7778C5 20.3914 5.44772 20.8889 6 20.8889H18C18.5523 20.8889 19 20.3914 19 19.7778V4.22222C19 3.60857 18.5523 3.11111 18 3.11111ZM6 2C4.89543 2 4 2.99492 4 4.22222V19.7778C4 21.0051 4.89543 22 6 22H18C19.1046 22 20 21.0051 20 19.7778V4.22222C20 2.99492 19.1046 2 18 2H6Z" fill="#333333"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14.5C7 14.2239 7.22386 14 7.5 14H13.5C13.7761 14 14 14.2239 14 14.5C14 14.7761 13.7761 15 13.5 15H7.5C7.22386 15 7 14.7761 7 14.5ZM7 17.5C7 17.2239 7.22386 17 7.5 17H12.5C12.7761 17 13 17.2239 13 17.5C13 17.7761 12.7761 18 12.5 18H7.5C7.22386 18 7 17.7761 7 17.5Z" fill="#333333"></path>
                                 </svg>
                              </span>
                              Contact Teacher                     
                           </button>
                        </div>
                     </div>
                     <div class="person_detail teacher_schedule">
                        <div class="lessons_sec">
                           <div class="teach_sched_part teach_cald_part">
                            <div id='calendar'></div>
                           </div>
                           <button class="change_photo book_now cont_teach">  
                           Check Availability                     
                           </button>
                           <p class="set_size"> Based on your timezone (UTC<?php echo $basic_detail[0]['time_zone']?>:00)</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <p class="usd_text">Your final payment will be made in USD</p>
                     <?php }else{?>
                     <div class="action_rew_part">    
                      <ul>
                         <li>
                           <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M42.4482 19.7422H49.3186L48.3958 20.665H42.4482V19.7422ZM42.7382 53.8853H25.616L24.6933 54.8081H43.3966C43.158 54.5156 42.938 54.2074 42.7382 53.8853ZM51.1165 40.5529C51.4293 40.5856 51.7372 40.6348 52.0393 40.6995V27.4617L51.1165 28.3845V40.5529ZM21.5873 20.8359V47.4738L20.6646 48.3966V20.8359C20.6646 20.2317 21.1557 19.7422 21.7604 19.7422H28.6064V20.665H21.7603C21.6646 20.665 21.5873 20.742 21.5873 20.8359Z" fill="#BFBFBF"></path><path d="M56.7883 38.9849C56.6082 38.8047 56.6082 38.5126 56.7883 38.3324C56.9685 38.1522 57.2607 38.1522 57.4408 38.3324L60.2092 41.1008C60.3894 41.2809 60.3894 41.5731 60.2092 41.7533C60.029 41.9335 59.7369 41.9335 59.5567 41.7533L56.7883 38.9849Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M41.8467 24.356C42.3886 24.356 42.8114 23.891 42.8114 23.3409V18.9115C42.8114 18.3615 42.3886 17.8965 41.8467 17.8965H29.0115C28.4696 17.8965 28.0468 18.3615 28.0468 18.9115V23.3409C28.0468 23.891 28.4696 24.356 29.0115 24.356H41.8467ZM41.8886 18.9116V23.3409C41.8886 23.3999 41.8584 23.4332 41.8467 23.4332H29.0116C28.9999 23.4332 28.9696 23.3999 28.9696 23.3409V18.9116C28.9696 18.8526 28.9999 18.8193 29.0116 18.8193H41.8467C41.8584 18.8193 41.8886 18.8526 41.8886 18.9116Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M50.1937 58.4987C55.2901 58.4987 59.4216 54.3672 59.4216 49.2708C59.4216 44.1744 55.2901 40.043 50.1937 40.043C45.0973 40.043 40.9658 44.1744 40.9658 49.2708C40.9658 54.3672 45.0973 58.4987 50.1937 58.4987ZM50.1937 40.9658C54.7804 40.9658 58.4987 44.6841 58.4987 49.2708C58.4987 53.8576 54.7804 57.5759 50.1937 57.5759C45.6069 57.5759 41.8886 53.8576 41.8886 49.2708C41.8886 44.6841 45.6069 40.9658 50.1937 40.9658Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M74 37C74 57.4346 57.4346 74 37 74C28.1837 74 20.0878 70.9167 13.7316 65.7696L14.3878 65.1133C20.5739 70.0953 28.4386 73.0772 37 73.0772C56.9249 73.0772 73.0772 56.9249 73.0772 37C73.0772 28.4386 70.0951 20.5738 65.1129 14.3876L65.7691 13.7314C70.9165 20.0876 74 28.1837 74 37ZM59.9215 9.13884C53.6892 4.00554 45.7046 0.922786 37 0.922786C17.0746 0.922786 0.922798 17.0748 0.922798 37C0.922798 45.7049 4.00558 53.6896 9.139 59.922L8.48351 60.5775C3.18452 54.1757 0 45.9598 0 37C0 16.5652 16.5649 0 37 0C45.9595 0 54.1752 3.18449 60.577 8.48335L59.9215 9.13884Z" fill="#BFBFBF"></path><path d="M66.3679 7.26014C66.5481 7.07995 66.8402 7.07995 67.0204 7.26014C67.2006 7.44032 67.2006 7.73246 67.0204 7.91265L7.98821 66.9456C7.80803 67.1258 7.51589 67.1258 7.3357 66.9456C7.15552 66.7654 7.15551 66.4733 7.3357 66.2931L66.3679 7.26014Z" fill="#BFBFBF"></path></svg></li>
                         <li><a href="<?php echo base_url('teacher/console?id='.$user_detail[0]['id'])?>" class="sub_btn login act_book_now" > FIll NOW</a></li>
                      </ul>
                    </div>
                  <?php } ?>
         </div>
      </section>
<style>
   .fc-left, .fc-right {
    display: none;
}
</style>
      <!--------------------------- profile end here ---------------------------->