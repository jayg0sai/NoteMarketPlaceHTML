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
$(function() {

  $('#firstname, #lastname').keydown(function (e) {
  
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
var myInput = document.getElementById("password-field1");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var special = document.getElementById("special");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
    // Validate special character
  var specials = /[^\w]/g ;
  if(myInput.value.match(specials)) {  
    special.classList.remove("invalid");
    special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 6 && myInput.value.length <= 24) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
$(function() {
        $('#password-field1').on('keypress', function(e) {
            if (e.which == 32){
                console.log('Space Detected');
                return false;
            }
        });
});