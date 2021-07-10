<div class="container mt-5 mb-5">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-7">
            <div class="card" id = "comment">
                <p style="color:red" id = "alert"></p>
                <div class="mt-3 d-flex flex-row align-items-center p-3 form-color"><?php if(isset($user['images'])){?>
                     <img src="./uploads/<?php echo $user['images']; ?>" width="50" class="rounded-circle mr-2"> 
                    <?php }else{?>
                         <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="50" class="rounded-circle mr-2"> 
                        <?php } ?>
                         <input type="text" class="form-control" id="someTextBox" placeholder="Enter your comment..."> </div>
                <div id="comment">

                </div>
                
            </div>
        </div>
    </div>
</div>

<script >
    
    window.load = Dataload();
    function Dataload(){
        $('#alert').hide();
        var id = '<?php echo $_GET['id']; ?>';
        $.ajax({
            url:'loadComment.php',
            type:'get',
            data:{
                id:id,
            },
            success:function(data){
                $('#comment').append(data);
            }
        })
    }
    $('#someTextBox').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $('#alert').hide();
            var text = $('#someTextBox').val().trim();
            if(text.length == 0){
                alert('vui lòng nhập nội dung bình luận');
                return;
            }
            var id_user = '<?php echo $user['id']; ?>';
            var id_post = '<?php echo $_GET['id']; ?>';
            var today = new Date();
            var date = ' ngày ' + today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
            var time = today.getHours() + ":" + today.getMinutes();
            var dateTime = time+' '+date;
            $.ajax({
                url:'comment.php',
                type:'get',
                data:{
                    text:text,
                    id_user:id_user,
                    id_post:id_post,
                    dateTime:dateTime,
                },
                success:function(data){
                    $('#alert').show();
                    
                }
            })
            $('#someTextBox').val('');
            $('#remove').remove();
            Dataload();
        }
    })
    $(document).on('click','i[id="alo"]', function(){
        
        var g  = $(this).closest('i').attr('name');
        var i = 0;
        i++;
        $(this).removeClass('far fa-thumbs-up mr-2');
        $(this).addClass('fas fa-thumbs-up mr-2');
        var h = $(this).closest('span').text();
        total = parseInt(i) + parseInt(h);
        $.ajax({
            url:'updateLike.php',
            type:'get',
            data:{
                post_id:g,
                like:total,
            },
            success:function(data){
            }
        })
        
        $('#remove').remove();
        Dataload();
    })
</script>