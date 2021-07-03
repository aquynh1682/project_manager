<?php
    include('connect.php');
    $userName= $_GET['id'];
    $sql = "SELECT * FROM monhoc WHERE id_mon = '$userName'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkUserName = mysqli_num_rows($query);
    if($checkUserName == 1){
        echo $data['tenMon'];
    }
?>