
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php $this->load->helper('url'); echo base_url();?>css/style.css">

</head>

<body class="signinBody">

<div class="d-flex flex-column align-items-center mt-3">
	<h2>Edit Profile</h2>
	<img src="<?php echo base_url();?>images/logo.png" width="90" height="90" class="d-inline-block align-top" alt="myImage">

	<!-- Create a form -->
	<?php echo validation_errors(); ?>
	<?php echo form_open('profile/edit'); ?>
	<!-- <form method="POST" action="registerfunc.php" class="d-flex flex-column align-items-center mt-2"> -->

	<div class="form-group col-xs-5 col-lg-9 mt-3 col-centered">
		<p>First Name:</p>
		<input id="edit_first_name" type="text" name="edit_first_name" placeholder="<?php echo $first_name;?>" class="form-control" required>
	</div>
	<div class="form-group col-xs-5 col-lg-9 mt-3 col-centered">
		<p>Last Name:</p>
		<input id="edit_last_name" type="text" name="edit_last_name" placeholder="<?php echo $last_name;?>" class="form-control" required>
	</div>
	<div class="text-center mt-3 mb-3">
		<button id="submit-button" type="submit" class="btn btn-primary text-center">Save changes</button>
	</div>
	<?php
	echo form_close();
	?>

</div>

</body>
