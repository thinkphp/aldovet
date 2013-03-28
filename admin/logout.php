<?php

//start session
session_start();

//include config
require_once('config.php');

//distroy session
session_destroy();

//hold in local the path for logout
$local = $logout;

//redirect to local
header("Location: $local");

?>