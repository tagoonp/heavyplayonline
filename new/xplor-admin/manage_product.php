<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

include "../function/check-user.php";

if(!$activeSession){
  header('Location: ../');
  die();
}

if(!isset($_GET['p'])){
  header('Location: product.php');
  die();
}

$strSQL = "SELECT * FROM ".$tbprefix."product WHERE product_id = ?";
$resultProduct = $db->select($strSQL,array($_GET['p']));

if(!$resultProduct){
  header('Location: product.php');
  die();
}

$rowProduct = $resultProduct->fetch();
?>
<!DOCTYPE html>

<html class="app-ui">

    <head>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <!-- Document title -->
        <title>Heavyplay admin panal</title>

        <meta name="description" content="AppUI - Admin Dashboard Template & UI Framework" />
        <meta name="author" content="rustheme" />
        <meta name="robots" content="noindex, nofollow" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="assets/img/favicons/apple-touch-icon.png" />
        <link rel="icon" href="assets/img/favicons/favicon.ico" />

        <!-- Google fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/slick/slick.min.css" />
        <link rel="stylesheet" href="assets/js/plugins/slick/slick-theme.min.css" />
        <link rel="stylesheet" href="assets/js/plugins/datatables/jquery.dataTables.min.css" />

        <!-- AppUI CSS stylesheets -->
        <link rel="stylesheet" id="css-font-awesome" href="assets/css/font-awesome.css" />
        <link rel="stylesheet" id="css-ionicons" href="assets/css/ionicons.css" />
        <link rel="stylesheet" id="css-bootstrap" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" id="css-app" href="assets/css/app.css" />
        <link rel="stylesheet" id="css-app-custom" href="assets/css/app-custom.css" />
        <!-- End Stylesheets -->
    </head>

    <body class="app-ui layout-has-drawer layout-has-fixed-header">
        <div class="app-layout-canvas">
            <div class="app-layout-container">

                <!-- Drawer -->
                <aside class="app-layout-drawer">

                    <!-- Drawer scroll area -->
                    <div class="app-layout-drawer-scroll">
                        <!-- Drawer logo -->
                        <div id="logo" class="drawer-header">
                            <a href="./"><img class="img-responsive" src="assets/img/logo/logo-backend.png" title="AppUI" alt="AppUI" /></a>
                        </div>

                        <!-- Drawer navigation -->
                        <nav class="drawer-main">
                            <ul class="nav nav-drawer">

                                <li class="nav-item nav-drawer-header">Main</li>

                                <li class="nav-item ">
                                    <a href="./"><i class="ion-ios-speedometer-outline"></i> Dashboard</a>
                                </li>

                                <li class="nav-item">
                                    <a href="post.php?type=post"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Posts</a>
                                </li>

                                <li class="nav-item">
                                    <a href="post.php?type=page"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Pages</a>
                                </li>

                                <li class="nav-item">
                                    <a href="upload.php"><i class="fa fa-photo" aria-hidden="true"></i> Media</a>
                                </li>

                                <li class="nav-item nav-drawer-header">E-commerce</li>

                                <li class="nav-item active">
                                    <a href="./category.php"><i class="fa fa-bars" aria-hidden="true"></i> Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./product.php"><i class="fa fa-suitcase" aria-hidden="true"></i> Products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./user.php"><i class="fa fa-user" aria-hidden="true"></i> Users</a>
                                </li>

                                <li class="nav-item nav-drawer-header">Plugin</li>

                                <li class="nav-item">
                                    <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Quotation form</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> Payment notification</a>
                                </li>

                                <li class="nav-item nav-drawer-header">Other</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="ion-ios-browsers-outline"></i> Appearance</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="menus.php">Menus</a>
                                        </li>

                                    </ul>
                                </li>

                            </ul>
                        </nav>
                        <!-- End drawer navigation -->

                        <div class="drawer-footer">
                            <p class="copyright">AppUI Template &copy;</p>
                            <a href="https://shapebootstrap.net/item/1525731-appui-admin-frontend-template/?ref=rustheme" target="_blank" rel="nofollow">Purchase a license</a>
                        </div>
                    </div>
                    <!-- End drawer scroll area -->
                </aside>
                <!-- End drawer -->

                <!-- Header -->
                <header class="app-layout-header">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                          					<span class="sr-only">Toggle navigation</span>
                          					<span class="icon-bar"></span>
                          					<span class="icon-bar"></span>
                          					<span class="icon-bar"></span>
                          				</button>
                                                          <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                          					<span class="sr-only">Toggle drawer</span>
                          					<span class="icon-bar"></span>
                          					<span class="icon-bar"></span>
                          					<span class="icon-bar"></span>
                          				</button>
                                <span class="navbar-page-title">
                      					Products
                      				</span>
                            </div>

                            <?php include "componants/admin-menu.php"; ?>
                        </div>
                        <!-- .container-fluid -->
                    </nav>
                    <!-- .navbar-default -->
                </header>
                <!-- End header -->

                <main class="app-layout-content">
                  <div class="container-fluid p-y-md">
                    <div class="row">
                      <form class="js-validation-bootstrap" action="controller/insert-product.php" method="post">
                        <div class="col-sm-4">
                            <h3 class="thfont fw400">Add new product</h3>
                            <div class="row">

                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label for="" class="fw300">Product's ID</label>
                                  <input type="text" name="product_id" id="product_id" readonly value="<?php echo $rowProduct['product_id']; ?>" class="form-control">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label for="" class="fw300">Product's name</label>
                                  <input type="text" name="product_name" id="product_name" value="<?php echo $rowProduct['product_name']; ?>" class="form-control">

                                </div>
                                <p class="input-hint" style="padding: 0px 18px; font-size: 0.8em;">
                                  The name is how it appears on your site.
                                </p>
                              </div>

                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label for="" class="fw300">Start price</label>
                                  <input type="text" name="product_startprice" id="product_startprice" value="<?php echo $rowProduct['product_startprice']; ?>" class="form-control">

                                </div>
                                <p class="input-hint" style="padding: 0px 18px; font-size: 0.8em;">
                                  The “start price” is the price show at product in "US Dollar".
                                </p>
                              </div>

                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label for="" class="fw300">Category</label>
                                  <select name="product_category" id="product_category" class="form-control">
                                    <option value="" selected="">--- Please choose category ---</option>
                                    <?php
                                    $strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_status = ? AND cat_level = ?";
                                    $resultCategoryL1 = $db->select($strSQL,array('Y','1'));
                                    if($resultCategoryL1){
                                      foreach ($resultCategoryL1 as $value) {
                                        ?>
                                        <option value="<?php echo $value['cat_id'];?>" <?php if($rowProduct['product_category']==$value['cat_id']){ echo "selected"; } ?>><?php echo $value['cat_name'];?></option>
                                        <?php
                                      }
                                    }
                                    ?>
                                  </select>

                                </div>
                                <p class="input-hint" style="padding: 0px 18px; font-size: 0.8em;">
                                  Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.
                                </p>
                              </div>

                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label for="" class="fw300">Description</label>
                                  <textarea name="product_shortdetail" id="product_shortdetail" rows="4" cols="40"  class="form-control"><?php echo $rowProduct['product_shotdetail']; ?></textarea>

                                </div>
                                <p class="input-hint" style="padding: 0px 18px; font-size: 0.8em;">
                                  The description is not prominent by default; however, some themes may show it.
                                </p>
                              </div>

                              <div class="form-group">

                                <div class="col-xs-12">
                                  <label for="" class="fw300">Visibility</label>
                                    <label class="css-input css-radio css-radio-primary m-r-sm">
                      								<input type="radio" name="radio-group1" checked /><span></span> No
                      							</label>
                                    <label class="css-input css-radio css-radio-primary">
                      								<input type="radio" name="radio-group1" /><span></span> Yes
                      							</label>
                                </div>
                              </div>



                              <div class="form-group">
                                <div class="col-sm-12" style="padding-top: 30px;">
                                  <button type="submit" name="button" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                            </div>
                        </div>
                      </form>


                      <div class="col-sm-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Product attribute</h4>
                            </div>
                            <div class="card-block">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <div class="col-sm-12" id="r_attr">
                                      <label for="" class="fw300">Attribute name</label>
                                      <input type="text" name="product_attr_name" id="product_attr_name" class="form-control">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-sm-12" style="padding-top: 10px;">
                                    <button type="button" name="button" id="btnAddAttr" class="btn btn-primary">Add attribute</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-12" style="padding-top: 20px;">
                                  <div class="table-responsive" style="padding: 15px;">
                                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                      <thead>
                                          <tr>
                                              <th class="text-center"></th>
                                              <th>Attribute's name</th>
                                              <th class="hidden-xs w-20">Number of attr</th>
                                              <th class="hidden-xs w-20">Attr info.</th>
                                              <th class="text-center" style="width: 10%;">Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $strSQL = "SELECT * FROM ".$tbprefix."product_attribute WHERE product_id = ?";
                                        $resultCategory = $db->select($strSQL,array($rowProduct['product_id']));
                                        if($resultCategory){
                                          $c = 1;
                                          foreach($resultCategory as $value){
                                            ?>
                                            <tr>
                                                <td class="text-center" style="vertical-align:top;"><?php echo $c; $c++;?></td>
                                                <td class="font-500" style="vertical-align:top;"><a href="#" style="font-weight: ;"><?php echo $value['pa_title']; ?></a></td>
                                                <td class="hidden-xs" style="vertical-align:top;">
                                                  <?php
                                                  $strSQL = "SELECT count(*) as numrow FROM ".$tbprefix."product_attribute_detail WHERE pa_id = ?";
                                                  $resultAttrinfocount = $db->select($strSQL,array($value['pa_id']));
                                                  if($resultAttrinfocount){
                                                    $rowCount = $resultAttrinfocount->fetch();
                                                    echo $rowCount['numrow'];
                                                  }
                                                  ?>
                                                </td>
                                                <td class="hidden-xs" style="vertical-align:top;">
                                                <?php
                                                $strSQL = "SELECT * FROM ".$tbprefix."product_attribute_detail WHERE pa_id = ?";
                                                $resultAttrinfocount = $db->select($strSQL,array($value['pa_id']));
                                                if($resultAttrinfocount){
                                                  echo "<ul>";
                                                  foreach($resultAttrinfocount as $v){
                                                    ?>
                                                    <li><?php echo $v['pa_detail']; ?></li> | Edit | Delete
                                                    <?php
                                                  }
                                                  echo "</ul>";
                                                }else{
                                                  echo "-";
                                                }
                                                ?></td>
                                                <td class="text-center" style="vertical-align:top;">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-large" title="Add attribute" type="button" onclick="Javascript:refillID('<?php echo $value['pa_id']; ?>')"><i class="fa fa-plus"></i></button>
                                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client" onclick="Javascript:redirect('manage_product.php?p=<?php echo $value['product_id']; ?>')"><i class="fa fa-wrench"></i></button>
                                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="ion-close"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                          }
                                        }
                                        ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>

                            </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </main>

            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->

        <!-- Apps Modal -->
        <!-- Large Modal -->
                    <div class="modal" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form class="js-validation-bootstrap-mini1 form-horizontal" id="attr-info-form" method="post" onsubmit="return false;">
                                <div class="card-header bg-green bg-inverse">
                                    <h4>Attribute information</h4>
                                    <ul class="card-actions">
                                        <li>
                                            <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-block">

                                     <div class="form-group">
                                       <label class="col-md-3 control-label" for="val-username">Attribute ID <span class="text-orange">*</span></label>
                                       <div class="col-md-8">
                                           <input class="form-control" readonly type="text" id="val-id" name="val-id" placeholder="Choose a nice username..." />
                                       </div>
                                     </div>

                                     <div class="form-group">
                                       <label class="col-md-3 control-label" for="val-username">Attribute detail <span class="text-orange">*</span></label>
                                       <div class="col-md-8">
                                           <textarea class="form-control" id="val-detail" name="val-detail" rows="5" placeholder="Enter detail ..."></textarea>
                                       </div>
                                     </div>

                                     <div class="form-group">
                                       <label class="col-md-3 control-label" for="val-username">Price <span class="text-orange">*</span></label>
                                       <div class="col-md-8">
                                           <input class="form-control" type="text" id="val-price" name="val-price" placeholder="Enter attribute price ..." value="0" />
                                       </div>
                                     </div>

                                     <div class="form-group">

                                       <div class="col-xs-12">
                                         <label for="" class="col-md-3 control-label fw300">Recommandation</label>
                                           <label class="css-input css-radio css-radio-primary m-r-sm">
                             								<input type="radio" name="radio-group13" value="N" checked /><span></span> No
                             							</label>
                                           <label class="css-input css-radio css-radio-primary">
                             								<input type="radio" name="radio-group13" value="Y" /><span></span> Yes
                             							</label>
                                       </div>
                                     </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-sm btn-app" type="submit" ><i class="ion-checkmark"></i> Save</button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Large Modal -->

        <div class="app-ui-mask-modal"></div>

        <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.placeholder.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/app-custom.js"></script>

        <!-- Page Plugins -->
        <script src="assets/js/plugins/slick/slick.min.js"></script>
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/base_tables_datatables.js"></script>
        <script src="page/product_base_forms_validation.js"></script>
        <!-- Page JS Code -->
        <!-- <script src="assets/js/pages/index.js"></script> -->
        <script>
            $(function()
            {
                // Init page helpers (Slick Slider plugin)
                App.initHelpers('slick');

                $('#btnAddAttr').click(function(){
                  if($('#product_attr_name').val()==''){
                    $('#r_attr').addClass('has-error');
                  }else{
                    $stage = $.post('controller/insert-attribute.php', {id: $('#product_id').val(), attr: $('#product_attr_name').val()});
                    $stage.always(function(result){
                      if(result=='Y'){
                        location.reload();
                      }else if (result=='Session denine!') {
                        window.location = '../';
                      }else{
                        alert(result);
                      }
                    });
                  }
                });

                $('#attr-info-form').submit(function(){
                  // if(($('#')))
                  if(($('#val-id').val()!='') && ($('#val-detail').val()!='') && ($('#val-price').val()!='')){
                    $rm = $('input[name=radio-group13]:checked', '#attr-info-form').val();
                    $stages = $.post('controller/insert-attribute-info.php',
                              {
                                id: $('#val-id').val(),
                                detail: $('#val-detail').val(),
                                recommand: $rm,
                                price: $('#val-price').val()
                              });
                    $stages.always(function(result){
                      if(result=='Y'){
                        location.reload();
                      }else if (result=='Session denine!') {
                        window.location = './signout.php';
                      }else{
                        alert(result);
                      }
                    });
                  }else{
                    return false;
                  }
                });
            });

            function refillID(paid){
              $('#val-id').val(paid);
            }
        </script>

    </body>

</html>
