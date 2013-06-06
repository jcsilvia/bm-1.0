<?php $this->load->helper('form'); ?>

<div class="main-content">

<div class="content">

    <div style="min-height: 50px;"></div>

<?php echo form_open('signup/index') ?>


<div>

<div class="form" >
    <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;"><h3>Sign up with Bullet-Monkey today.</h3></div>
<p>
<label for="username">Username</label>
<input title="Must be at least 5 characters and no longer than 20 characters." type="text" name="username" size="20" value="<?php echo set_value('username'); ?>"/>
<?php echo form_error('username'); ?>
</p>
<p>
<label for="password">Password</label>
<input title="Must be at least 8 characters and no longer than 15 characters. Password is case-sensitive." type="password" name="password" size="15" />
<?php echo form_error('password'); ?>
</p>
<p>
<label for="email">Email Address</label>
<input title="The primary email address you would like to use for communication with Bullet-Monkey. We will send you a verification email to confirm the email you provided." type="text" name="email" size="50" value="<?php echo set_value('email'); ?>" />
 <?php echo form_error('email'); ?>
</p>
<p>
<label for="zipcode">Zipcode</label>
<input title="The 5-digit zip for your primary location." type="text" name="zipcode" size="5" value="<?php echo set_value('zipcode'); ?>" />
 <?php echo form_error('zipcode'); ?>
</p>

        Already have an account? <a href="/login/">Sign in here.</a>
</p>
    <div>
        <p>
            <input class="button1" type="submit" name="submit" value="Create my account" />
        </p>
    </div>
</div>

</div>
<?php echo form_close() ?>


</div>
    <div style="min-height: 50px;"></div>