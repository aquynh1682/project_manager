<?php 
    session_start();
    include 'connect.php';
    unset($_SESSION['user']);

    header('location: news.php');
?>