<!-- BEGIN FORGOT PASSWORD FORM -->
<?php echo form_open('', array('class'=>'form-forgot', 'autocomplete'=>'off')); ?>
	<h2 class="form-heading">Password reset</h2>
<?php if (isset($result)): ?>
<?php if ($result): ?>
    <div class="alert alert-success">Password reset <strong>successful</strong>!</div>
    <div class="form-actions">
        <a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>"><i class="icon-angle-left"></i> Back to login</a>
    </div>
<?php else: ?>
    <div class="alert alert-danger">Password reset <strong>failed</strong>!<br>Please try again or contact our customer service team.</div>
    <div class="form-actions">
        <a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>"><i class="icon-angle-left"></i> Back to login</a>
    </div>
<?php endif; ?>
<?php else: ?>
	<p class="text-center">Enter your new login password.</p>
    <div class="input-prepend input-fullwidth">
        <span class="add-on"><i class="icon-lock"></i></span>
        <div class="input-wrapper">
            <input type="password" id="password1" name="password1" placeholder="Password" value="<?php echo set_value('password1'); ?>" tabindex="1">
        </div>
    </div>
<?php echo form_error('password1'); ?>
    <div class="input-prepend input-fullwidth">
        <span class="add-on"><i class="icon-ok-sign"></i></span>
        <div class="input-wrapper">
            <input type="password" id="password2" name="password2" placeholder="Repeat Password" value="<?php echo set_value('password2'); ?>" tabindex="2">
        </div>
    </div>
<?php echo form_error('password2'); ?>

	<div class="form-actions">
		<a class="btn btn-primary btn-back" href="<?php echo site_url('login'); ?>" tabindex="4"><i class="icon-angle-left"></i> Back</a>
		<button class="btn btn-success pull-right" type="submit" tabindex="3">Reset</button>
	</div>
<?php endif; ?>
<?php echo form_close(); ?>

<!-- END FORGOT PASSWORD FORM -->
