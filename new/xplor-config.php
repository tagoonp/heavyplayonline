<?php
class Configuration
{

  //-- Defind configuration parameter for connect database --
  public $config = array(
    'host' => 'localhost',
    'dbname' => 'heavyplay',
    'dbuser' => 'root',
    'dbpass' => '',
    'session_prefix' => 'hSe4_',
    'table_prefix' => 'd4is_',
    'salt' => 'sE84654Sdd461EsiLoa1s694Z'
  );

  //-- Constructor --
  public function __construct(){
    // Code here
  }

}
