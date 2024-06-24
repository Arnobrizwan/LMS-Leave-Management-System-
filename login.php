<?php
session_start();
require('./DATABASE_FILES/config.php');

$_SESSION["Login"] = "";

if (isset($_COOKIE['USER']) and isset($_COOKIE['PASS'])) {
	$user = $_COOKIE['USER'];
	$pass = $_COOKIE['PASS'];
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
	<link rel="stylesheet" href="./css/login.css">
	<script src="./JAVASCRIPT/login.js"></script>
</head>

<body>
<section>
  <div class="box">
    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>
    
    <div class="container"> 
      <div class="form"> 
        <h2>Login to Leave Management System</h2>
        <form method="post" name="login_form" action="check_login.php" onsubmit="return validateLogin()">
          <div class="inputBx">
            <input type="text" name="username"placeholder="username" value="<?php if(isset($_COOKIE["USER"])) { echo $_COOKIE["USER"]; } ?>" required="required">
          
            <i class="fas fa-user-circle"></i>
          </div>
          <div class="inputBx password">
            <input id="password-input" type="password" name="password"placeholder="password" value="<?php if(isset($_COOKIE["PASS"])) { echo $_COOKIE["PASS"]; } ?>" required="required">
           
            <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
            <i class="fas fa-key"></i>
          </div>
          <label class="remember"><input type="checkbox" name="remember" value="1"> Remember</label>
          <div class="inputBx">
            <input type="submit" value="Log in">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script src="./JAVASCRIPT/login.js"></script>
</body>

</html>