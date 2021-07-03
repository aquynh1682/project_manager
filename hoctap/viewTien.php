<?php 
    include('connect_pdo.php');
    $id = $_POST['id'];
    $sql = $conn->prepare("SELECT * FROM payments WHERE thanh_vien = ".$id." ");
    $sql->execute();
    $index = 1;
    $data ='';
    while($result = $sql->fetch(PDO::FETCH_ASSOC)){
        if($result['vnp_response_code'] == '00'){
            $data .='<tr>';
            $data .=    '<td class="text-center">';
            $data .=        '<i class="fas fa-money-bill"></i>';
            $data .=    '</td>';
            $data .=    '<td> Mã Đơn: '.$result['order_id'].' </td>';
            $data .=    '<td> Tiền:'.$result['money'].'</td>';
            $data .=    '<td> Ngày Nạp:'.$result['time'].'</td>';
            $data .='</tr>';
        }
        // $data = $result['diem'];
    }
    echo $data;
?>