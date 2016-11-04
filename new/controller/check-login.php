<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();
$salt = $db->getSaltkey();


$ip = $_SERVER['REMOTE_ADDR'];

$hashPWD = hash_hmac('md5', $_POST['password'], $salt);

$strSQL = "SELECT * FROM ".$tbprefix."useraccount WHERE acc_email = ? AND acc_password = ? AND acc_activestatus = ?";
$resultCheck = $db->select($strSQL,array($_POST['username'], $hashPWD, 'Y'));

if($resultCheck){
  $row = $resultCheck->fetch();

  $_SESSION[$sess.'ID'] = session_id();
  $_SESSION[$sess.'Username'] = $row['acc_id'];
  $_SESSION[$sess.'Utype'] = $row['acc_type'];
  session_write_close();

  echo "Y";
  $db->disconnect();
  die();
}

echo "N";
$db->disconnect();
die();
?>
