<?php

session_start();

if(isset($_SESSION['user_role'])){ 
    if($_SESSION['user_role']  !== 'agent'){
        header("Location: clientmenu.php");
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

</head>

<body>
    <p>I'm an agent</p>
    <button onclick="document.location='logout.php'">Logout</button> 

</body>
</html>