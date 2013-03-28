<?php

   require_once('../../config.php');

   session_start();

   if(!session_is_registered("username")) {header("Location: $logout");}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title>Bar charts created with pure CSS</title>
   <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<div id="doc" class="yui-t7">
   <div id="hd" role="banner"><h1>An Accessible Bar Chart</h1></div>
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
     
     $width = 10;

     $height= 40;

     $caption = 'Number of visits over the 7 days aldovet.ro';

     include('barchart.php');

?>

	</div>
   </div>
   <div id="ft" role="contentinfo"><p>Created by <a href="#">Adrian Statescu</a></p></div>
</div>
</body>
</html>

