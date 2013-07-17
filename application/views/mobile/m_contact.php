<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bullet-Monkey Mobile Contact Support</title>

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-templ.js"></script>
</head>
<body>
<?php $this->load->view('analytics_tracking.php'); ?>
<div data-role="page">

    <?php $this->load->view('mobile/m_header.php'); ?>

    <div data-role="content">


        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h4>Contact Us</h4>
        </div>
        <div>
            <p>For General or Customer Support questions, please contact us at <a href="mailto:support@bullet-monkey.com">support@bullet-monkey.com</a></p>



            


        </div>


    </div><!-- /content -->



    <div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
    </div>

</div><!-- /page -->

</body>
</html>
