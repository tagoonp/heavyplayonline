$(document).ready(function(){
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
