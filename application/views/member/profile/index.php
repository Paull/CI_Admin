<!-- BEGIN EDIT USER DATA -->
<div id="user-edit" class="social-box">
    <div class="body">
        <ul class="nav nav-tabs" id="tabs">
            <li><a href="#profile"><?php echo lang('edit_profile'); ?></a></li>
            <li><a href="#password"><?php echo lang('edit_password'); ?></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane row-fluid" id="profile">        
<?php echo form_open_multipart('', array('class'=>'form-horizontal')); ?>
<?php echo form_hidden('action', 'profile'); ?>
                    <div class="heading">
                        <h4 class="form-heading"></h4>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="username"><?php echo lang('username'); ?></label>
                        <div class="controls">
                            <input type="text" id="username" value="<?php echo $self['username']; ?>" disabled>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="email"><?php echo lang('email'); ?></label>
                        <div class="controls">
                            <input type="email" id="email" name="email"  value="<?php echo set_value('email', $self['email']); ?>">
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="realname"><?php echo lang('realname'); ?></label>
                        <div class="controls">
                            <input type="text" id="realname" name="realname" value="<?php echo set_value('realname', $self['realname']); ?>">
                            <?php echo form_error('realname'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label"><?php echo lang('avatar'); ?></label>
                        <div class="controls">

                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 50px; height: 50px;">
                                    <img src="<?php echo AVATAR_URL, $self['avatar'], '_small.png'; ?>" alt="avatar"/>
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 50px; height: 50px;"></div>
                                <span class="btn btn-file">
                                    <span class="fileupload-new"><?php echo lang('upload_avatar'); ?></span>
                                    <span class="fileupload-exists"><?php echo lang('modify'); ?></span>
                                    <input name="avatar" type="file" />
                                </span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><?php echo lang('delete'); ?></a>
                            </div>

                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-primary"><?php echo lang('save'); ?></button>
                        </div>
                    </div>
<?php echo form_close(); ?>
            </div>
            <div class="tab-pane row-fluid" id="password">        
<?php echo form_open('', array('class'=>'form-horizontal')); ?>
<?php echo form_hidden('action', 'password'); ?>
                    <div class="control-group">
                        <label class="control-label" for="old_password"><?php echo lang('old_password'); ?></label>
                        <div class="controls">
                            <input type="password" id="old_password" name="old_password" placeholder="<?php echo lang('old_password_placeholder'); ?>" value="<?php echo set_value('old_password'); ?>">
                            <?php echo form_error('old_password'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="password1"><?php echo lang('new_password'); ?></label>
                        <div class="controls">
                            <input type="password" id="password1" name="password1" placeholder="<?php echo lang('new_password_placeholder'); ?>" value="<?php echo set_value('password1'); ?>">
                            <?php echo form_error('password1'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="password2"><?php echo lang('new_password_confirm'); ?></label>
                        <div class="controls">
                            <input type="password" id="password2" name="password2" placeholder="<?php echo lang('new_password_confirm_placeholder'); ?>" value="<?php echo set_value('password2'); ?>">
                            <?php echo form_error('password2'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-primary"><?php echo lang('modify'); ?></button>
                        </div>
                    </div>
<?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- END EDIT USER DATA -->
