  <div class="header-area" style="position: fixed; width: 100%; z-index: 999999;">
    <div class="header-top-bar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="header-top-left">
              <div class="header-top-menu">
                <ul class="list-inline">
                  <li class="thfont"><a href="http://heavyplayonline.com" target="_blank">Heavyplayonline.com</a></li>
                  <li class="thfont"><a href="../xplor-admin/">Dashboard</a></li>
                  <li class="thfont"><a href="#">Comments</a></li>
                  <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-plus"></i> New</a>
                    <ul class="dropdown-menu usd-dropdown">
                      <li><a href="../xplor-admin/post.php">Post</a></li>
                      <li><a href="../xplor-admin/page.php">Pages</a></li>
                      <li><a href="../xplor-admin/category.php">Categories</a></li>
                      <li><a href="../xplor-admin/product.php">Products</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="header-top-right">
              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-user"></i>Howdy,
                  <?php
                  if($userinfo['fname']==''){
                    echo $userinfo['acc_email'];
                  }else{
                    echo $userinfo['fname']." ".$userinfo['lname'];
                  }
                  ?>
                  </a></li>
                <li class="thfont"><a href="../signout.php"><i class="fa fa-lock"></i>ออกจากระบบ</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- MAIN MENU AREA -->
