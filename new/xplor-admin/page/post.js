$(document).ready(function(){
  // CKEDITOR.config.customConfig = 'config.js';
  CKEDITOR.replace( 'txt-detail' );

  $('input[name=radio-group3]').click(function(){
    $refText = 'Private';
    if($('input[name=radio-group3]:checked').val()=='public'){
      $refText = 'Public';
    }else if ($('input[name=radio-group3]:checked').val()=='password') {
      $refText = 'Protected';
    }
    $('#visibilityValue').text($refText);
  });

  $('#txt-publicdate').change(function(){
    $('#publicValue').text($('#txt-publicdate').val());
  });

  $('#txt-title').blur(function(){
    if($('#txt-title').val()!=''){
      $stage = $.post('controller/insert-post.php',{title: $('#txt-title').val(), postype: $('#txt-postype').val(), pubdate: $('#txt-publicdate').val() } );
    }
  });

  // $('#btnSubmit').click(function(){
  //   $check = 0;
  //   $('.form-control').removeClass('has-error');
  //   if($('#txt-title').val()==''){
  //     $check++;
  //     $('#r1').addClass('has-error');
  //   }else{
  //     $stage = $.post('controller/insert-post-full.php',
  //     {
  //       title: $('#txt-title').val(),
  //       postype: $('#txt-postype').val(),
  //       pubdate: $('#txt-publicdate').val(),
  //       visibility: $('input[name=radio-group3]:checked').val(),
  //       content: $('#txt-detail').val()
  //     });
  //
  //     $stage.always(function(result){
  //       if(result=='Y'){
  //         window.location = 'post.php?type=' + $('#txt-postype').val() ;
  //       }else{
  //         alert(result);
  //       }
  //     });
  //   }
  //
  //
  // });

  $('#postform').submit(function(){
    if($('#txt-title').val()!=''){
      // console.log($.trim($('#txt-detail').val()));
      //
      // $stage = $.post( "controller/insert-post-full.php", {
      //             postype: $('#txt-postype').val(),
      //             title: $('#txt-title').val(),
      //             txtdetail: $.trim($('#txt-detail').val()),
      //             radiogroup3: $('input[name=radio-group3]:checked').val(),
      //             pubdate: $('#txt-publicdate').val()
      //           });
      // $stage.always(function(result){
      //   if(result=='Y'){
      //     window.location = 'post.php?type=post';
      //   }else{
      //     console.log(result);
      //     window.location = 'post.php?type=post';
      //   }
      // });
      return true;
    }else{
      return false;
    }

    return false;
  });

});

$divVisibility = 'public';
$divPublicdate = '';
function toggleDiv(divID){

  if(divID=='visibleDiv'){
    $divVisibility = ($('input[name=radio-group3]:checked').val());
  }else{
    $divPublicdate = $('#txt-publicdate').val();
  }

  $('#' + divID).slideToggle();
}

function toggleDiv2(divID){
  if(divID=='visibleDiv'){
    if ($divVisibility == 'public') {
      $('#v1').trigger('click');
    }else if ($divVisibility == 'password') {
      $('#v2').trigger('click');
    }else{
      $('#v3').trigger('click');
    }

    $refText = 'Private';
    if($divVisibility=='public'){
      $refText = 'Public';
    }else if ($divVisibility=='password') {
      $refText = 'Protected';
    }

    $('#visibilityValue').text($refText);
  }else{
    $('#txt-publicdate').val($divPublicdate);
    $('#publicValue').text($divPublicdate);
  }


  // $('#visibilityValue').text($refText);
  $('#' + divID).slideToggle();
}
