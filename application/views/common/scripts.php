    <!-- BEGIN GENERAL SCRIPT LINKS -->
    <script>
      var assets_dir = '<?php echo STATIC_URL; ?>'
    </script>
    <!-- jQuery-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
      window.jQuery || document.write('<script src="'+assets_dir+'js/plugins/jquery/jquery.min.js"><\/script>')
    </script>
    <!-- Bootstrap JS-->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
      $.fn.modal || document.write('<script src="'+assets_dir+'js/plugins/bootstrap/bootstrap.min.js"><\/script>')
       // Prevent jQueryUI Conflicts
       var bootstrapTooltip = $.fn.tooltip.noConflict()
       $.fn.bootstrapTooltip = bootstrapTooltip
    </script>
    <!-- jQueryUI-->
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
      window.jQuery.ui || document.write('<script src="'+assets_dir+'js/jquery-ui/jquery-ui.min.js"><\/script>')
    </script>
    <!-- Bootstrap Hover Dropdown-->
    <script src="<?php echo STATIC_URL; ?>js/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <!-- jQuery slimScroll-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.1/jquery.slimscroll.min.js"></script>
    <script>
      window.jQuery.ui || document.write('<script src="'+assets_dir+'js/plugins/jquery.slimscroll/jquery.slimscroll.min.js"><\/script>')
    </script>
    <script src="<?php echo STATIC_URL; ?>js/sidebar.js"></script>
    <script src="<?php echo STATIC_URL; ?>js/panels.js"></script>
    <!-- END GENERAL SCRIPT LINKS -->

    <!-- BEGIN GENERAL SCRIPTS-->
    <script>
      /*<![CDATA[*/
      $(function() {
        $(".social-sidebar").socialSidebar();
        $('.main').panels();
        $(".main a[href='#ignore']").click(function(e) {
          e.stopPropagation()
        });
      });
      $(document).on('click', '.navbar-super .navbar-super-fw', function(e) {
        e.stopPropagation()
      });
      /*]]>*/
    </script>
    <!-- END GENERAL SCRIPTS-->

    <!-- BEGIN SCRIPT LINKS FOR THE CURRENT PAGE -->
<?php foreach($template['scripts'] as $script): ?>
    <script src="<?php echo $script; ?>"></script>
<?php endforeach; ?>
    <!-- END SCRIPT LINKS FOR THE CURRENT PAGE -->

    <!-- BEGIN SCRIPTS FOR THE CURRENT PAGE -->
    <script>
        /*<![CDATA[*/
<?php echo $template['javascript']; ?>
        /*]]>*/
    </script>
    <!-- END SCRIPTS FOR THE CURRENT PAGE -->
