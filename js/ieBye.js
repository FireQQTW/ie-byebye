/**
 * 
 * @authors Derek Liu (azraelxuan927@gmail.com)
 * @date    2013-08-29 14:16:38
 * @version 0.1
 */
$(document).ready(function() {
	var 	_firefixURL = 'http://moztw.org/firefox/download/latest-win.html',
		_chromeURL ='https://dl.google.com/tag/s/appguid%3D%7B8A69D345-D564-463C-AFF1-A69D9E530F96%7D%26iid%3D%7B9992E29F-C177-515E-4DD0-1A87BDB6ADD3%7D%26lang%3Dzh-TW%26browser%3D4%26usagestats%3D0%26appname%3DGoogle%2520Chrome%26needsadmin%3Dprefers%26brand%3DCHMB%26installdataindex%3Ddefaultbrowser/update2/installers/ChromeSetup.exe',
		_ieURL = 'http://windows.microsoft.com/zh-tw/internet-explorer/ie-10-worldwide-languages',
		_pText = '提醒您，IE瀏覽器版本過舊，為了提升您的使用者體驗，建議您更換瀏覽器。',
		_barWrap = '<div class="ieByeBar"><p>#</p><div class="BtnWrap"><a href="#" target="_blank" class="goFiefox">FIREFOX</a><a href="#" target="_blank" class="goChrome">CHROME</a><a href="#" target="_blank" class="goIE">IE</a></div><a href="#" class="closeBtn">CLOSE</a></div>';
	
	//將基本的結構寫進網頁
	$('body .ieByeBye').before(_barWrap);

	//寫入說明文字
	$('.ieByeBar p').text(_pText);

	//將三個瀏覽器的href寫入
	$('.goFiefox').attr('href',	_firefixURL);
	$('.goChrome').attr('href', _chromeURL);
	$('.goIE').attr('href', _ieURL);

	//關閉按鈕
	$('.ieByeBar .closeBtn').click(function(event) {
		event.preventDefault();
		$('.ieByeBar').hide(100);
	});
});
