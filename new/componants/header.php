<?php
if($activeSession){
  if($_SESSION[$sess.'Utype']=='1'){
    include "componants/admin/menu.php";
  }else{
    ?>
    <!-- HEADER AREA -->
      <div class="header-area">
        <div class="header-top-bar">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="header-top-left">
                  <div class="header-top-menu">
                    <ul class="list-inline">
                      <li><img src="img/flag.png" alt="flag"></li>
                      <li class="thfont">ภาษาไทย</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="header-top-right">
                  <ul class="list-inline">
                    <li><a href="#"><i class="fa fa-user"></i>My Account</a></li>
                    <li><a href="#"><i class="fa fa-heart"></i>Wishlist</a></li>
                    <li><a href="checkout.html"><i class="fa fa-check-square-o"></i>Checkout</a></li>
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
    <?php
  }
}else{
  ?>
  <!-- HEADER AREA -->
    <div class="header-area">
      <div class="header-top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="header-top-left">
                <div class="header-top-menu">
                  <ul class="list-inline">
                    <li><img src="img/flag.png" alt="flag"></li>
                    <li class="thfont">ภาษาไทย</li>
                    <!-- <li class="dropdown"><a href="#" data-toggle="dropdown">English</a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Spanish</a></li>
                        <li><a href="#">China</a></li>
                      </ul>
                    </li> -->
                    <!-- <li class="dropdown"><a href="#" data-toggle="dropdown">USD</a>
                      <ul class="dropdown-menu usd-dropdown">
                        <li><a href="#">USD</a></li>
                        <li><a href="#">GBP</a></li>
                        <li><a href="#">EUR</a></li>
                      </ul>
                    </li> -->
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="header-top-right">
                <ul class="list-inline">
                  <li class="thfont"><a href="#"><i class="fa fa-lock"></i>เข้าสู่ระบบ</a></li>
                  <li class="thfont"><a href="#"><i class="fa fa-pencil-square-o"></i>ลงทะเบียน</a></li>
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
                      <select class="thfont">
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

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- MAIN MENU AREA -->
  <?php
}
?>
