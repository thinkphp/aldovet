<?php
     if($_GET['format'] == 'json') {

               header('content-type: text/javascript');
     }

     if(isset($_GET['values']) && isset($_GET['width']) && isset($_GET['height'])) {

               require_once('barchart.class.php');
     }


     if(isset($width) || isset($_GET['width'])) {

              $tmp = isset($width) ? $width : $_GET['width'];

              $tmp = intVal($tmp);

              if($tmp > 0) {

                     $width = $tmp;
 
              } else {

                     $width = 400;
              }
     }

     if(isset($height) || isset($_GET['height'])) {

              $tmp = isset($height) ? $height : $_GET['height'];

              $tmp = intVal($tmp);

              if($tmp > 0) {

                     $height = $tmp;
 
              } else {

                     $height = 200;
              }
     }


     if(isset($gap) || isset($_GET['gap'])) {

              $tmp = isset($gap) ? $gap : $_GET['gap'];

              $tmp = intVal($tmp);

              if($tmp > 0) {

                     $gap = $tmp;
 
              } else {

                     $gap = 0;
              }
     }

     if($values) {

        $arr = array();

        for($i=0;$i<count($values);$i++) {

                 $arr[] = new Record($names[$i],$values[$i]);
        } 

        $obj = new Barchart($width,$height,$arr,$gap);

        $out = $obj->renderGraph();  
          
       } else {

         $out = '<div class="container" style="'.$width.'"><table class="barchart" style="width: '.$width.'px;height:'.$height.'px;"><tr><td style="border-bottom-width:0px;border-right-width:0px">Data error: only positive numbers!</td></tr></table></div>';
        
       }

     echo $_GET['format'] == 'json' ? 'barchart({chart: "'.addSlashes($out).'"})' : $out;  
?>