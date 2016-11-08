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

  $strSQL = "SELECT * FROM ".$tbprefix."post WHERE post_temp_id = ? AND post_type = ? AND post_by = ?";
  $resultCheck = $db->select($strSQL, array(session_id(), $_POST['postype'], $_SESSION[$sess.'Username']));
  if(!$resultCheck){
    $strSQL = "INSERT INTO ".$tbprefix."post (post_type, post_title, post_publish, post_temp_id, post_by)
              VALUE (?, ?, ?, ?, ?)";
    $result = $db->insert($strSQL,array($_POST['postype'], $_POST['title'], $_POST['pubdate'], session_id(), $_SESSION[$sess.'Username']));
  }else{
    $strSQL = "UPDATE ".$tbprefix."post
              SET
              post_title = ?,
              post_publish = ?
              WHERE post_temp_id = ? AND post_type = ? AND post_by = ?
              ";
    $resultUpdate = $db->update($strSQL,array($_POST['title'], $_POST['pubdate'], session_id(), $_POST['postype'], $_SESSION[$sess.'Username']));
  }

}

$db->disconnect();
?>
