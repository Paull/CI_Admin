<?php echo form_open('', array('class'=>'form-forgot', 'autocomplete'=>'off')); ?>
	<h2 class="form-heading"><?php echo lang('forget_password_header'); ?></h2>
<?php if(isset($member) && !empty($member)): ?>
    <div class="alert alert-info"><?php echo lang('forget_password_success'); ?></div>
    <div class="form-actions">
        <a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>"><i class="icon-angle-left"></i> <?php echo lang('back_to_login'); ?></a>
    </div>
<?php else: ?>
	<p class="text-center"><?php echo lang('forget_password_description'); ?></p>

	<div class="input-prepend input-fullwidth">
		<span class="add-on"><i class="icon-envelope-alt"></i></span>
		<div class="input-wrapper">
			<input type="email" id="email" name="email" placeholder="<?php echo lang('email_label'); ?>" value="<?php if(isset($email) && $email && !set_value('email')) echo $email; else echo set_value('email'); ?>" tabindex="1">
		</div>
	</div>
	<?php echo form_error('email'); ?>

	<div class="form-actions">
		<a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>" tabindex="3"><i class="icon-angle-left"></i> <?php echo lang('back'); ?></a>
		<button class="btn btn-success pull-right" type="submit" tabindex="2"><?php echo lang('send'); ?></button>
	</div>
<?php endif; ?>
<?php echo form_close(); ?>
