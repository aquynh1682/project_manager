 <?php
    include '../connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
     //$user = $_SESSION['user'];
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hỗ trợ học tập - đào tạo nhân tài quốc gia</title>
    <!-- <script src="jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700,800,900&amp;display=swap">

    <!-- <link rel="stylesheet" href="../styleclass.css"> -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../FameLogin.css">
    <link rel="stylesheet" href="../.css">


</head>

<body>

    <?php include("../class/header.php"); ?>
    <!-- Start Menu -->


    <div class="row justify-content-center">
        <form class="form" action="login.php" method="POST" id="loginForm">
            <div class="feature">
                <h1>Đăng Nhập</h1>
                <div class="has-error">
                    <span id="label"></span>
                </div>
                <div class="form-field">
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Username" id="userName" name="userName">

                </div>
                <div class="form-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="password" id="password" name="password">
                </div>
                <button id="btn">Đăng Nhập</button>
                <h4>chưa có tài khoản thì nhấn vào: <a href="dangky.html">đây</a></h4>
            </div>
        </form>
    </div>
    <!------------------------------------->

    <?php include("../class/footer.php"); ?>

    <script>
        //lay vi tri hien tai cua menu cach top x px
        pos = $("#nav").position();

        $(window).scroll(function() {
            var posScroll = $(Document).scrollTop();
            if (parseInt(posScroll) > parseInt(pos.top)) {
                $("#nav").addClass('fixed');
            } else {
                $("#nav").removeClass('fixed');
            }
        });
    </script>
</body>

</html>