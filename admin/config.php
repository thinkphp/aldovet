<?php

    //localhost
    $dbhost = "localhost";

    //username database
    $user = "root";

    //password database
    $pass = "";

    //name of database
    $db = "aldovet";

    $table = "aldo";

    //name of table to insert IPs
    $table2 = "visit";

    //path for logout
    $logout = "http://localhost/aldovet/admin/";

    //array of configurations
    $config = array();

    //uncomment this line if you want to connect to MySQL Database with this format  
    $config['mysql'] = array($dbhost,$user,$pass,$db);

    //uncomment the line below if you want connect to SQLite Database
    #$config['sqlite'] = 3; 

?>