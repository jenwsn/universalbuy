
<div class="d-flex flex-column align-items-center mt-3">
	<h2>My Profile</h2>
	<img src="<?php echo base_url();?>/images/logo.png" width="90" height="90" class="d-inline-block align-top" alt="myImage">
	<!-- Use php or ajax to write about the profile -->

	<table>
		<tr>
			<td align="right">Email:</td>
			<?php
			echo "<td>";
			echo $_SESSION['email'];
			echo "</td>";
			?>
		</tr>
		<tr>
			<td align="right">First Name:</td>
			<?php
			echo "<td>";
			echo $first_name;
			echo "</td>";
			?>
		</tr>
		<tr>
			<td align="right">Last Name:</td>
			<?php
			echo "<td>";
			echo $last_name;
			echo "</td>";
			?>
		</tr>
	</table>

	<!-- Create a form -->
	<!-- validate error -->
	<?php echo form_open('profile/loadEditPage'); ?>
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Edit</button>
	<?php
	echo form_close();
	?>
</div>
</div>
</div>
