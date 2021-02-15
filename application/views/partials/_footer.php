  <!------------------------------------ footer section start here -------------------------->
  <footer class="main_footer">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="footer_part">
                     <h4>Language Tutors</h4>
                     <ul>
                        <li><a href="<?php echo base_url('find-teacher?lang=English');?>">English Tutors </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Chinese');?>">Chinese (Mandarin) Tutors </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=French');?>">French Tutors </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Spanish');?>">Spanish Tutors </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Portuguese');?>">Portuguese Tutors </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=German');?>">German Tutors </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Japanese');?>">Japanese Tutors </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Vietnamese');?>">Vietnamese </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Cantonese');?>">Cantonese </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Korean');?>">Korean Tutors </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Thai');?>">Thai </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Russian');?>">Russian </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Italian');?>">Italian </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Malaysian');?>">Malaysian </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Hindi');?>">Hindi </a></li>
                        <li><a href="<?php echo base_url('find-teacher?lang=Arabic');?>">Arabic </a></li>
                        <li><a href="<?php echo base_url('find-teachers');?>"><b>View More</b> </a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="footer_part">
                     <h4>Teaching</h4>
                     <ul>
                        <li><a href="<?php echo base_url('Auth/teacher_acknowlegment')?>">Become a Teacher </a></li>
                        <li><a href="<?php echo base_url('terms-and-conditions')?>">Teaching Code of Conduct </a></li>
                     </ul>
                  </div>
               </div>
               <!-- <div class="col-md-3">
                  <div class="footer_part">
                     <h4>More</h4>
                     <ul>
                        <li><a href="">My language Pro apps </a></li>
                        <li><a href="javascript:void(0);">Refer a Friend and Get $10</a></li>
                        <li><a href="javascript:void(0);">Buy a Gift Card </a></li>
                        <li><a href="javascript:void(0);">My language Pro Business </a></li>
                        <li><a href="javascript:void(0);">Partnership Program </a></li>
                        <li><a href="javascript:void(0);">Affiliate Program </a></li>
                        <li><a href="javascript:void(0);">Test Your English Level </a></li>
                        <li><a href="javascript:void(0);">My language Pro Stories </a></li>
                        <li><a href="javascript:void(0);">My language Pro Language Challenge </a></li>
                     </ul>
                  </div>
               </div> -->
               <div class="col-md-4">
                  <div class="footer_part last">
                     <div class="input-group">
                       <div class="input-group">
                          <div id="google_translate_element"></div>
                      </div>
                     </div>
                     <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect01">
                           <option selected>USD $</option>
                           <option value="1">TWD $</option>
                           <option value="2">INR ₹</option>
                           <option value="3">JPY ¥</option>
                        </select>
                     </div>
                     <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect01">
                           <option selected>Global Site</option>
                           <option value="1">China Site</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <hr>
         <div class="copy_right">
            <div class="container">
               <div class="copy_right_sec">
                  <div class="copy_left">
                     <ul>
                        <li><a href="<?php echo base_url('about')?>">About</a></li>
                        <!-- <li><a href="javascript:void(0)">Careers</a></li>
                        <li><a href="javascript:void(0)">Press</a></li>
                        <li><a href="javascript:void(0)">Blog</a></li> -->
                        <li><a href="<?php echo base_url('support')?>">Support</a></li>
                        <li><a href="<?php echo base_url('legal')?>">Legal</a></li>
                        <li><a href="<?php echo base_url('privacy')?>">Privacy</a></li>
                        <li><a href="<?php echo base_url('contact')?>">Contact</a></li>
                     </ul>
                  </div>
                  <div class="copy_right_part">
                     <p>© 2020 My Language Pro.</p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!----------------------------------- footer section end here ------------------------------>
      <script src="<?php echo base_url();?>asset/new/js/jquery.js"></script>
      <script src="<?php echo base_url();?>asset/new/js/all.min.js"></script>
      <script src="<?php echo base_url();?>asset/new/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>asset/new/js/scripts.js"></script>
      <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
      </script>
      <script defer id="io.birdseed.script-tag" type="text/javascript" src="https://cdn.birdseed.io/widget.js"></script><div id="birdseed-widget-container" data-token="21bfec87b0eeb0993546cfe96be85422"></div>
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
   </body>
</html>