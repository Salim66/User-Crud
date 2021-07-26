<?php

    // Database Connection Constants

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'user-management');

    //Database connection
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check whether the connection is not established
    if($connection->connect_errno){
        die("Database connection failed badly ".$connection->connect_errno);
    }

    // Check whether the connection successfully established
    // if($connection){
    //     echo "<p style='color:red;'>True</p>";
    // }

?>