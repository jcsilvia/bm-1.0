


<div class="content">
    <div style="min-height: 25px;"></div>


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
            echo '<div id="content"><div class="col col-1"><b>Ammo Type:</b></div><div class="col col-2"><b>Price Per Round:</b></div><div class="col col-3"><b>Vendor:</b></div><div class="col col-4"><b>Last Updated:</b></div></div>';
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
                <div class="col col-2"> $<?php  echo $cheap_prices['price_per_round'] ?>/round</div>
                <div class="col col-3"><a href="/profile/<?php echo $cheap_prices['address_id'] ?>"> <?php  echo $cheap_prices['vendor_name'] ?></a> </div>
                <div class="col col-4"> <?php  echo $cheap_prices['last_updated'] ?> hours ago</div>
            </div>


    <?php endforeach ?>
        </div>
</div>
