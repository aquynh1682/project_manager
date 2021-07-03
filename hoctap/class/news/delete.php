<?php
require_once("../database.php");
if(isset($_GET['id']) && $_GET['id']!= ""){
    $id = (int) $_GET['id'];
    $query = "delete from news where id = $id";
    if(exe_update($query)){
        header("Location:../quanlytintuc.php");
    }else{
        echo "lỗi";
        echo $query ;
        // echo "lỗi";
    }
}else{
    header("Location:../quanlytintuc.php");
}
echo "delete action";
$_GET['id'];


?>