
      <!-- BEGIN SIGNIN SECTION-->
      <?php echo form_open('', array('class'=>'form-signin form-horizontal', 'role'=>'form', 'autocomplete'=>'off')); ?>
        <!-- //Notice .form-heading class-->
        <h2 class="form-heading text-center"><?php echo lang('sign_in_header'); ?></h2>
        <input type="text" name="username" class="form-control" required="" autofocus="" placeholder="<?php echo lang('username_label'); ?>" value="<?php if(isset($username) && $username && !set_value('username')) echo $username; else echo set_value('username'); ?>" tabindex="1">
<?php echo form_error('username'); ?>
        <input type="password" name="password" class="form-control" required="" placeholder="<?php echo lang('password_label'); ?>" value="<?php echo set_value('password'); ?>" tabindex="2">
<?php echo form_error('password'); ?>
        <div class="row">
          <div class="col-xs-6">
            <button type="submit" class="btn btn-primary btn-block" tabindex="3"><?php echo lang('sign_in'); ?></button>
          </div>
          <div class="col-xs-6">
            <a href="<?php echo site_url('iforget'); ?>" tabindex="4"><?php echo lang('forget_password'); ?>?</a>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-12">
            <a href="<?php echo site_url('signup'); ?>" class="btn btn-success btn-block" tabindex="5"><?php echo lang('sign_up'); ?></a>
          </div>
        </div>
      <?php echo form_close(); ?>
      
      <!-- END SIGNIN SECTION-->

