


    <div class="content">

        <div style="position: relative; width:800px;">

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
                        <li><b>Earn</b> points for reporting prices and availability. Use those points to enter to win great prizes.
                    </ol>

                </div>
            </div>

            <div class="mobile_container">
                <div style="font-family:helvetica,sans-serif;font-size:1em; border-bottom-style: solid;border-width: 1px;"><b>Bullet-Monkey Mobile</b></div>
                <div style="font-family:helvetica,sans-serif;font-size:.95em;">
                    <p> Bullet-Monkey Mobile is now live! Check us out from your Apple or Android device. </p>
                </div>
            </div>




        </div>

        <div style="height: 350px; width:800px;">

        </div>

        <div style="width:800px;position:relative; ">


            <div class="ammo_heading">Latest In-Stock Ammo Updates</div><div class="ammo_container">





         <?php
            if (count($ammo_prices) > 0) {
            echo '<div id="content"><div class="four_col col-1"><b>Ammo Type:</b></div><div class="four_col col-2"><b>Price Per Round:</b></div><div class="four_col col-3"><b>Vendor:</b></div><div class="four_col col-4"><b>Last Updated:</b></div></div>';
            }
         ?>
         <div id="content">

           <?php if (count($ammo_prices) == 0) {
                echo '<div style="font-weight: bold; text-align: center;font-family:helvetica,sans-serif;font-size:.9em;padding:10px;">There is no current data. Please check back again shortly or login to post an update.</div>';
            }
            ?>

            <?php foreach ($ammo_prices as $latest_updates): ?>



                <div class="four_col col-1"> <?php  echo $latest_updates['product_name'] ?></div>
                <div class="four_col col-2"> <?php if (count($ammo_prices) > 0){echo '$';}  echo $latest_updates['price_per_round']; if (count($ammo_prices) > 0){ echo '/round'; } ?></div>
                <div class="four_col col-3"><a href="/profile/<?php echo $latest_updates['address_id'] ?>"> <?php  echo $latest_updates['vendor_name'] ?></a> </div>
                <div class="four_col col-4">
                    <?php
                    if (count($ammo_prices) > 0) {
                        if ($latest_updates['last_updated'] > 23)
                        {
                            echo round(($latest_updates['last_updated']/24),0);

                            if (round(($latest_updates['last_updated']/24),0) == 1)
                            {echo ' day ago';}
                            else
                            { echo ' days ago'; }
                            echo '</div>';
                        }
                        else
                        {
                            echo $latest_updates['last_updated'];

                            if ($latest_updates['last_updated'] == 1)
                            {echo ' hour ago';}
                            else
                            { echo ' hours ago'; }
                            echo '</div>';
                        }
                    }

                    ?>




                <?php endforeach ?>

            </div>
         </div>

        <div style="min-height: 50px;"></div>
        <div style="margin: 0 auto;width:600px;text-align: center;padding:10px;"><img src="/images/bm_m4.jpg" style="border:solid;border-width: 1px;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;">

        </div>

        </div>

    </div>


    <!-- need empty space to push the footer down with different high resolution screens -->
    <div style="min-height: 50px;"></div>
