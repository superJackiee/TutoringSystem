
      <!--------------------------- user section start here ---------------------------->
      <section class="user_section">
                  <div class="container">
                  <div class="row">
                  <div class="col-md-4">
                     <div class="person_detail basic_info account_sec">
                        <ul id="tabs-nav">
                           <li> <a href="#general_link" class="account_link" >General</a> </li>
                           <li> <a href="#privacy_link" class="account_link"> Privacy </a> </li>
                          <!--   <li>
                              <a href="#notification_link"><i class="fas fa-circle size_circle"></i> Notification </a>
                           </li> -->
                           <li><a href="#payment_link" class="account_link"> Payment </a></li>
                        </ul>
                     </div>
                  </div>

  <!------------------------------- Account info start -------------------> 

      			<div class="col-md-8" id="tabs-content">
      				<div class="profile_right_sec tab-content" id="general_link">
      					<div class="person_detail profile_right_part  basic_information">
      							<div class="profile_name pro_rgt_prt_head basic_info_header text-left">
      								<h3>Account</h3>
      							</div>
      							<hr>
                        <div class="account_part first_sec">
                           <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Email</label>
                              </div>
                              <input type="email" name="" placeholder="Email" value="<?php echo $user_detail[0]['email']?>" readonly>
                              <div class="form-group mg_bot_lf_zero">
                                 <p class="color_green"><i class="fas fa-circle size_circle color_green"></i>Validated</p>
                              </div>
                           </div>

                           <!-- <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Phone</label>
                              </div>
                              <select class="custom-select animations-select arrow_des phone_code_cnt" id="inputGroupSelect01" data-target="#animation-bottom">
                                 <option selected="">+91</option>
                                 <option value="1">+376</option>
                                 <option value="2">+971</option>
                              </select>
                              <input type="text" name="phone" value="<?php echo $user_detail[0]['phone']?>">
                           </div> -->

                            <!-- <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Facebook</label>
                              </div>
                              <input type="button" name="" value="Connect" class="fb_btn_ac">
                              <img src="images/facebook_blue_icon.svg" class="facebook_blue_icon">
                           </div>

                            <div class="std_basic_input mg_bot_zero">
                              <div class="label_part label_part_w_c">
                                 <label>WeChat</label>
                              </div>
                              <input type="button" name="" value="Connect" class="fb_btn_ac wechat">
                              <img src="images/wechat_green_icon.svg" class="facebook_blue_icon">
                           </div> -->


                        </div>
                        <div class="account_part secd_sec">

                            <div class="std_basic_input mg_bot_zero">
                              <div class="label_part label_part_w_c">
                                 <label>Password</label>
                              </div>
                              <button type="button" data-toggle="modal" data-target="#password" class="fb_btn_ac up_btn">Update Password</button>
                           </div>

                        </div>
                        <div class="account_part third_sec">


                            <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Premium Membership</label>
                              </div>
                              <p>Expires: Jan 20, 2021</p>
                           </div>

                            <!-- <div class="std_basic_input mg_bot_zero">
                              <div class="label_part label_part_w_c">
                                 <label>Personal URL</label>
                              </div>
                              <p><a href="javascript:void(0);">Create a Personal URL</a></p>
                           </div> -->

                        </div>
                         <div class="account_part four_sec">

                           <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Display Language</label>
                              </div>
                              <select class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                                 <option selected="">English</option>
                                 <option value="1">Chinese (Mandarin)</option>
                                 <option value="2">French</option>
                                 <option value="3">Portuguese</option>
                                 <option value="3">Japanese</option>
                                 <option value="3">Korean</option>
                                 <option value="3">Punjabi</option>
                              </select>
                           </div>

                           <!-- <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Email Language</label>
                              </div>
                              <select class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                                 <option selected="">English</option>
                                 <option value="1">Chinese (Mandarin)</option>
                                 <option value="2">French</option>
                                 <option value="3">Portuguese</option>
                                 <option value="3">Japanese</option>
                                 <option value="3">Korean</option>
                                 <option value="3">Punjabi</option>
                              </select>
                           </div> -->

                           <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Time Zone</label>
                              </div>
                              <select class="custom-select animations-select arrow_des time_zone" id="inputGroupSelect05" data-target="#animation-bottom">
                                            <option value="-12">[UTC - 12] Baker Island Time</option>
                                            <option value="-11">[UTC - 11] Niue Time, Samoa Standard Time</option>
                                            <option value="-10">[UTC - 10] Hawaii-Aleutian Standard Time, Cook Island Time</option>
                                            <option value="-9.5">[UTC - 9:30] Marquesas Islands Time</option>
                                            <option value="-9">[UTC - 9] Alaska Standard Time, Gambier Island Time</option>
                                            <option value="-8">[UTC - 8] Pacific Standard Time</option>
                                            <option value="-7">[UTC - 7] Mountain Standard Time</option>
                                            <option value="-6">[UTC - 6] Central Standard Time</option>
                                            <option value="-5">[UTC - 5] Eastern Standard Time</option>
                                            <option value="-4.5">[UTC - 4:30] Venezuelan Standard Time</option>
                                            <option value="-4">[UTC - 4] Atlantic Standard Time</option>
                                            <option value="-3.5">[UTC - 3:30] Newfoundland Standard Time</option>
                                            <option value="-3">[UTC - 3] Amazon Standard Time, Central Greenland Time</option>
                                            <option value="-2">[UTC - 2] Fernando de Noronha Time, South Georgia &amp; the South Sandwich Islands Time</option>
                                            <option value="-1">[UTC - 1] Azores Standard Time, Cape Verde Time, Eastern Greenland Time</option>
                                            <option value="0">[UTC] Western European Time, Greenwich Mean Time</option>
                                            <option value="+1">[UTC + 1] Central European Time, West African Time</option>
                                            <option value="+2">[UTC + 2] Eastern European Time, Central African Time</option>
                                            <option value="+3">[UTC + 3] Moscow Standard Time, Eastern African Time</option>
                                            <option value="+3.5">[UTC + 3:30] Iran Standard Time</option>
                                            <option value="+4">[UTC + 4] Gulf Standard Time, Samara Standard Time</option>
                                            <option value="+4.5">[UTC + 4:30] Afghanistan Time</option>
                                            <option value="+5">[UTC + 5] Pakistan Standard Time, Yekaterinburg Standard Time</option>
                                            <option value="+5.5">[UTC + 5:30] Indian Standard Time, Sri Lanka Time</option>
                                            <option value="+5.75">[UTC + 5:45] Nepal Time</option>
                                            <option value="+6">[UTC + 6] Bangladesh Time, Bhutan Time, Novosibirsk Standard Time</option>
                                            <option value="+6.5">[UTC + 6:30] Cocos Islands Time, Myanmar Time</option>
                                            <option value="+7">[UTC + 7] Indochina Time, Krasnoyarsk Standard Time</option>
                                            <option value="+8">[UTC + 8] Chinese Standard Time, Australian Western Standard Time, Irkutsk Standard Time</option>
                                            <option value="+8.75">[UTC + 8:45] Southeastern Western Australia Standard Time</option>
                                            <option value="+9">[UTC + 9] Japan Standard Time, Korea Standard Time, Chita Standard Time</option>
                                            <option value="+9.5">[UTC + 9:30] Australian Central Standard Time</option>
                                            <option value="+10">[UTC + 10] Australian Eastern Standard Time, Vladivostok Standard Time</option>
                                            <option value="+10.5">[UTC + 10:30] Lord Howe Standard Time</option>
                                            <option value="+11">[UTC + 11] Solomon Island Time, Magadan Standard Time</option>
                                            <option value="+11.5">[UTC + 11:30] Norfolk Island Time</option>
                                            <option value="+12">[UTC + 12] New Zealand Time, Fiji Time, Kamchatka Standard Time</option>
                                            <option value="+12.75">[UTC + 12:45] Chatham Islands Time</option>
                                            <option value="+13">[UTC + 13] Tonga Time, Phoenix Islands Time</option>
                                            <option value="+14">[UTC + 14] Line Island Time</option>
                              </select>
                           </div>

                           <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Currency</label>
                              </div>
                              <select class="custom-select animations-select arrow_des time_zone" id="inputGroupSelect05" data-target="#animation-bottom">
                                  <option selected>USD $</option>
                                  <option value="1">TWD $</option>
                                  <option value="2">INR ₹</option>
                                  <option value="3">JPY ¥</option>
                              </select>
                           </div>
