<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

$ip = $_SERVER['REMOTE_ADDR'];

$product_startprice = 0;
// Check product info
$strSQL = "SELECT * FROM ".$tbprefix."product WHERE product_id = ? AND product_visibility = ? ";
$resultCheck = $db->select($strSQL,array($_POST['product'], 'Y'));

if($resultCheck){ //Product available
  $row = $resultCheck->fetch();
  $product_startprice = $row['product_startprice'];
  // echo $product_startprice;
  // die();

  // Check attribute price
  $strSQL = "SELECT * FROM ".$tbprefix."product_attribute_detail WHERE pad_id = ?";
  $resultCheckEquip = $db->select($strSQL,array($_POST['equipment']));

  if($resultCheckEquip){ //Equipment available
    $rowEqi = $resultCheckEquip->fetch();
    //Check temporary equipement
    $strSQL = "SELECT * FROM ".$tbprefix."product_setup WHERE ps_session_id = ? AND ps_attr_id in
              (SELECT pad_id FROM ".$tbprefix."product_attribute_detail WHERE pa_id = ?) AND ps_product_id = ? ";
    $resultCheckTemp = $db->select($strSQL,array(session_id(), $rowEqi['pa_id'], $_POST['product']));

    if(!$resultCheckTemp){

      // $strSQL = "SELECT * FROM ".$tbprefix."product_setup WHERE ps_session_id = '".session_id()."' AND ps_attr_id in
      //           (SELECT pad_id FROM ".$tbprefix."product_attribute_detail WHERE pa_id = '".$_POST['equipment']."') AND ps_product_id = '".$_POST['product']."' ";
      // echo $strSQL;
      // die();
      // echo "1"; die();

      $strSQL = "INSERT INTO ".$tbprefix."product_setup (ps_session_id, ps_product_id,
                ps_attr_id, ps_attr_price,recog_date)
                VALUES (?,?,?,?,?)";
      $resultInsert = $db->insert($strSQL,array(session_id(), $row['product_id'], $_POST['equipment'],
                      $rowEqi['pa_inculdeprice'], date('Y-m-d')));

    }else{
      $strSQL = "DELETE FROM ".$tbprefix."product_setup WHERE ps_session_id = ? AND ps_product_id = ?
                AND ps_attr_id in
                (SELECT pad_id FROM ".$tbprefix."product_attribute_detail WHERE pa_id = ?)";
      $resultDel = $db->delete($strSQL, array(session_id(), $_POST['product'], $rowEqi['pa_id']));


      $strSQL = "INSERT INTO ".$tbprefix."product_setup (ps_session_id, ps_product_id,
                ps_attr_id, ps_attr_price,recog_date)
                VALUES (?,?,?,?,?)";
      $resultInsert = $db->insert($strSQL,array(session_id(), $row['product_id'], $_POST['equipment'],
                      $rowEqi['pa_inculdeprice'], date('Y-m-d')));
    }
  }

  $strSQL = "SELECT SUM(ps_attr_price) summary FROM ".$tbprefix."product_setup WHERE ps_session_id = ? AND ps_product_id = ?";
  $resultCheckAll = $db->select($strSQL,array(session_id(),$_POST['product']));

  if($resultCheckAll){
    $rowSumall = $resultCheckAll->fetch();
    $product_startprice = $product_startprice + $rowSumall['summary'];
  }
}

echo number_format($product_startprice * 35);
$db->disconnect();
die();
?>
