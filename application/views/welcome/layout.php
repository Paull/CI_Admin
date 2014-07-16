<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo SITENAME, ' - ', $template['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo STATIC_URL; ?>img/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="<?php echo STATIC_URL; ?>img/favicon.png" />
    <!-- BEGIN STYLE CODES -->
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/social.core.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/social.admin.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/themes/admin/facebook.css" id="current-theme">
<?php foreach($template['styles'] as $style): ?>
    <link rel="stylesheet" href="<?php echo $style; ?>">
<?php endforeach; ?>
    <!-- END STYLE CODES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--[if lt IE 8]>
    <script src="<?php echo STATIC_URL; ?>js/html5shiv/html5shiv.js"></script>
    <script src="<?php echo STATIC_URL; ?>js/plugins/respond/respond.min.js"></script> 
    <![endif]-->
  </head>
  <body>
    <!-- BEGIN CONTAINER -->
    <div class="container">
<?php $this->load->view($template['content']); ?>
      <!-- BEGIN FOOTER SECTION-->
      <footer>2014 &copy; <small><?php echo SITENAME; ?> Inc.</small></footer>
      <!-- END FOOTER SECTION-->
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN JAVASCRIPT CODES -->
    <script src="<?php echo STATIC_URL; ?>js/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL; ?>js/plugins/bootstrap/bootstrap.min.js"></script>
<?php foreach($template['scripts'] as $script): ?>
    <script src="<?php echo $script; ?>"></script>
<?php endforeach; ?>
    <script><?php echo $template['javascript']; ?></script>
    <!-- END JAVASCRIPT CODES -->
  </body>
</html>
