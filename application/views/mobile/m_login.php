<!DOCTYPE html>
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Bullet-Monkey Mobile Login</title>
	
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
		<?php echo form_open('login/index') ?>
		
		<div><h3>Sign in to Bullet-Monkey</h3></div>

		<div class="form" >
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>"
				 	placeholder="username or email" data-mini="true" title="Enter your username or the email address used to sign up with Bullet-Monkey.">
				<?php echo form_error('username'); ?>
			</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="password" name="password" id="password" placeholder="password" data-mini="true" title="Minimum 8 characters. Password is case-sensitive.">
				<?php echo form_error('password'); ?>
				<div class="error">
	            	<?php echo $msg ?>
	            </div>
			</div>
			<div data-role="fieldcontain" >
		        Forgot Password? <a href="/login/forgot_password">Reset here</a>
			</div>		
			<div data-role="fieldcontain" >
		        Don't have an account? <a href="/signup/">Create one here</a>
			</div>		
			<div>
				<input class="button" type="submit" name="submit" value="Sign in" data-mini="true" />
			</div>	

			<?php echo form_close() ?>
			
		</div> <!-- end of class form -->
		
	</div><!-- /content -->
	<?php $this->load->view("mobile/m_footer.php");?>


</div><!-- /page -->

</body>
</html>
