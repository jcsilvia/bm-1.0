
<div>

<div class="content">
    <div style="min-height: 25px;width:600px;margin:0 auto;padding:10px;">

        <p>Here are the latest average ammo prices and the cheapest in-stock prices for vendors in your state. </p>

    </div>


    <?php
        echo '<div class="ammo_heading">Average Ammo Prices for ';
        echo $user_state;
        echo '</div><div class="ammo_container">';

        if (count($state_ammo_prices) > 0) {
            echo '<div id="content" ><div class="two_col two_col-1"><b>Ammo Type:</b></div><div class="two_col two_col-2"><b>Average Price Per Round:</b></div></div>';
        }
    ?>

    <?php if (count($state_ammo_prices) < 1) {
        echo '<div style="font-weight: bold; text-align: center;font-family:helvetica,sans-serif;font-size:.9em;padding:10px;">There is no current data for ';
        echo $user_state;
        echo '.</div>';
    }
    ?>

    <?php foreach ($state_ammo_prices as $prices): ?>

        <div id="content">
            <div class="two_col two_col-1"> <?php  echo $prices['product_name'] ?></div>
            <div class="two_col two_col-2"> $<?php  echo $prices['average_price'] ?>/round</div>
        </div>

    <?php endforeach ?>
    </div>

    <div style="min-height: 25px;">

    </div>

    <?php
        echo '<div class="ammo_heading">Cheapest In-stock Ammo Prices for ';
        echo $user_state;
        echo '</div><div class="ammo_container">';

        if (count($cheap_ammo_prices) > 0) {
            echo '<div id="content"><div class="col col-1"><b>Ammo Type:</b></div><div class="col col-2"><b>Price Per Round:</b></div><div class="col col-3"><b>Vendor:</b></div><div class="col col-4"><b>Last Updated:</b></div><div class="col col-5"><b>Flag/Delete:</b></div></div>';
        }
    ?>

    <?php if (count($cheap_ammo_prices) < 1) {
        echo '<div style="font-weight: bold; text-align: center;font-family:helvetica,sans-serif;font-size:.9em;padding:10px;">There is no current data for ';
        echo $user_state;
        echo '. Please check back soon.</div>';
    }
    ?>

    <?php foreach ($cheap_ammo_prices as $cheap_prices): ?>


            <div id="content">
                <div class="col col-1"> <?php  echo $cheap_prices['product_name'] ?></div>
                <div class="col col-2"> $<?php  echo $cheap_prices['price_per_round'] ?>/round </div>
                <div class="col col-3"><a href="/profile/<?php echo $cheap_prices['address_id'] ?>"> <?php  echo $cheap_prices['vendor_name'] ?></a> </div>
                <div class="col col-4">
                    <?php
                    if ($cheap_prices['last_updated'] > 23)
                        {
                            echo round(($cheap_prices['last_updated']/24),0);

                            if (round(($cheap_prices['last_updated']/24),0) == 1)
                                    {echo ' day ago by ';}
                            else
                                    { echo ' days ago by '; }
                            echo $cheap_prices['user_name'];
                            echo '</div>';
                        }
                    else
                        {
                            echo $cheap_prices['last_updated'];

                            if ($cheap_prices['last_updated'] == 1)
                                    {echo ' day ago by ';}
                            else
                                    { echo ' hours ago by '; }
                            echo $cheap_prices['user_name'];
                            echo '</div>';
                        }
                    ?>
                    <?php
                        echo '<div class="col col-5"><a href="/home/flag_entry/';
                        echo $cheap_prices['product_availability_id'];
                        echo '">Flag</a></div>';
                    ?>
            </div>


    <?php endforeach ?>
        </div>
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
    if(count($cheap_prices) < 5){
        echo '<div style="min-height: 800px;"></div>';
    }
    else{
        echo '<div style="min-height: 200px;"></div>';
    }
}
else
{

    echo '<div style="min-height: 75px;"></div>';
}

?>