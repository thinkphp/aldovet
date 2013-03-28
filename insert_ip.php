<?php

   if($db->table_exists($table2)) {

           $ip = $_SERVER['REMOTE_ADDR'];

        /* $host = gethostbyaddr($ip); */

           $host = $_SERVER['REMOTE_ADDR'];

           $map = "<a href=\"geoip.php?ip=$ip\" target=\"_blank\">geo</a>";

           $insert = "INSERT INTO $table2 (ip_visit,curdate_visit,curtime_visit,curday_visit,host_visit, map) VALUES ('$ip', curdate(), curtime(), dayname(curdate()),'$host', '$map')";
   
           if($db->table_exists($table2)) { 

             if(!$db->query($insert)) {echo"<h4>Couldn t insert data into $table2 - Unsuccessfully</h4>";}
           }
 
    } else {

      echo"<strong>$table2</strong> not exists.";
  
    }

?>