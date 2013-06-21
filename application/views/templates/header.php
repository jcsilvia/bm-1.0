<html>
    <head>
        <title>bullet-monkey - <?php echo $title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link href="/css/main.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        <script type="text/JavaScript" src="/js/form_tooltips.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    </head>
    <body>
    <?php $this->load->view('analytics_tracking.php'); ?>
    <div class="wrap">
            <div class="header">
                        <div class="logo" align="left">
                            <a href="/home/"><img src="/images/bm-logo-7.gif"></a>
                       </div>


                <?php if ($this->session->userdata('memberid') == TRUE )
                        {
                            echo '<div class="logout" align="right"><a href="/home/logout">Logout</a></div>';
                        } ?>
            </div>






