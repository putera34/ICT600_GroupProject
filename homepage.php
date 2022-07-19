<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
?>
<?php 
    if( $_SESSION['type']=='admin'){
        header('location:adminhome.php');
    }
    else{
        header('location:userhome.php');
    }
?>
