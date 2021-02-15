

      <!---------------------------  section start here ---------------------------->
      <section class="user_section dashboard_sec">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-4">
      				<div class="person_detail dsb_pro_prt">
      	              <div class="profile_image dsb_pro_img">
                        <a href="javascript:void(0);">   <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="Profile"></a>
                        </div>
                        <ul class="display_inline_block">
                        <li class="profile_name dsb_pro_name">
                           <h3><?php  print_r($user_detail[0]['username']); ?></h3>
                        </li>
                        <li class="person_information dsb_pro_us_id">
                           <p>User ID: <?php print_r($user_detail[0]['id']);?></p>
                        </li>
                        <li class="person_information dsb_pro_time">
                           <p><?php print_r($user_detail[0]['created_at']);?> <img src="<?php echo base_url(); ?>assets/admin/img/warning_icon.svg" alt="warning-icon"><a href="<?php echo base_url('teacher/console?id='.$user_detail[0]['id']);?>">Edit</a></p>
                          
                        </li>
                     </ul>
      				</div>
      			</div>
               <div class="col-md-5">
                  <div class="person_detail">
                     <div class="dashboard_lesson">
                        <ul>
                           <a href="javascript:void(0);">
                           <li>
                              <h2>1</h2>
                              <p>Upcoming Lessons</p>
                           </li>
                        </a>
                        <a href="javascript:void(0);">
                           <li>
                              <h2>0</h2>
                              <p>Action Required</p>
                           </li>
                        </a>
                        <a href="javascript:void(0);">
                           <li>
                              <h2>0</h2>
                              <p>Package Action</p>
                           </li>
                        </a>

                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="person_detail">
                     <div class="dashboard_finance">
                        <p>Total Balance</p>
                        <h3>$ <?php echo $sum_transaction ?> USD</h3>
                        <a href="<?php echo base_url('teacher/Wallet') ?>">Withdraw</a>
                     </div>
                  </div>
               </div>
               
      			
      		</div>
            <div class="row">
               <div class="col-md-6">
                  <a href="<?php echo base_url('support') ?>"  target="_blank">
                  <div class="person_detail dsb_teacher">
                     <div class="teacher_form">
                        <h3>Teacher Forum</h3>
                        <p>Where great minds meet</p>
                     </div>
                     <img src="<?php echo base_url(); ?>assets/admin/img/teacher_forum_icon.svg" alt="teacher forum">
                  </div>
                  </a>
               </div>
                

               <div class="col-md-6">
                  <a href="<?php echo base_url('teachers-queries') ?>" target="_blank">
                  <div class="person_detail dsb_teacher">

                     <div class="teacher_form">
                        <h3>Teacher Knowledge Base</h3>
                        <p>Unleash the secret of success</p>
                     </div>
                     <img src="<?php echo base_url(); ?>assets/admin/img/teacher_knowledge_icon.svg" alt="teacher forum">
                  </div>
               </a>
               </div>


            </div>


            <!-- <a href="javascript:void(0);">
            <div class="techdas_invit">
               <div class="row">
                  <div class="col-md-6">
                     <div class="techdas_invit_part">
                        <h3>There's a new feature called Lesson Invitation</h3>
                        <p>Click here to learn more about this feature</p>
                     </div>
                  </div>
                  
               </div>
            </div>
         </a> -->


         <div class="upcoming_wapper">
            <h4>Upcoming Lessons •</h4>
            <div class="upcoming_wapper_part">
            <?php     foreach($book_teacher as $book){
                if($book['book_status'] == '1'){?>
               <div class="row">
                  <div class="col-md-4">
                     <div class="up_part_profile">
                       <div class="profile_image up_part_pro">
                        <a href="javascript:void(0);">   <img src="<?php echo base_url($book['avatar']) ?>" alt="Profile"></a>
                        </div>
                        <a href="javascript:void(0);">
                       <div class="up_part_text">
                           <h6><?php echo $book['username'] ?></h6>
                           <p><?php echo $book['comm_tool'] ?> ID:<?php echo $book['comm_id'] ?></p>
                        </div>
                     </a>
                  </div>
                  </div>   
                  <div class="col-md-4">
                     <div class="up_part_profile">
                        <a href="javascript:void(0);">
                       <div class="up_part_text">
                           <p><b><?php echo $book['category'] ?>   - <?php echo $book['title'] ?></b></p>
                           <p><?php echo $book['language_taught'] ?> - <?php echo $book['lesson_time'] ?> minutes</p>
                        </div>
                     </a>
                  </div>
                  </div> 
                  <div class="col-md-4">
                     <div class="up_part_profile flex_center"> 
                       <div class="up_part_text timers text-center">
                           <!-- <h6>Your lesson will start Shortly</h6> -->
                           <h6>Your lesson will start in</h6>
                           <h3>00h 01m 39s</h3>
                        </div>
                  </div>
                  </div> 
               </div>
               <?php 
               // }
               // else{
               // echo'  <span style="margin-left: 41%;">NO RECORD</span>';
               }}?>
            </div>
            <!-- <div class="show_all text-center">
            <input  type="button" name="" value="Show All . 10">
            </div> -->
         </div>


