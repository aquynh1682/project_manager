<div class="container mt-5 mb-5">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-7" id = "comment">
            
        </div>
    </div>
</div>

<script >
    $('#someTextBox').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $('#alert').hide();
            var text = $('#someTextBox').val().trim();
            var id_user = '<?php echo $user['id']; ?>';
            var id_post = '<?php echo $_GET['id']; ?>';
            var today = new Date();
            var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime = date+' '+time;
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
                    console.log(data);
                }
            })
            $('#someTextBox').val('');
        }
        event.stopPropagation();
    })
    window.load = load();
    function load(){
        $('#alert').hide();
        $.ajax({
            url:'loadComment.php',
            type:'get',
            data:{},
            success:function(data){
                console.log(data);
                $('#comment').append(data);
            }
        })
    }
</script>