<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="./profile.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img px-0">
                            <img src="./uploads/<?php echo $user['images']; ?>" class="img-fluid img-responsive" style="width: auto; height: 195px;" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $user['fullName']; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $user['date']; ?>
                                    </h6>
                                    <p class="proile-rating">Quyền : <span><?php if($user['access'] == 0){ echo 'admin'; } else { echo 'Người dùng' ;} ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tài khoản</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $user['user']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Họ tên</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $user['fullName']; ?></p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Giới tính</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $user['sex']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Địa chỉ</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $user['address']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $user['email']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Điện thoại</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $user['phone']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <a class="profile-edit-btn" data-toggle="modal" data-target="#profile"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Sửa thông tin"/></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-4">
                       
                    </div>
                </div>
            </form>           
        </div>