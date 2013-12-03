<div class="social-box">
    <div class="header">
        <h4><?php echo $template['title']; ?></h4>
    </div>
    <div class="body">
<?php echo form_open(''); ?>
<?php foreach($list as $key=>$value): ?>
        <div class="row-fluid">
            <div class="span2">
                <input type="text" name="area[<?php echo $key; ?>]" value="<?php echo $value['name']; ?>">
            </div>
            <div class="span2">
                <a href="javascript:void(0);">删除</a>
            </div>
        </div>
<?php foreach($value['children'] as $key1=>$value1): ?>
        <div class="row-fluid">
            <div class="offset1 span2">
                <input type="text" name="area[<?php echo $key1; ?>]" value="<?php echo $value1['name']; ?>">
            </div>
            <div class="span2">
                <a href="javascript:void(0);" onclick="add_location(this, <?php echo $key1; ?>, 'after', 'offset2 span2')">添加<?php echo $value1['name']; ?>下属地点</a> | <a href="javascript:void(0);">删除</a>
            </div>
        </div>
<?php foreach($value1['children'] as $key2=>$value2): ?>
        <div class="row-fluid">
            <div class="offset2 span2">
                <input type="text" name="area[<?php echo $key2; ?>]" value="<?php echo $value2['name']; ?>">
            </div>
            <div class="span2">
                <a href="javascript:void(0);">删除</a>
            </div>
        </div>
<?php endforeach; ?>
<?php endforeach; ?>
        <div class="row-fluid">
            <div class="offset1 span2">
                <a href="javascript:void(0);" onclick="add_location(this, <?php echo $key; ?>, 'before', 'offset1 span2')">添加<?php echo $value['name']; ?>下属地点</a>
            </div>
        </div>
<?php endforeach; ?>
        <button type="submit" class="btn btn-primary">提交</button>
<?php echo form_close(); ?>
    </div>
</div>
<script>
var add_location = function(obj, parent_id, flow, class_name){
    if(flow == 'after')
        $(obj).parents('div.row-fluid').after('<div class="row-fluid"><div class="'+class_name+'"><input type="text" name="newarea['+parent_id+'][]"></div><div class="span2"><a href="javascript:void(0);" onclick="cancel_location(this);">撤消</a></div></div>');
    else if(flow == 'before')
        $(obj).parents('div.row-fluid').before('<div class="row-fluid"><div class="'+class_name+'"><input type="text" name="newarea['+parent_id+'][]"></div><div class="span2"><a href="javascript:void(0);" onclick="cancel_location(this);">撤消</a></div></div>');
}
var cancel_location = function(obj)
{
    $(obj).parents('div.row-fluid').remove();
}
</script>
