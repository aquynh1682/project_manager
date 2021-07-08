<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="shortcut icon" href="assets/images/21.png" />
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="./css/stylesregister.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Đăng ký</h3>
			</div>
			<div class="card-body">
                    <div id="error" style="color:red">
						Bạn chưa điền đầy đủ thông tin (Mời bạn nhập lại)
                    </div>
					<div id="errorpass" style="color:red">
						nhập lại mật khẩu không đúng mời bạn nhập lại
                    </div>
					<div id="done" style="color:red">
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-signature"></i></span>
						</div>
						<input type="text" class="form-control" id="name" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" placeholder="Họ và tên" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="user" placeholder="Tài khoản" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="password" pattern="[a-zA-Z0-9!@#$%^&*]{8,}" placeholder="Mật khẩu" required>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="re-password" placeholder="Nhập lại mật khẩu" required>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="text" class="form-control" id="email" pattern="^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$" placeholder="email" required>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
						</div>
						<input type="text" class="form-control" id="address" placeholder="Địa chỉ" required>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-phone"></i></span>
						</div>
						<input type="text" class="form-control" pattern="^(0[2349][0-9]{8}|1[89]00[0-9]{4})$" id="phone" placeholder="Số điện thoại" required>
					</div>
					<div class="form-group">
						<input type="submit" id="btnButton" value="Đăng ký" class="btn float-right login_btn">
					</div>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script>
    $(document).ready(function(){
        $('#btnButton').click(function(){
			$('#errorpass').hide();
			$('#error').hide();
			var name = $('#name').val().trim();
			var user = $('#user').val().trim();
			var password = $('#password').val().trim();
			var repass = $('#re-password').val().trim();
			var email = $('#email').val().trim();
			var address = $('#address').val().trim();
			var phone = $('#phone').val().trim();
			if(name.length == 0 || user.length == 0 || email.length == 0 || address.length == 0 || phone.length == 0 || password.length == 0){
				$('#error').show();
				return;
			}else if(password != repass){
				$('#errorpass').show();
				return;
			}else{
				$.ajax({
					url:"xregister.php",
					type:"post",
					data:{
						name:name,
						user:user,
						password:password,
						repass:repass,
						email:email,
						address:address,
						phone:phone,
					},
					success:function(data){
						$('#done').append(data);
						setInterval(runLink, 5000);
					}
				})
			}
        })
    })
	function runLink(){
		window.location.href = "login.php";
	}
	function load(){
		$('#errorpass').hide();
		$('#error').hide();
	}
	window.load = load();
</script>
</html>