<?php
session_start();

include "xplor-config.php";
include "xplor-connect.php";
require 'config.php';

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

$strSQL = "SELECT * FROM ".$tbprefix."useraccount WHERE acc_id = ?";
$resultCheck = $db->select($strSQL,array($_SESSION[$sess.'Username']));

if($resultCheck){
  $row = $resultCheck->fetch();
  if($row['acc_regby']=='Facebook'){
    // require 'ext-lib/sdk/facebook.php';
    //
    // $facebook = new Facebook(array(
    //   'appId'  => '1023773327731727',
    //   'secret' => '75162ef2ebb6b864347d3d07a44de54a',
    // ));
    //
    // $logoutUrl =  $facebook->getLoginUrl();
    // $facebook->destroySession();
    //
    // // $facebook->destroySession();
    //
    // // $token = $facebook->getAccessToken();
    // // $url = 'https://www.facebook.com/logout.php?next=' . YOUR_SITE_URL .
    // //   '&access_token='.$token;
    // // session_destroy();
    // // header('Location: '.$url);
    //
    // session_destroy();
    // header('Location: '.$logoutUrl);
    // header("Location: fb-logout.php");

    $facebook->destroySession();
    unset($_SESSION['userdata']);
    session_destroy();
    header("Location:index.php");
    exit();
  }
}else{
  session_destroy();
  header('Location: ./');
  // echo "b";
  die();
}

?>
