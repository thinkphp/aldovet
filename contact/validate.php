<?php

require_once('validate.class.php');

//create an instance of class validate
$valid = new validate();

if($_GET['action'] == 'validatePHP') {

 echo$valid->validatePHP();

} else {

             if($_GET['name'] == "") {$name="none";}

                     else

                                 {$name=$_GET[name];}

             if($_GET['email'] == "") {$email="none";}

                    else
 
                                 {$email=$_GET[email];}

             if($_GET['url'] == "") {$url="none";}

                    else
                                  {$url=$_GET[url];}

             if($_POST['fieldId'] == 'txtMessage' && $_POST['inputValue'] != '' && isset($_POST['inputValue'])) {$message = $_POST['inputValue'];}

                                else
                                                     {$message = 'none';}
 

             $response='<?xml version="1.0"?>';
             $response.='<response>';
             $response.='<result>'.$valid->validateAjax($_POST[inputValue],$_POST[fieldId]).'</result>';
             $response.='<fieldid>'.$_POST["fieldId"].'</fieldid>';
             $response.='<preview>Message Preview</preview>';
             $response.='<to>Alexandru Mitulescu</to>';
             $response.='<name>'.$name.'</name>';
             $response.='<email>'.$email.'</email>';
             $response.='<url>'.$url.'</url>';
             $response.='<message>'.$message.'</message>';
             $response.='</response>';
             ob_clean();
             header('Content-Type: text/xml');
             echo$response;

       }


?>