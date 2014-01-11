var AppSettings;

AppSettings = (function($) {
  "use strict";
  var config, handleAutoHideSidebarOption, handleDividersSideBarOption, handleThemeOptions, init, pattern;

  pattern = ".user > span, .navigation-sidebar > span,";
  pattern += ".menu .accordion-heading .arrow,";
  pattern += ".menu .accordion-heading a > span,";
  pattern += ".menu .accordion-body > li > a,";
  pattern += ".chat-users .user-list li a > span";
  /*
  */

  config = {
    urlThemes: 'none'
  };
  /*
  */

  init = function(options) {
    $.extend(config, options);
    handleDividersSideBarOption();
    handleAutoHideSidebarOption();
    handleThemeOptions();
  };
  /* Dividers in the sidebar
  */

  handleDividersSideBarOption = function() {
    /*  Sidebar Options
    */
    $("#app-setting #sidebar-dividers").click(function() {
      var $sidebar;

      $sidebar = $(".social-sidebar");
      if ($(this).prop("checked")) {
        $sidebar.addClass("dividers");
      } else {
        $sidebar.removeClass("dividers");
      }
    });
  };
  /* Auto Hide Sidebar Option
  */

  handleAutoHideSidebarOption = function() {
    $("#app-setting #sidebar-autohide").click(function() {
      var $main, $navbar, $sidebar, $wraper;

      $sidebar = $(".social-sidebar");
      $wraper = $(".wraper");
      $navbar = $(".social-navbar");
      $main = $("#main");

      if ($(this).prop("checked")) {
        $wraper.removeClass("sidebar-full");
        $sidebar.removeClass("sidebar-full");
        $.cookie('autohide', 'true', {expires: 7, path: '/'});
      } else {
        $wraper.addClass("sidebar-full");
        $sidebar.addClass("sidebar-full");
        $navbar.removeAttr("style");
        $main.removeAttr("style");
        $sidebar.find(pattern).removeAttr("style");
        $sidebar.find(".search-sidebar img").removeAttr("style");
        $(".icon-user.trigger-user-settings, .input-filter").removeAttr("style");
        $.cookie('autohide', 'false', {expires: 7, path: '/'});
      }

    });
  };
  /*  Navbar Options
  */

  handleThemeOptions = function() {
    $("select[name=\"colorpicker\"]").simplecolorpicker();
    $("select[name=\"colorpicker\"]").on("change", function() {
      var element, themeName, themeStyleSheet;

      themeStyleSheet = $("#theme");
      element = $("option:selected", this);
      if (typeof element.attr("data-class") !== 'undefined') {
        $.cookie('theme', element.attr("data-class"), {expires: 7, path: '/'});
        themeName = config.urlThemes + element.attr("data-class") + '.css';
      } else {
        $.cookie('theme', 'blue', {expires: 7, path: '/'});
        themeName = '#none';
      }
      themeStyleSheet.attr('href', themeName);
    });
  };
  return {
    init: init
  };
})(jQuery);
