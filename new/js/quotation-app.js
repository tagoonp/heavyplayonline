$(function(){
  $('#quotationForm').submit(function(){

    $('.form-control').removeClass('has-error');

    if(($('#val-suggestions').val()!='') && ($('#val-password').val()!='') && ($('#val-name').val()!='') && ($('#val-email').val()!='')){
      $stage = $.post('controller/insert-qoutation.php',{ information: $('#val-suggestions').val(), pwd: $('#val-password').val(), name: $('#val-name').val(), email: $('#val-email').val()});
      $stage.always(function(result){
        if(result=='Y'){
          location.reload();
        }else if (result == '') {
          alert('ไม่สามารถเพิ่มข้อมูลได้');
        }else{
          alert(result);
        }
      });
    }else{

      if($('#val-name').val()==''){
        $('#req_3').addClass('has-error');
      }

      if($('#val-email').val()==''){
        $('#req_4').addClass('has-error');
      }

      if($('#val-suggestions').val()==''){
        $('#req_1').addClass('has-error');
      }

      if($('#val-password').val()==''){
        $('#req_2').addClass('has-error');
      }
    }
  });
});
