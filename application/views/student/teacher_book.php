  <!--------------------------- profile start here ---------------------------->
  <section class="user_section profile_sec">
         <div class="container">
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
                                       <a href="javascript:void(0);"> <img src="<?php echo base_url($user_detail[0]['avatar'])?>" alt="Profile"></a>
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
                        <p style="color:#0071b9" onclick="myFunction()" id="myBtn">Read more</p>
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
                                <?php if($lesson){ 
                                    foreach( $lesson as $les ){
                                ?>
                                
                                 <li class="lesson_card hover_cls">
                                    <a href="javascript:void(0);">                            
                                    <div class="lesson_card_text mar_top">
                                       <div class="lesson_text">
                                          <h6><?php echo $les['category']?> <?php echo $les['language_taught']?> - <?php echo $les['title']?></h6>
                                          <div class="redbar black lesson_bar"></div>
                                          <p><?php echo $les['category']?>  • <?php echo $les['language_taught']?> • $<?php echo $les['total_price']?> USD / <?php echo $les['lesson_time']."min";?></p>
                                       </div>
                                        <div class="lesson_icon">
                                        <?php
                                        $discount = $les['total_price'] - ($les['total_price'] * ($les['discount']/100));
                                        ?>
                                        <?php if($studentCountry === 'United States'){ ?>
                                         <span>$	&nbsp;<?php echo $discount;?></span>
                                        <?php }
                                        else {?>
                                         <span><?php echo $studentCurrency['currencySymbol'];?>	&nbsp;<?php echo $discount * $studentCurrency['currencyRate'] ;?></span>
                                         <?php }?>
                                       </div>
                                       <div class="lessoncard_discount">
                                          <span>Up to <?php echo $les['discount']."%"?> off</span>
                                       </div>
                                    </div>
                                 </a>                                 
                                 </li>
                                  <?php } }?>
                              </ul>
                               
                            </div>
                     </div>

                    <div class="person_detail profile_right_part private_info profile_mar_top" >
                         
                            <div class="lesson_part">
                                <h5>Teacher Calendar</h5> 
                                <p>This is your calendar. You can set specific dates and times when you are available.</p>
                                <link href='<?php echo base_url();?>Cassets/js/lib/main.css' rel='stylesheet' />
                            <link href="<?php echo base_url();?>Cassets/css/bootstrapValidator.min.css" rel="stylesheet" />        
                            <link href="<?php echo base_url();?>Cassets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
                            <script src='<?php echo base_url();?>Cassets/js/moment.min.js'></script>
                            <script src="<?php echo base_url();?>Cassets/js/jquery.min.js"></script>
                            <script src="<?php echo base_url();?>Cassets/js/bootstrapValidator.min.js"></script>
                            <script src="<?php echo base_url();?>Cassets/js/lib/main.js"></script>
                            <script src='<?php echo base_url();?>Cassets/js/main.js'></script>
                            <?php
                                $days       = [];
                                $start_time = [];
                                $end_time   = [];
                                foreach( $availbility as $availble ){
                                    if( $availble['date_day'] == '0' ){
                                        if( $availble['day'] == 'Mon' ){
                                            array_push( $days , 1 );
                                            array_push( $start_time , $availble['start_time'] );
                                            array_push( $end_time , $availble['end_time'] );
                                        }else if($availble['day'] == 'Tue'){
                                            array_push( $days , 2 );
                                            array_push( $start_time , $availble['start_time'] );
                                            array_push( $end_time , $availble['end_time'] );
                                        }else if($availble['day'] == 'Wed'){
                                            array_push( $days , 3 );
                                            array_push( $start_time , $availble['start_time'] );
                                            array_push( $end_time , $availble['end_time'] );
                                        }else if($availble['day'] == 'Thurs'){
                                            array_push( $days , 4 );
                                            array_push( $start_time , $availble['start_time'] );
                                            array_push( $end_time , $availble['end_time'] );
                                        }else if($availble['day'] == 'Fri'){
                                            array_push( $days , 5 );
                                            array_push( $start_time , $availble['start_time'] );
                                            array_push( $end_time , $availble['end_time'] );
                                        }else if($availble['day'] == 'Sat'){
                                            array_push( $days , 6 );
                                            array_push( $start_time , $availble['start_time'] );
                                            array_push( $end_time , $availble['end_time'] );
                                        }else if($availble['day'] == 'Sun'){
                                            array_push( $days , 7 );
                                            array_push( $start_time , $availble['start_time'] );
                                            array_push( $end_time , $availble['end_time'] );
                                        }    
                                    }else{
                                        $date_events[] = array (
                                            'title' => $availble['day'],
                                            'start' => $availble['day'],
                                        );
                                    }
                                }
                                foreach( $days as $key => $day ){
                                    
                                    $startEnd = date('h:i A', strtotime($start_time[$key])).' T '.date('h:i A', strtotime($end_time[$key]));
                                    $events[] = array (
                                        'daysOfWeek' => [ $day ],
                                        'title'      => $startEnd,
                                        'color'      => 'green'
                                    );
                                }
                            ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    events: [
                                        <?php 
                                            foreach ( $events as $event ){
                                                echo json_encode($event).",";
                                            }
                                            foreach ( $date_events as $date_event ){
                                                echo json_encode($date_event).",";
                                            }
                                        ?>
                                    ],
                                    height: 650,
                                });
                                calendar.render();
                                });
                            </script>
                            <div id='calendar'></div>
                            </div>
                     </div>

    
                     <div class="person_detail profile_right_part private_info profile_mar_top" >                      
                            <div class="lesson_part">
                                  <h5>Resume</h5>
                              <ul class="pro_rsum">
                                 <?php if($work ){?>
                                    <li class="work_experience">                               
                                       <div class="lesson_card_text work_experience_part">
                                          <div class="pro_rsum_text">
                                             <h6>Work Experience</h6>
                                             <p><?php echo $work[0]['from_work']?> - <?php echo $work[0]['to_work']?><br> <?php echo $work[0]['position']?> </br> <?php echo $work[0]['company']?></p>
                                          </div>
                                       </div>                             
                                    </li>
                                 <?php }  if($education){?>
                                    <li class="education">
                                       <div class="lesson_card_text work_experience_part">
                                          <div class="pro_rsum_text">
                                             <h6>Education</h6>
                                             <p><?php echo $education[0]['from_institute']?> - <?php echo $education[0]['to_institute']?> <br> <?php echo $education[0]['degree']?> - <?php echo $education[0]['Edu_description']?></p>
                                          </div>
                                       </div>                                    
                                    </li>
                                 <?php }  if($education){?>
                                    <li class="certificates">                                 
                                       <div class="lesson_card_text work_experience_part">
                                          <div class="pro_rsum_text">
                                             <h6>Certificates</h6>
                                             <p><?php echo $certificate;?> Uploaded certificates</p>
                                          </div>
                                       </div>
                                    </li>
                                 <?php } ?>
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
                           <div class="lessons_part">
                              <p>Lessons</p>
                              <?php if($studentCountry === 'United States'){ ?>$ &nbsp;<?php echo $average_score; ?></h5><?php } 
                              else {?>
                              <h5> <?php echo $studentCurrency['currencySymbol']; ?>	&nbsp;<?php echo $average_score * $studentCurrency['currencyRate']; ?></h5>
                              <?php }?>
                           </div>
                           <?php if(user()){if(user()->role == "student") {?>
                           <a style="background: #0071b9;border-color: #0071b9;display: block;text-align: center;   " class="change_photo book_now" href="<?php echo base_url('student/book?id='.$user_detail[0]['id'].'&page=Select-Lesson')?>" target="_blank">Book Now</a>
                           
                           <div class="border_hor pd_bok"></div>
                           <button  data-toggle="modal" data-target="#time" class="change_photo book_now cont_teach ">
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
                           <?php }else if(user()->role == "teacher") {?>
                           <a style="background: #0071b9;border-color: #0071b9;display: block;text-align: center;   cursor: not-allowed;" class="change_photo book_now" href="<?php echo base_url('student/book?id='.$user_detail[0]['id'].'&page=Select-Lesson')?>" target="_blank">Book Now</a>
                           <div class="border_hor pd_bok"></div>
                           <button  data-toggle="modal" data-target="#time" class="change_photo book_now cont_teach " style="cursor: not-allowed;">
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
                        <?php }}else{?>
                           <a style="background: #0071b9;border-color: #0071b9;display: block;text-align: center;" class="change_photo book_now" href="<?php echo base_url('student/book?id='.$user_detail[0]['id'].'&page=Select-Lesson')?>" target="_blank">Book Now</a>
                           <div class="border_hor pd_bok"></div>
                           <button  data-toggle="modal" data-target="#time" class="change_photo book_now cont_teach" style="cursor: not-allowed;">
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
                        <?php }?>
                     </div>
                     <div class="person_detail teacher_schedule" hidden>
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
         </div>
      </section>
