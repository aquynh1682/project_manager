<?php
    try{
        include('connect_pdo.php');
        $id = $_POST['id'];
        $question = $_POST['question'];
        $question_a = $_POST['question_a'];
        $question_b = $_POST['question_b'];
        $question_c = $_POST['question_c'];
        $question_d = $_POST['question_d'];
        $answer = $_POST['answer'];
        $mon = $_POST['mon'];

        $sql = "update question ";
        $sql = $sql."set id_mon = '".$mon."',";
        $sql = $sql."question ='".$question."',";
        $sql = $sql."question_a ='".$question_a."',";
        $sql = $sql."question_b ='".$question_b."',";
        $sql = $sql."question_c ='".$question_c."',";
        $sql = $sql."question_d ='".$question_d."',";
        $sql = $sql."answer ='".$answer."'";
        $sql = $sql."where id = '".$id."'";
        if($conn->query($sql) == true){
            echo "cập nhật câu hỏi thành công";
        }else{
            echo "cập nhật câu hỏi không thành công";
        }
    }catch(Exception $e){
        echo "Lỗi" .$e;
    }
?>