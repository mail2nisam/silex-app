(function($) {
    $(function() {

    });
    $('#location_locCountry').change(function() {
        doStateAjax(this,'location_locState');

    });
    $('#location_locState').empty();
    if ($('#location_locCountry').val()) {
        doStateAjax($('#location_locCountry'),'location_locState');
    }
    $('#BuyerInfo_billingCountry').change(function() {
        doStateAjax(this, 'BuyerInfo_billingState');

    });
    $('#BuyerInfo_billingState').empty();
    if ($('#BuyerInfo_billingCountry').val()) {
        doStateAjax($('#BuyerInfo_billingCountry'), 'BuyerInfo_billingState');
    }
    $('#BuyerInfo_shippingCountry').change(function() {
        doStateAjax(this, 'BuyerInfo_shippingState');

    });
    $('#BuyerInfo_shippingState').empty();
    if ($('#BuyerInfo_shippingCountry').val()) {
        doStateAjax($('#BuyerInfo_shippingCountry'), 'BuyerInfo_shippingState');
    }
    
    
    $('#no-of-probes').change(function() {
        probeUnitCost();
        totalCost();
    });
    probeUnitCost();
    function probeUnitCost() {
        var probe = $('#no-of-probes').val();
        var totalPrize = (parseInt(probe) * 120) + 120;
        $('#master_unit_price').html('$' + totalPrize);
    }
    $('#subscription-status').click(function() {

        checkSubscribe();
        totalCost();
    });
    checkSubscribe();
    function checkSubscribe() {
        var status = $('#subscription-status').prop('checked');
        if (status) {
            $('#subscription_details').show();
            $('.subscription_period-label').show();
            $('#subscription-period').show();
        } else {
            $('#subscription_details').hide();
            $('#subscription-period').hide();
            $('.subscription_period-label').hide();
        }
    }

    $('#subscription-period').change(function() {
        totalCost();
    });
    totalCost();
})(jQuery);

function totalCost() {
    var total_sub_fee = 0;
    var subscription_fee ;
    var no_of_probes = parseInt($('#no-of-probes').val());
    var probe_sub_total = ((no_of_probes) * 120) + 120;
    var status = $('#subscription-status').prop('checked');
    if (status) {
        var sub_period = $('#subscription-period').val();
        switch (sub_period) {
            case 'weekly':
                var weekly_prize = 0.50;
               
                total_sub_fee = probe_sub_total + (no_of_probes * parseFloat(weekly_prize));
                 subscription_fee = 'Weekly ('+no_of_probes+'x'+parseFloat(weekly_prize)+') = $'+(no_of_probes * parseFloat(weekly_prize)); 
                break;
            case 'monthly':
                var monthly_price = 1.50;
                total_sub_fee = probe_sub_total + (no_of_probes * parseFloat(monthly_price));
                subscription_fee = 'Monthly  ('+no_of_probes+'x'+parseFloat(monthly_price)+') = $'+(no_of_probes * parseFloat(monthly_price)); 
                break;
            case 'yearly':
                var yearly_price = 12.00;
                total_sub_fee = probe_sub_total + (no_of_probes * parseFloat(yearly_price));
                subscription_fee = 'Yearly  ('+no_of_probes+'x'+parseFloat(yearly_price)+') = $'+(no_of_probes * parseFloat(yearly_price)); 
                break;
        }
    } else {
        total_sub_fee = probe_sub_total;
    }
    $('#probe_sub_total').html('$' + probe_sub_total);
    $('#total-cost').html('$' + total_sub_fee);
    $('#subscription_details').html(subscription_fee);
}
function doStateAjax(thiss,destinationID) {
    if ($(thiss).val()) {
        var ajaxRoute = state_list.replace('countryId', $(thiss).val());
        $.ajax({
            type: "GET",
            url: ajaxRoute,
            success: function(data) {
                $('#'+destinationID).empty();
                $('#'+destinationID).append(data);
            }
        });
    } else {
        $('#'+destinationID).empty();
    }

}