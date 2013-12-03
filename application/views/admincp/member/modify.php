<div class="social-box">
    <div class="body">
        <div class="row-fluid">
<?php echo form_open_multipart('', array('class'=>'form-horizontal')); ?>
                <div class="control-group">
                    <label class="control-label" for="username"><?php echo lang('username'); ?></label>
                    <div class="controls">
                        <input type="text" id="username" name="username" value="<?php echo set_value('username', $row['username']); ?>">
                        <?php echo form_error('username'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="email"><?php echo lang('email'); ?></label>
                    <div class="controls">
                        <input type="email" id="email" name="email" value="<?php echo set_value('email', $row['email']); ?>">
                        <?php echo form_error('email'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="password"><?php echo lang('password'); ?></label>
                    <div class="controls">
                        <input type="password" id="password" name="password" value="<?php echo set_value('password', $row['password']); ?>">
                        <?php echo form_error('password'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="realname"><?php echo lang('realname'); ?></label>
                    <div class="controls">
                        <input type="text" id="realname" name="realname" value="<?php echo set_value('realname', $row['realname']); ?>">
                        <?php echo form_error('realname'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"><?php echo lang('identity'); ?></label>
                    <div class="controls">
<?php echo form_dropdown('identity', $groups, set_value('identity', $row['identity'])); ?>
                        <?php echo form_error('identity'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"><?php echo lang('area'); ?></label>
                    <div class="controls">
<?php echo form_dropdown('areaid', $areas, set_value('areaid', $row['areaid'])); ?>
                        <?php echo form_error('areaid'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"><?php echo lang('status'); ?></label>
                    <div class="controls">
<?php echo form_dropdown('status', $status, set_value('status', $row['status'])); ?>
                        <?php echo form_error('status'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
<?php echo form_close(); ?>
        </div>
    </div>
</div>
