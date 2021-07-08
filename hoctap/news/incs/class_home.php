<?php
class homelib extends dblib{
    function login() {
		$error = array();
		$data = array();
		
		// Lấy dữ liệu
		$data ['username'] = isset ( $_POST ['username'] ) ? $_POST ['username'] : '';
		$data ['password'] = isset ( $_POST ['password'] ) ? $_POST ['password'] : '';
		
		// Kiểm tra dữ liệu
		if (empty($data ['username'])) {
			$error['username'] = 'Bạn chưa nhập tên';
		}
		
		if (empty($data ['password'])) {
			$error['password'] = 'Bạn chưa nhập password';
		}
		
		// Kiểm tra nếu không có lổi thì Lưu dữ liệu
		if (!$error) {
			
			$username = $data ['username'];
			// Mã hóa password bằng MD5 để bảo mật mật khẩu
			$password = md5($data ['password']);
			
			// SQL: hàm count(*) dùng để đếm tổng số dữ liệu được tìm thấy
			$sql = "SELECT count(*) FROM user WHERE user = '$username' AND password = '$password' LIMIT 1";
			session_start();
			// Gọi hàm get_row() từ class_db.php để lấy dữ liệu trả về cho biến $result
			$result = $this->get_row($sql);
			
			if ($result > 0) {
				// Tạo thông báo
				$error['message'] = "Đăng nhập thành công";
				
				// Lưu thông tin user vào cookie để không đăng nhập lần nữa, cookie sẽ có thời hạn 24h
				$_SESSION['user'] = $data;
				
			}
			else {
				// Tạo thông báo
				$error['message'] = "username hoặc password không đúng!";
			}
		}
		
		// Trả về $error để thông báo
		$message[0] = $error;
		$message[1] = $data;
		
		return $message;
	}
}
?>