
      <!---------------------------- referral_banner_sec start --------------------------->
      <section class="referral_banner_sec">
            <div class="container">
                  <div class="referral_banner_part text-center">
                        <h2>Know a friend who would enjoy My language Pro?</h2>
                        <p>Refer a friend and when they purchase $20 My language Pro Credits or more you’ll both get $10 My language Pro Credits free!</p>
                  </div>
            </div>
            
      </section>


      <!---------------------------- referral_banner_sec end ----------------------------->

      <section class="referral_inbox_sec">

            <div class="container">
                  <div class="referral_inbox_part">
                        <h6>Invite your friends by email</h6>
                        <div class="referral_input_part">
                        <?php echo form_open('student/refer_frnd'); ?>
                              <ul>
                                <li class="referral_input">  <input type="email" name="referred_email" placeholder="Please input a space after you input an email address.">
                                </li>
                                <li>
                                    <input class="sub_btn login referral_send" type="submit" name="" value="SHARE NOW">
                              </li>
                          </ul>
                        <?php echo form_close(); ?>
                        </div>
                  </div>


                  <!-- <div class="referral_socil_sec">
                        <div class="row">
                              <div class="col-md-3">
                                    <div class="referral_socil_part">
                                          <button class="btn_gmail"> <img src="<?php echo base_url()?>asset/images/btn_gmail.svg" alt="btn_gmail"> Share with Gmail </button> 
                                          
                                    </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="referral_socil_part">
                                          <button class="btn_messenger"> <img src="<?php echo base_url()?>asset/images/btn_messenger.svg" alt="btn_messenger"> Share with Messenger </button> 
                                         
                                    </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="referral_socil_part">
                                          <button class="btn_fb"> <img src="<?php echo base_url()?>asset/images/btn_fb.svg" alt="btn_fb"> Share with Facebook </button>
                                          
                                    </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="referral_socil_part">
                                          <button class="btn_link"><img src="<?php echo base_url()?>asset/images/btn_link.svg" alt="btn_link">Copy link </button>
                                          
                                    </div>
                              </div>
                        </div>
                  </div> -->

                  <div class="referral_how_it_work text-center">
                        <h2>How does it work?</h2>
                        <div class="row">
                              <div class="col-md-3">
                                    <div class="ref_how_it_work_part">
                                          <div class="ref_how_img">
                                          <img src="<?php echo base_url()?>asset/images/icon_referral1.svg" alt="icon_referral1">
                                    </div>
                                          <h6>Invite a friend to My language Pro.</h6>
                                    </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="ref_how_it_work_part">
                                          <div class="ref_how_img">
                                          <img src="<?php echo base_url()?>asset/images/icon_referral2.svg" alt="icon_referral2">
                                    </div>
                                          <h6>Friend joins My language Pro.</h6>
                                    </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="ref_how_it_work_part">
                                          <div class="ref_how_img">
                                          <img src="<?php echo base_url()?>asset/images/icon_referral3.svg" alt="icon_referral3">
                                    </div>
                                          <h6>Your friend buys $20+ My language Pro Credits for online lessons.</h6>
                                    </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="ref_how_it_work_part">
                                          <div class="ref_how_img">
                                          <img src="<?php echo base_url()?>asset/images/icon_referral4.svg" alt="icon_referral4">
                                    </div>
                                          <h6>You'll both get $10 USD in My language Pro Credits!</h6>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>  

      </section>
      <!--------------------------- track section start ------------------>
      <section class="ref_track_sec">
            <div class="container">
                  <div class="ref_track_part text-center">
                        <h2>Track your invites</h2>
                        <p>Track your invites here! See which friends have registered from your invitation and watch your Credits add up!</p>
                  </div>
                  <div class="ref_track_part">
                        <ul>
                              <li><h6>Invitations accepted</h6></li>
                               <li><h6>Email</h6></li> 
                              <li><h6>Status</h6></li>
                              <li><h6>Last updated</h6></li>
                        </ul>
                        <?php if($value){
                             foreach($value as $val){ ?>
                        <ul>
                              <li><h6><?php if($val['status'] == '0'){
                                    echo "Not Accepted yet";
                                    }else{ 
                                          echo "Accepted";
                                          }?></h6></li>
                               <li><h6><?php echo $val['referred_email'];?></h6></li> 
                              <li><h6><h6><?php if($val['status'] == '0'){
                                    echo "Pending";
                                    }else{ 
                                          echo "Success";
                                          }?></h6></li>
                              <li><h6><?php echo date("m-d-Y", strtotime($val['created_on']))?></h6></li>
                        </ul>
                        <?php }} ?>
                  </div>
            </div>
      </section>


      <!--------------------------- track section end ------------------>

      <!--------------------------Terms and Conditions start ----------------->
      <section class="terms_condit_sec">
            <div class="container">
                  <h2>Terms and Conditions</h2>
                  <div class="row">
                        <div class="col-md-3">
                              <div class="terms_condit_part">
                                    <h5>General Terms</h5>
                                    <p>When one of your referrals successfully makes a first purchase of $20 italki Credits or more you will both receive $10 in italki Credits in your Student Wallets within 7 business days.</p>
                              </div>
                        </div>
                        <div class="col-md-3">
                              <div class="terms_condit_part">
                                    <h5>Qualifying Purchase</h5>
                                    <p>A qualifying purchase is any successful first purchase of italki Credits (minimum $20 italki Credits). A purchase that is found to be fraudulent does not qualify.</p>
                              </div>
                        </div>
                        <div class="col-md-3">
                              <div class="terms_condit_part">
                                    <h5>Other Restrictions</h5>
                                    <p>A purchase does not qualify if you refer yourself or existing users of italki. Users that attempt to abuse the referral promotion (including those who use Google AdWords or other advertising platforms to obtain referrals) will not receive the referral bonus and may have their italki accounts suspended</p>
                              </div>
                        </div>
                        <div class="col-md-3">
                              <div class="terms_condit_part">
                                    <h5>Limited Time Only</h5>
                                    <p>These incentive programs are effective for a limited time. The requirements and incentives are subject to change.</p>
                              </div>
                        </div>
                  </div>
            </div>
            
      </section>



      <!-----------------------------------Terms and Conditions end ------------------------>
