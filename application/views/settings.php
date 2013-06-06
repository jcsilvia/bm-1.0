<?php $this->load->helper('form'); ?>


    <div class="content">

        <div style="min-height: 50px;"></div>

    <?php echo form_open('settings/index') ?>


    <div class="form" >
        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;"><h3>Profile Settings</h3><p>Manage your account settings and change your password.</p></div>
        <p>
            <label for="username">Username:</label>
            <input title="Must be at least 5 characters." type="text" name="username" size="20" value="<?php echo set_value('username',$profile->user_name); ?>"/>
            <?php echo form_error('username'); ?>
        </p>
        <p>
            Password: **********  <a href="/settings/change_password"> Change Password</a>
        </p>
        <p>
            Email Address: <?php echo $profile->email_address; ?>    <a href="/settings/change_email"> Change Email</a> <?php if($profile->is_email_verified == 0) { echo '| <a href="/settings/validate_email"> Validate Email</a>';} ?>
        </p>
        <p>
            <label for="zipcode">Zipcode:</label>
            <input title="The 5-digit zip for your primary location." type="text" name="zipcode" size="6" value="<?php echo set_value('zipcode',$profile->zipcode); ?>" />
            <?php echo form_error('zipcode'); ?>
        </p>

        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Update Profile" />
            </p>
        </div>



        <?php echo form_close() ?>
    </div>

   </div>
    <div><p></p></div>