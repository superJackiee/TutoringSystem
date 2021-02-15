<!--------------------------- user section start here ---------------------------->
     <?php  foreach($user_detail as $user){ ?>
      <section class="user_section">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-4">
      				<div class="person_detail">
      					<div class="profile_part">
      						<div class="profile_image">
      						<a href="javascript:void(0);">	<img src="<?php echo base_url($user['avatar']); ?>" alt="Profile"></a>
      						</div>
      					</div>	
      					<ul>
      						<li class="profile_name">
      							<h3><?php echo $user['username']; ?></h3>
      							<img width="25" height="31" src="<?php echo base_url(); ?>asset/new/images/prifile.icon.svg" alt="premium">
      						</li>
      						<li class="offline">
      							<p>Offline</p>
      						</li>
      						<li class="redbar">
      						</li>
      						<li class="person_information">
      							<p>Male, From Melbourne, Australia</p>
      						</li>
      						<li class="person_information">
      							<p>Living in Madrid, Spain (05:18 UTC+02:00)</p>
      						</li>
      						<li class=" person_information order_id">
      							<p>User ID: 3423106</p>
      						</li>
      						<li class="person_button">
      							<input class="add_friend" type="button" name="" value="Add as Friend" disabled>
      							<input type="button" name="" value="Send message" disabled>

      							<input type="button" name="" value="Switch to Teacher Profile">

      						</li>
      					</ul>
      				</div>
      				<div class="person_detail pro_teacher_detail">
      					<div class=" profile_name pro_teacher_detail_header">
      						<h3>Teachers • 12</h3>
      						
      							<a class="float-right" href="javascript:void(0);"> See All</a>
      					</div>
      					<div class="redbar black">
      						</div>

      						<div class="pro_teacher_detail_part">
      					<ul>
      						<li class="profile_image pro_detail_part">
      							<a href="javascript:void(0);"> <img src="<?php echo base_url(); ?>asset/new/images/profile.jpg" alt="Profile"></a>
      						</li>
      						<li class="profile_image pro_detail_part">
      							<a href="javascript:void(0);"> <img src="<?php echo base_url(); ?>asset/new/images/profile.jpg" alt="Profile"></a>
      						</li>
      						<li class="profile_image pro_detail_part">
      							<a href="javascript:void(0);">	<img src="<?php echo base_url(); ?>asset/new/images/profile.jpg" alt="Profile"></a>
      						</li>
      						<li class="profile_image pro_detail_part">
      						<a href="javascript:void(0);">	<img src="<?php echo base_url(); ?>asset/new/images/profile.jpg" alt="Profile"></a>
      						</li>
      					</ul>
      				</div>
      				</div>
      				
      			</div>
      			<div class="col-md-8">
      				<div class="profile_right_sec">
      					<div class="person_detail profile_right_part">
      						<ul>
      							<li class="profile_name pro_rgt_prt_head">
      								<h3>Profile</h3>
      								<a style="float:right" href="<?php echo base_url('update-profile'); ?>"><input type="button" name="" value="Edit Profile" class="float-right"></a>
      							</li>
      							<hr>
      							<li class="person_information pro_rgt_prt_title">
      								<p>Ideally I want someone who has the patience to teach me the most simple grammar and to repeat speech often. </p>
      								<p>I am super friendly and very smart, however I'm having trouble getting enough practice and remembering what I learn.</p>
      							</li>
      							<div class="redbar ">
      							</div>
      							<li class="language_skill">
      								<h6>LANGUAGE SKILLS</h6>
      								<p>English
										<div class="display_inline">
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
										</div>


      								</p>
									<p>	German
										<div class="display_inline">
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-2 "></span>
											<span class="level level-color-1 "></span>
											<span class="level level-color-1 "></span>
										</div>

									</p>
									<p>Spanish
										<div class="display_inline">
											<span class="level level-color-2"></span>
											<span class="level level-color-2"></span>
											<span class="level level-color-1"></span>
											<span class="level level-color-1"></span>
											<span class="level level-color-1"></span>
										</div>

									</p>
      							</li>

      							<li class="language_skill learning">
      								<h6>LEARNING LANGUAGELLS</h6>
      								<p>Spanish

										<div class="display_inline">
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
											<span class="level level-color-2 level-color-3"></span>
										</div>
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
      						<a href="javascript:void(0);">	<img src="<?php echo base_url(); ?>asset/new/images/profile.jpg" alt="Profile"></a>   		
      									     									
      								
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

<?php  }?>

      <!--------------------------- user section end here ---------------------------->

      
      <!---------------------------- socil_icon section start ---------------------->
      <section class="socil_icon_sec text-center">
         <div class="container">
            <ul>
               <li><a class="fb" href="javascript:void(0);"><i class="fa fa-facebook-f"></i></a></li>
               <li><a class="twt" href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
               <li><a class="wifi" href="javascript:void(0);"><i class="fa fa-wifi"></i></a></li>
               <li><a class="gogpls" href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
               <li><a class="lindin" href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
            </ul>
         </div>
      </section>
      <!---------------------- socil_icon section end --------------------->
    
<style>

/*-------------------------------- user page start --------------------*/
.user_section {
    background-color: #f6f6f6;
    padding: 60px;
}

.person_detail {
    background: #fff;
    border-radius: 4px;
    box-shadow: 0px 0px 8px 0px #e2e2e2;
        padding: 30px;
}
.profile_image {
    width: 120px;
    height: 120px;
    overflow: hidden;
    border-radius: 100%;
    border: 2px solid #fff;
    box-shadow: 0px 0px 5px 1px #d0d0d0;
}

