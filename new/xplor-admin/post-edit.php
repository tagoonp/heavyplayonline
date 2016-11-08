<?php
session_start();
session_regenerate_id();

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

$postvalue = '';

if(!isset($_GET['id'])){
  header('Location: ./');
  die();
}

$strSQL = "SELECT * FROM ".$tbprefix."post WHERE post_id = ?";
$resultPost = $db->select($strSQL,array($_GET['id']));
if(!$resultPost){
  header('Location: ./');
  die();
}

$rowPost = $resultPost->fetch();
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
        <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css" />
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

                                <li class="nav-item">
                                    <a href="./"><i class="ion-ios-speedometer-outline"></i> Dashboard</a>
                                </li>

                                <li class="nav-item <?php if(isset($_GET['type'])){ if($_GET['type']=='post'){ echo "active"; } }?>">
                                    <a href="post.php?type=post"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Posts</a>
                                </li>

                                <li class="nav-item <?php if(isset($_GET['type'])){ if($_GET['type']=='page'){ echo "active"; } }?>">
                                    <a href="post.php?type=page"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Pages</a>
                                </li>

                                <li class="nav-item">
                                    <a href="upload.php"><i class="fa fa-photo" aria-hidden="true"></i> Media</a>
                                </li>

                                <li class="nav-item nav-drawer-header">E-commerce</li>

                                <li class="nav-item">
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
                      					<?php
                                if($_GET['type']=='page'){
                                  echo "Pages";
                                }else if($_GET['type']=='post'){
                                  echo "Posts";
                                }
                                ?>
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
                      <div class="col-md-12">
                        <form class="js-validation-bootstrap form-horizontal" id="postform" action="controller/update-post-full.php"  method="post">
                        <div class="row" style="margin-top: 20px;">
                          <div class="col-sm-8">
                            <div class="card">
                              <div class="card-header">
                                  <h4>Add new
                                    <?php
                                    if($_GET['type']=='page'){
                                      echo "page";
                                    }else if($_GET['type']=='post'){
                                      echo "post";
                                    }
                                    ?></h4>
                              </div>
                              <div class="card-block">

                                <div class="form-group" style="display:none;">
                                  <label class="col-md-12" for="val-username">Postid <span class="text-orange">*</span></label>
                                  <div class="col-md-12">
                                      <input type="text" readonly name="txt-id" id="txt-id" value="<?php echo $_GET['id'];?>" class="form-control">
                                  </div>
                                </div>

                                  <div class="form-group" style="display:none;">
                                    <label class="col-md-12" for="val-username">Posttype <span class="text-orange">*</span></label>
                                    <div class="col-md-12">
                                        <input type="text" readonly name="txt-postype" id="txt-postype" value="<?php echo $_GET['type'];?>" class="form-control">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-md-12" for="val-username">Title <span class="text-orange">*</span></label>
                                    <div class="col-md-12">
                                        <input type="text" name="txt-title" id="txt-title" value="<?php echo $rowPost['post_title'];?>" class="form-control">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-md-12" for="val-username">Description / Content <span class="text-orange">*</span></label>
                                    <div class="col-md-12">
                                        <textarea name="txt-detail" id="txt-detail" rows="10" cols="40"  class="form-control"><?php echo $rowPost['post_content'];?></textarea>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- End con-md-8 -->

                          <div class="col-md-4">
                            <div class="card">
                              <div class="card-header bg-blue bg-inverse" style="padding: 15px 20px;">
                                <h4>Publish</h4>
                              </div>
                              <div class="card-block" style="font-size: 1.0em;">
                                <p>
                                  <i class="ion-eye"></i> Visibility : <strong><span id="visibilityValue">
                                    <?php
                                    if($postvalue){
                                      if($postvalue['visibility']=='public'){
                                        echo "Public";
                                      }else if($postvalue['visibility']=='password'){
                                        echo "Protected";
                                      }else{
                                        echo "Private";
                                      }
                                    }else{
                                      echo "Public";
                                    }
                                    ?>
                                  </span>

                                  </strong>&nbsp;&nbsp;<a href="javascript:toggleDiv('visibleDiv')">Edit</a><br>
                                  <div class="" style="padding: 10px 0px; display:none;" id="visibleDiv">
                                    <label class="css-input css-radio css-radio-info m-r-sm">
                      								<input type="radio" name="radio-group3" id="v1" checked value="public" /><span></span> Public
                      							</label>
                                    <br>
                                    <label class="css-input css-radio css-radio-info">
                      								<input type="radio" name="radio-group3" id="v2" value="password" /><span></span> Password protected
                      							</label>
                                    <br>
                                    <label class="css-input css-radio css-radio-info">
                      								<input type="radio" name="radio-group3" id="v3" value="private" /><span></span> Private
                      							</label><br><br>
                                    <button type="button" name="button" class="btn btn-app-teal" style="font-size: 0.8em;">Save</button>
                                    <button type="button" name="button" class="btn btn-app-light" style="font-size: 0.8em;" onclick="javascript:toggleDiv2('visibleDiv')">Cancel</button>
                                  </div>
                                </p>
                                <p>
                                  <i class="ion-calendar"></i>  Publish : <strong><span id="publicValue">Intermediately</span></strong>&nbsp;&nbsp;<a href="javascript:toggleDiv('publicDiv')">Edit</a>
                                  <div class="" style="padding: 10px 0px; display:none;" id="publicDiv">
                                    <input class="js-datepicker form-control" type="text" id="txt-publicdate" name="txt-publicdate" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>">

                                    <button type="button" name="button" class="btn btn-app-teal" style="font-size: 0.8em;">Save</button>
                                    <button type="button" name="button" class="btn btn-app-light" style="font-size: 0.8em;" onclick="javascript:toggleDiv2('publicDiv')">Cancel</button>
                                  </div>
                                </p>

                              </div>
                              <div class="card-block text-right" style="padding: 10px 20px; background: rgb(238, 238, 238);">
                                <button type="btn" name="button" id="btnSubmit" class="btn btn-app-cyan">Publish</button>
                              </div>
                            </div>
                          </div>
                          <!-- End col-md-4 -->


                          </div>
                        </form>
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
        <!-- Opens from the button in the header -->
        <div id="apps-modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps card -->
                    <div class="card m-b-0">
                        <div class="card-header bg-app bg-inverse">
                            <h4>Apps</h4>
                            <ul class="card-actions">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-block">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a class="card card-block m-b-0 bg-app-secondary bg-inverse" href="./">
                                        <i class="ion-speedometer fa-4x"></i>
                                        <p>Admin</p>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="card card-block m-b-0 bg-app-tertiary bg-inverse" href="frontend_home.html">
                                        <i class="ion-laptop fa-4x"></i>
                                        <p>Frontend</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- .card-block -->
                    </div>
                    <!-- End Apps card -->
                </div>
            </div>
        </div>
        <!-- End Apps Modal -->

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
        <script src="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="../ext-lib/ckeditor/ckeditor.js"></script>
        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="page/post_base_forms_validation.js"></script>
        <!-- Page JS Code -->
        <script src="page/post-edit.js"></script>
        <script>
            $(function()
            {
                // Init page helpers (Slick Slider plugin)
                // App.initHelpers('slick');
                App.initHelpers(['datepicker', 'slick']);
            });
        </script>

    </body>

</html>
