<?php
session_start();

include "../../xplor-config.php";
include "../../xplor-connect.php";

$db = new database();
$db->connect();

$sess = $db->getSessionPrefix();
$tbprefix = $db->getTablePrefix();

include "../../function/check-user.php";


// echo $_POST['txt-postype'];
// die();

if($activeSession){

  $strSQL = "SELECT * FROM ".$tbprefix."post WHERE post_temp_id = ? AND post_type = ? AND post_by = ?";
  $resultCheck = $db->select($strSQL, array(session_id(), $_POST['txt-postype'], $_SESSION[$sess.'Username']));

  if(!$resultCheck){
    $strSQL = "INSERT INTO ".$tbprefix."post (post_type, post_title, post_content, post_visibility, post_publish,
              post_regdate, post_public_submission, post_temp_id, post_by)
              VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result = $db->insert($strSQL,array($_POST['txt-postype'], $_POST['txt-title'], $_POST['txt-detail'],
              $_POST['radio-group3'], $_POST['txt-publicdate'], date('Y-m-d'), "submit" , session_id(), $_SESSION[$sess.'Username']));
  }else{
    $strSQL = "UPDATE ".$tbprefix."post
              SET
              post_title = ?,
              post_content = ?,
              post_visibility = ?,
              post_publish = ?,
              post_regdate = ?,
              post_public_submission = ?
              WHERE post_temp_id = ? AND post_type = ? AND post_by = ?
              ";
    $resultUpdate = $db->update($strSQL,array($_POST['txt-title'], $_POST['txt-detail'], $_POST['radio-group3']
                    , $_POST['txt-publicdate'], date('Y-m-d'), "submit",session_id(), $_POST['txt-postype']
                    , $_SESSION[$sess.'Username']));
  }
}

header('Location: ../post.php?type=post');
$db->disconnect();
die();
?>
