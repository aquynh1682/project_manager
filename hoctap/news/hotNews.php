<?php
    include 'connect.php';
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
     //$user = $_SESSION['user'];
     function inc(){
		include "./incs/class_db.php";
		include "./incs/class_home.php";
	}
	inc();
    $homelib = new homelib();
    $where = '';
    if(isset($_GET['id'])){
        $cat = intval($_GET['id']);
        if($cat != 0)
            $where = "WHERE post_id = $cat";
    }
    $sql = "SELECT * FROM posts  $where";

    $data = $homelib->get_list($sql);
    // $where = '';
    // if(isset($_GET['id'])){
    //     $id = intval($_GET['id']);
    //     if($id != 0)
    //         $where = "WHERE post_id = $id";
    // }
    // $sql = "SELECT * FROM posts a JOIN category b on a.category_id = b.category_id $where";
    // $data = $homelib->get_list($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="jquery-3.6.0.min.js"></script> -->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/78d7fc013c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link
        rel="stylesheet"
        href="./assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="assets/vendors/aos/dist/aos.css/aos.css" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="assets/images/21.png" />
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <style>
        #session{
            display: none;
        }
        h2 {
            color: black;
            font-size: 20px;
        }
    </style>

    <!-- endinject -->
    <title>K12News</title>
</head>
<body>
    <div class="container-scroller">
        <div class="main-panel">
            <!-- partial:partials/_navbar.html -->
            <?php include 'newsheader.php' ?>
        </div>
       
        <div class="container">
        <div class="row">
                <div class="col">
                </div>
                <div id='news' class="col-md-auto">
                    <h2 id="title"></h2>
                    <h4 id="content"></h4>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <hr class="sidebar-divider">
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <?php 
            if(isset($user['user'])){
                include 'newsComment.php';
            }?>
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Web Demo tin tức K12-KHMT</p></div>
        </footer>
    </div>
    <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
    <script src="./assets/js/demo.js"></script>
    
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/sb-admin-2.min.js"></script>
    <script>
        // window.load = load();
        // function load(){
        //     
        //     $.ajax({
        //         url:'load.php',
        //         type:'post',
        //         data:{
        //             id:id,
        //         },
        //         success: function(data){
        //             var q = jQuery.parseJSON(data);
        //             $('#category').append(q['name']);
        //             $('#date').append(q['createdate']);
        //             $('#title').append(q['title']);
        //             $('#content').append(q['content']);
        //         }
        //     })
        // }
        $(document).ready(function(){
            load();
        })
        function load() {
            let id = '<?php echo $_GET['id'] ?>';
            $('#news').children().remove();
            $.ajax({
                url:'news.xml',
                dataType: 'xml',
                success: function(data){
                    $(data).find('new').each(function(){
                        if(id == $(this).find("post_id").text()){
                            var info ='<h1>' + $(this).find("title").text() + '</h1>' + '<hr />' + '<h4>' + $(this).find("content").text() + '</h4>';
                            $('#news').append(info);
                        }
                    // console.log(info);
                    })
                }
            })
        }
        $("a[href='#page-top']").click(function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });
    </script>
</body>
</html>