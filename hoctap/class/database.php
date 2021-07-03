<?php
include("config.php");
function db_connect(){
    global $dbserver;
    global $username;
    global $password;
    global $database;
    $conn = mysqli_connect($dbserver,$username,$password,$database) or die ("khong et noi database");

    mysqli_query($conn, "set names 'utf8'");
    return $conn;
}


function exe_query($query){
    $conn = db_connect();
    $rows = mysqli_query($conn, $query);
    $array = [];
    if(mysqli_num_rows($rows)){
        while($r = mysqli_fetch_array($rows)){
            $array[] = $r;
        }
        return $array;
    }else {
        return $array;
    }
}

function exe_update($query){
    $conn = db_connect();
    if(mysqli_query( $conn ,$query))
        return true;
    return false;
}

function getNews($limit=10, $offset=0){
    $query = "select * from news order by id desc limit $offset, $limit";
    return exe_query($query);
}

function getNewById($id){
    $query = "select * from news where id = $id ";
    return exe_query($query);
}

?>