<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Bullet-Monkey Mobile Home</title>
	
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






        <div class="ui-grid-solo">
            <ul data-role="listview" data-theme="d" data-divider-theme="d">
                <li data-role="list-divider">In-stock Ammo Prices for <?php echo $user_state; ?></li>
                <?php foreach ($cheap_ammo_prices as $cheap_prices): ?>

                    <li>
                        <p><b>Ammo:</b>  <?php  echo $cheap_prices['product_name'] ?></p>
                        <p><b>Cost per round:</b> $<?php  echo $cheap_prices['price_per_round'] ?>/round</p>
                        <p><b>Vendor:</b> <a href="/profile/<?php echo $cheap_prices['address_id'] ?>"> <?php  echo $cheap_prices['vendor_name'] ?></a></p>
                        <p><b>Last Updated:</b>
                        <?php
                        if ($cheap_prices['last_updated'] > 23)
                        {
                        echo round(($cheap_prices['last_updated']/24),0);

                        if (round(($cheap_prices['last_updated']/24),0) == 1)
                        {echo ' day ago by ';}
                        else
                        { echo ' days ago by '; }
                            echo $cheap_prices['user_name'];

                        }
                        else
                        {
                        echo $cheap_prices['last_updated'];

                        if ($cheap_prices['last_updated'] == 1)
                        {echo ' day ago by ';}
                        else
                        { echo ' hours ago by '; }
                            echo $cheap_prices['user_name'];
                        }
                        ?>
                        </p>
                        <p>
                            <?php
                                echo '<a href="/home/flag_entry/';
                                echo $cheap_prices['product_availability_id'];
                                echo '">Flag/Delete</a>';
                            ?>
                        </p>
                    </li>
                <?php endforeach ?>

                <?php if (count($cheap_ammo_prices) < 1) {
                    echo '<li><p>There is no current data for ';
                    echo $user_state;
                    echo '. </p><p>Please check back soon.</p></li>';
                }
                ?>
            </ul>
        </div>




	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
