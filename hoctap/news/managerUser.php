<?php
    include 'connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
     //$user = $_SESSION['user'];
	function inc(){
		include "./incs/class_db.php";
		include "./incs/class_admin.php";
	}
	inc();
	
	$adminlib = new adminlib();
	
	if (isset($_POST["update_action"])) {
		$message = $adminlib->update_user($user['id']);
		$error = $message[0];
		$data = $message[1];
	}
    $sql = "SELECT count(*) FROM posts";
    $total_records = $adminlib->get_row_number($sql);

    $limit = 20;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    $total_page = ceil($total_records / $limit);
    if($current_page > $total_page){
        $current_page = $total_page;
    }else if($current_page < 1){
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

	// $post_id = intval($_GET["id"]);
	$sql = "SELECT * FROM category";
	$list_category = $adminlib->get_list($sql);
	
	$sql = "SELECT * FROM posts a JOIN category b on a.category_id = b.category_id ORDER BY createdate DESC LIMIT $start, $limit";
	$data = $adminlib->get_list($sql);
	include 'mdProfile.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>K12 News</title>

    <!-- Custom fonts for this template-->
    <link href="./css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script src="./ckeditor/ckeditor.js"></script>
    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/21.png" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="news.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">K12 <sup>admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản lý tài khoản</span></a>
            </li>

            

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

						<?php if(isset($user['fullName'])) { ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['fullName'] ?></span>
                                <?php if(isset($user['images'])){ ?>
                                    <img class="img-profile rounded-circle"
                                    src="./uploads/<?php echo $user['images'] ?>">
                                    
                                <?php }else{ ?>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                                <?php } ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <?php if($user['access'] == 0){?>
                                    <a class="dropdown-item" href="upNews.php">
                                    <i class="fas fa-upload fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng bài
                                </a>
                                <?php } ?>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
						<?php }else{ ?>
						
						<ul class="nav navbar-nav navbar-right">
							<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
							<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
						</ul>
						<?php } ?>

                    </ul>

                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" id="manager">Quản lý Tài khoản</h1>
                    </div>
                    <?php include 'profile.php' ?>
				</div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn đã sẵn sàng thoát?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Nhấn vào "Đăng xuất" để thoát khỏi tài khoản này.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thôi</button>
                    <a class="btn btn-primary" href="logout.php">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <script src="./js/jquery.easing.min.js"></script>

    <script src="./js/sb-admin-2.min.js"></script>

    <script src="./js/Chart.min.js"></script>

    <script src="./js/chart-area-demo.js"></script>
    <script src="./js/chart-pie-demo.js"></script>
    <script>
        function getImage(imagename){
            var nweimg=imagename.replace(/^.*\\/,"");
            $('#display-image').html(imagename);
        }
    </script>
</body>
</html>