<?php

   if(!session_is_registered("username")) {header("Location: $logout");}

   require_once('../config.php');

   require_once('database.class.php');

   $sql = "CREATE TABLE $table2(

           code_visit int(11) NOT NULL auto_increment PRIMARY KEY,

           ip_visit varchar(50) NOT NULL,

           curdate_visit varchar(50) NOT NULL,

           curtime_visit varchar(50) NOT NULL,

           curday_visit varchar(50) NOT NULL,

           host_visit varchar(50) NOT NULL,

           map varchar(100) NOT NULL

           )";


       if(!Database::getInstance()->table_exists($table2)) { 

             echo"<h2><pre>".$sql."</pre></h2>";

             Database::getInstance()->query($sql); 

             echo"Table <strong>".strtoupper($table2)."</strong> created!<br/>"; 

       } else {

              echo"Table <strong>".strtoupper($table2)."</strong> exists!<br/>"; 
       }

       $ip = '84.232.236.127';

       $map = "<a href=\"geoip.php?ip=$ip\" target=\"_blank\">geo</a>";

       $host = 'adonix.cs.unibuc.ro';  

       $insert = "INSERT INTO $table2 (ip_visit,curdate_visit,curtime_visit,curday_visit,host_visit, map) VALUES ('$ip', curdate(), curtime(), dayname(curdate()),'$host', '$map')";
   
       if(Database::getInstance()->table_exists($table2)) { 

             if(Database::getInstance()->query($insert)) {echo"<pre>".$insert."</pre><font color='green'>Query Successfuly!</font>";}
       }

?>