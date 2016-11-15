<?php
require 'ext-lib/sdk/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '1023773327731727',
  'secret' => '75162ef2ebb6b864347d3d07a44de54a',
));

$facebook->destroySession();
header("location: ./");
exit();
?>
