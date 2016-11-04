<?php
$activeSession = false;
if(isset($_SESSION[$sess.'ID'])){
  $strSQL = "SELECT * FROM d4is_useraccount a LEFT JOIN d4is_userinfo b on a.acc_id = b.acc_id WHERE a.acc_id = ? AND a.acc_activestatus = ?";
  $resultUser = $db->select($strSQL,array($_SESSION[$sess.'Username'], 'Y'));
  if($resultUser){
    $userinfo = $resultUser->fetch();
    $activeSession = true;
  }
}
?>
