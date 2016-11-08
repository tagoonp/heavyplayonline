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

  $strSQL = "SELECT * FROM ".$tbprefix."product_attribute WHERE product_id = ? AND pa_title = ?";
  $resultCheck = $db->select($strSQL, array( $_POST['id'], $_POST['attr']));
  if(!$resultCheck){
    $strSQL = "INSERT INTO ".$tbprefix."product_attribute (pa_title, product_id)
              VALUES (?, ?)";
    $result = $db->insert($strSQL,array($_POST['attr'], $_POST['id']));

    if($result){
      echo "Y";
    }else{
      echo "Cannot add new attribute";
    }
  }else{
    echo "Duplicate attribute name!";
  }

}else{
  echo "Session denine!";
}


$db->disconnect();
?>
