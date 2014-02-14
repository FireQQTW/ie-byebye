require(['../config/require.settings'], function() {
    require(['jquery'], function() {
        require(['/components/jquery-twzipcode/jquery.twzipcode.min.js'], function() {
            $('#jq_twzip').twzipcode({});
        });
    });
});
