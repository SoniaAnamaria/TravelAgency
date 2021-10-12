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


if(isset($_POST["save"])){
    $agencyname = $_SESSION["agency_name"];
    $offername = mysqli_real_escape_string($conn,$_POST["offername"]);
    $destination = mysqli_real_escape_string($conn,$_POST["destination"]);
    $hotelname = mysqli_real_escape_string($conn,$_POST["hotelname"]);
    $meals = mysqli_real_escape_string($conn,$_POST["meals"]);
    $nights = mysqli_real_escape_string($conn,$_POST["nights"]);
    $clients = mysqli_real_escape_string($conn,$_POST["clients"]);
    $price = mysqli_real_escape_string($conn,$_POST["price"]);

    $sql = "INSERT INTO offers(agency, name, destination, hotel, meals, nights, clients, price) VALUES('$agencyname', '$offername', '$destination', '$hotelname', '$meals', '$nights', '$clients', '$price')";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>
        alert('Saving offer succeeded.');
        document.location='addoffer.php';
        </script>";
    }else{
        echo "<script>
        alert('Saving offer failed.');
        document.location='addoffer.php';
        </script>";
    }
}

?>