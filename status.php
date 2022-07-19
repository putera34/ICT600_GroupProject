<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
    if($_SESSION['login']!==false){
        header('location:accountstatus.php');
    }
?>