<style>
   .fc-left, .fc-right {
    display: none;
}
</style>
<!--------------------------- profile end here ---------------------------->

<div class="modal fade" id="time" role="dialog">
   <div class="modal-dialog">                                                              
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <h5 style="text-indent: 15pc;">Contact <?php echo $basic_detail[0]['first_name'] .' '.$basic_detail[0]['last_name'] ?></h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <form class="basic_info_form availab_form" action="<?php echo base_url('student/student_contact') ?>" method="POST">
         <div class="modal-body">
            <div class="row form_row">
               <?php if($teacher_detail){ foreach($teacher_detail as $details){
                  if( $details['teacher_reason'] == '1'){?>
                  <div class="form-group col-md-12">
                  <label>What is the main reason you're taking lessons?</label>
                  <select  name="teacher_reason" required class="custom-select animations-select arrow_des" id="teacher_reason">
                        <option>Please select an option</option>
                        <option value="School">School</option>
                        <option value="Test">Test</option>
                        <option value="Work">Work</option>
                        <option value="Travel">Travel</option>
                        <option value="Personal interest">Personal interest</option>
                        <option value="Lessons are for my child">Lessons are for my child</option>
                        <option value="Other">Other</option>
                     </select>
                     <!-- <input type="text" class="custom-select animations-select arrow_des" name="teacher_reason" id="teacher_reason1" style='display:none;margin-top: 11px;'/> -->
                  </div>
               <?php }  if( $details['teachingplan'] == '1'){?>
                  <div class="form-group col-md-12">
                  <label>How often are you planning to take lessons?</label>
                  <select  name="teachingplan" required class="custom-select animations-select arrow_des" id="inputGroupSelect03">
                        <option>Please select an option</option>
                        <option value="School">1 lesson every 2 weeks</option>
                        <option value="Test">1 lesson a week</option>
                        <option value="Work">2 lessons a week</option>
                        <option value="Travel">3+ lessons a week</option>
                     </select>
                  </div>
               <?php }  if( $details['lesson_length'] == '1'){?>
                  <div class="form-group col-md-12">
                     <label>What is a comfortable lesson length for you?</label>
                     <select  name="lesson_length" class="custom-select animations-select arrow_des" id="inputGroupSelect03" required>
                        <option>Please select an option</option>
                        <option value="School">30 minutes</option>
                        <option value="Test">60 minutes</option>
                     </select>
                  </div>
               <?php }   if( $details['specific_area'] == '1'){?>
                  <div class="form-group col-md-12">
                     <label>Is there a specific area that you would like to focus on during your lessons?</label>
                     <select  name="specific_area" required class="custom-select animations-select arrow_des" >
                        <option>Please select an option</option>
                        <option value="Grammar">Grammar</option>
                        <option value="Vocabulary">Vocabulary</option>
                        <option value="Pronunciation">Pronunciation</option>
                        <option value="Reading Comprehension">Reading Comprehension</option>
                        <option value="Conversational Practice">Conversational Practice</option>
                        <option value="Vocabulary">Vocabulary</option>
                        <option value="Other">Other</option>
                     </select>
                     <!-- <input type="text" class="custom-select animations-select arrow_des" name="specific_area" id="specific_area" style='display:none;margin-top: 11px;'/> -->
                     </select>
                  </div>
               <?php }  if( $details['language_prof'] == '1'){?>
                  <div class="form-group col-md-12">
                  <label>What language proficiency level are you aiming for?</label>
                  <select  name="language_prof" class="custom-select animations-select arrow_des" id="inputGroupSelect03" required>
                        <option>Please select an option</option>
                        <option value="School">A1: Beginner</option>
                        <option value="Test">A2: Elementary</option>
                        <option value="Work">B1: Intermediate</option>
                        <option value="Travel">B2: Upper Intermediate</option>
                        <option value="Personal interest">C1: Advanced</option>
                        <option value="Lessons are for my child">C2: Proficient</option>
                        <option value="Native">Native</option>
                     </select>
                   </div>
               <?php }  if( $details['teacher_material'] == '1'){?>
                  <div class="form-group col-md-12">
                  <label>What kind of teaching materials would be most helpful to you?</label>
                  <select  name="teacher_material" class="custom-select animations-select arrow_des">
                        <option>Please select an option</option>
                        <option value="PDF file">PDF file</option>
                        <option value="Test">Text Documents</option>
                        <option value="Work">Presentation slides/PPT</option>
                        <option value="Audio files">Audio files</option>
                        <option value="Image files">Image files</option>
                        <option value="Video files">Video files</option>
                        <option value="Flashcards">Flashcards</option>
                        <option value="Articles and news">Articles and news</option>
                        <option value="Quizzes"> Quizzes</option>
                        <option value="Test templates and examples">Test templates and examples</option>
                        <option value="Graphs and charts">Graphs and charts</option>
                        <option value="Homework Assignments">Homework Assignments</option>
                        <option value="Other">Other</option>
                     </select>
                     <!-- <input type="text" class="custom-select animations-select arrow_des" name="teacher_material" id="teacher_material" style='display:none;margin-top: 11px;'/> -->
                  </div>
               <?php }  if( $details['time_prefer'] == '1'){?>
                  <div class="form-group col-md-12">
                  <label>What is the main reason you're taking lessons?</label>
                  <select  name="time_prefer" class="custom-select animations-select arrow_des" id="inputGroupSelect03" required>
                        <option>Please select an option</option>
                        <option value="Early Morning (06:00 - 09:00)">Early Morning (06:00 - 09:00)</option>
                        <option value="Morning (09:00 - 12:00)">Morning (09:00 - 12:00)</option>
                        <option value="Afternoon (12:00 -15:00)">Afternoon (12:00 -15:00)</option>
                        <option value="Late Afternoon (15:00 -18:00)">Late Afternoon (15:00 -18:00)</option>
                        <option value="Evening (18:00 - 21:00)">Evening (18:00 - 21:00)</option>
                        <option value="Night (21:00 - 00:00)">Night (21:00 - 00:00)</option>
                        <option value="After Midnight (00:00 - 06:00)">After Midnight (00:00 - 06:00)</option>
                     </select>
                     </div>
               <?php }  if( $details['fsq'] == '1'){?>
                  <div class="form-group col-md-12">
                  <label>Is there anything else you would like the teacher to know about you? (Optional)</label>
                  <textarea name="fsq" class="form-control" maxlength="200"> </textarea></div>
                     <?php }?>
                    
                  </div>
         </div>
         <div class="modal-footer">
                  <button type="button" class="close_butoon" data-dismiss="modal">Close</button>   
                  <input type="hidden" name="teacher_id" value="<?php echo $details['user_id'] ?>"> 
                  <input type="hidden" name="student_id" value="<?php echo $this->session->userdata('id'); ?>"> 
                  <input type="submit" style="background: #0071b9;display: block;border-radius: 4px;font-size: 14px;border: 0px;text-transform: uppercase;padding: 6px 16px;margin-top: 8px;color: #fff;text-align: center;" name="save" value="Send">
         </div>
         <?php }} ?>
         </form>

      </div>                                                                
   </div>
