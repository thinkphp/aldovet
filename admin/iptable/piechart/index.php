<?php

 session_start();

 require_once('../../config.php');

 if(!session_is_registered("username")) {header("Location: $logout");}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title>Retrieve Google Analytics Visits and PageViews with PHP</title>
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
   <style type="text/css">
        html,body{background:#925A92;margin:0;padding:0;}
        #doc{background:#fff;border:1em solid #fff;}
        h1{font-family:helvetica,Arial,Sans-serif;font-size:300%;margin:0 0 .5em 0; padding:0;font-weight: bold}
        h2{font-family:Calibri,Arial,Sans-serif;font-size:150%;margin:1em 0;padding:0;font-weight: bold}
        table{  border-collapse:collapse;  border: 1px solid #999;  width:150px;}
        th,td{  padding:5px;  border:1px solid #999;}
        th{  background:#eee;}
        caption{  font-weight:bold;  font-size:120%;  padding:5px 0;}
        #ft{color:#ccc;font-style: verdana;font-size:100%;position:relative;text-align: left;margin:3em 0 0 0 ;}
        #ft a{color:#999;}
        .hidden{position: absolute;top: 0;left: -9999px}
   </style>

</head>
<body>
<div id="doc" class="yui-t7">
   <div id="hd" role="banner"><h1>Report Trafic Visits</h1></div>

   <div id="bd" role="main">
<div class="yui-b">
    <div class="yui-u">

<?php

     require_once('../database.class.php');

     $sql = 'select curday_visit as day, count(curdate_visit) as numbers_visit, curdate_visit as date '. 

            'from visit '. 

            'group by curdate_visit '.

            'order by curdate_visit DESC limit 7';

     Database::getInstance()->query($sql);

     $jsonencoded = Database::getInstance()->displayJSON();

     $jsondecoded = json_decode($jsonencoded);

     $names = array();

     $values = array();

     foreach($jsondecoded as $o) {

             array_push($names,$o->day);

             array_push($values,$o->numbers_visit);
     }

     $output = '<table class="toChart size750x370 color961C95" summary="table2chart">';

     $output .= '<thead><th>Day</th><th>Visits</th></thead>';

     $output .= '<tbody>';

              for($i=0;$i<count($values);$i++) {

                 $output .='<tr><td>'.$names[$i].'('.$values[$i].')</td><td>'.$values[$i].'</td></tr>';
              }

     $output .= '</tbody>';

     $output .= '</table>';

     echo$output;

?>

    </div>
</div>


   <div id="ft" role="contentinfo"><p>Created By <a href="http://thinkphp.ro">Adrian Statescu</a> </p></div>

</div>


<script type="text/javascript">

    /* Table2Pie */
    (table2chart=function(){

        /* hold variables */
        var triggerClass = 'toChart';

        var chartClass = 'fromTable';

        var tableClass = 'hidden';

        var chartColor = 'c00000';

        var chartSize = '450x150';  

        var sizeCheck = /\s?size([^\s]+)/;

        var colorCheck = /\s?color([^\s]+)/;
          
        //grab all tables from document
        var tables = document.getElementsByTagName('table');

            //for each table execute
            for(var i=0;i<tables.length;i++) {

                    var t = tables[i];

                    var c = t.className;

                    var data = [];

                    var labels = [];

                        if(c.indexOf(triggerClass) !== -1) {

                              var size = sizeCheck.exec(c);

                                  size = size ? size[1] : chartSize;

                              var color = colorCheck.exec(c);

                                  color = color ? color[1] : chartColor;

                              var type = 'p3';
                               
                              var chartsrc = 'http://chart.apis.google.com/chart?cht='+type+'&chco='+color+'&chs='+size+'&chd=t:';

                              var tds = t.getElementsByTagName('tbody')[0].getElementsByTagName('td');

                                  for(var j=0;j<tds.length;j+=2) {

                                          labels.push(tds[j].innerHTML);

                                          data.push(tds[j+1].innerHTML);
                                  }

                                  chartsrc += data.join(",") + '&chl='+ labels.join("|");

                                  var chart = document.createElement('img');

                                      chart.setAttribute('src',chartsrc);

                                      chart.setAttribute('alt',t.getAttribute('summary'));  

                                          t.parentNode.insertBefore(chart,t);

                                          t.className = tableClass;
                        }//endif
                   
            }//end for

    })();//do EXEC
</script>
</body>
</html>

