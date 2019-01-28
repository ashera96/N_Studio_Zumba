var myInput = document.getElementById("name");
var myInput2 = document.getElementById("username");
var myInput3 = document.getElementById("email");
var myInput4 = document.getElementById("nic");
var myInput5 = document.getElementById("dob");
var myInput6 = document.getElementById("address");
var myInput7 = document.getElementById("contactno");
var myInput8 = document.getElementById("password");
var myInput9 = document.getElementById("password-confirm");

var length = document.getElementById("length");
var letter = document.getElementById("letter");
var lengthofusername = document.getElementById("lengthofusername");
var emailformat = document.getElementById("emailformat");
var nicformat = document.getElementById("nicformat");
var age = document.getElementById("age");
var phonenum = document.getElementById("phonenum");
var weak = document.getElementById("weak");
var medium = document.getElementById("medium");
var strong = document.getElementById("strong");
var con = document.getElementById("con");


// When the user clicks on the name field, show the message box
/*myInput.onfocus = function() {
   document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the name field, hide the message box
myInput.onblur = function() {
   document.getElementById("message").style.display = "none";
}*/
// When the user clicks on the username field, show the message box
/*myInput2.onfocus = function() {

    document.getElementById("message2").style.display = "block";
}

// When the user clicks outside of the username field, hide the message box
myInput2.onblur = function() {
    document.getElementById("message2").style.display = "none";
} */

// When the user clicks on the email field, show the message box
/*myInput3.onfocus = function() {
    document.getElementById("message3").style.display = "block";
}

// When the user clicks outside of the email field, hide the message box
myInput3.onblur = function() {
    document.getElementById("message3").style.display = "none";
} */
//// When the user clicks on the nic field, show the message box
/*myInput4.onfocus = function() {
    document.getElementById("message4").style.display = "block";
}

// When the user clicks outside of the nic field, hide the message box
myInput4.onblur = function() {
    document.getElementById("message4").style.display = "none";
}
//// When the user clicks on the dob field, show the message box
myInput5.onfocus = function() {
    document.getElementById("message5").style.display = "block";
}

// When the user clicks outside of the dob field, hide the message box
myInput5.onblur = function() {
    document.getElementById("message5").style.display = "none";
}
//// When the user clicks on the contactno field, show the message box
myInput7.onfocus = function() {
    document.getElementById("message6").style.display = "block";
}

// When the user clicks outside of the contactno field, hide the message box
myInput7.onblur = function() {
    document.getElementById("message6").style.display = "none";
}
*/
// When the user starts to type something inside the name field

myInput.onkeypress = function () {
    myInput.onkeyup = function() {
        // Validate letters

        var a = myInput.value.trim();
        //var lowercaseLetters = /[a-z]/g;
        //var uppercaseLetters = /[A-Z]/g;
        //var numbers = /[0-9]/g;
        //var specialCharacters = /[\!\@\#\$\%\^\&\*]/g;
        if (a.length > 0) {
            document.getElementById("name").style.borderColor = "#1af010";

            //document.getElementById("signup").disabled = false;
        } else {

            //document.getElementById("signup").disabled = true;
            document.getElementById("name").style.borderColor = "#f11531";

        }
    }
}


