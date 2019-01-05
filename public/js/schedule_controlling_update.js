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
var myInput11 = document.getElementById("Checkbox11");
var myInput12 = document.getElementById("Checkbox12");

//monday
function f1() {
    if (myInput.checked) {
        myInput2.disabled = true;
        //document.getElementById("b1").style.color = "#5de05b";
        document.getElementById("b1").innerText = "Booked";
    }else{
        myInput2.disabled = false;
        //document.getElementById("b1").style.color = "#000000";
        document.getElementById("b1").innerText = "Book Now";
    }
}

function f2() {
    if (myInput2.checked) {
        myInput.disabled = true;
        //document.getElementById("b2").style.color = "#5de05b";
        document.getElementById("b2").innerText = "Booked";
    }else{
        myInput.disabled = false;
        //document.getElementById("b2").style.color = "#000000";
        document.getElementById("b2").innerText = "Book Now";
    }
}
//end of the monday

//tuesday
function f3() {
    if (myInput3.checked) {
        myInput4.disabled = true;
        //document.getElementById("b3").style.color = "#5de05b";
        document.getElementById("b3").innerText = "Booked";
    }else{
        myInput4.disabled = false;
        //document.getElementById("b3").style.color = "#000000";
        document.getElementById("b3").innerText = "Book Now";
    }
}

function f4() {
    if (myInput4.checked) {
        myInput3.disabled = true;
        //document.getElementById("b4").style.color = "#5de05b";
        document.getElementById("b4").innerText = "Booked";
    }else{
        myInput3.disabled = false;
        //document.getElementById("b4").style.color = "#000000";
        document.getElementById("b4").innerText = "Book Now";
    }
}
//end of the tuesday

//wednesday
function f5() {
    if (myInput5.checked) {
        myInput6.disabled = true;
        //document.getElementById("b5").style.color = "#5de05b";
        document.getElementById("b5").innerText = "Booked";
    }else{
        myInput6.disabled = false;
        //document.getElementById("b5").style.color = "#000000";
        document.getElementById("b5").innerText = "Book Now";
    }
}

function f6() {
    if (myInput6.checked) {
        myInput5.disabled = true;
        //document.getElementById("b6").style.color = "#5de05b";
        document.getElementById("b6").innerText = "Booked";
    }else{
        myInput5.disabled = false;
        //document.getElementById("b6").style.color = "#000000";
        document.getElementById("b6").innerText = "Book Now";
    }
}
//end of wednesday

//thursday
function f7(){
    if (myInput7.checked) {
        myInput8.disabled = true;
        //document.getElementById("b7").style.color = "#5de05b";
        document.getElementById("b7").innerText = "Booked";
    }else{
        myInput8.disabled = false;
        //document.getElementById("b7").style.color = "#000000";
        document.getElementById("b7").innerText = "Book Now";
    }
}

function f8(){
    if (myInput8.checked) {
        myInput7.disabled = true;
        //document.getElementById("b8").style.color = "#5de05b";
        document.getElementById("b8").innerText = "Booked";
    }else{
        myInput7.disabled = false;
        //document.getElementById("b8").style.color = "#000000";
        document.getElementById("b8").innerText = "Book Now";
    }
}
//end of thursday

//friday
function f9(){
    if (myInput9.checked) {
        myInput10.disabled = true;
        //document.getElementById("b9").style.color = "#5de05b";
        document.getElementById("b9").innerText = "Booked";
    }else{
        myInput10.disabled = false;
        //document.getElementById("b9").style.color = "#000000";
        document.getElementById("b9").innerText = "Book Now";
    }
}

function f10(){
    if (myInput10.checked) {
        myInput9.disabled = true;
        //document.getElementById("b10").style.color = "#5de05b";
        document.getElementById("b10").innerText = "Booked";
    }else{
        myInput9.disabled = false;
        //document.getElementById("b10").style.color = "#000000";
        document.getElementById("b10").innerText = "Book Now";
    }
}
//end of friday

//saturday
function f11(){
    if (myInput11.checked) {
        //document.getElementById("b11").style.color = "#5de05b";
        document.getElementById("b11").innerText = "Booked";
    }else{
        //document.getElementById("b11").style.color = "#000000";
        document.getElementById("b11").innerText = "Book Now";
    }
}
//end of saturday

//sunday
function f12(){
    if (myInput12.checked) {
        //document.getElementById("b12").style.color = "#5de05b";
        document.getElementById("b12").innerText = "Booked";
    }else{
        //document.getElementById("b12").style.color = "#000000";
        document.getElementById("b12").innerText = "Book Now";
    }
}
//end of sunday

//display only
//monday
if(myInput.checked){
    //document.getElementById("b1").style.color = "#5de05b";
    document.getElementById("b1").innerText = "Booked";
    myInput2.disabled = true;
}

if(myInput2.checked){
    //document.getElementById("b2").style.color = "#5de05b";
    document.getElementById("b2").innerText = "Booked";
    myInput.disabled = true;
}
//end of monday

//tuesday
if(myInput3.checked){
    //document.getElementById("b3").style.color = "#5de05b";
    document.getElementById("b3").innerText = "Booked";
    myInput4.disabled = true;
}

if(myInput4.checked){
    //document.getElementById("b4").style.color = "#5de05b";
    document.getElementById("b4").innerText = "Booked";
    myInput3.disabled = true;
}
//end of tuesday

//wednesday
if(myInput5.checked){
    //document.getElementById("b5").style.color = "#5de05b";
    document.getElementById("b5").innerText = "Booked";
    myInput6.disabled = true;
}

if(myInput6.checked){
    //document.getElementById("b6").style.color = "#5de05b";
    document.getElementById("b6").innerText = "Booked";
    myInput5.disabled = true;
}
//end of wednesday

//thursday
if(myInput7.checked){
    //document.getElementById("b7").style.color = "#5de05b";
    document.getElementById("b7").innerText = "Booked";
    myInput8.disabled = true;
}

if(myInput8.checked){
    //document.getElementById("b8").style.color = "#5de05b";
    document.getElementById("b8").innerText = "Booked";
    myInput7.disabled = true;
}
//end of thursday

//friday
if(myInput9.checked){
    //document.getElementById("b9").style.color = "#5de05b";
    document.getElementById("b9").innerText = "Booked";
    myInput10.disabled = true;
}

if(myInput10.checked){
    //document.getElementById("b10").style.color = "#5de05b";
    document.getElementById("b10").innerText = "Booked";
    myInput9.disabled = true;
}
//end of friday

//saturday
if(myInput11.checked){
    //document.getElementById("b11").style.color = "#5de05b";
    document.getElementById("b11").innerText = "Booked";
}
//end of saturday

//sunday
if(myInput12.checked){
    //document.getElementById("b12").style.color = "#5de05b";
    document.getElementById("b12").innerText = "Booked";
}
//end of sunday

