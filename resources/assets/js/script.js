(function($) {
    $(function() {

    });
    $('#location_locCountry').change(function() {
        doStateAjax(this);

    });
    $('#location_locState').empty();
    if ($('#location_locCountry').val()) {
        doStateAjax($('#location_locCountry'));
    }

})(jQuery);
function doStateAjax(thiss) {
    if ($(thiss).val()) {
        var ajaxRoute = state_list.replace('countryId', $(thiss).val());
        $.ajax({
            type: "GET",
            url: ajaxRoute,
            success: function(data) {
                $('#location_locState').empty();
                $('#location_locState').append(data);
            }
        });
    }else{
        $('#location_locState').empty();
    }

}