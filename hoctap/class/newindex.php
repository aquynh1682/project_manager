<?php
require_once ('dbnew.php');
include '../connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hỗ trợ học tập - đào tạo nhân tài quốc gia</title>
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
                            <a href="../index.php">
                                <img src="../anh/logo1.png" url="../index.php" alt="">
                            </a>
                        </div>
                        <?php if(isset($user['name'])){?>
                        <li> <a href="../userTemplate.php">CHÀO : <?php echo $user['name'] ?></a></li>
                        <li><a href="../logout.php"> Đăng Xuất</a></li>

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
                    Quản lý thông tin News
                    <form method="get">
                        <input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
                            placeholder="Tìm kiếm theo tên">
                    </form>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Title</th>
                                <th>author</th>
                                <th>status</th>
                                <th width="60px"></th>
                                <th width="60px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
if (isset($_GET['s']) && $_GET['s'] != '') {
	$sql = 'select * from news where title like "%'.$_GET['s'].'%"';
} else {
	$sql = 'select * from news';
}

$newList = executeResult($sql);

$index = 1;
foreach ($newList as $std) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$std['title'].'</td>
            <td>'.$std['author'].'</td>
			<td>'.$std['status'].'</td>
			<td><button class="btn btn-warning" onclick=\'window.open("newinput.php?id='.$std['id'].'","_self")\'>Edit</button></td>
			<td><button class="btn btn-danger" onclick="deleteNew('.$std['id'].')">Delete</button></td>
		</tr>';
}
?>
                        </tbody>
                    </table>
                    <button class="btn btn-success" onclick="window.open('newinput.php', '_self')">Add News</button>
                    <button class="btn btn-success" onclick="window.open('../index.php', '_self')">Home</button>
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="container-fluid bg-grey" style="background: dimgray; color: snow;">
        <h2 class="text-center">CONTACT</h2>
        <div class="row">
            <div class="col-sm-5">
                <p>Liên hệ với chúng tôi và chúng tôi sẽ liên hệ lại với bạn trong vòng 24 giờ.</p>
                <p><span class="glyphicon glyphicon-map-marker"></span>Phenikaa University, Yên Nghĩa - Hà Đông - Hà
                    Nội.</p>
                <p><span class="glyphicon glyphicon-phone"></span> +84 942 187 996</p>
                <p><span class="glyphicon glyphicon-envelope"></span> HoTro@k12htht.xyz</p>
            </div>
            <div class="col-sm-7 slideanim">
                <form action="https://formsubmit.co/trans1782@gmail.com" method="POST">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email"
                                required>
                        </div>
                    </div>
                    <input type="hidden" name="_next" value="http://localhost/hoctap/thankyou.html">
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment"
                        rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit">Send</button>
                        </div>
                    </div>
                </form>
                <?php
                        $result="";
                        if (isset($_POST['submit'])) {
                            require 'phpmailer/PHPMailerAutoload.php';
                            $mail = new PHPMailer();
                            // $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 587;
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = 'tls';
                            $mail->Username = 'trans1782@gmail.com';
                            $mail->Password = 'Sonha123456789';
                            $mail->setFrom($_POST['email'],$_POST['name']);
                            $mail->addAddress('son.tn18010148@st.phenikaa-uni.edu.vn');
                            $mail->addReplyTo($_POST['email'],$_POST['name']);
                            $mail->isHTML(true);
                            $mail->Subject = 'Form Submission: '.$_POST['subject'];
                            $mail->Body = '<h1 alight=center> Name : '.$_POST['name'].'<br>Email : '.$_POST['email'].'<br>Message: '.$_POST['msg'].'</h1>';
                            if(!$mail->send()){
                                $result="Something went wrong. Please try again.";
                            }else{
                                $result="Thank".$_POST['name']."for contacting us. Well get back to you soon!";
                            }
                        }
                ?>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();
                // Store hash
                var hash = this.hash;
                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top

                }, 900, function() {
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
        $(window).scroll(function() {
            $(".slideanim").each(function() {
                var pos = $(this).offset().top;
                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
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
    <!-- xoa tin tuc -->
    <script type="text/javascript">
    function deleteNew(id) {
        option = confirm('Bạn có muốn xoá tin tức này không')
        if (!option) {
            return;
        }

        console.log(id)
        $.post('delete_new.php', {
            'id': id
        }, function(data) {
            alert(data)
            location.reload()
        })
    }
    </script>
</body>

</html>