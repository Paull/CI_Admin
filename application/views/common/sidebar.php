<!-- BEGIN SIDEBAR-->
<aside class="social-sidebar">
    <div class="social-sidebar-content">
        <!-- BEGIN USER SECTION-->
        <div class="user">
            <!-- //Notice .avatar class-->
            <img width="25" height="25" src="<?php echo AVATAR_URL, $self['avatar'], '_small.png'; ?>" alt="<?php echo $self['realname']; ?>" class="avatar"> 
            <span><?php echo $self['realname']; ?></span>
            <i data-toggle="dropdown" class="trigger-user-settings fa fa-user"></i>
            <!-- BEGIN USER SETTINGS SECTION-->
            <div class="user-settings">
                <!-- BEGIN USER SETTINGS TITLE-->
                <h3 class="user-settings-title">Settings shortcuts</h3>
                <!-- END USER SETTINGS TITLE-->
                <!-- BEGIN USER SETTINGS CONTENT-->
                <div class="user-settings-content">
                    <a href="#my-profile">
                        <!-- //Notice .icon class-->
                        <div class="icon"><i class="fa fa-user"></i></div>
                        <!-- //Notice .title class-->
                        <div class="title"><?php echo lang('my_profile'); ?></div>
                        <!-- //Notice .content class-->
                        <div class="content"><?php echo lang('my_profile_desc'); ?></div>
                    </a>
                    <a href="#view-messages">
                        <!-- //Notice .icon class-->
                        <div class="icon"><i class="fa fa-envelope-o"></i></div>
                        <!-- //Notice .title class-->
                        <div class="title">View Messages</div>
                        <!-- //Notice .content class-->
                        <div class="content">You have <strong>17</strong> new messages</div>
                    </a>
                    <a href="#view-pending-tasks">
                        <!-- //Notice .icon class-->
                        <div class="icon"><i class="fa fa-tasks"></i></div>
                        <!-- //Notice .title class-->
                        <div class="title">View Tasks</div>
                        <!-- //Notice .content class-->
                        <div class="content">You have <strong>8</strong> pending tasks</div>
                    </a>
                </div>
                <!-- END USER SETTINGS CONTENT-->
                <!-- BEGIN USER SETTINGS FOOTER-->
                <div class="user-settings-footer">
                    <a href="#more-settings">See more settings</a>
                </div>
                <!-- END USER SETTINGS FOOTER-->
            </div>
            <!-- END USER SETTINGS SECTION-->
        </div>
        <!-- EDN USER SECTION-->
        <!-- BEGIN MENU SECTION-->
        <div class="menu">
            <div class="menu-content">
                <ul id="social-sidebar-menu">
                    <!-- BEGIN ELEMENT MENU-->
                    <li>
                        <a href="./index.html">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                            <span class="badge">9</span>
                        </a>
                    </li>
                    <!-- END ELEMENT MENU-->
                    <!-- BEGIN ELEMENT MENU-->
                    <li>
                        <a href="./../frontend/index.html" target="_blank">
                            <i class="fa fa-star"></i>
                            <span>Frontend</span>
                        </a>
                    </li>
                    <!-- END ELEMENT MENU-->
                    <!-- BEGIN ELEMENT MENU-->
                    <li>
                        <a href="#menu-ui" data-toggle="collapse" data-parent="#social-sidebar-menu">
                            <i class="fa fa-cogs"></i>
                            <span>UI Elements</span>
                            <i class="fa arrow"></i>
                        </a>
                        <!-- BEGIN SUB-ELEMENT MENU-->
                        <ul id="menu-ui" class="collapse">
                            <li><a href="./ui_general.html">General</a></li>
                            <li><a href="./ui_buttons.html">Buttons</a></li>
                            <li><a href="./ui_panels.html">Panels</a></li>
                            <li><a href="./ui_tabs_accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="./ui_files_uploaders.html">Files Uploaders</a></li>
                            <li><a href="./ui_wysiwyg_editors.html">WYSIWYG Editors</a></li>
                            <li><a href="./ui_jquery_ui.html">jQuery UI</a></li>
                            <li><a href="./ui_icons_packs.html">Icons Packs</a></li>
                            <li><a href="./ui_typography.html">Typography</a></li>
                        </ul>
                        <!-- END SUB-ELEMENT MENU-->
                    </li>
                    <!-- END ELEMENT MENU-->
                    <!-- BEGIN ELEMENT MENU-->
                    <li>
                        <a href="#menu-form" data-toggle="collapse" data-parent="#social-sidebar-menu">
                            <!-- icon--><i class="fa fa-list-alt"></i>
                            <span>Form Stuff</span>
                            <!-- arrow--><i class="fa arrow"></i>
                        </a>
                        <!-- BEGIN SUB-ELEMENT MENU-->
                        <ul id="menu-form" class="collapse">
                            <li>
                                <a href="./form_elements.html">Form Elements</a>
                            </li>
                            <li>
                                <a href="./form_validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="./form_wizards.html">Wizards</a>
                            </li>
                        </ul>
                        <!-- END SUB-ELEMENT MENU-->
                    </li>
                    <!-- END ELEMENT MENU-->
                    <!-- BEGIN ELEMENT MENU-->
                    <!-- //Notice .open class-->
                    <li class="open active">
                        <a href="#menu-pages" data-toggle="collapse" data-parent="#social-sidebar-menu">
                            <!-- icon--><i class="fa fa-file-text"></i>
                            <span>Pages Layouts</span>
                            <!-- arrow--><i class="fa arrow"></i>
                        </a>
                        <!-- BEGIN SUB-ELEMENT MENU-->
                        <!-- //Notice .in class-->
                        <ul id="menu-pages" class="collapse in">
                            <li>
                            <a href="./pages_email_templates.html">Email Templates</a>
                            </li>
                            <li>
                            <a href="./pages_invoice.html">Invoice</a>
                            </li>
                            <li>
                            <a href="./pages_login_1.html">Login 1</a>
                            </li>
                            <li>
                            <a href="./pages_login_2.html">Login 2</a>
                            </li>
                            <li>
                            <a href="./pages_timelines.html">Timelines</a>
                            </li>
                            <li>
                            <a href="./pages_timeline_facebook.html">Timeline (Facebook)</a>
                            </li>
                            <li>
                            <a href="./pages_user_profile_cards.html">User Profile/Cards</a>
                            </li>
                            <li>
                            <a href="./pages_inbox.html">Inbox</a>
                            </li>
                            <li class="active">
                            <a href="./pages_blank_page.html">Blank Page</a>
                            </li>
                            <li>
                            <a href="./pages_reduced_sidebar.html">Reduced Sidebar</a>
                            </li>
                            <li>
                            <a href="./pages_404_error.html">404 Error Page</a>
                            </li>
                            <li>
                            <a href="./pages_500_error.html">500 Error Page</a>
                            </li>
                            <li>
                            <a href="./pages_pricing_tables.html">Pricing Tables</a>
                            </li>
                        </ul>
                        <!-- END SUB-ELEMENT MENU-->
                    </li>
                    <!-- END ELEMENT MENU-->
                    <!-- BEGIN MULTI-LEVEL-->
                    <li>
                    <a data-toggle="collapse" data-parent="#social-sidebar-menu" href="#menu-multilevel"><i class="fa fa-sitemap"></i>
                    <span>Multi Level</span><i class="fa arrow"></i>
                    </a>
                    <ul id="menu-multilevel" class="collapse">
                    <!-- BEGIN 2ND LEVEL ITEM-->
                    <li>
                    <a data-toggle="collapse" data-parent="#collapseOne" href="#collapseOneOne">Level 2<i class="fa arrow"></i>
                    </a>
                    <ul id="collapseOneOne" class="collapse">
                    <!-- BEGIN 3RD LEVEL ITEM-->
                    <li>
                    <a data-toggle="collapse" data-parent="#collapseOneOne" href="#collapseOneOneOne">Level 3<i class="fa arrow"></i>
                    </a>
                    <ul id="collapseOneOneOne" class="collapse">
                    <!-- BEGIN 3RD LEVEL ITEMS-->
                    <li>
                    <a href="#">Level 4</a>
                    </li>
                    <li>
                    <a href="#">Level 4</a>
                    </li>
                    <li>
                    <a href="#">Level 4</a>
                    </li>
                    <!-- END 3RD LEVEL ITEMS-->
                    </ul>
                    </li>
                    <!-- END 3RD LEVEL ITEM-->
                    <!-- BEGIN 3RD LEVEL ITEMS-->
                    <li>
                    <a href="#">Level 3</a>
                    </li>
                    <li>
                    <a href="#">Level 3</a>
                    </li>
                    <!-- END 3RD LEVEL ITEMS-->
                    </ul>
                    </li>
                    <!-- END 2ND LEVEL ITEM-->
                    <!-- BEGIN 2ND LEVEL ITEMS-->
                    <li>
                    <a href="#">Level 2</a>
                    </li>
                    <li>
                    <a href="#">Level 2</a>
                    </li>
                    <!-- END 2ND LEVEL ITEMS-->
                    </ul>
                    </li>
                    <!-- END MULTI-LEVEL-->
                    <!-- BEGIN ELEMENT MENU-->
                    <li>
                    <a href="./charts.html" target="">
                    <!-- icon--><i class="fa fa-bar-chart-o"></i>
                    <span>Charts</span>
                    <!-- badge-->
                    <span class="badge">6</span>
                    </a>
                    </li>
                    <!-- END ELEMENT MENU-->
                    <!-- BEGIN ELEMENT MENU-->
                    <li>
                    <a href="#menu-tables" data-toggle="collapse" data-parent="#social-sidebar-menu">
                    <!-- icon--><i class="fa fa-table"></i>
                    <span>Tables</span>
                    <!-- arrow--><i class="fa arrow"></i>
                    </a>
                    <!-- BEGIN SUB-ELEMENT MENU-->
                    <ul id="menu-tables" class="collapse">
                    <li>
                    <a href="./tables_basic.html">Basic Tables</a>
                    </li>
                    <li>
                    <a href="./tables_dynamic.html">Dynamic Tables</a>
                    </li>
                    <li>
                    <a href="./tables_responsive.html">Responsive Tables</a>
                    </li>
                    </ul>
                    <!-- END SUB-ELEMENT MENU-->
                    </li>
                    <!-- END ELEMENT MENU-->
                    <!-- BEGIN ELEMENT MENU-->
                    <li>
                    <a href="./calendar.html" target="">
                    <!-- icon--><i class="fa fa-calendar"></i>
                    <span>Calendar</span>
                    <!-- badge-->
                    <span class="badge">8</span>
                    </a>
                    </li>
                    <!-- END ELEMENT MENU-->
                    <!-- BEGIN ELEMENT MENU-->
                    <li>
                    <a href="./maps.html" target="">
                    <!-- icon--><i class="fa fa-globe"></i>
                    <span>Maps</span>
                    </a>
                    </li>
                    <!-- END ELEMENT MENU-->
                </ul>
            </div>
        </div>
        <!-- END MENU SECTION-->
    </div>
</aside>
<!-- END SIDEBAR-->
