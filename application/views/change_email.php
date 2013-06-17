<?php $this->load->helper('form'); ?>


<div class="content">



    <div class="settings_back_button""><a href="javascript:history.back()">Back</a></div>

    <?php echo form_open('settings/change_email') ?>


    <div class="form" >

        <div class="title" style="border-bottom: 1px;border-bottom-color: black; border-bottom-style: solid;"><h3>Change Email</h3><p>Update your email here. </p></div>
        <p>
            <label for="username">New Email:</label>
            <input title="The primary email address you would like to use for communication with Bullet-Monkey. Changing your email address will require you to validate the new email." type="text" name="email" size="50" value="<?php echo set_value('email'); ?>"/>
            <?php echo form_error('email'); ?>
        </p>
        <div>
            <p>
                <input class="button1" type="submit" name="submit" value="Update Email" />
            </p>
        </div>

    </div>




    <?php echo form_close() ?>


</div>
