
     <!---------------------------- Withdraw sec start here ---------------------------->

     <section class="withdraw_page_sec">
     	<div class="container">
     		<h3 class="text-center">Withdrawing Credits</h3>
     		<hr>
     		<div class="withdraw_request_part text-center">
     			<h6>Withdrawal Request</h6>
					<p>In order to withdraw Credits from your Teacher Wallet, you must complete the withdrawal application. You must state the withdrawal amount and the deposit location.</p>
     		</div>
     		<hr>
     		<div class="row">
            <form role="form" action="teacher/confirm_withdraw" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>" id="payment-form">
     			<div class="col-md-6">
     				<div class="withdraw_page_part">
     					<p>Amount to withdraw (Min: $30.00 USD, Available Balance: $ <?php echo $sum_transaction; ?>)</p>
     					<span class="brfore_prize_type">$</span>
     					<input type="text" name="" class="prize_type">
     					<span class="after_prize_type">USD</span>
     					<p>Withdrawal method</p>
     					<button class="bank_transfer_part">
     						<p>Bank Transfer</p>
     			            <p>3423106</p>
     					</button>
     					<!-- <p><a href="javascript:void(0);">+ Use another withdrawal method</a></p> -->
     				</div>
     			</div>

     			<div class="col-md-6">
     				<div class="withdraw_page_part">
     					<h3>Withdrawing credits</h3>
     					<h6>Restrictions</h6>

     					<p>The minimum withdrawal amount is $30 USD in My language Pro Credits.
							You can reduce transaction costs by withdrawing larger sums at a time.</p>

							<h6>Payment timing</h6>

							<p>My language Pro processes withdrawal requests depending on the payment method:</p>

							<ul class="payment_timing">
								<li><P> PayPal and Payoneer: 15th and 30th/31st of each month.</P></li>
								<li><p>All other payment methods: 30th/31st of each month.</p></li>
							</ul>

							<p>You will receive your funds within 10 days after My language Pro processes the withdrawal request.</p>

						<p>For example, if you submit a withdrawal request using Paypal on January 12, My language Pro will process the request on January 15. You will receive the funds between January 16 and January 25.</p>

						<p>As My language Pro deals with teachers from all over the world who live in different time zones, we calculate the first and last date of the month according to UTC (Coordinated Universal Time).</p>
     				</div>
     			</div>
     		</div>
			<hr>
     		<h6 class="text-center rev_and_conf">Review and Confirm</h6>

     		<hr>
<div class="row">
     		    <div class="col-md-6">
     				<div class="withdraw_page_part">
     					<h6>Amount to withdraw</h6>

     					<p>$30.00 USD</p>

							<h6>Withdrawal fee</h6>

							<p><a href="javascript:void(0);">Withdrawal fee</a></p>

							<h6>Withdrawal method</h6>
							<p>Bank Transfer</p>
							<p>3423106</p>

						<!--	<h6>Processing time</h6>-->

						<!--<p>Funds will be sent between May 1, 2020 12:00 AM(UTC+00:00)</p>-->

						<!--<p>and May 10, 2020 12:00 AM(UTC+00:00)</p>-->
     				</div>
     			</div>


     		    <div class="col-md-6">
     				<div class="withdraw_page_part">
     					<h6>Confirmation</h6>

     					<p>The information I have entered above is complete and accurate. I have not misrepresented myself or my financial dealings.These accounts are my own. I acknowledge that it is my responsibility to report and record any necessary information with the relevant tax authorities of my country/region.</p>

							<div class="form-group">
                                             <label class="checkbox small">
                                                 <input type="checkbox">
                                                 <span class="success"></span>
                                             </label>
                                             <!--<label class="check_label size">Allow people to send me friend requests</label>-->
                                        </div>
							
							<h6>Please enter your My language Pro password</h6>
							
							<input type="text" name="" class="confirmation_input">
							
     				</div>
     			</div>



     		</div>

     		<div class="withdraw_request_submit_btn text-right">
	     		<input type="submit" name="" value="Submit" class="sub_btn">
	     	</div>
        </form>
     	</div>
     </section>
     
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
        var $form         = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid         = true;
            $errorMessage.addClass('hide');
     
            $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
         
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
        
      });
          
      function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
         
    });
    </script>