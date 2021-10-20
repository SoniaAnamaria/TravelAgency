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
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body>
<table class="center">
        <tr>
            <td><button onclick="document.location='addoffer.php'">Add offer</button></td>
        </tr>
        <tr>
            <td><button onclick="document.location='editoffer.php'">Edit offer</button></td>
        </tr>
        <tr>
            <td><button onclick="document.location='deleteoffer.php'">Delete offer</button></td>
        </tr>
        <tr>
            <td><button onclick="document.location='agentbookinglist.php'">Booking list</button> </td>
        </tr>
        <tr>
            <td><button onclick="document.location='logout.php'">Logout</button> </td>
         </tr>
    </table>

</body>
</html>