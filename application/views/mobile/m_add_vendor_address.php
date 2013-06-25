<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bullet-Monkey Mobile Add Merchant Address</title>

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-templ.js"></script>
    <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(function($){

            $("#phone_number").mask("(999) 999-9999");

        });
    </script>

</head>
<body>
<?php $this->load->view('analytics_tracking.php'); ?>
<div data-role="page">

    <?php $this->load->view('mobile/m_header.php'); ?>



    <?php $this->load->helper('form'); ?>


    <div data-role="content">

        <script type="text/javascript">
            jQuery('#post').live('pageinit',function(event){
                jQuery('#state').bind('change', function(event){
                    var state_id = $('#state').val();
                    if (state_id != ""){
                        var post_url = "/post/get_vendors/" + state_id;
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
                                jQuery('#vendors').selectmenu('refresh',true);
                            } //end success
                        }); //end AJAX
                    }
                }); //end change
            });
        </script>

        <?php echo form_open('post/add_vendor_address') ?>




        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h4>Add Location for Existing Merchant</h4>
            <p>Add a new location to an existing merchant here. An example would be adding a new store location for a retail chain like Walmart, Dick's, or Bass Pro.</p>
        </div>

        <div data-role="fieldcontain">
            <label for="state">State:</label>
            <?php echo form_dropdown('state', $all_states, $user_state,'id=state data-mini="true"') ?>
            <?php echo form_error('state'); ?>
        </div>

        <div data-role="fieldcontain">
            <label for="vendors">Merchant:</label>
            <?php echo form_dropdown('vendors', $vendors, 'id="vendors" data-mini="true"') ?>
            <?php echo form_error('vendors'); ?>
        </div>


        <div data-role="fieldcontain">
            <label for="address1">Address 1:</label>
            <input type="text" name="address1" size="30" value="<?php echo set_value('address1'); ?>" data-mini="true">
            <?php echo form_error('address1'); ?>
        </div>

        <div data-role="fieldcontain">
            <label for="address2">Address 2:</label>
            <input type="text" name="address2" size="30" value="<?php echo set_value('address2'); ?>" data-mini="true">
            <?php echo form_error('address2'); ?>
        </div>

        <div data-role="fieldcontain">
            <label for="city">City:</label>
            <input type="text" name="city" size="30" value="<?php echo set_value('city'); ?>" data-mini="true">
            <?php echo form_error('city'); ?>
        </div>




        <div data-role="fieldcontain">
            <label for="zipcode">Zipcode:</label>
            <input type="number" name="zipcode" size="10" value="<?php echo set_value('zipcode'); ?>" data-mini="true">
            <?php echo form_error('zipcode'); ?>
        </div>



        <div data-role="fieldcontain">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" size="15" value="<?php echo set_value('phone_number'); ?>" data-mini="true">
            <?php echo form_error('phone_number'); ?>
        </div>


        <div>
            <input class="button1" type="submit" name="submit" value="Submit" data-mini="true" />
        </div>



        <?php echo form_close() ?>






    </div><!-- /content -->

    <div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
    </div>

</div><!-- /page -->

</body>
</html>
