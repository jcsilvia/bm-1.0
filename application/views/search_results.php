<?php $this->load->helper('text'); ?>
<?php $this->load->helper('form'); ?>


<div class="content">


    <?php
    echo '<div class="text" style=" text-align: center; padding-bottom: 15px;"><a href="/search">Perform Another Search</a></div>';
    ?>

    <?php
    echo '<div class="ammo_heading">Search In-stock Ammo Prices for <span style="color:red;">';
    echo $product_name;
    echo '</span> in ';
    echo $search_state;
    echo '</div><div class="ammo_container" style="padding: 15px;">';

    if (count($searches) > 0) {
        echo '<div id="content"><div class="col col-1"><b>Vendor:</b></div><div class="col col-2"><b>Price Per Round:</b></div><div class="col col-3"><b>City:</b></div><div class="col col-4"><b>Last Updated:</b></div></div>';
    }
    ?>

    <?php if (count($searches) < 1) {
        echo '<div style=" text-align: center;font-family:helvetica,sans-serif;font-size:.9em;padding:10px;">There is no current data for ';
        echo $product_name;
        echo ' in ';
        echo $search_state;
        echo '. Please check back soon.</div>';

    }
    ?>


    <?php foreach ($searches as $search): ?>


        <div id="content">
            <div class="col col-1"><a href="/profile/<?php echo $search['address_id'] ?>"> <?php  echo $search['vendor'] ?></a></div>
            <div class="col col-2"> $<?php  echo $search['price'] ?>/round</div>
            <div class="col col-3"> <?php  echo $search['city'] ?> </div>
            <div class="col col-4"> <?php  echo $search['last_updated'] ?> hours ago</div>
        </div>


    <?php endforeach ?>


</div>

    <div class="text" style="position:relative; padding-top: 5;padding-left: 10;">
        <?php
        if (count($searches) > 0) {
            echo $total;
            echo ' results found';
        }
        ?>

        <div class="text" style="text-align: right; position:absolute; right:0; top:0; padding-top: 5;padding-right: 10;"> <?php echo $links; ?> </div>
    </div>



</div>
