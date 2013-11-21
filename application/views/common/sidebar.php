        <!-- BEGIN SIDEBAR -->
        <aside class="social-sidebar<?php if ( $autohide != 'true' ) echo ' sidebar-full' ?>">
            <!-- BEGIN USER SETTINGS -->
            <div class="user-settings">
                <div class="arrow"></div>
                <h3 class="user-settings-title">Settings shortcuts</h3>
                <div class="user-settings-content">
                    <a href="<?php echo site_url('member/profile'); ?>">
                        <div class="icon"> <i class="icon-user"></i></div>
                        <div class="title">个人资料</div>
                        <div class="content">查看和编辑个人资料</div>
                    </a>
                    <a href="javascript:void(0);">
                        <div class="icon"> <i class="icon-envelope"></i></div>
                        <div class="title">View Messages</div>
                        <div class="content">
                            You have <strong>17</strong>
                            new messages
                        </div>
                    </a>
                    <a href="#view-pending-tasks">
                        <div class="icon"><i class="icon-tasks"></i></div>
                        <div class="title">View Tasks</div>
                        <div class="content">
                            You have <strong>8</strong>
                            pending tasks
                        </div>
                    </a>
                </div>
                <div class="user-settings-footer">
                    <a href="#more-settings">See more settings</a>
                </div>
            </div>
            <!-- END USER SETTINGS -->
            <!-- BEGIN SIDEBAR CONTENT -->
            <div class="social-sidebar-content">
                <div class="scrollable">
                    <!-- BEGIN USER INFO SECTION -->
                    <div class="user">
                        <img class="avatar" width="25" height="25" src="<?php echo AVATAR_URL, $self['avatar'], '_small.png'; ?>" alt="<?php echo $self['realname']; ?>">
                        <span><?php echo $self['realname']; ?></span>
                        <i class="icon-user trigger-user-settings"></i>
                    </div>
                    <!-- END USER INFO SECTION -->
                    <!-- BEGIN NAVIGATION CONTROLS -->
                    <div class="navigation-sidebar">
                        <i class="switch-sidebar-icon icon-align-justify"></i>
                    </div>
                    <!-- END NAVIGATION CONTROLS -->
                    <!-- BEGIN SEARCH SIDEBAR FORM -->
                    <div class="search-sidebar">
                        <img src="<?php BASEURL; ?>/assets/images/icons/stuttgart-icon-pack/32x32/search.png" alt="Search">
                        <div class="search-sidebar-form">
                            <input type="text" class="search-query input-block-level" placeholder="Search">
                        </div>
                    </div>
                    <!-- END SEARCH SIDEBAR FORM -->
                    <?php echo $template['menu']; ?>
                </div>
            </div>
            <!-- END SIDEBAR CONTENT -->
        </aside>
        <!-- END SIDEBAR -->
