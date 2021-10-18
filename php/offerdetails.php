<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "offers";

$conn = mysqli_connect($hostname,$username,$password,$database) or die("Database connection failed");

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
    <link rel="stylesheet" href="../css/editoffer.css">
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

<div class="center">
<ul id="myUL">
    <?php
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $agencyname = $queries["name"];
        $sql = "SELECT * FROM offers WHERE agency='$agencyname'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "
                    <li><a>".$row['name']."</a></li>
                ";
            }
        } 
    ?>
</ul>
</div>

<script src="../js/editoffer.js"></script>

</body>
</html>