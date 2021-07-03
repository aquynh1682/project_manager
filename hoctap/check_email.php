<?php
    $link = mysqli_connect("localhost", "olirenwm_htht", "123456a@", "olirenwm_htht");
	// Check connection
		if (!$link) {
			die("Connection failed: " . mysqli_connect_error());
		}
    $email = $_POST["email"];
    $sqlCheckEmail = "SELECT * FROM user WHERE email = '$email'";
    $resultCheck = mysqli_query($link, $sqlCheckEmail);
    $check = mysqli_fetch_row($resultCheck);
    if($check){
        echo "true";
    }else{
        echo "false";
    }
	mysqli_close($link);
?>