// When the user starts to type something inside the username field
myInput2.onkeypress = function () {
    // Validate length
    myInput2.onkeyup = function() {
        myInput2.onblur = function () {
            document.getElementById("message2").style.display = "none";
        }
        var b = myInput2.value.trim();
        if (b.length >= 4) {
            //document.getElementById("signup").disabled = false;
            document.getElementById("username").style.borderColor = "#1af010";
            lengthofusername.classList.remove("invalid");
            document.getElementById("message2").style.display = "none";
            //lengthofusername.classList.add("valid");


        } else {

            document.getElementById("message2").style.display = "block";
            //document.getElementById("signup").disabled = true;
            document.getElementById("username").style.borderColor = "#f11531";
            //lengthofusername.classList.remove("valid");
            lengthofusername.classList.add("invalid");


        }
    }
}
// When the user starts to type something inside the email field
myInput3.onkeypress = function () {
    myInput3.onkeyup = function () {
        myInput3.onblur = function () {
            document.getElementById("message3").style.display = "none";
        }
        var emailregex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if (myInput3.value.match(emailregex)) {
            //document.getElementById("signup").disabled = false;
            document.getElementById("email").style.borderColor = "#1af010";
            emailformat.classList.remove("invalid");
            //emailformat.classList.add("valid");
            document.getElementById("message3").style.display = "none";
        } else {
            //document.getElementById("signup").disabled = true;
            document.getElementById("email").style.borderColor = "#f11531";
            //emailformat.classList.remove("valid");
            emailformat.classList.add("invalid");
            document.getElementById("message3").style.display = "block";
        }

    }
}
// When the user starts to type something inside the nic field
myInput4.onkeypress = function () {
    myInput4.onkeyup = function () {
        myInput4.onblur = function () {
            document.getElementById("message4").style.display = "none";
        }
        var regex1 = /^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/;
        var regex2 = /^[0-9]{4}[5-8]{1}[0-9]{7}$/;

        if (myInput4.value.match(regex1) || myInput4.value.match(regex2)) {
            document.getElementById("nic").style.borderColor = "#1af010";
            //document.getElementById("signup").disabled = false;
            nicformat.classList.remove("invalid");
            //nicformat.classList.add("valid");
            document.getElementById("message4").style.display = "none";
        } else {
            //document.getElementById("signup").disabled = true;
            document.getElementById("nic").style.borderColor = "#f11531";
            //nicformat.classList.remove("valid");
            nicformat.classList.add("invalid");
            document.getElementById("message4").style.display = "block";
        }
    }
}


//when the user starts to enter the date in the dob field
myInput5.onkeypress = function () {
    myInput5.onkeyup = function () {
        myInput5.onblur = function () {
            document.getElementById("message5").style.display = "none";
        }
        /* var v = this.value;
         if (v.match(/^\d{4}$/) !== null) {
             this.value = v + '/';
         } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {
             this.value = v + '/';
         } */
        var birthday = $("#dob").val().toString();

        var yearThen = parseInt(birthday.substring(0, 4), 10);
        var monthThen = parseInt(birthday.substring(5, 7), 10);
        var dayThen = parseInt(birthday.substring(8, 10), 10);
        var today = new Date();

        var todayYear = today.getFullYear();
        var todayMonth = today.getMonth();
        var todayDay = today.getDate();
        var birthDate = new Date(yearThen, monthThen - 1, dayThen); //month count is begin from 0 to 11

        /*var differenceInMilisecond = today.valueOf() - birthDate.valueOf();

        var year_age = Math.floor(differenceInMilisecond / 31536000000);
        var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);

        var month_age = Math.floor(day_age / 30);

        day_age = day_age % 30;*/

        var age_in_year = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {  //validate for actual birthday
            age_in_year = age_in_year - 1;
        }

        if ((birthday.length < 11) && ((age_in_year >= 18) && (age_in_year <= 60))) {
            //document.getElementById("signup").disabled = false;
            document.getElementById("dob").style.borderColor = "#1af010";
            age.classList.remove("invalid");
            //age.classList.add("valid");
            document.getElementById("message5").style.display = "none";
        } else {
            //document.getElementById("signup").disabled = true;
            document.getElementById("dob").style.borderColor = "#f11531";
            //age.classList.remove("valid");
            age.classList.add("invalid");
            document.getElementById("message5").style.display = "block";
        }

        }
}

//for onclick
myInput5.onclick = function () {
        myInput5.onblur = function () {
            document.getElementById("message5").style.display = "none";
        }
    var birthday = $("#dob").val().toString();

    var yearThen = parseInt(birthday.substring(0, 4), 10);
    var monthThen = parseInt(birthday.substring(5, 7), 10);
    var dayThen = parseInt(birthday.substring(8, 10), 10);
    var today = new Date();

    var todayYear = today.getFullYear();
    var todayMonth = today.getMonth();
    var todayDay = today.getDate();
    var birthDate = new Date(yearThen, monthThen - 1, dayThen);

    /*var differenceInMilisecond = today.valueOf() - birthDate.valueOf();

    var year_age = Math.floor(differenceInMilisecond / 31536000000);
    var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);

    var month_age = Math.floor(day_age / 30);

    day_age = day_age % 30;*/

    var age_in_year = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age_in_year = age_in_year - 1;
    }

    if ((birthday.length < 11) && ((age_in_year >= 18) && (age_in_year <= 60))) {
        //document.getElementById("signup").disabled = false;
        document.getElementById("dob").style.borderColor = "#1af010";
        age.classList.remove("invalid");
        //age.classList.add("valid");
        document.getElementById("message5").style.display = "none";
    } else {
        //document.getElementById("signup").disabled = true;
        document.getElementById("dob").style.borderColor = "#f11531";
        //age.classList.remove("valid");
        age.classList.add("invalid");
        document.getElementById("message5").style.display = "block";
    }
}
//when the user try to enter data on address field
myInput6.onkeypress = function () {
    myInput6.onkeyup = function () {


        //validate for requirement
        var ad = myInput6.value.trim();
        if (ad.length > 0) {
            //document.getElementById("signup").disabled = false;
            document.getElementById("address").style.borderColor = "#1af010";
        }
        else {
            //document.getElementById("signup").disabled = true;
            document.getElementById("address").style.borderColor = "#f11531";
        }

    }
}

