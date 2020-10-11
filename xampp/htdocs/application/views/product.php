<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css"
		  href="<?php echo base_url();?>css/style.css">

	<title>UniversalBuy</title>

	<div class="d-flex flex-column align-items-center mt-3">
		<div class="card mb-3" style="width:70%;">

			<?php
			//reconnect to database
			$this->load->database();

			//load array helper
			$this->load->helper('array');

			//retrieve item picture
			$pic_sql = "SELECT path FROM product WHERE productid = ?";
			$pic_query = $this->db->query($pic_sql, array($productid));
			$picture = $pic_query->row_array();

			if($picture != null){
				echo "<img src='";
				echo base_url();
				echo "images/";
				echo $picture['path'];
				echo "' class='card-img-top' alt='sampleItem' style='width:30%; align-self: center;'>";
			}

			?>
			<div class="card-header">
				<div class="d-flex d-flex justify-content-between">
					<h2 class="card-title"><?php echo $name?></h2>
					<h2>$<?php echo $price?></h2>
				</div>
			</div>
			<div class="card-body">
				<p class="card-text"><?php echo $description?></p>
			</div>
			<div class="text-center mt-3">
				<button id="submit-button" type="submit" class="btn btn-primary text-center"
						onclick="window.location='<?php echo site_url("Product/add_cart/"."$productid");?>'">Add to Cart</button>
			</div>
			<?php echo $this->session->flashdata('login_error')?>
			<br><br>
			<div class="card-header">
				<div class="d-flex d-flex justify-content-between">
					<h2 class="card-title">Comments</h2>
				</div>
			</div>
			<br>
			<?php
			//reconnect to the database
			$this->load->database();

			//list of all items in the user's wish list
			$favorites_items = array();

			//retrieve all comments from database
			$comments_sql = "SELECT * FROM comments WHERE productid = ?";
			$comments_query = $this->db->query($comments_sql,array($productid));
			foreach($comments_query->result_array() as $row) {
				echo "<div class='card'>";
				echo"<h6 class= 'card-header'>";
				echo $row['email'];
				echo "</div>";
				echo "<div class='card-body'>";
				echo "<p class='card-text'>";
				echo  $row['body'];
				echo "</div>";
			}
			?>
			<div class="card-header">
				<div class="d-flex d-flex justify-content-between">
					<h2 class="card-title">Add a comment</h2>
				</div>
			</div>
			<div class="card-body">
				<?php echo form_open('product/comment/'."$productid");?>
					<div class="form-group">
						<textarea name="body" id="body" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
					</div>
					<button class="btn btn-primary text-center" type="submit" onclick="window.location='<?php echo site_url("product/comment/"."$productid");?>'">Submit</button>
				</form>
				<span id="comment_message"></span>
				<br />
				<div id="display_comment"></div>
			</div>
		</div>
		<!-- Create a form -->
		<!-- validate error -->
		<?php
		$sql= "SELECT username FROM product WHERE productid = ?";
		$query = $this->db->query($sql, $productid);
		if($_SESSION['email']== $query): ?>
		<?php echo form_open('product/loadEditPage'); ?>
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Edit</button>
		<?php
		echo form_close();
		?>
		<?php endif ?>
	</div>




