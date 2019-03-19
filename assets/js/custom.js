var siteURL = '/E-commerce-new/';
var siteFilesURL = siteURL + 'files/'


// ====================================================
// ANIMATION
// ====================================================
$(function () {
    // animate on scroll
    new WOW().init();
});

// ====================================================
// NAVIGATION
// ====================================================
(function ($) {
    "use strict"; // Start of use strict
    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: (target.offset().top - 0)
            }, 1000, "easeInOutExpo");
            return false;
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function () {
        $('.navbar-collapse').collapse('hide');
    });

    $("a.smooth-scrolls").click(function (event) {

        // event.preventDefault();

        // get/return id like #about, #work, #team and etc
        var section = $(this).attr("href");

        $('html, body').animate({
            scrollTop: ($(section).offset().top - 2)
        }, 1000, "easeInOutExpo");
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
        target: '#mainNav',
        offset: 62
    });

    // $(".navbar-collapse ul li a").on("click touch", function(){

    //     $(".navbar-toggle").click();
    // });

    // search bar
    jQuery('.search').on("click", function () {
        if (jQuery('.search-btn').hasClass('fa-search')) {
            jQuery('.search-open').fadeIn(500);
            jQuery('.search-btn').removeClass('fa-search');
            jQuery('.search-btn').addClass('fa-times');
        } else {
            jQuery('.search-open').fadeOut(500);
            jQuery('.search-btn').addClass('fa-search');
            jQuery('.search-btn').removeClass('fa-times');
        }
    });

    //fixed navbar
    var toggleAffix = function (affixElement, scrollElement, wrapper) {

        var height = affixElement.outerHeight(),
            top = wrapper.offset().top;

        if (scrollElement.scrollTop() >= top) {
            wrapper.height(height);
            affixElement.addClass("affix");
        } else {
            affixElement.removeClass("affix");
            wrapper.height('auto');
        }

    };


    $('[data-toggle="affix"]').each(function () {
        var ele = $(this),
            wrapper = $('<div></div>');

        ele.before(wrapper);
        $(window).on('scroll resize', function () {
            toggleAffix(ele, $(this), wrapper);
        });

        // init
        toggleAffix(ele, $(window), wrapper);
    });

    // Hover dropdown
    $('ul.navbar-nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });

})(jQuery); // End of use strict


// ====================================================
// LOGIN FORM
// ====================================================

