var myInput = document.getElementById("Checkbox1");
var myInput2 = document.getElementById("Checkbox2");
var myInput3 = document.getElementById("Checkbox3");
var myInput4 = document.getElementById("Checkbox4");
var myInput5 = document.getElementById("Checkbox5");
var myInput6 = document.getElementById("Checkbox6");
var myInput7 = document.getElementById("Checkbox7");
var myInput8 = document.getElementById("Checkbox8");
var myInput9 = document.getElementById("Checkbox9");
var myInput10 = document.getElementById("Checkbox10");

//monday
function f1() {
    if (myInput.checked) {
        myInput2.disabled = true;
    }else{
        myInput2.disabled = false;
    }
}

function f2() {
    if (myInput2.checked) {
        myInput.disabled = true;
    }else{
        myInput.disabled = false;
    }
}
//end of the monday

//tuesday
function f3() {
    if (myInput3.checked) {
        myInput4.disabled = true;
    }else{
        myInput4.disabled = false;
    }
}

function f4() {
    if (myInput4.checked) {
        myInput3.disabled = true;
    }else{
        myInput3.disabled = false;
    }
}
//end of the tuesday

//wednesday
function f5() {
    if (myInput5.checked) {
        myInput6.disabled = true;
    }else{
        myInput6.disabled = false;
    }
}

function f6() {
    if (myInput6.checked) {
        myInput5.disabled = true;
    }else{
        myInput5.disabled = false;
    }
}
//end of wednesday

//thursday
function f7(){
    if (myInput7.checked) {
        myInput8.disabled = true;
    }else{
        myInput8.disabled = false;
    }
}

function f8(){
    if (myInput8.checked) {
        myInput7.disabled = true;
    }else{
        myInput7.disabled = false;
    }
}
//end of thursday

//friday
function f9(){
    if (myInput9.checked) {
        myInput10.disabled = true;
    }else{
        myInput10.disabled = false;
    }
}

function f10(){
    if (myInput10.checked) {
        myInput9.disabled = true;
    }else{
        myInput9.disabled = false;
    }
}
//end of friday

