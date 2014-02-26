 # 
 #  
 #  @authors Casper Lai (casper.lai@sleepingdesign.com)
 #  @date    2013-10-20 22:36:43
 #  @version 1.0.0.0
 # 

require ['../config/require.settings'], ->
	require ['chosen/chosen.jquery'], ->
		$(->
			$(".chosen-select").chosen()

			chosen_group = '.chosen-results .group-result';

			$(document)
			.on 'click', chosen_group, ->
				self = $(this)
				options = $('~li', self)
				next_group = options.filter('.group-result').get 0
				next = options.slice(0, options.index(next_group))
				$(next).mouseup()
				return
			.on 'mouseenter', chosen_group, ->
				

				
				$(this).css(cursor: 'pointer').addClass('highlighted').siblings().removeClass 'highlighted'

				return
			.on 'mouseleave', chosen_group, ->
				$(this).removeClass 'highlighted'
			return
		)
		return
	return