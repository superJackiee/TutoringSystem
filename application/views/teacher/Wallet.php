   <!--------------------------- Wallet start here ---------------------------->
   <section class="user_section profile_sec teacher_wallet">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="person_detail  teacher_wallet_sec">
                  	<div class="teacher_wallet_header">
					  <?php if(user()->role == "teacher"){ ?>	  
					  		<h3>Teacher Wallet</h3>
                  		
						  <a class="sub_btn" href="<?php echo base_url('teacher/Withdraw'); ?>">Withdraw</a>
						  <?php } else if(user()->role == "student"){?>
							<h3>Student Wallet</h3>
							<a class="sub_btn" href="<?php echo base_url('student/Buy')?>">Buy Credit</a>
						  <?php } ?>
                  	</div>
                  		<div class="border_hor"></div>
                  	<div class="teacher_wallet_body">
                  		<h4>Available Balance</h4>
                  		<h2>$<?php echo $sum_transaction ?> USD</h2>
                  	</div>
                  	<div class="redbar teacz\_wal_redbar"></div>
                  	<div class="balance_sec">
                  		<div class="row">
	                  		<div class="col-md-6">
		                  		<div class="balance_left_part">
		                  			<h4>Total Balance</h4>
		                  			<h5>$ <?php echo $sum_transaction ?> USD</h5>
		                  			<!-- <h6>ARS 5,747.22</h6> -->
		                  		</div>
		                  	</div>
		                  	<div class="col-md-6">
		                  		<div class="balance_right_part">
		                  			<h4>Withdrawal Pending</h4>
		                  			<h5>$ 0 USD</h5>
		                  		</div>
		                  	</div>
		                </div>
                  	</div>
                  	<p>* The amounts listed here are close approximations. There may be a slight difference due to changes in foreign exchange rates. All amounts are based on US Dollars</p>
                  </div>



		<?php if(user()->role == "teacher"){ ?>

                  <div class="person_detail  teacher_wallet_sec sec_sec">

                  	<div class="teacher_wallet_history_sec">
                  		<div class="tec_wal_header">
							  <ul class="text_center filternav">
								  <li class="current_sorting">Teacher Wallet details</li>
							      <li class="cat_1">Withdrawal history</li> 
							      <div class="btn_filter"><img src="<?php echo base_url('uploads/images/filter.svg') ?>" id="show-hidden-menu" alt="filter"></div> 
							  </ul>	
							  <div class="teach_wall_det" data-project-cat="Teacher Wallet details">
							  	<div class="teach_wall_btn_part hidden-menu" style="display: none;">
							  		<input type="date" name="" class="filter_calender">
							  		<select class="custom-select animations-select teach_dr_btn" id="inputGroupSelect01" data-target="#animation-bottom">
			                           <option selected>USD $</option>
			                           <option value="1">TWD $</option>
			                           <option value="2">INR ₹</option>
			                           <option value="3">JPY ¥</option>
			                        </select>
							  		<input type="button" name="" value="Download" class="change_photo std_wallet_btn">
							  	</div>
							  	<div class="teach_wall_det_row">
							  		<div class="teach_wall_det_head">
							  			<div>Time</div>
							  			<div>Description</div>
							  			<div>Amount (USD)</div>
							  			<div class="text-right">Actions</div>
							  		</div>
							  	</div>
							  	<div class="teach_wall_det_row">
							  		<div class="teach_wall_det_body">
							  			<div>Apr 18, 2020 09:17</div>
							  			<div>Processing Fee for Package</div>
							  			<div>-13.50</div>
							  			<div class="text-right">
							  				<a href="">View details</a><br>
							  				<a href="">View related transactions</a>
							  			</div>
							  		</div>
							  	</div>
							  	<div class="text-center">
							  	<input type="button" name="" value="Show More" class="change_photo show_more">
							  </div>

							  </div>



							  <div class="teach_wall_det" style="display: none;" data-project-cat="Withdrawal history">
							  	<div class="teach_wall_btn_part hidden-menu" style="display: none;">
							  		<input type="date" name="" class="filter_calender">
							  	</div>
							  	<div class="teach_wall_det_row">
							  		<div class="teach_wall_det_head">
							  			<div>Time</div>
							  			<div>Transaction ID</div>
							  			<div>Amount (USD)</div>
							  			<div>Status</div>
							  			<div class="text-right">Actions</div>
							  		</div>
							  	</div>
							  	<div class="teach_wall_det_row">
							  		<div class="teach_wall_det_body">
							  			<div>DUMMY</div>
							  			<div>DUMMY</div>
							  			<div>DUMMY</div>
							  			<div>DUMMY</div>
							  			<div class="text-right">
							  				<a href="">View details</a>
							  			</div>
							  		</div>
							  	</div>
							  	<!-- <div class="text-center">
							  	<input type="button" name="" value="Show More" class="change_photo show_more">
							  </div> -->
							  </div>
                  	</div>
					  </div>
					  </div>	</DIV>
		<?php } else if(user()->role == "student"){?>
						
<div class="person_detail  teacher_wallet_sec sec_sec">
<div class="teacher_wallet_history_sec">
	<div class="tec_wal_header">
		<ul class="text_center filternav">
			<li class="current_sorting">Teacher Wallet details</li>
			<li></li>
			<li></li><li></li>
			<div class="btn_filter"><img src="<?php echo base_url('uploads/images/filter.svg') ?>" id="show-hidden-menu" alt="filter"></div> 					
	</ul>
					
		<div class="teach_wall_det" data-project-cat="Teacher Wallet details">
			<div class="teach_wall_det_row">
				<div class="teach_wall_det_head">
					<div>Time</div>
					<div>Description</div>
					<div>Amount (USD)</div>
					<div class="text-right">Actions</div>
				</div>
			</div>
			<div class="teach_wall_det_row">
			<?php if($student_transaction) {
			foreach($student_transaction as $transaction){ ?>
				<div class="teach_wall_det_body">
					<div><?php echo $transaction['time'];?></div>
					<div>Success</div>
					<div><?php echo $transaction['amount'];?></div>
					<div class="text-right">
						<a href="">View details</a><br>
					</div>
				</div>
			<?php }}?>
			</div>


		</div>
</div>
</div></div>
</div>
						  <?php } ?>
               <div class="col-md-4">
                  
                     <!-- <div class="person_detail profile_part">
                        <div class="lessons_sec">
                           <div class="lessons_part std_wallet">
                              <h3>Student Wallet</h3>
                              <div class="redbar redbar_right"></div>
                              <h4>Available Balance</h4>
                              <h2>$ 11.00 USD</h2>
                              <h6>ARS 720.86</h6>
                              <button class="change_photo book_now cont_teach std_wallet_btn">
	                             Transfer Credits               
	                           </button>
                           </div>
                          
                        </div>
                     </div> -->
                     <div class="person_detail teacher_schedule">
                        <div class="lessons_sec">
                        	<div class="lessons_part std_wallet">
                              <h3>Need help?</h3>
                              <h6>Billing, Payments & myLanguage Credits</h6>
                              <a href="<?php echo base_url('support')?>"><button class="change_photo book_now cont_teach std_wallet_btn">
	                             Support              
	                           </button></a>
                           </div>
                        </div>
                     </div>
                  
               </div>
            </div>
      

         </div>
      </section>
      <!--------------------------- profile end here ---------------------------->