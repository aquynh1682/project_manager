<?php
    include 'connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
    try {
        include('connect_pdo.php');
        $diem = $_POST['count'];
        $id_user = $user['id'];
        $date = $_POST['dateTime'];
        $idMon = $_POST['idMon'];
        $sql = "insert into savediem(id_user, id_mon, diem, time)";
        $sql = $sql."values('".$id_user."', '".$idMon."','".$diem."','".$date."')";
        if($conn->query($sql) == true){
            echo "Điểm của bạn đẫ được lưu lại vào hệ thống";
        }else{
            echo "Không lưu được";
        }
    }catch(Exception $e){
        echo "Lỗi" .$e;
    }
?>