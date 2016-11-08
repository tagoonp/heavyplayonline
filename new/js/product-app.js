$(function(){

});

function calculatePrice(pid, price){
  $product = $('#txt-pid').val();
  $stage = $.post('controller/calculateprice.php', {product : $product, equipment: pid});
  $stage.always(function(result){
    $('#resultCalculateion').text(result);
  });
}
