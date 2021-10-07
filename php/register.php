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

if(isset($_POST["signup"])){
    $username = mysqli_real_escape_string($conn,$_POST["uname"]);
    $password = mysqli_real_escape_string($conn,md5($_POST["psw"]));
    $role = mysqli_real_escape_string($conn,$_POST["role"]);
    $agency= mysqli_real_escape_string($conn,$_POST["agencyname"]);

    $check_username = mysqli_num_rows(mysqli_query($conn,"SELECT username FROM users where username='$username'"));

    if($check_username > 0){
        echo "<script>
        alert('Username already exists.');
        document.location='registration.php';
        </script>";
    }
    else{
        $sql = "INSERT INTO users(username, password, role, agency) VALUES('$username', '$password', '$role', '$agency')";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION["user_role"] = $role;
            if($role == 'client'){
                header("Location: clientmenu.php");
            }
            else{
                header("Location: agentmenu.php");
            }
        }else{
            echo "<script>
            alert('User registration failed.');
            document.location='registration.php';
            </script>";
        }
    }
}

?>