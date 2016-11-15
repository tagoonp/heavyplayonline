<script>
  // This is called with the results from from FB.getLoginStatus().


  // function statusChangeCallback(response) {
  //   if (response.status === 'connected') {
  //     // FB.logout(function(response) {
  //     //               // this part just clears the $_SESSION var
  //     //               // replace with your own code
  //     //               $.post("/logout").done(function() {
  //     //                   $('#status').html('<p>Logged out.</p>');
  //     //               });
  //     //           });
  //     // Logged into your app and Facebook.
  //     testAPI();
  //
  //   } else if (response.status === 'not_authorized') {
  //     // The person is logged into Facebook, but not your app.
  //     // document.getElementById('status').innerHTML = 'Please log ' +
  //     //   'into this app.';
  //   } else {
  //     // The person is not logged into Facebook, so we're not sure if
  //     // they are logged into this app or not.
  //     // document.getElementById('status').innerHTML = 'Please log ' +
  //     //   'into Facebook.';
  //   }
  // }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  // function checkLoginState() {
  //   FB.getLoginStatus(function(response) {
  //     statusChangeCallback(response);
  //   });
  // }



  // window.fbAsyncInit = function() {
  //   FB.init({
  //     appId      : '1023773327731727',
  //     xfbml      : true,
  //     version    : 'v2.6'
  //   });


  // FB.getLoginStatus(function(response) {
  //   statusChangeCallback(response);
  // });

  // FB.logout(function (response) {
  //     //Do what ever you want here when logged out like reloading the page
  //     window.location.reload();
  // });

  // };

  // Load the SDK asynchronously
  // (function(d, s, id) {
  //   var js, fjs = d.getElementsByTagName(s)[0];
  //   if (d.getElementById(id)) return;
  //   js = d.createElement(s); js.id = id;
  //   js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1023773327731727";
  //   fjs.parentNode.insertBefore(js, fjs);
  // }(document, 'script', 'facebook-jssdk'));

  // (function(d, s, id){
  //    var js, fjs = d.getElementsByTagName(s)[0];
  //    if (d.getElementById(id)) {return;}
  //    js = d.createElement(s); js.id = id;
  //    js.src = "//connect.facebook.net/en_US/sdk.js";
  //    fjs.parentNode.insertBefore(js, fjs);
  //  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  // function testAPI() {
  //   console.log('Welcome!  Fetching your information.... ');
  //   FB.api('/me',{ locale: 'en_US', fields: 'id, first_name, last_name, email' }, function(response) {
  //     // console.log('Successful login for: ' + response.name);
  //     // document.getElementById('status').innerHTML =
  //     //   'Thanks for logging in, ' + response.name + '!';
  //     $stagepost = $.post('controller/fb-login.php', {fbpost: response});
  //     $stagepost.always(function(result){
  //       if(result=='Y'){
  //         // window.location = './';
  //       }else{
  //         alert('ไม่สามารถเข้าสู่ระบบได้');
  //       }
  //     });
  //   });
  // }

  // function fbLogout() {
  //
  //   }

  // function fbLogoutUser() {
  //   console.log('asd');
  //   FB.getLoginStatus(function (response) {
  //     if (response && response.status === 'connected') {
  //       FB.logout();
  //       console.log('logout');
  //     }else{
  //       FB.logout();
  //       console.log('logout2');
  //     }
  //   });
  // }

</script>
<?php
// require 'ext-lib/sdk/facebook.php';
//
// $facebook = new Facebook(array(
//   'appId'  => '1023773327731727',
//   'secret' => '75162ef2ebb6b864347d3d07a44de54a',
// ));

// $user = $facebook->getUser();
//
// if ($user) {
//   try {
//     $user_profile = $facebook->api('/me');
//   } catch (FacebookApiException $e) {
//     error_log($e);
//     $user = null;
//   }
// }
//
// if ($user) {
//   $logoutUrl = $facebook->getLogoutUrl();
// }
//
// if(isset($_GET['action']) && $_GET['action'] === 'logout'){
//   $facebook->destroySession();
//   header("location: ./");
//   exit();
// }

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
        <?php
        if($userinfo['acc_regby']=="Normal"){
          ?>
          <li class="thfont"><a href="signout.php">&bull; ออกจากระบบ</a></li>
          <?php
        }else{
          ?>
          <!-- <li class="thfont"><a href="Javascript:fbLogoutUser();">&bull; ออกจากระบบ</a></li> -->
          <li class="thfont"><a href="#" id="btnFbLogout">&bull; ออกจากระบบ</a></li>
          <?php
        }
        ?>

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
        <div class="col-sm-12 text-center">
          <!-- <a href="login-fb.php"><button type="button" name="button" class="btn btn-primary btn-block thfont" style="font-weight: 500; font-size:20px;">Facebook login</button></a> -->

          <!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
          <div>
            Login with facebook
          </div>
          </fb:login-button> -->
          <a href="<?php echo $loginUrl;?>" id="btnFbLogin__" class="btn btn-primary btn-block">Login with facebook</a>
          <!-- <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false"> Login with facebook</div> -->
          <div id="status">

          </div>
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
