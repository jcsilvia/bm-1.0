
<div class="content">
    <div style="padding:10px;">
        <h3>Contact Us</h3>
    </div>
    <div style="width:600px;margin:0 auto;padding:10px;">
    <div style="padding:10px;border:solid;border-width: 1px;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;">
    <p>For General or Customer Support questions, please contact us at <br><a href="mailto:support@bullet-monkey.com">support@bullet-monkey.com</a></p>

        <div style="position:relative;left:50px;top:35px;">Follow us on Twitter <a target="_blank" href="http://www.twitter.com/bulletmonkeyusa">@bulletmonkeyusa</a></div>
        <a target="_blank" href="http://www.twitter.com/bulletmonkeyusa"><img src="/images/twitter-bird-blue-on-white.jpg"></a>
        <div style="min-height: 20px;"></div>
    </div>


    </div>
    <div style="margin: 0 auto;width:600px;text-align: center;padding:10px;"><img src="/images/bm_ak.jpg" style="border:solid;border-width: 1px;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;">

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
    echo '<div style="min-height: 400px;"></div>';
}
else
{

    echo '<div style="min-height: 100px;"></div>';
}

?>