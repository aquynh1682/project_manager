<?php
    try{
        include('connect_pdo.php');
        $userName = $_POST['name'];
        $email = $_POST['email'];
        $noiDung = $_POST['content'];
        $date = $_POST['dateTime'];
        $sql = "insert into comment(userName, email, noiDung, dateTime)";
        $sql = $sql."values('".$userName."','".$email."','".$noiDung."','".$date."')";
        if($conn->query($sql) == true){
            echo "thêm câu hỏi thành công";
        }else{
            echo "Không thêm được câu hỏi";
        }
    }catch(Exception $e){
        echo "Lỗi" .$e;
    }
?>