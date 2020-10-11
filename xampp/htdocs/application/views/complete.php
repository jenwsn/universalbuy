<div class="col-lg-4 col-lg-offset-4">
    <h2>Almost There!</h2>
    <h5>Hello <span><?php echo $firstName; ?></span>. Your username is <span><?php echo $email;?></span></h5>
    <small>Please enter a password to begin using the site.</small>
<?php 
    $fattr = array('class' => 'form-signin');
    echo form_open(site_url().'main/complete/token/'.$token, $fattr); ?>
    <div class="form-group">
      <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
      <?php echo form_error('password') ?>
    </div>
    <div class="form-group">
      <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf') ,
		  'pattern' =>"(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}")); ?>
      <?php echo form_error('passconf') ?>
    </div>
	<div id="message">
		<h6>Password must contain the following:</h6>
		<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
		<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
		<p id="number" class="invalid">A <b>number</b></p>
		<p id="length" class="invalid">Minimum <b>8 characters</b></p>
	</div>
    <?php echo form_hidden('user_id', $user_id);?>
    <?php echo form_submit(array('value'=>'Complete', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
   
</div>
