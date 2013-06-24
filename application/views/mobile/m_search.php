<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Bullet-Monkey Mobile Search</title>
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
<div data-role="page" id="search">
    <script type="text/javascript">
        jQuery('#search').live('pageinit', function(event){
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
                            jQuery('#products').selectmenu("refresh",true);
                        } //end success
                    }); //end AJAX
                }
            }); //end change
        });
    </script>

    <?php $this->load->view('mobile/m_header.php'); ?>

	<div data-role="content">

        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h4>Search</h4>
            <p>Search for in-stock ammunition near you.
        </div>
		<?php $this->load->helper('form'); ?>
	    <?php echo form_open('search') ?>



        <div data-role="fieldcontain">
            <label for="state">State:</label>
            <?php echo form_dropdown('state', $all_states, $user_state, 'id=state data-mini="true"') ?>
            <?php echo form_error('state'); ?>
        </div>

        <div data-role="fieldcontain">

            <label for="product_categories">Product Category:</label>
            <?php echo form_dropdown('product_categories', $product_categories, set_value('product_categories'), 'id="product_categories" data-mini="true"') ?>


        </div>

        <div data-role="fieldcontain">

            <label for="products">Product:</label>
            <?php echo form_dropdown('products', $products, set_value('product_id'), 'id="products" data-mini="true"') ?>


        </div>

        <div data-role="fieldcontain">
            <label for="all_products">Search All Products in Category: </label>
            <div style="position:absolute;top:24px;left:250px;"><input type="checkbox" name="all_products" value="Yes"></div>
        </div>

		<div>
			<input class="button" type="submit" name="submit" value="Search" />
		</div>


	    <?php echo form_close(); ?>		
		
	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
