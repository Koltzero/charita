<?php

    require_once "config/defines.mysql.php";
    require_once("vendor/autoload.php");

    $db = new Dibi\Connection([
            'driver'   => 'mysqli',
            'host'     => MYSQL_HOSTNAME,
            'username' => MYSQL_USERNAME,
            'password' => MYSQL_PASSWORD,
            'database' => MYSQL_DATABASE
    ]);
     
    require_once("functions.php");
    
// Everytime used class
    $fm = new flashMessages();