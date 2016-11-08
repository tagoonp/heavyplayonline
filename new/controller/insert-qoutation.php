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

$hashPWD = hash_hmac('md5', $_POST['pwd'], $salt);

$strSQL = "SELECT * FROM ".$tbprefix."useraccount WHERE acc_id = ? AND 	acc_password = ? AND acc_activestatus = ? ";
$resultCheck = $db->select($strSQL,array($_SESSION[$sess.'Username'], $hashPWD, 'Y'));

if($resultCheck){
  $strSQL = "INSERT INTO ".$tbprefix."quotation (qt_toname, qt_email, qt_info, qt_regdate, qt_acc_id) VALUES (?,?,?,?,?)";
  $resultInsert = $db->insert($strSQL, array($_POST['name'], $_POST['email'], $_POST['information'], date('Y-m-d'), $_SESSION[$sess.'Username']));
  if($resultInsert){
    echo 'Y';
    $db->disconnect();
    die();
  }else{
    echo 'ไม่สามารถบันทึกข้อมูลได้';
    $db->disconnect();
    die();
  }
}else{
  echo "รหัสผ่านผิดพลาด";
  $db->disconnect();
  die();
}
?>
