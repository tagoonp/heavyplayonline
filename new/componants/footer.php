<!-- Footer AREA -->
<div class="footer-area" style="margin-top: 30px;">
  <div class="footer-top" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="footer-info-card">
            <div class="footer-logo">
              <a href="index.html"><img src="img/heavyplayonline-logo.png" alt="logo"></a>
            </div>
            <p class="thfont">
              We sell everything about Alienware Gaming Notebook<br>
              ขาย ทุกอย่างเกี่ยวกับ Alienware ครับผม
              Gaming Notebook Notebook Desktop เลือกซื้อสเปคได้ตามใจชอบคับ
            </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu-area">
            <h2 class="footer-heading thfont" style="">ข้อมูล</h2>
            <div class="footer-menu">
              <ul>
                <?php
                $strSQL = "SELECT * FROM ".$tbprefix."menus WHERE mn_level = ? AND mn_status = ?";
                $resultMn = $db->select($strSQL, array('1','Y'));
                if($resultMn){
                  foreach ($resultMn as $value) {
                    ?>
                    <li><a href="<?php echo $value['mn_link']; ?>" class="thfont"><i class="fa fa-angle-right"></i><?php echo $value['mn_text']; ?></a></li>
                    <?php
                  }
                }
                ?>
                <!-- <li><a href="#" class="thfont"><i class="fa fa-angle-right"></i>หน้าแรก</a></li>
                <li><a href="#" class="thfont"><i class="fa fa-angle-right"></i>สินค้า</a></li>
                <li><a href="#" class="thfont"><i class="fa fa-angle-right"></i>เกี่ยวกับเรา</a></li>
                <li><a href="#" class="thfont"><i class="fa fa-angle-right"></i>ติดต่อเรา</a></li> -->
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6">
          <div class="contact-info-area">
            <h2 class="footer-heading thfont">ติดต่อเรา</h2>
            <div class="row">
              <div class="col-sm-6">
                <div class="contact-info">
                  <div class="contanct-details">
                    <div class="info-icon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <div class="info-content">
                      <p style="padding-top: 12px;">(+66) 090-8933321</p>
                    </div>
                  </div>
                  <div class="contanct-details">
                    <div class="info-icon">
                      <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="info-content">
                      <p style="padding-top: 12px;">heavyplayonline@gmail.com</p>
                    </div>
                  </div>
                  <div class="contanct-details">
                    <div class="info-icon">
                      <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="info-content">
                      <p>68 Dohava Stress, Lorem isput Spust, New York- US</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="contact-info">
                  <div class="contanct-details">
                    <div class="row">
                      <div class="col-sm-2">
                        <div class="info-icon">
                          <i class="fa fa-facebook-official" aria-hidden="true"></i>
                        </div>
                      </div>
                      <div class="col-sm-10">
                        <p style="padding-top: 12px;">
                          <a href="https://www.facebook.com/AlienwareResellerThailand/" target="_blank" style="color: #fff;">https://www.facebook.com/<br>AlienwareResellerThailand/</a>
                        </p>
                      </div>
                    </div>


                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="copyright">
            Copyrignt@2016 <a href="http://www.wisnior.com/" target="_blank" style="color: rgb(255, 207, 0)">Wisnior.com</a> | Theme by <a href="http://bootexperts.com/" target="_blank">BootExperts</a>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="footer-social-icon">
            <ul class="list-inline">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