// when the user try to type on contact no field
myInput7.onkeypress = function () {
    myInput7.onkeyup = function () {
        myInput7.onblur = function () {
            document.getElementById("message6").style.display = "none";
        }
        var re = /^[0]{1}[0-9]{9}$/;

        if (myInput7.value.match(re)) {
            document.getElementById("contactno").style.borderColor = "#1af010";
            document.getElementById("message6").style.display = "none";
            phonenum.classList.remove("wrong");
        } else {
            document.getElementById("message6").style.display = "block";
            phonenum.classList.add("wrong");
            document.getElementById("contactno").style.borderColor = "#f11531";
        }
    }
}

myInput8.onkeypress = function () {
    myInput8.onkeyup = function () {
        myInput8.onblur = function () {
            document.getElementById("message7").style.display = "none";
            document.getElementById("message8").style.display = "none";
            document.getElementById("message9").style.display = "none";
        }
        var lowercaseLetters = /[a-z]/g;
        var uppercaseLetters = /[A-Z]/g;
        var numbers = /[0-9]/g;
        var specialCharacters = /[\!\@\#\$\%\^\&\*]/g;
        var x1 = myInput8.value.trim();
        //pwregex =/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/ ;

        document.getElementById("password-confirm").value = "";
        if ((x1.length >= 6) && (x1.match(lowercaseLetters) && x1.match(uppercaseLetters) && x1.match(numbers) && x1.match(specialCharacters))) {
            document.getElementById("message9").style.display = "block";
            document.getElementById("message8").style.display = "none";
            document.getElementById("message7").style.display = "none";
            strong.classList.add("strngclr");
            document.getElementById("password").style.borderColor = "#1af010";
        }
        else if ((x1.length >= 6) && (x1.match(lowercaseLetters) && x1.match(uppercaseLetters) && x1.match(numbers) || x1.match(specialCharacters))) {
            document.getElementById("message8").style.display = "block";
            document.getElementById("message9").style.display = "none";
            document.getElementById("message7").style.display = "none";
            medium.classList.add("mediumclr");
            document.getElementById("password").style.borderColor = "#1af010";
        } else if ((x1.length >= 6) && (x1.match(lowercaseLetters) || x1.match(uppercaseLetters) || x1.match(numbers) || x1.match(specialCharacters))) {
            document.getElementById("message7").style.display = "block";
            document.getElementById("message9").style.display = "none";
            document.getElementById("message8").style.display = "none";
            weak.classList.add("invalid");
            document.getElementById("password").style.borderColor = "#1af010";
        } else {
            document.getElementById("message7").style.display = "none";
            document.getElementById("message9").style.display = "none";
            document.getElementById("message8").style.display = "none";
            document.getElementById("password").style.borderColor = "#f11531";
        }
    }
}
myInput9.onkeypress = function() {
    myInput9.onkeyup = function () {
        myInput9.onblur = function () {
            document.getElementById("message10").style.display = "none";
        }
        var x = document.getElementById("password-confirm");
        var y = document.getElementById("password");

        if ((x.value != y.value) || (x.value.length == 0)) {

            document.getElementById("password-confirm").style.borderColor = "#f11531";

            con.classList.add("invalid");
            document.getElementById("message10").style.display = "block";
        } else {

            document.getElementById("password-confirm").style.borderColor = "#1af010";

            document.getElementById("message10").style.display = "none";
            con.classList.remove("invalid");

        }
    }
}

