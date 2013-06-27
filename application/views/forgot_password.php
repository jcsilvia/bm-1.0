<?php $this->load->helper('form'); ?>

<div class="main-content">

    <div class="content">

        <div style="min-height: 25px;"></div>

    <?php echo form_open('/login/forgot_password') ?>


    <div class="login_form" >
        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;">
            <h3>Forgot your password?</h3>
        </div>
        <p>
            <label for="username">Enter username or email</label>
            <input type="text" name="username" size="50" value="<?php echo set_value('username'); ?>"/>
            <?php echo form_error('username'); ?>
        </p>
        <div><p>Have an account? <a href="/login/"> Login here.</a></p></div>
        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Submit" />
            </p>
        </div>

    </div>



    <?php echo form_close() ?>

    </div>

    <!-- need empty space to push the footer down with different high resolution screens -->
<?php   $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");

if ($ipad == true)
{
    echo '<div style="min-height: 775px;"></div>';
}
else
{

    echo '<div style="min-height: 550px;"></div>';
}

?>