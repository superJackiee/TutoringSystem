   <!--------------------------- user section start here ---------------------------->
   <section class="user_section">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-4">
      				<div class="person_detail basic_info pading_top_bottom">
      					<div id="accordion">
                       <div class="card ctm_card">
                         <div class="card-header ctm_card_header" id="headingOne">
                           <div class="mb-0 ctm_btn_sec" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <h6> Teacher Information</h6>
                                   <img src="images/arrow_down.svg" alt=" " width="8">
                           </div>
                         </div>
                         <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                           <div class="card-body ctm_card_body">

                                 <ul  id="tabs-nav">
                                    <li>
                                      
                                       <a href="#basic_link" ><i class="fas fa-circle size_circle"></i> Basic Information</a>
                                    <li>
                                       <a href="#private_link"><i class="fas fa-circle size_circle"></i> Private Information</a>
                                    </li>
                                    <li><a href="#communication_link"><i class="fas fa-circle size_circle"></i> Communication Tools</a></li>
                                 </ul>

                           </div>
                         </div>
                       </div>
                       <div class="card ctm_card">
                         <div class="card-header ctm_card_header" id="headingTwo">
                           <div class="mb-0 ctm_btn_sec" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              <h6> Teacher Profile </h6>
                                   <img src="images/arrow_down.svg" alt=" " width="8">
                           </div>
                         </div>
                         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                           <div class="card-body ctm_card_body">
                                 <ul>
                                    <li><a href="javascript:void(0);"><i class="fas fa-circle size_circle"></i> Introduction</a></li>
                                    <li><a href="javascript:void(0);"><i class="fas fa-circle size_circle"></i> Contact Form </a></li>
                                    <li><a href="javascript:void(0);"><i class="fas fa-circle size_circle"></i> Video</a></li>
                                    <li><a href="javascript:void(0);"><i class="fas fa-circle size_circle"></i> Languages</a></li>
                                    <li><a href="javascript:void(0);"><i class="fas fa-circle size_circle"></i> Resume and Certificates</a></li>

                                 </ul>
                           </div>
                         </div>
                       </div>
                       <div class="card ctm_card">
                         <div class="card-header ctm_card_header" id="headingThree">
                           <div class="mb-0 ctm_btn_sec" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">   
                               <h6> Lessons and Availability </h6>
                             <img src="images/arrow_down.svg" alt=" " width="8">
                           </div>
                         </div>
                         <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                           <div class="card-body ctm_card_body">
                                 <ul id="tabs-nav">
                                    <li><a href="#lesson_link"> <i class="fas fa-circle size_circle"></i>Lesson Management</a></li>
                                    <li><a href="#availability_link"> <i class="fas fa-circle size_circle "></i> Availability Settings </a></li>
                                    <li><a href="#teacher_link"> <i class="fas fa-circle size_circle"></i> Teacher Calendar</a></li>
                                   

                                 </ul>
                           </div>
                         </div>
                       </div>
                        <div class="card ctm_card">
                         <div class="card-header ctm_card_header">
                           <div class="mb-0 ctm_btn_sec">
                             <input type="submit" name="" value="Withdraw" class="withdraw_btn">
                           </div>
                         </div>
                       </div>
                       <div class="card ctm_card">
                         <div class="card-header ctm_card_header border_none">
                           <div class="mb-0 ctm_btn_sec">
                             <input type="submit" name="" value="View Profile" class="view_profile">
                           </div>
                         </div>
                       </div>
                     </div>
      				
      				
      				</div>
      			</div>

  <!------------------------------- basic info start -------------------> 

      			<div class="col-md-8" id="tabs-content">
      				<div class="profile_right_sec tab-content" id="basic_link">
      					<div class="person_detail profile_right_part  basic_information">
      							<div class="profile_name pro_rgt_prt_head basic_info_header">
      								<h3>Basic Information</h3>
      							</div>
      							<hr>
                           <div class="basic_info_profile">
                              <ul>
                                 <li>
                                    <div class="profile_image">
                                    <a href="javascript:void(0);">   <img src="images/profile.jpg" alt="Profile"></a>
                                    </div>
                                 </li>
                                 <li class="line">
                                 </li>
                                 <li>
                                    <ul class="p_margin_bottom">
                                    <li><p> <i class="fas fa-circle size_circle"></i> At least 500 x 500 pixels</p></li>
                                    <li><p> <i class="fas fa-circle size_circle "></i> JPG, PNG and BMP formats only </p></li>
                                    <li><p> <i class="fas fa-circle size_circle"></i> Maximum size of 2MB</p></li>
                                   <li><p> <i class="fas fa-circle size_circle"></i> Complete requirements list</p></li>
                                   <input class="change_photo" type="button" name="" value="Change Photo">
                                 </ul>
                                 </li>
                              </ul>
                           </div>
                                 <form class="basic_info_form">
                                    <div class="row form_row">
                                    <div class="form-group col-md-12">
                                     <label>Display Name</label>
                                     <input type="text" class="form-control"  placeholder="Name">
                                   </div>
                                     <div class="form-group col-md-6 ">
                                       <label>From</label>
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect01" data-target="#animation-bottom">
                                          <option selected="">Afghanistan</option>
                                          <option value="1">Algeria</option>
                                          <option value="2">Albania</option>
                                          <option value="3">American Samoa</option>
                                          <option value="3">Angola</option>
                                          <option value="3">Anguilla</option>
                                          <option value="3">Argentina</option>
                                       </select>
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label></label>
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect02" data-target="#animation-bottom">
                                          <option selected="">Adelaide</option>
                                          <option value="1">Brisbane</option>
                                          <option value="2">Cairns</option>
                                          <option value="3">Canberra-Queanbeyan</option>
                                          <option value="3">Gold Coast-Tweed Heads</option>
                                          <option value="3">Gosford</option>
                                          <option value="3">Melbourne</option>
                                       </select>
                                     </div>
                                     <div class="form-group col-md-6">
                                       <label>Living in</label>
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                          <option selected="">Afghanistan</option>
                                          <option value="1">Algeria</option>
                                          <option value="2">Albania</option>
                                          <option value="3">American Samoa</option>
                                          <option value="3">Angola</option>
                                          <option value="3">Anguilla</option>
                                          <option value="3">Argentina</option>
                                       </select>
                                     </div>
                                     <div class="form-group col-md-6">
                                       <label></label>
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect04" data-target="#animation-bottom">
                                          <option selected="">Adelaide</option>
                                          <option value="1">Brisbane</option>
                                          <option value="2">Cairns</option>
                                          <option value="3">Canberra-Queanbeyan</option>
                                          <option value="3">Gold Coast-Tweed Heads</option>
                                          <option value="3">Gosford</option>
                                          <option value="3">Melbourne</option>
                                       </select>
                                     </div>
                                     <div class="form-group col-md-12">
                                       <label>Time Zone</label>
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect05" data-target="#animation-bottom">
                                          <option selected="">(UTC-12:00) International Date Line West</option>
                                          <option value="1">(UTC-10:00) Hawaii</option>
                                          <option value="2">(UTC-08:00) Pacific Time (US &amp; Canada)</option>
                                          <option value="3">(UTC-07:00) Mountain Time (US &amp; Canada)</option>
                                          <option value="3">UTC-02:00) Coordinated Universal Time-02</option>
                                       </select>
                                     </div>
                                     <div class="border_hor"></div>
                                      <div class="form-group  col-md-12 save_btn_part">
                                       <p class="color_green"> <i class="fas fa-circle size_circle color_green "></i>Approved</p>
                                       <input type="submit" name="" value="Save" class="change_photo save">
                                     </div>
                                 </div>
                                 </form>
      					</div>
      				</div>
                        <!------------------------------- basic info end ------------------->


                  <!------------------------------- private_info ------------------->

                  <div class="person_detail profile_right_part private_info tab-content" id="private_link">
                           <div class="profile_name pro_rgt_prt_head basic_info_header private_info_header">
                              <h3>Private</h3>
                              <hr>
                              <p class="text-left">Please fill in the information below. This information is used for internal security purposes and will not be shared publicly. Information provided here must match your personal details for your payment withdrawal method of choice.</p>
                           </div>
                                 <form class="basic_info_form">
                                    <div class="row form_row">
                                     <div class="form-group col-md-6 ">
                                       <label>First Name</label>
                                       <input type="text" class="form-control" placeholder="First Name">
                                     </div>
                                     <div class="form-group col-md-6 ">
                                       <label>Last Name</label>
                                       <input type="text" class="form-control" placeholder="Last Name">
                                     </div>
                                     <div class="form-group col-md-3">
                                       <label>Birthday</label>
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                          <option selected="">1987</option>
                                          <option value="1">1986</option>
                                          <option value="2">1985</option>
                                          <option value="3">1984</option>
                                          <option value="3">1983</option>
                                          <option value="3">1982</option>
                                          <option value="3">1981</option>
                                       </select>
                                     </div>
                                     <div class="form-group col-md-3">
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                          <option selected="">1</option>
                                          <option value="1">2</option>
                                          <option value="2">3</option>
                                          <option value="3">4</option>
                                          <option value="3">5</option>
                                          <option value="3">6</option>
                                          <option value="3">7</option>
                                       </select>
                                     </div>
                                     <div class="form-group col-md-2">  
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                          <option selected="">11</option>
                                          <option value="1">12</option>
                                          <option value="2">13</option>
                                          <option value="3">14</option>
                                          <option value="3">15</option>
                                          <option value="3">16</option>
                                          <option value="3">17</option>
                                       </select>
                                     </div>
                                     <div class="form-group col-md-4">
                                       <label>Gender</label>
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                          <option selected="">Male</option>
                                          <option selected="">Female</option>
                                          <option selected="">Not given</option>  
                                       </select>
                                     </div>
                                     <div class="form-group col-md-12">
                                       <label>Street Address</label>
                                       <input type="text" name="" class="form-control" placeholder="Street Address">
                                     </div>
                                     <div class="border_hor"></div>
                                      <div class="form-group  col-md-12 save_btn_part">
                                       <p class="color_green"> <i class="fas fa-circle size_circle color_green "></i>Approved</p>
                                       <input type="submit" name="" value="Save" class="change_photo save">
                                     </div>
                                 </div>
                                 </form>
                     </div>

                      <!------------------------------- private_info end  -------------------> 

   <!--------------------------------------- Communication Tools ------------------------------------>

                                 <div class="person_detail profile_right_part private_info tab-content" id="communication_link">
                           <div class="profile_name pro_rgt_prt_head basic_info_header private_info_header">
                              <h3>Communication Tools</h3> 
                           </div>
                            <hr>
                                 <form class="basic_info_form">
                                    <div class="row form_row">
                                   <div class="form-group col-md-6">
                                       <label>Preferred IM/Chat</label>
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                          <option selected="">Google Hangouts</option>
                                          <option value="1">Skype</option>
                                          <option value="2">Wechat</option>
                                          <option value="3">QQ</option>
                                          <option value="3">FaceTime</option>
                                       </select>
                                     </div>
                                     <div class="form-group col-md-6">
                                       <label>User Account ID</label>
                                       <input type="text" name="" class="form-control" placeholder="User Account ID">
                                     </div>
                                     <a href="javascript:void(0);" class="add_comm">+ Add a communication tool</a>
                                     <div class="border_hor"></div>
                                      <div class="form-group  col-md-12 save_btn_part">
                                       <p class="color_green"> <i class="fas fa-circle size_circle color_green "></i>Approved</p>
                                       <input type="submit" name="" value="Save" class="change_photo save">
                                     </div>
                                 </div>
                                 </form>
                     </div>

                     <!--------------------------------------- Communication Tools end ------------------------------------>

                      <!------------------------------- Lesson Management start ------------------->

                  <div class="person_detail profile_right_part private_info tab-content" id="lesson_link">
                           <div class="profile_name pro_rgt_prt_head basic_info_header private_info_header">
                              <h3>Lesson Management</h3>
                           </div>
                            <hr>
                            <div class="lesson_part">
                                  <h5>Lessons</h5>
                              <ul>
                                 <li class="lesson_card">
                                    <div class="green_dot"></div>
                                    <div class="lesson_card_text">
                                       <div class="lesson_text">
                                          <h6>General English - Conversation and Exercises</h6>
                                          <div class="redbar black lesson_bar"></div>
                                          <p>General • English • $20 USD / H</p>
                                       </div>
                                        <div class="lesson_icon">
                                         <a href="javascript:void(0);"> <img src="images/edit.svg" alt="Edit"> </a>
                                         <a href="javascript:void(0);"> <img src="images/remove.svg" alt="Remove"> </a>
                                       </div>
                                    </div>
                                   
                                 </li>

                                 <li class="lesson_card">
                                    <div class="green_dot"></div>
                                    <div class="lesson_card_text">
                                       <div class="lesson_text">
                                          <h6>Conversation in English (Advanced)</h6>
                                          <div class="redbar black lesson_bar"></div>
                                          <p>General • English • $20 USD / H</p>
                                       </div>
                                        <div class="lesson_icon">
                                        <a href="javascript:void(0);">  <img src="images/edit.svg" alt="Edit"></a>
                                          <a href="javascript:void(0);"> <img src="images/remove.svg" alt="Remove"> </a>
                                       </div>
                                    </div>
                                   
                                 </li>

                                 <li class="lesson_card">
                                    <div class="green_dot"></div>
                                    <div class="lesson_card_text">
                                       <div class="lesson_text">
                                          <h6>English for native Mandarin and Cantonese speakers</h6>
                                          <div class="redbar black lesson_bar"></div>
                                          <p>General • English • $20 USD / H</p>
                                       </div>
                                        <div class="lesson_icon">
                                         <a href="javascript:void(0);"> <img src="images/edit.svg" alt="Edit"> </a>
                                        <a href="javascript:void(0);">  <img src="images/remove.svg" alt="Remove"> </a>
                                       </div>
                                    </div>
                                   
                                 </li>

                                 <li class="lesson_card">
                                    <div class="green_dot"></div>
                                    <div class="lesson_card_text">
                                       <div class="lesson_text">
                                          <h6>English for native Polish speakers</h6>
                                          <div class="redbar black lesson_bar"></div>
                                          <p>General • English • $20 USD / H</p>
                                       </div>
                                        <div class="lesson_icon">
                                         <a href="javascript:void(0);"> <img src="images/edit.svg" alt="Edit"></a>
                                       <a href="javascript:void(0);"> <img src="images/remove.svg" alt="Remove"> </a>
                                       </div>
                                    </div>
                                   
                                 </li>

                                 <li class="lesson_card">
                                    <div class="green_dot"></div>
                                    <div class="lesson_card_text">
                                       <div class="lesson_text">
                                          <h6>English for native Spanish speakers</h6>
                                          <div class="redbar black lesson_bar"></div>
                                          <p>General • English • $20 USD / H</p>
                                       </div>
                                        <div class="lesson_icon">
                                         <a href="javascript:void(0);"> <img src="images/edit.svg" alt="Edit"></a>
                                        <a href="javascript:void(0);">  <img src="images/remove.svg" alt="Remove"></a>
                                       </div>
                                    </div>
                                   
                                 </li>

                                 <li class="lesson_card">
                                    <div class="green_dot"></div>
                                    <div class="lesson_card_text">
                                       <div class="lesson_text">
                                          <h6>Business English</h6>
                                          <div class="redbar black lesson_bar"></div>
                                          <p>General • English • $20 USD / H</p>
                                       </div>
                                        <div class="lesson_icon">
                                         <a href="javascript:void(0);"> <img src="images/edit.svg" alt="Edit"></a>
                                         <a href="javascript:void(0);"> <img src="images/remove.svg" alt="Remove"></a>
                                       </div>
                                    </div>
                                   
                                 </li>
                                 <a href="javascript:void(0);" class="add_comm creatt_lesson">+ Create a Lesson</a>
                              </ul>
                              <hr>
                                <h5>Trial Lesson</h5>
                              <ul>
                                 <li class="lesson_card">
                                    <div class="green_dot"></div>
                                    <div class="lesson_card_text">
                                       <div class="lesson_text">
                                          <h6>Trial Lesson</h6>
                                          <div class="redbar black lesson_bar"></div>
                                          <p>$5 USD / 30 min</p>
                                       </div>
                                        <div class="lesson_icon">
                                          <a href="javascript:void(0);"><img src="images/edit.svg" alt="Edit"></a>
                                        </div>
                                    </div>
                                 </li>
                              </ul>


                            </div>
                     </div>

                      <!------------------------------- Lesson Management end  -------------------> 

                      <!--------------------------------------- Availability Settings ------------------------------------>

                        <div class="person_detail profile_right_part private_info tab-content" id="availability_link">
                           <div class="profile_name pro_rgt_prt_head basic_info_header private_info_header">
                              <h3>Availability Settings</h3> 
                           </div>
                            <hr>
                                 <form class="basic_info_form availab_form">
                                  <h6>Lesson Requests</h6>
                                    <div class="row form_row availab_row ">
                                   <div class="form-group col-md-6">
                                       <label>Allow lesson requests from:</label>
                                     </div>
                                     <div class="form-group col-md-4">
                                       <select class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                          <option selected="">All students</option>
                                          <option value="1">Current Students</option>
                                          <option value="2">Nobody</option>
                                       </select>
                                     </div>

                                  </div>
                                  <hr>
                                  <h6>Instant Booking</h6>
                                  <div class="row form_row availab_row inst_book">
                                     <div class="form-group col-md-12">
                                       <p>Your Instant Booking privileges have been disabled because you were absent from 2 or more lessons. For further details, please contact us at support@mylanguagepro.com.</p>
                                     </div>
                                     <div class="form-group col-md-6">
                                       <label>Allow Instant Booking</label>
                                     </div>
                                     <div class="form-group col-md-6">
                                          <label class="switch">
                                              <input type="checkbox" class="success">
                                              <span class="slider round"></span>
                                         </label>
                                     </div>
                                     <div class="form-group col-md-6">
                                       <label>Automatically accept lesson requests from:</label>
                                     </div>
                                     <div class="form-group col-md-6">
                                             <label class="checkbox">
                                                 <input type="checkbox" />
                                                 <span class="success"></span>
                                             </label>
                                             <label class="check_label">New Students</label>
                                        </div>
                                         <div class="form-group col-md-6">
                                         </div>
                                          <div class="form-group col-md-6">   
                                             <label class="checkbox">
                                                 <input type="checkbox" />
                                                 <span class="success"></span>
                                             </label>
                                             <label class="check_label">Current Students</label>
                                     </div>
                                     <div class="border_hor"></div>
                                      <div class="form-group  col-md-12 save_btn_part">
                                       <p></p>
                                       <input type="submit" name="" value="Save" class="change_photo save">
                                     </div>
                                </div>

                                 </form>
                     </div>

            <!--------------------------------------- Availability Settings end ------------------------------------>




             <!--------------------------------------- Teacher Calendar start ------------------------------------>

                                 <div class="person_detail profile_right_part private_info tab-content" id="teacher_link">
                           <div class="profile_name pro_rgt_prt_head basic_info_header private_info_header">
                              <h3>Teacher Calendar</h3> 
                              <p>This is your calendar. You can set specific dates and times when you are available.</p>
                           </div>
                                 <div class="calendar_sec">
                                    <div class="calender_row">
                                       <div class="calendar_month">
                                          <ul>
                                             <li><a href="javascript:void(0);"><img src="images/arrow_left.svg" alt="arrow_right" height="18"></a></li>
                                             <li class="month_year">April 2020</li>
                                             <li><a href="javascript:void(0);"><img src="images/arrow_right.svg" alt="arrow_right" height="18"></a></li>
                                          </ul>
                                          <div class="btn_today">
                                              <input type="button" name="" value="Today" class="today">
                                          </div>
                                          
                                       </div>
                                    </div>
                                    <div class="calender_row">
                                       <div class="calendar_day">
                                             <div>Sunday</div>
                                             <div>Monday</div>
                                             <div>Tuesday</div>
                                             <div>Wednesday</div>
                                             <div>Thursday</div>
                                             <div>Friday</div>
                                             <div>Saturday</div>
                                       </div>
                                    </div>
                                     <div class="calender_row">
                                       <div class="calendar_date">
                                             <div><p>29<p></div>
                                             <div><p>30</p></div>
                                             <div><p>31</p></div>
                                             <div><p>1</p></div>
                                             <div><p>2</p></div>
                                             <div><p>3</p></div>
                                             <div><p>4</p></div>
                                       </div>
                                       <div class="calendar_date">
                                          <div><p>5<p></div>
                                             <div><p>6</p></div>
                                             <div><p>7</p></div>
                                             <div><p>8</p></div>
                                             <div><p>9</p></div>
                                             <div><p>10</p></div>
                                             <div><p>11</p></div>
                                       </div>
                                       <div class="calendar_date">
                                          <div><p>12<p></div>
                                             <div><p>13</p></div>
                                             <div><p>14</p></div>
                                             <div><p>15</p></div>
                                             <div><p>16</p></div>
                                             <div><p>14</p></div>
                                             <div><p>18</p></div>
                                       </div>
                                       <div class="calendar_date">
                                          <div><p>19<p></div>
                                             <div><p>20</p></div>
                                             <div><p>21</p></div>
                                             <div><p>22</p></div>
                                             <div><p>23</p></div>
                                             <div><p>24</p></div>
                                             <div><p>25</p></div>
                                       </div>
                                       <div class="calendar_date">
                                          <div><p>26<p></div>
                                             <div><p>27</p></div>
                                             <div><p>28</p></div>
                                             <div><p>29</p></div>
                                             <div><p>30</p></div>
                                             <div><p>1</p></div>
                                             <div><p>2</p></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="calender_bottom">
                                    <ul>
                                       <li>
                                    <p>Based on your timezone (UTC+02:00)</p>
                                 </li>
                                 <li>
                                    <input type="submit" name="" value="Calendar Cleanup" class="change_photo cal_fotr_btn">
                                    <input type="submit" name="" value="Turn on Vacation" class="change_photo cal_fotr_btn">
                                 </li>
                              </ul>
                                 </div>
                     </div>

                     <!--------------------------------------- Teacher Calendar  end ------------------------------------>




                  </div>
      			</div>
      		</div>
      	</div>
      </section>



      <!--------------------------- user section end here ---------------------------->

      