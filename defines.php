<?php

  if($_COOKIE['language'] == "") {

     $lang = 'ro';

  } else {

     $lang = $_COOKIE['language']; 
  }

  switch($lang) {
 
         case "en": 
         require_once('lang/english.php');
         break;

         case "fr": 
         require_once('lang/french.php');
         break;

         case "sp": 
         require_once('lang/spanish.php');
         break;

         case "ro": 
         require_once('lang/romanian.php');
         break;
      
  };//end switch 

?>
