<div id="feature">
        <div class="container">
            <div class="feature-left">
                <!-- ghi noi dung-->
                <h2 class="feature-title"></h2>
                <p class="desc"></p>

                <div class="card" >
                    <div class="icon">
                        <a href="class/math.php">
                            <img src="anh/math.png" url="class/math.php" alt="">
                        </a>
                    </div>
                    <div class="font">
                        <p class="font-title">
                            <a href="class/math.php" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Toán</a>
                        </p>
                        <!-- <p>Writing research papers is an inevitable </p> -->
                    </div>
                </div>

                <div class="card">
                    <div class="icon">
                        <a href="class/vatly.php">
                            <img src="anh/vatly.png" url="class/math.php" alt="">
                        </a>
                    </div>
                    <div class="font">
                        <p class="font-title">
                            <a href="class/vatly.php" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Vật Lý</a>
                        </p>
                        <!-- <p>Writing research papers is an inevitable </p> -->
                    </div>
                </div>

                <div class="card">
                    <div class="icon">
                        <a href="class/hoahoc.php">
                            <img src="anh/hoahoc.png" url="class/hoahoc.php" alt="">
                        </a>
                    </div>
                    <div class="font">
                        <p class="font-title">
                            <a href="class/hoahoc.php" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Hóa Học</a>
                        </p>
                        <!-- <p>Writing research papers is an inevitable</p> -->
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="icon">
                        <a href="class/sinhhoc.php">
                            <img src="anh/sinhhoc.png" url="class/sinhhoc.php" alt="">
                        </a>
                    </div>
                    <div class="font">
                        <p class="font-title">
                            <a href="class/sinhhoc.php" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Sinh Học</a>
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
                        <a href="lambai.php"> <img src="anh/history.png" url="class/history.php" alt=""></a>
                        <?php } ?>
                        <?php }else{ ?>
                        <a href="class/history.php"> <img src="anh/history.png" url="class/history.php" alt=""></a>
                        <?php } ?>
                    </div>

                    <div class="font">
                        <p class="font-title">
                            <?php if(isset($user['access'])){?>
                            <?php if($user['access']==0) {?>
                            <a href="update.php" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Lịch Sử</a>
                            <?php }else if($user['access']==1) {?>
                            <a href="lamBai.html" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Lịch Sử</a>
                            <?php } ?>
                            <?php }else {?>
                            <a href="#" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Lịch Sử</a>
                            <?php } ?>
                        </p>
                        <!-- <p>Writing research papers is an inevitable </p> -->
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="icon">
                        <a href="class/dialy.php">
                            <img src="anh/dialy.png" url="class/dialy.php" alt="">
                        </a>
                    </div>
                    <div class="font">
                        <p class="font-title">
                            <a href="class/dialy.php" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Địa Lý</a>
                        </p>
                        <!-- <p>Writing research papers is an inevitable</p> -->
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="icon">
                        <a href="class/english.php">
                            <img src="anh/english.png" url="class/english.php" alt="">
                        </a>
                    </div>
                    <div class="font">
                        <p class="font-title">
                            <a href="class/english.php" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">English</a>
                        </p>
                        <!-- <p>Writing research papers is an inevitable</p> -->
                        </a>
                    </div>
                </div>



                <div class="card">
                    <div class="icon">
                        <a href="class/khoahocxahoi.php">
                            <img src="anh/khoahocxahoi.png" url="class/khoahocxahoi.php" alt="">
                        </a>
                    </div>
                    <div class="font">
                        <p class="font-title">
                            <a href="class/khoahocxahoi.php" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Khoa Học và Xã Hội</a>
                        </p>
                        <!-- <p>Writing research</p> -->
                        </a>
                    </div>

                </div>

                <div class="card">
                    <div class="icon">
                        <a href="class/tonghop.php">
                            <img src="anh/iq.png" url="class/tonghop.php" alt="">
                        </a>
                    </div>
                    <div class="font">
                        <p class="font-title">
                            <a href="class/tonhhop.php" onmouseenter="this.style.backgroundColor='gray' "
                                onmouseleave="this.style.backgroundColor=''">Tổng Hợp</a>
                        </p>
                        <!-- <p>Writing research papers is an inevitable</p> -->
                        </a>
                    </div>
                </div>




            </div>

        </div>
    </div>