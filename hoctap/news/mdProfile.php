
<div class="modal fade bd-example-modal-lg" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm bài viết</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="container bootstrap snippets bootdey">
                <?php echo isset($error['note']) ? $error['note'] : ''; ?>
                <form action="managerUser.php"  method="post" enctype="multipart/form-data">
                    <div class="row">
                    <!-- left column -->
                    <div class="col-md-3">
                <?php echo isset($error['image']) ? $error['image'] : ''; ?>
                        <div class="text-center">
                        <!-- <img src="//placehold.it/100" class="avatar img-circle" alt="avatar"> -->
                        <!-- <div class="status alert alert-success"></div> -->
                        
                        <input type="file" class="form-control" name="fileToUpload" id="image" required=""/>
                        </div>
                    </div>
                    
                    <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                        <!-- <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> 
                        <i class="fa fa-coffee"></i>
                        This is an <strong>.alert</strong>. Use this to show important messages to the user.
                        </div> -->
                        <h3>Personal info</h3>
                        
                        <div class="form-group">
                            <?php echo isset($error['fullName']) ? $error['fullName'] : ''; ?>
                            <label class="col-lg-3 control-label">Họ tên</label>
                            <div class="col-lg-8">
                            <input class="form-control" name="fullName" type="text" value="<?php echo $user['fullName']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo isset($error['address']) ? $error['address'] : ''; ?>
                            <label class="col-lg-3 control-label">Địa chỉ</label>
                            <div class="col-lg-8">
                            <input class="form-control" name="address" type="text" value="<?php echo $user['address']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                <?php echo isset($error['phone']) ? $error['phone'] : ''; ?>
                            <label class="col-lg-3 control-label">Điện thoại</label>
                            <div class="col-lg-8">
                            <input class="form-control" name="phone" type="text" value="<?php echo $user['phone']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                            <input class="form-control" name="email" type="text" value="<?php echo $user['email']; ?>">
                            </div>
                        </div>
                <?php echo isset($error['sex']) ? $error['sex'] : ''; ?>
                        <div class="form-group form-check form-check-inline " style="margin-left:100px">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="Nam" checked>
                            
                            <label class="form-check-label" for="inlineRadio1" >Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="Nữ">
                            
                            <label class="form-check-label" for="inlineRadio2">Nữ</label></label>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    </div>
                </div>
                </div>
                </div>
                <hr>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="btnBack" type="button" data-dismiss="modal">Thoát</button>
                    <input type="submit" class="btn btn-primary" id="btnUpdate" value="Thêm bài viết" name="update_action">
                </div>
            </form>
            </div>
        </div>
    </div>