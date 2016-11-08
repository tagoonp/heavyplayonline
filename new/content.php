<?php
session_start();

include "xplor-config.php";
include "xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

include "function/check-user.php";

$strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_status = ? AND cat_level = ?";
$resultCategory = $db->select($strSQL,array('Y', 1));

if(!isset($_GET['p'])){

}

$strSQL = "SELECT * FROM ".$tbprefix."post WHERE post_id = ? AND post_public_submission = ? AND post_visibility = ? ";
$resultContent= $db->select($strSQL,array($_GET['p'], 'submit', 'public'));

if(!$resultContent){

}

$rowContent = $resultContent->fetch();
?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $rowContent['post_title']; ?></title>
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
    			<div class="container">
    				<div class="row">
    					<div class="col-md-3 col-sm-3">

                <?php
                include "componants/member.php";
                ?>

                <div class="controlPanal">
                  <div class="row">
                    <div class="col-sm-12">
                      <ul class="mn-link">
                        <li><a href="quotation.php"><i class="fa fa-file-text-o" aria-hidden="true"></i> ขอใบเสนอราคา</a></li>
                        <li><a href="#"><i class="fa fa-usd" aria-hidden="true"></i> แจ้งชำระเงิน</a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="product-catagori-area">
    							<div class="product-categeries">
    								<h2 class="thfont" style="font-weight: 400; color: rgb(6, 107, 140); font-size: 1.8em;">สินค้าแยกตามประเภท</h2>
    								<div class="panel-group" id="accrodian">
                      <?php
                      $strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_status = ? AND cat_level = ?";
                      $resultCategory = $db->select($strSQL,array('Y', 1));
                      if($resultCategory){
                        foreach ($resultCategory as $value) {

                          $strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_status = ? AND cat_level = ? AND cat_parent_id = ?";
                          $resultCategory2 = $db->select($strSQL,array('Y', 2, $value['cat_id']));

                          if($resultCategory2){
                            ?>
                            <div class="panel panel-default">
          										<div class="panel-heading">
          											<h4 class="panel-title">
          												<span onclick="Javascript:redirect('<?php echo $value['cat_link'];?>')" style="cursor: pointer;"><i class="fa fa-heart"></i> <?php echo $value['cat_name']; ?></span>
          												<a class="collapsed" data-toggle="collapse" href="#col<?php echo $value['cat_id'];?>" data-parent="#accrodian"></a>
          											</h4>
          										</div>
                              <div class="panel-collapse collapse" id="col<?php echo $value['cat_id'];?>">
          											<div class="panel-body">
                                <?php
                                foreach ($resultCategory2 as $value2) {
                                  ?>
                                  <a href="#"><i class="fa fa-angle-double-right"></i> <?php echo $value2['cat_name']; ?></a>
                                  <?php
                                }
                                ?>
                                </div>
                              </div>
                            </div>
                            <?php
                          }else{
                            ?>
                            <div class="panel panel-default">
          										<div class="panel-heading">
          											<h4 class="panel-title">
          												<span onclick="Javascript:redirect('<?php echo $value['cat_link'];?>')" style="cursor: pointer;"><i class="fa fa-heart"></i> <?php echo $value['cat_name']; ?></a>
          											</h4>
          										</div>
          									</div>
                            <?php
                          }
                        }
                      }
                      ?>
    								</div>
    							</div>
                  <a href="https://www.paysbuy.com/" target="_blank"><img src="img/paysbuy.png" alt="" /></a>
    						</div>

    					</div>

    					<div class="col-md-9 col-sm-9 thfont">
    						<div class="main-content" style="background:rgb(255, 255, 255) ; padding: 30px 25px; font-size: 1.3em;">
                  <?php
                  echo $rowContent['post_content'];
                  ?>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
        <!-- Product AREA -->


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

      function redirect(url){
        window.location = url;
      }
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
