<?php

 session_start();

 require_once('../../config.php');

 if(!session_is_registered("username")) {header("Location: $logout");}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title>Bar charts created with pure CSS</title>
   <link rel="stylesheet" href="reset-font-grids.css" type="text/css">
   <link rel="stylesheet" href="base.css" type="text/css">
   <link rel="stylesheet" href="styles.css" type="text/css">
   <style type="text/css">
  
    .barchart{
      position:relative;
      font-weight:bold;
      width:400px;
      margin:0;
      padding:0;
      list-style:none;
      background:#eee;
      overflow:hidden;
      margin:1em 0;
      -moz-box-shadow:4px 4px 10px rgba(33,33,33,.8);
      -webkit-box-shadow:4px 4px 10px rgba(33,33,33,.8);
    }

    .barchart li{
      width:18px;
      float:left;
      display:block;
      background:#fc6;
      height:200px;
      margin:0;
      padding:0;
      border:1px solid #eee;
      border-right-width:0;
      border-left:none;
      border-bottom:none;
    }
  
    .barchart li span{
      position:absolute;
      left:-9999px;
      top:0;
      text-align:center;
      width:5em;
      margin:0;
    }

    .barchart li:hover{
      background:#693;
    }

    .barchart li:hover span{
      left:5px;
      z-index:10;
      top:5px;
    }


    #in{
      position:relative;
    }

    #in .barchart li{
      position:relative;
    }

    #in .barchart{
      padding-bottom:2em;
    }

    #in div{
      position:absolute;
      width:400px;
      height:2em;
      bottom:0;
      left:0;
      background:#999;
    }
    #in .barchart li:hover span{
      background:transparent;
      border:none;
      background:#fff;
      width:2em;
      font-weight:bold;
      z-index:10;
      -moz-border-radius:2px;
      -webkit-border-radius:2px;
    }


    #inner {position:relative;}
    #inner .barchart li{position: relative;background: #2B8FA3}
    #inner .barchart{padding-bottom:2em;}  
    #inner div{position:absolute;width:750px;height: 2em;bottom:0;left:0;background: #999;}  
    #inner .barchart li:hover span{color: #fff;background: #000;width: 4em;-moz-border-radius:4px;-webkit-border-radius:4px;}      
    #inner .barchart li:hover{background: #75A2AA;}
   </style>
</head>
<body>
<div id="doc" class="yui-t7">
   <div id="hd" role="banner"><h1>Accessible Visits Bar Chart</h1></div>
   <div id="bd" role="main">
	<div class="yui-g">



<div id="inner">

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
     
     $width = 750;

     $height= 200;

     $gap = 1;

     include('barchart.php');

?>
<div></div>
</div><!-- end inner chart -->



	</div>
   </div>
   <div id="ft" role="contentinfo"><p>written by <a href="http://thinkphp.ro">Adrian Statescu</a></p></div>
</div>
<script type="text/javascript" src="form.js"></script>
</body>
</html>
