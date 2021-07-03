<?php
    $link = mysqli_connect("localhost", "olirenwm_htht", "123456a@", "olirenwm_htht");
	// Check connection
		if (!$link) {
			die("Connection failed: " . mysqli_connect_error());
		}
	$username = $_POST["userName"];
	$sqlCheckName = "SELECT * FROM user WHERE userName = '$username'";
	$resultName = mysqli_query($link, $sqlCheckName);
	$check = mysqli_fetch_row($resultName);
	if($check){
		echo "Tài khoản này đã đăng ký mời bạn chọn tên đăng nhập khác";
	}else{
		echo "";
	}
	mysqli_close($link);
?>

