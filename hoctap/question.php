<?php
    include('connect_pdo.php');
    $id = $_GET['id'];
    $sql = $conn->prepare("SELECT * FROM question WHERE id_mon = ".$id." ORDER BY RAND() LIMIT 40");
    $sql->execute();
    echo json_encode($sql->fetchALL(PDO::FETCH_ASSOC),JSON_UNESCAPED_UNICODE);
?>