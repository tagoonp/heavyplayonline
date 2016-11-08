<?php
session_start();

include "xplor-config.php";
include "xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

include "function/check-user.php";

if(!$activeSession){
  header('Location: my-account.php');
  die();
}

$strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_status = ? AND cat_level = ?";
$resultCategory = $db->select($strSQL,array('Y', 1));


?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ขอใบเสนอราคา</title>
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

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="" style="font-size: 0.8em;">
                        <a href="./">หน้าแรก</a> / <a href="quotation.php">ขอใบเสนอราคา</a>
                      </div>
                      <h2 style="font-weight: 300; margin-bottom: 0px;">ขอใบเสนอราคา</h2>
                    </div>
                  </div>
                  <hr class="hr-custom2">
                  <div class="row">
                    <div class="col-sm-12">
                      <h3 style="font-weight: 300; margin-bottom: 0px; color: rgb(255, 115, 0);" >Option 1 : ขอใบเสนอราคาจากข้อมูลความต้องการของท่าน</h3>
                      <form class="js-validation-bootstrap form-horizontal" id="quotationForm" action="" method="post" onsubmit="return false;" style="font-size: 16px;">
                        <div class="form-group" style="padding-top: 20px;">
                            <label class="col-md-4 control-label" for="val-username" style="font-weight: 300;">ชื่อ-สกุล <span class="text-orange">*</span></label>
                            <div class="col-md-7" id="req_3">
                                <input class="form-control" type="text" id="val-name" name="val-name" placeholder="กรอกชื่อ-นามสกุล ..." value="<?php if(($userinfo['fname']!='') && ($userinfo['lname']!='')){ echo $userinfo['fname']." ".$userinfo['lname']; }?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val-username" style="font-weight: 300;">E-mail <span class="text-orange">*</span></label>
                            <div class="col-md-7" id="req_4">
                                <input class="form-control" type="email" id="val-email" name="val-email" placeholder="กรอก E-mail ของท่าน..." value="<?php echo $userinfo['acc_email'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val-username" style="font-weight: 300;">ข้อมูลสินค้า <span class="text-orange">*</span></label>
                            <div class="col-md-7" id="req_1">
                                <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="8" placeholder="กรอกข้อมูลสินค้าที่ท่านต้องการให้เราจัดหา โดยระบุรุ่น และสเปคที่ท่านต้องการ ..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val-email" style="font-weight: 300;">ยืนยันรหัสผ่านบัญชีผู้ใช้ของท่าน <span class="text-orange">*</span></label>
                            <div class="col-md-7" id="req_2">
                                <input class="form-control" type="password" id="val-password" name="val-password" placeholder="กรอกรหัสผ่านของท่าน ..." />
                            </div>
                        </div>

                        <div class="form-group m-b-0">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <button class="btn btn-app" type="submit">ส่งข้อมูล</button>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">ดูใบเสนอราคาของคุณ <?php
                                                    $strSQL = "SELECT * FROM d4is_quotation WHERE qt_acc_id = ?";
                                                    $resultQt = $db->select($strSQL, array($_SESSION[$sess.'Username']));

                                                    $numofqt = 0;
                                                    if($resultQt){
                                                        $numofqt = sizeof($resultQt);
                                                    }

                                                    echo "( ".$numofqt." รายการ )";
                                                    ?></a>
                                                </div>
                                            </div>
                      </form>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12" style="padding-top: 20px;">
                      <h3 style="font-weight: 300; margin-bottom: 0px; color: rgb(255, 115, 0);" >Option 2 : ขอใบเสนอจากรายการในตะกร้าสินค้า</h3>
                      <table class="js-table-checkable table table-vcenter table-hover" style="font-weight: 300; margin-top: 20px;">
                                   <thead>
                                       <tr style="background: rgb(34, 111, 159); color: rgb(255, 255, 255); font-size: 1.2em;">
                                           <th class="text-center w-5" style="font-weight: 400;">
                                               <label class="css-input css-checkbox css-checkbox-default m-t-0 m-b-0">
               <input type="checkbox" id="check-all" name="check-all"><span></span>
             </label>
                                           </th>
                                           <th style="font-weight: 400;">สินค้า</th>
                                           <th style="font-weight: 400;">จำนวน</th>
                                           <th class="hidden-xs w-20" style="font-weight: 400;">ราคาต่อหน่วย</th>
                                           <th class="hidden-xs w-20" style="font-weight: 400;">ราคารวม</th>
                                           <th class="hidden-xs w-20" style="font-weight: 400;">Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                     <?php
                                     $strSQL = "SELECT * FROM ".$tbprefix."basket WHERE user_id = ? AND payment_status = ?";
                                     $resultBusket = $db->select($strSQL,array($_SESSION[$sess.'Username'], 'N'));
                                     if($resultBusket){
                                       foreach ($resultBusket as $value) {
                                         ?>
                                         <tr>
                                             <td class="text-center">
                                                 <label class="css-input css-checkbox css-checkbox-default">
                 <input type="checkbox" id="row_1" name="row_1"><span></span>
               </label>
                                             </td>
                                             <td>
                                                 <p class="font-500 m-b-0">Helen Bates</p>
                                                 <p class="text-muted m-b-0">Customer details and further information</p>
                                             </td>
                                             <td class="hidden-xs">Accountant</td>
                                             <td class="hidden-xs">
                                                 <em class="text-muted">April 4, 2015 12:16</em>
                                             </td>
                                         </tr>
                                         <?php
                                       }
                                     }else{
                                       ?>
                                       <tr>
                                         <td colspan="6">
                                           ไม่มีรายการสินค้าในตะกร้า
                                         </td>
                                       </tr>
                                       <?php
                                     }
                                     ?>


                                     </tbody>
                                   </table>
                                   <div class="text-center">
                                     <button type="button" name="button" class="btn btn-warning" onclick="Javascript: redirect('product.php')">เลือกซื้อสินค้า</button>
                                   </div>
                    </div>
                  </div>

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
    <script src="js/quotation-app.js"></script>
    </body>
</html>
