 # 
 #  
 #  @authors Casper Lai (casper.lai@sleepingdesign.com)
 #  @date    2013-10-21 01:56:00
 #  @version 1.0.0.0
 # 

require(['../config/require.settings'], ->
	require(['bootstrap'], ()->
		$('[data-rel=tooltip]').tooltip({container:'body'});
	)
)