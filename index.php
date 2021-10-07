<?php

session_start();

if(isset($_SESSION['user_role'])){ 
    if($_SESSION['user_role']  == 'client'){
        header("Location: php/clientmenu.php");
    }
    else{
        header("Location: php/agentmenu.php");
    }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="loginbtn">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="php/login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" id="uname" required autocomplete="off"
      oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">
   
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required 
      oninvalid="this.setCustomValidity('This field cannot be left blank')" oninput="this.setCustomValidity('')">

      <label for="role"><b>Role</b></label>
      <select name="role" id="role">
        <option value="client">Client</option>
        <option value="agent">Travel agent</option>
      </select>

      <button type="submit" name="login">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Don't have an account? <a href="php/registration.php">Register here</a></span>
    </div>
  </form>
</div>

<script src="js/index.js"></script>

</body>
</html>
