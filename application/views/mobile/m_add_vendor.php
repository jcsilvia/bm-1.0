<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bullet-Monkey Mobile Add Merchant</title>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).bind("mobileinit", function(){
            $.mobile.ajaxEnabled = false;
        });
    </script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-templ.js"></script>
    <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(function($){

            $("#phone_number").mask("(999) 999-9999");

        });
    </script>

    <script type="text/javascript">
        jQuery('#add_vendor').live('pageinit', function (event) {
            jQuery('#city').autocomplete({
                source: function(request,response){
                    jQuery.ajax({
                        url: '/post/get_cities',
                        dataType: "json",
                        data: {
                            term : request.term,
                            state : $('#state').val()
                        },
                        success: function(data) {
                            response(data);
                        },
                        minLength: 3
                    });
                }
            });
        });
    </script>

</head>
<body>
<?php $this->load->view('analytics_tracking.php'); ?>
<div data-role="page" id="add_vendor">

    <?php $this->load->view('mobile/m_header.php'); ?>



    <?php $this->load->helper('form'); ?>


    <div data-role="content">

        <?php echo form_open('post/add_vendor') ?>




        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h4>Add Merchant</h4>
            <p>Add a local merchant here.</p>
        </div>


        <div data-role="fieldcontain">
            <label for="vendor_name">Merchant Name:</label>
            <input type="text" name="vendor_name" size="30" value="<?php echo set_value('vendor_name'); ?>" data-mini="true">
            <?php echo form_error('vendor_name'); ?>
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
            <label for="state">State:</label>
            <?php echo form_dropdown('state', $all_states, $user_state->state,'id=state data-mini="true"') ?>
            <?php echo form_error('state'); ?>
        </div>



        <div data-role="fieldcontain">
            <label for="city">City:</label>
            <?php

            $data=array(
                'name' => 'city',
                'id' => 'city',
                'data-mini' => "true",
                'value' => $user_state->city
            );

            echo form_input($data) ?>
            <?php echo form_error('city'); ?>

        </div>



        <div data-role="fieldcontain">
            <label for="zipcode">Zipcode:</label>
            <input type="text" pattern="\d+\" name="zipcode" size="10" value="<?php echo set_value('zipcode'); ?>" data-mini="true" title="Enter 5-digit zipcode here">
            <?php echo form_error('zipcode'); ?>
        </div>



        <div data-role="fieldcontain">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" size="15" value="<?php echo set_value('phone_number'); ?>" data-mini="true" title="Enter phone number in the format (xxx)xxx-xxxx">
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
