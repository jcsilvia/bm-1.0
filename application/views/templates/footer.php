
        </div> <!-- end main-content div started in nav header -->

<?php
    if ($this->session->userdata('full_site'))
    {
        echo '<div class="footer-nav"> <a href="/home/about">About</a> | <a href="/home/contact">Contact</a> | <a href="/home/privacy">Privacy Policy</a> | <a href="/home/terms">Terms of Use</a> | <a target="_blank" href="https://membership.nrahq.org/forms/signup.asp?CampaignID=nrajoin">Join the NRA</a> | <a href="/home/full_site">Mobile Site</a> | <a target="_blank" href="http://www.woundedwarriorproject.org/">Wounded Warrior Project</a> </div>';
    }
    else
    {
        echo '<div class="footer-nav"> <a href="/home/about">About</a> | <a href="/home/contact">Contact</a> | <a href="/home/privacy">Privacy Policy</a> | <a href="/home/terms">Terms of Use</a> | <a target="_blank" href="https://membership.nrahq.org/forms/signup.asp?CampaignID=nrajoin">Join the NRA</a> | <a target="_blank" href="http://www.woundedwarriorproject.org/">Wounded Warrior Project</a> </div>';

    }
?>


</div> <!-- end wrap div started in header -->



        <div class="footer">




            <div class="chrome-optimized">
                <p><a href="http://www.google.com/chrome">Optimized for Chrome v22</a></p>
            </div>



            <div class="copyright">
                <p>&copy;2013 Bullet-Monkey LLC<br>All rights reserved</p>
            </div>



        </div>


    </body>
</html>
