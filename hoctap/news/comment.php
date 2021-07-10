<?php
    try{
        include('connect_pdo.php');
        $text = $_GET['text'];
        $id_user = $_GET['id_user'];
        $id_post = $_GET['id_post'];
        $datetime = $_GET['dateTime'];

        $sql = "insert into comment(user_id, post_id, comment, date)";
        $sql = $sql."values('".$id_user."', '".$id_post."','".$text."','".$datetime."')";
        if($conn->query($sql) == true){
            echo "cập nhật câu hỏi thành công";
        }else{
            echo "cập nhật câu hỏi không thành công";
        }
    }catch(Exception $e){
        echo "Lỗi" .$e;
    }
?>