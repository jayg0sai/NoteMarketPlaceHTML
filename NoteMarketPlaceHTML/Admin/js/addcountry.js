// Navigation
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
var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        separateDialCode: true,
        customPlaceholder: function (
            selectedCountryPlaceholder,
            selectedCountryData
        ) {
            return "e.g. " + selectedCountryPlaceholder;
        },
    });