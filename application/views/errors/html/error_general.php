<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Error <?php echo $status_code; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="refresh" content="30;url=/">
	<link rel="shortcut icon" href="<?php echo STATIC_URL; ?>images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="<?php echo STATIC_URL; ?>images/favicon.png" />
	<link rel="stylesheet" href="<?php echo STATIC_URL; ?>plugins/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="<?php echo STATIC_URL; ?>styles/error.css">
	<link rel="stylesheet" href="<?php echo STATIC_URL; ?>styles/font-awesome.css">
	<link rel="stylesheet" href="<?php echo STATIC_URL; ?>plugins/bootstrap/bootstrap-responsive.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="error-500">
				<i class="icon-remove-sign icon-4x error-icon"></i>
				<h1><?php echo $heading; ?></h1>
				<span class="text-error"><small><strong>Error <?php echo $status_code; ?></strong></small></span>
				<h2><?php echo $message; ?></h2>
				<a href="<?php echo BASEURL; ?>">You will be redirected to the homepage in <span id="seconds">30 seconds</span> or just click this line.</a>
			</div>
		</div>
	</div>
	<script src="<?php echo STATIC_URL; ?>plugins/countdown/countdown.min.js"></script>
	<script>countdown(new Date().getTime()+30000, function(ts){document.getElementById('seconds').innerText = ts.toString();});</script>
</body>
</html>
