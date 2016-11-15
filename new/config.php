<?php
 require 'ext-lib/api/facebook.php';

 $config['App_ID'] = '1023773327731727';
 $config['App_Secret'] = '75162ef2ebb6b864347d3d07a44de54a';

 $facebook = new Facebook(array(
  'appId'  => $config['App_ID'],
  'secret' => $config['App_Secret']
 ));

 $user = false;

 if($user){
   $userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
   $userClass = new User;
   $userData = $userClass->checkFBUserData($userProfile);
 }else{
   $loginUrl = $facebook->getLoginUrl(['scope'=>'email']);
 }

?>
