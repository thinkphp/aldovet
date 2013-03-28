<?php
 
     //if is desired format as JSON then set up header for that
     if($_GET['format'] == 'json') { 

               header('content-type: text/javascript');
     }

     if(isset($_GET['values']) && isset($_GET['names']) && isset($_GET['width']) && isset($_GET['height'])) {

          //include barchart.class
          require_once('barchart.class.php');
     }

     //if we have GET 'caption' then do it
     if(isset($caption) || isset($_GET['caption'])) {

              $tmp = isset($caption) ? $caption : $_GET['caption'];

              $tmp = $tmp;

              if(preg_match("/^([a-zA-Z0-9\_\-\.\# ]+)$/",$tmp)) {

                     $caption = $tmp;
 
              } else {

                     $caption = 'Site Top Caption Name';
              }
     }

     //if we have GET 'width' then do it
     if(isset($width) || isset($_GET['width'])) {

              $tmp = isset($width) ? $width : $_GET['width'];

              $tmp = intVal($tmp);

              if($tmp > 0) {

                     $width = $tmp;
 
              } else {

                     $width = 10;
              }
     }

     //if we have GET 'height' then do it
     if(isset($height) || isset($_GET['height'])) {

              $tmp = isset($height) ? $height : $_GET['height'];

              $tmp = intVal($tmp);

              if($tmp > 0) {

                     $height = $tmp;
 
              } else {

                     $height = 20;
              }
     }


     //if we have 'names' and 'values'
     if($values && $names) {

        $arr = array();

        for($i=0;$i<count($values);$i++) {

                 $arr[] = new Record($names[$i],$values[$i]);
        } 

        $rec = new RecordList($arr);

        $adapter = new GraphAdapter($rec);

        $gr = new GraphRender($adapter,$width,$height,$caption);

        $out = $gr->render3();    

     } else {

        $out = 'Error: Please give us the properly data.';  
        
     }

     echo $_GET['format'] == 'json' ? 'barchart({chart: "'.addSlashes($out).'"})' : $out;  
?>