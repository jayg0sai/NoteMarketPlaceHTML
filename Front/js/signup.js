$(".toggle-password1").click(function () {

    $(this).toggleClass("fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
        $(".eye1").css("display", "block");
    } else {
        input.attr("type", "password");
        $(".eye1").css("display", "none");
    }
});
$(".toggle-password2").click(function () {

    $(this).toggleClass("fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
        $(".eye2").css("display", "block");
    } else {
        input.attr("type", "password");
        $(".eye2").css("display", "none");
    }
});