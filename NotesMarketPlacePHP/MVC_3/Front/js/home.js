// Navigation
// Show & Hide White Navigation

$(function () {
    // show/hide nav on page load
    showHideNav();

    $(window).scroll(function () {
        // show/hide nav on window's scroll
        showHideNav();
    });

    function showHideNav() {
        if ($(window).scrollTop() > 50) {
            // Show white nav
            $("nav").addClass("white-nav-top");


            // Show dark logo
            $(".navbar-brand img").attr("src", "images/logo.png");

        } else {
            // Hide white nav
            $("nav").removeClass("white-nav-top");
            if ($(window).width() < 992) {
                $(".navbar-brand img").attr("src", "images/logo.png");
            } else {
                // Show logo
                $(".navbar-brand img").attr("src", "images/top-logo.png");
            }

        }
    }
});

$(function () {
    mobileNav();
    $(window).resize(function () {
        mobileNav();
    });

    function mobileNav() {
        if ($(this).width() < 992) {
            $("nav").addClass("mobile");
            $(".navbar-brand img").attr("src", "images/logo.png");
        } else {
            $("nav").removeClass("mobile");
            $(".navbar-brand img").attr("src", "images/top-logo.png");
        }
    }
});


$(function () {
    $("#mobile-nav-open-btn").on("click", function () {
        $("#mobile-nav-open-btn").css("display", "none");
        $("#mobile-nav-close-btn").css("display", "block");
        $("section, footer").css("display", "none");
    });

    $("#mobile-nav-close-btn").on("click", function () {
        $("#mobile-nav-close-btn").css("display", "none");
        $("#mobile-nav-open-btn").css("display", "block");
        $("section, footer").css("display", "block");
    });
});