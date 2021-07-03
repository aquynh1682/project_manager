<?php 
    include('connect_pdo.php');
    $id = $_POST['id'];

    $sql = $conn->prepare("SELECT * FROM savediem WHERE id_user = ".$id." ");
    $sql->execute();
    $index = 1;
    $data ='';

    while($result = $sql->fetch(PDO::FETCH_ASSOC)){
        $sqlMon = $conn->prepare("SELECT * FROM monhoc WHERE id_mon = ".$result['id_mon']." ");
        $sqlMon->execute();
        $convert = $sqlMon->fetch(PDO::FETCH_ASSOC);
        $data .='<tr>';
        $data .=    '<td class="text-center">';
        $data .=        '<i class="fa fa-check"></i>';
        $data .=    '</td>';
        $data .=    '<td> Môn: '.$convert['tenMon'].' </td>';
        $data .=    '<td> Điểm:'.$result['diem'].'</td>';
        $data .=    '<td> Ngày Thi:'.$result['time'].'</td>';
        $data .='</tr>';
        // $data = $result['diem'];
    }
    echo $data;
?>