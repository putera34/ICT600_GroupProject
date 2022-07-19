<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="header.css">

</head>
<body>

<div class="header">
  <a href="#default" class="logo">Gym Membership System</a>
  <div class="header-right">
    <a class="active" href="userhome.php">Home</a>
	<a href="userabout.php">About Us</a>
    <a href="usergympackage.php">Gym Package</a>
    <a href="useraccount.php">Profile</a>
	
  </div>
</div>

<div style="padding-left:20px">
  <h1>Northern Iron Fitness Centre</h1>
  <div style="padding-left:20px">
	<strong>Hi, <?php echo $_SESSION['firstname'] ?></strong> <br><br>
	<strong>You are, <?php echo $_SESSION['type'] ?></strong><br><br>

  </div>

<img src="banner1.gif" alt="welcome banner" style="width:1100px;height:700px;">
<img src="gym.jpg" alt="Gym" width="600" height="700">
</div>
</body>
</html>
