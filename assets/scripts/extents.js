/* Calls the handler function if the user has clicked outside the object
*/

(function($) {
  "use strict";  $.fn.extend({
    clickOutside: function(handler, exceptions) {
      var $this;
      $this = void 0;
      $this = this;
      $("body").bind("click", function(event) {
        if (exceptions && $.inArray(event.target, exceptions) > -1) {

        } else {
          if (!$.contains($this[0], event.target)) {
            return handler(event, $this);
          }
        }
      });
      return this;
    }
  });
})(jQuery);

/* Need this to make IE happy
   see http://soledadpenades.com/2007/05/17/arrayindexof-in-internet-explorer/
*/
if (!Array.indexOf) {
  Array.prototype.indexOf = function(obj) {
    "use strict";
    var i;
    i = 0;
    while (i < this.length) {
      if (this[i] === obj) {
        return i;
      }
      i++;
    }
    return -1;
  };
}
