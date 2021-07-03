<?php
    include('connect_pdo.php');
    try {
        $id = $_POST['id'];
        $sql = "delete from question where id = '".$id."'";
        if($conn->query($sql) == true){
            echo "xoá câu hỏi thành công";
        }else{
            echo "xoá câu hỏi không thành công";
        }
    } catch (Exception $e) {
        echo "lỗi xoá câu hỏi" .$e;
    }
?>