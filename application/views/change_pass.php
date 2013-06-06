<?php $this->load->helper('form'); ?>


    <div class="content">

        <div style="min-height: 50px;"></div>

    <?php echo form_open('settings/change_password') ?>


    <div class="form" >
        <div class="settings_back_button"><p><a href="javascript:history.back()">Back</a></p></div>
        <div class="title"><h3>Change Password</h3></div>
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

<div><p></p></div>
