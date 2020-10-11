<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<title>UniversalBuy</title>
	<style>
		.container{
			padding: 10%;
			text-align: center;
		}
	</style>
</head>

<body>

<nav class="navbar">
	<a class="navbar-brand"><img src="http://localhost/images/logo.png" alt="logo image" width="100px" height="100px"></a>

	<!-- Create a form -->
	<?php echo form_open('Search'); ?>
	<div id="prefetch" class='search_bar'>
		<input class="form-control input-lg typeahead" id="searchbar" type="text" name="search_key" placeholder="Search" aria-label="Search" required>
		<button class="btn btn-outline-success" id="searchbutton" type="submit">Search</button>
	</div>
	<?php echo form_close(); ?>

	<body>
	<script>
		var BASE_URL = "<?php echo base_url(); ?>";

		$(document).ready(function() {
			$( "#searchbar" ).autocomplete({

				source: function(request, response) {
					$.ajax({
						url: BASE_URL + "autocomplete/search",
						data: {
							term : request.term
						},
						dataType: "json",
						success: function(data){
							var resp = $.map(data,function(obj){
								return obj.name;
							});

							response(resp);
						}
					});
				},
				minLength: 1
			});
		});

	</script>
	</body>
</html>

<div class='d-inline-block'>
	<?php
	if(!isset($_SESSION['email'])){
		echo form_open('main/login');
		echo"<button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Sign In/Register</button>";
		echo form_close();
	}else{
		echo form_open('main/logout');
		echo"<button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Log out</button>";
		echo form_close();

	}
	?>
</div>
</nav>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-item nav-link" href= <?php echo base_url('Entry') ?>>Home</a>
			<?php if(isset($_SESSION['email'])): ?>
			<a class="nav-item nav-link" href=<?php echo base_url('Profile')?>>My Profile</a>
			<a class="nav-item nav-link" href=<?php echo base_url('Cart')?>>Shopping cart</a>
			<a class="nav-item nav-link" href=<?php echo base_url('Post')?>>Post New item</a>
			<?php endif ?>
		</div>
	</div>
</nav>
