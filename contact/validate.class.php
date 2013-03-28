<?php

/*

  filename: validate.class.php
  
*/

//class validate used validate.php
class validate
{
      //constructor of class PHP5
      public function __construct() {

                //do nothing...
      } 
 
      //constructor of class PHP4
      public function validate() {

                 $this->__construct();
      }


      public function validateAjax($inputValue,$fieldId) {

             switch($fieldId) {

                          case 'txtName':{return $this->validateName($inputValue);break;}

                          case 'txtEmail':{return $this->validateEmail($inputValue);break;}

                          case 'txtURL': {return $this->validateURL($inputValue);break;}

                          case 'txtMessage':{return $this->validateMessage($inputValue);break;}

                          default: {}

                         }

       } 

       public function validatePHP() {

               $errors = 0;
 
                    if(!$this->validateName($_POST['txtName'])) {$errors = 1;}

                    if(!$this->validateEmail($_POST['txtEmail'])) {$errors = 1;}

                    if(!$this->validateURL($_POST['txtURL'])) {$errors = 1;}

                    if(!$this->validateMessage($_POST['txtMessage'])) {$errors = 1;}
        
                  if($errors == 1) {echo"Errors!";}

                       else { 

                            $subject="[business] from ".$_POST['txtName']." ".$_POST['txtURL'];

                            $from = $_POST['txtEmail']; 

                            $mesaj = $_POST['txtMessage'];

                            $to = "contact@aldovet.ro";

                            @mail($to,$subject,$mesaj,"From : $from");

                            echo"The message has been sent successful!";
                          }
         
      } 


      public function validateName($value) {

                 return (!eregi('^([a-zA-Z]+)$',$value)) ? 0 : 1;
      }


      public function validateEmail($value) {

                 return (!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $value)) ? 0 : 1;

      }

      public function validateURL($value) {

                 return (!eregi('^([a-zA-Z]+)$',$value)) ? 0 : 1;
      }


      public function validateMessage($value) {

                 $value = trim($value);   

                 return ($value != "" && $value != 'none') ? 1 : 0;
      }


}//end class validate
?>