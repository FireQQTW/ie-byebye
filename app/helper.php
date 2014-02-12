<?php
/**
 * 
 * @authors Casper Lai (casper.lai@sleepingdesign.com)
 * @date    2013-10-18 19:53:59
 * @version 1.0.0.0
 */


HTML::macro('ButtonWithIcon', function($iconAndValue, $options){
	return HTML::decode(Form::button($iconAndValue, $options));
});

