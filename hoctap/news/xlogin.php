<?php
    include 'connect.php';
    session_start();
    if(isset($_POST['userName'])){
        $userName= $_POST['userName'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE user = '$userName'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkUserName = mysqli_num_rows($query);
        if($checkUserName == 1){
            $checkPass = password_verify($password, $data['password']);
            if($checkPass){
                $_SESSION['user'] = $data;
                header('location: news.php');
            }
            else{
                var_dump("Tài khoản hoặc mật khẩu không đúng mời bạn nhập lại");
                header('location: login.php');
            }
        }
        else{
            var_dump("Tài khoản hoặc mật khẩu không đúng mời bạn nhập lại");
            header('location: login.php');
        }
    }
?>