<?php
   require_once('../defines.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title><?php echo$d.$title; ?></title>
   <link rel="stylesheet" href="../css/reset-fonts-grids.css" type="text/css">
   <link rel="stylesheet" href="../css/base.css" type="text/css">
   <link rel="stylesheet" href="../css/aldo.css" type="text/css">
   <link href="remooz/ReMooz.css" rel="stylesheet" type="text/css" charset="utf-8">
   <script src="remooz/mootools-1.2.js" type="text/javascript" charset="utf-8"></script>
   <script src="remooz/ReMooz.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

<div id="doc"><!-- start doc -->

  <!-- start hd -->
  <div id="hd">
  <?php require_once('../header/header.php'); ?>
  </div>
  <!-- end hd -->

  <script type="text/javascript">

        (function(){

               var hd = document.getElementById('hd');

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


               apply(hd,4);
        })();
  </script>

  <div id="bd"><!-- start bd -->

    <div id="yui-main">

      <div class="yui-b" id="ct">

        <!-- start banner -->
        <div class="yui-gf" id="banner">

          <div class="yui-u first" id="nav">
                   <img src="../images/4.jpg" alt="fronpage" />
          </div>

          <div class="yui-u">

            <h1> <?php echo$header;?> </h1>

          </div>

          <span id="logo"><img src="../css/logo.png" alt="logo" /></span>

        </div>
        <!-- end banner -->

        <!-- start content -->
        <div id="content">
            <h2><?php echo$d; ?></h2>

            <!-- start flickrbadge -->
            <div id="flickrbadge">
               <div id="results"></div>
            </div>
            <script type="text/javascript" src="js/flickrbadge.js"></script>
            <!-- end flickrbadge -->

        </div>
        <!--end content -->

      </div><!-- end yui-b  -->

    </div><!-- end yui-main -->

  </div><!-- end bd -->

       <?php include('../footer/footer.php'); ?>

</div><!-- end doc -->

<style type="text/css">
#flickrbadge img{display: inline;float: left;padding: 5px;}
</style>

<script type="text/javascript" src="../js/cookies.js"></script>
</body>
</html>
