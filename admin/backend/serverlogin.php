<?php

session_start();

$loginId = $_POST['LoginId'];

$password = $_POST['Pass'];

$respType = '';

$respMsg = '';

$separator = ',';

sleep(3);

if ($loginId == 'admin' && $password == 'admin') {

  session_register("username");

  setcookie('userId', 12345);

  $respType = 'success';

  $respMsg = 'home.php';

} else {

        $respType = 'error';

        $respMsg = 'Invalid login or password!';

       }

header('Content-Type: text/plain');

print $respType;

print $separator;

print $respMsg;
?>