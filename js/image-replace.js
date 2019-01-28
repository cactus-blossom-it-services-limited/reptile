(function ($) {
    'use strict';
    // add/remove checked class
    $(".image-radio").each(function () {
        if ($(this).find('input[type="radio"]').first().attr("checked")) {
            $(this).addClass('image-radio-checked');
        }
        else {
            $(this).removeClass('image-radio-checked');
        }
    });

// sync the input state
    $(".image-radio").on("click", function (e) {
        $(".image-radio").removeClass('image-radio-checked');
        $(this).addClass('image-radio-checked');
        var $radio = $(this).find('input[type="radio"]');
        $radio.prop("checked", !$radio.prop("checked"));
        e.preventDefault();
    });

// Next come the checkboxes
    var $inputs = $('input[name="image_checkbox"]');
// initialise the 'checkbox' values all to false as this does not happen by default
    $inputs.each(function () {
        $inputs.prop("checked", false);
    });
    console.dir($inputs);
    $inputs.change(function() {
        var checked = $(this).prop("checked");
        console.log(checked);

    });

    $(".image-checkbox").on("click", function (e) {
        // if there is a checkbox input with a .prop() of "checked"
        // whatever the value either false or true, execute the .toggleClass()
        // on that input element
        if ($(this).find('input[type="checkbox"]').first().prop("checked")) {
            $(this).toggleClass('image-checkbox-checked');
        }
    });



})(jQuery);
