<?php $this->load->helper('form'); ?>

<div class="main-content">

    <div style="min-height: 25px;"></div>

    <?php echo form_open('/login/reset_password') ?>


    <div class="form" >
        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h3>Change your password.</h3>
        </div>
        <p>
            <label for="password1">Enter new password</label>
            <input type="text" name="password1" size="20" value="<?php echo set_value('password1'); ?>"/>
            <?php echo form_error('password1'); ?><br><br>
            <label for="password2">Confirm new password</label>
            <input type="text" name="password2" size="20" value="<?php echo set_value('password2'); ?>"/>
            <?php echo form_error('password2'); ?>
            <div class="error">
                <?php echo $msg ?>
            </div>
        </p>
            <input type="hidden" name="validation_string" value="<?php echo $validation ?>"></hidden>
        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Submit" />
            </p>
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