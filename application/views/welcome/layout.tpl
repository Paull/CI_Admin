<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{$site_title}</title>
    <link rel="apple-touch-icon" href="{$template.assets}images/apple-touch-icon.png">
    <link rel="shortcut icon" href="{$template.assets}images/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{$template.assets}css/bootstrap.min.css">
    <link rel="stylesheet" href="{$template.assets}css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="{$template.assets}css/site.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="{$template.assets}vendor/animsition/animsition.css">
    <link rel="stylesheet" href="{$template.assets}vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="{$template.assets}vendor/switchery/switchery.css">
    <link rel="stylesheet" href="{$template.assets}vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="{$template.assets}vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="{$template.assets}vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="{$template.assets}vendor/waves/waves.css">
{% block styles %}
{% endblock %}

    <!-- Fonts -->
    <link rel="stylesheet" href="{$template.assets}/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="{$template.assets}/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
{% block fonts %}
{% endblock %}

    <!--[if lt IE 9]>
    <script src="{$template.assets}vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="{$template.assets}vendor/media-match/media.match.min.js"></script>
    <script src="{$template.assets}vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{$template.assets}vendor/modernizr/modernizr.js"></script>
    <script src="{$template.assets}vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body{% if body_class %} class="{$body_class}"{% endif %}>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    {% block content %}
        This is the content to be displayed.
    {% endblock %}

    <!-- Core  -->
    <script src="{$template.assets}vendor/jquery/jquery.js"></script>
    <script src="{$template.assets}vendor/bootstrap/bootstrap.js"></script>
    <script src="{$template.assets}vendor/animsition/animsition.js"></script>
    <script src="{$template.assets}vendor/asscroll/jquery-asScroll.js"></script>
    <script src="{$template.assets}vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="{$template.assets}vendor/asscrollable/jquery.asScrollable.all.js"></script>
    <script src="{$template.assets}vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    <script src="{$template.assets}vendor/waves/waves.js"></script>

    <!-- Plugins -->
    <script src="{$template.assets}vendor/switchery/switchery.min.js"></script>
    <script src="{$template.assets}vendor/intro-js/intro.js"></script>
    <script src="{$template.assets}vendor/screenfull/screenfull.js"></script>
    <script src="{$template.assets}vendor/slidepanel/jquery-slidePanel.js"></script>

    <!-- Scripts -->
    <script src="{$template.assets}js/core.js"></script>
    <script src="{$template.assets}js/site.js"></script>
    <script src="{$template.assets}js/sections/menu.js"></script>
    <script src="{$template.assets}js/sections/menubar.js"></script>
    <script src="{$template.assets}js/sections/sidebar.js"></script>
    <script src="{$template.assets}js/configs/config-colors.js"></script>
    <script src="{$template.assets}js/configs/config-tour.js"></script>
    <script src="{$template.assets}js/components/asscrollable.js"></script>
    <script src="{$template.assets}js/components/animsition.js"></script>
    <script src="{$template.assets}js/components/slidepanel.js"></script>
    <script src="{$template.assets}js/components/switchery.js"></script>
    <script src="{$template.assets}js/components/tabs.js"></script>
{% block scripts %}
{% endblock %}

    <script>
      (function(document, window, $){
        'use strict';

        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
{% block javascript %}
{% endblock %}
    </script>
  </body>
</html>
