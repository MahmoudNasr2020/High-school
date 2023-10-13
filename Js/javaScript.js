/*global $,window*/
$(window).scroll(function () {
    "use strict";
    if (window.pageYOffset >= 84) {
        $("nav").css({
            "position": "fixed",
            top: 0,
            width: "100%"
        });

    } else {
        $("nav").css({
            "position": "absolute",
            top: "84px",
            width: "100%"
        });

    }
});
$(".years-of-subject .fisrt-year-button").on("click", function () {
    "use strict";
    $(".years-of-subject").fadeOut(0, function () {
        $(".science-electrinc .first-year-sebject").fadeIn();
    });
});
$(".science-electrinc .first-year-sebject i[ class='fas fa-arrow-left back1']").on("click", function () {
    "use strict";
    $(".science-electrinc .first-year-sebject").fadeOut(0, function () {
        $(".years-of-subject").fadeIn();
    });

});
$(".years-of-subject .second-year-button").on("click", function () {
    "use strict";
    $(".years-of-subject").fadeOut(0, function () {
        $(".subject-of-types").fadeIn();
    });
});
$(".science-electrinc .subject-of-types i[ class='fas fa-arrow-left back2']").on("click", function () {
    "use strict";
    $(".subject-of-types").fadeOut(0, function () {
        $(".years-of-subject").fadeIn();
    });
});
$(".subject-of-types .science-button").on("click", function () {
    "use strict";
    $(".subject-of-types").fadeOut(0, function () {
        $(".science-electrinc .second-year-subject .scientific-department").fadeIn();
    });
});
$(".science-electrinc .second-year-subject i[ class='fas fa-arrow-left back3']").on("click", function () {
    "use strict";
    $(".science-electrinc .second-year-subject .scientific-department").fadeOut(0, function () {
        $(".subject-of-types").fadeIn();
    });
});
$(".subject-of-types .literary-button").on("click", function () {
    "use strict";
    $(".subject-of-types").fadeOut(0, function () {
        $(".science-electrinc .second-year-subject .Literary-department").fadeIn();
    });
});
$(".science-electrinc .second-year-subject .Literary-department i[ class='fas fa-arrow-left back4'] ").on("click", function () {
    "use strict";
    $(".science-electrinc .second-year-subject .Literary-department").fadeOut(0, function () {
        $(".subject-of-types").fadeIn();
    });
});

$(".years-of-subject .third-year-button").on("click", function () {
    "use strict";
    $(".years-of-subject").fadeOut(0, function () {
        $(".subject-of-types-third").fadeIn();
    });
});
$(".subject-of-types-third i[class='fas fa-arrow-left back5'] ").on("click", function () {
    "use strict";
    $(".subject-of-types-third").fadeOut(0, function () {
        $(".years-of-subject").fadeIn();
    });
});

$(".subject-of-types-third .science-button").on("click", function () {
    "use strict";
    $(".subject-of-types-third").fadeOut(0, function () {
        $(".science-electrinc .third-year-subject .science-department").fadeIn();
    });
});
$(".third-year-subject i[ class='fas fa-arrow-left back6'] ").on("click", function () {
    "use strict";
    $(".science-electrinc .third-year-subject .science-department").fadeOut(0, function () {
        $(".subject-of-types-third").fadeIn();
    });
});

$(".subject-of-types-third .math-button").on("click", function () {
    "use strict";
    $(".subject-of-types-third").fadeOut(0, function () {
        $(".science-electrinc .third-year-subject .math-department ").fadeIn();
    });
});
$(".third-year-subject i[ class='fas fa-arrow-left back7'] ").on("click", function () {
    "use strict";
    $(".science-electrinc .third-year-subject .math-department").fadeOut(0, function () {
        $(".subject-of-types-third").fadeIn();
    });
});
$(".subject-of-types-third .literary-button").on("click", function () {
    "use strict";
    $(".subject-of-types-third").fadeOut(0, function () {
        $(".science-electrinc .third-year-subject .Literary-department-third").fadeIn();
    });
});
$(".third-year-subject i[ class='fas fa-arrow-left back8'] ").on("click", function () {
    "use strict";
    $(".science-electrinc .third-year-subject .Literary-department-third").fadeOut(0, function () {
        $(".subject-of-types-third").fadeIn();
    });
});
$("body").niceScroll({
    cursorcolor: "rgba(111,0,185,1)",
    cursorwidth: "8px",
    cursorborder: "none",
    zindex: 9999,
    horizrailenabled: false
});
$(window).on("load", function () {
    "use strict";
    $(".imgload").fadeOut(1000, function () {
        $(".loading").fadeOut(1000);
    });
});
var name1 = true,
    email = true,
    address = true,
    phone = true,
    msg = true;
$('.namer').on("blur", function () {
    "use strict";
    if ($(this).val().length < 4) {
        $(this).css("border", "1px solid red");
        $(this).parent().parent().find('.alert-error').fadeIn(300);
        name1 = true;
    } else {
        $(this).css("border", "1px solid green");
        $(this).parent().parent().find('.alert-error').fadeOut(300);
        name1 = false;
    }
});
$('.emailer').on('blur', function () {
    'use strict';
    if ($(this).val() === '') {
        $(this).css("border", "1px solid red");
        $(this).parent().parent().find('.error-email').fadeIn(300);
        email = true;
    } else {
        $(this).css("border", "1px solid green");
        $(this).parent().parent().find('.error-email').fadeOut(300);
        email = false;
    }
});
$('.addresser').on('blur', function () {
    'use strict';
    if ($(this).val() === '') {
        $(this).css("border", "1px solid red");
        $(this).parent().parent().find('.alert-error').fadeIn(300);
        address = true;
    } else {
        $(this).css("border", "1px solid green");
        $(this).parent().parent().find('.alert-error').fadeOut(300);
        address = false;
    }
});
$('.mobiler').on('blur', function () {
    'use strict';
    if ($(this).val().length < 5) {
        $(this).css("border", "1px solid red");
        $(this).parent().parent().find('.alert-error').fadeIn(300);
        phone = true;
    } else {
        $(this).css("border", "1px solid green");
        $(this).parent().parent().find('.alert-error').fadeOut(300);
        phone = false;
    }
});
$('.messager').on('blur', function () {
    'use strict';
    if ($(this).val().length < 10) {
        $(this).css("border", "1px solid red");
        $(this).parent().parent().find('.alert-error').fadeIn(300);
        msg = true;
    } else {
        $(this).css("border", "1px solid green");
        $(this).parent().parent().find('.alert-error').fadeOut(300);
        msg = false;
    }
});
$('.form-conect').submit(function (e) {
    'use strict';
    if (name1 === true || email === true || address === true || phone === true || msg === true) {
        e.preventDefault();
        $('.error-login').fadeIn(300);
    } else {
        $('.error-login').fadeOut(300);
    }
});