.profile_image img {
    max-width: 100%;
}
.profile_part {
    display: flex;
    justify-content: center;
}
.pro_teacher_detail_part ul {
    margin-top: 0;
    padding: 0px !important;
}
.person_detail ul li {
    list-style: none;
}
.profile_name h3 {
    font-size: 20px;
    font-weight: 300;
    display: inline-block;
    color: #777;
}
.offline:before {
    content: "";
    display: inline-block;
    width: 8px;
    height: 8px;
    margin-right: 2px;
    border-radius: 4px;
    background-color: #9b9b9b;
}
.offline p {
    font-size: 12px;
    display: inline-block;
    color: #777;
}
.redbar {
    width: 15px;
    border-bottom: 2px solid #0071b9;
    border-radius: 1px;
    margin-bottom: 14px;
}
.person_information p {
    font-size: 14px;
    color: #777;
}
.person_button input {
    width: 100%;
    padding: 8px 0;
    margin-bottom: 14px;
    font-size: 14px;
    border-radius: 4px;
    border:1px solid #777;
    background:none;
}
.add_friend {
    background:#0071b9 !important;
    color: #fff;
}
.pro_rgt_prt_head input,
.person_button input:focus {
    outline: none;
}
input[disabled] {
    opacity: .5;
}
.person_detail ul {
    margin-top: 20px;
    padding: 0px;
} 
.pro_teacher_detail_header h3  {
    font-size: 16px;
}
.redbar.black {
    border-color: black;
}
.pro_detail_part {
    width: 58px;
    height: 58px;
    display: inline-block;
    border:none;
    box-shadow: none;
} 
.pro_teacher_detail_part li+li {
    margin-left: 12px;
} 
.pro_teacher_detail_part {
    display: flex;
    justify-content: center;
}
.pro_teacher_detail_part ul {
    margin-top: 0;
}
.person_detail.pro_teacher_detail {
    margin-top: 26px;
}
.profile_right_part ul {
    margin-top: 0;
}
.pro_rgt_prt_head input {
    background: none;
    border-radius: 4px;
    border:1px solid #0071b9;
    padding: 4px 14px;
    font-size: 14px;
    color: #0071b9;
}
.pro_rgt_prt_title p {
    color: #4a4a4a;
}
.language_skill h6 {
    font-size: 11px;
    display: inline-block;
    color: #777;
    margin-right: 8px;
}
.rew_student_cont,
.language_skill p {
    font-size: 14px;
    color: #444;
    display: inline-block;
    margin-bottom: 0;
}
.level {
    display: inline-block;
    width: 2px;
    height: 10px;
    border-radius: 1px;
}
.level-color-3 {
    background-color: #ff4338;
}
.display_inline {
    display: inline-block;
    margin-left: 5px
}
.level-color-2 {
    background-color: rgb(0, 113, 185);
}
.level-color-1 {
    background-color: hsla(0,0%,80%,.5);
}
.pro_rgt_prt_title {
    margin: 22px 0;
}
.language_skill {
    margin: 12px 0;
}


.lesson_feedback_tabel table {
    width: 100%;
}
.lesson_feedback_tabel tr {
    height: 55px;
    border-top: 1px solid #cacaca;
    border-bottom: 1px solid #cacaca;
}
.lesson_feedback_tabel th:first-child {
    width: 186px;
}
.lesson_feedback_tabel th {
    font-size: 11px;
    font-weight: 300;
    text-align: center;
    color: #777;
    text-transform: uppercase;
}
.lesson_feedback_tabel td:first-child {
    text-align: left;
    font-size: 14px;
    font-weight: 400;
    color: #323232;
}
.lesson_feedback_tabel td {
    text-align: center;
    font-size: 14px;
}
.lesson_feedback {
    margin: 26px 0;
}
.rew_student_info {
    display: inline-block;
}

.rew_student_info a {
    color: #000;
    font-size: 15px;
}

.rew_student_info p {
    margin: 0;
    font-size: 12px;
    color: #ababab;
}

.rew_student_info {
    margin-left: 10px;
}
.rew_student_cont {
    display: block;
    margin-top: 20px;
}
.profile-desktop .profileCard-count .count-number {
    font-size: 40px;
    font-weight: 300;
    text-align: center;
    color: #333;
    padding-bottom: 12px;
}
.community_updates_sec ul li h3 {
    font-size: 40px;
    font-weight: 300;
    text-align: center;
    color: #333;
    padding-bottom: 12px;
}
.community_updates_sec {
    border-top: 1px solid #bdbdbd;
    border-bottom: 1px solid #bdbdbd;
}
.community_updates_sec li {
    display: inline-block;
}
.community_updates_sec {
    display: flex;
    justify-content: space-between;
    text-align: center;
    padding: 16px 0px;
    margin: 12px 0 !important;
}
.community_updates_sec li h3 {
    font-size: 24px;
    font-weight: 300;
    color: #7b7b7b;
}
.community_updates_sec li p {
    font-size: 14px;
    margin-bottom: 0;
    color: #7b7b7b;
}
/* ----------------------------------------- socil_icon_sec start -------------------------------- */

.socil_icon_sec ul li {
    display: inline-block;
    height: 50px;
    width: 50px;
    border: 1px solid #0071b9;
    border-radius: 100%;
    position: relative;
}

.socil_icon_sec ul li a {
    font-size: 18px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.twt {
    color: #40b5ff;
}

.fb {
    color: #0071b9;
}

.wifi {
    color: #108fda;
}

.gogpls {
    color: #d80000;
}

.lindin {
    color: #0060bb;
}

.socil_icon_sec ul li+li {
    margin-left: 10px;
}

.socil_icon_sec {
    padding: 36px 0;
}

</style>