<div class="upcoming_wapper action_required">
            <h4>Action Required • </h4>
            <div class="upcoming_wapper_part">
              <?php foreach($book_teacher as $book){
                if($book['book_status'] == '0' && $book['payment_status'] == '0'){?> 
               <div class="row">
                  <div class="col-md-4">
                     <div class="up_part_profile">
                         
                       <div class="profile_image up_part_pro">
                        <a href="javascript:void(0);">   <img src="<?php echo base_url($book['avatar']) ?>" alt="Profile"></a>
                        </div>
                        <a href="javascript:void(0);">
                       <div class="up_part_text">
                            <h6><?php echo $book['username'] ?></h6>
                           <p><?php echo $book['comm_tool'] ?> ID:<?php echo $book['comm_id'] ?></p>
                        </div>
                     </a>
                  </div>
                  </div>   
                  <div class="col-md-4">
                     <div class="up_part_profile">
                         <a href="javascript:void(0);">
                       <div class="up_part_text">
                            <p><b><?php echo $book['category'] ?>   - <?php echo $book['title'] ?></b></p>
                           <p><?php echo $book['language_taught'] ?> - <?php echo $book['lesson_time'] ?> minutes</p>
                        </div>
                     </a>
                  </div>
              
                  </div> 
                  <div class="col-md-4">
                     
                     <div class="up_part_profile flex_center"> 
                         <a href="javascript:void(0);">
                       <div class="up_part_text timers text-center">
                           <h6>New lesson request</h6>
                           <p><?php echo date("d-m-Y", strtotime($book['start']) ) ?> <?php echo $book['from_time'] ?> </p>
                        </div>
                     </a>
                  </div>

                  </div>
                  <div class="col-md-12">
                     <div class="accept_deline_part text-center">
                        <hr>
                        <!-- <input class="sub_btn accept" type="submit" name="" value="Accept"> -->
                        <a href="<?php echo base_url('teacher/accept_book?id='.$book['booking_id']);?>" class="sub_btn accept">Accept</a>
                        <a href="<?php echo base_url('teacher/decline_book?id='.$book['booking_id']);?>" class="sub_btn decline">Decline</a>
                     </div>
                  </div> 
               </div>
                <?php //}
               //  else{
               // echo'  <span style="margin-left: 41%;">NO RECORD</span>';
              } } ?>
              
            </div>
         </div>

<div class="upcoming_wapper action_required statistics">
            <h4>Statistics</h4>
            <div class="upcoming_wapper_part statistics_sec">
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

      </section>



      <!---------------------------  section end here ---------------------------->

