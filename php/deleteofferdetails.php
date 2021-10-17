<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "offers";

$conn = mysqli_connect($hostname,$username,$password,$database) or die("Database connection failed");

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
  <a href="addoffer.php">Add offer</a>
  <a href="editoffer.php">Edit offer</a>
  <a href="deleteoffer.php">Delete offer</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<form class="center" action="deleteofferdatabase.php" method="post">
    <?php
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $agencyname = $_SESSION["agency_name"];
    $offername = $queries["name"];
    $_SESSION["offer_name"] = $offername;
    $sql = "SELECT * FROM offers WHERE agency='$agencyname' AND name='$offername'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo "
            <label for='offername'><b>Name</b></label>
            <input type='text' value='$offername' name='offername' id='offername' readonly>

            <label for='destination'><b>Destination</b></label>
            <input type='text' value=".$row['destination']." name='destination' id='destination' readonly>
        
            <label for='hotelname'><b>Hotel's name</b></label>
            <input type='text' value=".$row['hotel']." name='hotelname' id='hotelname' readonly>
        
            <label for='meals'><b>Meals/day</b></label>
            <input type='text' value=".$row['meals']." name='meals' id='meals' readonly>
        
            <label for='nights'><b>Number of nights</b></label>
            <input type='text' value=".$row['nights']." name='nights' id='nights' readonly>
        
            <label for='clients'><b>Number of clients</b></label>
            <input type='text' value=".$row['clients']." name='clients' id='clients' readonly>
        
            <label for='price'><b>Price/person</b></label>
            <input type='text' value=".$row['price']." name='price' id='price' readonly>
        ";
    }
    ?>
    <button type="submit" name="delete" onClick='return checkDelete()'>Delete</button>
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

function checkDelete(){
    return confirm('Are you sure you want to delete this offer?');
}
</script>

</body>
</html>