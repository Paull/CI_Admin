<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>message</title>
<script type="text/javascript">
alert("<?php echo $message; ?>");
<?php if(isset($url)): ?>
window.location.href = '<?php echo $url; ?>';
<?php else: ?>
history.go(-1);
<?php endif; ?>
</script>
</head>
<body>
</body>
</html>
