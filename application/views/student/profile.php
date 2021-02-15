
      <!--------------------------- user section start here ---------------------------->
      <section class="user_section">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-4">
      				<div class="person_detail">
      					<div class="profile_part">
      						<div class="profile_image">
      						<a href="javascript:void(0);">	<img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="Profile"></a>
      						</div>
      					</div>	
      		<?php foreach($sdetail as $sdetails){?>
				  		<ul>
      						<li class="profile_name">
      							<h3><?php echo $user_detail[0]['username']?></h3>
      							<img width="25" height="31" src="<?php echo base_url('uploads/images/prifile.icon.svg')?>" alt="premium">
      						</li>
      						<!-- <li class="offline">
      							<p>Offline</p>
      						</li> -->
      						<li class="redbar">
      						</li>
      						<li class="person_information">
      							<p><?php echo $user_detail[0]['gender']?>, From <?php echo $sdetails['from_country']?></p>
      						</li>
      						<li class="person_information">
      							<p>Living in <?php echo $sdetails['live_country']?>, <?php echo $sdetails['live_state']?> (UTC<?php echo $sdetails['time_zone']?>:00)</p>
      						</li>
      						<li class=" person_information order_id">
      							<p>User ID: <?php echo $sdetails['user_id']?></p>
      						</li>
      						<!-- <li class="person_button"> -->
      							<!-- <input class="add_friend" type="button" name="" value="Add as Friend" disabled>
      							<input type="button" name="" value="Send message" disabled> -->
      							<!-- <input type="button" name="" value="Switch to Teacher Profile"> -->
      						<!-- </li> -->
      					</ul>
			  <?php } ?>
      				</div>
      				<div class="person_detail pro_teacher_detail">
					  <?php if(!empty($teacher_sub)){?>
						<div class=" profile_name pro_teacher_detail_header">
      						<h3>Teachers • <?php echo count($teacher_sub)?></h3>
      							<a class="float-right" href="<?php echo base_url('student/teacher')?>"> See All</a>
      					</div>
      					<div class="redbar black"></div>
      					<div class="pro_teacher_detail_part">
      					<ul>
							<?php foreach($teacher_sub as $detail){?>	  
							  <li class="profile_image pro_detail_part">
      							<a href="<?php echo base_url('teacher-detail?id='.$detail['id'].'')?>" target="_blank"> <img src="<?php echo base_url($detail['avatar'])?>" alt="Profile"></a>
							  </li>
							<?php } ?>
      					</ul>
						  </div>
					<?php } else{
					echo '<div class=" profile_name pro_teacher_detail_header">
					<h3>Teachers • 0</h3></div><div class="redbar black"></div>';
					echo "<div><a href='".base_url('find-teachers')."'>Find Teacher</a></div>";   
                    }?>
      				</div>
					
      			</div>
      			<div class="col-md-8">
      				<div class="profile_right_sec">
      					<div class="person_detail profile_right_part">
						
							  <ul>
      							<li class="profile_name pro_rgt_prt_head">
      								<h3>Profile</h3>
      								<?php if($not_found) {?>
      								<h3 style='color:red;'>Your profile is incomplete!</h3>
									<?php } ?>
									<a href="<?php echo base_url('student/edit_profile?id='.user()->id);?>">
									  <input type="button" name="" value="Edit Profile" class="float-right">
										</a>
								  </li>
								  <?php foreach($sdetail as $sdetails){?>
      							<hr>
      							<li class="person_information pro_rgt_prt_title">
      								<p><?php echo $sdetails['intro'];?></p>
      							</li>
      							<div class="redbar ">
      							</div>
      							<li class="language_skill">
      								<h6>LANGUAGE SKILLS</h6>
      								<!--<p><?php echo $languages[0];?>-->
      								<?php foreach($languages as $language){ ?>
      								<p> <?php echo $language ?>
										<div class="display_inline">
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
										</div>
      								</p><? } ?>
									<!--<p><?php echo $languages[1];?>-->
										<div class="display_inline">
										<?php if($sdetails['speak_lang_level'] == 'A1: Beginner'){ ?>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
						  				<?php } else if($sdetails['speak_lang_level'] == 'A2: Elementary'){ ?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
										<?php } 
										else
										 if($sdetails['speak_lang_level'] == 'B1: Intermediate') { ?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>	
										<?php } else if($sdetails['speak_lang_level'] == 'B2: Upper Intermediate'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
										<?php } else if($sdetails['speak_lang_level'] == 'C1: Advanced'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
										<?php } else if($sdetails['speak_lang_level'] == 'C2: Proficient'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
										<?php } ?>
										</div>

									</p>
									<p><?php echo $sdetails['speak_lang2'];?>
										<div class="display_inline">
										<?php if($sdetails['speak_lang_level2'] == 'A1: Beginner'){ ?>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
						  				<?php } else if($sdetails['speak_lang_level2'] == 'A2: Elementary'){ ?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
										<?php } 
										else
										 if($sdetails['speak_lang_level2'] == 'B1: Intermediate') { ?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>	
										<?php } else if($sdetails['speak_lang_level2'] == 'B2: Upper Intermediate'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
										<?php } else if($sdetails['speak_lang_level2'] == 'C1: Advanced'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
										<?php } else if($sdetails['speak_lang_level2'] == 'C2: Proficient'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
										<?php } ?>
										</div>

									</p>
      							</li>

      							<li class="language_skill learning">
      								<h6>LEARNING LANGUAGELLS</h6>
      								<!--<?php if($sdetails['learning'] == '1' ){?>-->
									  <!--<p><?php echo $sdetails['speak_lang'];?>-->
									  	<?php foreach($languages as $language){ ?>
      								<p> <?php echo $language ?>
										<div class="display_inline">
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
										</div>
      								</p><? } ?>
										<div class="display_inline">
										<?php if($sdetails['speak_lang_level'] == 'A1: Beginner'){ ?>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
						  				<?php } else if($sdetails['speak_lang_level'] == 'A2: Elementary'){ ?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
										<?php } 
										else
										 if($sdetails['speak_lang_level'] == 'B1: Intermediate') { ?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>	
										<?php } else if($sdetails['speak_lang_level'] == 'B2: Upper Intermediate'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
										<?php } else if($sdetails['speak_lang_level'] == 'C1: Advanced'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
										<?php } else if($sdetails['speak_lang_level'] == 'C2: Proficient'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											</p>
										<?php }}
										if($sdetails['learning2'] == '1' ){?>
										<p><?php echo $sdetails['speak_lang2'];?>
										<div class="display_inline">
										<?php if($sdetails['speak_lang_level2'] == 'A1: Beginner'){ ?>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
						  				<?php } else if($sdetails['speak_lang_level2'] == 'A2: Elementary'){ ?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
										<?php } 
										else
										 if($sdetails['speak_lang_level2'] == 'B1: Intermediate') { ?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>	
										<?php } else if($sdetails['speak_lang_level2'] == 'B2: Upper Intermediate'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
										<?php } else if($sdetails['speak_lang_level2'] == 'C1: Advanced'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
										<?php } else if($sdetails['speak_lang_level2'] == 'C2: Proficient'){?>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
										<?php } ?>
										</div>

									</p>
									<?php 	} ?>
									<?php }?>
      						</ul>
      					</div>


      					<div class="person_detail profile_right_part lesson_feedback">
      						<ul>
      							<li class="profile_name pro_rgt_prt_head">
      								<h3>Lesson Feedback</h3>
      								<input type="button" name="" value="Read All 1 Feedback" class="float-right">
      							</li>

      							<li class="person_information pro_rgt_prt_title lesson_feedback_tabel">
      								<table><thead><tr><th></th><th><span>Last month</span></th><th><span>Last 3 months</span></th><th><span>All time</span></th></tr></thead><tbody><tr><td><span>Completed lessons</span></td><td>0</td><td>1</td><td>12</td></tr><tr><td><span>Attendance</span></td><td>100%</td><td>100%</td><td>92%</td></tr><tr><td><span>Terminated Packages</span></td><td>0</td><td>0</td><td>1</td></tr></tbody></table>
      							</li>
      						
      							

      							
								<li class="profile_image pro_detail_part rew_student">
      						<a href="javascript:void(0);">	<img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="Profile"></a>   		
      									     									
      								
      						</li>
      						<li class="rew_student_info">
      							<a  href="javascript:void(0);">Edmundo</a>
      									<p>Spanish</p>
      									<p>Mar 12, 2019</p> 
      						</li>
								<li class="rew_student_cont" >
									<p>It was great chatting with James, very interesting.<br> See you next time :)</p>
								</li>

      						</ul>
      					</div>


      					<div class="person_detail profile_right_part community_updates">
      						<ul>
      							<li class="profile_name pro_rgt_prt_head">
      								<h3>Community Updates</h3>
      								
      							</li>
      						</ul>
      						<ul class="community_updates_sec">
      							<li>
      								<h3>0</h3>
      								<p>Notebook Entries</p>
      							</li>
      							<li>
      								<h3>0</h3>
      								<p>Questions</p>
      							</li>
      							<li>
      								<h3>0</h3>
      								<p>Discussions</p>
      							</li>
      							<li>
      								<h3>0</h3>
      								<p>Friends</p>
      							</li>
      							<li>
      								<h3>10</h3>
      								<p>Points</p>
      							</li>
      						</ul>
      						<p class="text-center" style="margin: 20px 0 0 0; color: #7b7b7b; ">No record</p>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      </section>



      <!--------------------------- user section end here ---------------------------->