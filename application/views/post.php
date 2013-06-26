

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#state').change(function(){
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
                    } //end success
                }); //end AJAX
            }
        }); //end change
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#product_categories').change(function(){
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
                    } //end success
                }); //end AJAX
            }
        }); //end change
    });
</script>

<div class="content">



    <?php $this->load->helper('form'); ?>


        <?php echo form_open('post/index') ?>


        <div class="form" >
            <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
                <h3>Update Availability</h3>
                <p>Update product availability for a local merchant.
                </p>
                <p>Don't see your favorite local merchant?<a href="/post/add_vendor"> Add new merchant to the merchant drop-down here.</a></p>
                <p>Need to add a new location for an existing merchant?<a href="/post/add_vendor_address"> Add a new address to an existing merchant here. [ex. Walmart, Dicks, Bass Pro]</a></p>
                <p>Don't see your favorite ammo listed?<a href="/post/add_product"> Add new ammo to product drop-down here.</a></p>
            </div>




                <p>
                    <label for="state">State:</label>
                    <?php echo form_dropdown('state', $all_states, $user_state, 'id=state') ?>
                    <?php echo form_error('state'); ?>
                </p>



            <p>

                <label for="vendors">Merchant:</label>
                <?php echo form_dropdown('vendors', $vendors, set_value('address_id'), 'id="vendors"') ?>

            </p>


            <p>

                <label for="product_categories">Product Category:</label>
                <?php echo form_dropdown('product_categories', $product_categories, set_value('product_categories'), 'id="product_categories"') ?>


            </p>

            <p>

                <label for="products">Product:</label>
                <?php echo form_dropdown('products', $products, set_value('product_id'), 'id="products"') ?>


            </p>


            <p>
                <label for="in_stock">In Stock:</label>
                <select title="Enter the status of the product in question here. If it is not in stock for this store, leave the price and quantity below as 0" name="in_stock">
                    <option value="Yes" selected>Yes</option>
                    <option value="No">No</option>
                </select>
            </p>

            <p>
                <label for="price">Price:</label>
                <input title="Enter the price per box here. If not in stock, leave as 0.00" type="text" name="price" size="10" value="0.00"></p>
                <?php echo form_error('price'); ?>


            <p>
                <label for="quantity">Quantity:</label>
                <input title="Enter the number of rounds/shells per box here. If not in stock, leave as 0" type="text" name="quantity" size="10" value="0"> </p>
                <?php echo form_error('quantity'); ?>



            <div>
                <p>
                    <input class="button1" type="submit" name="submit" value="Update Availability" />
                </p>
            </div>



            <?php echo form_close() ?>
        </div>


    <div><p></p></div>


</div>


<!-- need empty space to push the footer down with different high resolution screens -->
<?php   $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$winphone = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");

if ($iphone || $android || $palmpre || $ipod || $berry || $winphone ||$ipad == true)
{
    echo '<div style="min-height: 750px;"></div>';
}
else
{

    echo '<div style="min-height: 475px;"></div>';
}

?>