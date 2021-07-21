<?php
require_once ('dbnew.php');
require_once('dbnew.php');
    include '../connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
    //$user = $_SESSION['user'];

    $s_title = $s_content = $s_author = $s_status = $s_description = '';

    if (!empty($_POST)) {
        $s_id = '';
        if (isset($_POST['title'])) {
            $s_title = $_POST['title'];
        }
        if (isset($_POST['content'])) {
            $s_content = $_POST['content'];
        }
        if (isset($_POST['description'])) {
            $s_description = $_POST['description'];
        }
        if (isset($_POST['author'])) {
            $s_author = $_POST['author'];
        }
        if (isset($_POST['status'])) {
            $s_status = $_POST['status'];
        }
        if (isset($_POST['id'])) {
            $s_id = $_POST['id'];
        }
        $s_title = str_replace('\'', '\\\'', $s_title);
        $s_content      = str_replace('\'', '\\\'', $s_content);
        $s_author  = str_replace('\'', '\\\'', $s_author);
        $s_description  = str_replace('\'', '\\\'', $s_description);
        $s_status  = str_replace('\'', '\\\'', $s_status);
        $s_id       = str_replace('\'', '\\\'', $s_id);
        if ($s_id != '') {
            //update
            $sql = "update news set title = '$s_title', content = '$s_content',  description = '$s_description', author = '$s_author', status = '$s_status'  where id = " .$s_id;
        } else {
            //insert
            $sql = "insert into news(title, content, description, author, status) value ('$s_title', '$s_content', '$s_description', '$s_author','$s_status')";
        }
        // echo $sql;
        execute($sql);
        header('Location: newindex.php');
        die();
    }
    $id = '';
    if (isset($_GET['id'])) {
        $id          = $_GET['id'];
        $sql         = 'select * from news where id = '.$id;
        $newList = executeResult($sql);
        if ($newList != null && count($newList) > 0) {
            $std        = $newList[0];
            $s_title = $std['title'];
            $s_content      = $std['content'];
            $s_author  = $std['author'];
            $s_description  = $std['description'];
            $s_status  = $std['status'];
        } else {
            $id = '';
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hỗ trợ học tập - đào tạo nhân tài quốc gia</title>
    <!-- <script src="jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700,800,900&amp;display=swap">

    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>

<body>
    <div id="container">

        <nav id="nav">
            <div class="container">
                <div class="menu">
                    <ul class="root">

                        <div class="logo">
                            <a href="index.php">
                                <img src="../anh/logo1.png" url="index.php" alt="">
                            </a>
                        </div>
                        <?php if(isset($user['name'])){?>
                        <li> <a href="../userTemplate.php">CHÀO : <?php echo $user['name'] ?></a></li>
                        <li><a href="../logout.php"> Đăng Xuất</a></li>

                        <p id="demo"></p>
                        <?php }else { ?>
                        <li><a href="../DangNhap.html">ĐĂNG NHẬP</a></li>
                        <li><a href="../dangky.html">ĐĂNG KÝ</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Add News</h2>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <form method="post" action="newinput.php">
                            <div class="form-group">
                                <label for="usr">Title:</label>
                                <input type="number" name="id" value="<?=$id?>" style="display: none;">
                                <div>
                                    <textarea class="form-control" name="title" required id="editor2"
                                        value="<?=$s_title?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <div>
                                    <textarea class="form-control" name="description" required id="editor1"
                                        value="<?=$s_description?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Content:</label>
                                <div>
                                    <textarea class="form-control" name="content" required id="editor3"
                                        value="<?=$s_content?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Author:</label>
                                <input type="text" class="form-control" id="author" name="author"
                                    value="<?=$s_author?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Status:</label>
                                <input type="text" class="form-control" id="status" name="status"
                                    value="<?=$s_status?>">
                            </div>
                            <button class="btn btn-success">Save</button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
        <script>
        CKEDITOR.replace('editor1', 'title');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        </script>
</body>

</html>