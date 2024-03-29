<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Bullet-Monkey Mobile Sign-up</title>
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script type="text/javascript" src="js/jquery-templ.js"></script>
</head> 
<body>
<?php $this->load->view('analytics_tracking.php'); ?>
<div data-role="page">

    <?php $this->load->view('mobile/m_header.php'); ?>

	<div data-role="content">	
		
		<?php $this->load->helper('form'); ?>
		<?php echo form_open('signup/index') ?>
		
		<div><h3>Sign up with Bullet-Monkey</h3></div>

		<div class="form" >
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>"
				 	placeholder="username" data-mini="true" title="Must be at least 5 characters and no longer than 20 characters.">
				<?php echo form_error('username'); ?>
			</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="password" name="password" id="password" placeholder="password" data-mini="true" title="Must be at least 8 characters and no longer than 15 characters. Password is case-sensitive.">
				<?php echo form_error('password'); ?>
			</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" 
				     placeholder="email" data-mini="true" title="The primary email address you would like to use for communication with Bullet-Monkey. We will send you a verification email to confirm the email you provided.">
				<?php echo form_error('email'); ?>
			</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="text" name="zipcode" id="zipcode" value="<?php echo set_value('zipcode'); ?>" 
				     placeholder="zipcode" data-mini="true" title="The 5-digit zip for your primary location.">
				<?php echo form_error('zipcode'); ?>
			</div>


			<div>
				<input class="button" type="submit" name="submit" value="Create my account" data-mini="true" >
			</div>	

			<?php echo form_close() ?>

            <div>
                <p>Already have an account? <a href="/login/">Sign in here.</a></p>
            </div>

        </div> <!-- end of class form -->
		
	</div><!-- /content -->

    <?php $this->load->view("mobile/m_footer.php");?>

</div><!-- /page -->

</body>
</html>
