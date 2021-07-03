<?php 
    var_dump($_POST);
    require_once("../database.php");
    if(isset($_POST['title']) && $_POST['title']!= ""){
        $title = $_POST['title'];
        $description = (isset($_POST['description'])) ?$_POST['description']:"";
        $content = (isset($_POST['content'])) ?$_POST['content']:"";
        $author = (isset($_POST['author'])) ?$_POST['author']:"";

        $query = "insert into news(title, description, content, author) values('$title', '$description', '$content', '$author')";

        if(exe_update($query)){
            // echo "thành công";
            header("Location:../new.php");

        }

        else{
            // echo "lỗi";
            // echo $query ;
            header("Location:insertform.php");
        }
    }else{
        // echo "lỗi";
        header("Location:insertform.php");
    }
?>