<?php
    include 'connect.php';
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
    <script src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700,800,900&amp;display=swap">
        
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="../FameLogin.css"> -->
    <!-- <link rel="stylesheet" href="stylenoidung.idjflaskdjflkasjdfcss"> -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

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
    <link rel="shortcut icon" href="./news/assets/images/21.png" />
</head>

<body>
    <div id="container">
        <!-- <div id="header">
            <div class="container">

            </div>
        </div> -->
        <!-- Start Menu -->

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
                            <li><a href="userTemplate.php">CHÀO : <?php echo $user['name'] ?></a></li>
                            <li><a href="logout.php">ĐĂNG XUẤT</a></li>
                        <?php }else { ?>
                            <li><a href="DangNhap.html">ĐĂNG NHẬP</a></li>
                            <li><a href="dangky.html">ĐĂNG KÝ</a></li>
                        <?php } ?>
                        <li> <a href="goiY.html">GÓP Ý</a> </li>

                        <li> <a href="./news/news.php">TIN TỨC</a> </li>
                        <li> <a href="QA.php">Q&A</a> </li>
                        <li> <a href="help.html">HƯỚNG DẪN</a> </li>

                        <!-- <div class="form-search" style="margin-top: 5px;">
                            <input class="td-widget-search-input" placeholder="Nhập từ khóa để tìm kiếm..." type="text"
                                value="" name="s" id="s"
                                style="width: 200px;height: 40px;border-radius: 10px;border: 1px solid #999;">
                            <input class="wpb_button wpb_btn-inverse btn" type="submit" id="searchsubmit"
                                value="Tìm kiếm" style="height: 40px;border: 1px solid #999;">
                        </div> -->
                    </ul>
                </div>
            </div>
        </nav>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="anh/banner1.jpg" alt="Los Angeles" style="width:100%; height:70%">
                </div>

                <div class="item">
                    <img src="anh/banner2.jpg" alt="Chicago" style="width:100%; height:70%">
                </div>

                <div class="item">
                    <img src="anh/banner5.jpg" alt="New york" style="width:100%; height:70%">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- End Menu , start Noi Dung-->
    <?php if(!isset($user['name'])){?>
    <div id="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h2>Giới thiệu về Trang</h2><br>
                <h4>Hiện nay học và thi trắc nghiệm ở cấp THPT đang ngày càng thể hiện được nhiều những ưu điểm. Kết quả
                    thi trắc nghiệm khách quan ngoài việc định lượng để đánh giá năng lực học tập của học sinh còn là cơ
                    sở quan trọng để các trường đại học tuyển sinh. Trong thời đại công nghệ 4.0 phát triển ngày càng
                    mạnh mẽ, với sự hỗ trợ của&nbsp;các thiết bị công nghệ mới tiên tiến, thông minh vào dạy, học,
                    thi....</h4><br>
                <p>Với học sinh THPT chỉ có một vài kỳ thi mang tính quyết định đến việc đậu tốt nghiệp, đại học. Để có
                    được kết quả tốt ngoài việc chịu khó học tập, học thầy, học bạn rồi tăng cường tự học ra thì việc
                    rất quan trọng nữa đó là phải được thi thử nhiều lần. Thi online, thi trắc nghiệm online sẽ giúp các
                    em làm được điều đó. Nếu không sử dụng các phần mềm tin học, các website thi online thì giáo viên
                    gặp khó trong biên soạn đề thi theo mong muốn phù hợp đối tượng người học, còn học sinh gặp khó
                    trong việc có nhiều đề để thi và được đánh giá chính xác, khách quan trong thời gian nhanh nhất. Hơn
                    nữa việc một giáo viên soạn được một đề chất lượng với các câu hỏi theo nhiều mức độ nhận thức mong
                    muốn là điều rất khó. Học sinh ham thi, muốn thử sức mình nhiều hơn thì thiếu đề. Giáo viên muốn có
                    nhiều đề cho học sinh thi thì thiếu thời gian, thiếu ngân hàng đề để lựa chọn… Tất cả các khó khăn
                    nêu trên của giáo viên và học sinh sẽ dễ dàng được giải quyết khi đến với http://k12htht.xyz/.
                    Giúp đỡ người dạy và người học, khuyến khích tự học, tự kiểm tra đánh giá để hoàn thiện bản thân –
                    website http://k12htht.xyz/ ra đời với tôn chỉ hoạt động như vậy.</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-signal logo" style="margin-top: 15%;"></span>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-globe logo slideanim" style="margin-top: 15%;"></span>
            </div>
            <div class="col-sm-8">
                <h2>Giá trị của chúng tôi</h2><br>
                <strong>SỨ MỆNH:</strong> <h4>Không như nhiều website khác chỉ tập trung vào một hay vài môn học,
                    http://12htht.xyz/ sẽ cho bạn được thi online miễn phí tất cả các môn thi tốt nghiệp &lpar;trừ môn
                    Ngữ văn&rpar; đó là Toán, Lý, Hóa, Sinh, Sử, Địa, GDCD.Website http://12htht.xyz/ giúp giáo viên
                    thống kê kết quả học tập, thi cử của từng học sinh, từng nhóm học sinh. Ngoài ra giáo viên dễ dàng
                    xuất kết quả thi của nhóm, lớp ra file exel để tiện sử dụng. Hơn nữa các thầy cô ở các trường khác
                    nhau hoàn toàn có thể cho học sinh thi giao lưu, lấy kết quả để so sánh năng lực của các em từ đó có
                    kế hoạch dạy học về sau.</h4><br>
               <strong>TẦM NHÌN:</strong> <p> Rất mong một tương lai tốt đẹp sẽ chờ đón các em học sinh nếu các em học
                    tập, luyện thi tốt. Rất hy vọng các thầy cô, các em học sinh truy cập website và sẽ thu được những
                    kết quả dạy, học tích cực. Và chúng tôi rất mong nhận được những góp ý, những đề xuất từ phía thầy
                    cô, các em học sinh để hoàn thiện website ngày một tốt hơn. Trân trọng!</p>
            </div>
        </div>
    </div>

    <h2 style="text-align: center;">Mọi người nói gì về chúng tôi !</h2>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <h4>"Từ khi biết đến trang web này em tự tin mình có thể vào bất cứ trường đại học nào mình mong muốn"<br><span>Em học sinh Trần Ngọc S</span></h4>
            </div>
            <div class="item">
                <h4>"Trang web thực sự có giao diện rất ổn và phù hợp với việc ôn thi cho các em học sinh"<br><span>Phụ huynh em Trần Đình D</span></h4>
            </div>
            <div class="item">
                <h4>"Trang web còn thiếu một vài chức năng nhưng tôi tin tương lai trang web có thể phát triển nhiều hơn"<br><span>Ẩn Danh</span>
                </h4>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php }else{?>
    <div id="contact" class="container-fluid bg-grey">
        <div id="feature">
            <div class="container">
                <div class="feature-left">
                    <!-- ghi noi dung-->
                    <h2 class="feature-title"></h2>
                    <p class="desc"></p>
                    <div class="card">
                        <div class="icon">
                            <?php if(isset($user['access'])){ ?>
                            <?php if($user['access']==0) { ?>

                                <a href="update.php"> <img src="anh/math.png" url="class/history.php" alt=""> </a>
                            <?php }else if($user['access']==1) {?>
                                <a href="lamBai.php?id=0"> <img src="anh/math.png" url="class/history.php" alt=""></a>
                            <?php } }?>
                        </div>
                        <div class="font">
                            <p class="font-title">
                            <?php if(isset($user['access'])){?>
                                <?php if($user['access']==0) {?>
                                    <a href="update.php" onmouseenter="this.style.backgroundColor='gray' "
                                        onmouseleave="this.style.backgroundColor=''">Toán</a>
                                <?php }else if($user['access']==1) {?>
                                    <a href="lamBai.php?id=0" onmouseenter="this.style.backgroundColor='gray' "
                                    onmouseleave="this.style.backgroundColor=''">Toán</a>
                                <?php } }?>
                            </p>
                            <!-- <p>Writing research papers is an inevitable </p> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <?php if(isset($user['access'])){ ?>
                            <?php if($user['access']==0) { ?>

                                <a href="update.php"> <img src="anh/vatly.png" url="class/history.php" alt=""> </a>
                            <?php }else if($user['access']=='1') {?>
                                <a href="lamBai.php?id=2"> <img src="anh/vatly.png" url="class/history.php" alt=""></a>
                            <?php } }?>
                        </div>
                        <div class="font">
                            <p class="font-title">
                            <?php if(isset($user['access'])){?>
                                <?php if($user['access']==0) {?>
                                    <a href="update.php" onmouseenter="this.style.backgroundColor='gray' "
                                        onmouseleave="this.style.backgroundColor=''">Vật Lý </a>
                                <?php }else if($user['access']==1) {?>
                                    <a href="lamBai.php?id=2" onmouseenter="this.style.backgroundColor='gray' "
                                    onmouseleave="this.style.backgroundColor=''">Vật Lý</a>
                                <?php } }?>
                            </p>
                            <!-- <p>Writing research papers is an inevitable </p> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <?php if(isset($user['access'])){ ?>
                            <?php if($user['access']==0) { ?>

                                <a href="update.php"> <img src="anh/hoahoc.png" url="class/history.php" alt=""> </a>
                            <?php }else if($user['access']==1) {?>
                                <a href="lamBai.php?id=3"> <img src="anh/hoahoc.png" url="class/history.php" alt=""></a>
                            <?php } }?>
                        </div>
                        <div class="font">
                            <p class="font-title">
                            <?php if(isset($user['access'])){?>
                                <?php if($user['access']==0) {?>
                                    <a href="update.php" onmouseenter="this.style.backgroundColor='gray' "
                                        onmouseleave="this.style.backgroundColor=''">Hoá Học</a>
                                <?php }else if($user['access']==1) {?>
                                    <a href="lamBai.php?id=3" onmouseenter="this.style.backgroundColor='gray' "
                                    onmouseleave="this.style.backgroundColor=''">Hoá Học</a>
                                <?php } }?>
                            </p>
                            <!-- <p>Writing research papers is an inevitable</p> -->
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <?php if(isset($user['access'])){ ?>
                            <?php if($user['access']==0) { ?>

                                <a href="update.php"> <img src="anh/sinhhoc.png" url="class/history.php" alt=""> </a>
                            <?php }else if($user['access']==1) {?>
                                <a href="lamBai.php?id=4"> <img src="anh/sinhhoc.png" url="class/history.php" alt=""></a>
                            <?php } }?>
                        </div>
                        <div class="font">
                            <p class="font-title">
                            <?php if(isset($user['access'])){?>
                                <?php if($user['access']==0) {?>
                                    <a href="update.php" onmouseenter="this.style.backgroundColor='gray' "
                                        onmouseleave="this.style.backgroundColor=''">Sinh Học</a>
                                <?php }else if($user['access']==1) {?>
                                    <a href="lamBai.php?id=4" onmouseenter="this.style.backgroundColor='gray' "
                                    onmouseleave="this.style.backgroundColor=''">Sinh học</a>
                                <?php } }?>
                            </p>
                            <!-- <p>Writing research papers is an inevitable</p> -->
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <?php if(isset($user['access'])){ ?>
                            <?php if($user['access']==0) { ?>

                                <a href="update.php"> <img src="anh/history.png" url="class/history.php" alt=""> </a>
                            <?php }else if($user['access']==1) {?>
                                <a href="lamBai.php?id=1"> <img src="anh/history.png" url="class/history.php" alt=""></a>
                            <?php } }?>
                        </div>
                        <div class="font">
                            <p class="font-title">
                                <?php if(isset($user['access'])){?>
                                <?php if($user['access']==0) {?>
                                    <a href="update.php" onmouseenter="this.style.backgroundColor='gray' "
                                        onmouseleave="this.style.backgroundColor=''">Lịch Sử</a>
                                <?php }else if($user['access']==1) {?>
                                    <a href="lamBai.php?id=1" onmouseenter="this.style.backgroundColor='gray' "
                                    onmouseleave="this.style.backgroundColor=''">Lịch Sử</a>
                                <?php } }?>
                            </p>
                            <!-- <p>Writing research papers is an inevitable </p> -->
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <?php if(isset($user['access'])){ ?>
                            <?php if($user['access']==0) { ?>

                                <a href="update.php"> <img src="anh/dialy.png" url="class/history.php" alt=""> </a>
                            <?php }else if($user['access']==1) {?>
                                <a href="lamBai.php?id=5"> <img src="anh/dialy.png" url="class/history.php" alt=""></a>
                            <?php } }?>
                        </div>
                        <div class="font">
                            <p class="font-title">
                            <?php if(isset($user['access'])){?>
                                <?php if($user['access']==0) {?>
                                    <a href="update.php" onmouseenter="this.style.backgroundColor='gray' "
                                        onmouseleave="this.style.backgroundColor=''">Địa Lý</a>
                                <?php }else if($user['access']==1) {?>
                                    <a href="lamBai.php?id=5" onmouseenter="this.style.backgroundColor='gray' "
                                    onmouseleave="this.style.backgroundColor=''">Địa Lý</a>
                                <?php } }?>
                            </p>
                            <!-- <p>Writing research papers is an inevitable</p> -->
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <?php if(isset($user['access'])){ ?>
                            <?php if($user['access']==0) { ?>

                                <a href="update.php"> <img src="anh/english.png" url="class/history.php" alt=""> </a>
                            <?php }else if($user['access']==1) {?>
                                <a href="lamBai.php?id=6"> <img src="anh/english.png" url="class/history.php" alt=""></a>
                            <?php } }?>
                        </div>
                        <div class="font">
                            <p class="font-title">
                            <?php if(isset($user['access'])){?>
                                <?php if($user['access']==0) {?>
                                    <a href="update.php" onmouseenter="this.style.backgroundColor='gray' "
                                        onmouseleave="this.style.backgroundColor=''">Tiếng Anh</a>
                                <?php }else if($user['access']==1) {?>
                                    <a href="lamBai.php?id=6" onmouseenter="this.style.backgroundColor='gray' "
                                    onmouseleave="this.style.backgroundColor=''">Tiếng Anh</a>
                                <?php } }?>
                            </p>
                            <!-- <p>Writing research papers is an inevitable</p> -->
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <?php if(isset($user['access'])){ ?>
                            <?php if($user['access']==0) { ?>

                                <a href="update.php"> <img src="anh/iq.png" url="class/history.php" alt=""> </a>
                            <?php }else if($user['access']==1) {?>
                                <a href="lamBai.php?id=7"> <img src="anh/iq.png" url="class/history.php" alt=""></a>
                            <?php } }?>
                        </div>
                        <div class="font">
                            <p class="font-title">
                            <?php if(isset($user['access'])){?>
                                <?php if($user['access']==0) {?>
                                    <a href="update.php" onmouseenter="this.style.backgroundColor='gray' "
                                        onmouseleave="this.style.backgroundColor=''">Giáo Dục Công Dân</a>
                                <?php }else if($user['access']==1) {?>
                                    <a href="lamBai.php?id=7" onmouseenter="this.style.backgroundColor='gray' "
                                    onmouseleave="this.style.backgroundColor=''">Giáo Dục Công Dân</a>
                                <?php } }?>
                            </p>
                            <!-- <p>Writing research papers is an inevitable</p> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
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
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email"  required>
                    </div>
                </div>
                <input type="hidden" name="_next" value="http://localhost/hoctap/thankyou.html">
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Send</button>
                    </div>
                </div>
                </form>
                                <!-- <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
                                        </div>
                                        <textarea type="msg" name="msg" class="form-control" placeholder="Write your message" cols="30" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Send">
                                    </div> -->
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
</body>
</html>

