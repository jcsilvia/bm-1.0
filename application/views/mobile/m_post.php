<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bullet-Monkey Mobile Update Availability</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
        $(document).bind("mobileinit", function(){
            $.mobile.ajaxEnabled = false;
        });
    </script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-templ.js"></script>

</head>
<body>
<?php $this->load->view('analytics_tracking.php'); ?>
<div data-role="page" id="post">

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
                            jQuery.each(vendors,function(address_id,vendor)
                            {
                                var opt = $('<option />'); // here we're creating a new select option for each group
                                opt.val(address_id);
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

    <script type="text/javascript">
        jQuery('#post').live('pageinit',function(event){
            jQuery('#product_categories').bind('change', function(event){
                var product_subcategory_id = $('#product_categories').val();
                if (product_subcategory_id != ""){
                    var post_url = "/post/get_products/" + product_subcategory_id;
                    jQuery.ajax({
                        type: "POST",
                        url: post_url,
                        success: function(products) //we're calling the response json array 'products'
                        {
                            jQuery('#products').empty();
                            jQuery.each(products,function(product_id,product_name)
                            {
                                var opt = $('<option />'); // here we're creating a new select option for each group
                                opt.val(product_id);
                                opt.text(product_name);
                                jQuery('#products').append(opt);
                            });
                            jQuery('#products').selectmenu('refresh',true);
                        } //end success
                    }); //end AJAX
                }
            }); //end change
        });
    </script>
    <?php $this->load->view('mobile/m_header.php'); ?>



        <?php $this->load->helper('form'); ?>


    <div data-role="content">


        <?php echo form_open('post/index') ?>



            <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
                <h4>Update Availability</h4>
                <p>Update product availability for a local merchant.
                <p>Don't see your favorite local merchant?<a href="/post/add_vendor"> <br>Add new merchant here.</a></p>
                <p>Need to add a new location for an existing merchant?<a href="/post/add_vendor_address"> Add a new address to an existing merchant here.</a></p>
                <p>Don't see your favorite ammo listed?<a href="/post/add_product"> <br>Add new ammo product here.</a></p>
            </div>




            <div data-role="fieldcontain">
                <label for="state">State: </label>
                <?php echo form_dropdown('state', $all_states, $user_state->state, 'id=state data-mini="true"') ?>
                <?php echo form_error('state'); ?>
            </div>



            <div data-role="fieldcontain">

                <label for="vendors">Merchant: </label>
                <?php echo form_dropdown('vendors', $vendors, set_value('address_id'), 'id=vendors data-mini="true"') ?>

            </div>


            <div data-role="fieldcontain">

                <label for="product_categories">Product Category: </label>
                <?php echo form_dropdown('product_categories', $product_categories, set_value('product_categories'), 'id=product_categories data-mini="true"') ?>


            </div>

            <div data-role="fieldcontain">

                <label for="products">Product: </label>
                <?php echo form_dropdown('products', $products, set_value('products'), 'id=products data-mini="true"') ?>


            </div>


            <div data-role="fieldcontain">
                <label for="in_stock">In Stock: </label>
                <select name="in_stock" data-mini="true" title="Enter the status of the product in question here. If it is not in stock for this store, leave the price and quantity below as 0" id="in_stock">
                    <option value="Yes" selected>Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div data-role="fieldcontain">
                <label for="price">Price: </label>
                <input type="number" pattern="\d+\.\d\d" name="price" size="10" value="0.00" id="price" data-mini="true" title="Enter the price per box here in the format 20.95  or 10.00. If not in stock, leave as 0.00">
            <?php echo form_error('price'); ?>


            </div>

            <div data-role="fieldcontain" >
                <label for="quantity">Quantity: </label>
                <input type="number" name="quantity" size="10" value="0" id="quantity" data-mini="true" title="Enter the number of rounds/shells per box here. If not in stock, leave as 0">
            <?php echo form_error('quantity'); ?>
            </div>


            <div>
                    <input class="button1" type="submit" name="submit" value="Update Availability" data-mini="true" />
            </div>



            <?php echo form_close() ?>






    </div><!-- /content -->

    <div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>


    </div>

</div><!-- /page -->

</body>
</html>
