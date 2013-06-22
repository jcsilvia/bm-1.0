<?php $this->load->helper('text'); ?>
<?php $this->load->helper('form'); ?>
<!DOCTYPE html>
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Bullet-Monkey Mobile Search</title>
	
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
                <li data-role="list-divider">In-stock Ammo Prices for
                <span style="color:red;">
                        <?php
                            if ($all_products_flag == 'Yes')
                            {
                                echo $product_category;
                            }
                            else
                            {
                                echo $product_name;
                            }

                            echo '</span> in ';
                            echo $search_state;
                        ?>

                </li>



                <?php foreach ($searches as $search): ?>

                    <li>
                        <p><b>Ammo:</b>  <?php  echo $search['product_name'] ?></p>
                        <p><b>Cost per round:</b>

                            <?php
                            if ($all_products_flag == 'Yes')
                            {
                                echo $search['product_name'];
                                echo '@';
                            }
                            ?>

                            $<?php  echo $search['price'] ?>/round</p>
                        <p><b>Vendor:</b> <a href="/profile/<?php echo $search['address_id'] ?>"> <?php  echo $search['vendor'] ?></a></p>
                        <p><b>Last Updated:</b>
                            <?php
                            if ($search['last_updated'] > 23)
                            {
                                echo round(($search['last_updated']/24),0);

                                if (round(($search['last_updated']/24),0) == 1)
                                {echo ' day ago';}
                                else
                                { echo ' days ago'; }

                            }
                            else
                            {
                                echo $search['last_updated'];

                                if ($search['last_updated'] == 1)
                                {echo ' day ago';}
                                else
                                { echo ' hours ago'; }
                            }
                            ?>
                        </p>
                    </li>
                <?php endforeach ?>



                <?php if (count($searches) < 1) {
                    echo '<li><p>There is no current data for ';
                    if ($all_products_flag == 'Yes')
                    {
                        echo $product_category;
                    }
                    else
                    {
                        echo $product_name;
                    }
                    echo ' in ';
                    echo $search_state;
                    echo '. </p><p>Please check back soon.</p></li>';
                }
                ?>

                <li data-role="list-divider">
                <div style="text-align: left;">
                    <?php
                    if (count($searches) > 0) {
                        echo $total;
                        echo ' results found';
                    }
                    ?>
                </div>
                <div style="text-align: right;"> <?php echo $links; ?> </div>
                </li>

            </ul>
        </div>




	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
