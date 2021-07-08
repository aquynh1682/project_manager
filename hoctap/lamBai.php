<?php
    include 'connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
    $user = $_SESSION['user'];
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="shortcut icon" href="./news/assets/images/21.png" />
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="lamBai.css">
    <title>Làm Bài thi trắc nghiệm</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-2 text-left">
                <div class="panel panel-primary text-center" id="nav">
                    <div class="panel-heading">Thời Gian</div>
                    <div class="panel-body" style="font-size:15px; font-weight:bold; border-radius: 3px;">
                        <span id="m">Phút</span> :
                        <span id="s">Giây</span>
                        <br />
                        <br />
                        <span id="diem" style="font-size:15px; font-weight:bold; color:red"></span>
                    </div>
                </div>
                
            </div>
            <div class="col-sm-10 text-left">
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <h4>Chào Mừng: <?php echo $user['name'] ?></h4>
                            <h5>Bạn Đang Thi Thử môn: <p id="testMon"></p></h5>
                            <h5 id="update" style="color:red"> Điểm bài thi của bạn đã được lưu lại vào hệ thống<h5>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- <div class="col-sm-12 text-center"> -->
                                <div class="col-sm-10 text-right">
                                    <button type="button" name="button" class="btn btn-success" id="btnStart" >Bắt Đầu</button>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <button type="button" name="button" class="btn btn-warning" id="btnExit" >Thoát</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div id="question"></div>
                                </div>
                                <div class="col-sm-2 text-center">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="button" class="btn btn-warning" id="btnFinish">Kết thúc bài thi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</body>
</html>

<script type="text/javascript">
    
    pos = $("#nav").position();

    $('#btnExit').click(function(){
        window.location.href = "index.php";
    });

    $(window).scroll(function() {
        var posScroll = $(document).scrollTop();
        if (parseInt(posScroll) > parseInt(pos.top)) {
            $("#nav").addClass('fixed');
        } else {
            $("#nav").removeClass('fixed');
        }
    });

    $(document).ready(function(){
        $('#btnFinish').hide();
    });
    $('#btnStart').click(function () {
        GetQuestion();
        start();
        $('#btnFinish').show();
        $(this).hide();
        $('#btnExit').hide();
        $('#update').hide();
        
    });
    var question;

    $('#btnFinish').click(function () {
        m = null;
        $(this).hide();
        $('#btnStart').show();
        $('#btnExit').show();
        CheckResult();
        var idMon = '<?php echo $id ?>';
        var today = new Date();
        var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
        $.ajax({
            url:'updateDiem.php',
            type:"post",
            data:{
                idMon:idMon,
                count:count,
                dateTime:dateTime,
            },
            success:function(data){
                $('#update').show();
            }
        })
    });
    let count;
    function CheckResult(){
        count = 0;
        $('#question div.row').each(function(k,v){
            clearTimeout(timeout);
            //Laay dap an cau hoir
            // console.log(v);
            let id = $(v).find('h5').attr('id');
            // console.log(id);
            let questions = question.find(x=>x.id == id);
            let answer = questions['answer'];
            // console.log(answer);
            //lay dap an nguoi dung
            let ch = $(v).find('fieldset input[type="radio"]:checked').attr('class');
            let choice = '';
            switch(ch){
                case 'rdOptionA':
                choice = 'A'
                break;
                case 'rdOptionB':
                choice = 'B'
                break;
                case 'rdOptionC':
                choice = 'C'
                break;
                case 'rdOptionD':
                choice = 'D'
                break;
            }
            if(choice == answer){
                console.log("id: '+id+' dung");
                count +=0.25;
            }else{
                console.log("id: '+id+' sai");
            }
            $('#diem').text(count + " Điểm");
            // doi chieu dap an
            $('#question_'+id+' > fieldset > div > label.'+answer).css("background-color", "yellow");
        });
    }

    // var h = null;
    var m = null;
    var s = null;
    
    var timeout = null;

    function start(){
        if(m == null){
            m = 60;
            s = 0;
        }
        if(s === -1){
            m -= 1;
            s = 59;
        }
        if(m==-1){
            clearTimeout(timeout);
            CheckResult();
            return false;
        }
        document.getElementById('m').innerText = m.toString();
        document.getElementById('s').innerText = s.toString();

        timeout = setTimeout(function(){
            s--;
            start();
        },1000);
    }

    window.load = loadMon();
    function loadMon(){
        let id = '<?php echo $id ?>';
        // console.log(id);
        $.ajax({
            url:'loadMon.php',
            type:'get',
            data:{
                id:id,
            },
            success:function(data){
                // $('#question').html(data);
                $('#testMon').append(data);
                $('#update').hide();
            }
        })
        
    }

    function GetQuestion(){
        let id = '<?php echo $id ?>';
        // console.log(id);
        $.ajax({
            url:'question.php',
            type:'get',
            data:{
                id:id,
            },
            success:function(data){
                question = jQuery.parseJSON( data);
                let index = 1;
                let d = '';
                $.each(question, function(k,v){
                    d+= '<div class="row" style="margin-left: 10px;" id="question_'+v['id']+'">';
                    d+= '<h5 style="font-weight: bold;" id="'+v['id']+'"><span class="text-danger"> Câu '+index+': </span>'+v['question']+'</h5>';
                    d+= '<fieldset id="'+v['id']+'">';
                    d+= '<div class="radio col-sm-12">';
                    d+=         '<label class="A"><input type="radio" class="rdOptionA" name="'+v['id']+'"><span class="text-danger">A: </span>'+v['question_a']+'</label>';
                    d+= '</div>';
                    d+= '<div class="radio col-sm-12">';
                    d+=         '<label class="B"><input type="radio" class="rdOptionB" name="'+v['id']+'"><span class="text-danger">B: </span>'+v['question_b']+'</label>';
                    d+= '</div>';
                    d+= '<div class="radio col-sm-12">';
                    d+=         '<label class="C"><input type="radio" class="rdOptionC" name="'+v['id']+'"><span class="text-danger">C: </span>'+v['question_c']+'</label>';
                    d+= '</div>';
                    d+= '<div class="radio col-sm-12">';
                    d+=         '<label class="D"><input type="radio" class="rdOptionD" name="'+v['id']+'"><span class="text-danger">D: </span>'+v['question_d']+'</label>';
                    d+= '</div>';
                    d+= '</fieldset>';
                    d+= '</div>';
                    index++;
                });
                $('#question').html(d);
                // $('#question').html(data);
            }
        })
        
    }
</script>