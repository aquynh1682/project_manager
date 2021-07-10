<?php
		$error = array ();
		$data = array ();
		// Code PHP upload file
		$target_dir = "./uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		
		// // Kiểm tra file có phải là hình hay giả mạo
		// $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		// if ($check !== false) {
		// 	$uploadOk = 1;
		// }
		// else {
		// 	$error["image"] = "File không phải là hình.";
		// 	$uploadOk = 0;
		// }
		// Kiểm tra file đã tồn chưa
		if (file_exists($target_file)) {
			$error["image"] = "Lổi, file đã tồn tại trên thư mục images rồi";
			$uploadOk = 0;
		}
		// kiểm tra kích thước file khi upload lên
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			$error["image"] = "Lổi, kích thước file quá lớn";
			$uploadOk = 0;
		}
		// Kiểm tra phần mở rộng của file
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			$error["image"] = "Lổi, chỉ cho phép file có phần mở rộng là JPG, JPEG, PNG & GIF.";
			$uploadOk = 0;
		}
		
		// Kiểm tra nếu $uploadOk là 0 có nghĩa đã có lổi và không upload được
		if ($uploadOk != 0) {
			if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$error["image"] = "Xin lổi, đã xảy ra lổi trong khi upload file.";
			}
			else {
				$data['image'] = basename($_FILES["fileToUpload"]["name"]);
			}
		}
        if (!$error) {
        $data["createdate"] = date("Y-m-d H:i:s");
        $this->insert("posts", $data);
        $error["note"] = "Thêm bài viết thành công";
        header('Location:upNews.php');
        die();
		}
		else {
			$error["note"] = "Thêm bài viết thất bại";
		}
		
		// Trả về $error để thông báo lổi nếu có
		$message[0] = $error;
		$message[1] = $data;
?>