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
    
    <script src="https://kit.fontawesome.com/78d7fc013c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="userTemplate.css"><script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="shortcut icon" href="./news/assets/images/21.png" />
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>User</title>
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
                            <li><a href="userTemplate.php">CHÀO : <?php echo $user['name'] ?></a></li>
                            <li><a href="logout.php">ĐĂNG XUẤT</a></li>
                        <?php }else { ?>
                            <li><a href="DangNhap.html">ĐĂNG NHẬP</a></li>
                            <li><a href="dangky.html">ĐĂNG KÝ</a></li>
                        <?php } ?>
                        <li> <a href="goiY.html">GÓP Ý</a> </li>

                        <div class="form-search" style="margin-top: 5px;">
                            <input class="td-widget-search-input" placeholder="Nhập từ khóa để tìm kiếm..." type="text"
                                value="" name="s" id="s"
                                style="width: 200px;height: 40px;border-radius: 10px;border: 1px solid #999;">
                            <input class="wpb_button wpb_btn-inverse btn" type="submit" id="searchsubmit"
                                value="Tìm kiếm" style="height: 40px;border: 1px solid #999;">
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container bootstrap snippets bootdeys" style="min-height:60vh">
            <div class="row" id="user-profile">
                <div class="col-lg-3 col-md-4 col-sm-4">
                    <div class="main-box clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-img img-responsive center-block">
                        <div class="profile-label">
                            <span class="label label-danger">
                            <?php if($user['access'] == 1) {?>
                                Học Sinh
                            <?php }else{?>
                                Giáo Viên
                            <?php }?>
                        </span>
                    </div>

                    <div class="profile-stars">
                    </div>

                    <div class="profile-since">
                        Ngày Đăng ký: <?php echo $user['ngayDangKy'] ?>
                    </div>

                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-8">
                <div class="main-box clearfix">
                    <div class="profile-header">
                        <h3><span>Thông Tin</span></h3>
                        <button id="btnUser" class="btn btn-success edit-profile">
                            <i class="fa fa-pencil-square fa-lg"></i> Sửa Thông Tin
                        </button>
                    </div>

                    <div class="row profile-user-info">
                        <div class="col-sm-8">
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Họ Và Tên:
                                </div>
                                <div class="profile-user-details-value" id="name123">
                                    <?php echo $user['name'] ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Địa Chỉ:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $user['diaChi'] ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Email:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $user['email'] ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Số Điện Thoại:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $user['phone'] ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Xu:
                                </div>
                                <div id="xu" class="profile-user-details-value">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="tabs-wrapper profile-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-activity" data-toggle="tab">Lịch Sử Điểm</a></li>
                <li><a href="#tab-friends" data-toggle="tab">Nạp Xu</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active"  style="margin-bottom:60px;" id="tab-activity">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody id="lsMonHoc">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" style="margin-bottom:60px" id="tab-friends">
                    <ul class="widget-users row">
                    <table class="table">
                            <tbody id="lsNapThe">
                            </tbody>
                        </table>
                    </ul>
                    <br>
                    <a href="#" id="vnPay" class="btn btn-success pull-right">Nạp thẻ</a>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>

        <div id="contact" class="container-fluid bg-grey" style="background: dimgray; color: snow; margin-top:10px; bottom:0px;  width: 100%;">
                <h2 class="text-center"></h2>
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
        </div>
    </div>
</body>
</html>
<?php include('editProfile.php'); ?>
<?php include('mdvnPay.php'); ?>
<script type="text/javascript">
    $('#btnUser').click(function(){
        $('#txtA').val('');
        $('#txtB').val('');
        $('#txtC').val('');
        $('#txtD').val('');
        $('#modalUser').modal();
    });
    window.load = Data();
    function Data(){
        Money();
        Xu();
        let id = '<?php echo $user['id']; ?>';
        console.log(id)
        $.ajax({
            url:'viewDiem.php',
            type:'POST',
            data:{
                id:id,
            },
            success:function(data){
                console.log(data);
                $('#lsMonHoc').append(data);
            }
        })
    }
    function Money(){
        let id = '<?php echo $user['id']; ?>';
        $.ajax({
            url:'viewTien.php',
            type:"post",
            data:{
                id:id,
            },
            success:function(data){
                $('#lsNapThe').append(data);
            }
        })
    }
    function Xu(){
        let id = '<?php echo $user['id']; ?>';
        $.ajax({
            url:'countXu.php',
            type:"post",
            data:{
                id:id,
            },
            success:function(data){
                console.log(data);
                // 1 xu bang 1000vnd
                var count = data / 1000
                $('#xu').append(count);
            }
        })
    }

    $('#vnPay').click(function(){
        $('#order_type').attr('readonly','readonly');
        $('#order_id').attr('readonly','readonly');
        $('#modalVNPay').modal();
    })
</script>