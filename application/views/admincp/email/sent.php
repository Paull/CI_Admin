<div class="row-fluid">
    <div class="social-box social-bordered">
        <div class="body">
            <div class="row-fluid">
                <!-- BEGIN RIGHT PANEL -->
                <div class="span12 social-box right-inbox">
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
                                        <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                    </ul>
                                </div>
                                <a href="#" class="btn hidden-phone"><i class="icon-refresh"></i></a>
                                <a href="#" class="btn hidden-phone"><i class="icon-trash"></i> <strong>Delete</strong></a>
                                <!-- END EMAIL ACTIONS -->
                            </div>
                            <!-- END HEADER INBOX -->
                            <div class="body">
                                <!-- BEGIN EMAILS LIST -->
                                <table class="table table-hover ">
                                    <tbody>
<?php foreach($list as $item): ?>                                    
                                        <!-- BEGIN EMAIL INFO -->
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="hidden-phone"><strong><?php echo $item['realname']; ?></strong></td>
                                            <td>
<?php if($item['status']): ?>
                                                <span class="label label-success">success</span>
<?php else: ?>                                                
                                                <span class="label label-important">failed</span>
<?php endif; ?>
                                                <strong><?php echo $item['subject']; ?></strong>
                                            </td>
                                            <td><?php if($item['status']): ?><i class="icon-paper-clip"></i><?php endif; ?></td>
                                            <td><strong><?php echo date("Y-m-d H:i:s", $item['created']); ?></strong></td>
                                        </tr>
                                        <!-- END EMAIL INFO -->
<?php endforeach; ?>                                    
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
