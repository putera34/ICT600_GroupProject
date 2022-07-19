<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");

?>
<!doctype html>
<html lang="en">
  <head>
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Gym Packages</title>

   

  </head>
	
  <body>
  <div class="header">
  <a href="#default" class="logo">Gym Membership System</a>
  <div class="header-right">
    <a  href="userhome.php">Home</a>
	<a href="userabout.php">About Us</a>
    <a class="active" href="usergympackage.php">Gym Package</a>
    <a href="useraccount.php">Profile</a>
	</div>
	</div>
	<br><br>
	<div align="center">
	<img src="package.jpg" alt="pckg" width="700" height="450">
	</div>

  </body>
</html>
