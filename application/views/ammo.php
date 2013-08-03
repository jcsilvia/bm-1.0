<div class="content">


    <div style="height: 25px;"></div>
    <div style="width:800px;" class="online_ammo_nav">

        <?php echo '| '; ?>
    <?php foreach ($ammo_nav as $nav): ?>
        <?php

            if($nav['url'] != $ammo_type)
            {
                echo '<a href="/ammo/';
                echo $nav['url'];
                echo '">';
            }
            if($nav['url'] == $ammo_type) {echo '<b>';}
            echo $nav['category_name'];
            if($nav['url'] == $ammo_type) {echo '</b>';}
            if($nav['url'] != $ammo_type)
            {
                echo '</a>';
            }
            echo ' |';
        ?>
    <?php endforeach ?>

    </div>
    <div style="height: 25px;"></div>
    <div style="width:800px;position:relative; ">


        <div class="ammo_heading"><h1 style="font-size: 1.25em;">Latest In-Stock <?php echo $ammo_type ?> Ammo Available Online</h1></div><div class="ammo_container">





            <?php
            if (count($online_ammo) > 0) {
                echo '<div id="content">
                        <div class="three_col-1"><b>Ammo:</b></div>
                        <div class="three_col-2">
                            <div class="three_col-2-1"><b>Price:</b></div>
                            <div class="three_col-2-2"><b>Last Updated:</b></div>
                        </div>
                      </div>';
            }
            ?>
            <div id="content">

                <?php if (count($online_ammo) == 0) {
                    echo '<div style="font-weight: bold; text-align: center;font-family:helvetica,sans-serif;font-size:.9em;padding:10px;">There is no current data. Please check back again shortly.</div>';
                }
                ?>
                <?php if (count($online_ammo) > 0){ $var_count = 1; }; ?>
                <?php foreach ($online_ammo as $latest_updates): ?>



                <div class="three_col-1"><?php if($var_count > 0) { echo $var_count . '. '; } ?><a href="<?php echo $latest_updates['product_url'] ?>"> <?php  echo $latest_updates['title'] ?></a></div>
                <div class="three_col-2">
                <div class="three_col-2-1"> <?php if (count($online_ammo) > 0){echo '$';}  echo $latest_updates['price']; echo ' [$'; echo $latest_updates['price_per_round']; echo '/rd]'; ?></div>
                <div class="three_col-2-2">
                    <?php
                    if (count($online_ammo) > 0) {

                            echo round(($latest_updates['last_updated_date']),0);
                            echo ' minutes ago @';
                            echo $latest_updates['vendor_name'];
                            echo '</div>';

                    }

                    ?>
                </div>


                    <?php $var_count = $var_count + 1; ?>
                    <?php endforeach ?>

                </div>
            </div>

            <div style="min-height: 50px;"></div>

            </div>

        </div>

    </div>