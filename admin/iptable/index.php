<?php 

 session_start();
 
 require_once('../config.php');

 if(!session_is_registered("username")) {header("Location: $logout");}

 require_once('database.class.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>Pensiunea canina si felina "Aldo" Lasa-ti prietenul pe maini bune</title>
   <link rel="stylesheet" href="../css/reset-fonts-grids.css" type="text/css">
   <link rel="stylesheet" href="../css/base.css" type="text/css">
   <link rel="stylesheet" href="../css/aldo.css" type="text/css">   
   <link rel="stylesheet" href="table.css" type="text/css">
</head>
<body>
<div id="doc">
  <!-- start hd -->
  <div id="hd">
  <?php include('../header/header.php'); ?>
  </div>
  <!-- end hd -->
  <script type="text/javascript">

        (function(){

               var links = document.getElementById('hd');

               var apply = function(obj,num) {

                   var links = obj.getElementsByTagName('a');

                       for(var i=0;i<links.length;i++) {

                               if(i == num) {

                                    links[i].href = '#';

                                    links[i].className = 'selected';

                               } else {

                                       if(links[i].href.indexOf('index.php') != -1) {

                                             links[i].href = '../home.php';

                                        } else if(links[i].href.indexOf('logout.php') != -1){

                                             links[i].href = '../logout.php';

                                         } else {

                                             var chunks = links[i].href.split("/");

                                             links[i].href = '../'+ chunks[chunks.length-2] + '/';

                                         }
                               }

                       }//endfor

               }//end function

               apply(links,4);
        })();
  </script>


  <div id="bd">

    <div id="yui-main">

      <div class="yui-b" id="ct">

        <div class="yui-gf" id="banner">

          <div class="yui-u first" id="nav">

               <div><img src="../images/2.jpg" alt="image 2"/></div>

          </div>

          <div class="yui-u">

            <h1>Pensiunea canina si felina "Aldo"</h1>

          </div>

           <span id="logo"><img src="../css/logo.png" alt="logo" /></span>

        </div>

        <!-- start content -->
        <div id="content"><center>

         <div class="barchart"><a href="barchart/index.php" target="_blank">Barchart</a></div>
         <div class="barchart2"><a href="barchart2/index.php" target="_blank">Openchart</a></div>
         <div class="barchart3"><a href="barchart3/index.php" target="_blank">Analytics</a></div>
         <div class="piechart"><a href="piechart/index.php" target="_blank">Piechart</a></div>
        <h2>IPs Table</h2>
<?php


     if(isset($_GET['offset'])) {$offset = $_GET['offset'];}
   
                          else 

                                {$offset = 0;}


     if(Database::getInstance()->table_exists($table2)) {

               $sqltotal="SELECT * FROM $table2";

               Database::getInstance()->query($sqltotal);

               $resulttotal = Database::getInstance()->getRows($sql);

               $nrpages = $resulttotal / 7;

               $pages = $resulttotal%7;

               if($pages > 0) $nrpages = floor($nrpages) + 1;

               $x = $offset + 1;

               $y = $x + 6;

               if(($offset+7) == $nrpages*7) {$j = $nrpages*7 - $resulttotal;$y = $x + 7 - $j - 1;}

               echo"<span class='numberofpages'><strong>Number total</strong>: <span class='box'>$resulttotal</span> <strong>Number of pages:</strong> <span class='box'>$nrpages </span> <strong>Visible:</strong> <span class='box'>$x - $y</span></span>";

               $sql = "select code_visit as code,ip_visit as IP, curdate_visit as Date, curtime_visit as Time,curday_visit as Day, host_visit as Hostname, Map from $table2 ORDER BY code_visit DESC limit $offset,7";
 
               Database::getInstance()->query($sql);

               Database::getInstance()->display(550,$offset);

               $prev = $offset - 7;

               $next = $offset + 7;

               echo"<p class=\"controls\">";

               if(!($prev == -7)) {echo"<a href='index.php?offset=$prev' class='prev'>&laquo; prev</a> ";}

               for($i=0;$i<$nrpages;$i++) {

                   $k = $i*7;

                   if($offset == $k) {echo'<span class="selectedpage">'.$i.'</span> | ';} 

                                 else {
                                       echo'<a href="index.php?offset='.$k.'" class="deselected">'.$i.'</a> | ';  
                                      }
               }

              if(!($next == $nrpages*7)) {echo"<a href='index.php?offset=$next' class='next'> next &raquo;</a> ";}

              echo"</p>";

     } else {
  
             echo"Table <strong>$table2</strong> not exists"; 
     }

?>
         
</center></div><!-- end content -->

      </div>

    </div>

  </div>

  <?php include('../footer/footer.php'); ?>

</div><!-- end doc -->

<script type="text/javascript" src="table.js"></script>

</body>
</html>
