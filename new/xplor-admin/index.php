<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

include "../function/check-user.php";

$strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_status = ?";
$resultCategory = $db->select($strSQL,array('Y'));

?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>HeavyPlayOnline เล่นหนัก จัดเต็ม เล่น Alienware</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.jpg">

		<!-- Fonts
		============================================ -->
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,800,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,300,300italic,500italic,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400,500" rel="stylesheet">
 		<!-- CSS  -->

		<!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

		<!-- font-awesome.min CSS
		============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

		<!-- Mean Menu CSS
		============================================ -->
    <link rel="stylesheet" href="../css/meanmenu.min.css">

		<!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">

		<!-- owl.theme CSS
		============================================ -->
    <link rel="stylesheet" href="../css/owl.theme.css">

		<!-- owl.transitions CSS
		============================================ -->
    <link rel="stylesheet" href="../css/owl.transitions.css">

		<!-- Price Filter CSS
		============================================ -->
    <link rel="stylesheet" href="../css/jquery-ui.min.css">

		<!-- nivo-slider css
		============================================ -->
		<link rel="stylesheet" href="../css/nivo-slider.css">

 		<!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../css/animate.css">

		<!-- jquery-ui-slider CSS
		============================================ -->
		<link rel="stylesheet" href="../css/jquery-ui-slider.css">

 		<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">


    <!-- Sweet Alert
    ================================== -->
    <link rel="stylesheet" type="text/css" href="ext-lib/sweetalert/dist/sweetalert.css">

    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../css/main.css">

    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/custom-style.css">

    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">

    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="home-one">

      <?php include "../componants/admin/menu-admin.php"; ?>

      <div class="">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-2">
              <div class="controlPanal" style="font-size: 0.8em;">
                <div class="row">
                  <div class="col-sm-12">
                    <ul class="mn-link br1">
                      <li><a href="./"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a></li>
                      <li><a href="./post.php"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Posts</a></li>
                      <li><a href="./page.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Pages</a></li>
                      <li><a href="./upload.php"><i class="fa fa-photo" aria-hidden="true"></i> Media</a></li>
                    </ul>

                    <ul class="mn-link" style="padding-top: 10px;">
                      <li style="font-weight: 500; color: rgb(3, 128, 111); font-size: 1.4em;">E-Commerce</li>
                      <li><a href="./category.php"><i class="fa fa-bars" aria-hidden="true"></i> Category</a></li>
                      <li><a href="./product.php"><i class="fa fa-suitcase" aria-hidden="true"></i> Products</a></li>
                      <li><a href="./user.php"><i class="fa fa-user" aria-hidden="true"></i> Users</a></li>
                    </ul>

                    <ul class="mn-link" style="padding-top: 10px;">
                      <li style="font-weight: 500; color: rgb(3, 128, 111); font-size: 1.4em;">Plugin</li>
                      <li><a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Quotation form</a></li>
                      <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> Payment notification</a></li>
                    </ul>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- Product AREA -->


        <!-- JS -->

 		<!-- jquery-1.11.3.min js
		============================================ -->
        <script src="../js/vendor/jquery-1.11.3.min.js"></script>

 		<!-- bootstrap js
		============================================ -->
        <script src="../js/bootstrap.min.js"></script>

		<!-- nivo slider js
		============================================ -->
		<script src="../js/jquery.nivo.slider.pack.js"></script>

 		<!-- Mean Menu js
		============================================ -->
    <script src="../js/jquery.meanmenu.min.js"></script>

   	<!-- owl.carousel.min js
		============================================ -->
    <script src="../js/owl.carousel.min.js"></script>


    <!-- Sweetalert
    ============================ -->
    <script src="ext-lib/sweetalert/dist/sweetalert.min.js"></script>

		<!-- jquery price slider js
		============================================ -->
		<script src="../js/jquery-price-slider.js"></script>

		<!-- wow.js
		============================================ -->
    <script src="../js/wow.js"></script>
		<script>
			new WOW().init();
		</script>

   	<!-- plugins js
		============================================ -->
    <script src="../js/plugins.js"></script>

   	<!-- main js
		============================================ -->
    <script src="../js/main.js"></script>
    <script src="../js/custom-app.js"></script>
    </body>
</html>
