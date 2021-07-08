<?php
    include('connect_pdo.php');
    $id = $_GET['id'];
    $sql = "select * from posts where post_id = '".$id."'";
    $rs = $conn->prepare($sql);
    $rs->execute();
    $result = $rs->fetch();
    
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
    // echo xmlrpc_encode($result);
?>