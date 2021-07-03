<?php

    header('Content-Type: text/html; charset=UTF-8');
    // if(!isset($_POST['username'])){
    //     die('');
    // }

    // include('connect.php');

    // header('Content-Type: text/html; charset=utf-8');
    $link = mysqli_connect("localhost", "olirenwm_htht", "123456a@", "olirenwm_htht");
    mysqli_set_charset($link, 'UTF8');
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['DiaChi'];
    $sex = $_POST['gender'];
    $futureDate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
    $date = date("d/m/Y", $futureDate);
    $access = 1;
    if(!$username || !$password || !$fullname || !$email || !$phone || !$sex){
        echo "vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    $passwordmd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, email, phone, userName, password, gioiTinh, diaChi, ngayDangKy, access) VALUES ('{$fullname}', '{$email}', '{$phone}', '{$username}', '{$passwordmd}', '{$sex}', '{$adress}', '{$date}', '{$access}')";
    if(mysqli_query($link, $sql)){
        echo "records inserted successfully.";
    } else{
        echo "ERROR: could not able to execute $sql. " . mysqli_error($link);
    }

    mysqli_close($link);
    header("location: ../DangNhap.html");
    // $addmember = mysql_query("
    //     INSERT INTO user (
    //         name,
    //         email,
    //         userName,
    //         password,
    //         gioiTinh,
    //     )
    //     VALUE (
    //         '{$fullname}',
    //         '{$email}',
    //         '{$username}',
    //         '{$password}',
    //         '{$sex}'
    //     )
    // ");
    // if ($addmember)
    //     echo "Quá trình đăng ký thành công. <a href='/'>Về trang chủ</a>";
    // else
    //     echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../html/dangky.html'>Thử lại</a>";
?>