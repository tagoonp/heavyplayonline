window.fbAsyncInit = function() {
    FB.init({
      appId      : '1023773327731727',
      xfbml      : true,
      version    : 'v2.6'
    });
};

(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function statusChangeCallback(response, stage) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      if(stage=='login'){
        testAPI();
      }

    } else if (response.status === 'not_authorized') {
      console.log('Please log ' + 'into this app.');
    } else {
      // console.log('Please log ' + 'into Facebook.');
      // location.reload();
      // FB.logout(function(response){
      //   location.reload();
      // });
      window.location = './signout.php';
    }
  }

  var testAPI = function() {
     console.log('Welcome!  Fetching your information.... ');
     FB.api('/me',{ locale: 'en_US', fields: 'id, first_name, last_name, email' }, function(response) {
       // console.log('Successful login for: ' + response.name);
       // document.getElementById('status').innerHTML =
       //   'Thanks for logging in, ' + response.name + '!';
       $stagepost = $.post('controller/fb-login.php', {fbpost: response});
       $stagepost.always(function(result){
         if(result=='Y'){
           // window.location = './';
         }else{
           alert('ไม่สามารถเข้าสู่ระบบได้');
         }
       });
     });
   }

$(document).ready(function(){

  $('#btnFbLogin').click(function(){
    // FB.getLoginStatus(function(response) {
    //   if (response.status === 'connected') {
    //     console.log('Connected');
    //   }else{
    //     FB.login();
    //     testAPI();
    //   }
    //   // statusChangeCallback(response);
    // });
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response, 'login');
    });
  });

  $('#btnFbLogout').click(function(){
    // FB.logout(function(response){
    //   location.reload();
    // });
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response, 'logout');
    });
  });

  $('.registerForm').submit(function(){
      $check = 0;
      $('.form-control').removeClass('has-error');
      $('.RegisterResponce').hide();
      $('.RegisterResponce').text('');

      if($('#txt-username2').val()==''){
        $check++;
        $('#req-username2').addClass('has-error');
      }

      if($('#txt-password2').val()==''){
          $check++;
        $('#req-password2').addClass('has-error');
      }

      if($('#txt-password22').val()==''){
          $check++;
        $('#req-password22').addClass('has-error');
      }

      if($('#txt-password2').val()!=$('#txt-password22').val()){
          $check++;
        $('#req-password22').addClass('has-error');
      }

      if($check==0){
        $stage = $.post('controller/register.php', {username : $('#txt-username2').val(), password : $('#txt-password2').val()});
        $stage.always(function(result){
          if(result=='Y'){
            $stage = $.post('controller/check-login.php', {username: $('#txt-username2').val(), password: $('#txt-password2').val()});
            $stage.always(function(result){
              if(result=='Y'){
                window.location = './';
              }else{
                swal({
                  title: "ไม่สามารถเข้าสู่ระบบได้",
                  text: 'กรุณากรอกชื่อบัญบีผู้ใช้ให้ถูกต้อง!',
                  type: "warning",
                  showCancelButton: false,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "ตกลง",
                  closeOnConfirm: false
                }, function(){
                  window.location = './';
                });
                return false;
              }
            });
          }else{
            $('.RegisterResponce').show();
            $('.RegisterResponce').text(result);
          }
        });
      }
  });

  $('.loginForm').submit(function(){
    $check = true;
    if($('#txt-username').val()==''){
      $check = false;
    }

    if($('#txt-password').val()==''){
      $('#req-password').addClass('has-error');
      $check = false;
    }

    if($check){
      $stage = $.post('controller/check-login.php', {username: $('#txt-username').val(), password: $('#txt-password').val()});
      $stage.always(function(result){
        if(result=='Y'){
          location.reload();
        }else{
          swal({
            title: "ไม่สามารถเข้าสู่ระบบได้",
            text: 'กรุณากรอกชื่อบัญบีผู้ใช้ให้ถูกต้อง!',
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ตกลง",
            closeOnConfirm: false
          }, function(){
            location.reload();
          });
          return false;
        }
      });
    }else{
      $('#req-username').addClass('has-error');
      $('#req-password').addClass('has-error');
      $('#btnSubmitLogin').blur();
      return false;
    }
  });
});

function redirect(url){
  window.location = url;
}
