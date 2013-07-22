

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

<script type="text/javascript" >

    jQuery(document).ready(function() {

        jQuery('#city').autocomplete({
            source: function(request, response) {
                jQuery.ajax({
                    url: '/search/get_cities',
                    dataType: "json",
                    data: {
                        term : request.term,
                        state : $('#state').val()
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 3
        });
    });
</script>




    <div style="min-height: 20px;"></div>
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
            <?php echo form_dropdown('state', $all_states, $user_state->state, 'id=state') ?>
            <?php echo form_error('state'); ?>
        </p>

        <p>
            <label for="city">City:</label>
            <?php

            $data=array(
                'name' => 'city',
                'id' => 'city',
                'size' => '30',
                'value' => $user_state->city
            );

            echo form_input($data) ?>
            <?php echo form_error('city'); ?>

        </p>

        <p>
            <label for="distance">Distance to Search: </label>
            <?php
            $options = array(
                '10' => '10 miles',
                '30' => '30 miles',
                '50' => '50 miles',
                '100' => '100 miles',
                '300' => '300 miles'
            );
            ?>

            <?php echo form_dropdown('distance', $options, '30', 'id=distance data-mini="true"') ?>
            <?php echo form_error('distance'); ?>
        </p>

        <p>

            <label for="product_categories">Product Category:</label>
            <?php echo form_dropdown('product_categories', $product_categories, set_value('product_categories'), 'id="product_categories"') ?>


        </p>

        <p>

            <label for="products">Product:</label>
            <?php echo form_dropdown('products', $products, set_value('product_id'), 'id="products"') ?>


            <label for="all_products" style="position:relative; right:-40px;">Search All Products:</label>
            <input type="checkbox" name="all_products" value="Yes" style="position:relative; right:-40px;">
        </p>


        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Search" />
            </p>
        </div>

        <?php echo form_close() ?>

    </div>


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