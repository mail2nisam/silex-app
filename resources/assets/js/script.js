(function($) {
    /**
     * Calculate Domestic Shipping Cost
     */
    $('#domestic_calculator').click(function() {
        var to_pin = $('#to_pin').val();
        var length = $('#length').val();
        var width = $('#width').val();
        var height = $('#height').val();
        var weight = $('#weight').val();

        $.ajax({
            type: "GET",
            url: ausPostCalculator,
            dataType: 'json',
            data: {destination: to_pin, length: length, width: width, height: height, weight: weight, type: 'domestic'},
            success: function(data) {

                var regularPostResult = data.services.service[0];
                var regularExpressResult = data.services.service[2];

                var effect = 'slide';
                var options = {direction: 'left'};
                var duration = 700;
                $('#domestic_input').toggle(effect, options, duration);
                var option = {direction: 'right'};
                $('#postage_regular').html('$' + regularPostResult.price);
                $('#postage_express').html('$' + regularExpressResult.price);
                $('#domestic_output').toggle(effect, option, duration);
            }
        });
    });

    $('#domestic_back').click(function() {
        var effect = 'slide';
        var options = {direction: 'left'};
        var duration = 700;
        $('#domestic_output').toggle(effect, option, duration);
        var option = {direction: 'right'};
        $('#domestic_input').toggle(effect, options, duration);

    });
    $('#location_locCountry').change(function() {
        doStateAjax(this, 'location_locState');

    });
    $('#location_locState').empty();
    if ($('#location_locCountry').val()) {
        doStateAjax($('#location_locCountry'), 'location_locState');
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
    shop_n_bill();

    function shop_n_bill() {
        if ($('.ship_n_bill').prop('checked')) {
            $('.shipping_address').slideUp('slow');
            doStateAjax($('#BuyerInfo_shippingCountry'), 'BuyerInfo_shippingState');
            setTimeout(function() {
                $('#BuyerInfo_shippingAddress1').val($('#BuyerInfo_billingAddress1').val());
                $('#BuyerInfo_shippingAddress2').val($('#BuyerInfo_billingAddress2').val());

                $('#BuyerInfo_shippingCity').val($('#BuyerInfo_billingCity').val());
                $('#BuyerInfo_shippingZip').val($('#BuyerInfo_billingZip').val());
                $('#BuyerInfo_shippingCountry').val($('#BuyerInfo_billingCountry').val());

                $('#BuyerInfo_shippingState').val($('#BuyerInfo_billingState').val());

            }, 1000);
        } else {
            $('.shipping_address').slideDown('slow');
        }
    }
    $('#BuyerInfo_shipNBill').click(function() {
        shop_n_bill();
    });
    $('#changebuy').click(function() {
        $('.new-order').slideToggle('slow');
    });
    $('#update-info').click(function() {
        var new_order_route = ajaxOrder;
        var probe_det = $('#new-order-probes').val();
        var subs_det = $('#new-order-subscription').val();
        $.ajax({
            type: "GET",
            url: new_order_route,
            dataType: 'json',
            data: {probes: probe_det, subscription: subs_det},
            success: function(data) {
                var responseText = " You Selected Master probe unit and " + data.no_of_probes + " probes ";
                var subText = '';

                if (data.purchaseDEtails.subscription.subscriptionStatus) {
                    responseText += ", with " + data.purchaseDEtails.subscription.subscriptionPeriod + "ly Probe monitoring Subscription <br/>";
                    subText = "Probe Monitoring Subscription fee (" + data.purchaseDEtails.subscription.subscriptionPeriod + "ly) = $" + data.purchaseDEtails.subscription.totalSubscriptionCost;
                }
                responseText += "Total item cost = $" + data.purchaseDEtails.subTotal + "<br/>" + subText;
                $('#order-summary').html(responseText);
                $('.new-order').slideToggle('slow');
            }
        });
    });
})(jQuery);

function totalCost() {
    var total_sub_fee = 0;
    var subscription_fee;
    var no_of_probes = parseInt($('#no-of-probes').val());
    var probe_sub_total = ((no_of_probes) * 120) + 120;
    var status = $('#subscription-status').prop('checked');
    if (status) {
        var sub_period = $('#subscription-period').val();
        switch (sub_period) {
            case 'weekly':
                var weekly_prize = 0.50;

                total_sub_fee = probe_sub_total + (no_of_probes * parseFloat(weekly_prize));
                subscription_fee = 'Weekly (' + no_of_probes + 'x' + parseFloat(weekly_prize) + ') = $' + (no_of_probes * parseFloat(weekly_prize));
                break;
            case 'monthly':
                var monthly_price = 1.50;
                total_sub_fee = probe_sub_total + (no_of_probes * parseFloat(monthly_price));
                subscription_fee = 'Monthly  (' + no_of_probes + 'x' + parseFloat(monthly_price) + ') = $' + (no_of_probes * parseFloat(monthly_price));
                break;
            case 'yearly':
                var yearly_price = 12.00;
                total_sub_fee = probe_sub_total + (no_of_probes * parseFloat(yearly_price));
                subscription_fee = 'Yearly  (' + no_of_probes + 'x' + parseFloat(yearly_price) + ') = $' + (no_of_probes * parseFloat(yearly_price));
                break;
        }
    } else {
        total_sub_fee = probe_sub_total;
    }
    $('#probe_sub_total').html('$' + probe_sub_total);
    $('#total-cost').html('$' + total_sub_fee);
    $('#subscription_details').html(subscription_fee);
}
function doStateAjax(thiss, destinationID) {
    if ($(thiss).val()) {
        var ajaxRoute = state_list.replace('countryId', $(thiss).val());
        $.ajax({
            type: "GET",
            url: ajaxRoute,
            success: function(data) {
                $('#' + destinationID).empty();
                $('#' + destinationID).append(data);

            }
        });
    } else {
        $('#' + destinationID).empty();
    }

}