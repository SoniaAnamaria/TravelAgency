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

if(isset($_POST["delete"])){
    $agencyname = $_SESSION["agency_name"];
    $offername = $_SESSION["offer_name"];

    $sql = "DELETE FROM offers WHERE agency='$agencyname' AND name='$offername'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>
        alert('Deleting offer succeeded.');
        document.location='agentofferlist.php';
        </script>";
    }else{
        echo "<script>
        alert('Deleting offer failed.');
        document.location='agentofferlist.php';
        </script>";
    }
}


?>