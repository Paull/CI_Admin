
      <!-- BEGIN FORGOT PASSWORD SECTION-->
      <?php echo form_open('', array('class'=>'form-forgot form-horizontal', 'role'=>'form', 'autocomplete'=>'off')); ?>
<?php if(isset($member) && !empty($member)): ?>
      <div class="alert alert-info"><?php echo lang('forget_password_success'); ?></div>
      <div class="form-actions">
	    <a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>"><i class="fa fa-angle-left"></i><?php echo lang('back'); ?></a>
      </div>
<?php else: ?>
      <h2 class="form-heading text-center"><?php echo lang('forget_password_header'); ?></h2>
      <div class="text-center"><?php echo lang('forget_password_description'); ?></div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        <input class="form-control" type="email" name="email" placeholder="<?php echo lang('email_label'); ?>" value="<?php if(isset($email) && $email && !set_value('email')) echo $email; else echo set_value('email'); ?>" tabindex="1">
      </div>
<?php echo form_error('email'); ?>
      <br>
      <div class="form-actions">
	    <a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>" tabindex="3"><i class="fa fa-angle-left"></i><?php echo lang('back'); ?></a>
        <button type="submit" class="btn btn-success pull-right" tabindex="2"><?php echo lang('send'); ?></button>
      </div>
<?php endif; ?>
      <?php echo form_close(); ?>

      <!-- END FORGOT PASSWORD SECTION-->

