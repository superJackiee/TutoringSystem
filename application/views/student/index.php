<div class="user_section dashboard_sec">
    <div class="container">
        <!--payment success    modal-->
        <?php if($this->session->flashdata('success')){ ?>
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <?php echo $this->session->flashdata('success');?>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php if($this->session->flashdata('success')){ ?>

            <div class="alert alert-success text-center" style='width:100%;'>

                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                <p><?php echo $this->session->flashdata('success'); ?></p>

            </div>

        <?php } ?>
        <!--end modal-->
				<div class="row">
					<div class="col-md-4">
						<div class="apli_main_part">
                            <div class="user-profile-top">
                                <div><div class="user_id">ID:<?php echo user()->id ?></div></div>
                                <a href="#"><span class="dash-avatar" style="width: 80px; height: 80px; line-height: 80px; font-size: 18px;">
                                <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="<?php echo html_escape(user()->username); ?>">
                                </span></a>
                            </div>
                            <div class="flex-start">
                                <a class="user_name" href="<?php echo base_url('user?id='.user()->id); ?>"><?php echo user()->username ?></a>
                                <a class="edit-profile" target="_blank" href="<?php echo base_url('student/edit_profile?id='.user()->id);?>"><i class="fa fa-edit"></i></a>
                            </div>
                            <div class="bluebar"></div>
                            <div class="user-from"><span>From</span>&nbsp;Melbourne, <span>Australia</span></div>
                            <div class="user-living"><div><span>Living in</span>&nbsp;Madrid, <span>Spain</span></div></div>
                            <!-- <div class="switch-teacher"><button type="button" class="ant-btn ant-btn-lg"><span>Switch to Teacher Mode</span></button></div> -->
                        </div>

                        <!-- Card -->
                            <div class="ChallengeProgress_learnMoreWrap__1aP75">
                            <!-- Card image -->
                            <!--<div class="ChallengeProgress_bannerImg__2ucLP"> <img class="card-img-top" src="<?php // echo base_url() ?>assets/img/43.jpg" alt="Card image cap"></div>-->
                            <div class="ChallengeProgress_bannerTitle__2G6zr"><span>Reach Fluency Faster and Win</span></div>
                            <p class="ChallengeProgress_bannerDesc__2H_x1"><span>Win rewards for improving your skills and accelerate your learning like never before. Sign up free today!</span></p>
                            <!-- Button -->
                            <div class="switch-teacher"><button type="button" class="ant-btn ant-btn-lg" style="width: 100%;color: rgb(0, 191, 189);background-color: transparent;border-color: rgb(0, 191, 189);"><span>Learn More</span></button></div>
                            </div>
                        <!-- Card -->

                            <div class="dashboard-wallet-balance">
                                <div class="wallet-content">
                                    <a class="add-credit" href="<?php echo base_url('teacher/Wallet')?>">
                                    <div class="left-title">
                                        <span>MyLanguagePro  Balance</span>
                                    </div>
                                    <div class="left-content">
                                        <span> $ </span>
                                        <span>0.00 USD </span>
                                    <div>
                                    </a>
                                </div>
                            </div>
                            
                            </div></div>
                            <div class="dashboard-wallet-balance">
                                        <div class="wallet-content">
                                        <a class="add-credit" href="<?php echo base_url('student/referral')?>">
                                            <div class="left-title">
                                                <span><a href="<?php echo base_url('student/referral')?>">Refer a Friend</a></span>
                                            </div>
                                            <div class="left-content">
                                                <span> $ </span>
                                                <span>0.00 USD </span>                                          
                                            <div>
                                            </a>
                                        </div>
                            </div></div></div>
                            <!-- <div class="dashboard-wallet-balance">
                                        <div class="wallet-content">
                                            <div class="left-title">
                                                <span>Test your English level!</span>
                                            </div>
                                            <div class="left-content">
                                                <span>Take the Oxford Online Placement Test</span>
                                                <a class="add-credit" href="/payment"></a>
                                            <div>
                                        </div>
                            
                            </div></div></div> -->
                            <div class="dashboard-wallet-balance">
                                        <div class="wallet-content">
                                            <div class="left-title">
                                                <span><a href="<?php echo base_url('download-app')?>">Download the Mylanguage App</a></span>
                                            </div>
                                            <div class="left-content">
                                                <span>Learn languages, anytime, anywhere.</span>
                                                <a class="add-credit" href="/payment"></a>
                                            <div>
                                            <!-- <div class="right-content"><img src="/static/media/downloadApp.f4457bad.png" alt="app download" width="68"></div> -->


                                        </div>
                            </div>
                            </div></div>
                            <div class="dashboard-wallet-balance">
                                        <div class="wallet-content">
                                            <div class="left-title">
                                                <span>Support</span>
                                            </div>
                                            <div class="left-content">
                                            <ul class="FAQ-content">
                                            <li><a href="<?php echo base_url('what-are-my-language-pro-credits');?>" class="italki-a" rel="noopener noreferrer" target="_blank">What are Mylanguage Credits?</a></li>
                                            <li><a href="<?php echo base_url('purchasing-credits');?>" class="italki-a" rel="noopener noreferrer" target="_blank">Purchasing Credits</a></li>
                                            <li><a href="<?php echo base_url('what-are-trial-lessons');?>" class="italki-a" rel="noopener noreferrer" target="_blank">What are Trial Lessons?</a></li>
                                            <li><a href="<?php echo base_url('what-are-lesson-packages');?>" class="italki-a" rel="noopener noreferrer" target="_blank">What are lesson packages?</a></li>
                                            <li><a href="<?php echo base_url('scheduling-and-taking-lessons');?>" class="italki-a" rel="noopener noreferrer" target="_blank">Scheduling and taking lessons</a></li>
                                            <li><a href="<?php echo base_url('notebook-discussions-and-answers');?>" rel="noopener noreferrer" target="_blank">Notebook, Discussions and Answers</a></li>
                                            <li><a href="<?php echo base_url('how-do-i-become-an-mylanguage-teacher');?>" rel="noopener noreferrer" target="_blank">How do I become an Mylanguage teacher?</a></li></ul>
                                            <div>
                                        </div>
                            </div>
                </div></div></div>

					<div class="col-md-8">
                    <div class="dashboard-wallet-balance">
                            <div class="learning_languageLevel__3X1MZ">
                                <div class="learning_title__3SJSQ"><span>Learning Language</span></div>
                                <div class="learning_language__7a3Be">
                                    <div>
                                        <span class="language"><span>Spanish</span></span>
                                        <span class="tooltip-container-box" gap="5">
                                            <span class="tooltip-container" placement="bottom">
                                                <span class="tooltip-reference">
                                                    <div>
                                                    <span class="level level-color-2"></span>
                                                    <span class="level level-color-2"></span>
                                                    <span class="level level-color-1"></span>
                                                    <span class="level level-color-1"></span>
                                                    <span class="level level-color-1"></span>
                                                    </div>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="learning_completed__32rkp">
                                <p class="learning_number__ZEVnn">0</p><span>Completed lessons</span>
                            </div> 
                        </div>
						<div class="my-teachers">
                            <div class="my-teachers-header">
                                <a href="/contacts/teacher/current">
                                <span class="my-teachers-title"><span>My Teachers</span></span></a>
                                <a class="right-icon" href="/contacts/teacher/current"></a>
                            </div>
                            <div class="my-teachers-content">
                            <?php if($teacher_sub){
                                foreach($user_detail as $detail){?>
                                <div class="my-teacher-item">
                                    <div class="item-left">
                                        <div class="item-left-avatar">
                                            <span class="ant-avatar ant-avatar-circle ant-avatar-image" style="width: 48px; height: 48px; line-height: 48px; font-size: 18px;">
                                            <img src="<?php echo base_url($detail['avatar']);?>"></span>
                                        </div>
                                        <div>
                                            <div class="teacher-name"><?php echo $detail['username']; ?></div>
                                            <div class="teacher-type">
                                                <span>Tutor</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="teacher-item-right">
                                        <span class="tooltip-container-box" gap="5">
                                            <span class="tooltip-container" placement="bottom">
                                                <span class="tooltip-reference"><i class="fa fa-calendar"></i></span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <?php } }?>

                            </div>       </div> 
                            <div class="community">
                            <div class="community-header flex-between">
                                <div class="header-title">
                                    <span>Community Updates</span>
                                </div>
                                <div class="community-dropdown">
                                    <button type="button" class="ant-btn ant-dropdown-trigger ant-btn-lg ant-btn-block">
                                        <span class="select_lanugage">
                                            <span>All my languages</span>
                                        </span>
                                        <div class="icon-absolute">
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="community-content">
                                <div class="community-item">
                                    <p class="community-type">
                                        <span>Notebook</span>
                                    </p>
                                    <a class="community-title italki-title-hover" href="/notebook/7268093/entry/1058743">Steve Jobs' speech</a>
                                    <div class="flex-start">
                                        <span class="ant-avatar ant-avatar-circle" style="width: 40px; height: 40px; line-height: 40px; font-size: 18px;">
                                        </span>
                                    <div class="community-user-right">
                                        <p class="user-name">ailanabh</p>
                                        <p class="community-language">
                                            <span>English</span>
                                        </p>
                                    </div>
                                </div>
                                <a class="content text-overflow italki-title-hover" href="/notebook/7268093/entry/1058743">
                                <div>I want to give you some information about</div>
                        </a>
                        <div class="flex-end">
                            <span class="icon-bar flex-start">
                               <span class="number">0</span>
                            </span>
                        </div>
                    </div>
                      
                            </div>
                    </div>
                            </div>   </div>
                    