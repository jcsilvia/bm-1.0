<html>
<head>
    <title>Bullet-Monkey - crowd-sourcing the search for in-stock ammunition</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Crowd-sourcing the search for local, in-stock ammunition like 5.56, 9mm, .45ACP, and .22lr.">
    <meta name="keywords" content="Bullet Monkey,ammo,ammunition,firearms,in-stock,223,556,9mm,22lr,308,45ACP,ar15,glock,ak47"  />
    <meta property="og:image" content="http://www.bullet-monkey.com/images/bm_icon2.gif" />
    <meta property="og:title" content="bullet-monkey" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.bullet-monkey.com" />
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>

</head>
<body>
<?php $this->load->view('analytics_tracking.php'); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrap">

    <div class="header">
        <div class="logo" align="left"><a href="/home">
<img src="/images/bm-logo-7.gif"></a>
        </div>
        <?php if ($this->session->userdata('memberid') == TRUE )
    {
        echo '<div class="logout" align="right"><a href="/home/logout">Logout</a></div>';
    } ?>
    </div>
    <div class="main-content">
