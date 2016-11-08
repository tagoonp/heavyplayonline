<?php
session_start();

include "../../xplor-config.php";
include "../../xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

include "../../function/check-user.php";

if($activeSession){

  $strSQL = "SELECT * FROM ".$tbprefix."product WHERE product_name = ?";
  $resultCheckproduct = $db->select($strSQL,array($_POST['product_name']));

  if($resultCheckproduct){
    $db->disconnect();
    ?>
    <script type="text/javascript">
      alert('Duplicate product name');
      window.history.back();
    </script>
    <?php
    die();
  }else{
    $strSQL = "INSERT INTO ".$tbprefix."product
              (product_name, product_shotdetail, product_category, product_startprice, product_visibility, 	product_regdate)
              VALUES (?,?,?,?,?,?)
              ";
    $resultInsert = $db->insert($strSQL,array($_POST['product_name'], $_POST['product_shortdetail'],
                    $_POST['product_category'], $_POST['product_startprice'], 'N', date('Y-m-d')));
    if($resultInsert){
      $db->disconnect();
      header('Location: ../product.php');
      die();
    }else{
      $db->disconnect();
      ?>
      <script type="text/javascript">
        alert('Cannot add this product');
        window.history.back();
      </script>
      <?php
      die();
    }
  }


}else{
  $db->disconnect();
  ?>
  <script type="text/javascript">
    alert('Session timeout');
    window.history.back();
  </script>
  <?php
  die();
}


?>
