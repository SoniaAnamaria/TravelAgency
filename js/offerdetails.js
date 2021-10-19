function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  
function calculatePrice() {
      var persons = document.getElementById("persons");
      var price = document.getElementById("price");
      var total = document.getElementById("total");
  }
  
function printPrice() {
      total.value = persons.value*price.value;
}

function setCkeckInDate(){
    var date = document.getElementById("checkin");
    var today =  new Date().toISOString().slice(0, 10);
    date.min = today;
}

function setCheckOutDate(){
    var dateIn = document.getElementById("checkin");
    var dateOut = document.getElementById("checkout");
    var days = document.getElementById("nights");
    var date = new Date(dateIn.value.toString());
    date.setDate(date.getDate()+parseInt(days.value));
    dateOut.value = date.toISOString().slice(0, 10);
}