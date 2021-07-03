<div class="modal" tabindex="-1" role="dialog" id="modalUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" id="txtA" rows="1" placeholder="Họ Và Tên"></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="txtB" rows="1" placeholder="Địa Chỉ"></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="txtC" rows="1" placeholder="Email"></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="txtD" rows="1" placeholder="Điện Thoại"></textarea>
                </div>
                <!-- <form>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Nhập ảnh vào đây</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSubmit">xác nhận</button>
                <button type="button" class="btn btn-secondary"id="btnClose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#btnSubmit').on('click',function(){
        let name = $('#txtA').val().trim();
        let address = $('#txtB').val().trim();
        let email = $('#txtC').val().trim();
        let phone = $('#txtD').val().trim();
        $.ajax({
            url:'upProfile.php',
            type:'post',
            data:{
                name:name,
                address:address,
                email:email,
                phone:phone,
            },
            success:function(data){
                console.log(data);
            }
        })
        $('#modalUser').modal('hide');
    })
</script>