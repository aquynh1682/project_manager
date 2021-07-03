<?php 
    include('connect_pdo.php');
    $id = $_POST['id'];
    $sql = $conn->prepare("SELECT * FROM payments WHERE thanh_vien = ".$id." ");
    $sql->execute();
    $total=0;
    while($result = $sql->fetch(PDO::FETCH_ASSOC)){
        if($result['vnp_response_code'] == '00'){
            $total += $result['money'];
        }
    }
    echo $total;
?>