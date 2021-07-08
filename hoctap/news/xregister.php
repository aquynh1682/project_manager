<?php

    header('Content-Type: text/html; charset=UTF-8');
    $link = mysqli_connect("localhost", "olirenwm_news", "123456a@", "olirenwm_news");
    mysqli_set_charset($link, 'UTF8');
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $name = $_POST['name'];
    $user= $_POST['user'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $access = 1;
    $passwordmd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (fullName, user, password, email, address, phone, access) VALUES ('{$name}', '{$user}', '{$passwordmd}', '{$email}', '{$address}', '{$phone}', '{$access}')";
    if(mysqli_query($link, $sql)){
        echo "Đăng ký thành công (đợi 5s để chương trình chuyển về trang đăng nhập)";
    } else{
        echo "ERROR: could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
    
?>