(function() {
  define(['bootstrap-prompts'], function() {
    $(document).on('click', '.jquery-confirm', function(event) {
      var element;

      event.preventDefault();
      element = $(this);
      confirm('確定執行動作？', function(result) {
        var href;

        if (result) {
          if (element.is('a')) {
            href = element.prop('href');
            location.href = href;
          } else {
            element.closest('form').submit();
          }
        }
      });
    });
  });

}).call(this);
