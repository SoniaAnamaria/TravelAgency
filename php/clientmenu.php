<?php

session_start();

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

</head>

<body>
    <p>I'm a client</p>
    <button onclick="document.location='logout.php'">Logout</button> 

</body>
</html>