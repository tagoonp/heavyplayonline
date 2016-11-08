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
                      					Categories
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
                      <div class="col-sm-4">
                          <h3 class="thfont fw400">Add new categories</h3>
                          <div class="row">
                            <div class="form-group">
                              <div class="col-sm-12">
                                <label for="" class="fw300">Category's name</label>
                                <input type="text" name="name" value="" class="form-control">
                                <p class="input-hint">
                                  The name is how it appears on your site.
                                </p>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-12">
                                <label for="" class="fw300">Slug</label>
                                <input type="text" name="name" value="" class="form-control">
                                <p class="input-hint">
                                  The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.
                                </p>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-12">
                                <label for="" class="fw300">Parent</label>
                                <select name="name" value="" class="form-control">
                                  <option value="1" selected="">None</option>
                                  <?php
                                  $strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_status = ? AND cat_level = ?";
                                  $resultCategoryL1 = $db->select($strSQL,array('Y','1'));
                                  if($resultCategoryL1){
                                    foreach ($resultCategoryL1 as $value) {
                                      ?>
                                      <option value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
                                      <?php
                                    }
                                  }
                                  ?>
                                </select>
                                <p class="input-hint">
                                  Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.
                                </p>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-12">
                                <label for="" class="fw300">Description</label>
                                <textarea name="name" rows="4" cols="40"  class="form-control"></textarea>
                                <p class="input-hint">
                                  The description is not prominent by default; however, some themes may show it.
                                </p>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-12">
                                <button type="button" name="button" class="btn btn-primary">Add new category</button>
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="col-sm-8">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h4>Dynamic Table - Full</h4>
                            </div> -->
                            <div class="card-block">
                              <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Category's name</th>
                                        <th class="hidden-xs w-20">Slug</th>
                                        <th class="hidden-xs w-20">Count</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_level = ?";
                                  $resultCategory = $db->select($strSQL,array('1'));
                                  if($resultCategory){
                                    $c = 1;
                                    foreach($resultCategory as $value){
                                      ?>
                                      <tr>
                                          <td class="text-center"><?php echo $c; $c++;?></td>
                                          <td class="font-500"><a href="#" style="font-weight: ;"><?php echo $value['cat_name']; ?></a></td>
                                          <td class="hidden-xs"><?php echo $value['cat_slug']; ?></td>
                                          <td class="hidden-xs"><?php
                                          $strSQL = "SELECT count(*) as numproduct FROM ".$tbprefix."product WHERE cat_id = ?";
                                          $resultNumProduct = $db->select($strSQL,array($value['cat_id']));
                                          if($resultNumProduct){
                                            echo $resultNumProduct[0]['numproduct'];
                                          }else{
                                            echo "0";
                                          }
                                          ?></td>
                                          <td class="text-center">
                                              <div class="btn-group">
                                                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="ion-edit"></i></button>
                                                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="ion-close"></i></button>
                                              </div>
                                          </td>
                                      </tr>
                                      <?php

                                      $strSQL = "SELECT * FROM ".$tbprefix."category WHERE cat_level = ? AND 	cat_parent_id = ?";
                                      $resultCategoryL2 = $db->select($strSQL,array('2', $value['cat_id']));

                                      if($resultCategoryL2){
                                        foreach ($resultCategoryL2 as $value2) {
                                          ?>
                                          <tr>
                                              <td class="text-center"><?php echo $c; $c++;?></td>
                                              <td class="font-500"><a href="#" style="font-weight: ;"><?php echo "--- ".$value2['cat_name']; ?></a></td>
                                              <td class="hidden-xs"><?php echo $value2['cat_slug']; ?></td>
                                              <td class="hidden-xs"><?php
                                              $strSQL = "SELECT count(*) as numproduct FROM ".$tbprefix."product WHERE cat_id = ?";
                                              $resultNumProduct = $db->select($strSQL,array($value2['cat_id']));
                                              if($resultNumProduct){
                                                echo $resultNumProduct[0]['numproduct'];
                                              }else{
                                                echo "0";
                                              }
                                              ?></td>
                                              <td class="text-center">
                                                  <div class="btn-group">
                                                      <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="ion-edit"></i></button>
                                                      <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="ion-close"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                          <?php
                                        }
                                      }

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

        <!-- Page JS Code -->
        <script src="assets/js/pages/base_tables_datatables.js"></script>
        <!-- Page JS Code -->
        <!-- <script src="assets/js/pages/index.js"></script> -->
        <script>
            $(function()
            {
                // Init page helpers (Slick Slider plugin)
                App.initHelpers('slick');
            });
        </script>

    </body>

</html>
