(function() {
  require(['../config/require.settings'], function() {
    require(['chosen/chosen.jquery'], function() {
      $(function() {
        var chosen_group;

        $(".chosen-select").chosen();
        chosen_group = '.chosen-results .group-result';
        $(document).on('click', chosen_group, function() {
          var next, next_group, options, self;

          self = $(this);
          options = $('~li', self);
          next_group = options.filter('.group-result').get(0);
          next = options.slice(0, options.index(next_group));
          $(next).mouseup();
        }).on('mouseenter', chosen_group, function() {
          $(this).css({
            cursor: 'pointer'
          }).addClass('highlighted').siblings().removeClass('highlighted');
        }).on('mouseleave', chosen_group, function() {
          return $(this).removeClass('highlighted');
        });
      });
    });
  });

}).call(this);
