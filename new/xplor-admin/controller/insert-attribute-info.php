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

  $strSQL = "INSERT INTO ".$tbprefix."product_attribute_detail (pa_detail, pa_inculdeprice, pa_recommand, pa_id)
            VALUES (?, ?, ?, ?)";
  $result = $db->insert($strSQL,array($_POST['detail'], $_POST['price'], $_POST['recommand'], $_POST['id']));

  if($result){
    echo "Y";
  }else{
    echo "Cannot add new attribute2";
  }
}else{
  echo "Session denine!";
}


$db->disconnect();
?>
