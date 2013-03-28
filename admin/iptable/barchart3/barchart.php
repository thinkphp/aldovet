<?php

    if($_GET['format'] == 'json') {

         header('content-type: text/javascript'); 
    }

    $out = '';

    if(isset($_GET['height']) || isset($height)) {

         $tmp = isset($height) ? $height : $_GET['height'];

         $tmp = intval($tmp);

         if($tmp > 0) {

              $height = $tmp;

         } else {

              $height = 100; 
         }   
   
    }//endif


    if(isset($_GET['width']) || isset($width)) {

         $tmp = isset($width) ? $width : $_GET['width'];

         $tmp = intval($tmp);

         if($tmp > 0) {

              $width = $tmp;

         } else {

              $width = 100; 
         }   
     }//endif


    if(isset($_GET['bargap']) || isset($bargap)) {

         $tmp = isset($bargap) ? $bargap : $_GET['bargap'];

         $tmp = intval($tmp);

         if($tmp > 0) {

              $bargap = $tmp;

         } else {

              $bargap = 0; 
         }   
     }//endif


     if($values) {

              $maxvalue = max($values);

              $k = $height / $maxvalue; 

              $all = sizeof($values);

              $barwidth = floor(($width/$all))-$bargap;

              $out .= '<ul class="barchart" style="width: '.$width.'px;height: '.$height.'px;">';

              $j = 0;

              foreach($values as $v) {

                      $btw  = floor($height - ($v*$k));

                      $out .= '<li style="width:'.$barwidth.'px; border-top-width: '.$btw.'px;';

                      if($bargap > 0) {

                            $out .= 'border-right-width: '.$bargap.'px;';
                      }

                      $out .= '"><span>'.substr($names[$j++],0,3).'('.$v.')</span></li>';

              }//endforeach 

              $out .= '</ul>';

     }else{

          $out = '<ul class="barchart" style="width: '.$width.'px;height: '.$height.'px;"><li style="width:'.($width-10).'px;height: '.($height-10).'px;padding: 5px">Data error: Only positive numbers!</li></ul>';
     }

     echo ($_GET['format'] == 'json') ? 'csscharts({chart: "'.addSlashes($out).'"})' : $out;
?> 