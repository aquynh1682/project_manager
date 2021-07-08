<?php
    include('connect_pdo.php');
    $id = $_POST['id'];
    $sql = "select * from posts a join category b on a.category_id = b.category_id where post_id = '".$id."'";
    $rs = $conn->prepare($sql);
    $rs->execute();
    $result = $rs->fetch();
    
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
    // echo "hello";
    // echo xmlrpc_encode($result);
?>