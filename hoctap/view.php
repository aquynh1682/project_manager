<?php 
    include('connect_pdo.php');
    $search = $_GET['search'];
    $page = $_GET['page'];
    $sql = $conn->prepare("SELECT * FROM question WHERE question LIKE '%".$search."%' ORDER BY ID DESC LIMIT 20 OFFSET ".($page-1)*20);
    $sql->execute();
    $index = 1;
    $data ='';
    while($result = $sql->fetch(PDO::FETCH_ASSOC)){
        $sql_id = $conn-> prepare("SELECT * FROM monhoc WHERE id_mon = ".$result['id_mon']." ");
        $sql_id->execute();
        while($idMon = $sql_id->fetch(PDO::FETCH_ASSOC)){
            $data.= '<tr id='.$result['id'].'>';
            $data.=  '<th scope="row">'.($index++).'</th>';
            $data.=  '<td class="text-primary col-lg-9">'.$result['question']."</td>";
            $data.=  '<td class="text-primary col-lg-1">'.$idMon['tenMon']."</td>";
            $data.=  '<td class="col-lg-2">';
            $data.=      '<input type="button" class = "btn btn-xs btn-info" value="Xem" name="view"> &nbsp;';
            $data.=      '<input type="button" class = "btn btn-xs btn-warning" value="Sửa" name = "update"> &nbsp;';
            $data.=      '<input type="button" class = "btn btn-xs btn-danger" value="Xoá" name = "delete"> &nbsp;';
            $data.=  '</td>';
            $data.= '</tr>';
        }
    }
    echo $data;
?>