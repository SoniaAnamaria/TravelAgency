<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "bookings";

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
    <link rel="stylesheet" href="../css/bookinglist.css">
</head>

<body>

<div class="topnav" id="myTopnav">
  <a href="agencylist.php">Agency list</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="center">
<table id="myTable">
<tr class="header">
    <th>Agency</th>
    <th>Offer</th>
  </tr>
    <?php
        $username = $_SESSION["username"];
        $sql = "SELECT * FROM bookings WHERE username='$username' ORDER BY id DESC";
        $result = mysqli_query($conn ,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
                echo "
                    <tr>
                        <td><a href='bookingdetails.php?id=".$row['id']."'>".$row['agency']."</a></td>
                        <td><a href='bookingdetails.php?id=".$row['id']."'>".$row['offer']."</a></td>
                    </tr>
                ";
        }
    ?>
</table>
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