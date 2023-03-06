// Toggle Password 
$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    input = $(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

//Slick Slider
$('.nearbyslider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    speed: 300,
    infinite: true,
    autoplaySpeed: 5000,
    autoplay: false,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});

//Home Testimonial
$('.testimonial-slider').slick({
    autoplay: false,
    autoplaySpeed: 1000,
    speed: 600,
    draggable: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
    ]
});
//Profile upload

$(document).ready(function () {
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function () {
        readURL(this);
    });

    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });
});

//Multistep Slider
document.querySelectorAll(".__range-step").forEach(function (ctrl) {
    var el = ctrl.querySelector('input');
    var output = ctrl.querySelector('output');
    var newPoint, newPlace, offset;
    el.oninput = function () {
        // colorize step options
        ctrl.querySelectorAll("option").forEach(function (opt) {
            if (opt.value <= el.valueAsNumber)
                opt.style.backgroundColor = '2EA8F2';
            else
                opt.style.backgroundColor = '#cccccc';
        });
        // colorize before and after
        var valPercent = (el.valueAsNumber - parseInt(el.min)) / (parseInt(el.max) - parseInt(el.min));
        var style = 'background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, color-stop(' +
            valPercent + ', #2EA8F2), color-stop(' +
            valPercent + ', #cccccc));';
        el.style = style;

        // Popup
        if ((' ' + ctrl.className + ' ').indexOf(' ' + '__range-step-popup' + ' ') > -1) {
            var selectedOpt = ctrl.querySelector('option[value="' + el.value + '"]');
            output.innerText = selectedOpt.text;
            output.style.left = "50%";
            output.style.left = ((selectedOpt.offsetLeft + selectedOpt.offsetWidth / 2) - output.offsetWidth / 2) + 'px';
        }
    };
    el.oninput();
});

window.onresize = function () {
    document.querySelectorAll(".__range").forEach(function (ctrl) {
        var el = ctrl.querySelector('input');
        el.oninput();
    });
};


//filter range slider

var $range = $(".js-range-slider"),
    $from = $(".from"),
    $to = $(".to"),
    range,
    min = $range.data('min'),
    max = $range.data('max'),
    from,
    to;

var updateValues = function () {
    $from.prop("value", from);
    $to.prop("value", to);
};

$range.ionRangeSlider({
    onChange: function (data) {
        from = data.from;
        to = data.to;
        updateValues();
    }
});

range = $range.data("ionRangeSlider");
var updateRange = function () {
    range.update({
        from: from,
        to: to
    });
};

$from.on("input", function () {
    from = +$(this).prop("value");
    if (from < min) {
        from = min;
    }
    if (from > to) {
        from = to;
    }
    updateValues();
    updateRange();
});

$to.on("input", function () {
    to = +$(this).prop("value");
    if (to > max) {
        to = max;
    }
    if (to < from) {
        to = from;
    }
    updateValues();
    updateRange();
});

//Dropdown
$(".drop-down .selected a").click(function () {
    $(".drop-down .options ul").toggle();
});

$(".drop-down .options ul li a").click(function () {
    var text = $(this).html();
    $(".drop-down .selected a span").html(text);
    $(".drop-down .options ul").hide();
});

$(document).bind('click', function (e) {
    var $clicked = $(e.target);
    if (!$clicked.parents().hasClass("drop-down"))
        $(".drop-down .options ul").hide();
});


//Details page img slider
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    vertical: true,
    asNavFor: '.slider-for',
    dots: false,
    focusOnSelect: true,
    verticalSwiping: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                vertical: false,
            }
        },
        {
            breakpoint: 768,
            settings: {
                vertical: false,
            }
        },
        {
            breakpoint: 580,
            settings: {
                vertical: false,
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 380,
            settings: {
                vertical: false,
                slidesToShow: 2,
            }
        }
    ]
});

//Scroll To top
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

});

//Chat Togggle
$(document).ready(function () {
    $('.chat__btn').click(function () {
        $('.chat_box_main_wrapper').addClass('chat-_active');
        $('.chat_box_bg').addClass('chat-_active');
    });
    $('.chat_close').click(function () {
        $('.chat_box_main_wrapper').removeClass('chat-_active');
    });
    $(".chat_sub_list").click(function () {
        $(".chat_boxsub_wrapper").addClass('chat-none');
        $(".chating_box").addClass('chat-block');
    });
    $(".chat_back").click(function () {
        $(".chating_box").removeClass('chat-block');
        $(".chat_boxsub_wrapper").removeClass('chat-none');
    });

});