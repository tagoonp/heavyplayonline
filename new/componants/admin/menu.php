  <div class="header-area">
    <div class="header-top-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="header-top-left">
              <div class="header-top-menu">
                <ul class="list-inline">
                  <li class="thfont"><a href="http://heavyplayonline.com">Heavyplayonline.com</a></li>
                  <li class="thfont"><a href="./xplor-admin/">Dashboard</a></li>
                  <li class="thfont"><a href="#">Comments</a></li>
                  <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-plus"></i> New</a>
                    <ul class="dropdown-menu usd-dropdown">
                      <li><a href="./xplor-admin/post.php">Post</a></li>
                      <li><a href="./xplor-admin/page.php">Pages</a></li>
                      <li><a href="./xplor-admin/category.php">Categories</a></li>
                      <li><a href="./xplor-admin/product.php">Products</a></li>
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
                <li class="thfont"><a href="./signout.php"><i class="fa fa-lock"></i>ออกจากระบบ</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-sm-2 col-xs-12">
            <div class="header-logo">
              <a href="index.html"><img src="img/heavyplayonline-logo.png" alt="logo"></a>
            </div>
          </div>
          <div class="col-md-10 col-sm-10 col-xs-12">
            <div class="search-chart-list">
              <div class="catagori-menu">
                <ul class="list-inline">
                  <li><i class="fa fa-search"></i></li>
                  <li>
                    <select  class="thfont">
                      <option value="สินค้าทุกประเภท">สินค้าทุกประเภท</option>

                      <?php
                      if($resultCategory){
                        foreach ($resultCategory as $value) {
                          ?>
                          <option value="<?php echo $value['cat_id']; ?>"><?php echo $value['cat_name']; ?></option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                  </li>
                </ul>
              </div>
              <div class="header-search">
                <form action="#">
                  <input type="text" placeholder="My Search"/>
                  <button type="button"><i class="fa fa-search"></i></button>
                </form>
              </div>
              <div class="header-chart">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                  <li class="chart-li"><a href="#">My cart</a>
                    <ul>
                                              <li>
                                                  <div class="header-chart-dropdown">
                                                      <div class="header-chart-dropdown-list">
                                                          <div class="dropdown-chart-left floatleft">
                                                              <a href="#"><img src="img/product/best-product-1.png" alt="list"></a>
                                                          </div>
                                                          <div class="dropdown-chart-right">
                                                              <h2><a href="#">Feugiat justo lacinia</a></h2>
                                                              <h3>Qty: 1</h3>
                                                              <h4>£80.00</h4>
                                                          </div>
                                                      </div>
                                                      <div class="header-chart-dropdown-list">
                                                          <div class="dropdown-chart-left floatleft">
                                                              <a href="#"><img src="img/product/best-product-2.png" alt="list"></a>
                                                          </div>
                                                          <div class="dropdown-chart-right">
                                                              <h2><a href="#">Aenean eu tristique</a></h2>
                                                              <h3>Qty: 1</h3>
                                                              <h4>£70.00</h4>
                                                          </div>
                                                      </div>
                          <div class="chart-checkout">
                            <p>subtotal<span>£150.00</span></p>
                            <button type="button" class="btn btn-default">Chckout</button>
                          </div>
                                                  </div>
                                              </li>
                                          </ul>
                  </li>
                  <li><a href="#">2 items</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- MAIN MENU AREA -->
