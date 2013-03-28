<?php

 session_start();

 require_once('../../config.php');

 if(!session_is_registered("username")) {header("Location: $logout");}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title>Bar charts created with pure CSS</title>
   <link rel="stylesheet" href="base.css" type="text/css">
   <link rel="stylesheet" href="styles.css" type="text/css">
   <style type="text/css">
   .container {position: relative;margin: 10px}
   .container table.barchart{position:relative;width: 400px;height: 300px;background: #ddd;-moz-box-shadow:4px 4px 10px rgba(33,33,33,.8);-webkit-box-shadow:4px 4px 10px rgba(33,33,33,.8);} 
   .container table.barchart td{background: #5D7CD3;border: 1px solid #ddd;border-top:none;border-bottom-width: 0px;}
   .container table.barchart td:hover{border-color: #ccc;background: #A7B3D5}
   .container table.barchart td span{position:absolute;left: -9999px;top:10px;width: 2em;top:0;text-align: center;margin:0}
   .container table.barchart td:hover span{left: 99%;top:4px;color:#ffff00;font-size: 50px;font-weight: bold;text-indent: -4.9em;text-align: center}
   </style>
</head>
<body>

<div id="doc" class="yui-t7">
   <div id="hd" role="banner"><h1>Bar Chart 7 days visits</h1></div>
   <div id="bd" role="main">
	<div class="yui-g">
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

     require_once('barchart.class.php');
     
     $width = 700;

     $height= 300;

     $gap = 1;

     include('barchart.php');

?>


       </div>
   </div>
   <div id="ft" role="contentinfo"><p>Created by <a href="http://thinkphp.ro">Adrian Statescu</a></p></div>
</div>
<script type="text/javascript" src="form.js"></script>
</body>
</html>

