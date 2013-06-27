<div class="content">




    <?php $this->load->helper('form'); ?>
    <div class="settings_back_button"><a href="javascript:history.back()">Back</a></div>

    <?php echo form_open('post/add_product') ?>


    <div class="form" >
        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h3>Add New Product</h3>
            <p>Add a product to the Bullet-Monkey product list.
            </p>
        </div>



        <p>

            <label for="product_categories">Product Category:</label>
            <?php echo form_dropdown('product_categories', $product_categories, set_value('product_categories'), 'id="product_categories"') ?>


        </p>

        <p>
            <label for="product_name">Product Name:</label>
            <input title="Enter a name for this product. Example: Federal XM193 5.56mm" type="text" name="product_name" size="30" value="<?php echo set_value('product_name'); ?>">
            <?php echo form_error('product_name'); ?>
        </p>

        <p>
            <label for="product_description">Product Description:</label>
            <input title="Enter a description for this product. Example: Federal Premium Personal Defense 9mm Luger 124gr Hydra-Shok Jacketed Hollow Point" type="text" name="product_description" size="50" value="<?php echo set_value('product_description'); ?>">
            <?php echo form_error('product_description'); ?>
        </p>

            <input type="hidden" name="category_id" value="1">

        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Submit" />
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