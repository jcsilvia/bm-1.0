<div class="content">

    <div class="profile">

        <div class="profile_name">
            <h4><?php  echo $profile->vendor_name ?></h4>
        </div>

        <div class="profile_back"><a href="javascript:history.back()">Back</a></div>

        <div class="profile_address">
            <?php  echo $profile->address1 ?><br>
            <?php  echo $profile->city ?>, <?php  echo $profile->state ?> <?php  echo $profile->zipcode ?>

            <p>
                Phone: <?php  echo $phone ?>
            </p>
        </div>



        <div class="profile_premium">
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

    </div>




    <div class="map_window">

        <?php
        echo '<img border="1" src="//maps.googleapis.com/maps/api/staticmap?center=';
        echo $profile->address1; echo ','; echo $profile->city; echo ','; echo $profile->state;
        echo '&markers=color:red%7Clabel:A%7C'; echo $profile->address1; echo ','; echo $profile->city; echo ','; echo $profile->state;
        echo '&zoom=16&size=600x300&key=AIzaSyBOIxN_iEcuMDdEz5xesWkGjCyxqHZXRpE&sensor=false" />';
        ?>

    </div>

</div>

<!-- need empty space to push the footer down with different high resolution screens -->
<?php   $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$winphone = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");

if ($iphone || $android || $palmpre || $ipod || $berry || $winphone ||$ipad == true)
{
    echo '<div style="min-height: 575px;"></div>';
}
else
{

    echo '<div style="min-height: 325px;"></div>';
}

?>