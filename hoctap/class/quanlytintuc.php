<?php require_once("database.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hỗ trợ học tập - đào tạo nhân tài quốc gia</title>
    <!-- <script src="jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700,800,900&amp;display=swap">

    <link rel="stylesheet" href="styleclassdangnhap.css">
    <link rel="stylesheet" href="../style.css">

    <script src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700,800,900&amp;display=swap">

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
    <div id="container" style="height: 50px;">
        <div id="header">
            <div class="container">
                <div class="logo">
                    <!--
                        <a href="index.html">K12</p></a>
                        -->
                    <a href="../index.php">
                        <img src="../anh/logo1.png" url="../index.php" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Menu -->

    <nav id="nav">
        <div class="container">
            <div class="menu">
                <ul class="root">
                    <li><a href="../index.php">Trang Chủ</a> <a href="news/insertform.php">Thêm Tin Tức</a> </li>
                </ul>
                <div class="form-search" style="margin-top: 5px;">
                            <input class="td-widget-search-input" placeholder="Nhập từ khóa để tìm kiếm..." type="text"
                                value="" name="s" id="s"
                                style="width: 200px;height: 40px;border-radius: 10px;border: 1px solid #999;">
                            <input class="wpb_button wpb_btn-inverse btn" type="submit" id="searchsubmit"
                                value="Tìm kiếm" style="height: 40px;border: 1px solid #999;">
                        </div>
            </div>
        </div>
    </nav>
    <div class="main">
        <div class="left"></div>
        <div class="center" style="padding: 0px;">
            <section>
                <?php 
            $news = getNews(10);
            if(!empty($news)):
        ?>
                <table border=1 padding=15px>
                    <tr>
                        <th width="50px">Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Tác giả</th>
                        <th></th>
                    </tr>
                    <?php foreach($news as $n): ?>
                    <tr>
                        <td><?php echo $n['title'] ?></td>
                        <td><?php echo $n['description'] ?></td>
                        <td><?php echo $n['author'] ?></td>
                        <td style="width:70px; text-align:center;">
                            <button><a href="news/insertform.php?id=<?php echo $n['id'] ?>"
                                    style="text-decoration: none;">thêm</a> </button>
                            <button><a href="news/updateform.php?id=<?php echo $n['id'] ?>"
                                    style="text-decoration: none;">cập nhật</a> </button>
                            <button><a href="news/delete.php?id=<?php echo $n['id'] ?>"
                                    style="text-decoration: none;">xóa</a> </button>
                        </td>
                    </tr>
                    <?php endforeach ; ?>
                </table>
                <?php else: ?>
                <h3>Bìa viết không tồn tại</h3>
                <?php endif; ?>
            </section>

            <!-- <?php
    include 'connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
     //$user = $_SESSION['user'];
?>  -->
        </div>
        <!-- <div class="right">
            <h3>Môn Học</h3>
            <ul>
                <li><a href="math.php">Toán Học</a></li>
                <li><a href="vatly.php">Vật Lý</a></li>
                <li><a href="dialy.php">Địa Lý</a></li>
                <li><a href="english.php">Tiếng Anh</a></li>
                <li><a href="tonghop.php">Tổng Hợp</a></li>
                <li><a href="khoahocxahoi.php">Khoa Học Xã Hội</a></li>
                <li><a href="sinhhoc.php">Sinh Học</a></li>
                <li><a href="history.php">Lịch Sử</a></li>
                <li><a href="hoahoc.php">Hóa Học</a></li>

            </ul>
        </div> -->

    </div>
    <!------------------------------------->


    <div id="contact" class="container-fluid bg-grey"
        style="background: dimgray; color: snow;  position:absolute; width: 100%;">
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
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment"
                    rows="5"></textarea><br>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
