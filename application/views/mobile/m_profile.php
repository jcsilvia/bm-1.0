<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bullet-Monkey Mobile Vendor Profile</title>

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
                <li data-role="list-divider"><b><?php  echo $profile->vendor_name ?></b></li>
                <li>
                    <p><?php  echo $profile->address1 ?></p>
                    <p><?php  echo $profile->city ?>, <?php  echo $profile->state ?> <?php  echo $profile->zipcode ?></p><br>
                    <p><b>Phone:</b> <?php  echo $phone ?></p>
                    <?php  if($profile->is_paid == 1) {
                        echo '<p><b>Web:</b> <a href="http://';
                        echo $profile->url;
                        echo '" target="_blank">';
                        echo $profile->url;
                        echo '</a>';
                        echo '</p><div><p style="word-break: break-all;white-space: normal;"><b>Description:</b> ';
                        echo $profile->description;
                        echo '</p></div>';
                    }?>

                    <div class="map_window" style="text-align: center;">

                        <?php
                        echo '<img border="1" src="//maps.googleapis.com/maps/api/staticmap?center=';
                        echo $profile->address1; echo ','; echo $profile->city; echo ','; echo $profile->state;
                        echo '&markers=color:red%7Clabel:A%7C'; echo $profile->address1; echo ','; echo $profile->city; echo ','; echo $profile->state;
                        echo '&zoom=15&scale=2&size=145x145&key=AIzaSyBOIxN_iEcuMDdEz5xesWkGjCyxqHZXRpE&sensor=false" />';
                        ?>

                    </div>
                </li>



            </ul>


    </div><!-- /content -->



    <div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
    </div>

</div><!-- /page -->

</body>
</html>
