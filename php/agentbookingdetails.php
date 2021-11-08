<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "offers";
$bookingsdatabase = "bookings";

$conn = mysqli_connect($hostname,$username,$password,$database) or die("Database connection failed");
$bookingsconn = mysqli_connect($hostname,$username,$password,$bookingsdatabase) or die("Database connection failed");

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
    <link rel="stylesheet" href="../css/offerdetails.css">
</head>

<body>

<div class="topnav" id="myTopnav">
  <a href="addoffer.php">Add offer</a>
  <a href="agentofferlist.php">Offer list</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div>
<form class="center">
    <?php
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $bookingid = $queries["id"];
    $sql = "SELECT * FROM bookings WHERE id='$bookingid'";
    $result = mysqli_query($bookingsconn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $agencyname = $row['agency'];
        $offername = $row['offer'];
        $sql = "SELECT * FROM offers WHERE name='$offername' AND agency='$agencyname'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $offer = mysqli_fetch_assoc($result);
            echo "
                <div class='row'>
                    <div class='col1'>
                        <label for='username'><b>Username</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$row['username']." name='username' id='username' readonly>
                    </div>
                </div>

                <div class='row'>
                    <div class='col1'>
                        <label for='offername'><b>Offer</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$row['offer']." name='offername' id='offername' readonly>
                    </div>
                </div>

                <div class='row'>
                    <div class='col1'>
                        <label for='destination'><b>Destination</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$offer['destination']." name='destination' id='destination' readonly>
                    </div>
                </div>
            
                <div class='row'>
                    <div class='col1'>
                        <label for='hotelname'><b>Hotel's name</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$offer['hotel']." name='hotelname' id='hotelname' readonly>
                    </div>
                </div>

                <div class='row'>
                    <div class='col1'>        
                        <label for='meals'><b>Meals/day</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$offer['meals']." name='meals' id='meals' readonly>
                    </div>
                </div>
            
                <div class='row'>
                    <div class='col1'>   
                        <label for='nights'><b>Number of nights</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$offer['nights']." name='nights' id='nights' readonly>
                    </div>
                </div>

                <div class='row'>
                    <div class='col1'>           
                        <label for='clients'><b>Number of clients</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$offer['clients']." name='clients' id='clients' readonly>
                    </div>
                </div>

                <div class='row'>
                    <div class='col1'>    
                        <label for='price'><b>Price/person</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$offer['price']." name='price' id='price' readonly>
                    </div>  
                </div>

                <div class='row'>
                    <div class='col1'>        
                        <label for='persons'><b>Number of persons</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$row['persons']." name='persons' id='persons' readonly>
                    </div>
                </div>
            
                <div class='row'>
                    <div class='col1'>   
                        <label for='total'><b>Total price</b></label>
                    </div>
                    <div class='col2'>
                        <input type='text' value=".$row['total']." name='total' id='total' readonly>
                    </div>
                </div>    
        
                <div class='row'>
                    <div class='col1'>           
                        <label for='checkin'><b>Check-in date</b></label>
                    </div>
                    <div class='col2'>
                        <input type='date' value=".$row['check_in']." name='checkin' id='checkin' readonly>
                    </div>
                </div>
            
                <div class='row'>
                    <div class='col1'>    
                        <label for='checkout'><b>Check-out date</b></label>
                    </div>
                    <div class='col2'>
                        <input type='date' value=".$row['check_out']." name='checkout' id='checkout' readonly>
                    </div>
                </div>   
                <br><br>   
            ";
        }
    }
    ?>
</form>
</div>

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