<!-- 
                           <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Time Format</label>
                              </div>
                                 <div class="custom-control custom-radio mg_r">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">12H</label>
                                 </div>

                                 <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">24H</label>
                                 </div>
                           </div> -->

                           <div class="std_basic_input mg_bot_zero">
                              <div class="label_part label_part_w_c">
                              </div>
                              <input type="submit" name="" value="Save" class="change_photo save_ac_btn">
                           </div>
                        </div>
      					</div>
      				</div>
                        <!------------------------------- Account info end ------------------->


                  <!------------------------------- privacy info ------------------->


               
                  <div class="profile_right_sec tab-content" id="privacy_link">
                     <div class="person_detail profile_right_part  basic_information">
                           <div class="profile_name pro_rgt_prt_head basic_info_header text-left">
                              <h3>Privacy</h3>
                           </div>
                           <hr>
                        <div class="account_part first_sec">

                           <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                  <label>My Data</label>
                              </div>
                              <p>Download my public information from My language Pro.</p>
                           </div>
                           <div class="std_basic_input mg_bot_zero">
                              <div class="label_part label_part_w_c">
                              </div>
                              <input type="button" name="" value="Update Password" class="fb_btn_ac up_btn">
                           </div>

                        </div>
                        <div class="account_part secd_sec">

                            <div class="std_basic_input">
                              <div class="label_part label_part_w_c">
                                 <label>Block List</label>
                              </div>
                              <ul class="display_flex">

                                 <li>
                                    <div class="student_profile_part privacy_pro_prt">
                                       <div class="profile_image privacy_pro">
                                         <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="Profile">
                                       </div>
                                       <div class="privacy_pro_text">
                                          <p>jaime biggs</p>
                                       </div>
                                    </div>
                                 </li>

                                  <li>
                                    <div class="student_profile_part privacy_pro_prt">
                                       <div class="profile_image privacy_pro">
                                         <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="Profile">
                                       </div>
                                       <div class="privacy_pro_text">
                                          <p>German Giraldo</p>
                                       </div>
                                    </div>
                                 </li>


                              </ul>
                           </div>
                           <div class="std_basic_input mg_bot_zero">
                              <div class="label_part label_part_w_c">
                              </div>
                              <input type="button" name="" value="Edit list 2" class="fb_btn_ac up_btn">
                           </div>

                        </div>
                        <div class="account_part third_sec">


                            <div class="std_basic_input mg_bot_zero">
                              <div class="label_part label_part_w_c">
                                 <label>Account Deactivation</label>
                              </div>
                              <p>Please contact <a href="mailto:support@MyLanguagePro.com">support@MyLanguagePro.com</a> to deactivate your profile</p>
                           </div>


                        </div>
