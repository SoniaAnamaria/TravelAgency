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

if(isset($_POST["edit"])){
    $agencyname = $_SESSION["agency_name"];
    $offername = $_SESSION["offer_name"];
    $new_offername = mysqli_real_escape_string($conn,$_POST["offername"]);
    $destination = mysqli_real_escape_string($conn,$_POST["destination"]);
    $hotelname = mysqli_real_escape_string($conn,$_POST["hotelname"]);
    $meals = mysqli_real_escape_string($conn,$_POST["meals"]);
    $nights = mysqli_real_escape_string($conn,$_POST["nights"]);
    $clients = mysqli_real_escape_string($conn,$_POST["clients"]);
    $price = mysqli_real_escape_string($conn,$_POST["price"]);

    $db = mysqli_select_db($conn,'offers');
    $sql = "UPDATE `offers` SET name='$new_offername', destination='$destination', hotel='$hotelname', meals='$meals', nights='$nights', clients='$clients', price='$price' WHERE agency='$agencyname' AND name='$offername'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>
        alert('Editing offer succeeded.');
        document.location='editoffer.php';
        </script>";
    }else{
        echo "<script>
        alert('Editing offer failed.');
        document.location='editoffer.php';
        </script>";
    }
}


?>