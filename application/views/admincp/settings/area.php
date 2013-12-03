<div class="social-box">
    <div class="header">
        <h4><?php echo $template['title']; ?></h4>
    </div>
    <div class="body">
<?php foreach($list as $key=>$value): ?>
        <div class="row-fluid">
            <div class="span4"><input name="area[<?php echo $key; ?>]['name']" value="<?php echo $value['name']; ?>"></div>
        </div>
<?php foreach($value['children'] as $key1=>$value1): ?>
        <div class="row-fluid">
            <div class="offset1 span4"><input name="area[<?php echo $key1; ?>]['name']" value="<?php echo $value1['name']; ?>"></div>
        </div>
<?php endforeach; ?>
<?php endforeach; ?>
    </div>
</div>