<!-- 
                         <div class="account_part four_sec privacy_four">

                            <div class="std_basic_input aling_item">
                              <div class="label_part label_part_w_c">
                                 <label>Contact Permissions</label>
                              </div>
                              <div class="privacy_right_part">
                                 <p>These settings allow you to control who can contact, message, and chat with you.</p>
                                 
                                    <p><b>Who can send me a message or a chat</b></p>

                                    <select class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                                    <option selected="">English</option>
                                    <option value="1">Chinese (Mandarin)</option>
                                    <option value="2">French</option>
                                    <option value="3">Portuguese</option>
                                    <option value="3">Japanese</option>
                                    <option value="3">Korean</option>
                                    <option value="3">Punjabi</option>
                                 </select>
                              </div>
                           </div>
                        </div> -->




                         <div class="account_part four_sec privacy_four">

                            <div class="std_basic_input aling_item">
                              <div class="label_part label_part_w_c">
                                 <label>Friend Requests</label>
                              </div>
                              <div class="privacy_right_part">
                                 <p>This is useful if you are receiving too many Language Partner requests.</p>
                                 
                                   <div class="form-group">
                                             <label class="checkbox small">
                                                 <input type="checkbox">
                                                 <span class="success"></span>
                                             </label>
                                             <label class="check_label size">Allow people to send me friend requests</label>
                                        </div>

                                    <div class="form-group mg_bot_zero">
                                             <label class="checkbox small">
                                                 <input type="checkbox">
                                                 <span class="success"></span>
                                             </label>
                                             <label class="check_label size">Profile is visible on the language partner search page</label>
                                        </div>
                              </div>
                           </div>
                        </div>



                        <div class="account_part four_sec privacy_five">

                            <div class="std_basic_input aling_item">
                              <div class="label_part label_part_w_c">
                                 <label> Privacy Settings</label>
                              </div>
                              <div class="privacy_right_part">
                                 
                                 <div class="form-group">
                                             <label class="checkbox small">
                                                 <input type="checkbox">
                                                 <span class="success"></span>
                                             </label>
                                             <label class="check_label size">                                          Allow people to view my friends  </label>
                                        </div>
                                 
                                   <div class="form-group">
                                             <label class="checkbox small">
                                                 <input type="checkbox">
                                                 <span class="success"></span>
                                             </label>
                                             <label class="check_label size"> Allow people to view my lesson feedback  </label>
                                        </div>

                                    <div class="form-group mg_bot_zero">
                                             <label class="checkbox small">
                                                 <input type="checkbox">
                                                 <span class="success"></span>
                                             </label>
                                             <label class="check_label size">Allow people to view my age</label>
                                        </div>
                              </div>
                           </div>
                        </div>








                     </div>


                        </div>




              <!------------------------------- privacy info end ------------------------------>



   <!--------------------------------------- Saved Payment Methods start ------------------------------------>

               <div class="profile_right_sec tab-content" id="payment_link">
                     <div class="person_detail profile_right_part  basic_information">
                           <div class="profile_name pro_rgt_prt_head basic_info_header text-left">
                              <h3>Saved Payment Methods</h3>
                           </div>
                           <hr>
                        <div class="payment_part">
                        <ul>
                                 <li>
                                    Stripe
                                 </li>
                                 <li>
                                     <a href="https://dashboard.stripe.com/register">Create an account .</a>
                                      <!-- <a href="javascript:void(0;)">Connect</a> -->
                                 </li>
                              </ul>
                        </div>








                     



                   
                     </div>
                  </div>

       <!--------------------------------------- Saved Payment Methods start------------------------------------>

                   </div>   
                  </div>
      			</div>
      		</div>
      	</div>
      </section>

<div id="password" class="modal fade" role="dialog" style="z-index:2000">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <?php echo form_open("auth/reset_password_post"); ?>
<!-- include message block -->
<?php $this->load->view('partials/_messages'); ?>

<div class="form-group has-feedback">
    <input type="email" name="email" class="form-control form-input"
           placeholder="<?php echo trans("placeholder_email"); ?>" required>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>

<div class="row">
    <div class="col-sm-7">
    </div>
    <div class="col-sm-5">
        <button type="submit" class="btn btn-primary btn-custom pull-right">
            <?php echo trans("btn_reset_password"); ?>
        </button>
    </div>
</div>

<?php echo form_close(); ?><!-- form end -->
      </div>
      
    </div>

  </div>
</div>

