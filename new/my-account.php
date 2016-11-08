<?php
session_start();

include "xplor-config.php";
include "xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

include "function/check-user.php";

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
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg">

		<!-- Fonts
		============================================ -->
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,800,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,300,300italic,500italic,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400,500" rel="stylesheet">
 		<!-- CSS  -->

		<!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- font-awesome.min CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Mean Menu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">

		<!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">

		<!-- owl.theme CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.theme.css">

		<!-- owl.transitions CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.transitions.css">

		<!-- Price Filter CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery-ui.min.css">

		<!-- nivo-slider css
		============================================ -->
		<link rel="stylesheet" href="css/nivo-slider.css">

 		<!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">

		<!-- jquery-ui-slider CSS
		============================================ -->
		<link rel="stylesheet" href="css/jquery-ui-slider.css">

 		<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">


    <!-- Sweet Alert
    ================================== -->
    <link rel="stylesheet" type="text/css" href="ext-lib/sweetalert/dist/sweetalert.css">

    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">

    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/custom-style.css">

    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="home-one">

      <?php include "componants/header.php"; ?>

      <?php include "componants/menu.php"; ?>


    		<div class="slider-area">
    			<div class="container" style="background:rgb(255, 255, 255); padding: 30px; ">
    				<div class="row">
    					<div class="col-md-6 col-sm-6">

                <?php
                include "componants/member.php";
                ?>


    					</div>

    					<div class="col-md-6 col-sm-6">
    						<div class="memberPanal" >
                  <h2 class="thfont" style="font-size: 1.3em; color: rgb(19, 143, 176)"><span style="font-size: 1.5em;">สมัครสมาชิก</span></h2>
                  <form class="registerForm" action="./" method="post" autocomplete="off" onsubmit="return false;">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" id="req-username2">
                          <input type="text" class="form-control" id="txt-username2" name="txt-username2" placeholder="กรอกอีเมลที่ใช้">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="padding-top: 7px;">
                      <div class="col-md-12">
                        <div class="form-group" id="req-password2">
                          <input type="password" class="form-control" id="txt-password2" name="txt-password2" placeholder="กรอกรหัสผ่าน">
                        </div>
                      </div>
                    </div>

                    <div class="row" style="padding-top: 7px;">
                      <div class="col-md-12">
                        <div class="form-group" id="req-password22">
                          <input type="password" class="form-control" id="txt-password22" name="txt-password22" placeholder="ยืนยันรหัสผ่าน">
                        </div>
                      </div>
                    </div>

                    <div class="row" style="padding-top: 7px; padding-bottom: 20px;">
                      <div class="col-md-12">
                        <button type="submit" id="btnSubmitRegister" class="btn btn-warning btn-block thfont">สมัคร</button>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 text-center">
                        <div class="RegisterResponce" style="padding: 10px; background: rgb(255, 212, 212); color: rgb(150, 12, 37); display: none;">

                        </div>
                      </div>
                    </div>
                  </form>
                </div>

    					</div>
    				</div>
    			</div>
    		</div>

    <?php include "componants/footer.php"; ?>
        <!-- JS -->

 		<!-- jquery-1.11.3.min js
		============================================ -->
        <script src="js/vendor/jquery-1.11.3.min.js"></script>

 		<!-- bootstrap js
		============================================ -->
        <script src="js/bootstrap.min.js"></script>

		<!-- nivo slider js
		============================================ -->
		<script src="js/jquery.nivo.slider.pack.js"></script>

 		<!-- Mean Menu js
		============================================ -->
    <script src="js/jquery.meanmenu.min.js"></script>

   	<!-- owl.carousel.min js
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>


    <!-- Sweetalert
    ============================ -->
    <script src="ext-lib/sweetalert/dist/sweetalert.min.js"></script>

		<!-- jquery price slider js
		============================================ -->
		<script src="js/jquery-price-slider.js"></script>

		<!-- wow.js
		============================================ -->
    <script src="js/wow.js"></script>
		<script>
			new WOW().init();
		</script>

   	<!-- plugins js
		============================================ -->
    <script src="js/plugins.js"></script>

   	<!-- main js
		============================================ -->
    <script src="js/main.js"></script>
    <script src="js/custom-app.js"></script>
    </body>
</html>
