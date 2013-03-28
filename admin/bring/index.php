<?php

 require_once('../init.php');

 session_start();
 
 if(!session_is_registered("username")) {header("Location: $logout");}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>Ce sa aduceti &raquo; Pensiunea canina si felina "Aldo" Lasa-ti prietenul pe maini bune</title>
   <link rel="stylesheet" href="../css/reset-fonts-grids.css" type="text/css">
   <link rel="stylesheet" href="../css/base.css" type="text/css">
   <link rel="stylesheet" href="../css/aldo.css" type="text/css">
   <script type="text/javascript" src="../js/prototype-1.6.0.3.js"></script>
   <script type="text/javascript" src="../js/editinplace.js"></script>
   <link rel="stylesheet" href="../css/editinplace.css" type="text/css">
   <script type="text/javascript">

    function init() {

        EditInPlace.defaults['save_url'] = "../save.php";

        $('content_4').editInPlace({
                                  form_type:'textarea',

                                  select_text:true,

                                  cols: 116, 

                                  rows: 15,

                                  cancel_on_esc: true
                                });
    }//end function init

   Event.observe(window,'load',init,false);

   </script>
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

               var hd = document.getElementById('hd');

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


               apply(hd,3);
        })();
  </script>



  <div id="bd">
    <div id="yui-main">
      <div class="yui-b" id="ct">

        <div class="yui-gf" id="banner">
          <div class="yui-u first" id="nav">
                   <img src="../images/2.jpg" alt="image 2" />
          </div>

          <div class="yui-u">
            <h1>Pensiunea canina si felina "Aldo"</h1>
          </div>

            <span id="logo"><img src="../css/logo.png" alt="logo" /></span>

        </div>

        <div id="content_4">

    <?php

    if($db->table_exists($table)) {

           $sql = "SELECT content FROM $table where type = 'bring'";

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

</body>
</html>
