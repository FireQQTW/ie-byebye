/**
 *
 * @authors Casper Lai (casper.lai@sleepingdesign.com)
 * @date    2013-10-18 02:32:04
 * @version $Id$
 */
define(function() {
    return {
        initialize: function() {
            require(['jquery', 'ace/ace.min'], function() {
                
                $(document).ready(function(){
                    // 使用超連結模擬送出表單
                    $(document).on('click', '.simulate-submit', function(event) {
                        event.preventDefault();
                        $(this).parents('form').submit();
                    });

                    //設定目前menu位置
                    var active_val = $("#menu_active").val();
                    var $active_menu = $("#mainmenu.nav a[href*='" + active_val +"']");
                    $active_menu.parent('li').addClass('active').parents('ul.submenu').parent('li').addClass('active open');
                });




                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {}

                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {}

                try {
                    ace.settings.check('sidebar', 'fixed')
                } catch (e) {}
                try {
                    ace.settings.check('sidebar', 'collapsed')
                } catch (e) {}
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {}

            });

        }
    }

});
