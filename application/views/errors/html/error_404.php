<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Error 404</title>
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
			<div class="error-404">
				<i class="icon-warning-sign icon-4x error-icon"></i>
				<h1>Page Not Found</h1>
				<span class="text-error"><small><strong>Error 404</strong></small></span>
				<h2>Sorry, but the page you were trying to view does not exist.</h2>
				<a href="<?php echo BASEURL; ?>">You will be redirected to the homepage in <span id="seconds">30 seconds</span> or just click this line.</a>
			</div>
		</div>
	</div>
	<script src="<?php echo STATIC_URL; ?>plugins/countdown/countdown.min.js"></script>
	<script>countdown(new Date().getTime()+30000, function(ts){document.getElementById('seconds').innerText = ts.toString();});</script>
</body>
</html>
