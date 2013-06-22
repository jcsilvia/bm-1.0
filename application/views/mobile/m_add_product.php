<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bullet-Monkey Mobile Add Product</title>

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-templ.js"></script>
    <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>


</head>
<body>
<?php $this->load->view('analytics_tracking.php'); ?>
<div data-role="page">

    <?php $this->load->view('mobile/m_header.php'); ?>



    <?php $this->load->helper('form'); ?>


    <div data-role="content">

        <?php echo form_open('post/add_product') ?>




        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h4>Add New Product</h4>
                <p>Add a product to the Bullet-Monkey product list.
                </p>
        </div>




        <div data-role="fieldcontain">

            <label for="product_categories">Product Category:</label>
            <?php echo form_dropdown('product_categories', $product_categories, set_value('product_categories'), 'id="product_categories" data-mini="true"') ?>


        </div>

        <div data-role="fieldcontain">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" size="30" value="<?php echo set_value('product_name'); ?>" data-mini="true">
            <?php echo form_error('product_name'); ?>
        </div>

        <div data-role="fieldcontain">
            <label for="product_description">Product Description:</label>
            <input type="text" name="product_description" size="50" value="<?php echo set_value('product_description'); ?>" data-mini="true">
            <?php echo form_error('product_description'); ?>
        </div>

        <input type="hidden" name="category_id" value="1">


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
