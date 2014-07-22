    <!-- BEGIN GENERAL STYLE LINKS -->
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/social.core.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/social.admin.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/glyphicons_free/glyphicons.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/glyphicons_pro/glyphicons.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/glyphicons_pro/glyphicons.halflings.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/jquery-ui/social/jquery.ui.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL; ?>css/themes/admin/facebook.css" id="current-theme">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--[if lt IE 8]>
    <script src="../../assets/js/html5shiv/html5shiv.js"></script>
    <script src="../../assets/js/plugins/respond/respond.min.js"></script> 
    <![endif]-->
    <!-- END GENERAL STYLE LINKS -->

    <!-- BEGIN STYLE LINKS FOR THE CURRENT PAGE -->
<?php foreach($template['styles'] as $style): ?>
    <link rel="stylesheet" href="<?php echo $style; ?>" />
<?php endforeach; ?>
    <!-- END STYLE LINKS FOR THE CURRENT PAGE -->

    <!-- BEGIN STYLE CODES FOR THE CURRENT PAGE -->
    <style>
        .wrapper .main {
            margin-top: 40px;
        }
        @media screen and (max-width: 480px) {
            .wrapper .main {
                margin-top: 80px;
            }
        }
<?php echo $template['stylesheet']; ?>
    </style>
    <!-- END STYLE CODES FOR THE CURRENT PAGE -->
