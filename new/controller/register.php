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

$strSQL = "SELECT * FROM ".$tbprefix."useraccount WHERE acc_email = ? ";
$resultCheck = $db->select($strSQL,array($_POST['username']));

if($resultCheck){
  echo "พบอีเมล์นี้ในระบบแล้ว";
  $db->disconnect();
  die();
}else{
  $hashPWD = hash_hmac('md5', $_POST['password'], $salt);

  $strSQL = "INSERT INTO ".$tbprefix."useraccount (	acc_email, acc_password, acc_regdate, acc_regby, acc_activestatus, acc_type)
            VALUES (?,?,?,?,?,?)
            ";
  $resultinsert = $db->insert($strSQL,array($_POST['username'], $hashPWD, date('Y-m-d'), 'Normal', 'Y', '2'));
  if($resultinsert){
    echo 'Y';
    $db->disconnect();
    die();
  }else{
    echo 'เกิดข้อผิดพลาดในการลงทะเบียน';
    $db->disconnect();
    die();
  }
}
?>
