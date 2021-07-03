<?php
    include('connect_pdo.php');
    $search = $_GET['search'];
    $sql = $conn->prepare("SELECT * FROM question WHERE question LIKE '%".$search."%'");
    $sql->execute();
    $count = $sql->rowCount();
    $pages = $count%20==0?$count/20:floor($count/20)+1;
    echo json_encode($pages, JSON_UNESCAPED_UNICODE);
?>