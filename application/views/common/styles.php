    <!-- BEGIN GENERAL STYLE LINKS -->
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>plugins/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>styles/social-jquery-ui.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>styles/social.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>styles/social.plugins.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>styles/font-awesome.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>styles/social-coloredicons-buttons.css">

    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>styles/app.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>plugins/jquery.simplecolorpicker/jquery.simplecolorpicker.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>styles/themes/social.theme-<?php echo $theme; ?>.css" id="theme">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>plugins/bootstrap/bootstrap-responsive.css">
    <!-- END GENERAL STYLE LINKS -->

    <!-- BEGIN STYLE LINKS FOR THE CURRENT PAGE -->
<?php foreach($template['styles'] as $style): ?>
    <link rel="stylesheet" href="<?php echo $style; ?>" />
<?php endforeach; ?>
    <!-- END STYLE LINKS FOR THE CURRENT PAGE -->

    <!-- BEGIN STYLE CODES FOR THE CURRENT PAGE -->
    <style><?php echo $template['stylesheet']; ?></style>
    <!-- END STYLE CODES FOR THE CURRENT PAGE -->
