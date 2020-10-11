<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Charge <?php echo '$'.$product['price']; ?> with Stripe</h3>

		<!-- Product Info -->
		<p><b>Item Name:</b> <?php echo $product['name']; ?></p>
		<p><b>Price:</b> <?php echo '$'.$product['price'].' '.$product['currency']; ?></p>
	</div>
	<div class="panel-body">
		<!-- Display errors returned by createToken -->
		<div class="card-errors"></div>

		<!-- Payment form -->
		<form action="" method="POST" id="paymentFrm">
			<div class="form-group">
				<label>NAME</label>
				<input type="text" name="name" id="name" placeholder="Enter name" required="" autofocus="">
			</div>
			<div class="form-group">
				<label>EMAIL</label>
				<input type="email" name="email" id="email" placeholder="Enter email" required="">
			</div>
			<div class="form-group">
				<label>CARD NUMBER</label>
				<input type="text" name="card_number" id="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" required="">
			</div>
			<div class="row">
				<div class="left">
					<div class="form-group">
						<label>EXPIRY DATE</label>
						<div class="col-1">
							<input type="text" name="card_exp_month" id="card_exp_month" placeholder="MM" required="">
						</div>
						<div class="col-2">
							<input type="text" name="card_exp_year" id="card_exp_year" placeholder="YYYY" required="">
						</div>
					</div>
				</div>
				<div class="right">
					<div class="form-group">
						<label>CVC CODE</label>
						<input type="text" name="card_cvc" id="card_cvc" placeholder="CVC" autocomplete="off" required="">
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button>
		</form>
	</div>
</div>
