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
		$message = $adminlib->add_post();
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
	include 'mdAddModal.php';
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
                    <span>Quản lý bài viết</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Addons
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
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
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
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
				<?php echo isset($error['note']) ? $error['note'] : ''; ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" id="manager">Quản lý bài viết</h1>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#mdprofile"><input type="button" id="btnAdd" class="btn btn-primary" value="Thêm bài viết"></a><br><br>
		            <table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
                            <th>STT</th>
							<th>Hình ảnh</th>
							<th>Tiêu đề</th>
							<th>Chuyên mục</th>
							<th>Xử lý</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
					for($i = 0; $data != 0 && $i < count($data); $i ++) {
						$id = $data[$i]["post_id"];
						?>
						<tr id = "<?php echo $id ?>" >
                            <td><?php echo $i+1 ?></td>
							<td><img src="./images/<?php echo $data[$i]["image"];?>" width="50px" height="50px"></td>
							<td><?php echo $data[$i]["title"];?></td>
							<td><?php echo $data[$i]["name"];?></td>
							<!-- <td><a href="#" data-book-id="<?php echo $id ?>"data-toggle="modal" data-target="#updateModal"><input type="button" id="btnInclude" class="btn btn-primary" value="update"></a> | <a href="post_remove.php?id=<?php echo $id;?>"><input type="button" class="btn btn-primary" value="remove"></a></td> -->
							<td><input type="button" class = "btn btn-xs btn-warning" value="Sửa" name = "update"> |
							<input type="button" class = "btn btn-xs btn-danger" value="Xoá" name = "delete"></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php
                            if($current_page > 1 && $total_page > 1){
                                echo '<li class="page-item"><a class="page-link" href="upNews.php?page='.($current_page-1).'">Prev</a></li>';
                            }
                            for($i = 1; $i <= $total_page; $i++){
                                if($current_page == $i){
                                    echo '<li class="page-item disabled"><a class="page-link" href="#">'.$i.'</a></li>';
                                }else
                                    echo '<li class="page-item"><a class="page-link" href="upNews.php?page='.$i.'">'.$i.'</a></li>';
                            }
                            if($current_page < $total_page && $total_page > 1){
                                echo '<li class="page-item"><a class="page-link" href="upNews.php?page='.($current_page+1).'">Prev</a></li>';
                            }
                        ?>
                    </ul>
                </nav>
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
		var content_test;
		$(document).on('click', "input[name='update']", function(){
			var bid = this.id;
			var trid = $(this).closest('tr').attr('id');
            $('#btnUpdate').val('Cập nhật bài viết');
			getDetail(trid);
		})
		function getDetail(id){
			$.ajax({
				url: 'detail.php',
				type: 'get',
				data: {
					id:id,
				},
				success: function(data){
					var q = jQuery.parseJSON(data);
					$('#addModal').modal();
					$('#title').val(q['title']);
					content_test = q['content'];
					CKEDITOR.instances.content.setData(content_test);
					$('#category_id').val(q['category_id']).change();
				}
			})
		}
        $(document).on('click', '#btnBack', function(){
            $('#addModal').modal();
            $('#title').val('');
            CKEDITOR.instances.content.setData('');
            $('#category_id').val('').change();
            $('#btnUpdate').val('Thêm bài viết');
        })
		$(document).on('click', "input[name='delete']", function(){
			var bid = this.id;
			var trid = $(this).closest('tr').attr('id');
			remove(trid);
			// console.log(trid);
		})
		function remove(id){
			$.ajax({
				url: 'delete.php',
				type: 'get',
				data:{
					id:id,
				},
				success: function(data) {
					alert(data);
					location.reload();
				}
			})
		}
	</script>
</body>
</html>