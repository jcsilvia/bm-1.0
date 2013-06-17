


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
                        Bullet-monkey helps you find cheap ammunition in-stock near you. Sign up now for a chance to win great prizes by reporting prices and availability when you shop your local vendors.
                    </p>
                    <h3>How does it work?</h3>
                    <ol>
                        <li><b>Find</b> cheap ammunition near you. Save money and time.
                        <li><b>Report</b> price and availability of ammunition and help out your fellow shooting enthusiasts.
                        <li><b>Earn</b> points and prestige for reporting prices and availability. Use those points to enter to win great prizes.
                    </ol>

                </div>
            </div>

            <div class="mobile_container">
                <div style="font-family:helvetica,sans-serif;font-size:1em; border-bottom-style: solid;border-width: 1px;"><b>Bullet-Monkey Mobile</b></div>
                <div style="font-family:helvetica,sans-serif;font-size:.95em;">
                    <p> Bullet-Monkey for Android, iPhone, and the mobile web is coming soon!</p>
                </div>
            </div>



            <div class="fb-like" data-href="http://www.bullet-monkey.com" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-colorscheme="dark" data-font="arial" style="position: relative;top:35px;left:265px;">

            </div>
        </div>

        <div style="height: 350px; width:800px;">

        </div>

        <div style="width:800px;position:relative; ">
        <?php

            echo '<div class="ammo_heading">Average National Ammo Prices</div><div class="ammo_container">';

            if (count($ammo_prices) > 0) {
                echo '<div id="content"><div class="two_col two_col-1"><b>Ammo Type:</b></div><div class="two_col two_col-2"><b>Price Per Round:</b></div></div>';
              }
        ?>

        <?php if (count($ammo_prices) < 1) {
            echo '<div style="font-weight: bold; text-align: center;font-family:helvetica,sans-serif;font-size:.9em;padding:10px;">There is no current data. Please check back again shortly.</div>';
        }
        ?>

        <?php foreach ($ammo_prices as $cheap_prices): ?>

            <div id="content">
                <div class="two_col two_col-1"> <?php  echo $cheap_prices['product_name'] ?></div>
                <div class="two_col two_col-2"> $<?php  echo $cheap_prices['average_price'] ?>/round</div>
            </div>

        <?php endforeach ?>

        </div>
        </div>

    </div>