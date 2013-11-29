<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo SITENAME, ' - ', $template['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo STATIC_URL; ?>images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="<?php echo STATIC_URL; ?>images/favicon.png">
<?php $this->load->view('common/styles'); ?>
</head>
<body>
    <!-- BEGIN WRAPER -->
    <div class="wraper<?php if ( $autohide != 'true' ) echo ' sidebar-full'; ?>">
<?php $this->load->view('common/sidebar'); ?>
<?php $this->load->view('common/navbar'); ?>
        <!-- BEGIN MAIN CONTAINER -->
        <div id="main">
            <!-- BEGIN CONTENT CONTANER -->
            <div class="container-fluid">
<?php $this->load->view('common/header'); ?>
<?php $this->load->view($template['content']); ?>
            </div>
            <!-- END CONTENT CONTAINER -->
        </div>
        <!-- END MAIN CONTAINER -->
    </div>
    <!-- END WRAPER -->
<?php $this->load->view('common/scripts'); ?>
</body>
</html>
