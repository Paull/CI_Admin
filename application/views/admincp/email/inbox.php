<div class="row-fluid">
    <div class="social-box social-bordered">
        <div class="body">
            <div class="row-fluid">
                <!-- BEGIN LEFT PANEL -->
                <div class="span2 left-inbox">
                    <a id="compose-button" href="#" class="input-block-level btn btn-primary">Compose</a>
                    <div class="social-nav-list">
                        <ul class="nav nav-list dividers tabbable">
                            <li class="active"><a href="#inbox" data-toggle="tab"><i class="icon-inbox"></i> Inbox (10)</a></li>
                            <li><a href="#starred" data-toggle="tab"><i class="icon-star"></i> Starred</a></li>
                            <li><a href="#sent" data-toggle="tab"><i class="icon-signin"></i> Sent</a></li>
                            <li><a href="#drafts" data-toggle="tab"><i class="icon-file-alt"></i> Drafts</a></li>
                        </ul>
                    </div>
                </div>
                <!-- END LEFT PANEL -->
                <!-- BEGIN RIGHT PANEL -->
                <div class="span10 social-box right-inbox">
                    <div style="display:none" id="compose">
                        <!-- BEGIN HEADER INBOX -->
                        <div class="header">
                            <a href="#" class="btn btn-success"><i class="icon-ok"></i> Send</a>
                            <a href="#" class="btn"><i class="icon-file-alt"></i> <strong>Draft</strong></a>
                            <a href="#" class="btn"><i class="icon-remove-sign"></i> <strong>Discard</strong></a>
                        </div>
                        <!-- END HEADER INBOX -->
                        <div class="body">
                            <form id="compose-form" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label" for="inputRecipients">To</label>
                                    <div class="controls">
                                        <input type="text" value="johndoe@example.com" class="input-block-level" id="inputRecipients" placeholder="Recipients">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputSubject">Subject</label>
                                    <div class="controls">
                                        <input type="text" class="input-block-level" id="inputSubject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="">
                                        <textarea id="compose-textarea" class="input-block-level">
                                            <br>
                                            <br>
                                            <br>
                                            --- --- ---
                                            <blockquote>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                                <br>
                                                <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                                            </blockquote>
                                        </textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="footer">
                            <a href="#" class="btn btn-success"><i class="icon-ok"></i> Send</a>
                            <a href="#" class="btn"><i class="icon-file-alt"></i> <strong>Draft</strong></a>
                            <a href="#" class="btn"><i class="icon-remove-sign"></i> <strong>Discard</strong></a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="inbox">
                            <!-- BEGIN HEADER INBOX -->
                            <div class="header">
                                <label class="btn btn-toggle checkbox" for="btn-checkbox">
                                    <input type="checkbox" id="btn-checkbox"/>
                                </label>
                                <!-- BEGIN EMAIL ACTIONS -->
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle visible-phone" data-toggle="dropdown" href="#">More<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="icon-refresh"></i> Refresh</a></li>
                                        <li><a href="#"><i class="icon-briefcase"></i> Archive</a></li>
                                        <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                    </ul>
                                </div>
                                <a href="#" class="btn hidden-phone"><i class="icon-refresh"></i></a>
                                <a href="#" class="btn hidden-phone"><i class="icon-briefcase"></i> Archive</a>
                                <a href="#" class="btn hidden-phone"><i class="icon-trash"></i> <strong>Delete</strong></a>
                                <!-- END EMAIL ACTIONS -->
                                <!-- BEGIN MINI-PAGINATION -->
                                <div class="tools">
                                    <span class="hidden-phone">1-16 of 483</span>
                                    <div class="btn-group">
                                        <a href="#" class="btn"><i class="icon-chevron-left"></i></a>
                                        <a href="#" class="btn"><i class="icon-chevron-right"></i></a>
                                    </div>
                                </div>
                                <!-- END MINI-PAGINATION -->
                            </div>
                            <!-- END HEADER INBOX -->
                            <div class="body">
                                <!-- BEGIN EMAILS LIST -->
                                <table class="table table-hover ">
                                    <tbody>
                                        <!-- BEGIN EMAIL INFO -->
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td><i class="icon-star-empty"></i></td>
                                            <td class="hidden-phone"><strong>John Doe</strong></td>
                                            <td><span class="label label-important">important</span> <strong>Message body goes here</strong></td>
                                            <td></td>
                                            <td><strong>11:23 PM</strong></td>
                                        </tr>
                                        <!-- END EMAIL INFO -->
                                  </tbody>
                                </table>
                                <!-- END EMAILS LIST -->
                                <!-- BEGIN PAGINATION -->
                                <div class="pagination pagination-centered">
                                    <ul>
                                        <li class="disabled"><a href="#">&laquo;</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                                <!-- END PAGINATION -->
                            </div>
                            <!-- END BODY -->
                        </div>
                        <!-- END TAB PANE -->
                    </div>
                    <!-- END TAB CONTENT -->
                </div>
                <!-- END RIGHT PANEL -->
            </div>
        </div>
    </div>
</div>
