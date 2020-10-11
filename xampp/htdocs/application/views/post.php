<head>

	<!-- Dropzone CSS & JS -->
	<link href='<?= base_url() ?>resources/dropzone.css' type='text/css' rel='stylesheet'>
	<script src='<?= base_url() ?>resources/dropzone.js' type='text/javascript'></script>
	<style>
		.content{
			width: 50%;
			padding: 5px;
			margin: 0 auto;
		}
		.content span{
			width: 250px;
		}
		.dz-message{
			text-align: center;
			font-size: 28px;
		}
	</style>
	<script>
		// Add restrictions
		Dropzone.options.fileupload = {
			acceptedFiles: 'image/*',
			maxFilesize: 3 // MB
		};
	</script>
</head>
<body class="signinBody">
<div id="page-container">
		<div class="d-flex flex-column align-items-center mt-3">
			<h1 class="display-4">Post a new item</h1>
			<h2 class="display-5">Write information about the item</h2>
			<form action='post/do_upload' name="userfile" class="dropzone" id="fileupload">
			</form>
			<!-- Create a form -->
			<?php echo validation_errors(); ?>
			<?php echo form_open_multipart('post/do_upload'); ?>
				Select File To Upload:<br />
				<input type="file" name="userfile" multiple="multiple"  />
				<br /><br />
				<label>Select Mode:</label>
				<input type="radio" name="mode" value="rotate" />   Rotate
				<input type="radio" name="mode" value="watermark" />   Water Mark
				<br /><br />
<!--				<div class="form-group col-xs-5 col-lg-10 col-centered mt-3" style="width: 150%;">-->
<!--					<input id="name" type="text" name="name" placeholder="Title of post" class="form-control" required>-->
<!--				</div>-->
<!--				<div class="form-group col-xs-5 col-lg-10 col-centered mt-3" style="width: 150%;">-->
<!--					<input id="price" type="text" name="price"  placeholder="Cost of item" class="form-control" required>-->
<!--				</div>-->
<!--				<div class="form-group col-xs-5 col-lg-10 col-centered mt-3" style="width: 150%;">-->
<!--					<input id="description" type="text" name="description" placeholder="Description" class="form-control" required>-->
<!--				</div>-->
				<button id="submit-button" type="submit" value="upload"class="btn btn-primary text-center">Post</button>
		</div>
	<?php
	echo form_close();
	?>
</div>
</body>
