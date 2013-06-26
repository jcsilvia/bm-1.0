<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#state').change(function(){
            var state_id = $('#state').val();
            if (state_id != ""){
                var post_url = "/post/get_vendors_no_city/" + state_id;
                jQuery.ajax({
                    type: "POST",
                    url: post_url,
                    success: function(vendors) //we're calling the response json array 'vendors'
                    {
                        jQuery('#vendors').empty();
                        jQuery.each(vendors,function(vendor_id,vendor)
                        {
                            var opt = $('<option />'); // here we're creating a new select option for each group
                            opt.val(vendor_id);
                            opt.text(vendor);
                            jQuery('#vendors').append(opt);
                        });
                    } //end success
                }); //end AJAX
            }
        }); //end change
    });
</script>


<div class="content">



    <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(function($){

            $("#phone_number").mask("(999) 999-9999");

        });
    </script>


    <?php $this->load->helper('form'); ?>
    <div class="settings_back_button"><a href="javascript:history.back()">Back</a></div>

    <?php echo form_open('post/add_vendor_address') ?>


    <div class="form" >
        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h3>Add Location for Existing Merchant</h3>
            <p>Add a new location to an existing merchant here. An example would be adding a new store location for a retail chain like Walmart, Dick's, or Bass Pro.
            </p>
        </div>

        <p>
            <label for="state">State:</label>
            <?php echo form_dropdown('state', $all_states, $user_state, 'id=state') ?>
            <?php echo form_error('state'); ?>
        </p>


        <p>
            <label for="vendors">Merchant:</label>
            <?php echo form_dropdown('vendors', $vendors, '',  'id=vendors') ?>
            <?php echo form_error('vendors'); ?>
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
            <label for="zipcode">Zipcode:</label>
            <input type="text" name="zipcode" size="10" value="<?php echo set_value('zipcode'); ?>">
            <?php echo form_error('zipcode'); ?>
        </p>



        <p>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" size="15" value="<?php echo set_value('phone_number'); ?>">
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
