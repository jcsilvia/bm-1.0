<?php $this->load->helper('form'); ?>


    <div class="content">

        <div style="min-height: 25px;"></div>

        <div class="settings_back_button"><a href="javascript:history.back()">Back</a></div>
    <?php echo form_open('settings/change_password') ?>



    <div class="form" >

        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;"><h3>Change Password</h3><p>Update your prior password here.</p></div>

        <p>
            <label for="username">Previous Password:</label>
            <input title="Must be at least 8 characters and no longer than 15 characters. Password is case-sensitive." type="password" name="oldpassword" size="20" value="<?php echo set_value('oldpassword'); ?>"/>
            <?php echo form_error('oldpassword'); ?>
        </p>
        <p>
            <label for="username">New Password:</label>
            <input title="Must be at least 8 characters and no longer than 15 characters. Password is case-sensitive." type="password" name="newpassword1" size="20" value="<?php echo set_value('newpassword1'); ?>"/>
            <?php echo form_error('newpassword1'); ?>
        </p>
        <p>
            <label for="username">Confirm New Password:</label>
            <input title="Must be at least 8 characters and no longer than 15 characters. Password is case-sensitive." type="password" name="newpassword2" size="20" value="<?php echo set_value('newpassword2'); ?>"/>
            <?php echo form_error('newpassword2'); ?>
            <div class="error">
                <?php echo $msg ?>
            </div>
        </p>

        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Update Password" />
            </p>
        </div>

    </div>



    <?php echo form_close() ?>

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
    echo '<div style="min-height: 750px;"></div>';
}
else
{

    echo '<div style="min-height: 475px;"></div>';
}

?>