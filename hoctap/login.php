<?php
    include 'connect.php';
    session_start();
    if(isset($_POST['userName'])){
        $userName= $_POST['userName'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE userName = '$userName'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkUserName = mysqli_num_rows($query);
        if($checkUserName == 1){
            $checkPass = password_verify($password, $data['password']);
            if($checkPass){
                $_SESSION['user'] = $data;
                // echo $data['id'];
                header('location: index.php');
                // $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
                // var_dump($user['name']);
                // var_dump($data['id']);
            }
            else{
                var_dump("Tài khoản hoặc mật khẩu không đúng mời bạn nhập lại");
                header('location: DangNhap.html');
            }
        }
        else{
            var_dump("Tài khoản hoặc mật khẩu không đúng mời bạn nhập lại");
            header('location: DangNhap.html');
        }
    }
?>