<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();
$salt = $db->getSaltkey();

// echo print_r($_POST['fbpost']);


$ip = $_SERVER['REMOTE_ADDR'];

$hashPWD = hash_hmac('md5', $_POST['fbpost']['id'], $salt);

$strSQL = "SELECT * FROM ".$tbprefix."useraccount WHERE acc_email = ? AND acc_password = ? ";
$resultCheck = $db->select($strSQL,array($_POST['fbpost']['email'], $hashPWD));

if(!$resultCheck){
  $strSQL = "INSERT INTO ".$tbprefix."useraccount (	acc_email, acc_password, acc_regdate, acc_regby, acc_activestatus, acc_type)
            VALUES (?,?,?,?,?,?)";
  $resultInsert = $db->insert($strSQL,array($_POST['fbpost']['email'], $hashPWD, date('Y-m-d'), 'Facebook', 'Y', '2'));
}

$strSQL = "SELECT * FROM ".$tbprefix."useraccount WHERE acc_email = ? AND acc_password = ? AND acc_activestatus = ? AND acc_regby = ? ";
$resultCheck2 = $db->select($strSQL,array($_POST['fbpost']['email'], $hashPWD, 'Y', 'Facebook'));

if($resultCheck2){

  $row = $resultCheck2->fetch();

  $strSQL = "SELECT * FROM ".$tbprefix."userinfo WHERE acc_id = ? ";
  $resultCheck3 = $db->select($strSQL,array($row['acc_id']));

  if(!$resultCheck3){
    $strSQL = "INSERT INTO ".$tbprefix."userinfo (	fname, lname, acc_id )
              VALUES (?,?,?)";
    $resultInsert = $db->insert($strSQL,array($_POST['fbpost']['first_name'], $_POST['fbpost']['last_name'], $row['acc_id']));
  }

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
