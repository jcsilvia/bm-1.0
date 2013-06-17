<?php $this->load->helper('form'); ?>


<div class="content">



    <?php echo form_open('search') ?>

    <div class="form" >
        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h3>Search</h3>
            <p>
                Search for in-stock ammunition near you.
            </p>

        </div>




        <p>
            <label for="state">State:</label>
            <?php echo form_dropdown('state', $all_states, $user_state, 'id=state') ?>
            <?php echo form_error('state'); ?>
        </p>

        <p>

            <label for="vendors">Ammunition:</label>
            <?php echo form_dropdown('products', $products, set_value('product_id'), 'id="products"') ?>


        </p>


        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Search" />
            </p>
        </div>

        <?php echo form_close() ?>

    </div>


</div>
