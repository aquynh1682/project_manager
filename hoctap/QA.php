<?php require_once("class/database.php"); ?>


    <!-- <?php
    include 'connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
     //$user = $_SESSION['user'];
?>  -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
    <link rel="icon" href="anh/logo1,1.png" image="image/x-icon">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hỗ trợ học tập - đào tạo nhân tài quốc gia</title>
        <!-- <script src="jquery-3.6.0.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700,800,900&amp;display=swap">

        <link rel="stylesheet" href="class/styleclassdangnhap.css">
        <link rel="stylesheet" href="style.css">

        <script src="https://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700,800,900&amp;display=swap">

        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
            integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        </script>

    </head>

    <body>
        <div id="container" style="height: 50px;">
            <div id="header">
                <div class="container">
                    <div class="logo">
                        <a href="index.php">
                            <img src="anh/logo1.png" url="index.php" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Menu -->

        <nav id="nav">
            <div class="container">
                <div class="menu">
                    <ul class="root">
                        <li><a href="index.php">Trang Chủ</a><a href="#">Cùng Nhau Thảo Luận Những Điều Bạn Không Hiểu</a> </li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="main">
            <div class="left"></div>
            <div class="center">

                    <form method="POST" id="comment_form">
                        <div class="form-group">
                            <input type="text" name="comment_name" id="comment_name" class="form-control"
                                placeholder="Enter Name" />
                        </div>
                        <div class="form-group">
                            <textarea name="comment_content" id="comment_content" class="form-control"
                                placeholder="Enter Comment" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="comment_id" id="comment_id" value="0" />
                            <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                        </div>
                    </form>
                    <span id="comment_message"></span>
                    <br />
                    <div id="display_comment"></div>

            </div>

        </div>
        <div id="contact" class="container-fluid bg-grey"
            style="background: dimgray; color: snow;  position:absolute; width: 100%;">
            <h2 class="text-center">CONTACT</h2>
            <div class="row">
                <div class="col-sm-5">
                    <p>Liên hệ với chúng tôi và chúng tôi sẽ liên hệ lại với bạn trong vòng 24 giờ.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span>Phenikaa University, Yên Nghĩa - Hà Đông - Hà
                        Nội.</p>
                    <p><span class="glyphicon glyphicon-phone"></span> +84 942 187 996</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> HoTro@k12htht.xyz</p>
                </div>
                <div class="col-sm-7 slideanim">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email"
                                required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment"
                        rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {

            $('#comment_form').on('submit', function(event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "add_comment.php",
                    method: "POST",
                    data: form_data,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.error != '') {
                            $('#comment_form')[0].reset();
                            $('#comment_message').html(data.error);
                            $('#comment_id').val('0');
                            load_comment();
                        }
                    }
                })
            });

            load_comment();

            function load_comment() {
                $.ajax({
                    url: "fetch_comment.php",
                    method: "POST",
                    success: function(data) {
                        $('#display_comment').html(data);
                    }
                })
            }

            $(document).on('click', '.reply', function() {
                var comment_id = $(this).attr("id");
                $('#comment_id').val(comment_id);
                $('#comment_name').focus();
            });

        });
        //lay vi tri hien tai cua menu cach top x px
        pos = $("#nav").position();

        $(window).scroll(function() {
            var posScroll = $(Document).scrollTop();
            if (parseInt(posScroll) > parseInt(pos.top)) {
                $("#nav").addClass('fixed');
            } else {
                $("#nav").removeClass('fixed');
            }
        });
        </script>


    </body>

    </html>