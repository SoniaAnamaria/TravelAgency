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


if(isset($_POST["make_booking"])){
    $username = $_SESSION["username"];
    $agencyname = $_SESSION["agency_name"];
    $offername = $_SESSION["offer_name"];
    $persons = mysqli_real_escape_string($conn,$_POST["persons"]);
    $total = mysqli_real_escape_string($conn,$_POST["total"]);
    $check_in = mysqli_real_escape_string($conn,$_POST["checkin"]);
    $check_out = mysqli_real_escape_string($conn,$_POST["checkout"]);

    $sql = "INSERT INTO bookings(username, agency, offer, persons, total, check_in, check_out) VALUES('$username', '$agencyname', '$offername', '$persons', '$total', '$check_in', '$check_out')";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>
        alert('Making booking succeeded.');
        document.location='agencylist.php';
        </script>";
    }else{
        echo "<script>
        alert('Making booking failed.');
        document.location='agencylist.php';
        </script>";
    }
}

?>