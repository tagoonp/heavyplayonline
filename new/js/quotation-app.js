$(function(){
  $('#quotationForm').submit(function(){

    $('.form-control').removeClass('has-error');

    if(($('#val-suggestions').val()!='') && ($('#val-password').val()!='')){
      $stage = $.post('controller/insert-qoutation.php',{ information: $('#val-suggestions').val(), pwd: $('#val-password').val()});
      $stage.always(function(result){
        if(result=='Y'){

        }else if (result == '') {

        }else{
          alert(result);
        }
      });
    }else{
      if($('#val-suggestions').val()==''){
        $('#req_1').addClass('has-error');
      }

      if($('#val-password').val()==''){
        $('#req_2').addClass('has-error');
      }
    }
  });
});
