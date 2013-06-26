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
            echo '<div style="min-height: 750px;"></div>';
        }
        else
        {

            echo '<div style="min-height: 475px;"></div>';
        }
      
?>
        </div> <!-- end main-content div started in nav header -->

<?php
    if ($this->session->userdata('full_site'))
    {
        echo '<div class="footer-nav">/ <a href="/home/about">About</a> | <a href="/home/contact">Contact</a> | <a href="/home/privacy">Privacy Policy</a> | <a href="/home/terms">Terms of Use</a> | <a target="_blank" href="https://membership.nrahq.org/forms/signup.asp?CampaignID=nrajoin">Join the NRA</a> | <a href="/home/full_site">Mobile Site</a> | <a target="_blank" href="http://www.woundedwarriorproject.org/">Wounded Warrior Project</a> \</div>';
    }
    else
    {
        echo '<div class="footer-nav">/ <a href="/home/about">About</a> | <a href="/home/contact">Contact</a> | <a href="/home/privacy">Privacy Policy</a> | <a href="/home/terms">Terms of Use</a> | <a target="_blank" href="https://membership.nrahq.org/forms/signup.asp?CampaignID=nrajoin">Join the NRA</a> | <a target="_blank" href="http://www.woundedwarriorproject.org/">Wounded Warrior Project</a> \</div>';

    }
?>


</div> <!-- end wrap div started in header -->



        <div class="footer">




            <div class="chrome-optimized">
                <p><a href="http://www.google.com/chrome">Optimized for Chrome v22</a></p>
            </div>



            <div class="copyright">
                <p>&copy;2013 Bullet-Monkey LLC, All rights reserved</p>
            </div>



        </div>


    </body>
</html>
