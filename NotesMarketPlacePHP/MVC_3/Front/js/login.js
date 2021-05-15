$(".toggle-password").click(function () {
    
    $(this).toggleClass("fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        $(".eye").css("display", "block");
        input.attr("type", "text");
    } else {
        $(".eye").css("display", "none");
        input.attr("type", "password");
    }
});
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });