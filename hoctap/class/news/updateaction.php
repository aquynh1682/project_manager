<?php 
    var_dump($_POST);
    require_once("../database.php");
    if(isset($_POST["id"]) && $_POST["id"]!="" && isset($_POST['title']) && $_POST['title']!= ""){
        $id = $_POST["id"];
        $title = $_POST['title'];
        $description = (isset($_POST['description'])) ?$_POST['description']:"";
        $content = (isset($_POST['content'])) ?$_POST['content']:"";
        $author = (isset($_POST['author'])) ?$_POST['author']:"";

        $query = "update news set title='$title', description='$description', content='$content', author='$author' where id = $id";

        if(exe_update($query)){
            echo "thành công";
            header("Location:../quanlytintuc.php");

        }

        else{
            // echo "lỗi";
            // echo $query ;
            header("Location:updateform.php");
        }
    }else{
        // echo "lỗi";
        header("Location:updateform.php");
    }
?>