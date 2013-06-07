


<div class="content">
    <div style="min-height: 40px;"></div>


    <?php if (count($state_ammo_prices) > 0)
        echo '<div class="ammo_heading">';
        echo 'Current Average Ammo Prices for ';
        echo $user_state;
        echo '</div>';
        echo '<div style="margin: 0 auto; padding:10px;"><div class="ammo_col_left"><b>Ammo Type:</b></div><div class="ammo_col_right"><b>Average Price Per Round:</b></div></div>';
    ?>

    <?php if (count($state_ammo_prices) < 1) {
        echo '<div style="font-weight: bold; text-align: center;">There is no ammunition currently in stock or there is no current data for';
        echo $user_state;
        echo '.</div>';
    }
    ?>

    <?php foreach ($state_ammo_prices as $prices): ?>

        <div class="ammo_prices">
            <div class="ammo_col_left"> <?php  echo $prices['product_name'] ?></div>
            <div class="ammo_col_right"> $<?php  echo $prices['average_price'] ?>/round</div>
        </div>

    <?php endforeach ?>

    <div style="min-height: 150px;"></div>

    <?php if (count($cheap_ammo_prices) > 0)
        echo '<div class="ammo_heading">';
    echo 'Best In-stock Ammo Prices for ';
    echo $user_state;
    echo '</div>';
    echo '<div style="margin: 0 auto; padding:10px;"><div class="ammo_3col_left"><b>Ammo Type:</b></div><div class="ammo_3col_right"><b>Price Per Round:</b></div><div class="ammo_3col_center"><b>Vendor:</b></div></div>';
    ?>

    <?php if (count($cheap_ammo_prices) < 1) {
        echo '<div style="font-weight: bold; text-align: center;">There is no ammunition currently in stock or there is no current data for';
        echo $user_state;
        echo '.</div>';
    }
    ?>

    <?php foreach ($cheap_ammo_prices as $cheap_prices): ?>

        <div class="ammo_prices">
            <div class="ammo_3col_left"> <?php  echo $cheap_prices['product_name'] ?></div>
            <div class="ammo_3col_right"> $<?php  echo $cheap_prices['price_per_round'] ?>/round</div>
            <div class="ammo_3col_center"> <?php  echo $cheap_prices['vendor_name'] ?></div>
        </div>

    <?php endforeach ?>

</div>
<div style="min-height: 50px;"></div>