<div class="content">
    <div style="padding:10px;">
        <h3>About Us</h3>
    </div>
    <div style="width:600px;margin:0 auto;padding:10px;">
        <div style="padding:10px;border:solid;border-width: 1px;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;">


            <p><img src="/images/bm-snipe-graphic-white.gif" style="float:left;padding-right: 10px;">
                Bullet-Monkey.com started out as an idea to help shooting enthusiasts find fairly priced ammunition locally in the crazy period after the 2012 Presidential Election. Greatly increased demand
                created shortages of common calibers and ammunition prices, when it could be found, varied greatly.
            </p>

            <p>As active participants in the shooting sports community, we came up with the idea to help all of us continue to enjoy shooting. Feedback
                from our fellow shooters was enthusiastic and so Bullet-Monkey was born.
            </p>

            <p>
                Bullet-Monkey.com is a small tech start-up based in Boston, Massachusetts. Our mission is to use technology to promote responsible firearms ownership and use. We're techies who love guns.
            </p>

            <p>Bullet-Monkey.com supports the 2nd Amendment and Americans' fundamental right to keep and bear arms. We support the <a target="_blank" href="http://www.nra.org">NRA</a> and it's mission to promote responsible firearms
            ownership and the 2nd Amendment. As veterans and former members of the US military, we salute and support those who serve and sacrifice so that we may continue to exercise our freedoms. To that end we encourage everyone to donate to <a target="_blank" href="http://www.woundedwarriorproject.org/">The Wounded Warrior Project.</a>
            </p>

            <p>When we're not working on Bullet-Monkey, we're shooting at <a target="_blank" href="http://www.tauntonrifleandpistol.org/">Taunton Rifle & Pistol</a> or the <a target="_blank" href="http://www.newbedford-ma.gov/publicfacilities/parkrecreation/rifle_range.html">New Bedford Rifle Range</a>. If you see us at the range, stop by... we love to meet others in the shooting community.
            </p>


        </div>


    </div>
    <div style="margin: 0 auto;width:600px;text-align: center;padding:10px;"><img src="/images/bm_lr308.jpg" style="border:solid;border-width: 1px;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;"></div>
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
    echo '<div style="min-height: 150px;"></div>';
}
else
{

    echo '<div style="min-height: 50px;"></div>';
}

?>






