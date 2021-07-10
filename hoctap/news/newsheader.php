<?php

    $sql = "SELECT * FROM category";
    $data = $homelib->get_list($sql);
?>
<header id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light" style="height: 70px">
            <div class="navbar-bottom " style="height: 70px">
                <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a class="navbar-brand" href="news.php" style="color:white; font-size: 30px;">K12News</a>
                </div>
                <div>
                    <button
                    class="navbar-toggler"
                    type="button"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                    </button>
                    <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent" >
                    <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                        <li>
                        <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                        </button>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="news.php">Trang chủ</a>
                        </li>
                        <?php 
                            for ($i = 0; $i < count($data); $i++) {
                            ?>
                            <li class="nav-item">
                            <a class="nav-link" href="news.php?cat=<?php echo $data[$i]["category_id"]; ?>"><?php echo $data[$i]["name"];?></a>
                            </li>
                                
                            <?php 
                            }
                        ?>
                        <li class="nav-item active">
                        <a class="nav-link" href="../index.php">K12htht</a>
                        </li>
                    </ul>
                </div>
                </div>
                    <?php if(isset($user['fullName'])){ ?>
                        <div class="navbar-top">
                            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                                <ul class="navbar-nav navbar-top-right-menu">
                                    <li class="nav-item dropdown ml-auto">
                                        <a class="nav-link dropdown-toggle" href="#" style="font-size:15px" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo $user['fullName'] ?>
                                                <?php if(isset($user['images'])){ ?>
                                                    <img class="img-profile rounded-circle" style="width: auto; height: 30px;"
                                                    src="./uploads/<?php echo $user['images'] ?>">
                                                    
                                                <?php }else{ ?>
                                                <img class="img-profile rounded-circle"
                                                    src="img/undraw_profile.svg">
                                                <?php } ?>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <?php if(isset($user['access'])) 
                                                if($user['access'] != 1) { ?>
                                                    <a class="dropdown-item" href="upNews.php">Đăng bài</a>
                                                    <a class="dropdown-item" href="managerUser.php">Quản lý tài khoản</a>
                                        <?php } else if($user['access'] == 1) { ?>
                                                <a class="dropdown-item" href="managerUser.php">Quản lý tài khoản</a>
                                            <?php } ?>  
                                        <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } else{?>
                        <div class="navbar-top">
                            <div class="d-flex justify-content-between align-items-center">
                            <ul class="navbar-top-right-menu">
                                <li class="nav-item">
                                <a href="#" class="nav-link"></a>
                                </li>
                                <li class="nav-item">
                                <a href="login.php" class="nav-link">Đăng Nhập</a>
                                </li>
                                <li class="nav-item">
                                <a href="register.php" class="nav-link">Đăng ký</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            </nav>
            
        </div>

        </header>