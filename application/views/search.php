<?php $this->load->helper('form'); ?>

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

            <label for="product_categories">Product Category:</label>
            <?php echo form_dropdown('product_categories', $product_categories, set_value('product_categories'), 'id="product_categories"') ?>


        </p>

        <p>

            <label for="products">Product:</label>
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
