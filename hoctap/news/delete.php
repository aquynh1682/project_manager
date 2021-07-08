<?php
    include('connect_pdo.php');
    try {
        $id = $_GET['id'];
        $sql = $conn->prepare("Select image from posts where post_id = '".$id."' LIMIT 1");
        $sql->execute();
        while($result = $sql->fetch(PDO::FETCH_ASSOC)){
            unlink('./images/'.$result['image']);
        }
        $sql = "delete from posts where post_id = '".$id."'";
        if($conn->query($sql) == true){
            echo "xoá câu hỏi thành công";
        }else{
            echo "xoá câu hỏi không thành công";
        }
    } catch (Exception $e) {
        echo "lỗi xoá câu hỏi" .$e;
    }
?>