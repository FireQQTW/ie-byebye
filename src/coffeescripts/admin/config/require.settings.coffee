 # 
 #  
 #  @authors Casper Lai (casper.lai@sleepingdesign.com)
 #  @date    2013-10-18 01:39:00
 #  @version $Id$
 # 
jQueryVersionPath = if 'querySelector' of document and 'localStorage' of window and 'addEventListener' of window then 'jquery-modern/jquery' else 'jquery-legacy/jquery'
requirejs.config
	baseUrl: '/components'
	paths:
		#admin app
		adminApp: '../js'
		#bootstrap
		bootstrap: 'bootstrap/dist/js/bootstrap'
		#ace
		ace: '$adminApp/ace'
		#html5 support browse 
		html5shiv: 'html5shiv/dist/html5shiv'
		respond: 'respond/respond.src'
		excanvas: 'excanvas/excanvas'
		#jquery
		jquery: 'jquery-modern/jquery'
		jquerymobile: 'jquery-mobile/js/jquery.mobile'
		slimScroll: 'jquery.slimscroll/jquery.slimscroll'
		easypiechat: 'jquery.easy-pie-chart/dist/jquery.easypiechart'
		sparkline: 'sparkline/dist/jquery.sparkline'
		flot: 'flot'
		#jquery ui
		jqueryui: 'jquery-ui/ui/minified'
		jquerytouch: 'jqueryui-touch-punch/jquery.ui.touch-punch'
		#typeahead
		typeahead: 'typeahead/dist/typeahead'
		#chosen
		chosen: '$adminApp/chosen'
		noty: 'noty/js/noty/packaged/jquery.noty.packaged.min'
    	zipcode: 'jquery-twzipcode/jquery.twzipcode.min'
	shim:
		jquery:
			exports: '$'
		'jqueryui/jquery-ui.min':
			deps:
				['jquery']
		bootstrap:
			deps:
				['jquery']
		'ace/ace.min':
			deps:
				['ace/ace-elements.min']
		'ace/ace-elements.min':
			deps:
				['ace/ace-extra.min', 'bootstrap', 'jquery']
		'chosen/chosen.select':
			deps:
				['chosen/chosen.jquery']
		'chosen/chosen.jquery':
			deps:
				['jquery']
		noty:
			deps:
				['jquery']
		zipcode:
			deps:
				['jquery']


require ['adminApp/common'], (App) ->
	App.initialize();
	return


