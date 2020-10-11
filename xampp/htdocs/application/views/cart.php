<div class="d-flex flex-column align-items-center mt-5 mb-5">
	<h1>My Shopping Cart</h1>
</div>

<div class="card-columns" id="recommendationCardDeck">
	<?php
	//reconnect to the database
	$this->load->database();

	//list of all items in the user's wish list
	$favorites_items = array();

	//retrieve all the saved items from database
	$load_items_sql = "SELECT productid FROM favorite WHERE username = ?";
	$load_items_query = $this->db->query($load_items_sql,array($_SESSION['username']));

	foreach($load_items_query->result_array() as $wish_row) {
		$favorites_items[] = $wish_row['productid'];
	}

	//retrieve only the wishlist items information from the database
	for($x = 0; $x < count($favorites_items); $x++) {
		$sql = "SELECT * FROM product WHERE productid = ?";
		$query = $this->db->query($sql,array($favorites_items[$x]));

		foreach($query->result_array() as $row) {

			echo "<div class='card' style='width: 20rem ;'>";
			//retrieve item picture
			$pic_sql = "SELECT path FROM product WHERE productid = ?";
			$pic_query = $this->db->query($pic_sql, array($row['productid']));
			$picture = $pic_query->row_array();

			if($picture['path'] != null){
				$data = 'images/'.$picture['path'];
				echo "<img src=$data class='card-img-top' alt='test'>";
				echo "<a id='cardLinks' href='";
				echo base_url('Product/index/');
				echo $row['productid'];
				echo "'>";
			}

			echo "<div class='card-body'> <div class='d-flex d-flex justify-content-between'>";
			echo "<h5 class='card-title'>";
			echo $row['name'];
			echo "</h5>";

			echo "<p class='cardotext'><b>";
			echo $row['price'];
			echo "</b></p>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
	}
	?>
</div>
<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<div class="text-center mt-3">
					<button id="submit-button" type="submit" class="btn-primary btn-lg btn-block">Continue Shopping</button>
				</div>
			</div>
			<div class="col-sm">
				<div class="text-center mt-3">
					<?php echo form_open('paypal/buyProduct'); ?>
					<button id="submit-button" type="submit" class="btn-primary btn-lg btn-block">Checkout</button>
					<?php
					echo form_close();?>
				</div>
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>

<div class="action">
	<a href="<?php echo base_url('stripe/purchase') ?>">Purchase</a>
</div>


</div>
</div>
