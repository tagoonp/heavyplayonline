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

  $strSQL = "SELECT * FROM ".$tbprefix."post WHERE post_id = ? AND post_type = ? AND post_by = ?";
  $resultCheck = $db->select($strSQL, array($_POST['txt-id'], $_POST['txt-postype'], $_SESSION[$sess.'Username']));

  if(!$resultCheck){

  }else{
    $strSQL = "UPDATE ".$tbprefix."post
              SET
              post_title = ?,
              post_content = ?,
              post_visibility = ?,
              post_publish = ?,
              post_regdate = ?,
              post_public_submission = ?
              WHERE post_id = ? AND post_type = ? AND post_by = ?
              ";
    $resultUpdate = $db->update($strSQL,array($_POST['txt-title'], $_POST['txt-detail'], $_POST['radio-group3']
                    , $_POST['txt-publicdate'], date('Y-m-d'), "submit",$_POST['txt-id'], $_POST['txt-postype']
                    , $_SESSION[$sess.'Username']));
  }
}

header('Location: ../post.php?type=post');
$db->disconnect();
die();
?>
