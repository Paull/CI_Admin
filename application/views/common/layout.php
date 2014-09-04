<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo SITENAME, ' - ', $template['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo STATIC_URL; ?>img/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="<?php echo STATIC_URL; ?>img/favicon.png">
<?php $this->load->view('common/styles'); ?>
</head>
<body>
    <!-- BEGIN WRAPER -->
    <div class="wrapper">
<?php $this->load->view('common/sidebar'); ?>
<?php $this->load->view('common/navbar'); ?>
        <!-- BEGIN MAIN CONTAINER -->
        <div class="main">
            <!-- BEGIN CONTENT CONTANER -->
<?php $this->load->view('common/breadcrumb'); ?>
<?php $this->load->view($template['content']); ?>
        <div class="container">
          <div class="row"></div>
        </div>
            <!-- END CONTENT CONTAINER -->
        </div>
        <!-- END MAIN CONTAINER -->
    </div>
    <!-- END WRAPER -->
<?php $this->load->view('common/scripts'); ?>
</body>
</html>
