<?php

session_start();

if(isset($_SESSION['user_role'])){ 
    if($_SESSION['user_role']  !== 'agent'){
        header("Location: clientmenu.php");
    }
} 
else{
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/addoffer.css">
</head>

<body>

<div class="topnav" id="myTopnav">
  <a href="editoffer.php">Edit offer</a>
  <a href="deleteoffer.php">Delete offer</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<form class="center" action="offerdatabase.php" method="post">
    <label for="offername"><b>Name</b></label>
    <input type="text" placeholder="Enter Name of the offer" name="offername" id="offername" required autocomplete="off"
      oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">

    <label for="destination"><b>Destination</b></label>
    <input type="text" placeholder="Enter Destination" name="destination" id="destination" required autocomplete="off"
      oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">

    <label for="hotelname"><b>Hotel's name</b></label>
    <input type="text" placeholder="Enter Name of the hotel" name="hotelname" id="hotelname" required autocomplete="off"
      oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">

    <label for="meals"><b>Meals/day</b></label>
    <input type="text" placeholder="Enter Number of meals per day" name="meals" id="meals" required autocomplete="off"
      oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">

    <label for="nights"><b>Number of nights</b></label>
    <input type="text" placeholder="Enter Number of nights" name="nights" id="nights" required autocomplete="off"
      oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">

    <label for="clients"><b>Number of clients</b></label>
    <input type="text" placeholder="Enter Number of clients" name="clients" id="clients" required autocomplete="off"
      oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">

    <label for="price"><b>Price/person</b></label>
    <input type="text" placeholder="Enter Price per person" name="price" id="price" required autocomplete="off"
      oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">

    <button type="submit" name="save">Save</button>
</form>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>