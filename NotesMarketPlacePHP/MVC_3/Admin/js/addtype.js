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
$(function() {

  $('#type').keydown(function (e) {
  
    if (e.shiftKey || e.ctrlKey || e.altKey) {
    
      e.preventDefault();
      
    } else {
    
      var key = e.keyCode;
      
      if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
      
        e.preventDefault();
        
      }

    }
    
  });
  
});