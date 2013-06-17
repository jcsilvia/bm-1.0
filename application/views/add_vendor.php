<div class="content">



    <?php $this->load->helper('form'); ?>
    <div class="settings_back_button"><a href="javascript:history.back()">Back</a></div>

    <?php echo form_open('post/add_vendor') ?>


    <div class="form" >
        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h3>Add New Merchant</h3>
            <p>Add a local merchant here.
            </p>
        </div>



        <p>
            <label for="vendor_name">Merchant Name:</label>
            <input type="text" name="vendor_name" size="30" value="<?php echo set_value('vendor_name'); ?>">
        <?php echo form_error('vendor_name'); ?>
        </p>

        <p>
            <label for="address1">Address 1:</label>
            <input type="text" name="address1" size="30" value="<?php echo set_value('address1'); ?>">
        <?php echo form_error('address1'); ?>
        </p>

        <p>
            <label for="address2">Address 2:</label>
            <input type="text" name="address2" size="30" value="<?php echo set_value('address2'); ?>">
        <?php echo form_error('address2'); ?>
        </p>

        <p>
            <label for="city">City:</label>
            <input type="text" name="city" size="30" value="<?php echo set_value('city'); ?>">
        <?php echo form_error('city'); ?>
        </p>


        <p>
                <label for="state">State:</label>
                <?php echo form_dropdown('state', $all_states, $user_state) ?>
        <?php echo form_error('state'); ?>
        </p>

        <p>
            <label for="zipcode">Zipcode:</label>
            <input type="text" name="zipcode" size="10" value="<?php echo set_value('zipcode'); ?>">
        <?php echo form_error('zipcode'); ?>
        </p>

        <p>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" size="15" value="<?php echo set_value('phone_number'); ?>">
        <?php echo form_error('phone_number'); ?>
        </p>


        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Submit" />
            </p>
        </div>



        <?php echo form_close() ?>
    </div>





</div>
