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
    <div style="text-align: right;"><a style="align: right; padding:10px;" href="javascript:history.back()">Back</a></div>
    <div data-role="content">

        <div>
            <b><?php  echo $profile->vendor_name ?></b>
        </div>


        <div>
            <?php  echo $profile->address1 ?><br>
            <?php  echo $profile->city ?>, <?php  echo $profile->state ?> <?php  echo $profile->zipcode ?>
            <p>Phone: <?php  echo $phone ?></p>

        </div>



        <div>
            <?php  if($profile->is_paid == 1) {
                echo '<p>Web: <a href="http://';
                echo $profile->url;
                echo '" target="_blank">';
                echo $profile->url;
                echo '</a>';
                echo '</p><p>';
                echo $profile->description;
                echo '</p>';
            }?>
        </div>






    <div class="map_window">

        <?php
        echo '<img border="1" src="//maps.googleapis.com/maps/api/staticmap?center=';
        echo $profile->address1; echo ','; echo $profile->city; echo ','; echo $profile->state;
        echo '&markers=color:red%7Clabel:A%7C'; echo $profile->address1; echo ','; echo $profile->city; echo ','; echo $profile->state;
        echo '&zoom=15&scale=2&size=190x200&key=AIzaSyBOIxN_iEcuMDdEz5xesWkGjCyxqHZXRpE&sensor=false" />';
        ?>

    </div>
    </div><!-- /content -->

    <div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
    </div>

</div><!-- /page -->

</body>
</html>
