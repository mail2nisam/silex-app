(function($) {
    $(function() {

    });
    $('#form_country').change(function() {
        doStateAjax(this);

    });
    if ($('#form_country').val()) {
        doStateAjax($('#form_country'));
    }

})(jQuery);
function doStateAjax(thiss) {
    if ($(thiss).val()) {
        var ajaxRoute = state_list.replace('countryId', $(thiss).val());
        $.ajax({
            type: "GET",
            url: ajaxRoute,
            success: function(data) {
                $('#form_state').parent().html(data);
            }
        });
    }else{
        $('#form_state').empty();
    }

}