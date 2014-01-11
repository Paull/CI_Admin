        <header>
            <!-- BEGIN NAVBAR -->
            <nav class="navbar navbar-blue navbar-fixed-top social-navbar">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <!-- BEGIN SIDEBAR COLLAPSER -->
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".social-sidebar"><?php echo lang('menu'); ?></a>
                        <!-- END SIDEBAR COLLAPSER -->
                        <!-- BEGIN BRAND LINK -->
                        <a href="/" class="brand"><?php echo SITENAME; ?></a>

                        <!-- BEGIN NAVBAR INDICATORS -->
                        <ul class="nav pull-right nav-indicators">

                            <!-- BEGIN DROPDOWN NOTIFICATIONS -->
                            <li class="dropdown nav-notifications">
                                <!-- BEGIN DROPDOWN TOGGLE -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-warning-sign"></i>
                                </a>
                                <!-- END DROPDOWN TOGGLE -->
                                <!-- BEGIN DROPDOWN MENU -->
                                <ul class="dropdown-menu">
                                    <!-- BEGIN DROPDOWN HEADER -->
                                    <li class="nav-notifications-header">
                                        <a tabindex="-1" href="#">
                                            You have <strong>9</strong>
                                            new notifications
                                        </a>
                                    </li>
                                    <!-- END DROPDOWN HEADER -->
                                    <!-- BEGIN NOTIFICATION ITEMS -->
                                    <li class="nav-notification-body text-info">
                                        <a href="#"> <i class="icon-user"></i>
                                            New User
                                            <small class="pull-right">Just Now</small>
                                        </a>
                                    </li>
                                    <li class="nav-notification-body text-error">
                                        <a href="#">
                                            <i class="icon-user"></i>
                                            User Deleted
                                            <small class="pull-right">Just Now</small>
                                        </a>
                                    </li>
                                    <li class="nav-notification-body text-warning">
                                        <a href="#">
                                            <i class="icon-cogs"></i>
                                            Sever is overloaded
                                            <small class="pull-right">2 minutes ago</small>
                                        </a>
                                    </li>
                                    <li class="nav-notification-body">
                                        <a href="#">
                                            <i class="icon-briefcase"></i>
                                            Backup is completed
                                            <small class="pull-right">4 minutes ago</small>
                                        </a>
                                    </li>
                                    <li class="nav-notification-body text-info">
                                        <a href="#">
                                            <i class="icon-user"></i>
                                            New User
                                            <small class="pull-right">Just Now</small>
                                        </a>
                                    </li>
                                    <li class="nav-notification-body text-error">
                                        <a href="#">
                                            <i class="icon-user"></i>
                                            User Deleted
                                            <small class="pull-right">Just Now</small>
                                        </a>
                                    </li>
                                    <li class="nav-notification-body text-warning">
                                        <a href="#">
                                            <i class="icon-cogs"></i>
                                            Sever is overloaded
                                            <small class="pull-right">3 minutes ago</small>
                                        </a>
                                    </li>
                                    <li class="nav-notification-body">
                                        <a href="#">
                                            <i class="icon-briefcase"></i>
                                            Backup is completed
                                            <small class="pull-right">6 minutes ago</small>
                                        </a>
                                    </li>
                                    <!-- END NOTIFICATION ITEMS -->
                                    <!-- BEGIN DROPDOWN FOOTER -->
                                    <li class="nav-notifications-footer">
                                        <a tabindex="-1" href="#">View all messages</a>
                                    </li>
                                    <!-- END DROPDOWN FOOTER -->
                                </ul>
                                <!-- END DROPDOWN MENU -->
                            </li>
                            <!-- END DROPDOWN NOTIFICATIONS -->

                            <!-- BEGIN DROPDOWN TASKS -->
                            <li class="dropdown nav-tasks">
                                <!-- BEGIN DROPDOWN TOGGLE -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-tasks"></i>
                                </a>
                                <!-- END DROPDOWN TOGGLE -->
                                <!-- BEGIN DROPDOWN MENU -->
                                <ul class="dropdown-menu">
                                    <!-- BEGIN DROPDOWN HEADER -->
                                    <li class="nav-taks-header">
                                        <a tabindex="-1" href="#">
                                            You have <strong>13</strong>
                                            tasks in progress
                                        </a>
                                    </li>
                                    <!-- END DROPDOWN HEADER -->
                                    <!-- BEGIN DROPDOWN ITEMS -->
                                    <li>
                                        <a>
                                            <strong>Prepare Report</strong>
                                            <span class="pull-right">30%</span>
                                            <div class="progress progress-danger active">
                                                <div class="bar" style="width: 30%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Make new update</strong>
                                            <span class="pull-right">40%</span>
                                            <div class="progress progress-info active">
                                                <div class="bar" style="width: 40%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Fix critical bugs</strong>
                                            <span class="pull-right">80%</span>
                                            <div class="progress progress-striped active">
                                                <div class="bar" style="width: 80%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Complete project</strong>
                                            <span class="pull-right">5%</span>
                                            <div class="progress progress-success active">
                                                <div class="bar" style="width: 5%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Others</strong>
                                            <span class="pull-right">15%</span>
                                            <div class="progress progress-warning active">
                                                <div class="bar" style="width: 15%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- END DROPDOWN ITEMS -->
                                    <!-- BEGIN DROPDOWN FOOTER -->
                                    <li class="nav-taks-footer">
                                        <a tabindex="-1" href="#">View all tasks</a>
                                    </li>
                                    <!-- END DROPDOWN FOOTER -->
                                </ul>
                                <!-- END DROPDOWN MENU -->
                            </li>
                            <!-- END DROPDOWN TASKS -->

                            <!-- BEGIN DROPDOWN MESSAGES -->
                            <li class="dropdown nav-messages">
                                <!-- BEGIN DROPDOWN TOGGLE -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-envelope"></i>
                                </a>
                                <!-- END DROPDOWN TOGGLE -->
                                <!-- BEGIN DROPDOWN MENU -->
                                <ul class="dropdown-menu">
                                    <!-- BEGIN DROPDOWN HEADER -->
                                    <li class="nav-messages-header">
                                        <a tabindex="-1" href="#">
                                            You have <strong>8</strong>
                                            new messages
                                        </a>
                                    </li>
                                    <!-- END DROPDOWN HEADER -->
                                    <!-- BEGIN DROPDOWN ITEMS -->
                                    <li class="nav-message-body">
                                        <a>
                                            <img src="<?php echo AVATAR_URL; ?>noavatar_small.png" alt="User">
                                            <div>
                                                <small class="pull-right">Just Now</small> <strong>Yadra Abels</strong>
                                            </div>
                                            <div>Lorem ipsum dolor sit amet, consectetur...</div>
                                        </a>
                                    </li>
                                    <li class="nav-message-body">
                                        <a>
                                            <img src="<?php echo AVATAR_URL; ?>noavatar_small.png" alt="User">
                                            <div>
                                                <small class="pull-right">Just Now</small>
                                                <strong>Cesar Mendoza</strong>
                                            </div>
                                            <div>Lorem ipsum dolor sit amet, consectetur...</div>
                                        </a>
                                    </li>
                                    <li class="nav-message-body">
                                        <a>
                                            <img src="<?php echo AVATAR_URL; ?>noavatar_small.png" alt="User">
                                            <div>
                                                <small class="pull-right">Just Now</small>
                                                <strong>John Doe</strong>
                                            </div>
                                            <div>Lorem ipsum dolor sit amet, consectetur...</div>
                                        </a>
                                    </li>
                                    <li class="nav-message-body">
                                        <a>
                                            <img src="<?php echo AVATAR_URL; ?>noavatar_small.png" alt="User">
                                            <div>
                                                <small class="pull-right">Just Now</small>
                                                <strong>Tobei Tsumura</strong>
                                            </div>
                                            <div>Lorem ipsum dolor sit amet, consectetur...</div>
                                        </a>
                                    </li>
                                    <!-- END DROPDOWN ITEMS -->
                                    <!-- BEGIN DROPDOWN FOOTER -->
                                    <li class="nav-messages-footer">
                                        <a tabindex="-1" href="pages/chat-inbox.html">View all messages</a>
                                    </li>
                                    <!-- END DROPDOWN FOOTER -->
                                </ul>
                                <!-- END DROPDOWN MENU -->
                            </li>
                            <!-- END DROPDOWN MESSAGES -->

                            <li class="divider-vertical"></li>

                            <!-- BEGIN EXTRA DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><?php echo anchor('member/profile', '<i class="icon-user"></i> 个人资料'); ?></li>
                                    <li><?php echo anchor('logout', '<i class="icon-off"></i> 退出帐号'); ?></li>
                                    <li class="divider"></li>
                                    <li><?php echo anchor('faq', '<i class="icon-info-sign"></i> Help'); ?></li>
                                </ul>
                            </li>
                            <!-- END EXTRA DROPDOWN -->
                        </ul>
                        <!-- END NAVBAR INDICATORS -->
                        <!-- BEGIN PANEL TEMPLATE SETTINGS TRIGGER -->
                        <ul class="nav pull-right hidden-phone">
                            <!-- BEGIN APP SETTINGS -->
                            <li id="app-setting" class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog"></i>
                                </a>
                                <ul class="dropdown-menu settings">
                                    <li class="header"><?php echo lang('sidebar'); ?></li>
                                    <li>
                                        <a href="#autohide">
                                            <label class="checkbox">
                                                <input type="checkbox" id="sidebar-autohide"<?php if ( $autohide == 'true' ) echo ' checked'; ?>><?php echo lang('auto_hide'); ?>
                                            </label>
                                        </a>
                                    </li>

                                    <li class="divider"></li>
                                    <li class="header"><?php echo lang('themes'); ?></li>
                                    <li id="colorpickers">
                                        <select name="colorpicker">
                                            <option value="#f2f2f2">Light</option>
                                            <option value="#3b5998" data-class="blue">Blue</option>
                                            <option value="#51a351" data-class="green">Green</option>
                                            <option value="#f89406" data-class="orange">Orange</option>
                                        </select>
                                    </li>

                                </ul>
                            </li>
                            <!-- END APP SETTINGS -->
                        </ul>
                        <!-- END PANEL TEMPLATE SETTINGS TRIGGER -->
                    </div>
                </div>
            </nav>
            <!-- END NAVBAR -->
        </header>
