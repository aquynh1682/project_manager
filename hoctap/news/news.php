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
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="jquery-3.6.0.min.js"></script> -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="assets/vendors/aos/dist/aos.css/aos.css" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="assets/images/21.png" />

    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="css/styles.css" rel="stylesheet" />
    <!-- endinject -->
    <title>K12News</title>
</head>
<body>
    <div class="container-scroller">
        <div class="main-panel">
            <!-- partial:partials/_navbar.html -->
            <?php include 'newsheader.php' ?>
            <header class="py-5 bg-light border-bottom mb-4">
                <div class="container">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder">Welcome to K12News!</h1>
                        <p class="lead mb-0">Demo tin tức k12KHMT</p>
                    </div>
                </div>
            </header>
            <?php include 'newsChil.php' ?>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Web Demo tin tức K12-KHMT</p></div>
        </footer>
    </div>
    <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
    <script src="./assets/js/demo.js"></script>
    
    
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/sb-admin-2.min.js"></script>

    <script>
        $("a[href='#page-top']").click(function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
            });
    </script>
</body>
</html>