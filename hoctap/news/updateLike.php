<?php
    try{
        include('connect_pdo.php');
        $post_id = $_GET['post_id'];
        $like = $_GET['like'];
        $sql = "update comment set `like` = '".$like."' where comment_id='".$post_id."'";
        // $sql = $sql."set name = '".$name."',";
        // $sql = $sql."diaChi ='".$address."',";
        // $sql = $sql."email ='".$email."',";
        // $sql = $sql."phone ='".$phone."'";
        // $sql = $sql."where id ='".$id."'";
        if($conn->query($sql) == true){
            echo "cập nhật câu hỏi thành công";
        }else{
            echo "cập nhật câu hỏi không thành công";
        }
    }catch(Exception $e){
        echo "Lỗi" .$e;
    }
?>