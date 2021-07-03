<?php
    try{
        include('connect_pdo.php');
        $question = $_POST['question'];
        $question_a = $_POST['question_a'];
        $question_b = $_POST['question_b'];
        $question_c = $_POST['question_c'];
        $question_d = $_POST['question_d'];
        $answer = $_POST['answer'];
        $mon = $_POST['mon'];
    
        $sql = "insert into question(id_mon, question, question_a, question_b, question_c, question_d, answer)";
        $sql = $sql."values('".$mon."','".$question."','".$question_a."','".$question_b."','".$question_c."','".$question_d."','".$answer."')";
        if($conn->query($sql) == true){
            echo "thêm câu hỏi thành công";
        }else{
            echo "Không thêm được câu hỏi";
        }
    }catch(Exception $e){
        echo "Lỗi" .$e;
    }
?>