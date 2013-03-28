<?php

  //include file config.php
  require_once('config.php');

  //include file db.class.php
  require_once('db.class.php');

  //Database MySQL Connection
  if(isset($config['mysql'])) {
  
    //create a new instance of class
    $db = new Database_MySQL();

    //apply method connect with these parameters
    $db->connect($config['mysql'][0],$config['mysql'][1],$config['mysql'][2],$config['mysql'][3]);

  //otherwise SQLitedatabase
  } else if(isset($config['sqlite']) && $config['sqlite'] === 3) {

       //TODO SQLitedatabase
  }

?>