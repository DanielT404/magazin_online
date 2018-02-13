// document.addEventListener("DOMContentLoaded", function(event) {

//

//     var comenzi_inregistrate = document.getElementById('comenzi-inregistrate');

//     var categorii = document.getElementById('categorii');

//     var marimi = document.getElementById('marimi');

//     var produse = document.getElementById('produse');

//     var culori = document.getElementById('culori');

//

//     comenzi_inregistrate.addEventListener('click', function() {

//         $case = document.getElementById('comenziInregistrate').style.display;

//         switch($case)

//         {

//             case 'none':

//                 document.getElementById('comenziInregistrate').style.display = 'block';

//                 break;

//             case 'block':

//                 document.getElementById('comenziInregistrate').style.display = 'none';

//                 break;

//             default:

//                 console.log('eyyy');

//

//         }

//     });

// });



$(document).ready(function(){



    var quantitiy=0;

    $('.quantity-right-plus').click(function(e){



        // Stop acting like a button

        e.preventDefault();

        // Get the field name

        var quantity = parseInt($('#quantity').val());



        // If is not undefined



        $('#quantity').val(quantity + 1);





        // Increment



    });



    $('.quantity-left-minus').click(function(e){

        // Stop acting like a button

        e.preventDefault();

        // Get the field name

        var quantity = parseInt($('#quantity').val());



        // If is not undefined



        // Increment

        if(quantity>0){

            $('#quantity').val(quantity - 1);

        }

    });



    $('#prod-img').ezPlus();





    



    $('.dropdown').hover(function () {

        $(this).parent().find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);

    }, function () {

        $(this).parent().find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);

        });





    if (screen.width > 960 && screen.height > 768) {

        console.log($(window).height() - $(".navbar-default").height() - $(".second-navbar-home").height() - 50);

        $("#slider").outerHeight($(window).height() - $(".navbar-default").height() - $(".second-navbar-home").height() - 50);

    }



    $('.btn-number').click(function (e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function () {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


});






function filterCategory(identifier) {
    var catName = $(identifier).data('id');
    
    if(window.location.href.indexOf('?') > -1) {
        $url = `&category=${catName}`;
        return window.location.href.replace("#0", "") + $url;
    } else {
        $url = `?category=${catName}`
        return window.location.href = $url;
    }
}

function filterSubcategory(identifier) {
    var subCategory = $(identifier).data('subcategory');
    var category = $(identifier).data('category');
    return window.location.href = `?category=${category}&subcategory=${subCategory}`;
}

function filterLength(identifier) {
    var length = $(identifier).data('length')

    if (window.location.href.indexOf('?') > -1) { 
        $url = `&length=${length}`;
        return window.location.href = window.location.href.replace("#0", "") + $url;
    } else {
        $url = `?length=${length}`; 
        return window.location.href= $url
    }
}


function filterColors(identifier) {
    var color = $(identifier).data('color');

    if (window.location.href.indexOf('?') > -1) { 
        $url = `&color=${color}`;
        return window.location.href = window.location.href.replace("#0", "") + $url;
    } else {
        $url = `?color=${color}`; 
        return window.location.href= $url
    }

}


function columnView() {
    var style = $("#columnView").css("display");
    var el = $("#columnView");
    if(style == 'none') {
        el.show();
        $("#listView").hide();
    }
}

function listView() {
    var style = $("#listView").css("display");
    var el = $("#listView");
    if(style == 'none') {
        el.show();
        $("#columnView").hide();
    }
}

function getFilter() {
    setTimeout(() => {
        var get_option = $("#sort-by option:selected").val();
        if (window.location.href.indexOf('?') > -1) { 
            $url = `&option=${get_option}`;
            return window.location.href = window.location.href.replace("#0", "") + $url;
        } else {
            $url = `?option=${get_option}`; 
        return window.location.href= $url
        }
    }, 5000);
}

var minSlider = document.getElementById("minRange");
var minOutput = document.getElementById("minValue");
minOutput.innerHTML = minSlider.value;

minSlider.oninput = function() {
  minOutput.innerHTML = this.value;
}


var maxSlider = document.getElementById("maxRange");
var maxOutput = document.getElementById("maxValue");
maxOutput.innerHTML = maxSlider.value;

maxSlider.oninput = function() {
  maxOutput.innerHTML = this.value;
}


function getMinVal() {
    var price = parseInt($("#minValue")[0].innerHTML);
    
    if (window.location.href.indexOf('?') > -1) { 
        $url = `&minPrice=${price}`;
        return window.location.href = window.location.href.replace("#0", "") + $url;
    } else {
        $url = `?minPrice=${price}`; 
        return window.location.href= $url
    }
}

function getMaxVal() {
    var price = parseInt($("#maxValue")[0].innerHTML);
    
    if (window.location.href.indexOf('?') > -1) { 
        $url = `&maxPrice=${price}`;
        return window.location.href = window.location.href.replace("#0", "") + $url;
    } else {
        $url = `?maxPrice=${price}`; 
        return window.location.href= $url
    }
}


