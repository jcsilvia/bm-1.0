


    <div class="content">

        <div style="position: relative">
        <div class="link-container">
            <div class="text" style="border-bottom: 1px;border-bottom-color: white;border-bottom-style: solid">
                New to Bullet-Monkey?
                <form METHOD="LINK" ACTION="/signup/"><input class="button1" type="submit" name="submit" value="Sign up" /></form>

            </div>
            <div class="text" style="padding-top: 4px;">
                Have an account?
                <form METHOD="LINK" ACTION="/login/"><input class="button1" type="submit" name="submit" value="Sign in" /></form>
            </div>
        </div>

        <div class="text-container">
            <div class="welcome-text" style="border: 1px; border-style: solid; border-color: black; padding: 5px; border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;">
                <h3>What is Bullet-Monkey?</h3>
                <p>
                    Bullet-monkey helps you find cheap ammunition and reloading supplies in-stock near you. Sign up now for a chance to win great prizes by reporting prices and availability when you shop your local vendors.
                </p>
                <h3>How does it work?</h3>
                <ol>
                    <li><b>Find</b> cheap ammunition near you. Save money and time.
                    <li><b>Report</b> price and availability of ammunition and help out your fellow shooting enthusiasts.
                    <li><b>Earn</b> points and prestige for reporting prices and availability. Use those points to enter to win great prizes, including gift cards.
                </ol>

            </div>
        </div>

        <div class="mobile-container">
            <b>Bullet-Monkey Mobile</b>
            <div class="mobile-text">

                <p> Bullet-Monkey for Android, iPhone, and the mobile web is coming soon!</p>
            </div>
        </div>



        <div class="fb-like" data-href="http://www.bullet-monkey.com" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-colorscheme="dark" data-font="arial" style="position: relative;top:35px;left:265px;"></div>
        </div>

        <div style="height: 350px; width:800px;"></div>
        <div style="width:800px;position:relative">
        <?php if (count($ammo_prices) > 0)
            echo '<div class="ammo_heading">';
        echo 'Average Ammo Prices by State';

        echo '</div>';
        echo '<div><div class="ammo_3col_left"><b>Ammo Type:</b></div><div class="ammo_3col_right"><b>Price Per Round:</b></div><div class="ammo_3col_center"><b>State:</b></div></div>';
        ?>

        <?php if (count($ammo_prices) < 1) {
            echo '<div style="font-weight: bold; text-align: center;">There is no ammunition currently in stock or there is no current data';
            echo '.</div>';
        }
        ?>

        <?php foreach ($ammo_prices as $cheap_prices): ?>

            <div class="ammo_prices">
                <div class="ammo_3col_left"> <?php  echo $cheap_prices['product_name'] ?></div>
                <div class="ammo_3col_right"> $<?php  echo $cheap_prices['average_price'] ?>/round</div>
                <div class="ammo_3col_center"> <?php  echo $cheap_prices['state'] ?></div>
            </div>

        <?php endforeach ?>
        </div>
    </div>