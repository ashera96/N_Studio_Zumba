
var myInput2 = document.getElementById("password");
var myInput3 = document.getElementById("password-confirm");


var weak = document.getElementById("weak");
var medium = document.getElementById("medium");
var strong = document.getElementById("strong");
var con = document.getElementById("con");

myInput2.onkeypress = function () {
    myInput2.onkeyup = function () {
        myInput2.onblur = function () {
            document.getElementById("message2").style.display = "none";
            document.getElementById("message3").style.display = "none";
            document.getElementById("message4").style.display = "none";
        }
        var lowercaseLetters = /[a-z]/g;
        var uppercaseLetters = /[A-Z]/g;
        var numbers = /[0-9]/g;
        var specialCharacters = /[\!\@\#\$\%\^\&\*]/g;
        var x1 = myInput2.value.trim();
        //pwregex =/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/ ;

        document.getElementById("password-confirm").value = "";
        if ((x1.length >= 6) && (x1.match(lowercaseLetters) && x1.match(uppercaseLetters) && x1.match(numbers) && x1.match(specialCharacters))) {
            document.getElementById("message4").style.display = "block";
            document.getElementById("message3").style.display = "none";
            document.getElementById("message2").style.display = "none";
            strong.classList.add("strngclr");
            document.getElementById("password").style.borderColor = "#1af010";
        }
        else if ((x1.length >= 6) && (x1.match(lowercaseLetters) && x1.match(uppercaseLetters) && x1.match(numbers) || x1.match(specialCharacters))) {
            document.getElementById("message3").style.display = "block";
            document.getElementById("message4").style.display = "none";
            document.getElementById("message2").style.display = "none";
            medium.classList.add("mediumclr");
            document.getElementById("password").style.borderColor = "#1af010";
        } else if ((x1.length >= 6) && (x1.match(lowercaseLetters) || x1.match(uppercaseLetters) || x1.match(numbers) || x1.match(specialCharacters))) {
            document.getElementById("message2").style.display = "block";
            document.getElementById("message4").style.display = "none";
            document.getElementById("message3").style.display = "none";
            weak.classList.add("invalid");
            document.getElementById("password").style.borderColor = "#1af010";
        } else {
            document.getElementById("message2").style.display = "none";
            document.getElementById("message4").style.display = "none";
            document.getElementById("message3").style.display = "none";
            document.getElementById("password").style.borderColor = "#f11531";
        }
    }
}
myInput3.onkeypress = function() {
    myInput3.onkeyup = function () {
        myInput3.onblur = function () {
            document.getElementById("message5").style.display = "none";
        }
        var x = document.getElementById("password-confirm");
        var y = document.getElementById("password");

        if ((x.value != y.value) || (x.value.length == 0)) {

            document.getElementById("password-confirm").style.borderColor = "#f11531";

            con.classList.add("invalid");
            document.getElementById("message5").style.display = "block";
        } else {

            document.getElementById("password-confirm").style.borderColor = "#1af010";

            document.getElementById("message5").style.display = "none";
            con.classList.remove("invalid");

        }
    }
}
