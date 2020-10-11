<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='<?= base_url() ?>resources/script.js' type='text/javascript'></script>

<div class="col-lg-4 col-lg-offset-4">
    <h2>Please login</h2>
    <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'main/login/', $fattr); ?>
	<div class="form-group col-xs-5 col-lg-10 col-centered" style="width: 150%;">
		<input id="email" type="text" name="email" placeholder="Enter email" class="form-control" required value="<?php if ($this->input->cookie('username')) { echo $this->input->cookie('username'); } ?>">
	</div>
	<div class="form-group col-xs-5 col-lg-10 col-centered mt-2" style="width: 150%;">
		<input id="password" type="password" name="password" placeholder="Enter password" class="form-control" required value="<?php if ($this->input->cookie('pass')) { echo $this->input->cookie('pass'); } ?>">
	</div>
	<div class="text-center mt-3">
		<input type="checkbox" name="remember" aria-label="Checkbox for remember" value="Remember me" <?php if ($this->input->cookie('username')) { ?> checked="checked" <?php } ?>>
		<small>Remember me</small>
	</div>
	<div class="g-recaptcha" data-sitekey="6Lf9pPsUAAAAAEtZF8l83lTe7sqUYHvuJmU7Edvm" data-callback="enableBtn"> test</div>
	<div id="login">
		<button type="submit" value="Submit" id="hide" disabled="disabled" name='login' class="btn btn-lg btn-primary btn-block" id="hide"
				onclick="window.location='<?php echo site_url("main/login/");?>'"> Submit </button>

<!--		--><?php //echo form_submit(array('value'=>'Let me in!', 'class'=>'btn btn-lg btn-primary btn-block', 'name'=>'login', 'id'=>'hide')); ?>
		<?php echo form_close(); ?>
	</div>
    <p>Don't have an account? Click to <a href="<?php echo site_url();?>main/register">Register</a></p>
    <p>Click <a href="<?php echo site_url();?>main/forgot">here</a> if you forgot your password.</p>
</div>

