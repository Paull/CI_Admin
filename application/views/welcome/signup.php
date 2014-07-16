
      <!-- BEGIN SIGNUP SECTION-->
      <?php echo form_open('', array('class'=>'form-signup form-horizontal', 'role'=>'form', 'autocomplete'=>'off')); ?>
        <h2 class="form-heading text-center"><?php echo lang('sign_up'); ?></h2>
<?php if(isset($uid) && intval($uid) > 0): ?>
        <div class="alert alert-info"><?php echo lang('sign_up_success'); ?></div>
        <div class="form-actions">
          <a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>"><i class="icon-angle-left"></i> <?php echo lang('back_to_login'); ?></a>
        </div>
<?php else: ?>
        <div class="text-center"><?php echo lang('sign_up_description'); ?></div>
        <br>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input class="form-control" type="text" name="username" placeholder="<?php echo lang('username_label'); ?>" value="<?php echo set_value('username'); ?>" tabindex="1">
        </div>
<?php echo form_error('username'); ?>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          <input class="form-control" type="email" name="email" placeholder="<?php echo lang('email_label'); ?>" value="<?php echo set_value('email'); ?>" tabindex="2">
        </div>
<?php echo form_error('email'); ?>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input class="form-control" type="password" name="password1" placeholder="<?php echo lang('password_label'); ?>" value="<?php echo set_value('password1'); ?>" tabindex="3">
        </div>
<?php echo form_error('password1'); ?>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-check-circle"></i></span>
          <input class="form-control" type="password" name="password2" placeholder="<?php echo lang('password_confirm_label'); ?>" value="<?php echo set_value('password2'); ?>" tabindex="4">
        </div>
<?php echo form_error('password2'); ?>
        <div class="form-actions">
          <a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>" tabindex="6"><i class="fa fa-angle-left"></i><?php echo lang('back'); ?></a>
          <button class="btn btn-success pull-right" type="submit" tabindex="5"><?php echo lang('sign_up'); ?></button>
        </div>
<?php endif; ?>
      <?php echo form_close(); ?>

      <!-- END SIGNUP SECTION-->

