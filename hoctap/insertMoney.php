<?php
    try{
        include('connect_pdo.php');
        $maDon = $_GET['maDon'];
        $user = $_GET['user'];
        $tien = $_GET['tien'];
        $noiDung = $_GET['noiDung'];
        $reply = $_GET['reply'];
        $gdv = $_GET['gdV'];
        $codeBank = $_GET['codeBank'];
        $time = $_GET['time'];
        // $maDon = '16723490485';
        // $user = 'CT2';
        // $tien = '100000000';
        // $noiDung = 'học phí';
        // $reply = '00';
        // $gdv = '13407729';
        // $codeBank = 'NCB';
        // $time = '2020-10-23 21:00:00';

        $sql = "INSERT INTO payments( order_id, thanh_vien, money, note, vnp_response_code, code_vnpay, code_bank, time)";
        $sql = $sql." VALUES ('".$maDon."','".$user."','".$tien."','".$noiDung."','".$reply."','".$gdv."','".$codeBank."','".$time."')";
        if($conn->query($sql) == true){
            echo "cập nhật câu hỏi thành công";
        }else{
            echo "cập nhật câu hỏi không thành công";
        }
    }catch(Exception $e){
        echo "Lỗi" .$e;
    }

    // maDon:maDon,
    // user:user,
    // tien:tien,
    // noiDung:noiDung,
    // reply:reply,
    // gdv:gdv,
    // codeBank:codeBank,
    // time:time,
?>