</div>

<style>
div#time>.modal-dialog {
    width: 100%;
    height: 100%;
    max-width: 730px;
}
#time>.modal-dialog>.modal-content{
   display: block;
    margin: 122px auto !important;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 0 55px 0 rgba(0,0,0,.3);
    overflow: hidden;
}
#time .modal-header{
   align-items: center;
   margin: 0 30px;
    height: 80px;
    border-bottom: 1px solid #ddd;
    position: relative;
    top: 0;
    left: 0;
    line-height: 80px;
    font-size: 23px;
    font-weight: 300;
    color: #333;
}
#time .modal-body {
    padding: 40px 44px 0;
    overflow-y: auto;
}
.lessons_sec a:hover {
    color: #fff;
    background: #143a53 !important;
}
#time label:before {
   content: "";
    width: 2px;
    height: 20px;
    background-color: #0071b9;
    position: absolute;
    left: 0px;
}
button.close_butoon {
    background: no-repeat;
    border: 1px solid #484848;
    border-radius: 4px;
    font-size: 14px;
    text-transform: uppercase;
    padding: 5px 15px;
    margin-top: 8px;
    color: #484848;
}
</style>

<script type="text/javascript">
// function CheckColors(val){
//  var element=document.getElementById('teacher_reason');
//  if(val=='Other')
//    element.style.display='block';
//  else  
//    element.style.display='none';
// }
// $("#teacher_reason").change(function () {
//     var selected_option = $('#fnivel').val();
//     if (selected_option === 'other') {
//         $('#fnivel2').attr('pk').show();
//     }
// })
// function specific_area(val){
//  var element=document.getElementById('specific_area');
//  if(val=='Other')
//    element.style.display='block';
//  else  
//    element.style.display='none';
// }
// function teacher_material(val){
//  var element=document.getElementById('teacher_material');
//  if(val=='Other')
//    element.style.display='block';
//  else  
//    element.style.display='none';
// }

</script> 