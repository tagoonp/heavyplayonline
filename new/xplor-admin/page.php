<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

include "../function/check-user.php";

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
          <div class="row" style="margin-bottom: 40px; padding-top: 40px;">
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

            <div class="col-sm-10" style="padding-top: 20px;">
              <div class="row">
                <div class="col-sm-6">
                  <h2 class="thfont fw400">Pages </h2>
                </div>

                <div class="col-sm-6 text-right">
                  <button type="button" name="button" class="btn btn-primary thfont"><i class="fa fa-plus"></i> Add new</button>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12" style="padding-top: 10px;">
                  <table class="table table-bordered">
                    <thead>
                      <tr style="background: rgb(228, 228, 228)">
                        <th class="col-sm-6">
                          Title
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                          Author
                        </th>
                        <th>
                          Redirect
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_level = ?";
                      $resultCategory = $db->select($strSQL,array('1'));

                      if($resultCategory){
                        foreach ($resultCategory as $value) {
                          ?>
                          <tr>
                            <td>
                              <?php
                              $catLabel = "";
                              if($value['cat_level']==2){
                                $catLabel = "-- ";
                              }
                              ?>
                              <a href="#" style="font-weight: bold;"><?php echo $catLabel.$value['cat_name']; ?></a>
                              <div class="" style="font-size:0.8em; padding-top: 5px;">
                                <a href="#"><i class="fa fa-wrench"></i> Edit</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-trash"></i> Delete</a>
                              </div>
                            </td>
                            <td>
                              <?php echo $value['cat_slug']; ?>
                            </td>
                            <td>
                              <?php
                              $strSQL = "SELECT count(*) as numproduct FROM ".$tbprefix."product WHERE cat_id = ?";
                              $resultNumProduct = $db->select($strSQL,array($value['cat_id']));
                              if($resultNumProduct){
                                echo $resultNumProduct[0]['numproduct'];
                              }else{
                                echo "0";
                              }
                              ?>
                            </td>
                          </tr>
                          <?php

                          $strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_level = ? AND 	cat_parent_id = ?";
                          $resultCategoryL2 = $db->select($strSQL,array('2', $value['cat_id']));

                          if($resultCategoryL2){
                            foreach ($resultCategoryL2 as $value2) {
                              ?>
                              <tr>
                                <td>
                                  <?php
                                  $catLabel = "-- ";
                                  ?>
                                  <a href="#"><?php echo $catLabel.$value2['cat_name']; ?></a>
                                  <div class="" style="font-size:0.8em; padding-top: 5px;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-wrench"></i> Edit</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-trash"></i> Delete</a>
                                  </div>
                                </td>
                                <td>
                                  <?php echo $value2['cat_slug']; ?>
                                </td>
                                <td>
                                  <?php
                                  $strSQL = "SELECT count(*) as numproduct FROM ".$tbprefix."product WHERE cat_id = ?";
                                  $resultNumProduct = $db->select($strSQL,array($value['cat_id']));
                                  if($resultNumProduct){
                                    echo $resultNumProduct[0]['numproduct'];
                                  }else{
                                    echo "0";
                                  }
                                  ?>
                                </td>
                              </tr>
                              <?php
                            }
                          }
                        }
                      }else{
                        ?>
                          <tr>
                            <td colspan="3">
                              No data found.
                            </td>
                          </tr>
                        <?php
                      }
                      ?>

                    </tbody>
                  </table>
                  <p class="input-hint">
                    <strong>Note! </strong> Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category "Uncategory"
                  </p>
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
