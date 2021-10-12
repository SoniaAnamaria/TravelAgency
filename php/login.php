<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "registration";

$conn = mysqli_connect($hostname,$username,$password,$database) or die("Database connection failed");

if(isset($_SESSION['user_role'])){ 
    if($_SESSION['user_role']  == 'client'){
        header("Location: clientmenu.php");
    }
    else{
        header("Location: agentmenu.php");
    }
} 

if(isset($_POST["login"])){
    $username = mysqli_real_escape_string($conn,$_POST["uname"]);
    $password = mysqli_real_escape_string($conn,md5($_POST["psw"]));
    $role = mysqli_real_escape_string($conn,$_POST["role"]);

    $check_username = mysqli_query($conn,"SELECT agency FROM users where username='$username' AND password='$password'");

    if(mysqli_num_rows($check_username) > 0){
        $row = mysqli_fetch_assoc($check_username);
        $_SESSION["user_role"] = $role;
        if($role == 'client'){
            header("Location: clientmenu.php");
        }
        else{
            $_SESSION["agency_name"] = $row['agency'];
            header("Location: agentmenu.php");
        }
    }else{
        echo "<script>
        alert('Username or password is incorrect.');
        document.location='../index.php';
        </script>";
    }
}

?>