<div class="row-fluid">
    <div class="span12">
        <div class="social-box">
            <div class="header">
                <h4><?php echo $template['title']; ?>
            </div>
            <!-- BEGIN TABLE BODY -->
            <div class="body">
                <input type="text" id="keyword" class="input-block-level" placeholder="<?php echo lang('keyword_more_than_2_letter'); ?>">
                <table class="footable editable table" data-filter="#keyword" data-page-size="20">
                    <thead>
                        <tr>
                            <th data-type="numeric">#</th>
                            <th><?php echo lang('username'); ?></th>
                            <th><?php echo lang('realname'); ?></th>
                            <th data-hide="phone,tablet"><?php echo lang('email'); ?></th>
                            <th><?php echo lang('identity'); ?></th>
                            <th><?php echo lang('status'); ?></th>
                            <th><?php echo lang('area'); ?></th>
                            <th data-hide="phone,tablet" data-type="numeric"><?php echo lang('login_times'); ?></th>
                            <th data-hide="phone,tablet"><?php echo lang('login_time'); ?></th>
                            <th data-hide="phone,tablet"><?php echo lang('login_location'); ?></th>
                            <th data-hide="phone" data-sort-ignore="true"><?php echo lang('operate'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach($list as $item): ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td>
                                <a href="javascript:void(0);" data-type="text" data-name="username" data-pk="<?php echo $item['id']; ?>" data-placeholder="Required" data-original-title="输入用户称呼"<?php if(! $item['username'] ) echo ' class="editable-click editable-empty"'; ?>><?php echo $item['username'] ? $item['username'] : 'Empty'; ?></a>
                            </td>
                            <td>
                                <img src="<?php echo AVATAR_URL, $item['avatar'], '_small.png'; ?>" alt="<?php echo $item['username']; ?>" class="img-rounded" width="24" height="24">
                                <a href="javascript:void(0);" data-type="text" data-name="realname" data-pk="<?php echo $item['id']; ?>" data-placeholder="Required" data-original-title="输入用户称呼"<?php if(! $item['realname'] ) echo ' class="editable-click editable-empty"'; ?>><?php echo $item['realname'] ? $item['realname'] : 'Empty'; ?></a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" data-type="email" data-name="email" data-pk="<?php echo $item['id']; ?>" data-placeholder="Required" data-original-title="修改用户帐号"<?php if(! $item['email'] ) echo ' class="editable-click editable-empty"'; ?>><?php echo $item['email'] ? $item['email'] : 'Empty'; ?></a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" data-type="select" data-name="identity" data-pk="<?php echo $item['id']; ?>" data-value="<?php echo $item['identity']; ?>" data-source="<?php echo site_url(CLASS_URI.'/load_options/identity'); ?>" data-original-title="选择身份"<?php if(! $item['identity'] ) echo ' class="editable-click editable-empty"'; ?>><?php echo $item['identity'] ? lang($item['identity']) : 'Empty'; ?></a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" data-type="select" data-name="status" data-pk="<?php echo $item['id']; ?>" data-value="<?php echo $item['status']; ?>" data-source="<?php echo site_url(CLASS_URI.'/load_options/status'); ?>" data-original-title="选择状态"<?php if(! $item['status'] ) echo ' class="editable-click editable-empty"'; ?>><?php echo $item['status'] ? lang($item['status']) : 'Empty'; ?></a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" data-type="select" data-name="areaid" data-pk="<?php echo $item['id']; ?>" data-value="<?php echo $item['areaid']; ?>" data-source="<?php echo site_url(CLASS_URI.'/load_options/areas'); ?>" data-original-title="选择用户所属区域"<?php if(! $item['areaid'] ) echo ' class="editable-click editable-empty"'; ?>><?php echo $item['areaid'] ? isset($area_hash[$item['areaid']]) ? $area_hash[$item['areaid']] : '无权查看' : 'Empty'; ?></a> </td>
                            <td><?php echo $item['login_count']; ?></td>
                            <td><span data-toggle="tooltip" title="<?php echo date('Y-m-d H:i:s', $item['login_time']); ?>"><?php echo time_past($item['login_time']); ?></span></td>
                            <td><span data-toggle="tooltip" title="<?php echo $item['login_ip']; ?>"><?php echo convertip($item['login_ip']); ?></span></td>
                            <td>
                                <a href="<?php echo site_url('admincp/member/modify/'.$item['id']); ?>" title="修改"><i class="icon-edit"></i>修改</a>
                                <a href="<?php echo site_url('admincp/member/destroy/'.$item['id']); ?>" title="删除" onclick="return confirm('该操作将删除该会员相关的所有数据，确定要删除吗？');"><i class="icon-trash"></i>删除</a>
                            </td>
                        </tr>
<?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11">
                                <div class="pagination pagination-centered"></div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- END TABLE BODY -->
        </div>
    </div>
</div>
