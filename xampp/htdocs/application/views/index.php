<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="d-flex flex-column align-items-center mt-5 mb-5">

	<?php
	//URL helper
	$this->load->helper('url');

	if (isset($_SESSION['email']))
	{
		?>
		<tr>
			<td><h2>Welcome user: <?php echo $_SESSION['email']; ?></h2></td>
		</tr>
		<?php
	} else{
		echo "<h1>Todays Top Picks</h1>";
	}
	?>
</div>

<div class="bd-example">
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/banner3.jpeg" class="d-block w-100" alt="..." height="60%" width="100%" alt ='check'>
				<div class="carousel-caption d-none d-md-block">
					<h5>First slide label</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/banner2.jpeg" class="d-block w-100" alt="..." height="60%" width="100%">
				<div class="carousel-caption d-none d-md-block">
					<h5>Second slide label</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

<div class="d-flex flex-column align-items-center mt-5 mb-5">
	<h1>Recommended for you</h1>
</div>
<div class="card-columns ml-5" id="recommendationCardDeck">

	<?php
	//reconnect to the database
	$this->load->database();

	//list of all items in the user's wish list
	$wishlist_items = array();

	//displaying each product card

	foreach($product as $products) {
		echo "<div class='card' style='width: 24rem;'>";

		if($products->path!= null){
			$data = base_url('images/'.$products->path);
			echo "<img src=$data class='card-img-top' alt='test'>";
			echo "<a id='cardLinks' href='";
			echo base_url('Product/index/');
			echo $products->productid;
			echo "'>";
		}
		echo "<div class='card-body'> <div class='d-flex d-flex justify-content-between'>";
		echo "<h5 class='card-title'>";
		echo $products->name;
		echo "</h5>";

		echo "<p class='card-text'><b>";
		echo $products->price;
		echo "</b></p>";
		echo "</div>";

		echo "<a id='cardLinks' href='";
		echo site_url('like/index');
		echo "/";
		echo $products->productid;
		echo "/entry";
		echo "'>";

		echo "<div class='heart'>";
		echo "<div class='card-footer like'>";
		echo "<p style='display: inline-block;'>";
		echo $products->likes;
		echo "</p>";
		echo "<img src='";
		echo base_url();
		echo "images/heart_empty.png' id='heart_empty'alt='empty_heart'>";
		echo "</div>";
		echo "<div class='card-footer unlike'>";
		echo "<p style='display: inline-block;'>";
		echo $products->likes;
		echo "</p>";
		echo "<img src='";
		echo base_url();
		echo "images/heart_fill.png' id='heart_empty'alt='empty_heart'>";
		echo "</div>";
		echo "</div>";
		echo "</a>";
		echo "</div>";

		echo "</div>";
	}
	?>
	<div class="row">
		<div class="col-md-12 text-center">
			<?php echo $links; ?>
		</div>
	</div>

</div>
	<style>
		#heart_empty {
			width: 20px;
			height: 20px;
		}

	</style>


<script>
	$('.heart').hover(function() {
		$(this).find('.like').hide();
		$(this).find('.unlike').show();
	}, function() {
		$(this).find('.unlike').hide();
		$(this).find('.like').show();
	});

</script>
