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
$("#seller").on("change", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(6)").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});