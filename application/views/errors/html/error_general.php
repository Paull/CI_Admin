<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
