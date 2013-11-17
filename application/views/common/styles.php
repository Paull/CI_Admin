    <!-- BEGIN GENERAL STYLE LINKS -->
    <link href="<?php echo STATIC_URL; ?>plugins/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>styles/social-jquery-ui.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>styles/social.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>styles/social.plugins.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>styles/font-awesome.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>styles/social-coloredicons-buttons.css" rel="stylesheet">

    <link href="<?php echo STATIC_URL; ?>styles/app.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>plugins/jquery.simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet">
    <link href="<?php echo STATIC_URL; ?>styles/themes/social.theme-<?php echo $theme; ?>.css" rel="stylesheet" id="theme">
    <link href="<?php echo STATIC_URL; ?>plugins/bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <!-- END GENERAL STYLE LINKS -->

    <!-- BEGIN STYLE LINKS FOR THE CURRENT PAGE -->
<?php foreach($template['styles'] as $style): ?>
    <link href="<?php echo $style; ?>" rel="stylesheet" />
<?php endforeach; ?>
    <!-- END STYLE LINKS FOR THE CURRENT PAGE -->

    <!-- BEGIN STYLE CODES FOR THE CURRENT PAGE -->
    <style><?php echo $template['stylesheet']; ?></style>
    <!-- END STYLE CODES FOR THE CURRENT PAGE -->
