

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

<div class="content">



    <?php $this->load->helper('form'); ?>


        <?php echo form_open('post/index') ?>


        <div class="form" >
            <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
                <h3>Update Availability</h3>
                <p>Update product availability for a local merchant in
                    <?php echo $user_state ?>
                </p>
                <p>Don't see your vendor?<a href="add_vendor"> Add new merchant here.</a></p>
            </div>




                <p>
                    <label for="state">State:</label>
                    <?php echo form_dropdown('state', $all_states, $user_state, 'id=state') ?>
                    <?php echo form_error('state'); ?>
                </p>



            <p>

                <label for="vendors">Merchant Name:</label>
                <?php echo form_dropdown('vendors', $vendors, set_value('address_id'), 'id="vendors"') ?>

            </p>

            <p>

                <label for="vendors">Product:</label>
                <?php echo form_dropdown('products', $products, set_value('product_id'), 'id="products"') ?>


            </p>


            <p>
                <label for="in_stock">In Stock:</label>
                <select name="in_stock">
                    <option value="Yes" selected>Yes</option>
                    <option value="No">No</option>
                </select>
            </p>

            <p>
                <label for="price">Price:</label>
                <input type="text" name="price" size="10" value="0.00"></p>
                <?php echo form_error('price'); ?>


            <p>
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" size="10" value="0"> </p>
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


