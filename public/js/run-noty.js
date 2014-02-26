define(['noty'], function(){
    if($('.noty-message').length > 0){
        var messages = $('.noty-message').find('span');
        var style = $('.noty-message').data('status');
        $.each(messages, function(index, val) {
             var n = noty({
                text: val,
                type: style,
                layout: 'bottom',
                timeout: 3000
            });
        });
    }
});

