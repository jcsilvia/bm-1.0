<div style="min-height: 20px;"></div>
<div class="content">

    <div class="contest_col" style="text-align: center">
        <div style="border:1px solid;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;">
            <div style="border-bottom:1px solid;">
                <h2 style="color: red;">August 2013 Contest Prize</h2>
            </div>
            <div>
                <h4 >Win a $50 Gift Certificate to <a target="_blank" href="http://www.fsguns.com">Four Seasons</a> in Woburn, MA or <a target="_blank" href="http://www.americanweaponsystems.com/">American Weapon Systems</a> in Rindge, NH.
                </h4>
                <p>Contest closes August 31st at 11:59PM EST. Prize drawing to occur and winner announced in September.</p>
            </div>
            <div>
                <form method="link" action="/contest/enter_contest"><input type="submit" class="button1" value="Redeem points and enter contest"></button></form>
            </div>
            <div style="text-align: center">
                <a href="/contest/contest_rules">Contest terms and conditions</a>
            </div>
        </div>
    </div>

    <div class="contest_col-2"  style="text-align: center">
        <div style="margin-left: 65%;">
            <div style="background-color: black;color:white; border:1px solid black;border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px;"><h3>How do you win?</h3></div>
            <div style="border:1px solid black;"><h3>1. Earn Points</h3>
                <p>Post ammo availability updates for your favorite local merchants to earn points, up to 125 per day.</p></div>
            <div style="border:1px solid black;"><h3>2. Enter Contest</h3>
                <p></p>Exchange 500 points for each entry.</p></div>
            <div style="border:1px solid black;border-radius: 0px 0px 10px 10px; -moz-border-radius: 0px 0px 10px 10px; -webkit-border-radius: 0px 0px 10px 10px;"><h3>3. Win Prizes</h3>
                <p>New prizes every month.</p></div>
        </div>
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