(function ($) {

    var $formLogin = $('#login-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    // $("form").submit(function () {
    //     switch(this.id) {
    //         case "login-form":
    //             var $lg_username=$('#login_username').val();
    //             var $lg_password=$('#login_password').val();
    //             if ($lg_username == "ERROR") {
    //                 msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
    //             } else {
    //                 msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
    //             }
    //             return false;
    //             break;
    //         case "register-form":
    //             var $rg_username=$('#register_username').val();
    //             var $rg_email=$('#register_email').val();
    //             var $rg_password=$('#register_password').val();
    //             if ($rg_username == "ERROR") {
    //                 msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Register error");
    //             } else {
    //                 msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
    //             }
    //             return false;
    //             break;
    //         default:
    //             return false;
    //     }
    //     return false;
    // });

    $('#login_register_btn').click(function () {
        modalAnimate($formLogin, $formRegister)
    });
    $('#register_login_btn').click(function () {
        modalAnimate($formRegister, $formLogin);
    });

    function modalAnimate($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height", $oldH);
        $oldForm.fadeToggle($modalAnimateTime, function () {
            $divForms.animate({height: $newH}, $modalAnimateTime, function () {
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }

    function msgFade($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function () {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }
})(jQuery); // End of use strict

// ====================================================
// AUTO WRITER
// ====================================================
var TxtType = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) {
        delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function () {
        that.tick();
    }, delta);
};

window.onload = function () {
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};

// ====================================================
// HOME TEXT SCROLL
// ====================================================
(function ($) {
    $('.carousel').carousel();
})(jQuery); // End of use strict


// ====================================================
// BLOG
// ====================================================
$(document).ready(function () {

    $('.thumbnail-blogs').hover(
        function () {
            $(this).find('.caption').slideDown(250)
        },
        function () {
            $(this).find('.caption').slideUp(205)
        }
    );
});

// ====================================================
// THOUGHTS
// ====================================================
(function ($) {

    $("#clients-list").owlCarousel({
        items: 6,
        autoplay: true,
        smartSpeed: 700,
        loop: true,
        dots: false,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 3
            },
            768: {
                items: 5
            },
            992: {
                items: 6
            }
        }
    });
})(jQuery); // End of use strict
// owl crousel testimonial section
$('#thought-desc').owlCarousel({
    items: 1,
    autoplay: true,
    smartSpeed: 700,
    loop: true,
    autoplayHoverPause: true
});

// ====================================================
// BACK TO TOP
// ====================================================
(function ($) {

    $(window).scroll(function () {

        if ($(this).scrollTop() < 50) {
            // hide nav

            $("nav").removeClass("vesco-top-nav");
            $("#back-to-top").fadeOut();

        } else {
            // show nav
            $("nav").addClass("vesco-top-nav");
            $("#back-to-top").fadeIn();
        }
    });
})(jQuery); // End of use strict


// ====================================================
// TESTIMONIALS
// ====================================================
$('#customers-testimonials').owlCarousel({
    items: 1,
    autoplay: true,
    smartSpeed: 700,
    loop: true,
    autoplayHoverPause: true
});


/************** Header *******************/

$(document).on('click', '#vip-read-more', function (e) {
    e.preventDefault();
})
/** change password**/

var $submit_change_password = false;

$(document).on('submit', '#change-password-form', function (e) {

    if (!$submit_change_password) {
        {
            if ($('#new-password').val() !== $('#re-password').val()) {
                $.notify(lang.passwordsNotMatched, {position: "left bottom", className: "warn"});
            } else {
                $submit_change_password = true;
                $('#change-password-form').submit();
            }
        }
        e.preventDefault()
    }
    // else
    //     $('#register-form-user').submit();


});


/** verification**/

var $submit_registration = false;

$(document).on('submit', '#register-form-user', function (e) {

    if (!$submit_registration) {
        {
            if ($('#register-password-user').val() !== $('#register-re-password-user').val()) {
                $.notify(lang.passwordsNotMatched, {position: "left bottom", className: "warn"});
            } else {
                $submit_registration = true;
                $('#register-form-user').submit();
            }
        }
        e.preventDefault()
    }
    // else
    //     $('#register-form-user').submit();


});

$(document).on('click', '#submit-verification-code', function (e) {

    if ($('#mobile_number_verification').val() == '') {
        e.preventDefault()
        $.notify(lang.enterMobile, {position: "left bottom", className: "error"});

    }
})

if ($('#mobile_number_verification').val() != '')
    $('#verification-form').removeClass('hidden')

$(document).on('click', '#send-verification-code', function (e) {
    e.preventDefault();

    if ($('#mobile_number_verification').val() == '') {

        $.notify(lang.enterMobile, {position: "left bottom", className: "error"});
    } else {
        $data = {mobile: $('#mobile_number_verification').val()};
        $.ajax({
            method: "POST",
            url: "requests/generate-code.php",
            data: $data
        }).done(function (msg) {
            if (msg == 1) {
                $('#verification-form').removeClass('hidden')
                $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
            } else if (msg == -2) {
                $.notify(lang.wrongMobile, {position: "left bottom", className: "error"});
            } else if (msg == -1) {
                $.notify(lang.general_error, {position: "left bottom", className: "error"});
            }

        });
    }
})


/// ** products management **///


///** cart **///
$(document).on('click', '.add-to-cart', function (e) {
    e.preventDefault();
    $p_id = $(this).data('id')
    if ($('#pd').val() == 1) {
        $path = '../requests/add-to-cart.php';
    } else {
        $path = 'requests/add-to-cart.php';
    }
    $data = {
        product_id: $p_id,
        action: 'add',
    };

    $.ajax({
        method: "POST",
        url: $path,
        data: $data
    }).done(function (msg) {

        if (msg == 1) {
            $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
        } else if (msg == 2) {
            $.notify(lang.already_added, {position: "left bottom", className: "warn"});
        } else if (msg == 3) {
            $.notify(lang.pending_order, {position: "left bottom", className: "warn"});
        } else if (msg == -1) {
            $.notify(lang.general_error, {position: "left bottom", className: "error"});
        } else
        // alert(msg)
            $.notify(lang.general_error, {position: "left bottom", className: "error"});
    });

})


$(document).on('click', '.add-to-cart-login', function (e) {
    e.preventDefault();
    $('#login-modal').modal({
        show: true
    });
})

//** category and subcategory population**//


var select_clicked_cat = false;
var select_clicked_sub = false;

$(document).on('shown.bs.select', '#category-select', function () {

    if (select_clicked_cat == false) {

        $.ajax({
            method: "POST",
            url: "requests/categories.php",
            data: {}
        }).done(function (msg) {


            jQuery(JSON.parse(msg)).each(function (i, item) {
                $('#category-select').append('<option value="' + item.id + '">' + item.name + '</option>');
                $('#category-select').selectpicker('refresh');

            });
        });

        select_clicked_cat = true;
    }

})


$(document).on('changed.bs.select', '#sort_selecet', function () {

    let cat_id = $('#category-select').val();
    let sub_id = $('#subcategory-select').val();
    let sort = $('#sort_selecet').val();
    let sr_min = $('#slider-range-value1').text();
    let sr_max = $('#slider-range-value2').text();

    $data = {

        cat_id: cat_id,
        sub_id: sub_id,
        sort: sort,
        sr_min: sr_min,
        sr_max: sr_max,

    };


    $.ajax({
        method: "POST",
        url: "requests/products-listing.php",
        data: $data
    }).done(function (msg) {

        $('#products_container').empty();

        jQuery(JSON.parse(msg)).each(function (i, item) {


            $.ajax({
                method: "POST",
                async: false,
                url: "requests/generate-product-card.php",
                data: item
            }).done(function (msg) {

                $('#products_container').append(msg);

            })
            // $('#products_container').append('');
        });
    })

})
// var $mouseDown=false;
// $(document).on('mouseup', '#slider-range', function() {
//
//      $mouseDown=true;
//
// })


$(document).on('click', '#slider-range', function() {

    // if($mouseDown==true)
    // {
        let cat_id = $('#category-select').val();
        let sub_id = $('#subcategory-select').val();
        let sort = $('#sort_selecet').val();
        let sr_min = $('#slider-range-value1').text();
        let sr_max = $('#slider-range-value2').text();

        $data = {

            cat_id: cat_id,
            sub_id: sub_id,
            sort: sort,
            sr_min: sr_min,
            sr_max: sr_max,

        };


        $.ajax({
            method: "POST",
            url: "requests/products-listing.php",
            data: $data
        }).done(function (msg) {

            $('#products_container').empty();

            jQuery(JSON.parse(msg)).each(function (i, item) {


                $.ajax({
                    method: "POST",
                    async: false,
                    url: "requests/generate-product-card.php",
                    data: item
                }).done(function (msg) {

                    $('#products_container').append(msg);

                })
                // $('#products_container').append('');
            });
        })
    //     $mouseDown=false;
    // }



});

$(document).on('changed.bs.select', '#subcategory-select', function () {

    let cat_id = $('#category-select').val();
    let sub_id = $('#subcategory-select').val();
    let sort = $('#sort_selecet').val();
    let sr_min = $('#slider-range-value1').text();
    let sr_max = $('#slider-range-value2').text();

    $data = {

        cat_id: cat_id,
        sub_id: sub_id,
        sort: sort,
        sr_min: sr_min,
        sr_max: sr_max,

    };


    $.ajax({
        method: "POST",
        url: "requests/products-listing.php",
        data: $data
    }).done(function (msg) {

        $('#products_container').empty();

        jQuery(JSON.parse(msg)).each(function (i, item) {


            $.ajax({
                method: "POST",
                async: false,
                url: "requests/generate-product-card.php",
                data: item
            }).done(function (msg) {

                $('#products_container').append(msg);

            })
            // $('#products_container').append('');
        });
    })

})



$(document).on('changed.bs.select', '#category-select', function () {
    select_clicked_sub = false;
    if ($(this).val() != -1) {
        $("#subcategory-select").prop("disabled", false);
        $('#subcategory-select').selectpicker('refresh');
    } else {
        $("#subcategory-select").prop('disabled', true);
        $('#subcategory-select').selectpicker('refresh');
    }
    $('#subcategory-select').empty();
    $('#subcategory-select').append('<option value="-1">' + lang.all + '</option>');
    $('#subcategory-select').selectpicker('refresh');

    let cat_id = $('#category-select').val();
    let sub_id = $('#subcategory-select').val();
    let sort = $('#sort_selecet').val();
    let sr_min = $('#slider-range-value1').text();
    let sr_max = $('#slider-range-value2').text();

    $data = {

        cat_id: cat_id,
        sub_id: sub_id,
        sort: sort,
        sr_min: sr_min,
        sr_max: sr_max,

    };


    $.ajax({
        method: "POST",
        url: "requests/products-listing.php",
        data: $data
    }).done(function (msg) {

        $('#products_container').empty();

        jQuery(JSON.parse(msg)).each(function (i, item) {


            $.ajax({
                method: "POST",
                async: false,
                url: "requests/generate-product-card.php",
                data: item
            }).done(function (msg) {

                $('#products_container').append(msg);

            })
            // $('#products_container').append('');
        });
    })

})


$(document).on('shown.bs.select', '#subcategory-select', function () {


    if (select_clicked_sub == false) {
        $.ajax({
            method: "POST",
            url: "requests/subcategories.php",
            data: {cat_id: $('#category-select').val()}
        }).done(function (msg) {
            jQuery(JSON.parse(msg)).each(function (i, item) {
                $('#subcategory-select').append('<option value="' + item.id + '">' + item.name + '</option>');
                $('#subcategory-select').selectpicker('refresh');

            });

        })
        select_clicked_sub = true;
    }
})


$(document).on('click', '#find', function () {

    let cat_id = $('#category-select').val();
    let sub_id = $('#subcategory-select').val();
    let sort = $('#sort_selecet').val();
    let sr_min = $('#slider-range-value1').text();
    let sr_max = $('#slider-range-value2').text();

    $data = {

        cat_id: cat_id,
        sub_id: sub_id,
        sort: sort,
        sr_min: sr_min,
        sr_max: sr_max,

    };


    $.ajax({
        method: "POST",
        url: "requests/products-listing.php",
        data: $data
    }).done(function (msg) {

        $('#products_container').empty();

        jQuery(JSON.parse(msg)).each(function (i, item) {


            $.ajax({
                method: "POST",
                async: false,
                url: "requests/generate-product-card.php",
                data: item
            }).done(function (msg) {

                $('#products_container').append(msg);

            })
            // $('#products_container').append('');
        });
    })


})

// cart management

$(document).on('click', '.refresh-cart', function () {

    $cart_id = $(this).data('cid');
    $product_id = $(this).data('pid');
    $quantity = $(this).parent().siblings('td.quantity').children('.quantity-value').val();
    $price = parseInt($(this).parent().siblings('td.product-price').text());

    $.ajax({
        method: "POST",
        url: "requests/add-to-cart.php",
        data: {
            cart_id: $cart_id,
            product_id: $product_id,
            quantity: $quantity,
            action: 'refresh',
        }
    }).done(function (msg) {
        $new_price = $price * $quantity;
        if (msg == 1) {
            $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
        } else if (msg == -1)
            $.notify(lang.general_error, {position: "left bottom", className: "error"});
        else
            $.notify(lang.general_error, {position: "left bottom", className: "error"});

    })


})


$(document).ready(function () {

    $subs = $('.sub-price');
    $total = 0;
    for ($i = 0; $i < $subs.length; $i++) {

        $total = $total + parseInt($subs.eq($i).text())

    }

    $('#total-price').text(lang.total + ' ' + $total + " " + lang.sp);
    $('#total-price-hidden').val($total);

    // alert(2);


})


$(document).on('keyup mouseup', '.quantity-value', function () {

    $price = parseInt($(this).parent().siblings('td.product-price').text());
    $quantity = $(this).val();
    $(this).parent().siblings('td.sub-price').text($price * $quantity + ' ' + lang.sp);

    $subs = $('.sub-price');
    $total = 0;
    for ($i = 0; $i < $subs.length; $i++) {

        $total = $total + parseInt($subs.eq($i).text())

    }
// console.log($total)
    $('#total-price').text(lang.total + ' ' + $total + ' ' + lang.sp);
    $('#total-price-hidden').val($total);

})

$(document).on('click', '.delete-cart', function () {

    $cart_id = $(this).data('cid');
    $product_id = $(this).data('pid');
    $elem = $(this).parent().siblings().parent()
    $sub_price = parseInt($(this).parent().siblings('td.sub-price').text())
    $total = parseInt($('#total-price-hidden').val());
    $new_total = $total - $sub_price;
    $('#total-price').text(lang.total + ' ' + $new_total + ' ' + lang.sp);
    $('#total-price-hidden').val($new_total);


    $.ajax({
        method: "POST",
        url: "requests/add-to-cart.php",
        data: {
            cart_id: $cart_id,
            product_id: $product_id,
            action: 'delete',
        }
    }).done(function (msg) {

        if (msg == 1) {
            $elem.fadeOut(500, function () {

                $(this).remove();

            })
        } else {

            $.notify(lang.general_error, {position: "left bottom", className: "error"});
        }


    })


})


$(document).on('click', '.submit-cart', function (e) {


    e.preventDefault();
    if($('#total-price-hidden').val()==0)
    {
        $('#confirmation-modal').modal('hide');
        $.notify(lang.mustFillCart, {position: "left bottom", className: "error"});
    }
    else
    {
        $('#confirmation-modal').modal('show');
    }



})


$(document).on('click', '#submit-cart', function (e) {
    var $new_array = [];
    e.preventDefault();


    $cart_id = $('#cid').val();
    $note = $('#cart-note').val();
    $quantity_products_arr = $('.quantity-value');


    for ($i = 0; $i < $quantity_products_arr.length; $i++) {

        $array = {
            pid: $quantity_products_arr.eq($i).data('pid'),
            q: $quantity_products_arr.eq($i).val()
        };

        // Array.prototype.push.apply($new_array, $array);
        $new_array.push($array);

    }


    $.ajax({
        method: "POST",
        url: "requests/add-to-cart.php",
        data: {
            cart_id: $cart_id,
            note: $('#cart-note').val(),
            qp_array: $new_array,
            action: 'submit',
        }
    }).done(function (msg) {

        $('#cart-note').val('');
        // if (msg == 1)
        //     $.notify(lang.successfully_done, {position: "left bottom", className: "success"});
        // else
        //     $.notify(lang.general_error, {position: "left bottom", className: "error"});

        window.location.href = siteURL + 'cart';

    })

})

$(document).on('click', '#cancel-cart', function (e) {

    e.preventDefault();
    $('#confirmation-modal').modal('hide');

})

$(document).ready(function () {

    if ($('#error-msg').val() !== '') {
        $.notify($('#error-msg').val(), {position: "left bottom", className: $('#error-msg').data('type')});


    }
})




