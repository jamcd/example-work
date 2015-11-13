jQuery(document).ready(function($) {
    var sliderToPrice = function (slider) {
        return 1000 * (slider * slider);
    };

    var priceToSlider = function (price) {
        return Math.sqrt(price / 1000);
    };


    var distanceToSlider = function(distance) {
        return Math.sqrt(distance * 100);
    };

    var sliderToDistance = function(slider) {
        return (slider * slider) / 100;
    };

    $('#property-filter-price-slider').slider({
        range: true,
        min: 0,
        max: 100,
        values: [
            Math.round(priceToSlider($('#property-filter-price-min').val())),
            Math.round(priceToSlider($('#property-filter-price-max').val()))
        ],
        step: 1,
        slide: function (event, ui) {
            $('#property-filter-price-min').val(sliderToPrice(ui.values[0]));
            $('#property-filter-price-max').val(sliderToPrice(ui.values[1]));
            $('#property-filter-price-indicator .min').html( $('#property-filter-price-min').val() ).priceFormat({prefix:"&pound;", centsLimit:0});
            $('#property-filter-price-indicator .max').html( $('#property-filter-price-max').val() ).priceFormat({prefix:"&pound;", centsLimit:0});
        },
        create: function (event, ui) {
            $('#property-filter-price-indicator .min').html($('#property-filter-price-min').val()).priceFormat({prefix:"&pound;", centsLimit:0});
            $('#property-filter-price-indicator .max').html($('#property-filter-price-max').val()).priceFormat({prefix:"&pound;", centsLimit:0});
        }
    });


    $('#property-filter-bedrooms-slider').slider({
        min: 1,
        max: 10,
        value: $('#property-filter-bedrooms').val(),
        slide: function (event, ui) {
            $('#property-filter-bedrooms').val(ui.value);
            $('#property-filter-bedrooms-indicator span').html(ui.value);
        },
        create: function (event, ui) {
            $('#property-filter-bedrooms-indicator span').html($('#property-filter-bedrooms').val());
        }
    });

    $('#property-filter-distance-slider').slider({
        min: 1,
        max: 100,
        value: distanceToSlider($('#property-filter-distance').val()),
        slide: function (event, ui) {
            $('#property-filter-distance').val(Math.ceil(sliderToDistance(ui.value)));
            $('#property-filter-distance-indicator span').html($('#property-filter-distance').val());
        },
        create: function (event, ui) {
            $('#property-filter-distance-indicator span').html($('#property-filter-distance').val());
        }
    });


    ///**
    // * Form Polling and Ajax submit
    // */
    //var formValues = $('form.widget-property-filter-form').serialize();
    //console.log(formValues);
    //var pollForm = function() {
    //    if($('form.widget-property-filter-form').serialize() !== formValues) {
    //        formValues = $('form.widget-property-filter-form').serialize();
    //        console.log('Form Changed', formValues);
    //        $.ajax({
    //            url: window.location.pathname,
    //            data: $('form.widget-property-filter-form').serializeArray(),
    //            success: function(data, textStatus, jqXHR) {
    //                console.log($(data).find('.property-result'));
    //
    //                $('.property-results-count').html($(data).find('.property-results-count').html());
    //
    //
    //                /**
    //                 * To Preserve Animations...
    //                 * remove missing results
    //                 */
    //
    //                $('.property-results-list').html($(data).find('.property-results-list').html());
    //
    //            },
    //            dataType:'html'
    //
    //        });
    //    }
    //};
    //window.setInterval(pollForm, 2000);





});