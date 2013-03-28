<?php
    require_once('../defines.php');

    require_once('../init.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title><?php echo$a.$title; ?></title>
   <link rel="stylesheet" href="../css/reset-fonts-grids.css" type="text/css">
   <link rel="stylesheet" href="../css/base.css" type="text/css">
   <link rel="stylesheet" href="../css/aldo.css" type="text/css">
</head>
<body>
<div id="doc">

  <!-- start hd -->
  <div id="hd">

  <?php require_once('../header/header.php'); ?>

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

                                             links[i].href = '../';

                                        } else{

                                             var chunks = links[i].href.split("/");

                                             links[i].href = '../'+ chunks[chunks.length-2] + '/';
                                         }
                               }

                       }//endfor

               }//end function

               apply(links,1);
        })();
  </script>


  <div id="bd">
    <div id="yui-main">
      <div class="yui-b" id="ct">

        <div class="yui-gf" id="banner">

          <div class="yui-u first" id="nav">

                   <img src="../images/1.jpg" alt="image" />
          </div>

          <div class="yui-u">

            <h1> <?php echo$header;?> </h1>

          </div>

            <span id="logo"><img src="../css/logo.png" alt="logo" /></span>

        </div>

        <div id="content">
 

    <?php

    if($db->table_exists($table)) {

           $sql = "SELECT content FROM $table where type = 'about'";

           $db->query($sql);

                if($db->getRows() > 0) {


                           $output = $db->getResultAsArray();

                           echo$output[0]['content'];


                } else {
                          echo"Table <strong>$table</strong> is empty.";  
                       }

           } else {
 
                echo"Table <strong>$table</strong> doesn`t exists.";

           }//end if-else
      ?> 

          

        </div><!-- end content -->
      </div>
    </div>
  </div>

  <?php include('../footer/footer.php'); ?>

</div><!-- end doc -->

<script type="text/javascript" src="../js/cookies.js"></script>
</body>
</html>
