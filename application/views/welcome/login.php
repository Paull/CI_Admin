<?php echo form_open('', array('class'=>'form-login', 'autocomplete'=>'off')); ?>
    <h2 class="form-heading"><?php echo lang('sign_in_header'); ?></h2>
    <input type="text" id="username" name="username" class="input-block-level" placeholder="<?php echo lang('username_or_email_label'); ?>" value="<?php if(isset($username) && $username && !set_value('username')) echo $username; else echo set_value('username'); ?>" tabindex="1">
<?php echo form_error('username'); ?>
    <input type="password" id="password" name="password" class="input-block-level" placeholder="<?php echo lang('password_label'); ?>" value="<?php echo set_value('password'); ?>" tabindex="2">
<?php echo form_error('password'); ?>
    <div class="row-fluid">
        <button class="btn btn-primary pull-left span6" type="submit" tabindex="3"><?php echo lang('sign_in'); ?></button>
        <p class="text-center pull-right span6"><a href="<?php echo site_url('iforget'); ?>" tabindex="4"><?php echo lang('forget_password'); ?>?</a></p>
    </div>
    <div class="row-fluid">
        <a id="btn-register" class="btn btn-success pull-right span12" href="<?php echo site_url('signup'); ?>" tabindex="5"><?php echo lang('sign_up'); ?></a>
    </div>
<?php echo form_close(); ?>
