(function() {
  require(['../config/require.settings'], function() {
    return require(['bootstrap'], function() {
      return $('[data-rel=tooltip]').tooltip({
        container: 'body'
      });
    });
  });

}).call(this);
