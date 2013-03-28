<?php

  session_start();

  require_once('../config.php');

  if(!session_is_registered("username")) {header("Location: $logout");}

  require_once('database.class.php');

  if(isset($_GET['id']) && strlen($_GET['id']) > 0 && $_GET['id'] !== 'all') {

       $id = $_GET['id'];

  if(Database::getInstance()->table_exists($table2)) { 
        
       $sql = "delete from $table2 where code_visit = '$id'";

       $result = Database::getInstance()->query($sql);

       if($result) {echo " Ok! Row with code_visit = $id is <strong>DELETED</strong>";}

                else {

                       echo"Unsuccessfully Run Query! I think ID doesn`t exist!";  

                     }       
    } else {

         echo"Table <strong>$table</strong> not exists.";
    }

  } else if(isset($_GET['id']) && strlen($_GET['id'])>0 && $_GET['id'] === 'all'){ 

  if(Database::getInstance()->table_exists($table2)) { 

       $result = Database::getInstance()->delete_table($table2);

       if($result) {echo " Ok!";}

                else {

                       echo"Unsuccessfully Run Query!";  

                     }       
    } else {

         echo"Table <strong>$table2</strong> not exists.";
    }


  } else {

         echo"HTTP GET provides an id for send as paramenter (ex: index.php?id=2334343 or index.php?id=all)";
  }

?>