$(document).ready(function(){

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
