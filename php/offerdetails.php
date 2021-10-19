<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "offers";
$usersdatabase = "registration";

$conn = mysqli_connect($hostname,$username,$password,$database) or die("Database connection failed");
$usersconn = mysqli_connect($hostname,$username,$password,$usersdatabase) or die("Database connection failed");

if(isset($_SESSION['user_role'])){ 
    if($_SESSION['user_role']  !== 'client'){
        header("Location: agentmenu.php");
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
  <a href="agencylist.php">Agency list</a>
  <a href="#">Booking list</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<?php
    $agencyname = $_SESSION["agency_name"];
    $sql = "SELECT * FROM users WHERE agency='$agencyname'";
    $result = mysqli_query($usersconn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo "
            <p>Contact: ".$row['phone']."<p>
        ";
    }
?>
<div>
<form class="center" action="makebooking.php" method="post">
    <?php
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $offername = $queries["name"];
    $_SESSION["offer_name"] = $offername;
    $sql = "SELECT * FROM offers WHERE agency='$agencyname' AND name='$offername'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo "
            <div class='row'>
                <div class='col-20'>
                    <label for='offername'><b>Name</b></label>
                </div>
                <div class='col-80'>
                    <input type='text' value='$offername' name='offername' id='offername' readonly>
                </div>
            </div>

            <div class='row'>
                <div class='col-20'>
                    <label for='destination'><b>Destination</b></label>
                </div>
                <div class='col-80'>
                    <input type='text' value=".$row['destination']." name='destination' id='destination' readonly>
                </div>
            </div>
        
            <div class='row'>
                <div class='col-20'>
                    <label for='hotelname'><b>Hotel's name</b></label>
                </div>
                <div class='col-80'>
                    <input type='text' value=".$row['hotel']." name='hotelname' id='hotelname' readonly>
                </div>
            </div>

            <div class='row'>
                <div class='col-20'>        
                    <label for='meals'><b>Meals/day</b></label>
                </div>
                <div class='col-80'>
                    <input type='text' value=".$row['meals']." name='meals' id='meals' readonly>
                </div>
            </div>
        
            <div class='row'>
                <div class='col-20'>   
                    <label for='nights'><b>Number of nights</b></label>
                </div>
                <div class='col-80'>
                    <input type='text' value=".$row['nights']." name='nights' id='nights' readonly>
                </div>
            </div>

            <div class='row'>
                <div class='col-20'>           
                    <label for='clients'><b>Number of clients</b></label>
                </div>
                <div class='col-80'>
                    <input type='text' value=".$row['clients']." name='clients' id='clients' readonly>
                </div>
            </div>

            <div class='row'>
                <div class='col-20'>    
                    <label for='price'><b>Price/person</b></label>
                </div>
                <div class='col-80'>
                    <input type='text' value=".$row['price']." name='price' id='price' readonly>
                </div>        
        ";
    }
    ?>
    </div>
        <div class='row'>
        <div class='col-20'>        
            <label for='persons'><b>Number of persons</b></label>
        </div>
        <div class='col-80'>
            <input type='text' name='persons' id='persons' onkeydown='calculatePrice()' onkeyup='printPrice()' required autocomplete='off'
            oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">
        </div>
    </div>
    
    <div class='row'>
        <div class='col-20'>   
            <label for='total'><b>Total price</b></label>
        </div>
        <div class='col-80'>
            <input type='text' value='0' name='total' id='total' readonly>
        </div>
    </div>    

    <div class='row'>
        <div class='col-20'>           
            <label for='checkin'><b>Check-in date</b></label>
        </div>
        <div class='col-80'>
            <input type='date' name='checkin' id='checkin' required onclick='setCkeckInDate()' onchange='setCheckOutDate()'
            oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">
        </div>
    </div>

    <div class='row'>
        <div class='col-20'>    
            <label for='checkout'><b>Check-out date</b></label>
        </div>
        <div class='col-80'>
            <input type='date' name='checkout' id='checkout' readonly>
        </div>
    </div>
    <button type="submit" name="make_booking">Make a booking</button>
    <br><br><br>
</form>
</div>

<script src="../js/offerdetails.js"></script>

</body>
</html>