<?php

session_start();

if(isset($_SESSION['user_role'])){ 
  if($_SESSION['user_role']  == 'client'){
      header("Location: clientmenu.php");
  }
  else{
      header("Location: agentmenu.php");
  }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/registration.css">
</head>

<body>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="register.php" method="post">
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

      <label for="agencyname"><b>Agency name(if you are a travel agent)</b></label>
      <input type="text" placeholder="Enter Agency name" name="agencyname" id="agencyname" autocomplete="off">

      <label for="agencyname"><b>Phone number(if you are a travel agent)</b></label>
      <input type="text" placeholder="Enter Phone number" name="pnumber" id="pnumber" autocomplete="off">

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn" name="signup">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<script src="../js/registration.js"></script>

</body>
</html>
