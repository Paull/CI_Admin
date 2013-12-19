    <!-- BEGIN GENERAL JAVASCRIPT LINKS -->
    <script src="<?php echo STATIC_URL; ?>plugins/jquery/jquery-1.10.2.min.js"></script>
    <script src="<?php echo STATIC_URL; ?>plugins/jquery.ui/jquery-ui.min.js"></script>
    <script src="<?php echo STATIC_URL; ?>plugins/jquery.ui.touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="<?php echo STATIC_URL; ?>plugins/bootstrap/bootstrap.min.js"></script>

    <script src="<?php echo STATIC_URL; ?>plugins/holder/holder.js"></script>
    <script src="<?php echo STATIC_URL; ?>plugins/jquery.slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo STATIC_URL; ?>plugins/jquery.simplecolorpicker/jquery.simplecolorpicker.js"></script>
    <script src="<?php echo STATIC_URL; ?>plugins/jquery.livefilter/jquery.livefilter.js"></script>
    <script src="<?php echo STATIC_URL; ?>plugins/jquery.cookie/jquery.cookie.js"></script>

    <script src="<?php echo STATIC_URL; ?>scripts/extents.js"></script>
    <script src="<?php echo STATIC_URL; ?>scripts/app-settings.js"></script>
    <script src="<?php echo STATIC_URL; ?>scripts/sidebar.js"></script>
    <!-- END GENERAL JAVASCRIPT LINKS -->

    <!-- BEGIN JAVASCRIPT LINKS FOR THE CURRENT PAGE -->
<?php foreach($template['scripts'] as $script): ?>
    <script src="<?php echo $script; ?>"></script>
<?php endforeach; ?>
    <!-- END JAVASCRIPT LINKS FOR THE CURRENT PAGE -->

    <!-- BEGIN JAVASCRIPT CODES FOR THE CURRENT PAGE -->
    <script>
        /*<![CDATA[*/
<?php echo $template['javascript']; ?>
        $(function() {
            AppSettings.init({urlThemes: '<?php echo STATIC_URL; ?>styles/themes/social.theme-'});
            SideBar.init({shortenOnClickOutside: <?php echo $autohide; ?>});
        });
        /*]]>*/
    </script>
    <!-- END JAVASCRIPT CODES FOR THE CURRENT PAGE -->
