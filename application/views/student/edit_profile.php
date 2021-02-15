   <!-- main_sec start here -->
   <section class="student_profile">
         <div class="container">
            <!-- <div class="noticed text-center">
               <p>We noticed that you are a teacher on italki. Please go to <a href="javascript:void(0);"> teacher setting </a>to edit your teacher settings.</p>
            </div> -->
<?php if($sdetail){
   foreach($sdetail as $sdetails){ 
   ?>      
      <form action="<?php echo base_url('Student/edit_user_detail') ?>" method="POST" enctype="multipart/form-data">
            <div class="student_profile_part">
               <div class="profile_image std_pro_img">
                  <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="Profile" id="imgprev">
               </div>
               <div class="std_pro_text">
                  <h4>Edit Profile Photo</h4>
                  <p>Your profile photo must be less than 2MB</p>
                  <p id="disp_tmp_path"></p>
                  <div class="file btn Upload_btn">
                     Upload
                     <input type="file" id="editimg" name="avatar" accept=".png, .jpg, .jpeg, .gif">
                     
                  </div>
               </div>
            </div>
            <div class="student_profile_detail_part">
               <div class="std_basic_info">
                  <h4>Basic Information</h4><?= $not_found ?>
                  <?php 
                  if($not_found){
                  ?>
                    <h4 style='color:red;'>Profile not complete! pleas update your profile.</h4>
                  <?php
                  }
                  ?>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Display Name</label>
                     </div>
                     <input type="hidden" value="<?php echo $user_detail[0]['avatar']?>" name="avatar">
                     <input type="text" name="username" value="<?php echo $user_detail[0]['username']?>" readonly>
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Date of Birth</label>
                     </div>
                     <select name="birth_year" class="custom-select animations-select arrow_des year" id="inputGroupSelect01" data-target="#animation-bottom" >
                       <option selected=""><?php echo $sdetails['birth_year']?></option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994 </option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        
                     </select>
                     <select name="birth_month" class="custom-select animations-select arrow_des month" id="inputGroupSelect01" data-target="#animation-bottom">
                     <option selected=""><?php echo $sdetails['birth_month']?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4 </option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                     </select>
                     <select name="birth_day" class="custom-select animations-select arrow_des day" id="inputGroupSelect01" data-target="#animation-bottom">
                        <option selected=""><?php echo $sdetails['birth_day']?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4 </option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                     </select>
                  </div>
                  <!-- <div class="std_basic_input">
                     <div class="label_part">
                     </div>
                     <div class="cont_check_box video_check_box std_pro_check">
                        <label class="checkbox small">
                        <input type="checkbox">
                        <span class="success"></span>
                        </label>
                        <label class="check_label size">Allow people to view my age</label>
                     </div>
                  </div> -->
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Gender</label>
                     </div>
                     <select  name="gender"  class="custom-select animations-select arrow_des gender" id="inputGroupSelect01" data-target="#animation-bottom">
                        <option selected=""><?php echo $user_detail[0]['gender']?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                     </select>
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>From</label>
                     </div>
                     <select name="from_country" class="custom-select animations-select arrow_des Live" id="inputGroupSelect01" data-target="#animation-bottom">
                     <?php 
                        foreach($country as $countrys) {
                           if ($countrys == $sdetails['from_country']){
                              echo "<option value=".$countrys." selected>".$countrys."</option>";
                           }
                           else {
                              echo "<option value=".$countrys.">".$countrys."</option>";
                           }
                        }
                     ?>
                     </select>
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Living in</label>
                     </div>
                     <select name="live_country" class="custom-select animations-select arrow_des Live" id="inputGroupSelect01" data-target="#animation-bottom">
                     <?php 
                        foreach($country as $countrys) {
                           if ($countrys == $sdetails['live_country']){
                              echo "<option value=".$countrys." selected>".$countrys."</option>";
                           }
                           else {
                              echo "<option value=".$countrys.">".$countrys."</option>";
                           }
                        }
                     ?>
                     </select>
                     <input  name="live_state" type="text" name="from_add" value="<?php echo $sdetails['live_state']?>">
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Time Zone</label>
                     </div>
                     <select name="time_zone" class="custom-select animations-select arrow_des time_zone" id="inputGroupSelect05" data-target="#animation-bottom">
                        <option selected=""><?php echo $sdetails['time_zone']?></option>
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
               </div>
               <div class="std_basic_info">
                  <h4>Languages</h4>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Native Language</label>
                     </div>
                     <select name="native_lang" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                     <?php
                        foreach ($language_list as $value) {
                           if ($sdetails['native_lang'] == $value) {
                              echo "<option value='".$value."' selected>".$value."</option>";
                           }
                           else {
                              echo "<option value='".$value."'>".$value."</option>";
                           }
                        }
                     ?>
                     </select>
                  </div>
                  <?php foreach($languages as $language){ ?>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Languages you speak or learn</label>
                     </div>
                     
                     <select name="speak_lang[]" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                     <?php
                        foreach ($language_list as $value) {
                           if ($language == $value) {
                              echo "<option value='".$value."' selected>".$value."</option>";
                           }
                           else {
                              echo "<option value='".$value."'>".$value."</option>";
                           }
                        }
                     ?>
                     </select>
                     
                     <select name="speak_lang_level" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option value="A1" <?php if ($sdetails['speak_lang_level'] == "A1") echo "selected";?>>A1: Beginner</option>
                        <option value="A2" <?php if ($sdetails['speak_lang_level'] == "A2") echo "selected";?>>A2: Elementary</option>
                        <option value="B1" <?php if ($sdetails['speak_lang_level'] == "B1") echo "selected";?>>B1: Intermediate</option>
                        <option value="B2" <?php if ($sdetails['speak_lang_level'] == "B2") echo "selected";?>>B2: Upper Intermediate</option>
                        <option value="C1" <?php if ($sdetails['speak_lang_level'] == "C1") echo "selected";?>>C1: Advanced</option>
                        <option value="C2" <?php if ($sdetails['speak_lang_level'] == "C2") echo "selected";?>>C2: Proficient</option>
                     </select>
                     <div class="cont_check_box mg_top std_lea_mg">
                        <label class="checkbox small">
                           <?php if($sdetails['learning'] == '1'){?>
                           <input name="learning" value="1" type="checkbox" checked>
                           <span class="success"></span>
                              <?php } else{ ?>
                           <input name="learning" value="1" type="checkbox">
                           <span class="success"></span>
                              <?php }?>
                        </label>
                        <label class="check_label size">Learning</label>
                     </div>
                     <div class="custom-control custom-radio mg_top_rad std_pro_m_left">
                     <?php if($sdetails['primary'] == '1'){?>                                    
                        <input  name="primary" value="1" type="checkbox" id="customRadio1"  class="custom-control-input" checked>
                              <?php } else{ ?>
                        <input  name="primary" value="1" type="checkbox" id="customRadio1"  class="custom-control-input">
                              <?php }?>
                        <label class="custom-control-label" for="customRadio1">Primary</label>
                     </div>
                  </div>
                  <?php }?>
                  <div id="langcontainer"></div>
                 <p class="text-success" id="addlanguage">+ Add More</p>
               </div>
               <div class="std_basic_info">
                  <h4> Communication Tool</h4>
                  <div class="std_basic_input">
                     <select name="comm_tool" class="custom-select animations-select arrow_des Live" id="inputGroupSelect01" data-target="#animation-bottom">
                        <option selected=""><?php echo $sdetails['comm_tool']?></option>
                        <option value="Skype">Skype</option>
                        <option value="Google Hangout">Google Hangout</option>
                        <option value="Wechat">Wechat</option>
                        <option value="QQ">QQ</option>
                        <option value="FaceTime">FaceTime</option>
                     </select>
                     <input name="comm_id" value="<?php echo $sdetails['comm_id']?>" type="text" placeholder="Communication id">
                  </div>
                  <!-- <a href="javascript:void(0);" class="add_comm std_comm">+ Add more</a> -->
               </div>
               <div class="std_basic_info">
                  <h4> Optional</h4>
                  <div class="std_basic_input introduction">
                     <div class="label_part">
                        <label>Introduction</label>
                     </div>
                     <textarea name="intro" rows="4" cols="70"><?php echo $sdetails['intro']?></textarea>
                  </div>

               </div>
            </div>
            <div class="text-right">
            <input type="hidden" name="user_id" value="<?php echo $user_detail[0]['id']?>">
            <input type="submit" name="" value="Save" class="change_photo std_save">
         </div>
</form>

                              <?php }}else{?>
                                 <form action="<?php echo base_url('Student/add_user_detail') ?>" method="POST" enctype="multipart/form-data">
            <div class="student_profile_part">
               <div class="profile_image std_pro_img">
                  <a href="javascript:void(0);">   <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="Profile"></a>
               </div>
               <div class="std_pro_text">
                  <h4>Edit Profile Photo</h4>
                  <p>Your profile photo must be less than 2MB</p>
                  <div class="file btn Upload_btn disabled">
                     Upload
                     <input type="file" name="avatar">
                  </div>
               </div>
            </div>
            <div class="student_profile_detail_part">
               <div class="std_basic_info">
                  <h4>Basic Information</h4>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Display Name</label>
                     </div>
                     <input type="text" name="username" value="<?php echo $user_detail[0]['username']?>" readonly>
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Date of Birth</label>
                     </div>
                     <select name="birth_year" class="custom-select animations-select arrow_des year" id="inputGroupSelect01" data-target="#animation-bottom" >
                        <option selected="">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994 </option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        
                     </select>
                     <select name="birth_month" class="custom-select animations-select arrow_des month" id="inputGroupSelect01" data-target="#animation-bottom">
                        <option selected="">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4 </option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                     </select>
                     <select name="birth_day" class="custom-select animations-select arrow_des day" id="inputGroupSelect01" data-target="#animation-bottom">
                        <option selected="">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4 </option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                     </select>
                  </div>
                  <!-- <div class="std_basic_input">
                     <div class="label_part">
                     </div>
                     <div class="cont_check_box video_check_box std_pro_check">
                        <label class="checkbox small">
                        <input type="checkbox">
                        <span class="success"></span>
                        </label>
                        <label class="check_label size">Allow people to view my age</label>
                     </div>
                  </div> -->
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Gender</label>
                     </div>
                     <select  name="gender"  class="custom-select animations-select arrow_des gender" id="inputGroupSelect01" data-target="#animation-bottom">
                        <option selected=""><?php echo $user_detail[0]['gender']?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                     </select>
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>From</label>
                     </div>
                     <select name="from_country" class="custom-select animations-select arrow_des Live" id="inputGroupSelect01" data-target="#animation-bottom">
                     <?php foreach($country as $countrys) {
                        echo "<option value=".$countrys.">".$countrys."</option>";
                                }?>
                     </select>
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Living in</label>
                     </div>
                     <select name="live_country" class="custom-select animations-select arrow_des Live" id="inputGroupSelect01" data-target="#animation-bottom">
                     <?php foreach($country as $countrys) {
                        echo "<option value=".$countrys.">".$countrys."</option>";
                                }?>
                     </select>
                     <input  name="live_state" type="text" name="from_add" placeholder="From">
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Time Zone</label>
                     </div>
                     <select name="time_zone" class="custom-select animations-select arrow_des time_zone" id="inputGroupSelect05" data-target="#animation-bottom">
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
               </div>
               <div class="std_basic_info">
                  <h4>Languages</h4>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Native Language</label>
                     </div>
                     <input name="native_lang" type="text" placeholder="Native Language">
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label>Languages you speak or learn</label>
                     </div>
                     <select name="speak_lang[]" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                     <option value="French">French</option>
                           <option value="Spanish">Spanish</option>
                           <option value="Portuguese">Portuguese</option>
                           <option value="Japanese">Japanese</option>
                           <option value="Korean">Korean</option>
                           <option value="Arabic">Arabic</option>
                           <option value="Hindi">Hindi</option>
                           <option value="Italian">Italian</option>
                           <option value="Russian">Russian</option>
                           <option value="Afrikaans">Afrikaans</option>
                           <option value="Akan Twi">Akan Twi</option>
                           <option value="Albanian">Albanian</option>
                           <option value="American Sign Language (ASL)">American Sign Language (ASL)</option>
                           <option value="Amharic">Amharic</option>
                           <option value="Argentine Sign Language">Argentine Sign Language</option>
                           <option value="Armenian">Armenian</option>
                           <option value="Azeri">Azeri</option>
                           <option value="Arabic (Egyptian)">Arabic (Egyptian)</option>
                           <option value="Arabic (Gulf)">Arabic (Gulf)</option>
                           <option value="Arabic (Modern Standard)">Arabic (Modern Standard)</option>
                           <option value="Arabic(Sudanese)">Arabic(Sudanese)</option>
                           <option value="Arabic (Maghrebi)">Arabic (Maghrebi)</option>
                           <option value="Arabic (Levantine)">Arabic (Levantine)</option>
                           <option value="Alsatian">Alsatian</option>
                           <option value="Assamese">Assamese</option>
                           <option value="Aiki (Kibet)">Aiki (Kibet)</option>
                           <option value="Aiki (Runga)">Aiki (Runga)</option>
                           <option value="Ainu">Ainu</option>
                           <option value="Aragonese">Aragonese</option>
                           <option value="Aramaic">Aramaic</option>
                           <option value="Aromanian">Aromanian</option>
                           <option value="Assiniboine (Nakota)">Assiniboine (Nakota)</option>
                           <option value="Austrian German">Austrian German</option>
                           <option value="Australian Sign Language (Auslan)">Australian Sign Language (Auslan)</option>
                           <option value="Avar">Avar</option>
                           <option value="Aymara">Aymara</option>
                           <option value="Azerbaijani">Azerbaijani</option>
                           <option value="Basque">Basque</option>
                           <option value="Belait">Belait</option>
                           <option value="Belarusian">Belarusian</option>
                           <option value="Bengali">Bengali</option>
                           <option value="Bosnian">Bosnian</option>
                           <option value="Brazilian Sign Language (LIBRAS)">Brazilian Sign Language (LIBRAS)</option>
                           <option value="British Sign Language (BSL)">British Sign Language (BSL)</option>
                           <option value="Bulgarian">Bulgarian</option>
                           <option value="Burmese">Burmese</option>
                           <option value="Balochi">Balochi</option>
                           <option value="Blackfoot (Niitsi'powahsin)">Blackfoot (Niitsi'powahsin)</option>
                           <option value="Breton">Breton</option>
                           <option value="Balinese">Balinese</option>
                           <option value="Bago-Kusuntu">Bago-Kusuntu</option>
                           <option value="Bagri">Bagri</option>
                           <option value="Bambara (Bamanankan)">Bambara (Bamanankan)</option>
                           <option value="Banjar">Banjar</option>
                           <option value="Barawana (Baré)">Barawana (Baré)</option>
                           <option value="Bari">Bari</option>
                           <option value="Batak Toba">Batak Toba</option>
                           <option value="Bats">Bats</option>
                           <option value="Bavarian">Bavarian</option>
                           <option value="Beja">Beja</option>
                           <option value="Bhojpuri">Bhojpuri</option>
                           <option value="Bislama">Bislama</option>
                           <option value="Bugis">Bugis</option>
                           <option value="Catalan">Catalan</option>
                           <option value="Cebuano">Cebuano</option>
                           <option value="Chinese (Cantonese)">Chinese (Cantonese)</option>
                           <option value="Chinese (Hakka)">Chinese (Hakka)</option>
                           <option value="Chinese (Hokkien)">Chinese (Hokkien)</option>
                           <option value="Chinese (Shanghainese)">Chinese (Shanghainese)</option>
                           <option value="Chinese (Taiwanese)">Chinese (Taiwanese)</option>
                           <option value="Chinese (Other)">Chinese (Other)</option>
                           <option value="Croatian">Croatian</option>
                           <option value="Czech">Czech</option>
                           <option value="Cornish">Cornish</option>
                           <option value="Corsican">Corsican</option>
                           <option value="Cree">Cree</option>
                           <option value="Cherokee">Cherokee</option>
                           <option value="Chewa (Chichewa)">Chewa (Chichewa)</option>
                           <option value="Chavacano">Chavacano</option>
                           <option value="Chechen">Chechen</option>
                           <option value="Chibarwe">Chibarwe</option>
                           <option value="Chiquitano">Chiquitano</option>
                           <option value="Choctaw">Choctaw</option>
                           <option value="Chukchi">Chukchi</option>
                           <option value="Chuwabu">Chuwabu</option>
                           <option value="Coptic">Coptic</option>
                           <option value="Crow">Crow</option>
                           <option value="Danish">Danish</option>
                           <option value="Dutch">Dutch</option>
                           <option value="Dzongkha">Dzongkha</option>
                           <option value="Dari">Dari</option>
                           <option value="Dothraki">Dothraki</option>
                           <option value="Daakaka">Daakaka</option>
                           <option value="Dakota">Dakota</option>
                           <option value="Daza">Daza</option>
                           <option value="Dela-Oenale">Dela-Oenale</option>
                           <option value="Dinka">Dinka</option>
                           <option value="Domari">Domari</option>
                           <option value="Dotyali">Dotyali</option>
                           <option value="Drehu">Drehu</option>
                           <option value="Esperanto">Esperanto</option>
                           <option value="Estonian">Estonian</option>
                           <option value="Erzya">Erzya</option>
                           <option value="Ewe">Ewe</option>
                           <option value="Ewondo (Fang)">Ewondo (Fang)</option>
                           <option value="Filipino (Tagalog)">Filipino (Tagalog)</option>
                           <option value="Finnish">Finnish</option>
                           <option value="Flemish">Flemish</option>
                           <option value="Faroese">Faroese</option>
                           <option value="Frisian">Frisian</option>
                           <option value="Fijian (ITaukei)">Fijian (ITaukei)</option>
                           <option value="Fon (Fon gbè)">Fon (Fon gbè)</option>
                           <option value="Friulian">Friulian</option>
                           <option value="Fulah">Fulah</option>
                           <option value="Fur">Fur</option>
                           <option value="Gaelic (Irish)">Gaelic (Irish)</option>
                           <option value="Gaelic (Scottish)">Gaelic (Scottish)</option>
                           <option value="Galician">Galician</option>
                           <option value="Georgian">Georgian</option>
                           <option value="Greek">Greek</option>
                           <option value="Greek (Ancient)">Greek (Ancient)</option>
                           <option value="Greenlandic">Greenlandic</option>
                           <option value="Gujarati">Gujarati</option>
                           <option value="Ga">Ga</option>
                           <option value="Guarani">Guarani</option>
                           <option value="Gaelic (Manx)">Gaelic (Manx)</option>
                           <option value="Gallo">Gallo</option>
                           <option value="Garifuna">Garifuna</option>
                           <option value="Gikuyu">Gikuyu</option>
                           <!-- <option value="Greenlandic">Greenlandic</option> -->
                           <option value="Guambiano">Guambiano</option>
                           <option value="Gullah">Gullah</option>
                           <option value="Gullah (Afro-Seminole Creole)">Gullah (Afro-Seminole Creole)</option>
                           <option value="Haitian Creole">Haitian Creole</option>
                           <option value="Hausa">Hausa</option>
                           <!-- <option value=""></option> -->
                           <option value="Hebrew">Hebrew</option>
                           <option value="Hmong">Hmong</option>
                           <option value="Hungarian">Hungarian</option>
                           <option value="Hawaiian Pidgin (Hawaiian Creole English)">Hawaiian Pidgin (Hawaiian Creole English)</option>
                           <option value="Honduran Sign Language (LESHO)">Honduran Sign Language (LESHO)</option>
                           <option value="Icelandic">Icelandic</option>
                           <option value="Indonesian">Indonesian</option>
                           <option value="Igbo">Igbo</option>
                           <option value="Inuktitut">Inuktitut</option>
                           <option value="Iban">Iban</option>
                           <option value="Ingush">Ingush</option>
                           <option value="International Sign (IS)">International Sign (IS)</option>
                           <option value="Ido">Ido</option>
                           <option value="Inuinnaqtun">Inuinnaqtun</option>
                           <option value="Inuvialuktun">Inuvialuktun</option>
                           <option value="Ixcatec">Ixcatec</option>
                           <option value="Javanese">Javanese</option>
                           <option value="Japanese (Okinawan)">Japanese (Okinawan)</option>
                           <option value="Japanese Sign Language">Japanese Sign Language</option>
                           <option value="Jamaican Creole">Jamaican Creole</option>
                           <option value="Judeo-Tat">Judeo-Tat</option>
                           <option value="Kannada">Kannada</option>
                           <option value="Kazakh">Kazakh</option>
                           <option value="Kinyarwanda">Kinyarwanda</option>
                           <option value="Khmer (Cambodian)">Khmer (Cambodian)</option>
                           <option value="Klingon">Klingon</option>
                           <option value="Kurdish">Kurdish</option>
                           <option value="Kyrgyz">Kyrgyz</option>
                           <option value="Kekchi (Q'eqchi')">Kekchi (Q'eqchi')</option>
                           <option value="K'iche'">K'iche'</option>
                           <option value="">Kachin (Jingpho)</option>
                           <option value="Kachin (Jingpho)">Kalanga</option>
                           <option value="Kalmyk Oirat">Kalmyk Oirat</option>
                           <option value="Kanuri">Kanuri</option>
                           <option value="Kenjeje">Kenjeje</option>
                           <option value="Khmu">Khmu</option>
                           <option value="Khoemana">Khoemana</option>
                           <option value="Kirundi">Kirundi</option>
                           <option value="Koisan (Tsoa)">Koisan (Tsoa)</option>
                           <option value="Konkani">Konkani</option>
                           <option value="Lao">Lao</option>
                           <option value="Latin">Latin</option>
                           <option value="Latvian">Latvian</option>
                           <option value="Lithuanian">Lithuanian</option>
                           <option value="Luo">Luo</option>
                           <option value="Luxembourgish">Luxembourgish</option>
                           <option value="Lakota">Lakota</option>
                           <option value="Ladino (Judeo-Spanish)">Ladino (Judeo-Spanish)</option>
                           <option value="Ladin">Ladin</option>
                           <option value="Lau">Lau</option>
                           <option value="Limburgish">Limburgish</option>
                           <option value="Litzlitz (Naman)">Litzlitz (Naman)</option>
                           <option value="Lombard">Lombard</option>
                           <option value="Macedonian">Macedonian</option>
                           <option value="Malagasy">Malagasy</option>
                           <option value="Malay">Malay</option>
                           <option value="Malayalam">Malayalam</option>
                           <option value="Maltese">Maltese</option>
                           <option value="Maori">Maori</option>
                           <option value="Marathi">Marathi</option>
                           <option value="Mongolian">Mongolian</option>
                           <option value="Maasai">Maasai</option>
                           <option value="Maithili">Maithili</option>
                           <option value="Mamuju">Mamuju</option>
                           <option value="Manchu">Manchu</option>
                           <option value="Mandingo (Madinka)">Mandingo (Madinka)</option>
                           <option value="Manggarai">Manggarai</option>
                           <option value="Mapudungun">Mapudungun</option>
                           <option value="Marri Ngarr">Marri Ngarr</option>
                           <option value="Masalit">Masalit</option>
                           <option value="Mekeo">Mekeo</option>
                           <option value="Mexican Sign Language (LSM)">Mexican Sign Language (LSM)</option>
                           <option value="Minangkabau">Minangkabau</option>
                           <option value="Mingrelian">Mingrelian</option>
                           <option value="Mirandese">Mirandese</option>
                           <option value="Miyako">Miyako</option>
                           <option value="Mon">Mon</option>
                           <option value="Maloptionian (Dhivehi)">Maloptionian (Dhivehi)</option>
                           <option value="Marshallese">Marshallese</option>
                           <option value="Mauritian Creole">Mauritian Creole</option>
                           <option value="Mazatec">Mazatec</option>
                           <option value="Montenegrin">Montenegrin</option>
                           <option value="Mnong">Mnong</option>
                           <option value="Nahuatl">Nahuatl</option>
                           <option value="Nepali">Nepali</option>
                           <option value="Norwegian">Norwegian</option>
                           <option value="Nambya">Nambya</option>
                           <option value="Neapolitan (Napoletano)">Neapolitan (Napoletano)</option>
                           <option value="Natchez">Natchez</option>
                           <option value="Navajo (Diné bizaad)">Navajo (Diné bizaad)</option>
                           <option value="Ndebele">Ndebele</option>
                           <option value="Neverver">Neverver</option>
                           <option value="Newar">Newar</option>
                           <option value="Nigerian Pidgin">Nigerian Pidgin</option>
                           <option value="North Efate (Nakanamanga)">North Efate (Nakanamanga)</option>
                           <option value="Nubian (Midob)">Nubian (Midob)</option>
                           <option value="Nubian (Nobiin)">Nubian (Nobiin)</option>
                           <option value="Nuer">Nuer</option>
                           <option value="Ojibwe">Ojibwe</option>
                           <option value="Ogiek (Akiek)">Ogiek (Akiek)</option>
                           <option value="Okinawan">Okinawan</option>
                           <option value="Oromo">Oromo</option>
                           <option value="Pashto">Pashto</option>
                           <option value="Persian (Farsi)">Persian (Farsi)</option>
                           <option value="Polish">Polish</option>
                           <option value="Punjabi">Punjabi</option>
                           <option value="Papiamento">Papiamento</option>
                           <option value="Pa'o">Pa'o</option>
                           <option value="Palauan">Palauan</option>
                           <option value="Quechua">Quechua</option>
                           <option value="Rohingya">Rohingya</option>
                           <option value="Romanian">Romanian</option>
                           <option value="Romani (Balkan)">Romani (Balkan)</option>
                           <option value="Romani (Sinte)">Romani (Sinte)</option>
                           <option value="Romani (Vlax)">Romani (Vlax)</option>
                           <option value="Romansch">Romansch</option>
                           <option value="Samoan">Samoan</option>
                           <option value="Sanskrit">Sanskrit</option>
                           <option value="Serbian">Serbian</option>
                           <option value="Sindhi">Sindhi</option>
                           <option value="Sinhala">Sinhala</option>
                           <option value="Sicilian">Sicilian</option>
                           <option value="Slovak">Slovak</option>
                           <option value="Slovenian">Slovenian</option>
                           <option value="Somali">Somali</option>
                           <option value="Swahili">Swahili</option>
                           <option value="Swedish">Swedish</option>
                           <option value="Scots">Scots</option>
                           <option value="Swiss German">Swiss German</option>
                           <option value="Syriac">Syriac</option>
                           <option value="Sa">Sa</option>
                           <option value="Saami (Kildin)">Saami (Kildin)</option>
                           <option value="Saami (Lule)">Saami (Lule)</option>
                           <option value="Saami (Northern)">Saami (Northern)</option>
                           <option value="Sardinian">Sardinian</option>
                           <option value="Sekani">Sekani</option>
                           <option value="Sena">Sena</option>
                           <option value="Sfyria">Sfyria</option>
                           <option value="Shan">Shan</option>
                           <option value="Sherpa">Sherpa</option>
                           <option value="Shona">Shona</option>
                           <option value="Shona (Ndau)">Shona (Ndau)</option>
                           <option value="Shoshoni">Shoshoni</option>
                           <option value="Shumashti">Shumashti</option>
                           <option value="Sign Language(Other)">Sign Language(Other)</option>
                           <option value="Silbo Gomero">Silbo Gomero</option>
                           <option value="Sotho">Sotho</option>
                           <option value="Sundanese">Sundanese</option>
                           <option value="Swazi">Swazi</option>
                           <option value="Swiss-French Sign Language">Swiss-French Sign Language</option>
                           <option value="Swiss-German Sign Language">Swiss-German Sign Language</option>
                           <option value="Tajik">Tajik</option>
                           <option value="Berber (Tamazight)">Berber (Tamazight)</option>
                           <option value="Tamil">Tamil</option>
                           <option value="Tatar">Tatar</option>
                           <option value="Telugu">Telugu</option>
                           <option value="Thai">Thai</option>
                           <option value="Tibetan">Tibetan</option>
                           <option value="Turkish">Turkish</option>
                           <option value="Turkmen">Turkmen</option>
                           <option value="Tutong">Tutong</option>
                           <option value="Toki Pona">Toki Pona</option>
                           <option value="Tamang">Tamang</option>
                           <option value="Tharu">Tharu</option>
                           <option value="Tigrinya">Tigrinya</option>
                           <option value="Tlingit">Tlingit</option>
                           <option value="Tongan">Tongan</option>
                           <option value="Tsonga (Xitsonga)">Tsonga (Xitsonga)</option>
                           <option value="Tswana">Tswana</option>
                           <option value="Tz’utujil">Tz’utujil</option>
                           <option value="Ukrainian">Ukrainian</option>
                           <option value="Urdu">Urdu</option>
                           <option value="Uyghur">Uyghur</option>
                           <option value="Uzbek">Uzbek</option>
                           <option value="Vietnamese">Vietnamese</option>
                           <option value="Venda">Venda</option>
                           <option value="Welsh">Welsh</option>
                           <option value="Wolof">Wolof</option>
                           <option value="Waray">Waray</option>
                           <option value="Wayuu">Wayuu</option>
                           <option value="Wyandot">Wyandot</option>
                           <option value="Xhosa">Xhosa</option>
                           <option value="Yakut">Yakut</option>
                           <option value="Yiddish">Yiddish</option>
                           <option value="Yoruba">Yoruba</option>
                           <option value="Yucatec Maya">Yucatec Maya</option>
                           <option value="Yola">Yola</option>
                           <option value="Yugoslavian Sign Language">Yugoslavian Sign Language</option>
                           <option value="Zhuang">Zhuang</option>
                           <option value="Zulu">Zulu</option>
                           <option value="Zaghawa (Beria)">Zaghawa (Beria)</option>
                           <option value="Zapotec">Zapotec</option>
                           <option value="Zarma">Zarma</option>
                           <option value="Zaza (Northern)">Zaza (Northern)</option>
                           <option value="Occitan">Occitan</option>
                           <option value="Odia">Odia</option>
                           <option value="Oneida">Oneida</option>
                     </select>
                     <select name="speak_lang_level" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option selected="">A1: Beginner</option>
                        <option value="1">A2: Elementary</option>
                        <option value="2">B1: Intermediate</option>
                        <option value="3">B2: Upper Intermediate</option>
                        <option value="3">C1: Advanced</option>
                        <option value="3">C2: Proficient</option>
                     </select>
                     <div class="cont_check_box mg_top std_lea_mg">
                        <label class="checkbox small">
                        <input name="learning" value="1" type="checkbox">
                        <span class="success"></span>
                        </label>
                        <label class="check_label size">Learning</label>
                     </div>
                     <div class="custom-control custom-radio mg_top_rad std_pro_m_left">
                        <input  name="primary" value="1" type="radio" id="customRadio1"  class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Primary</label>
                        <!--    <i class="fas fa-times mar_left"></i> -->
                     </div>
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label></label>
                     </div>
                     <select name="speak_lang2" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                     <option value="French">French</option>
                           <option value="Spanish">Spanish</option>
                           <option value="Portuguese">Portuguese</option>
                           <option value="Japanese">Japanese</option>
                           <option value="Korean">Korean</option>
                           <option value="Arabic">Arabic</option>
                           <option value="Hindi">Hindi</option>
                           <option value="Italian">Italian</option>
                           <option value="Russian">Russian</option>
                           <option value="Afrikaans">Afrikaans</option>
                           <option value="Akan Twi">Akan Twi</option>
                           <option value="Albanian">Albanian</option>
                           <option value="American Sign Language (ASL)">American Sign Language (ASL)</option>
                           <option value="Amharic">Amharic</option>
                           <option value="Argentine Sign Language">Argentine Sign Language</option>
                           <option value="Armenian">Armenian</option>
                           <option value="Azeri">Azeri</option>
                           <option value="Arabic (Egyptian)">Arabic (Egyptian)</option>
                           <option value="Arabic (Gulf)">Arabic (Gulf)</option>
                           <option value="Arabic (Modern Standard)">Arabic (Modern Standard)</option>
                           <option value="Arabic(Sudanese)">Arabic(Sudanese)</option>
                           <option value="Arabic (Maghrebi)">Arabic (Maghrebi)</option>
                           <option value="Arabic (Levantine)">Arabic (Levantine)</option>
                           <option value="Alsatian">Alsatian</option>
                           <option value="Assamese">Assamese</option>
                           <option value="Aiki (Kibet)">Aiki (Kibet)</option>
                           <option value="Aiki (Runga)">Aiki (Runga)</option>
                           <option value="Ainu">Ainu</option>
                           <option value="Aragonese">Aragonese</option>
                           <option value="Aramaic">Aramaic</option>
                           <option value="Aromanian">Aromanian</option>
                           <option value="Assiniboine (Nakota)">Assiniboine (Nakota)</option>
                           <option value="Austrian German">Austrian German</option>
                           <option value="Australian Sign Language (Auslan)">Australian Sign Language (Auslan)</option>
                           <option value="Avar">Avar</option>
                           <option value="Aymara">Aymara</option>
                           <option value="Azerbaijani">Azerbaijani</option>
                           <option value="Basque">Basque</option>
                           <option value="Belait">Belait</option>
                           <option value="Belarusian">Belarusian</option>
                           <option value="Bengali">Bengali</option>
                           <option value="Bosnian">Bosnian</option>
                           <option value="Brazilian Sign Language (LIBRAS)">Brazilian Sign Language (LIBRAS)</option>
                           <option value="British Sign Language (BSL)">British Sign Language (BSL)</option>
                           <option value="Bulgarian">Bulgarian</option>
                           <option value="Burmese">Burmese</option>
                           <option value="Balochi">Balochi</option>
                           <option value="Blackfoot (Niitsi'powahsin)">Blackfoot (Niitsi'powahsin)</option>
                           <option value="Breton">Breton</option>
                           <option value="Balinese">Balinese</option>
                           <option value="Bago-Kusuntu">Bago-Kusuntu</option>
                           <option value="Bagri">Bagri</option>
                           <option value="Bambara (Bamanankan)">Bambara (Bamanankan)</option>
                           <option value="Banjar">Banjar</option>
                           <option value="Barawana (Baré)">Barawana (Baré)</option>
                           <option value="Bari">Bari</option>
                           <option value="Batak Toba">Batak Toba</option>
                           <option value="Bats">Bats</option>
                           <option value="Bavarian">Bavarian</option>
                           <option value="Beja">Beja</option>
                           <option value="Bhojpuri">Bhojpuri</option>
                           <option value="Bislama">Bislama</option>
                           <option value="Bugis">Bugis</option>
                           <option value="Catalan">Catalan</option>
                           <option value="Cebuano">Cebuano</option>
                           <option value="Chinese (Cantonese)">Chinese (Cantonese)</option>
                           <option value="Chinese (Hakka)">Chinese (Hakka)</option>
                           <option value="Chinese (Hokkien)">Chinese (Hokkien)</option>
                           <option value="Chinese (Shanghainese)">Chinese (Shanghainese)</option>
                           <option value="Chinese (Taiwanese)">Chinese (Taiwanese)</option>
                           <option value="Chinese (Other)">Chinese (Other)</option>
                           <option value="Croatian">Croatian</option>
                           <option value="Czech">Czech</option>
                           <option value="Cornish">Cornish</option>
                           <option value="Corsican">Corsican</option>
                           <option value="Cree">Cree</option>
                           <option value="Cherokee">Cherokee</option>
                           <option value="Chewa (Chichewa)">Chewa (Chichewa)</option>
                           <option value="Chavacano">Chavacano</option>
                           <option value="Chechen">Chechen</option>
                           <option value="Chibarwe">Chibarwe</option>
                           <option value="Chiquitano">Chiquitano</option>
                           <option value="Choctaw">Choctaw</option>
                           <option value="Chukchi">Chukchi</option>
                           <option value="Chuwabu">Chuwabu</option>
                           <option value="Coptic">Coptic</option>
                           <option value="Crow">Crow</option>
                           <option value="Danish">Danish</option>
                           <option value="Dutch">Dutch</option>
                           <option value="Dzongkha">Dzongkha</option>
                           <option value="Dari">Dari</option>
                           <option value="Dothraki">Dothraki</option>
                           <option value="Daakaka">Daakaka</option>
                           <option value="Dakota">Dakota</option>
                           <option value="Daza">Daza</option>
                           <option value="Dela-Oenale">Dela-Oenale</option>
                           <option value="Dinka">Dinka</option>
                           <option value="Domari">Domari</option>
                           <option value="Dotyali">Dotyali</option>
                           <option value="Drehu">Drehu</option>
                           <option value="Esperanto">Esperanto</option>
                           <option value="Estonian">Estonian</option>
                           <option value="Erzya">Erzya</option>
                           <option value="Ewe">Ewe</option>
                           <option value="Ewondo (Fang)">Ewondo (Fang)</option>
                           <option value="Filipino (Tagalog)">Filipino (Tagalog)</option>
                           <option value="Finnish">Finnish</option>
                           <option value="Flemish">Flemish</option>
                           <option value="Faroese">Faroese</option>
                           <option value="Frisian">Frisian</option>
                           <option value="Fijian (ITaukei)">Fijian (ITaukei)</option>
                           <option value="Fon (Fon gbè)">Fon (Fon gbè)</option>
                           <option value="Friulian">Friulian</option>
                           <option value="Fulah">Fulah</option>
                           <option value="Fur">Fur</option>
                           <option value="Gaelic (Irish)">Gaelic (Irish)</option>
                           <option value="Gaelic (Scottish)">Gaelic (Scottish)</option>
                           <option value="Galician">Galician</option>
                           <option value="Georgian">Georgian</option>
                           <option value="Greek">Greek</option>
                           <option value="Greek (Ancient)">Greek (Ancient)</option>
                           <option value="Greenlandic">Greenlandic</option>
                           <option value="Gujarati">Gujarati</option>
                           <option value="Ga">Ga</option>
                           <option value="Guarani">Guarani</option>
                           <option value="Gaelic (Manx)">Gaelic (Manx)</option>
                           <option value="Gallo">Gallo</option>
                           <option value="Garifuna">Garifuna</option>
                           <option value="Gikuyu">Gikuyu</option>
                           <!-- <option value="Greenlandic">Greenlandic</option> -->
                           <option value="Guambiano">Guambiano</option>
                           <option value="Gullah">Gullah</option>
                           <option value="Gullah (Afro-Seminole Creole)">Gullah (Afro-Seminole Creole)</option>
                           <option value="Haitian Creole">Haitian Creole</option>
                           <option value="Hausa">Hausa</option>
                           <!-- <option value=""></option> -->
                           <option value="Hebrew">Hebrew</option>
                           <option value="Hmong">Hmong</option>
                           <option value="Hungarian">Hungarian</option>
                           <option value="Hawaiian Pidgin (Hawaiian Creole English)">Hawaiian Pidgin (Hawaiian Creole English)</option>
                           <option value="Honduran Sign Language (LESHO)">Honduran Sign Language (LESHO)</option>
                           <option value="Icelandic">Icelandic</option>
                           <option value="Indonesian">Indonesian</option>
                           <option value="Igbo">Igbo</option>
                           <option value="Inuktitut">Inuktitut</option>
                           <option value="Iban">Iban</option>
                           <option value="Ingush">Ingush</option>
                           <option value="International Sign (IS)">International Sign (IS)</option>
                           <option value="Ido">Ido</option>
                           <option value="Inuinnaqtun">Inuinnaqtun</option>
                           <option value="Inuvialuktun">Inuvialuktun</option>
                           <option value="Ixcatec">Ixcatec</option>
                           <option value="Javanese">Javanese</option>
                           <option value="Japanese (Okinawan)">Japanese (Okinawan)</option>
                           <option value="Japanese Sign Language">Japanese Sign Language</option>
                           <option value="Jamaican Creole">Jamaican Creole</option>
                           <option value="Judeo-Tat">Judeo-Tat</option>
                           <option value="Kannada">Kannada</option>
                           <option value="Kazakh">Kazakh</option>
                           <option value="Kinyarwanda">Kinyarwanda</option>
                           <option value="Khmer (Cambodian)">Khmer (Cambodian)</option>
                           <option value="Klingon">Klingon</option>
                           <option value="Kurdish">Kurdish</option>
                           <option value="Kyrgyz">Kyrgyz</option>
                           <option value="Kekchi (Q'eqchi')">Kekchi (Q'eqchi')</option>
                           <option value="K'iche'">K'iche'</option>
                           <option value="">Kachin (Jingpho)</option>
                           <option value="Kachin (Jingpho)">Kalanga</option>
                           <option value="Kalmyk Oirat">Kalmyk Oirat</option>
                           <option value="Kanuri">Kanuri</option>
                           <option value="Kenjeje">Kenjeje</option>
                           <option value="Khmu">Khmu</option>
                           <option value="Khoemana">Khoemana</option>
                           <option value="Kirundi">Kirundi</option>
                           <option value="Koisan (Tsoa)">Koisan (Tsoa)</option>
                           <option value="Konkani">Konkani</option>
                           <option value="Lao">Lao</option>
                           <option value="Latin">Latin</option>
                           <option value="Latvian">Latvian</option>
                           <option value="Lithuanian">Lithuanian</option>
                           <option value="Luo">Luo</option>
                           <option value="Luxembourgish">Luxembourgish</option>
                           <option value="Lakota">Lakota</option>
                           <option value="Ladino (Judeo-Spanish)">Ladino (Judeo-Spanish)</option>
                           <option value="Ladin">Ladin</option>
                           <option value="Lau">Lau</option>
                           <option value="Limburgish">Limburgish</option>
                           <option value="Litzlitz (Naman)">Litzlitz (Naman)</option>
                           <option value="Lombard">Lombard</option>
                           <option value="Macedonian">Macedonian</option>
                           <option value="Malagasy">Malagasy</option>
                           <option value="Malay">Malay</option>
                           <option value="Malayalam">Malayalam</option>
                           <option value="Maltese">Maltese</option>
                           <option value="Maori">Maori</option>
                           <option value="Marathi">Marathi</option>
                           <option value="Mongolian">Mongolian</option>
                           <option value="Maasai">Maasai</option>
                           <option value="Maithili">Maithili</option>
                           <option value="Mamuju">Mamuju</option>
                           <option value="Manchu">Manchu</option>
                           <option value="Mandingo (Madinka)">Mandingo (Madinka)</option>
                           <option value="Manggarai">Manggarai</option>
                           <option value="Mapudungun">Mapudungun</option>
                           <option value="Marri Ngarr">Marri Ngarr</option>
                           <option value="Masalit">Masalit</option>
                           <option value="Mekeo">Mekeo</option>
                           <option value="Mexican Sign Language (LSM)">Mexican Sign Language (LSM)</option>
                           <option value="Minangkabau">Minangkabau</option>
                           <option value="Mingrelian">Mingrelian</option>
                           <option value="Mirandese">Mirandese</option>
                           <option value="Miyako">Miyako</option>
                           <option value="Mon">Mon</option>
                           <option value="Maloptionian (Dhivehi)">Maloptionian (Dhivehi)</option>
                           <option value="Marshallese">Marshallese</option>
                           <option value="Mauritian Creole">Mauritian Creole</option>
                           <option value="Mazatec">Mazatec</option>
                           <option value="Montenegrin">Montenegrin</option>
                           <option value="Mnong">Mnong</option>
                           <option value="Nahuatl">Nahuatl</option>
                           <option value="Nepali">Nepali</option>
                           <option value="Norwegian">Norwegian</option>
                           <option value="Nambya">Nambya</option>
                           <option value="Neapolitan (Napoletano)">Neapolitan (Napoletano)</option>
                           <option value="Natchez">Natchez</option>
                           <option value="Navajo (Diné bizaad)">Navajo (Diné bizaad)</option>
                           <option value="Ndebele">Ndebele</option>
                           <option value="Neverver">Neverver</option>
                           <option value="Newar">Newar</option>
                           <option value="Nigerian Pidgin">Nigerian Pidgin</option>
                           <option value="North Efate (Nakanamanga)">North Efate (Nakanamanga)</option>
                           <option value="Nubian (Midob)">Nubian (Midob)</option>
                           <option value="Nubian (Nobiin)">Nubian (Nobiin)</option>
                           <option value="Nuer">Nuer</option>
                           <option value="Ojibwe">Ojibwe</option>
                           <option value="Ogiek (Akiek)">Ogiek (Akiek)</option>
                           <option value="Okinawan">Okinawan</option>
                           <option value="Oromo">Oromo</option>
                           <option value="Pashto">Pashto</option>
                           <option value="Persian (Farsi)">Persian (Farsi)</option>
                           <option value="Polish">Polish</option>
                           <option value="Punjabi">Punjabi</option>
                           <option value="Papiamento">Papiamento</option>
                           <option value="Pa'o">Pa'o</option>
                           <option value="Palauan">Palauan</option>
                           <option value="Quechua">Quechua</option>
                           <option value="Rohingya">Rohingya</option>
                           <option value="Romanian">Romanian</option>
                           <option value="Romani (Balkan)">Romani (Balkan)</option>
                           <option value="Romani (Sinte)">Romani (Sinte)</option>
                           <option value="Romani (Vlax)">Romani (Vlax)</option>
                           <option value="Romansch">Romansch</option>
                           <option value="Samoan">Samoan</option>
                           <option value="Sanskrit">Sanskrit</option>
                           <option value="Serbian">Serbian</option>
                           <option value="Sindhi">Sindhi</option>
                           <option value="Sinhala">Sinhala</option>
                           <option value="Sicilian">Sicilian</option>
                           <option value="Slovak">Slovak</option>
                           <option value="Slovenian">Slovenian</option>
                           <option value="Somali">Somali</option>
                           <option value="Swahili">Swahili</option>
                           <option value="Swedish">Swedish</option>
                           <option value="Scots">Scots</option>
                           <option value="Swiss German">Swiss German</option>
                           <option value="Syriac">Syriac</option>
                           <option value="Sa">Sa</option>
                           <option value="Saami (Kildin)">Saami (Kildin)</option>
                           <option value="Saami (Lule)">Saami (Lule)</option>
                           <option value="Saami (Northern)">Saami (Northern)</option>
                           <option value="Sardinian">Sardinian</option>
                           <option value="Sekani">Sekani</option>
                           <option value="Sena">Sena</option>
                           <option value="Sfyria">Sfyria</option>
                           <option value="Shan">Shan</option>
                           <option value="Sherpa">Sherpa</option>
                           <option value="Shona">Shona</option>
                           <option value="Shona (Ndau)">Shona (Ndau)</option>
                           <option value="Shoshoni">Shoshoni</option>
                           <option value="Shumashti">Shumashti</option>
                           <option value="Sign Language(Other)">Sign Language(Other)</option>
                           <option value="Silbo Gomero">Silbo Gomero</option>
                           <option value="Sotho">Sotho</option>
                           <option value="Sundanese">Sundanese</option>
                           <option value="Swazi">Swazi</option>
                           <option value="Swiss-French Sign Language">Swiss-French Sign Language</option>
                           <option value="Swiss-German Sign Language">Swiss-German Sign Language</option>
                           <option value="Tajik">Tajik</option>
                           <option value="Berber (Tamazight)">Berber (Tamazight)</option>
                           <option value="Tamil">Tamil</option>
                           <option value="Tatar">Tatar</option>
                           <option value="Telugu">Telugu</option>
                           <option value="Thai">Thai</option>
                           <option value="Tibetan">Tibetan</option>
                           <option value="Turkish">Turkish</option>
                           <option value="Turkmen">Turkmen</option>
                           <option value="Tutong">Tutong</option>
                           <option value="Toki Pona">Toki Pona</option>
                           <option value="Tamang">Tamang</option>
                           <option value="Tharu">Tharu</option>
                           <option value="Tigrinya">Tigrinya</option>
                           <option value="Tlingit">Tlingit</option>
                           <option value="Tongan">Tongan</option>
                           <option value="Tsonga (Xitsonga)">Tsonga (Xitsonga)</option>
                           <option value="Tswana">Tswana</option>
                           <option value="Tz’utujil">Tz’utujil</option>
                           <option value="Ukrainian">Ukrainian</option>
                           <option value="Urdu">Urdu</option>
                           <option value="Uyghur">Uyghur</option>
                           <option value="Uzbek">Uzbek</option>
                           <option value="Vietnamese">Vietnamese</option>
                           <option value="Venda">Venda</option>
                           <option value="Welsh">Welsh</option>
                           <option value="Wolof">Wolof</option>
                           <option value="Waray">Waray</option>
                           <option value="Wayuu">Wayuu</option>
                           <option value="Wyandot">Wyandot</option>
                           <option value="Xhosa">Xhosa</option>
                           <option value="Yakut">Yakut</option>
                           <option value="Yiddish">Yiddish</option>
                           <option value="Yoruba">Yoruba</option>
                           <option value="Yucatec Maya">Yucatec Maya</option>
                           <option value="Yola">Yola</option>
                           <option value="Yugoslavian Sign Language">Yugoslavian Sign Language</option>
                           <option value="Zhuang">Zhuang</option>
                           <option value="Zulu">Zulu</option>
                           <option value="Zaghawa (Beria)">Zaghawa (Beria)</option>
                           <option value="Zapotec">Zapotec</option>
                           <option value="Zarma">Zarma</option>
                           <option value="Zaza (Northern)">Zaza (Northern)</option>
                           <option value="Occitan">Occitan</option>
                           <option value="Odia">Odia</option>
                           <option value="Oneida">Oneida</option>
                     </select>
                     <select name="speak_lang_level2" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option selected="">A1: Beginner</option>
                        <option value="1">A2: Elementary</option>
                        <option value="2">B1: Intermediate</option>
                        <option value="3">B2: Upper Intermediate</option>
                        <option value="3">C1: Advanced</option>
                        <option value="3">C2: Proficient</option>
                     </select>
                     <div class="cont_check_box mg_top std_lea_mg">
                        <label class="checkbox small">
                        <input name="learning2" value="1" type="checkbox">
                        <span class="success"></span>
                        </label>
                        <label class="check_label size">Learning</label>
                     </div>
                     <div class="custom-control custom-radio mg_top_rad std_pro_m_left">
                        <input  name="primary2" value="1" type="radio" id="customRadio2"  class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Primary</label>
                        <!--  <i class="fas fa-times mar_left"></i> -->
                     </div>
                  </div>
                  <div class="std_basic_input">
                     <div class="label_part">
                        <label></label>
                     </div>
                     <select name="speak_lang3" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                     <option value="French">French</option>
                           <option value="Spanish">Spanish</option>
                           <option value="Portuguese">Portuguese</option>
                           <option value="Japanese">Japanese</option>
                           <option value="Korean">Korean</option>
                           <option value="Arabic">Arabic</option>
                           <option value="Hindi">Hindi</option>
                           <option value="Italian">Italian</option>
                           <option value="Russian">Russian</option>
                           <option value="Afrikaans">Afrikaans</option>
                           <option value="Akan Twi">Akan Twi</option>
                           <option value="Albanian">Albanian</option>
                           <option value="American Sign Language (ASL)">American Sign Language (ASL)</option>
                           <option value="Amharic">Amharic</option>
                           <option value="Argentine Sign Language">Argentine Sign Language</option>
                           <option value="Armenian">Armenian</option>
                           <option value="Azeri">Azeri</option>
                           <option value="Arabic (Egyptian)">Arabic (Egyptian)</option>
                           <option value="Arabic (Gulf)">Arabic (Gulf)</option>
                           <option value="Arabic (Modern Standard)">Arabic (Modern Standard)</option>
                           <option value="Arabic(Sudanese)">Arabic(Sudanese)</option>
                           <option value="Arabic (Maghrebi)">Arabic (Maghrebi)</option>
                           <option value="Arabic (Levantine)">Arabic (Levantine)</option>
                           <option value="Alsatian">Alsatian</option>
                           <option value="Assamese">Assamese</option>
                           <option value="Aiki (Kibet)">Aiki (Kibet)</option>
                           <option value="Aiki (Runga)">Aiki (Runga)</option>
                           <option value="Ainu">Ainu</option>
                           <option value="Aragonese">Aragonese</option>
                           <option value="Aramaic">Aramaic</option>
                           <option value="Aromanian">Aromanian</option>
                           <option value="Assiniboine (Nakota)">Assiniboine (Nakota)</option>
                           <option value="Austrian German">Austrian German</option>
                           <option value="Australian Sign Language (Auslan)">Australian Sign Language (Auslan)</option>
                           <option value="Avar">Avar</option>
                           <option value="Aymara">Aymara</option>
                           <option value="Azerbaijani">Azerbaijani</option>
                           <option value="Basque">Basque</option>
                           <option value="Belait">Belait</option>
                           <option value="Belarusian">Belarusian</option>
                           <option value="Bengali">Bengali</option>
                           <option value="Bosnian">Bosnian</option>
                           <option value="Brazilian Sign Language (LIBRAS)">Brazilian Sign Language (LIBRAS)</option>
                           <option value="British Sign Language (BSL)">British Sign Language (BSL)</option>
                           <option value="Bulgarian">Bulgarian</option>
                           <option value="Burmese">Burmese</option>
                           <option value="Balochi">Balochi</option>
                           <option value="Blackfoot (Niitsi'powahsin)">Blackfoot (Niitsi'powahsin)</option>
                           <option value="Breton">Breton</option>
                           <option value="Balinese">Balinese</option>
                           <option value="Bago-Kusuntu">Bago-Kusuntu</option>
                           <option value="Bagri">Bagri</option>
                           <option value="Bambara (Bamanankan)">Bambara (Bamanankan)</option>
                           <option value="Banjar">Banjar</option>
                           <option value="Barawana (Baré)">Barawana (Baré)</option>
                           <option value="Bari">Bari</option>
                           <option value="Batak Toba">Batak Toba</option>
                           <option value="Bats">Bats</option>
                           <option value="Bavarian">Bavarian</option>
                           <option value="Beja">Beja</option>
                           <option value="Bhojpuri">Bhojpuri</option>
                           <option value="Bislama">Bislama</option>
                           <option value="Bugis">Bugis</option>
                           <option value="Catalan">Catalan</option>
                           <option value="Cebuano">Cebuano</option>
                           <option value="Chinese (Cantonese)">Chinese (Cantonese)</option>
                           <option value="Chinese (Hakka)">Chinese (Hakka)</option>
                           <option value="Chinese (Hokkien)">Chinese (Hokkien)</option>
                           <option value="Chinese (Shanghainese)">Chinese (Shanghainese)</option>
                           <option value="Chinese (Taiwanese)">Chinese (Taiwanese)</option>
                           <option value="Chinese (Other)">Chinese (Other)</option>
                           <option value="Croatian">Croatian</option>
                           <option value="Czech">Czech</option>
                           <option value="Cornish">Cornish</option>
                           <option value="Corsican">Corsican</option>
                           <option value="Cree">Cree</option>
                           <option value="Cherokee">Cherokee</option>
                           <option value="Chewa (Chichewa)">Chewa (Chichewa)</option>
                           <option value="Chavacano">Chavacano</option>
                           <option value="Chechen">Chechen</option>
                           <option value="Chibarwe">Chibarwe</option>
                           <option value="Chiquitano">Chiquitano</option>
                           <option value="Choctaw">Choctaw</option>
                           <option value="Chukchi">Chukchi</option>
                           <option value="Chuwabu">Chuwabu</option>
                           <option value="Coptic">Coptic</option>
                           <option value="Crow">Crow</option>
                           <option value="Danish">Danish</option>
                           <option value="Dutch">Dutch</option>
                           <option value="Dzongkha">Dzongkha</option>
                           <option value="Dari">Dari</option>
                           <option value="Dothraki">Dothraki</option>
                           <option value="Daakaka">Daakaka</option>
                           <option value="Dakota">Dakota</option>
                           <option value="Daza">Daza</option>
                           <option value="Dela-Oenale">Dela-Oenale</option>
                           <option value="Dinka">Dinka</option>
                           <option value="Domari">Domari</option>
                           <option value="Dotyali">Dotyali</option>
                           <option value="Drehu">Drehu</option>
                           <option value="Esperanto">Esperanto</option>
                           <option value="Estonian">Estonian</option>
                           <option value="Erzya">Erzya</option>
                           <option value="Ewe">Ewe</option>
                           <option value="Ewondo (Fang)">Ewondo (Fang)</option>
                           <option value="Filipino (Tagalog)">Filipino (Tagalog)</option>
                           <option value="Finnish">Finnish</option>
                           <option value="Flemish">Flemish</option>
                           <option value="Faroese">Faroese</option>
                           <option value="Frisian">Frisian</option>
                           <option value="Fijian (ITaukei)">Fijian (ITaukei)</option>
                           <option value="Fon (Fon gbè)">Fon (Fon gbè)</option>
                           <option value="Friulian">Friulian</option>
                           <option value="Fulah">Fulah</option>
                           <option value="Fur">Fur</option>
                           <option value="Gaelic (Irish)">Gaelic (Irish)</option>
                           <option value="Gaelic (Scottish)">Gaelic (Scottish)</option>
                           <option value="Galician">Galician</option>
                           <option value="Georgian">Georgian</option>
                           <option value="Greek">Greek</option>
                           <option value="Greek (Ancient)">Greek (Ancient)</option>
                           <option value="Greenlandic">Greenlandic</option>
                           <option value="Gujarati">Gujarati</option>
                           <option value="Ga">Ga</option>
                           <option value="Guarani">Guarani</option>
                           <option value="Gaelic (Manx)">Gaelic (Manx)</option>
                           <option value="Gallo">Gallo</option>
                           <option value="Garifuna">Garifuna</option>
                           <option value="Gikuyu">Gikuyu</option>
                           <!-- <option value="Greenlandic">Greenlandic</option> -->
                           <option value="Guambiano">Guambiano</option>
                           <option value="Gullah">Gullah</option>
                           <option value="Gullah (Afro-Seminole Creole)">Gullah (Afro-Seminole Creole)</option>
                           <option value="Haitian Creole">Haitian Creole</option>
                           <option value="Hausa">Hausa</option>
                           <!-- <option value=""></option> -->
                           <option value="Hebrew">Hebrew</option>
                           <option value="Hmong">Hmong</option>
                           <option value="Hungarian">Hungarian</option>
                           <option value="Hawaiian Pidgin (Hawaiian Creole English)">Hawaiian Pidgin (Hawaiian Creole English)</option>
                           <option value="Honduran Sign Language (LESHO)">Honduran Sign Language (LESHO)</option>
                           <option value="Icelandic">Icelandic</option>
                           <option value="Indonesian">Indonesian</option>
                           <option value="Igbo">Igbo</option>
                           <option value="Inuktitut">Inuktitut</option>
                           <option value="Iban">Iban</option>
                           <option value="Ingush">Ingush</option>
                           <option value="International Sign (IS)">International Sign (IS)</option>
                           <option value="Ido">Ido</option>
                           <option value="Inuinnaqtun">Inuinnaqtun</option>
                           <option value="Inuvialuktun">Inuvialuktun</option>
                           <option value="Ixcatec">Ixcatec</option>
                           <option value="Javanese">Javanese</option>
                           <option value="Japanese (Okinawan)">Japanese (Okinawan)</option>
                           <option value="Japanese Sign Language">Japanese Sign Language</option>
                           <option value="Jamaican Creole">Jamaican Creole</option>
                           <option value="Judeo-Tat">Judeo-Tat</option>
                           <option value="Kannada">Kannada</option>
                           <option value="Kazakh">Kazakh</option>
                           <option value="Kinyarwanda">Kinyarwanda</option>
                           <option value="Khmer (Cambodian)">Khmer (Cambodian)</option>
                           <option value="Klingon">Klingon</option>
                           <option value="Kurdish">Kurdish</option>
                           <option value="Kyrgyz">Kyrgyz</option>
                           <option value="Kekchi (Q'eqchi')">Kekchi (Q'eqchi')</option>
                           <option value="K'iche'">K'iche'</option>
                           <option value="">Kachin (Jingpho)</option>
                           <option value="Kachin (Jingpho)">Kalanga</option>
                           <option value="Kalmyk Oirat">Kalmyk Oirat</option>
                           <option value="Kanuri">Kanuri</option>
                           <option value="Kenjeje">Kenjeje</option>
                           <option value="Khmu">Khmu</option>
                           <option value="Khoemana">Khoemana</option>
                           <option value="Kirundi">Kirundi</option>
                           <option value="Koisan (Tsoa)">Koisan (Tsoa)</option>
                           <option value="Konkani">Konkani</option>
                           <option value="Lao">Lao</option>
                           <option value="Latin">Latin</option>
                           <option value="Latvian">Latvian</option>
                           <option value="Lithuanian">Lithuanian</option>
                           <option value="Luo">Luo</option>
                           <option value="Luxembourgish">Luxembourgish</option>
                           <option value="Lakota">Lakota</option>
                           <option value="Ladino (Judeo-Spanish)">Ladino (Judeo-Spanish)</option>
                           <option value="Ladin">Ladin</option>
                           <option value="Lau">Lau</option>
                           <option value="Limburgish">Limburgish</option>
                           <option value="Litzlitz (Naman)">Litzlitz (Naman)</option>
                           <option value="Lombard">Lombard</option>
                           <option value="Macedonian">Macedonian</option>
                           <option value="Malagasy">Malagasy</option>
                           <option value="Malay">Malay</option>
                           <option value="Malayalam">Malayalam</option>
                           <option value="Maltese">Maltese</option>
                           <option value="Maori">Maori</option>
                           <option value="Marathi">Marathi</option>
                           <option value="Mongolian">Mongolian</option>
                           <option value="Maasai">Maasai</option>
                           <option value="Maithili">Maithili</option>
                           <option value="Mamuju">Mamuju</option>
                           <option value="Manchu">Manchu</option>
                           <option value="Mandingo (Madinka)">Mandingo (Madinka)</option>
                           <option value="Manggarai">Manggarai</option>
                           <option value="Mapudungun">Mapudungun</option>
                           <option value="Marri Ngarr">Marri Ngarr</option>
                           <option value="Masalit">Masalit</option>
                           <option value="Mekeo">Mekeo</option>
                           <option value="Mexican Sign Language (LSM)">Mexican Sign Language (LSM)</option>
                           <option value="Minangkabau">Minangkabau</option>
                           <option value="Mingrelian">Mingrelian</option>
                           <option value="Mirandese">Mirandese</option>
                           <option value="Miyako">Miyako</option>
                           <option value="Mon">Mon</option>
                           <option value="Maloptionian (Dhivehi)">Maloptionian (Dhivehi)</option>
                           <option value="Marshallese">Marshallese</option>
                           <option value="Mauritian Creole">Mauritian Creole</option>
                           <option value="Mazatec">Mazatec</option>
                           <option value="Montenegrin">Montenegrin</option>
                           <option value="Mnong">Mnong</option>
                           <option value="Nahuatl">Nahuatl</option>
                           <option value="Nepali">Nepali</option>
                           <option value="Norwegian">Norwegian</option>
                           <option value="Nambya">Nambya</option>
                           <option value="Neapolitan (Napoletano)">Neapolitan (Napoletano)</option>
                           <option value="Natchez">Natchez</option>
                           <option value="Navajo (Diné bizaad)">Navajo (Diné bizaad)</option>
                           <option value="Ndebele">Ndebele</option>
                           <option value="Neverver">Neverver</option>
                           <option value="Newar">Newar</option>
                           <option value="Nigerian Pidgin">Nigerian Pidgin</option>
                           <option value="North Efate (Nakanamanga)">North Efate (Nakanamanga)</option>
                           <option value="Nubian (Midob)">Nubian (Midob)</option>
                           <option value="Nubian (Nobiin)">Nubian (Nobiin)</option>
                           <option value="Nuer">Nuer</option>
                           <option value="Ojibwe">Ojibwe</option>
                           <option value="Ogiek (Akiek)">Ogiek (Akiek)</option>
                           <option value="Okinawan">Okinawan</option>
                           <option value="Oromo">Oromo</option>
                           <option value="Pashto">Pashto</option>
                           <option value="Persian (Farsi)">Persian (Farsi)</option>
                           <option value="Polish">Polish</option>
                           <option value="Punjabi">Punjabi</option>
                           <option value="Papiamento">Papiamento</option>
                           <option value="Pa'o">Pa'o</option>
                           <option value="Palauan">Palauan</option>
                           <option value="Quechua">Quechua</option>
                           <option value="Rohingya">Rohingya</option>
                           <option value="Romanian">Romanian</option>
                           <option value="Romani (Balkan)">Romani (Balkan)</option>
                           <option value="Romani (Sinte)">Romani (Sinte)</option>
                           <option value="Romani (Vlax)">Romani (Vlax)</option>
                           <option value="Romansch">Romansch</option>
                           <option value="Samoan">Samoan</option>
                           <option value="Sanskrit">Sanskrit</option>
                           <option value="Serbian">Serbian</option>
                           <option value="Sindhi">Sindhi</option>
                           <option value="Sinhala">Sinhala</option>
                           <option value="Sicilian">Sicilian</option>
                           <option value="Slovak">Slovak</option>
                           <option value="Slovenian">Slovenian</option>
                           <option value="Somali">Somali</option>
                           <option value="Swahili">Swahili</option>
                           <option value="Swedish">Swedish</option>
                           <option value="Scots">Scots</option>
                           <option value="Swiss German">Swiss German</option>
                           <option value="Syriac">Syriac</option>
                           <option value="Sa">Sa</option>
                           <option value="Saami (Kildin)">Saami (Kildin)</option>
                           <option value="Saami (Lule)">Saami (Lule)</option>
                           <option value="Saami (Northern)">Saami (Northern)</option>
                           <option value="Sardinian">Sardinian</option>
                           <option value="Sekani">Sekani</option>
                           <option value="Sena">Sena</option>
                           <option value="Sfyria">Sfyria</option>
                           <option value="Shan">Shan</option>
                           <option value="Sherpa">Sherpa</option>
                           <option value="Shona">Shona</option>
                           <option value="Shona (Ndau)">Shona (Ndau)</option>
                           <option value="Shoshoni">Shoshoni</option>
                           <option value="Shumashti">Shumashti</option>
                           <option value="Sign Language(Other)">Sign Language(Other)</option>
                           <option value="Silbo Gomero">Silbo Gomero</option>
                           <option value="Sotho">Sotho</option>
                           <option value="Sundanese">Sundanese</option>
                           <option value="Swazi">Swazi</option>
                           <option value="Swiss-French Sign Language">Swiss-French Sign Language</option>
                           <option value="Swiss-German Sign Language">Swiss-German Sign Language</option>
                           <option value="Tajik">Tajik</option>
                           <option value="Berber (Tamazight)">Berber (Tamazight)</option>
                           <option value="Tamil">Tamil</option>
                           <option value="Tatar">Tatar</option>
                           <option value="Telugu">Telugu</option>
                           <option value="Thai">Thai</option>
                           <option value="Tibetan">Tibetan</option>
                           <option value="Turkish">Turkish</option>
                           <option value="Turkmen">Turkmen</option>
                           <option value="Tutong">Tutong</option>
                           <option value="Toki Pona">Toki Pona</option>
                           <option value="Tamang">Tamang</option>
                           <option value="Tharu">Tharu</option>
                           <option value="Tigrinya">Tigrinya</option>
                           <option value="Tlingit">Tlingit</option>
                           <option value="Tongan">Tongan</option>
                           <option value="Tsonga (Xitsonga)">Tsonga (Xitsonga)</option>
                           <option value="Tswana">Tswana</option>
                           <option value="Tz’utujil">Tz’utujil</option>
                           <option value="Ukrainian">Ukrainian</option>
                           <option value="Urdu">Urdu</option>
                           <option value="Uyghur">Uyghur</option>
                           <option value="Uzbek">Uzbek</option>
                           <option value="Vietnamese">Vietnamese</option>
                           <option value="Venda">Venda</option>
                           <option value="Welsh">Welsh</option>
                           <option value="Wolof">Wolof</option>
                           <option value="Waray">Waray</option>
                           <option value="Wayuu">Wayuu</option>
                           <option value="Wyandot">Wyandot</option>
                           <option value="Xhosa">Xhosa</option>
                           <option value="Yakut">Yakut</option>
                           <option value="Yiddish">Yiddish</option>
                           <option value="Yoruba">Yoruba</option>
                           <option value="Yucatec Maya">Yucatec Maya</option>
                           <option value="Yola">Yola</option>
                           <option value="Yugoslavian Sign Language">Yugoslavian Sign Language</option>
                           <option value="Zhuang">Zhuang</option>
                           <option value="Zulu">Zulu</option>
                           <option value="Zaghawa (Beria)">Zaghawa (Beria)</option>
                           <option value="Zapotec">Zapotec</option>
                           <option value="Zarma">Zarma</option>
                           <option value="Zaza (Northern)">Zaza (Northern)</option>
                           <option value="Occitan">Occitan</option>
                           <option value="Odia">Odia</option>
                           <option value="Oneida">Oneida</option>
                     </select>
                     <select name="speak_lang_level3" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option selected="">A1: Beginner</option>
                        <option value="1">A2: Elementary</option>
                        <option value="2">B1: Intermediate</option>
                        <option value="3">B2: Upper Intermediate</option>
                        <option value="3">C1: Advanced</option>
                        <option value="3">C2: Proficient</option>
                     </select>
                     <div class="cont_check_box mg_top std_lea_mg">
                        <label class="checkbox small">
                        <input name="learning3" value="1" type="checkbox">
                        <span class="success"></span>
                        </label>
                        <label class="check_label size">Learning</label>
                     </div>
                     <div class="custom-control custom-radio mg_top_rad std_pro_m_left">
                        <input  name="primary3" value="1" type="radio" id="customRadio2"  class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Primary</label>
                        <!--  <i class="fas fa-times mar_left"></i> -->
                     </div>
                  </div>
               </div>
               <div class="std_basic_info">
                  <h4> Communication Tool</h4>
                  <div class="std_basic_input">
                     <select name="comm_tool" class="custom-select animations-select arrow_des Live" id="inputGroupSelect01" data-target="#animation-bottom">
                        <option selected="">Skype</option>
                        <!-- <option value="Google Hangout">Google Hangout</option>
                        <option value="Wechat">Wechat</option>
                        <option value="QQ">QQ</option>
                        <option value="FaceTime">FaceTime</option> -->
                     </select>
                     <input name="comm_id" type="text" placeholder="Communication id">
                  </div>
                  <!-- <a href="javascript:void(0);" class="add_comm std_comm">+ Add more</a> -->
               </div>
               <div class="std_basic_info">
                  <h4> Optional</h4>
                  <div class="std_basic_input introduction">
                     <div class="label_part">
                        <label>Introduction</label>
                     </div>
                     <textarea name="intro" rows="4" cols="70"></textarea>
                  </div>

               </div>
            </div>
            <div class="text-right">
               <input type="hidden" value="<?php echo $user_detail[0]['avatar']?>" name="avatar">
               <input type="hidden" name="user_id" value="<?php echo $user_detail[0]['id']?>">
               <input type="submit" name="" value="Save" class="change_photo std_save">
            </div>
</form>
<?php } ?>
         </div>
      </section>
      <script>
    //   add more languages
      $('#addlanguage').click(function(){
        $('#langcontainer').append(' <div class="std_basic_input"><div class="label_part"><label></label></div><select name="speak_lang[]" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom"><option selected=""><?php echo $sdetails['speak_lang3']?></option> <option value="Chinese (Mandarin)">Chinese (Mandarin)</option> <option value="French">French</option> <option value="Spanish">Spanish</option> <option value="Portuguese">Portuguese</option> <option value="Japanese">Japanese</option> <option value="Korean">Korean</option> <option value="Arabic">Arabic</option> <option value="Hindi">Hindi</option> <option value="Italian">Italian</option> <option value="Russian">Russian</option> <option value="Afrikaans">Afrikaans</option> <option value="Akan Twi">Akan Twi</option> <option value="Albanian">Albanian</option> <option value="American Sign Language (ASL)">American Sign Language (ASL)</option> <option value="Amharic">Amharic</option> <option value="Argentine Sign Language">Argentine Sign Language</option> <option value="Armenian">Armenian</option> <option value="Azeri">Azeri</option> <option value="Arabic (Egyptian)">Arabic (Egyptian)</option> <option value="Arabic (Gulf)">Arabic (Gulf)</option> <option value="Arabic (Modern Standard)">Arabic (Modern Standard)</option> <option value="Arabic(Sudanese)">Arabic(Sudanese)</option> <option value="Arabic (Maghrebi)">Arabic (Maghrebi)</option> <option value="Arabic (Levantine)">Arabic (Levantine)</option> <option value="Alsatian">Alsatian</option> <option value="Assamese">Assamese</option> <option value="Aiki (Kibet)">Aiki (Kibet)</option> <option value="Aiki (Runga)">Aiki (Runga)</option> <option value="Ainu">Ainu</option> <option value="Aragonese">Aragonese</option> <option value="Aramaic">Aramaic</option> <option value="Aromanian">Aromanian</option> <option value="Assiniboine (Nakota)">Assiniboine (Nakota)</option> <option value="Austrian German">Austrian German</option> <option value="Australian Sign Language (Auslan)">Australian Sign Language (Auslan)</option> <option value="Avar">Avar</option> <option value="Aymara">Aymara</option> <option value="Azerbaijani">Azerbaijani</option> <option value="Basque">Basque</option> <option value="Belait">Belait</option> <option value="Belarusian">Belarusian</option> <option value="Bengali">Bengali</option> <option value="Bosnian">Bosnian</option> <option value="Brazilian Sign Language (LIBRAS)">Brazilian Sign Language (LIBRAS)</option> <option value="British Sign Language (BSL)">British Sign Language (BSL)</option> <option value="Bulgarian">Bulgarian</option> <option value="Burmese">Burmese</option> <option value="Balochi">Balochi</option> <option value="Blackfoot (Niitsi powahsin)">Blackfoot (Niitsi powahsin)</option> <option value="Breton">Breton</option> <option value="Balinese">Balinese</option> <option value="Bago-Kusuntu">Bago-Kusuntu</option> <option value="Bagri">Bagri</option> <option value="Bambara (Bamanankan)">Bambara (Bamanankan)</option> <option value="Banjar">Banjar</option> <option value="Barawana (Baré)">Barawana (Baré)</option> <option value="Bari">Bari</option> <option value="Batak Toba">Batak Toba</option> <option value="Bats">Bats</option> <option value="Bavarian">Bavarian</option> <option value="Beja">Beja</option> <option value="Bhojpuri">Bhojpuri</option> <option value="Bislama">Bislama</option> <option value="Bugis">Bugis</option> <option value="Catalan">Catalan</option> <option value="Cebuano">Cebuano</option> <option value="Chinese (Cantonese)">Chinese (Cantonese)</option> <option value="Chinese (Hakka)">Chinese (Hakka)</option> <option value="Chinese (Hokkien)">Chinese (Hokkien)</option> <option value="Chinese (Shanghainese)">Chinese (Shanghainese)</option> <option value="Chinese (Taiwanese)">Chinese (Taiwanese)</option> <option value="Chinese (Other)">Chinese (Other)</option> <option value="Croatian">Croatian</option> <option value="Czech">Czech</option> <option value="Cornish">Cornish</option> <option value="Corsican">Corsican</option> <option value="Cree">Cree</option> <option value="Cherokee">Cherokee</option> <option value="Chewa (Chichewa)">Chewa (Chichewa)</option> <option value="Chavacano">Chavacano</option> <option value="Chechen">Chechen</option> <option value="Chibarwe">Chibarwe</option> <option value="Chiquitano">Chiquitano</option> <option value="Choctaw">Choctaw</option> <option value="Chukchi">Chukchi</option> <option value="Chuwabu">Chuwabu</option> <option value="Coptic">Coptic</option> <option value="Crow">Crow</option> <option value="Danish">Danish</option> <option value="Dutch">Dutch</option> <option value="Dzongkha">Dzongkha</option> <option value="Dari">Dari</option> <option value="Dothraki">Dothraki</option> <option value="Daakaka">Daakaka</option> <option value="Dakota">Dakota</option> <option value="Daza">Daza</option> <option value="Dela-Oenale">Dela-Oenale</option> <option value="Dinka">Dinka</option> <option value="Domari">Domari</option> <option value="Dotyali">Dotyali</option> <option value="Drehu">Drehu</option> <option value="Esperanto">Esperanto</option> <option value="Estonian">Estonian</option> <option value="Erzya">Erzya</option> <option value="Ewe">Ewe</option> <option value="Ewondo (Fang)">Ewondo (Fang)</option> <option value="Filipino (Tagalog)">Filipino (Tagalog)</option> <option value="Finnish">Finnish</option> <option value="Flemish">Flemish</option> <option value="Faroese">Faroese</option> <option value="Frisian">Frisian</option> <option value="Fijian (ITaukei)">Fijian (ITaukei)</option> <option value="Fon (Fon gbè)">Fon (Fon gbè)</option> <option value="Friulian">Friulian</option> <option value="Fulah">Fulah</option> <option value="Fur">Fur</option> <option value="Gaelic (Irish)">Gaelic (Irish)</option> <option value="Gaelic (Scottish)">Gaelic (Scottish)</option> <option value="Galician">Galician</option> <option value="Georgian">Georgian</option> <option value="Greek">Greek</option> <option value="Greek (Ancient)">Greek (Ancient)</option> <option value="Greenlandic">Greenlandic</option> <option value="Gujarati">Gujarati</option> <option value="Ga">Ga</option> <option value="Guarani">Guarani</option> <option value="Gaelic (Manx)">Gaelic (Manx)</option> <option value="Gallo">Gallo</option> <option value="Garifuna">Garifuna</option> <option value="Gikuyu">Gikuyu</option> <!-- <option value="Greenlandic">Greenlandic</option> --> <option value="Guambiano">Guambiano</option> <option value="Gullah">Gullah</option> <option value="Gullah (Afro-Seminole Creole)">Gullah (Afro-Seminole Creole)</option> <option value="Haitian Creole">Haitian Creole</option> <option value="Hausa">Hausa</option> <!-- <option value=""></option> --> <option value="Hebrew">Hebrew</option> <option value="Hmong">Hmong</option> <option value="Hungarian">Hungarian</option> <option value="Hawaiian Pidgin (Hawaiian Creole English)">Hawaiian Pidgin (Hawaiian Creole English)</option> <option value="Honduran Sign Language (LESHO)">Honduran Sign Language (LESHO)</option> <option value="Icelandic">Icelandic</option> <option value="Indonesian">Indonesian</option> <option value="Igbo">Igbo</option> <option value="Inuktitut">Inuktitut</option> <option value="Iban">Iban</option> <option value="Ingush">Ingush</option> <option value="International Sign (IS)">International Sign (IS)</option> <option value="Ido">Ido</option> <option value="Inuinnaqtun">Inuinnaqtun</option> <option value="Inuvialuktun">Inuvialuktun</option> <option value="Ixcatec">Ixcatec</option> <option value="Javanese">Javanese</option> <option value="Japanese (Okinawan)">Japanese (Okinawan)</option> <option value="Japanese Sign Language">Japanese Sign Language</option> <option value="Jamaican Creole">Jamaican Creole</option> <option value="Judeo-Tat">Judeo-Tat</option><option value="Kannada">Kannada</option> <option value="Kazakh">Kazakh</option> <option value="Kinyarwanda">Kinyarwanda</option> <option value="Khmer (Cambodian)">Khmer (Cambodian)</option> <option value="Klingon">Klingon</option> <option value="Kurdish">Kurdish</option> <option value="Kyrgyz">Kyrgyz</option> <option value="Kekchi (Qeqchi)">Kekchi (Qeqchi)</option> <option value="Kiche">Kiche</option> <option value="">Kachin (Jingpho)</option> <option value="Kachin (Jingpho)">Kalanga</option> <option value="Kalmyk Oirat">Kalmyk Oirat</option> <option value="Kanuri">Kanuri</option> <option value="Kenjeje">Kenjeje</option> <option value="Khmu">Khmu</option> <option value="Khoemana">Khoemana</option> <option value="Kirundi">Kirundi</option> <option value="Koisan (Tsoa)">Koisan (Tsoa)</option> <option value="Konkani">Konkani</option> <option value="Lao">Lao</option> <option value="Latin">Latin</option> <option value="Latvian">Latvian</option> <option value="Lithuanian">Lithuanian</option> <option value="Luo">Luo</option> <option value="Luxembourgish">Luxembourgish</option> <option value="Lakota">Lakota</option> <option value="Ladino (Judeo-Spanish)">Ladino (Judeo-Spanish)</option> <option value="Ladin">Ladin</option> <option value="Lau">Lau</option> <option value="Limburgish">Limburgish</option> <option value="Litzlitz (Naman)">Litzlitz (Naman)</option> <option value="Lombard">Lombard</option> <option value="Macedonian">Macedonian</option> <option value="Malagasy">Malagasy</option> <option value="Malay">Malay</option> <option value="Malayalam">Malayalam</option> <option value="Maltese">Maltese</option> <option value="Maori">Maori</option> <option value="Marathi">Marathi</option> <option value="Mongolian">Mongolian</option> <option value="Maasai">Maasai</option> <option value="Maithili">Maithili</option> <option value="Mamuju">Mamuju</option> <option value="Manchu">Manchu</option> <option value="Mandingo (Madinka)">Mandingo (Madinka)</option> <option value="Manggarai">Manggarai</option> <option value="Mapudungun">Mapudungun</option> <option value="Marri Ngarr">Marri Ngarr</option> <option value="Masalit">Masalit</option> <option value="Mekeo">Mekeo</option> <option value="Mexican Sign Language (LSM)">Mexican Sign Language (LSM)</option> <option value="Minangkabau">Minangkabau</option> <option value="Mingrelian">Mingrelian</option> <option value="Mirandese">Mirandese</option> <option value="Miyako">Miyako</option> <option value="Mon">Mon</option> <option value="Maloptionian (Dhivehi)">Maloptionian (Dhivehi)</option> <option value="Marshallese">Marshallese</option> <option value="Mauritian Creole">Mauritian Creole</option> <option value="Mazatec">Mazatec</option> <option value="Montenegrin">Montenegrin</option> <option value="Mnong">Mnong</option> <option value="Nahuatl">Nahuatl</option> <option value="Nepali">Nepali</option> <option value="Norwegian">Norwegian</option> <option value="Nambya">Nambya</option> <option value="Neapolitan (Napoletano)">Neapolitan (Napoletano)</option> <option value="Natchez">Natchez</option> <option value="Navajo (Diné bizaad)">Navajo (Diné bizaad)</option> <option value="Ndebele">Ndebele</option> <option value="Neverver">Neverver</option> <option value="Newar">Newar</option> <option value="Nigerian Pidgin">Nigerian Pidgin</option> <option value="North Efate (Nakanamanga)">North Efate (Nakanamanga)</option> <option value="Nubian (Midob)">Nubian (Midob)</option> <option value="Nubian (Nobiin)">Nubian (Nobiin)</option> <option value="Nuer">Nuer</option> <option value="Ojibwe">Ojibwe</option> <option value="Ogiek (Akiek)">Ogiek (Akiek)</option> <option value="Okinawan">Okinawan</option> <option value="Oromo">Oromo</option> <option value="Pashto">Pashto</option> <option value="Persian (Farsi)">Persian (Farsi)</option> <option value="Polish">Polish</option> <option value="Punjabi">Punjabi</option> <option value="Papiamento">Papiamento</option> <option value="Pao">Pao</option> <option value="Palauan">Palauan</option> <option value="Quechua">Quechua</option> <option value="Rohingya">Rohingya</option> <option value="Romanian">Romanian</option> <option value="Romani (Balkan)">Romani (Balkan)</option> <option value="Romani (Sinte)">Romani (Sinte)</option> <option value="Romani (Vlax)">Romani (Vlax)</option> <option value="Romansch">Romansch</option> <option value="Samoan">Samoan</option> <option value="Sanskrit">Sanskrit</option> <option value="Serbian">Serbian</option> <option value="Sindhi">Sindhi</option> <option value="Sinhala">Sinhala</option> <option value="Sicilian">Sicilian</option> <option value="Slovak">Slovak</option> <option value="Slovenian">Slovenian</option> <option value="Somali">Somali</option> <option value="Swahili">Swahili</option> <option value="Swedish">Swedish</option> <option value="Scots">Scots</option> <option value="Swiss German">Swiss German</option> <option value="Syriac">Syriac</option> <option value="Sa">Sa</option> <option value="Saami (Kildin)">Saami (Kildin)</option> <option value="Saami (Lule)">Saami (Lule)</option> <option value="Saami (Northern)">Saami (Northern)</option> <option value="Sardinian">Sardinian</option> <option value="Sekani">Sekani</option> <option value="Sena">Sena</option> <option value="Sfyria">Sfyria</option> <option value="Shan">Shan</option> <option value="Sherpa">Sherpa</option> <option value="Shona">Shona</option> <option value="Shona (Ndau)">Shona (Ndau)</option> <option value="Shoshoni">Shoshoni</option> <option value="Shumashti">Shumashti</option> <option value="Sign Language(Other)">Sign Language(Other)</option> <option value="Silbo Gomero">Silbo Gomero</option> <option value="Sotho">Sotho</option> <option value="Sundanese">Sundanese</option> <option value="Swazi">Swazi</option> <option value="Swiss-French Sign Language">Swiss-French Sign Language</option> <option value="Swiss-German Sign Language">Swiss-German Sign Language</option> <option value="Tajik">Tajik</option> <option value="Berber (Tamazight)">Berber (Tamazight)</option> <option value="Tamil">Tamil</option> <option value="Tatar">Tatar</option> <option value="Telugu">Telugu</option> <option value="Thai">Thai</option> <option value="Tibetan">Tibetan</option> <option value="Turkish">Turkish</option> <option value="Turkmen">Turkmen</option> <option value="Tutong">Tutong</option> <option value="Toki Pona">Toki Pona</option> <option value="Tamang">Tamang</option> <option value="Tharu">Tharu</option> <option value="Tigrinya">Tigrinya</option> <option value="Tlingit">Tlingit</option> <option value="Tongan">Tongan</option> <option value="Tsonga (Xitsonga)">Tsonga (Xitsonga)</option> <option value="Tswana">Tswana</option> <option value="Tz’utujil">Tz’utujil</option> <option value="Ukrainian">Ukrainian</option> <option value="Urdu">Urdu</option> <option value="Uyghur">Uyghur</option> <option value="Uzbek">Uzbek</option> <option value="Vietnamese">Vietnamese</option> <option value="Venda">Venda</option> <option value="Welsh">Welsh</option> <option value="Wolof">Wolof</option> <option value="Waray">Waray</option> <option value="Wayuu">Wayuu</option> <option value="Wyandot">Wyandot</option> <option value="Xhosa">Xhosa</option> <option value="Yakut">Yakut</option> <option value="Yiddish">Yiddish</option> <option value="Yoruba">Yoruba</option> <option value="Yucatec Maya">Yucatec Maya</option> <option value="Yola">Yola</option> <option value="Yugoslavian Sign Language">Yugoslavian Sign Language</option> <option value="Zhuang">Zhuang</option> <option value="Zulu">Zulu</option> <option value="Zaghawa (Beria)">Zaghawa (Beria)</option> <option value="Zapotec">Zapotec</option> <option value="Zarma">Zarma</option> <option value="Zaza (Northern)">Zaza (Northern)</option> <option value="Occitan">Occitan</option> <option value="Odia">Odia</option> <option value="Oneida">Oneida</option> </select> <select name="speak_lang_level3" class="custom-select animations-select arrow_des select_width Live" id="inputGroupSelect03" data-target="#animation-bottom"> <option selected=""><?php echo $sdetails['speak_lang_level3']?></option> <option value="A1: Beginner">A1: Beginner</option> <option value="A2: Elementary">A2: Elementary</option> <option value="B1: Intermediate">B1: Intermediate</option> <option value="B2: Upper Intermediate">B2: Upper Intermediate</option> <option value="C1: Advanced">C1: Advanced</option> <option value="C2: Proficient">C2: Proficient</option> </select> <div class="cont_check_box mg_top std_lea_mg"> <label class="checkbox small"> <?php if($sdetails['learning3'] == '1'){?> <input name="learning3" value="1" type="checkbox" checked> <span class="success"></span> <?php } else{ ?> <input name="learning3" value="1" type="checkbox"> <span class="success"></span> <?php }?> </label> <label class="check_label size">Learning</label> </div> <div class="custom-control custom-radio mg_top_rad std_pro_m_left"> <?php if($sdetails['primary3'] == '1'){?> <input name="primary3" value="0" type="checkbox" id="customRadio1" class="custom-control-input" checked> <?php } else{ ?> <input name="primary3" value="1" type="checkbox" id="customRadio1" class="custom-control-input"> <?php }?> <label class="custom-control-label" for="customRadio1">Primary</label> </div> </div>');
        });    
    // image preview
        
        $('#editimg').change( function(event) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $("#disp_tmp_path").html(tmppath);
            $("#imgprev").attr("src",tmppath);
        });
      </script>
      
      
      