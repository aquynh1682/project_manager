<?php
    include 'connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
    try{
        include('connect_pdo.php');
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = $user['id'];

        $sql = "update user set name = '".$name."', diaChi = '".$address."', email= '".$email."', phone='".$phone."' where id='".$id."'";
        // $sql = $sql."set name = '".$name."',";
        // $sql = $sql."diaChi ='".$address."',";
        // $sql = $sql."email ='".$email."',";
        // $sql = $sql."phone ='".$phone."'";
        // $sql = $sql."where id ='".$id."'";
        if($conn->query($sql) == true){
            echo "cập nhật câu hỏi thành công";
        }else{
            echo "cập nhật câu hỏi không thành công";
        }
    }catch(Exception $e){
        echo "Lỗi" .$e;
    }
?>