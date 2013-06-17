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