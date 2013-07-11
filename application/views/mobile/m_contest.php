<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bullet-Monkey Mobile Contest Entry</title>

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
            <h4>Enter August 2013 Contest</h4>
        </div>
        <div>
            <p>Win a $50 Gift Certificate to <a target="_blank" href="http://www.fsguns.com">Four Seasons</a> in Woburn, MA or <a target="_blank" href="http://www.americanweaponsystems.com/">American Weapon Systems</a> in Rindge, NH.
            </p>
            <p>Contest closes August 31st at 11:59PM EST. Prize drawing to occur and winner announced in September.</p>
        </div>


        <div>
            <form method="link" action="/contest/enter_contest"><input type="submit" class="button1" value="Redeem points and enter contest"></button></form>
        </div>
        <div>
           <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
                 <h4>How do you win?</h4>
               </div>
            <ol>
                <li>
                    <h4>Earn points</h4> Post ammo availability updates for your favorite local merchants to earn points, up to 125 per day.
                </li>
                <li>
                    <h4>Enter contests</h4> Exchange 500 points for each entry.
                </li>
                <li>
                    <h4>Win Prizes</h4> There's a new prize every month.
                </li>

            </ol>
        </div>
    </div><!-- /content -->



    <div data-role="footer" data-position="fixed">
            <?php $this->load->view("mobile/m_sub_nav.php");?>
    </div>

</div><!-- /page -->

</body>
</html>
