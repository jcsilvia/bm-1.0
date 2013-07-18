<html>
    <head>
        <title>Bullet-Monkey - <?php echo $title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link href="/css/main.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        <script type="text/JavaScript" src="/js/form_tooltips.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    </head>
    <body>
    <?php $this->load->view('analytics_tracking.php'); ?>
    <div class="wrap">
            <div class="header">
                        <div class="logo" align="left">
                            <a href="/home/"><img src="/images/bm-logo-7.gif"></a>
                       </div>

                <div class="twitter" align="right" style="position:relative;top:55px;right:10px;">
                    <a target="_blank" href="http://www.twitter.com/bulletmonkeyusa">
                        <img src="/images/twitter-bird-white-on-blue.jpg">
                    </a>
                </div>
                <?php if ($this->session->userdata('memberid') == TRUE )
                        {
                            echo '<div class="logout" align="right"><a href="/home/logout">Logout</a></div>';
                        } ?>
            </div>






