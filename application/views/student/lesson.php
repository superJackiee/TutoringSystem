              <!---------------------------- min header strat-------------------------->
        <div class="min_header">
             <?php if($this->session->flashdata('success')){ ?>

            <div class="alert alert-success text-center" style='width:100%;'>

                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                <p><?php echo $this->session->flashdata('success'); ?></p>

            </div>

        <?php } ?>
         <div class="container">
                        <div class="site_menu text-left">
                             <ul class="text_center min_header_part ">
                                <!-- <li class="id_add_min_head">All</li> -->
                                 <li class="cat_1">Action Required</li>
                                 <!--<li class="cat_2">Upcoming </li>-->
                                 <!--<li class="cat_3">Waiting</li>-->
                                 <li class="cat_4">Completed</li>
                                 <!--<li class="cat_5">Canceled</li>-->
                             </ul>
                        </div>
         </div>         
      </div>


      <!--------------------------- profile start here ---------------------------->
      <section class="user_section profile_sec">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                 
      <!--------------------------------- Action Required start  --------------------------------->

             <div class="all_rew_item" data-project-cat="Action Required">
                    <?php
                    foreach($lesson as $lessons){ 
                        if($lessons['book_status'] == '0' && $lessons['payment_status'] == '1'){
                        ?>  
                         <a href="javascript:void(0)">
                                <div class="all_rew_part" style="margin-top: 0">
                                    <div class="all_rew_titel">
                                    <p>Mark as completed</p>
                                    </div>
                                    <div class="all_rew_date_time">

                                    <ul>
                                        <li>
                                            <h4><?php echo date('d', strtotime($lessons['date'])); ?> </h4><h6><?php echo date('M', strtotime($lessons['date'])); ?></h6>
                                        </li>
                                        <li class="border_horigantel"></li>
                                        <li>
                                            <h3><?php echo $lessons['from_time']; ?></h3>
                                            <p><?php echo $lessons['language_taught']; ?> - <?php echo $lessons['lesson_time']; ?> min</p>
                                        </li>
                                    </ul>

                                    <ul>
                                        <form method='post' action='<?php echo base_url('student/complete_course') ?>'>
                                            <li>
                                                <input type='hidden' name='booking_id' value='<?= $lessons['booking_id'] ?>' />
                                                <button class="sub_btn login act_book_now" > Mark as completed</button>
                                            </li>
                                        </form>
                                    </ul>

                                    </div>
                                </div>
                             </a>
                      
                      
                            <!-- <div class="action_rew_part">    
                            <ul>
                                <li>
                                <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M42.4482 19.7422H49.3186L48.3958 20.665H42.4482V19.7422ZM42.7382 53.8853H25.616L24.6933 54.8081H43.3966C43.158 54.5156 42.938 54.2074 42.7382 53.8853ZM51.1165 40.5529C51.4293 40.5856 51.7372 40.6348 52.0393 40.6995V27.4617L51.1165 28.3845V40.5529ZM21.5873 20.8359V47.4738L20.6646 48.3966V20.8359C20.6646 20.2317 21.1557 19.7422 21.7604 19.7422H28.6064V20.665H21.7603C21.6646 20.665 21.5873 20.742 21.5873 20.8359Z" fill="#BFBFBF"></path><path d="M56.7883 38.9849C56.6082 38.8047 56.6082 38.5126 56.7883 38.3324C56.9685 38.1522 57.2607 38.1522 57.4408 38.3324L60.2092 41.1008C60.3894 41.2809 60.3894 41.5731 60.2092 41.7533C60.029 41.9335 59.7369 41.9335 59.5567 41.7533L56.7883 38.9849Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M41.8467 24.356C42.3886 24.356 42.8114 23.891 42.8114 23.3409V18.9115C42.8114 18.3615 42.3886 17.8965 41.8467 17.8965H29.0115C28.4696 17.8965 28.0468 18.3615 28.0468 18.9115V23.3409C28.0468 23.891 28.4696 24.356 29.0115 24.356H41.8467ZM41.8886 18.9116V23.3409C41.8886 23.3999 41.8584 23.4332 41.8467 23.4332H29.0116C28.9999 23.4332 28.9696 23.3999 28.9696 23.3409V18.9116C28.9696 18.8526 28.9999 18.8193 29.0116 18.8193H41.8467C41.8584 18.8193 41.8886 18.8526 41.8886 18.9116Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M50.1937 58.4987C55.2901 58.4987 59.4216 54.3672 59.4216 49.2708C59.4216 44.1744 55.2901 40.043 50.1937 40.043C45.0973 40.043 40.9658 44.1744 40.9658 49.2708C40.9658 54.3672 45.0973 58.4987 50.1937 58.4987ZM50.1937 40.9658C54.7804 40.9658 58.4987 44.6841 58.4987 49.2708C58.4987 53.8576 54.7804 57.5759 50.1937 57.5759C45.6069 57.5759 41.8886 53.8576 41.8886 49.2708C41.8886 44.6841 45.6069 40.9658 50.1937 40.9658Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M74 37C74 57.4346 57.4346 74 37 74C28.1837 74 20.0878 70.9167 13.7316 65.7696L14.3878 65.1133C20.5739 70.0953 28.4386 73.0772 37 73.0772C56.9249 73.0772 73.0772 56.9249 73.0772 37C73.0772 28.4386 70.0951 20.5738 65.1129 14.3876L65.7691 13.7314C70.9165 20.0876 74 28.1837 74 37ZM59.9215 9.13884C53.6892 4.00554 45.7046 0.922786 37 0.922786C17.0746 0.922786 0.922798 17.0748 0.922798 37C0.922798 45.7049 4.00558 53.6896 9.139 59.922L8.48351 60.5775C3.18452 54.1757 0 45.9598 0 37C0 16.5652 16.5649 0 37 0C45.9595 0 54.1752 3.18449 60.577 8.48335L59.9215 9.13884Z" fill="#BFBFBF"></path><path d="M66.3679 7.26014C66.5481 7.07995 66.8402 7.07995 67.0204 7.26014C67.2006 7.44032 67.2006 7.73246 67.0204 7.91265L7.98821 66.9456C7.80803 67.1258 7.51589 67.1258 7.3357 66.9456C7.15552 66.7654 7.15551 66.4733 7.3357 66.2931L66.3679 7.26014Z" fill="#BFBFBF"></path></svg></li>
                                <li><a href="<?php echo base_url('find-teachers')?>" class="sub_btn login act_book_now" > BOOK NOW</a></li>
                            </ul>
                             </div> -->
                    <?php }} ?>
                    

                  </div>

      <!--------------------------------- Action Required end  --------------------------------->


        <!---------------------------------  upcoming start  --------------------------------->
                <div class="action_rew_part all_rew_item" data-project-cat="Upcoming . 0" style="display: none;">
                    <ul>
                    <li>
                        <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M42.4482 19.7422H49.3186L48.3958 20.665H42.4482V19.7422ZM42.7382 53.8853H25.616L24.6933 54.8081H43.3966C43.158 54.5156 42.938 54.2074 42.7382 53.8853ZM51.1165 40.5529C51.4293 40.5856 51.7372 40.6348 52.0393 40.6995V27.4617L51.1165 28.3845V40.5529ZM21.5873 20.8359V47.4738L20.6646 48.3966V20.8359C20.6646 20.2317 21.1557 19.7422 21.7604 19.7422H28.6064V20.665H21.7603C21.6646 20.665 21.5873 20.742 21.5873 20.8359Z" fill="#BFBFBF"></path><path d="M56.7883 38.9849C56.6082 38.8047 56.6082 38.5126 56.7883 38.3324C56.9685 38.1522 57.2607 38.1522 57.4408 38.3324L60.2092 41.1008C60.3894 41.2809 60.3894 41.5731 60.2092 41.7533C60.029 41.9335 59.7369 41.9335 59.5567 41.7533L56.7883 38.9849Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M41.8467 24.356C42.3886 24.356 42.8114 23.891 42.8114 23.3409V18.9115C42.8114 18.3615 42.3886 17.8965 41.8467 17.8965H29.0115C28.4696 17.8965 28.0468 18.3615 28.0468 18.9115V23.3409C28.0468 23.891 28.4696 24.356 29.0115 24.356H41.8467ZM41.8886 18.9116V23.3409C41.8886 23.3999 41.8584 23.4332 41.8467 23.4332H29.0116C28.9999 23.4332 28.9696 23.3999 28.9696 23.3409V18.9116C28.9696 18.8526 28.9999 18.8193 29.0116 18.8193H41.8467C41.8584 18.8193 41.8886 18.8526 41.8886 18.9116Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M50.1937 58.4987C55.2901 58.4987 59.4216 54.3672 59.4216 49.2708C59.4216 44.1744 55.2901 40.043 50.1937 40.043C45.0973 40.043 40.9658 44.1744 40.9658 49.2708C40.9658 54.3672 45.0973 58.4987 50.1937 58.4987ZM50.1937 40.9658C54.7804 40.9658 58.4987 44.6841 58.4987 49.2708C58.4987 53.8576 54.7804 57.5759 50.1937 57.5759C45.6069 57.5759 41.8886 53.8576 41.8886 49.2708C41.8886 44.6841 45.6069 40.9658 50.1937 40.9658Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M74 37C74 57.4346 57.4346 74 37 74C28.1837 74 20.0878 70.9167 13.7316 65.7696L14.3878 65.1133C20.5739 70.0953 28.4386 73.0772 37 73.0772C56.9249 73.0772 73.0772 56.9249 73.0772 37C73.0772 28.4386 70.0951 20.5738 65.1129 14.3876L65.7691 13.7314C70.9165 20.0876 74 28.1837 74 37ZM59.9215 9.13884C53.6892 4.00554 45.7046 0.922786 37 0.922786C17.0746 0.922786 0.922798 17.0748 0.922798 37C0.922798 45.7049 4.00558 53.6896 9.139 59.922L8.48351 60.5775C3.18452 54.1757 0 45.9598 0 37C0 16.5652 16.5649 0 37 0C45.9595 0 54.1752 3.18449 60.577 8.48335L59.9215 9.13884Z" fill="#BFBFBF"></path><path d="M66.3679 7.26014C66.5481 7.07995 66.8402 7.07995 67.0204 7.26014C67.2006 7.44032 67.2006 7.73246 67.0204 7.91265L7.98821 66.9456C7.80803 67.1258 7.51589 67.1258 7.3357 66.9456C7.15552 66.7654 7.15551 66.4733 7.3357 66.2931L66.3679 7.26014Z" fill="#BFBFBF"></path></svg></li>

                        <li><a href="<?php echo base_url('find-teachers')?>" class="sub_btn login act_book_now" > BOOK NOW</a></li>
                    </ul>
                </div>

      <!--------------------------------- upcoming end  --------------------------------->


      <!---------------------------------  wating start  --------------------------------->
                <div class="all_rew_item" data-project-cat="Waiting" style="display: none;">
                <?php 
                
                        foreach($lesson as $lessons){ 
                            if($lessons['book_status'] !=0){
                        ?>  
                        <a href="javascript:void(0)">
                                <div class="all_rew_part" style="margin-top: 0">
                                    <div class="all_rew_titel">
                                    <p>Completed</p>
                                    </div>
                                    <div class="all_rew_date_time">

                                    <ul>
                                        <li>
                                            <h4><?php echo date('d', strtotime($lessons['date'])); ?> </h4><h6><?php echo date('M', strtotime($lessons['date'])); ?></h6>
                                        </li>
                                        <li class="border_horigantel"></li>
                                        <li>
                                            <h3><?php echo $lessons['from_time']; ?></h3>
                                            <p><?php echo $lessons['language_taught']; ?> - <?php echo $lessons['lesson_time']; ?> min</p>
                                        </li>
                                    </ul>

                                    <ul>
                                        <div class="profile_image all_rew_pro">
                                            <img src="<?php echo base_url($lessons['avatar']); ?>" alt="Profile">
                                        </div>
                                    </ul>

                                    </div>
                                </div>
                             </a>
                      
                        <?php }}?>
                    <!-- <div class="action_rew_part">  
                      <ul>
                         <li>
                           <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M42.4482 19.7422H49.3186L48.3958 20.665H42.4482V19.7422ZM42.7382 53.8853H25.616L24.6933 54.8081H43.3966C43.158 54.5156 42.938 54.2074 42.7382 53.8853ZM51.1165 40.5529C51.4293 40.5856 51.7372 40.6348 52.0393 40.6995V27.4617L51.1165 28.3845V40.5529ZM21.5873 20.8359V47.4738L20.6646 48.3966V20.8359C20.6646 20.2317 21.1557 19.7422 21.7604 19.7422H28.6064V20.665H21.7603C21.6646 20.665 21.5873 20.742 21.5873 20.8359Z" fill="#BFBFBF"></path><path d="M56.7883 38.9849C56.6082 38.8047 56.6082 38.5126 56.7883 38.3324C56.9685 38.1522 57.2607 38.1522 57.4408 38.3324L60.2092 41.1008C60.3894 41.2809 60.3894 41.5731 60.2092 41.7533C60.029 41.9335 59.7369 41.9335 59.5567 41.7533L56.7883 38.9849Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M41.8467 24.356C42.3886 24.356 42.8114 23.891 42.8114 23.3409V18.9115C42.8114 18.3615 42.3886 17.8965 41.8467 17.8965H29.0115C28.4696 17.8965 28.0468 18.3615 28.0468 18.9115V23.3409C28.0468 23.891 28.4696 24.356 29.0115 24.356H41.8467ZM41.8886 18.9116V23.3409C41.8886 23.3999 41.8584 23.4332 41.8467 23.4332H29.0116C28.9999 23.4332 28.9696 23.3999 28.9696 23.3409V18.9116C28.9696 18.8526 28.9999 18.8193 29.0116 18.8193H41.8467C41.8584 18.8193 41.8886 18.8526 41.8886 18.9116Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M50.1937 58.4987C55.2901 58.4987 59.4216 54.3672 59.4216 49.2708C59.4216 44.1744 55.2901 40.043 50.1937 40.043C45.0973 40.043 40.9658 44.1744 40.9658 49.2708C40.9658 54.3672 45.0973 58.4987 50.1937 58.4987ZM50.1937 40.9658C54.7804 40.9658 58.4987 44.6841 58.4987 49.2708C58.4987 53.8576 54.7804 57.5759 50.1937 57.5759C45.6069 57.5759 41.8886 53.8576 41.8886 49.2708C41.8886 44.6841 45.6069 40.9658 50.1937 40.9658Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M74 37C74 57.4346 57.4346 74 37 74C28.1837 74 20.0878 70.9167 13.7316 65.7696L14.3878 65.1133C20.5739 70.0953 28.4386 73.0772 37 73.0772C56.9249 73.0772 73.0772 56.9249 73.0772 37C73.0772 28.4386 70.0951 20.5738 65.1129 14.3876L65.7691 13.7314C70.9165 20.0876 74 28.1837 74 37ZM59.9215 9.13884C53.6892 4.00554 45.7046 0.922786 37 0.922786C17.0746 0.922786 0.922798 17.0748 0.922798 37C0.922798 45.7049 4.00558 53.6896 9.139 59.922L8.48351 60.5775C3.18452 54.1757 0 45.9598 0 37C0 16.5652 16.5649 0 37 0C45.9595 0 54.1752 3.18449 60.577 8.48335L59.9215 9.13884Z" fill="#BFBFBF"></path><path d="M66.3679 7.26014C66.5481 7.07995 66.8402 7.07995 67.0204 7.26014C67.2006 7.44032 67.2006 7.73246 67.0204 7.91265L7.98821 66.9456C7.80803 67.1258 7.51589 67.1258 7.3357 66.9456C7.15552 66.7654 7.15551 66.4733 7.3357 66.2931L66.3679 7.26014Z" fill="#BFBFBF"></path></svg></li>
                           <li><a href="<?php echo base_url('find-teachers')?>" class="sub_btn login act_book_now" > BOOK NOW</a></li>
                      </ul>
                    </div> -->
                    <?php // }  ?>

                  </div>

      <!--------------------------------- wating end  --------------------------------->


         <!---------------------------------  Completed date  --------------------------------->
                  <div class="all_rew all_rew_item" data-project-cat="Completed" style="display: none;">
                  <?php 
                      
                            foreach($lesson as $lessons){ 
                                if($lessons['book_status'] == '1' && $lessons['payment_status'] == '1'){
                                ?>  
                        <a href="javascript:void(0)">
                                <div class="all_rew_part" style="margin-top: 0">
                                    <div class="all_rew_titel">
                                    <p>Completed</p>
                                    </div>
                                    <div class="all_rew_date_time">

                                    <ul>
                                        <li>
                                            <h4><?php echo date('d', strtotime($lessons['date'])); ?> </h4><h6><?php echo date('M', strtotime($lessons['date'])); ?></h6>
                                        </li>
                                        <li class="border_horigantel"></li>
                                        <li>
                                            <h3><?php echo $lessons['from_time']; ?></h3>
                                            <p><?php echo $lessons['language_taught']; ?> - <?php echo $lessons['lesson_time']; ?> min</p>
                                        </li>
                                    </ul>

                                    <ul>
                                        <div class="profile_image all_rew_pro">
                                            <img src="<?php echo base_url($lessons['avatar']); ?>" alt="Profile">
                                        </div>
                                    </ul>

                                    </div>
                                </div>
                             </a>
                      
                       
                             <?php } }?>
                    <!-- <div class="action_rew_part">  
                      <ul>
                         <li>
                           <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M42.4482 19.7422H49.3186L48.3958 20.665H42.4482V19.7422ZM42.7382 53.8853H25.616L24.6933 54.8081H43.3966C43.158 54.5156 42.938 54.2074 42.7382 53.8853ZM51.1165 40.5529C51.4293 40.5856 51.7372 40.6348 52.0393 40.6995V27.4617L51.1165 28.3845V40.5529ZM21.5873 20.8359V47.4738L20.6646 48.3966V20.8359C20.6646 20.2317 21.1557 19.7422 21.7604 19.7422H28.6064V20.665H21.7603C21.6646 20.665 21.5873 20.742 21.5873 20.8359Z" fill="#BFBFBF"></path><path d="M56.7883 38.9849C56.6082 38.8047 56.6082 38.5126 56.7883 38.3324C56.9685 38.1522 57.2607 38.1522 57.4408 38.3324L60.2092 41.1008C60.3894 41.2809 60.3894 41.5731 60.2092 41.7533C60.029 41.9335 59.7369 41.9335 59.5567 41.7533L56.7883 38.9849Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M41.8467 24.356C42.3886 24.356 42.8114 23.891 42.8114 23.3409V18.9115C42.8114 18.3615 42.3886 17.8965 41.8467 17.8965H29.0115C28.4696 17.8965 28.0468 18.3615 28.0468 18.9115V23.3409C28.0468 23.891 28.4696 24.356 29.0115 24.356H41.8467ZM41.8886 18.9116V23.3409C41.8886 23.3999 41.8584 23.4332 41.8467 23.4332H29.0116C28.9999 23.4332 28.9696 23.3999 28.9696 23.3409V18.9116C28.9696 18.8526 28.9999 18.8193 29.0116 18.8193H41.8467C41.8584 18.8193 41.8886 18.8526 41.8886 18.9116Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M50.1937 58.4987C55.2901 58.4987 59.4216 54.3672 59.4216 49.2708C59.4216 44.1744 55.2901 40.043 50.1937 40.043C45.0973 40.043 40.9658 44.1744 40.9658 49.2708C40.9658 54.3672 45.0973 58.4987 50.1937 58.4987ZM50.1937 40.9658C54.7804 40.9658 58.4987 44.6841 58.4987 49.2708C58.4987 53.8576 54.7804 57.5759 50.1937 57.5759C45.6069 57.5759 41.8886 53.8576 41.8886 49.2708C41.8886 44.6841 45.6069 40.9658 50.1937 40.9658Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M74 37C74 57.4346 57.4346 74 37 74C28.1837 74 20.0878 70.9167 13.7316 65.7696L14.3878 65.1133C20.5739 70.0953 28.4386 73.0772 37 73.0772C56.9249 73.0772 73.0772 56.9249 73.0772 37C73.0772 28.4386 70.0951 20.5738 65.1129 14.3876L65.7691 13.7314C70.9165 20.0876 74 28.1837 74 37ZM59.9215 9.13884C53.6892 4.00554 45.7046 0.922786 37 0.922786C17.0746 0.922786 0.922798 17.0748 0.922798 37C0.922798 45.7049 4.00558 53.6896 9.139 59.922L8.48351 60.5775C3.18452 54.1757 0 45.9598 0 37C0 16.5652 16.5649 0 37 0C45.9595 0 54.1752 3.18449 60.577 8.48335L59.9215 9.13884Z" fill="#BFBFBF"></path><path d="M66.3679 7.26014C66.5481 7.07995 66.8402 7.07995 67.0204 7.26014C67.2006 7.44032 67.2006 7.73246 67.0204 7.91265L7.98821 66.9456C7.80803 67.1258 7.51589 67.1258 7.3357 66.9456C7.15552 66.7654 7.15551 66.4733 7.3357 66.2931L66.3679 7.26014Z" fill="#BFBFBF"></path></svg></li>
                           <li><a href="<?php echo base_url('find-teachers')?>" class="sub_btn login act_book_now" > BOOK NOW</a></li>
                      </ul>
                    </div> -->
                    <?php // }  ?>




                   <!-- <input type="button" name="" value="Show More" class="change_photo sh_mr"> -->


                  </div>
      <!---------------------------------  Completed end  --------------------------------->

            <!---------------------------------  Canceled start  --------------------------------->
        <div class="all_rew all_rew_item" data-project-cat="Canceled" style="display: none;">
                    <?php
                    
                        foreach($lesson as $lessons){ 
                            
                    if($lessons['book_status'] == '1' && $lessons['cancel'] == '1'){
                        ?>  
                            <a href="javascript:void(0)">
                                <div class="all_rew_part" style="margin-top: 0">
                                    <div class="all_rew_titel">
                                    <p>Completed</p>
                                    </div>
                                    <div class="all_rew_date_time">

                                    <ul>
                                        <li>
                                            <h4><?php echo date('d', strtotime($lessons['date'])); ?> </h4><h6><?php echo date('M', strtotime($lessons['date'])); ?></h6>
                                        </li>
                                        <li class="border_horigantel"></li>
                                        <li>
                                            <h3><?php echo $lessons['from_time']; ?></h3>
                                            <p><?php echo $lessons['language_taught']; ?> - <?php echo $lessons['lesson_time']; ?> min</p>
                                        </li>
                                    </ul>

                                    <ul>
                                        <div class="profile_image all_rew_pro">
                                            <img src="<?php echo base_url($lessons['avatar']); ?>" alt="Profile">
                                        </div>
                                    </ul>

                                    </div>
                                </div>
                             </a>
                      
                      
                             <?php } }?>
                    <!-- <div class="action_rew_part">  
                      <ul>
                         <li>
                           <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M42.4482 19.7422H49.3186L48.3958 20.665H42.4482V19.7422ZM42.7382 53.8853H25.616L24.6933 54.8081H43.3966C43.158 54.5156 42.938 54.2074 42.7382 53.8853ZM51.1165 40.5529C51.4293 40.5856 51.7372 40.6348 52.0393 40.6995V27.4617L51.1165 28.3845V40.5529ZM21.5873 20.8359V47.4738L20.6646 48.3966V20.8359C20.6646 20.2317 21.1557 19.7422 21.7604 19.7422H28.6064V20.665H21.7603C21.6646 20.665 21.5873 20.742 21.5873 20.8359Z" fill="#BFBFBF"></path><path d="M56.7883 38.9849C56.6082 38.8047 56.6082 38.5126 56.7883 38.3324C56.9685 38.1522 57.2607 38.1522 57.4408 38.3324L60.2092 41.1008C60.3894 41.2809 60.3894 41.5731 60.2092 41.7533C60.029 41.9335 59.7369 41.9335 59.5567 41.7533L56.7883 38.9849Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M41.8467 24.356C42.3886 24.356 42.8114 23.891 42.8114 23.3409V18.9115C42.8114 18.3615 42.3886 17.8965 41.8467 17.8965H29.0115C28.4696 17.8965 28.0468 18.3615 28.0468 18.9115V23.3409C28.0468 23.891 28.4696 24.356 29.0115 24.356H41.8467ZM41.8886 18.9116V23.3409C41.8886 23.3999 41.8584 23.4332 41.8467 23.4332H29.0116C28.9999 23.4332 28.9696 23.3999 28.9696 23.3409V18.9116C28.9696 18.8526 28.9999 18.8193 29.0116 18.8193H41.8467C41.8584 18.8193 41.8886 18.8526 41.8886 18.9116Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M50.1937 58.4987C55.2901 58.4987 59.4216 54.3672 59.4216 49.2708C59.4216 44.1744 55.2901 40.043 50.1937 40.043C45.0973 40.043 40.9658 44.1744 40.9658 49.2708C40.9658 54.3672 45.0973 58.4987 50.1937 58.4987ZM50.1937 40.9658C54.7804 40.9658 58.4987 44.6841 58.4987 49.2708C58.4987 53.8576 54.7804 57.5759 50.1937 57.5759C45.6069 57.5759 41.8886 53.8576 41.8886 49.2708C41.8886 44.6841 45.6069 40.9658 50.1937 40.9658Z" fill="#BFBFBF"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M74 37C74 57.4346 57.4346 74 37 74C28.1837 74 20.0878 70.9167 13.7316 65.7696L14.3878 65.1133C20.5739 70.0953 28.4386 73.0772 37 73.0772C56.9249 73.0772 73.0772 56.9249 73.0772 37C73.0772 28.4386 70.0951 20.5738 65.1129 14.3876L65.7691 13.7314C70.9165 20.0876 74 28.1837 74 37ZM59.9215 9.13884C53.6892 4.00554 45.7046 0.922786 37 0.922786C17.0746 0.922786 0.922798 17.0748 0.922798 37C0.922798 45.7049 4.00558 53.6896 9.139 59.922L8.48351 60.5775C3.18452 54.1757 0 45.9598 0 37C0 16.5652 16.5649 0 37 0C45.9595 0 54.1752 3.18449 60.577 8.48335L59.9215 9.13884Z" fill="#BFBFBF"></path><path d="M66.3679 7.26014C66.5481 7.07995 66.8402 7.07995 67.0204 7.26014C67.2006 7.44032 67.2006 7.73246 67.0204 7.91265L7.98821 66.9456C7.80803 67.1258 7.51589 67.1258 7.3357 66.9456C7.15552 66.7654 7.15551 66.4733 7.3357 66.2931L66.3679 7.26014Z" fill="#BFBFBF"></path></svg></li>
                           <li><a href="<?php echo base_url('find-teachers')?>" class="sub_btn login act_book_now" > BOOK NOW</a></li>
                      </ul>
                    </div> -->
                    <?php //}  ?>

        </div>
            <!---------------------------------  Canceled end  --------------------------------->
           
               <!-- <div class="col-md-4">
                  <div class="position_fixed">
                     <div class="person_detail profile_part">
                        <div class="lessons_sec filters_sec">
                           <div class="lessons_part filters_part ">
                              <p>Filters</p>
                           </div>
                           
                              <select class="custom-select animations-select arrow_des " id="inputGroupSelect03" data-target="#animation-bottom">
                                 <option selected="">My Lessons & Packages</option>
                                 <option value="1">Lesson</option>
                                 <option value="2">Package</option>
                              </select>

                              <select class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                 <option selected="">All my languages</option>
                                 <option value="1">Spanish</option>
                              </select>

                              <select class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                 <option selected="">All teachers</option>
                                 <option value="1">Edmundo</option>
                                 <option value="2">Jose</option>
                                 <option value="3">Sergio</option>
                              </select>
                        
                        </div>
                     </div>

                  </div> -->
               </div>
            </div>

         </div>
      </section>
      <!--------------------------- profile end here ---------------------------->
      <script>
         $('.min_header_part li').click(function() { 
             $('.min_header_part li').removeClass('id_add_min_head');
             $(this).addClass('id_add_min_head');
             var t= $(this).text();
             if(t!='All')
              {
             $(".all_rew_item").hide();
             $(".all_rew_item").each(function(i){
             var data_project_cat_value= $(this).attr('data-project-cat');
             var data_project_cat_array = data_project_cat_value.split(',');
             if(jQuery.inArray(t, data_project_cat_array) !== -1)
              {
               $(this).fadeIn();
              }
              });
             }

             else
              {
               $(".all_rew_item").fadeIn();
              }
      });
      </script>