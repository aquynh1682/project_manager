<?php
require_once ('dbhelp.php');
    require_once('dbhelp.php');
    include 'connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
     //$user = $_SESSION['user'];

	$s_name = $s_email = $s_phone = $s_userName = '';

	if (!empty($_POST)) {
		$s_id = '';
		if (isset($_POST['name'])) {
			$s_name = $_POST['name'];
		}
		if (isset($_POST['email'])) {
			$s_email = $_POST['email'];
		}
		if (isset($_POST['phone'])) {
			$s_phone = $_POST['phone'];
		}
		if (isset($_POST['userName'])) {
			$s_userName = $_POST['userName'];
		}
		if (isset($_POST['id'])) {
			$s_id = $_POST['id'];
		}

		$s_name = str_replace('\'', '\\\'', $s_name);
		$s_email      = str_replace('\'', '\\\'', $s_email);
		$s_phone  = str_replace('\'', '\\\'', $s_phone);
		$s_userName  = str_replace('\'', '\\\'', $s_userName);
		$s_id       = str_replace('\'', '\\\'', $s_id);

		if ($s_id != '') {
			//update
			$sql = "update user set name = '$s_name', email = '$s_email', phone = '$s_phone', userName = '$s_userName'  where id = " .$s_id;
		} else {
			//insert
			$sql = "insert into user(name, email, phone, userName) value ('$s_name', '$s_email', '$s_phone','$s_userName')";
		}

		// echo $sql;

		execute($sql);

		header('Location: user.php');
		die();
	}

	$id = '';
	if (isset($_GET['id'])) {
		$id          = $_GET['id'];
		$sql         = 'select * from user where id = '.$id;
		$userList = executeResult($sql);
		if ($userList != null && count($userList) > 0) {
			$std        = $userList[0];
			$s_name = $std['name'];
			$s_email      = $std['email'];
			$s_phone  = $std['phone'];
			$s_userName  = $std['userName'];
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

    <link rel="stylesheet" href="style.css">
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
</head>

<body>
    <div id="container">

        <nav id="nav">
            <div class="container">
                <div class="menu">
                    <ul class="root">

                        <div class="logo">
                            <a href="index.php">
                                <img src="anh/logo1.png" url="index.php" alt="">
                            </a>
                        </div>
                        <?php if(isset($user['name'])){?>
                        <li> <a href="userTemplate.php">CHÀO : <?php echo $user['name'] ?></a></li>
                        <li><a href="logout.php"> Đăng Xuất</a></li>

                        <p id="demo"></p>
                        <?php }else { ?>
                        <li><a href="DangNhap.html">ĐĂNG NHẬP</a></li>
                        <li><a href="dangky.html">ĐĂNG KÝ</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add user</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="usr">Name:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="name" value="<?=$s_name?>">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="text" class="form-control" id="email" name="email" value="<?=$s_email?>">
					</div>
					<div class="form-group">
					  <label for="phone">Phone:</label>
					  <input type="text" class="form-control" id="phone" name="phone" value="<?=$s_phone?>">
					</div>
					<div class="form-group">
					  <label for="phone">Nik Name:</label>
					  <input type="text" class="form-control" id="userName" name="userName" value="<?=$s_userName?>">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>