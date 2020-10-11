<div class="d-flex flex-column align-items-center mt-5 mb-5">
	<h1>You searched for: <?php echo $keyword; ?> </h1>
</div>

<div class="card-columns" id="recommendationCardDeck">

	<?php
	$this->load->library('session');

//	//list of all items in the user's wish list
//	$wishlist_items = array();
//
//	//retrieve all the saved items from database
//	$load_items_sql = "SELECT item_id FROM wishlist WHERE username = ?";
//	$load_items_query = $this->db->query($load_items_sql,array($_SESSION['username']));
//
//	foreach($load_items_query->result_array() as $wish_row) {
//		$wishlist_items[] = $wish_row['item_id'];
//	}

	if($search_result != null){
		foreach($search_result as $row) {
			echo "<div class='card'>";
			echo "<a id='cardLinks' href='";
			echo base_url('Product/index/');
			echo $row['productid'];
			echo "'>";

			$pic_sql = "SELECT path FROM product WHERE productid = ?";
			$pic_query = $this->db->query($pic_sql, array($row['productid']));
			$picture = $pic_query->row_array();

			if($picture['path'] != null){
				echo "<div class='card' style='width: 20rem ;'>";
				$data = base_url('images/'.$picture['path']);
				echo "<img src=$data class='card-img-top' alt='test'>";
				echo "</div>";
			}

			echo "<div class='card-body'> <div class='d-flex d-flex justify-content-between'>";
			echo "<h5 class='card-title'>";
			echo $row['name'];
			echo "</h5>";

			echo "<p class='card-text'><b>";
			echo $row['price'];
			echo "</b></p>";
			echo "</div>";


			echo "</div>";
			echo "</div>";
		}
	} else {
		echo "<div><h1>Oops nothing was found! Try again.</h1></div>";
	}
	?>
</div>
