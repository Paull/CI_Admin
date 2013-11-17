        <header>
            <!-- BEGIN NAVBAR -->
            <nav class="navbar navbar-blue navbar-fixed-top social-navbar">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <!-- BEGIN SIDEBAR COLLAPSER -->
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".social-sidebar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <!-- END SIDEBAR COLLAPSER -->
                        <!-- BEGIN BRAND LINK -->
                        <a href="/" class="brand"><?php echo SITENAME; ?></a>

                        <!-- BEGIN NAVBAR INDICATORS -->
                        <ul class="nav pull-right nav-indicators">

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
