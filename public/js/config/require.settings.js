(function() {
  var jQueryVersionPath;

  jQueryVersionPath = 'querySelector' in document && 'localStorage' in window && 'addEventListener' in window ? 'jquery-modern/jquery' : 'jquery-legacy/jquery';

  requirejs.config({
    baseUrl: '/components',
    paths: {
      adminApp: '../js',
      bootstrap: 'bootstrap/dist/js/bootstrap',
      ace: '../js/ace',
      html5shiv: 'html5shiv/dist/html5shiv',
      respond: 'respond/respond.src',
      excanvas: 'excanvas/excanvas',
      jquery: 'jquery-modern/jquery',
      jquerymobile: 'jquery-mobile/js/jquery.mobile',
      slimScroll: 'jquery.slimscroll/jquery.slimscroll',
      easypiechat: 'jquery.easy-pie-chart/dist/jquery.easypiechart',
      sparkline: 'sparkline/dist/jquery.sparkline',
      flot: 'flot',
      jqueryui: 'jquery-ui/ui/minified',
      jquerytouch: 'jqueryui-touch-punch/jquery.ui.touch-punch',
      typeahead: 'typeahead/dist/typeahead',
      chosen: '../js/chosen',
      noty: 'noty/js/noty/packaged/jquery.noty.packaged.min',
      zipcode: 'jquery-twzipcode/jquery.twzipcode.min',
      'bootstrap-prompts': 'bootstrap-simple-prompts/bootstrap-simple-prompts'
    },
    shim: {
      'jquery': {
        exports: '$'
      },
      'jqueryui/jquery-ui.min': {
        deps: ['jquery']
      },
      'bootstrap': {
        deps: ['jquery']
      },
      'ace/ace.min': {
        deps: ['ace/ace-elements.min']
      },
      'ace/ace-elements.min': {
        deps: ['ace/ace-extra.min', 'bootstrap', 'jquery']
      },
      'chosen/chosen.select': {
        deps: ['chosen/chosen.jquery']
      },
      'chosen/chosen.jquery': {
        deps: ['jquery']
      },
      'noty': {
        deps: ['jquery']
      },
      'zipcode': {
        deps: ['jquery']
      },
      'bootstrap-prompts': {
        dpes: ['jquery', 'bootstrap']
      }
    }
  });

  require(['adminApp/common'], function(App) {
    App.initialize();
  });

}).call(this);
