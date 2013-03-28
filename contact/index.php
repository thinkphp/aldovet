<?php
    require_once('../defines.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title><?php echo$e.$title; ?></title>
   <link rel="stylesheet" href="../css/reset-fonts-grids.css" type="text/css">
   <link rel="stylesheet" href="../css/base.css" type="text/css">
   <link rel="stylesheet" href="../css/aldo.css" type="text/css">
   <link href="remooz/ReMooz.css" rel="stylesheet" type="text/css" charset="utf-8">
   <script src="remooz/mootools-1.2.js" type="text/javascript" charset="utf-8"></script>
   <script src="remooz/ReMooz.js" type="text/javascript" charset="utf-8"></script>
   <script type="text/javascript" charset="utf-8">
        window.addEvent('domready', function() {

                 ReMooz.assign('#map a', {'origin': 'img','shadow': 'onOpen','opacityResize': 0.1, 'cutOut': true, 'dragging': true, 'centered': true,'closer': true,});

        });
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

                                             links[i].href = '../';

                                        } else{

                                             var chunks = links[i].href.split("/");

                                             links[i].href = '../'+ chunks[chunks.length-2] + '/';
                                         }
                               }

                       }//endfor

               }//end function


               apply(hd,5);
        })();
  </script>
        
  <div id="bd">

    <div id="yui-main">

      <div class="yui-b" id="ct">

        <div class="yui-gf" id="banner">

          <div class="yui-u first" id="nav">
                   <img src="../images/5.jpg" alt="fronpage" />
          </div>

          <div class="yui-u">

            <h1> <?php echo$header;?> </h1>

          </div>

            <span id="logo"><img src="../css/logo.png" alt="logo" /></span>

        </div>

        <div id="content">
 
<div class="entry"><!-- start about -->

<h2><?php echo$e; ?></h2>

<div id="map"><a href="http://gws.maps.yahoo.com/mapimage?MAPDATA=IKvr.ed6wXXzCa_C599EB9.843u4cSEJPrrJftt6MBh1Njh0wCA1ArO2L1taHV9nKGFdxPhT8u1ZL07WHQy1mjUs2.lTxpDNhdvC8KlTzoZwJLjlEYKeMf9aT7CUJOA9_EXXmUnD.oZ.KpZqYxllgyw_OyB6UfIbZEgkNGLHCZ_TDF0f3g--&mvt=m&cltype=onnetwork&.intl=us&appid=YD-4g6HBf0_JX0yq2IsdnV1Ne9JTpKxQ3Miew--&oper=&_proxy=ydn,xml" title="Str. Prelungirea Ghencea, Bucuresti"><img src="http://gws.maps.yahoo.com/mapimage?MAPDATA=XgIByud6wXVeeJQDauoSgdDfFwPuq6CiTOLc_LiVZ.zxkp5yrk7p4bOBy8Jgq7UNXqV3Q_xChkhzEss6XJzSW4M8tM9GGVRSYgAxrLaKqCVN8DtAIyBpwYwzDxO.1pBe8T.uLiti9e8r2tNOUitWgOHtsVtDX9TBgKomDrA610LxIKuzag--&mvt=m&cltype=onnetwork&.intl=us&appid=YD-4g6HBf0_JX0yq2IsdnV1Ne9JTpKxQ3Miew--&oper=&_proxy=ydn,xml" alt="map"></a></div>

<table>
<tbody>
<tr><td class="head">Address:</td><td>Str. Prelungirea Ghencea, Bucuresti</td></tr>
<tr><td class="head">Cell:</td><td>0723267672</td></tr>
<tr><td class="head">E-mail:</td><td>contact@aldovet.ro</td></tr>
</tbody>
</table>
</div><!-- end entry -->

<br style="clear: both">

<!-- start contact-form -->
<div id="contact-form">

<div id="header_contact"><?php echo$contact; ?></div>

<div id="box"> <!-- start div box -->
<form id="frmName" name="frmName" method="post" action="validate.php?action=validatePHP">

<p><label for="txtName">Name (required)</label><br/>
<input class="invalidText" type="text" name="txtName" id="txtName" autocomplete="off" onBlur="contact.validate(this.value,this.id)" /> <img id="txtNameInvalidImg" src="images/invalid.gif" class="visible" /><img id="txtNameValidImg" src="images/valid.gif" class="invisible" /></p>

<p><label for="txtEmail">Email (required)</label><br/>
<input class="invalidText" type="text" name="txtEmail" id="txtEmail" autocomplete="off" onBlur="contact.validate(this.value,this.id)"/> <img id="txtEmailInvalidImg" src="images/invalid.gif" class="visible" /><img id="txtEmailValidImg" src="images/valid.gif" class="invisible"">
</p>

<p><label for="txtURL">Website</label><br/>
<input class="invalidText" type="text" name="txtURL" id="txtURL" autocomplete="off" onBlur="contact.validate(this.value,this.id)"/> <img id="txtURLInvalidImg" src="images/invalid.gif" class="visible" /><img id="txtURLValidImg" src="images/valid.gif" class="invisible""></p>

<p><label for="txtMessage">Message (required)</label><br/>
<textarea class="invalidText" name="txtMessage" id="txtMessage" rows="7" cols="70" onBlur="contact.validate(this.value,this.id)"/></textarea> <img id="txtMessageInvalidImg" src="images/invalid.gif" class="visible" /><img id="txtMessageValidImg" src="images/valid.gif" class="invisible"">
</p>

<p style="height: 20px;">
<input type="button" id="btnSubmit" name="btnSubmit" value="Send" style="display:none"/>
<input type="button" id="btnSubmit2" value="Send" disabled /></p>

</form><!-- end for -->
</div> <!-- end div box -->

<div id="preview"></div>
<font color="YELLOWGREEN"><strong></strong></font>
<font color="YELLOWGREEN"><strong><div id="flagMessage"></div></strong></font>

</div>
<!-- end div contact-form -->

        </div><!-- end content -->
      </div>
    </div>
  </div>

       <?php include('../footer/footer.php'); ?>

</div><!-- end doc -->


<style type="text/css">

.entry h2 {font-size: 18px}

.entry { background: #F9F9F9;width: 94%; padding: 20px;height: 400px;margin-top: 20px}

.entry img {float: right;padding: 5px}

.entry table tr td{border: 0}

.entry .head{font-weight: bold}

</style>

<link rel="stylesheet" href="css/contact.css" type="text/css">
<script type="text/javascript" src="js/contact.js"></script>

<script type="text/javascript" src="../js/cookies.js"></script>
</body>
</html>
