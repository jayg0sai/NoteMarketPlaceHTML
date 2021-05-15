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
/* for all column search 
function filterText()
	{  
		var rex = new RegExp($('#seller').val());
		if(rex =="/all/"){clearFilter()}else{
			$('tbody tr').hide();
			$('tbody tr').filter(function() {
			return rex.test($(this).text());
			}).show();
	}
	}
	
function clearFilter()
	{
		$('#seller').val('');
		$('tbody tr').show();
	}

*/
$("#seller").on("change", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(4)").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});