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

    $check_username = mysqli_num_rows(mysqli_query($conn,"SELECT role FROM users where username='$username' AND password='$password'"));

    if($check_username > 0){
        $_SESSION["user_role"] = $role;
        if($role == 'client'){
            header("Location: clientmenu.php");
        }
        else{
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