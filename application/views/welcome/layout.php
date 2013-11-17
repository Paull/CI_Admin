<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo SITENAME, ' - ', $template['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo STATIC_URL; ?>images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="<?php echo STATIC_URL; ?>images/favicon.png" />
    <!-- BEGIN STYLE CODES -->
    <link href="<?php echo STATIC_URL; ?>plugins/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>styles/social.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>styles/social.plugins.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>styles/font-awesome.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>plugins/bootstrap/bootstrap-responsive.css" rel="stylesheet">
<?php foreach($template['styles'] as $style): ?>
    <link href="<?php echo $style; ?>" rel="stylesheet" />
<?php endforeach; ?>
    <!-- END STYLE CODES -->
    <link rel="prerender" href="<?php echo STATIC_URL; ?>plugins/jquery.ui/jquery-ui.min.js">
</head>
<body>
    <!-- BEGIN CONTAINER -->
    <div class="container">
<?php $this->load->view($template['content']); ?>
        <!-- BEGIN FOOTER -->
        <div class="form-footer-copyright">2013 &copy; <small><?php echo SITENAME; ?> Inc.</small></div>
        <!-- END FOOTER -->
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN JAVASCRIPT CODES -->
    <script src="<?php echo STATIC_URL; ?>plugins/jquery/jquery-1.10.2.min.js"></script>
<?php foreach($template['scripts'] as $script): ?>
    <script src="<?php echo $script; ?>"></script>
<?php endforeach; ?>
    <script><?php echo $template['javascript']; ?></script>
    <!-- END JAVASCRIPT CODES -->
</body>
</html>