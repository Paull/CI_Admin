<?php echo form_open('', array('class'=>'form-register', 'autocomplete'=>'off')); ?>
    <h2 class="form-heading"><?php echo lang('sign_up'); ?></h2>
<?php if(isset($uid) && intval($uid) > 0): ?>
    <div class="alert alert-info"><?php echo lang('sign_up_success'); ?></div>
    <div class="form-actions">
        <a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>"><i class="icon-angle-left"></i> <?php echo lang('back_to_login'); ?></a>
    </div>
<?php else: ?>
    <div id="register-container">
        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-male"></i></span>
            <div class="input-wrapper">
                <input type="text" id="username" name="username" placeholder="<?php echo lang('username_label'); ?>" value="<?php echo set_value('username'); ?>" tabindex="1">
            </div>
        </div>
<?php echo form_error('username'); ?>
        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-envelope-alt"></i></span>
            <div class="input-wrapper">
                <input type="email" id="email" name="email" placeholder="<?php echo lang('email_label'); ?>" value="<?php echo set_value('email'); ?>" tabindex="2">
            </div>
        </div>
<?php echo form_error('email'); ?>
        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-lock"></i></span>
            <div class="input-wrapper">
                <input type="password" id="password1" name="password1" placeholder="<?php echo lang('password_label'); ?>" value="<?php echo set_value('password1'); ?>" tabindex="3">
            </div>
        </div>
<?php echo form_error('password1'); ?>
        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-ok-sign"></i></span>
            <div class="input-wrapper">
                <input type="password" id="password2" name="password2" placeholder="<?php echo lang('password_confirm_label'); ?>" value="<?php echo set_value('password2'); ?>" tabindex="4">
            </div>
        </div>
<?php echo form_error('password2'); ?>
    </div>
    <div class="form-actions">
        <a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>" tabindex="6"><i class="icon-angle-left"></i> <?php echo lang('back'); ?></a>
        <button class="btn btn-success pull-right" type="submit" tabindex="5"><?php echo lang('sign_up'); ?></button>
    </div>
<?php endif; ?>
<?php echo form_close(); ?>
