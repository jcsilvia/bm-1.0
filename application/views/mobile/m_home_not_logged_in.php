<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Bullet-Monkey Mobile - Crowd-sourcing the search for local, in-stock ammo like 5.56, 9mm and 22lr.</title>
    <meta name="description" content="Bullet-Monkey Mobile, crowd-sourcing the search for local, in-stock ammunition like 5.56, 9mm, .45ACP, and .22lr.">
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
		<div>
			<h4>Welcome to Bullet-Monkey.com</h4>
            <p>Bullet-monkey helps you find cheap ammunition in-stock near you. </p>
            <p>Sign up now for a chance to win great prizes by reporting prices and availability when you shop your local ammo vendors.</p>
		</div>
		<a href="/signup/" data-role="button">Sign up</a>
		<a href="/login/" data-role="button">Sign in</a>
        <div>
            <h3>How does it work?</h3>
            <ol>
                <li><b>Find</b> cheap ammunition near you. Save money and time.
                <li><b>Report</b> price and availability of ammunition and help out your fellow shooting enthusiasts.
                <li><b>Earn</b> points for reporting prices and availability. Use those points to enter to win great prizes.
            </ol>
        </div>
	</div><!-- /content -->

    <?php $this->load->view("mobile/m_footer.php");?>

</div><!-- /page -->

</body>
</html>
