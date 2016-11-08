<?php
if($activeSession){
  ?><div class="memberPanal">
  <h2 class="thfont" style="font-size: 1.3em; color: rgb(19, 143, 176)"><span style="font-size: 1.5em;">ยินดีต้อนรับ</span></h2>
  <div class="row">
    <div class="col-md-12" style="font-size: 18px;">
      <?php
      if($userinfo['fname']==''){
        echo $userinfo['acc_email'];
      }else{
        echo $userinfo['fname']." ".$userinfo['lname'];
      }
      ?>
    </div>
  </div>
  <div class="row" style="padding-top: 17px;">
    <div class="col-md-12 text-left">
      <ul class="subusermenu">
        <li class="thfont"><a href="#">&bull; ข้อมูลส่วนตัว</a></li>
        <li class="thfont"><a href="#">&bull; เปลี่ยนรหัสผ่าน</a></li>
        <li class="thfont"><a href="#">&bull; ตะกร้าสินค้า</a></li>
        <li class="thfont"><a href="quotation.php">&bull; ขอใบเสนอราคา</a></li>
        <li class="thfont"><a href="#">&bull; แจ้งชำระเงิน</a></li>
        <li class="thfont"><a href="signout.php">&bull; ออกจากระบบ</a></li>
      </ul>
    </div>
  </div></div>
  <?php
}else{
  ?>
  <div class="memberPanal">
    <h2 class="thfont" style="font-size: 1.3em; color: rgb(19, 143, 176)"><span style="font-size: 1.5em;">เข้าสู่ระบบ</span></h2>
    <form class="loginForm" action="./" method="post" autocomplete="off" onsubmit="return false;">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group" id="req-username">
            <input type="text" class="form-control" id="txt-username" name="txt-username" placeholder="กรอกอีเมลที่ใช้">
          </div>
        </div>
      </div>
      <div class="row" style="padding-top: 7px;">
        <div class="col-md-12">
          <div class="form-group" id="req-password">
            <input type="password" class="form-control" id="txt-password" name="txt-password" placeholder="กรอกรหัสผ่าน">
          </div>
        </div>
      </div>
      <div class="row" style="padding-top: 7px;">
        <div class="col-md-12">
          <button type="submit" id="btnSubmitLogin" class="btn btn-warning btn-block thfont">เข้าสู่ระบบ</button>
        </div>
      </div>
      <div class="row" style="padding-top: 7px;">
        <div class="col-md-12 text-center">
          <a href="my-account.php" class="thfont">สมัครสมาชิก</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="thfont">ลืมรหัสผ่าน</a>
        </div>
      </div>
      <hr class="custom">
      <div class="row">
        <div class="col-sm-12">
          <button type="button" name="button" class="btn btn-primary btn-block thfont" style="font-weight: 500; font-size:20px;">Facebook login</button>
        </div>
      </div>
    </form>
  </div>
  <?php
}
?>
<div class="" style="padding-top: 20px;">
  <a href="#" target="_blank"><img src="img/heavyplayonline-lineadd.png" alt="" /></a>
</div>
