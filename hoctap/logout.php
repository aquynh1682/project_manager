<?php 
    session_start();
    include 'connect.php';
    // end sesstion
    unset($_SESSION['user']);


    header('location: index.php');
?>
