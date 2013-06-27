<?php $this->load->helper('form'); ?>

<div class="main-content">

<div class="content">

    <div style="min-height: 25px;"></div>

<?php echo form_open('login/index') ?>

<div>

    <div class="login_form" >
        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;"><h3>Sign in to Bullet-Monkey</h3></div>
        <p>
            <label for="username">Username or Email</label>
            <input title="Enter your username or the email address used to sign up with Bullet-Monkey." type="text" name="username" size="20" value="<?php echo set_value('username'); ?>"/>
            <?php echo form_error('username'); ?>
        </p>
        <p>
            <label for="password">Password</label>
            <input title="Minimum 8 characters. Password is case-sensitive." type="password" name="password" size="15" />
            <?php echo form_error('password'); ?>
            <div class="error">
            <?php echo $msg ?>
            </div>
        </p>
        <div><p>Forgot your password? <a href="/login/forgot_password"> Reset it here.</a></p></div>
        <div><p>Don't have an account? <a href="/signup/"> Create one here.</a></p></div>



        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Sign in" />
            </p>
        </div>

    </div>

</div>

<?php echo form_close() ?>
    <div style="margin: 0 auto;width:600px;text-align: center;padding:10px;"><img src="/images/bm-220-k.jpg" style="border:solid;border-width: 1px;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;">
    </div>

</div>


    <!-- need empty space to push the footer down with different high resolution screens -->
<?php   $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");

if ($ipad == true)
{
    echo '<div style="min-height: 350px;"></div>';
}
else
{

    echo '<div style="min-height: 75px;"></div>';
}

?>